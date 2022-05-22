
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
        }               /* 管理员登录界面图片 */
        #login-pad {
            background-color: rgba(255, 255, 255, 0.5);

            border-radius: 8%;
            padding: 6%;
        }               

        #login-pad > h3 {
            font-family: Sansation, sans-serif;
        }               /* 管理员登录界面样式 */
    </style>
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
            <form action="adminlogincheck.php" method="post" target="_top">
                <div id="login-pad">
                    <h3 class="text-center mb-4">管理员系统</h3>

                    <div class="input-group mb-4">
                        <input type="text" name="adminname" class="form-control" placeholder="请输入您的账号" required>
                    </div>
                    <div class="input-group">
                        <!--              <input type="text" name="upass" class="form-control" placeholder="请输入您的密码" required>-->
                        <input class="form-control " type="password" name="adminpw" id="password" placeholder="请输入密码">

                    </div>
                    <div class="footer">
                        <!--
                          <button type="submit" class="btn btn-primary"  >登陆</button>
                          <button type="submit" class="btn btn-secondary ">忘记密码？</button>
                        -->
                        </br>
                        <button type="submit" class="btn btn-primary" name = "submit" value="登录">管理员登录</button>

                    </div>
                </div>
                <script>
                    let target_pad = document.getElementById("login-pad");
                    function adjust() {
                        let padH = target_pad.offsetHeight / 2;
                        target_pad.style.marginTop = "calc(50% - " + padH + "px)";
                    }                                           //设置页面为比例大小，用于适配不同大小的界面
                    adjust();
                    window.onresize = adjust;
                </script>
            </form>
        </div>
    </div>
</div>

<script src="bootstrap_js.js"></script>
<script>
    let target_body = document.body;
    window.onresize = function() {
        let screenW = window.innerWidth;                        //获取屏幕界面宽度
        let screenH = window.innerHeight;                       //获取屏幕界面高度
        console.log(screenW, screenH);
        if (screenW / screenH <= 1.4) {
            target_body.style.backgroundSize = "auto 100vh";    //设置页面为比例大小，用于适配不同大小的界面
        } else {
            target_body.style.backgroundSize = "100vw";
        }
    };
</script>
</body>
</html>

<head>
    <meta charset="utf8">
