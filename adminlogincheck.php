<head>
 <meta charset="utf8">
<?php 
    if(isset($_POST["submit"]) && $_POST["submit"] == "登录")       //判断登录按钮是否按下
    {
        $user = $_POST["adminname"];            //存储管理员姓名

        $psw = $_POST["adminpw"];               //存储管理员密码

        if($user == "" || $psw == "")           //判空
        {
            echo "<script>alert('请输入用户名或密码！不能为空哦'); history.go(-1);</script>";
        }   
        else   
        {     
            $connect = mysqli_connect("localhost","root","yry001223","main");   //连接数据库
            if (!$connect){
                 echo"<script>alert('数据库连接失败！')</script>";
            }
            mysqli_select_db($connect,"film");
            mysqli_query($connect,"set names utf8");        //设置字符样式
	        $sql = "select * from user where MemberName ='$user' and MemberPwd ='$psw' and IsAdmin = 1";    //查询语句
            $result = mysqli_query($connect,$sql);          //执行查询语句
            $num = mysqli_num_rows($result);                //反馈查询结果
            if($num)        //查询成功则跳转登录
            {
                session_start();
                $_SESSION['name']=$user;
                header("Location:admin.php");
            }
            else            //查询成功则跳转登录
            {
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    }
?> 
<head>
