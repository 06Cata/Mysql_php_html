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

  <title>Comics</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
        body {
            text-align: center;
            background-color: #FFF8DC;
            color: #191970;
        }

        h1 {
            margin-top: 20px;
            font-family: 'Anton', sans-serif;
        }

        img {
            max-width: 800px;
            max-height: 600px;
            margin-bottom: 20px;
        }

        #navigation {
            margin-bottom: 20px;
        }

        #navigation a {
            display: inline-block;
            margin: 0 10px;
            color: #4B0082;
            text-decoration: none;
            font-weight: bold;
        }

        #navigation a:hover {
            text-decoration: underline;
        }
    </style>
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
</body>
      <!-- end header section -->


<?php
// 【一、建立 MySQL 連線】
$localhost = "localhost";
$username = "root";
$password = "000000";
$dbname = "test";

$conn = mysqli_connect($localhost, $username, $password, $dbname);

// 【二、檢查資料庫連線是否成功, mysqli_connect_error 函式, 如果連線失敗，程式將顯示錯誤訊息並停止執行】
if (!$conn) {
    die("資料庫連線失敗：" . mysqli_connect_error());
}


// 【三、取得所有圖片連結的資料】
// mysqli_query函式 (連線條件, 查詢條件)
$query = "SELECT * FROM comic_url";
$result = mysqli_query($conn, $query);


// 【四、檢查資料庫選擇是否成功, mysqli_error 函式, 如果失敗，程式將顯示錯誤訊息並停止執行】
if (!$result) {
    die("資料庫選擇失敗：" . mysqli_error($conn));
}


// 【五、取得目前頁碼】
// 如果網址中存在名為"id"的GET參數，則表達式的值將設置為該GET參數的值，否則表達式的值將設置為1
$currentId = isset($_GET['id']) ? $_GET['id'] : 1;


// 【六、取得前一頁和下一頁的頁碼】
// 如果目前的頁碼$currentId大於1，則將前一頁的頁碼設置為$currentId - 1，否則設置為1。這樣確保前一頁的頁碼不會小於1
// 如果目前的頁碼$currentId小於查詢結果的總行數mysqli_num_rows($result)，則將下一頁的頁碼設置為$currentId + 1
// 否則設置為當前的頁碼$currentId。這樣確保下一頁的頁碼不會超過查詢結果的總行數
$prevId = $currentId > 1 ? $currentId - 1 : 1;
$nextId = $currentId < mysqli_num_rows($result) ? $currentId + 1 : $currentId;


// 【七、取得目前頁面的圖片連結】
// 從關聯數組中取得url欄位的值
$query = "SELECT url FROM comic_url WHERE id = $currentId";
$currentImage = mysqli_query($conn, $query)->fetch_assoc()['url'];

// 【八、關閉 MySQL 連線】
mysqli_close($conn);
?>


  <h1>Comics KingIV</h1>
  <br>
    <img src="<?php echo $currentImage; ?>" alt="漫畫圖片">
    <br>
    <form>
        <label for="page">選擇頁碼：</label>
        <select name="id" id="page">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $optionId = $row['id'];
                $selected = $optionId == $currentId ? 'selected' : '';
                echo "<option value=\"$optionId\" $selected>$optionId</option>";
            }
            ?>
        </select>
        <input type="submit" value="前往">
    </form>
    <br>
    <button type="button" onclick="location.href='?id=<?php echo $prevId; ?>'">上一張圖</button>
    <button type="button" onclick="location.href='?id=<?php echo $nextId; ?>'">下一張圖</button>
    <br>
    <br>
    <br>

<!-- end info_section -->
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