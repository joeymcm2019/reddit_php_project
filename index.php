<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./scss/custom.css">
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous">
  </script>

  <!-- <script type="module" src="app.js"></script> -->

  <script>
    var page = 1;
    var loaded = false;
    addEventListener("load", (event) => {
      setUpListeners();
      if (!loaded) {
        $("#posts").load("handle.php", {
          page: page,
        });
      }
    });

    const setUpListeners = () => {
      const width = document.body.clientWidth;
      document.getElementById("b2").addEventListener("click", function() {
        event.preventDefault();
        nextPage();
      });
      document.getElementById("b1").addEventListener("click", function() {
        event.preventDefault();
        previousPage();
      });
    }

    const nextPage = () => {
      page += 1;
      console.log("nextPage: ", page);
      $("#posts").load("handle.php", {
        page: page,
      });
    }

    const previousPage = () => {
      if (page - 1 >= 1) {
        page -= 1;
        console.log("nextPage: ", page);
        $("#posts").load("handle.php", {
          page: page,
        });
      }
    }

    const followLink = (url) => {
      window.open(url, '_blank');
      console.log(url);
    }

  </script>
</head>

<body>
  <div class="container custom_container">
    <div class="row custom_row">
      <div id="posts">
        <h1 id='main_header'><span class='custom_span'>r/</span><span>Business</span></h1>
        <div class="custom_content">
          <div class='custom_content_top border_custom'>
            <span class="small_text"></span>
          </div>
          <div class='custom_content_bottom border_custom_2'><span class="small_text"></span></div>
        </div>
        <div class="custom_content">
          <div class='custom_content_top border_custom'>
            <span class="small_text"></span>
          </div>
          <div class='custom_content_bottom border_custom_2'><span class="small_text"></span></div>
        </div>
        <div class="custom_content">
          <div class='custom_content_top border_custom'>
            <span class="small_text"></span>
          </div>
          <div class='custom_content_bottom border_custom_2'><span class="small_text"></span></div>
        </div>
        <div class="custom_content">
          <div class='custom_content_top border_custom'>
            <span class="small_text"></span>
          </div>
          <div class='custom_content_bottom border_custom_2'><span class="small_text"></span></div>
        </div>
      </div>
      <form class="custom_form" id="pageSelect">
        <button id="b1" class="btn btn-lg btn-secondary">previous</button>
        <button id="b2" class="btn btn-lg btn-secondary">next</button>
      </form>
    </div>
  </div>
</html>