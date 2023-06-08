<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Technews Crawling</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="sub_page">
  <div class="hero_area ">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/程式驅動.png" alt="">
          </a>
          <div class="" id="">
            <div class="User_option">
              <form class="form-inline my-2  mb-3 mb-lg-0">
                <input type="search" placeholder="Search">
                <button class="btn   my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="password.html">Linux System Password Automatic Replacement</a>
                <a href="pixnet.php">Technews Crawling</a>
                <a href="comic.php">Comics</a>
                <a href="idp.php">Analyzing IDP logs</a>
                <a href="chart.html">Analyzing the summary table</a>
                <a href="index.html">☗  Back to home</a>
              </div>s
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
<!-- end header section -->


<?php
// 建立 MySQL 連線
$localhost = "localhost";
$username = "root";
$password = "000000";
$dbname = "test";

$conn = mysqli_connect($localhost, $username, $password, $dbname);

// 檢查資料庫連線是否成功
if (!$conn) {
    die("資料庫連線失敗：" . mysqli_connect_error());
}

// 設定字元集與編碼為 utf8
mysqli_query($conn, "SET NAMES 'utf8'");

// 取得所有表格的資料
$query = "SELECT source, author, title, description FROM articles Limit 50";
$result = mysqli_query($conn, $query);
?>


<div class="container">
    <table class="table table-sm table-bordered" style="text-align:center;">
        <thead>
            <tr>
                <th>source</th>
                <th>author</th>
                <th>title</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['source']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="3">No records found</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<div>
    <br>
    <br>
</div>


<!-- Bootstrap 的 JavaScript 程式碼 -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</script>
<!-- Bootstrap 的 JavaScript 程式碼 -->

<!-- info section -->
<section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="info_time">
            <h5>
              Opening Hours
            </h5>
            <div>
              <p>
                Monday to Friday
              </p>
            </div>
            <div>
              <p>
                09:00 am to 17:30 pm
              </p>
            </div>
          </div>
        </div>
  </section>
  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2023 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- end  footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>

</body>

</html>


