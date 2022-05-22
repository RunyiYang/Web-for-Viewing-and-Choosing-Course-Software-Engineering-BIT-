<!doctype html>
<html lang="zn-CH">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录</title>
  <link href="bootstrap_min.css" rel="stylesheet">

  <style>
    /* 设置背景 */
    body {
      background-image: url("login-bg1.jpg");
      background-size: 1440px 685px;
      background-repeat: no-repeat;
    }
     /* 设置登录信息外框 */
    #login-pad {
      background-color: rgba(255, 255, 255, 0.5);

      border-radius: 8%;
      padding: 6%;
    }
    /* 设置登录信息字体 */
    #login-pad > h3 {
      font-family: Sansation, sans-serif;
    }
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
     <!-- 排版：设置空列 使登录框出现在页面右方 -->
    <div class="col-md"></div>
     <!-- 登录框内容设置 -->
    <div class="col-md">
      <form method="post" action="logincheck.php" target="_top">
        <div id="login-pad">
          <!-- 登录框标题 -->
          <h3 class="text-center mb-4">北京理工大学智能教务选课系统</h3>
          <!-- 用户账号及用户密码输入框 -->
          <div class="input-group mb-4">
            <input type="text" name="uname" class="form-control" placeholder="请输入您的账号" required>
          </div>
          <div class="input-group">
              <input class="form-control " type="password" name="password" id="password" placeholder="请输入密码">
          </div>
          <!-- "登录"和"管理员"按钮 -->
            <div class="footer">
              <br>
              <button type="submit" class="btn btn-primary" name = "submit" value="222">登录</button>
              <button type="submit" class="btn btn-secondary" onclick="window.open('adminlogin.php')">管理员</button>
            </div>
          <!-- 新账号注册 -->
            <div class="form-group">
                <br>
                <a href="register.php">没有账号？立即注册</a><br>
                重置密码请联系管理员，管理员联系方式：13652009569
            </div>

        </div>
        <script>
          //保持登录框在页面缩放时的排版美观
          let target_pad = document.getElementById("login-pad");
          function adjust() {
            let padH = target_pad.offsetHeight / 2;
            target_pad.style.marginTop = "calc(50% - " + padH + "px)";
          }
          adjust();
          window.onresize = adjust;//对window.onresize的定义在该文档最后一段代码
        </script>
      </form>
    </div>
  </div>
</div>

<script src="bootstrap_js.js"></script>
<script>
  let target_body = document.body;
  window.onresize = function() {
    let screenW = window.innerWidth;
    let screenH = window.innerHeight;
    console.log(screenW, screenH);
    if (screenW / screenH <= 1.4) {
      target_body.style.backgroundSize = "auto 100vh";
    } else {
      target_body.style.backgroundSize = "100vw";
    }
  };
</script>
</body>
</html>

<head>
 <meta charset="utf8">
