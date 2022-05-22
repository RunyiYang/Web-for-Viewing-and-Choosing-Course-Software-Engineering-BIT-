<?php
if (isset($_COOKIE["cur_user"])) {
    setcookie("cur_user", $_COOKIE["cur_user"], time() + 3600);
    setcookie("cur_sid", $_COOKIE["cur_sid"], time() + 3600);
}               //设置cookie 
else {
    echo <<<EOF
<script>alert("You need to log in!")</script>
EOF;
    echo <<<EOF
<script>url="index.php";window.location.href=url;</script>
EOF;
}               //未设置cookie，返回登陆，防止直接访问子界面
?>

<?php

    if(isset($_POST["change"]) && $_POST["change"] == "333") {  //按下提交按钮判定
        $sid = $_COOKIE["cur_sid"];
        $name = $_COOKIE["cur_user"];
        $realname = $_POST["realname"]; 
        $nickname = $_POST["nickname"];  
        $id = $_POST["id"]; 
        $email = $_POST["email"];  
        $signature = $_POST["signature"];
        $major = $_POST["shuyuan"];
        //存储输入要修改的个人数据

	    $connect = mysqli_connect("localhost","root","yry001223","main");   //连接数据库
        if (!$connect){
            echo"<script>alert('数据库连接失败！')</script>";
	    }   //连接失败提醒
        // mysqli_select_db($connect,"member");  
        // mysqli_query($connect,"set names utf8");

        $sql0 = "SELECT * FROM user WHERE MemberName LIKE '$nickname'";     //数据库指令，查询相同昵称人数
        $result0 = mysqli_query($connect,$sql0);
        $num0 = mysqli_num_rows($result0);
        if($num0 != 0 && $name!=$nickname ){
            echo "<script>alert('已经有位爷用这个名字注册过了，对不住喽'); history.go(-1);</script>";
        }//非本人同昵称不允许存在
        else {
            $sql1 = "UPDATE `main`.`user` SET `MemberName` = '$nickname' WHERE `sid` = '$sid' ";
            $result1 = mysqli_query($connect, $sql1);
            //更新昵称
            $sql2 = "UPDATE `main`.`user` SET `MemberRealName` = '$realname' WHERE `sid` = '$sid' ";
            $result2 = mysqli_query($connect, $sql2);
            //更新真实姓名
            $sql3 = "UPDATE `main`.`user` SET `MemberId` = '$id' WHERE `sid` = '$sid' ";
            $result3 = mysqli_query($connect, $sql3);
            //更新学号
            $sql4 = "UPDATE `main`.`user` SET `Email` = '$email' WHERE `sid` = '$sid' ";
            $result4 = mysqli_query($connect, $sql4);
            //更新邮箱
            $sql5 = "UPDATE `main`.`user` SET `Signature` = '$signature' WHERE `sid` = '$sid' ";
            $result5 = mysqli_query($connect, $sql5);
            //更新个人简介
            $sql6 = "UPDATE `main`.`user` SET `Major` = '$major' WHERE `sid` = '$sid' ";
            $result6 = mysqli_query($connect, $sql6);
            //更新书院
            echo"<script>alert('修改成功！')</script>";
            header("Location:HomePage.php");        //返回个人中心
        }



    }
      
?> 