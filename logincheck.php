<?php
function check_login_info($un, $up) {
    // 和数据库文件storage.db建立连接
    // sqlite: 表示这是一个sqlite数据库 不是mysql啥的其他数据库
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn,$userNaame, $password);
    if (!$conn){
        echo"<script>alert('数据库连接失败！')</script>";
    }
    // SQL语句 问号类似于C语言的%s 作占位符
    // 占位符将在下文中发挥作用
    $sql_command = <<<EOF
select * from user where
    MemberName=? and MemberPwd=?
EOF;
    $sql_run = $conn->prepare($sql_command);  // 让 数据库的连接 做好执行的准备
    $sql_run->execute([$un, $up]);  // 为占位符填上内容 同时执行SQL语句
    $temp = $sql_run->fetchAll();  // 把select到的所有行变成一个数组 塞进$temp里
    $conn = null;  // 关闭数据库连接 其实这一步是多余的 可以删掉
    if (count($temp)) {
        // 如果选择到东西了 说明用户输入对了用户名和密码 返回这用户是不是管理员 和用户的id
        // 注意 返回的是一个数组 数组里的东西都是字符串 都是字符串 都是字符串
        return [$temp[0]["is_admin"], $temp[0]["sid"]];
    }
    // 啥都没找到 说明用户输错了 返回一个空的数组
    return [];
}

    if(isset($_POST["submit"]) && $_POST["submit"] == "222")  
    {  //收到登录指令
        $user = $_POST["uname"];
        $psw = $_POST["password"];  
        //存储登录信息
        if($psw == "")
        {  
            echo "<script>alert('请输入密码！不能为空哦'); history.go(-1);</script>";
        }  //密码判空
        else  
        {
            $num = check_login_info($user, $psw);   //检查是否存在该用户
            if($num)  
            {
                $is_admin = $num[0];
                $sid = $num[1];
                setcookie("cur_user", $user, time() + 3600);
                setcookie("cur_sid", $sid, time() + 3600);
                echo "<script>alert('欢迎大爷！');</script>";
                //设置cookie，弹出成功界面
//              session_start();
//              $_SESSION['name']=$user;
              //echo $_SESSION['name'];
	            header("Location:mainframe_stu.php");
            }  
            else  
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  //信息错误，弹出提示界面
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?> 
<head>
