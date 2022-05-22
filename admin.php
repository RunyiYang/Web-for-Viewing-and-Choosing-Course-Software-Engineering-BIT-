<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap_min.css">
	<style>
	.login {
		background-color:white;
		color:black;
		margin:20px;
		padding:20px;
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
    </div>
</nav>
<!-- 网页样式设定 -->
<div class="form-control">
    <h2 align="center">后台管理</h2>
</div>

<div class="login">

<center>
<p> MySql语句在这里可以直接执行:</p>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<textarea rows="10"  name="item" v-model="body" placeholder="请输入数据库命令行语句" class="form-control-plaintext" id="message_textarea" ></textarea>
	<!-- 在此处键入数据库指令 -->
	</br>
    <button type="submit" class="btn btn-secondary" name = "submit2" value="do it!">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
	<!-- 设置点击button后执行语句上传指令 -->
</form>

<?php
// 对数据进行
	if(isset($_POST["submit"])) {
		$item=$_POST["item"];	//将网页中的数据库指令存入$item
		$connect = mysqli_connect("localhost","root","yry001223","main");	//连接数据库
		if(!$connect){
			echo "<script>alert('数据库连接失败'); history.go(-1);</script>"; 
		}
		mysqli_select_db($connect,"user");									//选择对应的表，其他表的功能类似，由于时间原因，没有建立
		mysqli_query($connect,"set names utf8");							//设置字符类型
		$result = mysqli_query($connect,$item);								//数据库执行指令
		$arr = array();														
		while($rs = mysqli_fetch_assoc($result)){ $arr[]=$rs; }				//执行结果存入数组
		print_r($arr);														//将结果显示（仅用于select指令）
	// }else{
	// 	echo "<script>alert('内容获取失败'); history.go(-1);</script>";
		echo "<script>alert('提交成功'); history.go(-1);</script>";
	}
?>
</p>
</center>

</div>

</body>
</html>

