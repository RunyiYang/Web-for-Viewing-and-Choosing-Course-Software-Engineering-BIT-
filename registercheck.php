<head>
<meta charset="utf8">
<?php 
if(isset($_POST["submit"]) && $_POST["submit"] == "111"){

    $usernickname = $_POST["usrnickname"];
    $MemberName = $_POST["usrname"]; 
    $usrId = $_POST["usrId"];
    $userpsw1 = $_POST["usrpw1"];  
    $userpsw2 = $_POST["usrpw2"];
    $useremail = $_POST["usremail"];
    //存储register.php中的表单信息
        

    if($MemberName == "" || $usernickname == "" || $userpsw1 == "" ||$userpsw2 == "" ||$useremail == "" ||$usrId == "")
    {
         echo "<script>alert('有档案没有填完！不能留空哦'); history.go(-1);</script>";
    }   //判空

    else   
    {     
        $connect = mysqli_connect("localhost","root","yry001223",'main');   //连接数据库
        if (!$connect){
             echo"<script>alert('数据库连接失败！')</script>";
        }   //错误信息返回
        mysqli_select_db($connect,"main");      //选择数据库
	    $sql0 = "SELECT * FROM user WHERE MemberName LIKE '$usernickname'"; //数据库查询指令
	    $result0 = mysqli_query($connect,$sql0);        //执行查询指令
	    $num0 = mysqli_num_rows($result0);              //存储查询结果
	    if($num0 != 0){
	        echo "<script>alert('已经有位爷用这个名字注册过了，对不住喽'); history.go(-1);</script>";
	    }       //已存在用户名错误
	    else if($userpsw1 != $userpsw2){
	        echo "<script>alert('爷你俩不一样的，不厚道啊！'); history.go(-1);</script>";
	    }       //密码相同错误
	    else{
            $connect = mysqli_connect("localhost","root","yry001223",'main');

            $Signature = '这个人很懒，什么都没写';
            $IsAdmin = 0;
            $CommentCount = 0;
            $dept = "VA";
            $datetime = date("Y-m-d");  //获取当前日期
            //存储表单信息，并初始化

            // $sql = "INSERT INTO `member` (`MemberId`, `MemberName`, `MemberPwd`,`MemberIcon`,`MemberRealName`,`Signature`,`Email`,`IsAdmin`, `IsTeacher`,`Action`,`CommentCount`,`Date`,`LastVisit`,`Subscribe`) 
            // VALUES ( '$usrId', '$usernickname', '$userpsw1', '$Icon' ,'$MemberName', '$Signature'，'$useremail', '$IsAdmin' , '$IsTeacher', '$Action', '$CommentCount', '$Date', '$LastVisit', '$Subscribe')";
            // $result = mysqli_query($connect,$sql);           

	        $sql = "INSERT INTO user (MemberId, MemberName, MemberPwd,MemberRealName,Email,dept,Date) 
            VALUES ( '$usrId', '$usernickname', '$userpsw1' ,'$MemberName','$useremail','$dept','$datetime')";  //数据库insert指令
            $result = mysqli_query($connect,$sql);           //执行数据库指令

            // $sql = "INSERT INTO `member`
            // VALUES ($usrId, $usernickname, $userpsw1, $Icon,$MemberName, $Signature，$useremail, $IsAdmin, $IsTeacher, $Action, $CommentCount, $Date, $LastVisit, $Subscribe)";
            // $result = mysqli_query($connect,$sql);

            if($result){
                echo"<script>alert('数据库插入成功')</script>";
                header("Location:registerok.php");      //插入成功，进入等待跳转界面
            }
            else echo"<script>alert('数据库插入失败')</script>";

            
	    }
    }
}
?> 