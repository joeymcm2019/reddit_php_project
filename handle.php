<?php
include_once "getToken.php";
$access_token = $_SESSION['access_token'];

$username = "reddit_username";

$posts_limit = 4;

$page = $_POST['page'];

if ($page == 1){
  $after = "null";
} else {
  $after = $_SESSION['after'] ?? "null";
}

$ch = curl_init("https://api.reddit.com/r/business/?limit=$posts_limit&after=$after");
curl_setopt( $ch, CURLOPT_HTTPHEADER, array("Authorization: $access_token", "User-Agent: $username", 'Content-Type: application/x-www-form-urlencoded') );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);

$_SESSION['after'] = $response['data']['after'];

$count = 1;

echo "<h1 id='main_header'><span class='custom_span'>r/</span><span>Business</span></h1>";

foreach ($response['data']['children'] as $child){
  if ($page == 1 && $count == 1){ //skip first post from first page

  } else {
    $title = $child['data']['title'];
    $numComments = $child['data']['num_comments'];
    $commentWord = $numComments === 1 ? "comment" : "comments";
    $author = $child['data']['author'];
    $link = "https://reddit.com" . $child['data']['permalink'];
    echo "<div class='custom_content' onclick='followLink(`$link`)'>
          <div class='custom_content_top border_custom'><h4>$title</h4></div>
          <div class='custom_content_bottom border_custom_2'>
            <span class='small_text'>$numComments $commentWord</span>
            <span class='small_text_2'>submitted by $author</span>
          </div>
        </div>";
  }
  $count++;
}
?>

