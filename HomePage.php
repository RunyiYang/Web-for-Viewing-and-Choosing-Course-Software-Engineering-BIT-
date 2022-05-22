<?php
if (isset($_COOKIE["cur_user"])) {
    setcookie("cur_user", $_COOKIE["cur_user"], time() + 3600);
    setcookie("cur_sid", $_COOKIE["cur_sid"], time() + 3600);
} else {
    echo <<<EOF
<script>alert("You need to log in!")</script>
EOF;
    echo <<<EOF
<script>url="index.php";window.location.href=url;</script>
EOF;
}
?>


<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心</title>

    <link rel="stylesheet" href="bootstrap_min.css">
    <style>
        #no-result-warning {
            font-family: Sansation, sans-serif;
            color: gray;
        }

        .hide {
            display: none;
        }
        .photo{
            float:left;
            width:150px;
        }

        #login-pad {
            background-color: rgba(255, 255, 255, 0.5);
                 /* 边框的倒角 */
            border-radius: 8%;
            padding: 6%;
        }

        #login-pad > h3 {
            font-family: Sansation, sans-serif;
            /* 设置字体样式 */
        }

        /* 以下为个人头像展示部分的图文排版排版 */
        div.img
            /* 边框 */
        {
            margin: 2px;
            border: 1px solid #000000;
            height: auto;
             /* 高度自动匹配 */
             width: auto;
            /* 宽度自动匹配 */
            float: left;
            text-align: center;
            /* 文本居中 */
        }

        div.img img
        {
            display: inline;
            margin: 3px;
            border: 1px solid #ffffff;
        }
         
        /* 图片下文字的排版 */
        div.img a:hover img {border: 1px solid #0000ff;}
        div.desc
        {
            text-align: center;
            font-weight: normal;
            /* 字体粗细 */
            width: 120px;
            /* 宽度 */
            margin: 2px;
             /* 页边空白宽度 */
        }
        #no-result-warning {
            font-family: Sansation, sans-serif;
            /* 字体样式 */
            color: gray;
            /* 字体颜色 */
        }

        .hide {
            display: none;
        }
        #customers
        {
            font-family: Arial, Helvetica, sans-serif;
           /* 字体样式 */
            border-collapse: collapse;
             /* 为表格设置合并边框模型 */
            width: 70%;
              /* 定义基于包含块（父元素）宽度的百分比宽度。 */

        }

        #customers td, #customers th
        {
            border: 1px solid white;
            /* 边框 */
            /* 边框粗细和风格 */
            padding: 8px;
            font-size:14px;
              /* 字体大小 */
        }


       
         /* 表单的排版 */
        #customers tr:hover {background-color: #ddd;}
        /* 滑过时的变色 */

        #customers th
        {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ddd;
            /* 划过时背景颜色为#ddd */
            color: black;
             /* 划过时文字颜色变为黑色的 */
        }
          /* 网页全部类型为main的文字，都居中对齐*/
        p.main{text-align:center;}
p {text-indent:50px;}
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
                    <a href="stu_ad.php" class="nav-link">通知公告</a>
                </li>
            </ul>
            <!--定义导航栏：搜索-->
            <form class="d-flex" method="get" action="#">
                <input class="form-control me-2" type="search" placeholder="Search" name="keyword">
                <!--                <button class="btn btn-outline-success me-2" type="submit">Search</button>-->
                <a href="#" width="200px" height="200px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="40" fill="currentColor" class="bi bi-search icon d-block" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </form>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <form action="HomePage.php" method="post" class="d-flex">
                <button class="btn btn-light" type="submit">个人中心</button>
            </form>
        </div>
    </div>
</nav>


<div class="container-fluid">
    <div class="form row">
        <div class="col-md-1"></div>

         <!-- 头像列 -->
        <div class="col-md-2">
            <br>
            <img style="border-radius: 16%" src="avatar.jpg" class="photo" alt="icon">
            <!-- 边框倒角为16%，将avatar.jpg调出 -->
        </div>
          <!-- 个人信息表单列 -->
        <div class="col-md">
            <br>
            <table id="customers" class="align-content-center">

                <?php
                    $sid = $_COOKIE["cur_sid"];
                    $conn = mysqli_connect("localhost","root","yry001223","main");
                    $sql = mysqli_query($conn, "select * from user where sid='$sid'");

                    //循环遍历出数据表中的数据
                    
                    $sql_arr = mysqli_fetch_assoc($sql);

                    $name = $sql_arr['MemberRealName'];
                    echo "<tr>  <td><p><b>姓名</b></p></td>  <td><center><p><b>$name</b></p></center></td>  </tr>";
                    
                    $nick = $sql_arr['MemberName'];
                    echo "<tr>  <td><p><b>昵称</b></p></td>  <td><center><p><b>$nick</b></p></center></td> </tr>";

                    $Id = $sql_arr['MemberId'];
                    echo "<tr>  <td><p><b>学号</b></p></td>  <td><center><p><b>$Id</b></p></center></td>  </tr>";

                    $Email = $sql_arr['Email'];
                    echo "<tr>  <td><p><b>邮箱</b></p></td>  <td><center><p><b>$Email</b></p></center></td>  </tr>";

                    $time = $sql_arr['Date'];
                    echo "<tr>  <td><p><b>注册时间</b></p></td>  <td><center><p><b>$time</b></p></center></td>  </tr>";

                    $major = $sql_arr['Major'];
                    echo "<tr>  <td><p><b>书院</b></p></td>  <td><center><p><b>$major</b></p></center></td>  </tr>";

                    $signature = $sql_arr['Signature'];
                ?>
                <!-- <tr>
                    <td></td>
                    <td></td>
                    <td><p class="main"><b> <a href="Change_information.php" target="_blank">更改个人信息</a></b></p></td>
                </tr> -->
            </table>

            <br><br/>
            <h5>个人简介</h5>
                <textarea readonly="readonly" rows="5" cols="80"><?php echo "$signature";?></textarea>
                <!-- 个人简介文本框 大小为5行，80列 -->
            <br>
            <div class="col-md" align="left" style="float:left">
                <button type="submit" class="btn btn-primary" onclick="window.open('Change_information.php')" >更改个人信息</button>
            </div>
                 <!-- 点击更改个人信息按钮，链接到Change_information.php，即跳转到下一层网站 -->
            <div class="col-md" align="right">
            <form action="logOut.php" method="post" class="d-flex">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="submit" >&nbsp;&nbsp;&nbsp;&nbsp;退出登录&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </form>
            </div>
            <br>
        </div>

        </div>
    </div>
</div>

</body>



