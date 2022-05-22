<?php

if (!isset($_COOKIE["cur_user"]) or !isset($_GET["ad_id"])) {
    echo <<<EOF

<script>
alert("You need to log in!");
url="index.php";
window.location.href=url;
</script>

EOF;
} else {
    setcookie("cur_user", $_COOKIE["cur_user"], time() + 3600);
    setcookie("cur_sid", $_COOKIE["cur_sid"], time() + 3600);
    date_default_timezone_set("PRC");
}
?>

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>公告</title>

    <link rel="stylesheet" href="bootstrap_min.css">


    <style>
        #no-result-warning {
            font-family: Sansation, sans-serif;
            color: gray;
        }

        .hide {
            display: none;
        }
        textarea{
            /* 背景透明 */
            background:transparent; 
            /* 边框不显示 */
            border-style:none; 
            /* 首行缩进  */
            text-indent:0px; 

        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span>Beijing Institute of Technology</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         <!--定义导航栏：全校课程信息、我的关注、通知公告-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="mainframe_stu.php">全校课程信息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Favor_stu.php">我的关注</a>
                </li>
                <li class="nav-item">
                    <a href="stu_ad.php" class="nav-link" href="stu_ad.php">通知公告</a>
                </li>
            </ul>
            <!-- 定义课程搜索功能 -->
            <form class="d-flex" method="get" action="#">
                <input class="form-control me-2" type="search" placeholder="Search" name="keyword">
                
                <a href="#" width="200px" height="200px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="40" fill="currentColor" class="bi bi-search icon d-block" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </form>
            <!-- 定义个人主页 -->
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <form action="HomePage.php.php" method="post" class="d-flex">
                <button class="btn btn-primary" type="submit">个人中心</button>
            </form>
        </div>
    </div>
</nav>



<section>
    <div class="container">
        <?php
        $sid = $_COOKIE["cur_sid"];
        $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
        $userNaame = "root";
        $password = "yry001223";
        $conn = new PDO($dsn,$userNaame, $password);
        $adID = $_GET["ad_id"];
        $sql_run = $conn->prepare("select * from ad where adID='$adID'");
        $sql_run->execute();
        // 连接数据库，获取公告内容
        foreach ($sql_run as $row) {
            $temp_adID = $row["adID"];
            $temp_adTitle = $row["adTitle"];
            $temp_date = $row["adDate"];
            $temp_adCotent = $row["adCotent"];
            $temp_adDepart = $row["adDepart"];
        }
        ?>
        <!-- 公告栏风格设置 -->
        <br>
        <br>
        <h3 align="center"><?php echo $temp_adTitle?></h3>
        <div class="col-md-4"></div>
        <div class="col-md">
            <textarea readonly="readonly" style="text-align: center" class="form-control-plaintext" rows="16" style="min-width: 90%">
                <?php echo "$temp_adCotent"?>
            </textarea>
            <p style="text-align: right; font-size:20px; font-weight: bold">
                <?php echo "$temp_adDepart"?>
            </p>
        </div>
        <div class="col-md-4"></div>
    </div>
</section>

<script src="bootstrap_bundle_min.js"></script>
<script src="popper_min.js"></script>
<script src="bootstrap_js.js"></script>

</body>