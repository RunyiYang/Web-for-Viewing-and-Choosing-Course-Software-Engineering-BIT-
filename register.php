<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>注册</title>

    <link href="bootstrap_min.css" rel="stylesheet" >
    <style>
        body {
            background-image: url("register2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        #login-pad {
            background-color: rgba(235, 235, 235, 0.5);
            border-radius: 8%;
            padding: 6%;
        }
        #login-pad > h3 {
            font-family: Sansation, sans-serif;
        }
        .photo{
            float:left;
            width:40px;
        }
        .intro{
            float:left;
        }
    </style>
<!-- 设置样式 -->
</head>
<div>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span>Beijing Institute of Technology</span>
        </a>
    </div>
</nav>
<br>

<div class="container">

    <div class="form row">
        <div class="col-3"></div>
        <div class="col">

            <img src="badge.png" class="photo" alt="Beijing Institute of Technology" >
            <h2 class="intro">北京理工大学</h2>

            <br><br>
            <div id="login-pad">
                <form action = "./registercheck.php" class="form-horizontal" role="form" method="post" >
                    <h3 class="text-center">学生账号注册&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
                    
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">昵称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mb-3" id="name" name="usrnickname" placeholder="请输入昵称" required>
                        </div>
                    </div>  <!-- 昵称，非空 -->

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mb-3" id="name" name="usrname" placeholder="请输入姓名" required>
                        </div>
                    </div>  <!-- 姓名，非空 -->
                    
                    <div class="form-group">
                        <label for="studentID" class="col-md-4 control-label">学号</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control mb-3" id="sutdentID" name="usrId" placeholder="请输入学号" required>
                        </div>
                    </div>  <!-- 学号，非空 -->
    
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label" name="usrpw1" >密码</label>
                        <div class="col-sm-10 ">
                            <input type="password" class="form-control mb-3" id="password" name="usrpw1" placeholder="请输入密码" required>
                        </div>
                        <label for="password" class="col-md-4 control-label">确认密码</label>
                        <div class="col-sm-10 ">
                            <input type="password" class="form-control mb-3" id="password" name="usrpw2" placeholder="请确认密码" required>
                        </div>
                    </div>  <!-- 密码，非空，两个密码相同 -->

                    <div class="form-group">
                        <label for="mailID" class="col-md-4 control-label">电子邮箱地址</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control mb-3" id="mailID" name="usremail" placeholder="请输入有效邮箱地址，用于找回密码" required>
                        </div>
                    </div>  <!-- 邮箱，非空，符合邮箱格式 -->

<!--                    <div class="form-group">-->
<!--                        <label for="check" class="col-md-4  control-label">验证码</label>-->
<!--                        <div class="col-sm-10 col-lg-4">-->
<!--                            <input type="text" class="form-control mb-3 col-lg-2" id="mailID" placeholder="请输入4位验证码" required>-->
<!--                        </div>-->
<!--                    </div>-->   <!-- 未完成功能 -->

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" required>用户勾选即代表同意
                                    <a href="智能选课网站服务条款.pdf">《智能选课网站服务条款》</a>
                                    和
                                    <a href="智能选课网站隐私政策.pdf">《智能选课网站隐私政策》</a>
                                </label>
                            </div>
                        </div>
                    </div>  <!-- 勾选条款，政策 -->

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit" value="111">确认提交</button>
                            <button type="button" class="btn btn-secondary" onClick="window.open('index.php')">返回</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

</div>

    <script src="bootstrap_js.js">
    </script>
    <!-- 设置样式 -->
</body>
</html>


