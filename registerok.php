<!doctype html>
<html lang="zn-CH">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <link href="bootstrap_min.css" rel="stylesheet">    <!-- 利用bootstrap样式 -->

    <style>
        body {
            background-image: url("login-bg.jpg");
            background-size: 1440px 685px;
            background-repeat: no-repeat;
        }           /* 登录界面图片 */
        #login-pad {
            background-color: rgba(255, 255, 255, 0.5);

            border-radius: 8%;
            padding: 6%;
        }

        #login-pad > h3 {
            font-family: Sansation, sans-serif;
        }           /* 登录界面样式 */
        .websitetitle {
            background-color:CornflowerBlue;
            color:white;
            margin:20px;
            padding:20px;
        }
        .login {
            background-color:Lavender;
            color:black;
            margin:20px;
            padding:20px;
        }
    </style>    <!-- 页面样式 -->
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-blue">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span>Beijing Institute of Technology</span>

        </a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md"></div>
        <div class="col-md">
            <form method="post" action="logincheck.php" target="_top">
                <div id="login-pad">
                    <h3 class="text-center mb-4">北京理工大学智能教务选课系统</h3>
                    <h4 class="text-center mb-4">注册成功！</h4>
                    <p class="text-center mb-4">
                        这位爷，快去登录一下吧!
                        </br>
                        大爷心里数个数，小的这就调到登录界面～
                    </p>
                </div>
<!-- 页面样式 -->
                <script>
                    let target_pad = document.getElementById("login-pad");
                    function adjust() {
                        let padH = target_pad.offsetHeight / 2;
                        target_pad.style.marginTop = "calc(50% - " + padH + "px)";
                    }               
                    adjust();
                    window.onresize = adjust;   //设置页面为比例大小，用于适配不同大小的界面
                </script>
            </form>
        </div>
    </div>
</div>

<script src="bootstrap_js.js"></script>


</body>
</html>


<?php header("refresh:5;url=index.php");  ?>
<!-- 5秒后自动跳转至登录界面，缓冲 -->