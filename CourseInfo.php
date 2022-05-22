<?php
//判断用户是否登录，若未登录则系统提示并跳转至登录页面
if (!isset($_COOKIE["cur_user"]) or !isset($_GET["courseID"])) {
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
    <!-- 页面标题为“课程详情” -->
    <title>课程详情</title>

    <link rel="stylesheet" href="bootstrap_min.css">

<!-- 定义no-result-warning和hide的风格 -->
    <style>
        #no-result-warning {
            font-family: Sansation, sans-serif;
            color: gray;
        }

        .hide {
            display: none;
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
                    <a class="nav-link active" aria-current="page" href="mainframe_stu.php">全校课程信息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Favor_stu.php">我的关注</a>
                </li>
                <li class="nav-item">
                    <a href="stu_ad.php" class="nav-link" href="stu_ad.php">通知公告</a>
                </li>
            </ul>
            <form class="d-flex" method="get" action="#">
                <input class="form-control me-2" type="search" placeholder="Search" name="keyword">
         
                <a href="#" width="200px" height="200px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="40" fill="currentColor" class="bi bi-search icon d-block" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </form>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <form action="logOut.php" method="post" class="d-flex">
                <button class="btn btn-primary" type="submit">个人中心</button>
            </form>
        </div>
    </div>
</nav>
<!-- 连接数据库，0~9分别对应不同课程主页图像 -->
<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <?php
                $pics = array(
                    "0" => "C.svg",
                    "1" => "linear.png",
                    "2" => "Lua.svg",
                    "3" => "database.svg",
                    "4" => "data_structure.svg",
                    "5" => "piano.jpg",
                    "6" => "film_score.jfif",
                    "7" => "C++.svg",
                    "8" => "algorithm.svg",
                    "9" => "php.svg",
                );

                $cid = $_GET["courseID"];
                //调用课程主页图像
                echo <<<EOF
                    <img style="border-radius: 16%" src="img/$pics[$cid]" class="img-fluid p-2" alt="icon">
                EOF;

                ?>
            </div>
            <!-- 与数据库连接，课程基本信息显示 -->
            <div class="col-md-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th>课程编号</th>
                        <th>课程名称</th>
                        <th>课程时间</th>
                        <th>任课教师</th>
                        <th>课程类别</th>
                        <th>关注人数</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //显示星期几
                    $cid = $_GET["courseID"];
                    $week_name = array(
                        "1" => "Monday",
                        "2" => "Tuesday",
                        "3" => "Wednesday",
                        "4" => "Thursday",
                        "5" => "Friday",
                        "6" => "Saturday",
                        "7" => "Sunday",
                    );
                    //显示课程时间段
                    $period_name = array(
                        "1" => "8:00 - 9:35",
                        "2" => "9:55 - 11:30",
                        "3" => "13:20 - 14:55",
                        "4" => "15:15 - 16:50",
                        "5" => "18:30 - 20:55",
                    );

                    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
                    $userNaame = "root";
                    $password = "yry001223";
                    $conn = new PDO($dsn,$userNaame, $password);
                    //获取课程id用于调取基本信息
                    $sql_command = <<<EOF
                        select * from course where (
                             cid=?
                        )
                    EOF;

                    $sql_run = $conn->prepare($sql_command);
                    $sql_run->execute([$cid,]);
                    $conn = null;

                    foreach ($sql_run as $row) {
                        $temp_cid = $row["cid"];
                        $temp_cname = $row["cname"];
                        $temp_teacher = $row["cteacher"];
                        $temp_date = $row["ctime"];
                        $temp_cnum = $row["cnum"];
                        $temp_ccategory = $row["ccategory"];
                    //与116~121行内容对应，从数据库调取内容    
                    echo <<<EOF
                        <tr>
                        <td>$temp_cid</td>
                        <td>$temp_cname</td>
                        <td>$temp_date</td>
                        <td>$temp_teacher</td>
                        <td>$temp_ccategory</td>
                        <td>$temp_cnum</td>
                        </tr>
                    EOF;
                    }
                    ?>
                    </tbody>
                </table>

                <p class="mt-1 desc-box p-3">
                    <?php
                    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
                    $userNaame = "root";
                    $password = "yry001223";
                    $conn = new PDO($dsn,$userNaame, $password);
                    //获取课程id用于调取课程简介
                    $sql_command = <<<EOF
                        select * from course where (
                        cid=?
                        )
                    EOF;

                    $sql_run = $conn->prepare($sql_command);
                    $sql_run->execute([$cid,]);
                    $conn = null;
                    //调取课程描述简介description
                    foreach ($sql_run as $row) {
                        echo $row["description"];
                    }
                    ?>
                </p>
                <!-- 定义评论按钮“聊个天” -->
                <button type="button" class="btn btn-outline-primary"
                        data-bs-target="#comment-modal" data-bs-toggle="modal">
                    聊个天!
                </button>
                <div class="modal fade" id="comment-modal">
                    <div class="modal-dialog">
                        <!-- 实现评论功能的.php为addComment -->
                        <form class="modal-content" method="post" action="addComment.php">
                            <div class="modal-header">
                                <!-- 输入评论的文字框名称 -->
                                <h5 class="modal-title">搁这儿聊</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                        <textarea class="form-control" name="comment-text" cols="30"
                                                  rows="5">

                                        </textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="courseID"
                                        value=<?php
                                //将评论内容发送回数据库
                                $temp = $_GET["courseID"];
                                echo "$temp";
                                ?>>Send
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </div>
</section>

<section>
    <div class="container">
        <?php
        //显示评论时间，1~12对应一月至十二月
        $month_name = array(
            "1" => "Jan.",
            "2" => "Feb.",
            "3" => "Mar.",
            "4" => "Apr.",
            "5" => "May",
            "6" => "Jun.",
            "7" => "Jul.",
            "8" => "Aug.",
            "9" => "Sep.",
            "10" => "Oct.",
            "11" => "Nov.",
            "12" => "Dec."
        );

        $cid = $_GET["courseID"];
        $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
        $userNaame = "root";
        $password = "yry001223";
        $conn = new PDO($dsn,$userNaame, $password);
        //根据日期顺序显示评论内容
        $sql_command = <<<EOF
            select * from comment 
            where cid=?
            order by mdate desc, mindex asc
        EOF;

        $sql_run = $conn->prepare($sql_command);
        $sql_run->execute([$cid,]);

        $old_date = "";
        $no_result = true;
        foreach ($sql_run as $row) {
            $no_result = false;
            //如果评论结束，上传信息
            if ($row["mdate"] <> $old_date) {
                //新建row
                $old_date = $row["mdate"];
                //获取用户id
                $sql_command = <<<EOF
                    select MemberName from user where sid=?
                EOF;
                $sql_run = $conn->prepare($sql_command);
                $sql_run->execute([$row["sid"],]);
                $name = $sql_run->fetch()["MemberName"];
                $text = $row["text"];
                
                echo <<<EOF
                    <div id="$old_date" class="row my-2">
                    <div class="card">
                    <h5 class="card-title pt-2">$name</h5>
                    <span class="card-text py-1 ps-4">$text
                EOF;

            } 
            //若评论未结束，继续输入评论内容
            else {

                echo $row["text"];
            }

            if ($row["mindex"] === $row["mitotal"]) {
                // 格式说明$date_to_write = date("G:i:s,`m-d,`Y");
                $date_to_write = explode(",`", $old_date);
                $m_time = $date_to_write[0];
                $m_date = explode("-", $date_to_write[1]);
                $m_month = $month_name[$m_date[0]];
                $m_day = $m_date[1];
                $m_year = $date_to_write[2];
                $day_out = $m_time . ', ' . $m_month . ' ' . $m_day . ', ' . $m_year;
                //不显示被管理员禁言的评论内容
                echo <<<EOF
                </span>
                    <div class="card-text">
                        <small class="text-muted">
                        $day_out
                        </small>
                    </div>
                    </div>
                    </div>  
                EOF;
            }
        }

                echo <<<EOF
                    <h3 class="text-center hide" id="no-result-warning">Nothing Found</h3>
                EOF;


        if ($no_result) {
            echo <<<EOF
                <script>
                document.getElementById("no-result-warning").classList.remove("hide");
            </script>
            EOF;
        }

        $conn = null;
        ?>
    </div>
</section>

<script src="bootstrap_bundle_min.js"></script>
<script src="popper_min.js"></script>
<script src="bootstrap_js.js"></script>

</body>