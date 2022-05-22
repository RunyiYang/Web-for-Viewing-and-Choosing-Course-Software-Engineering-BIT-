<!-- courseWithdrawa_1用于在主界面取消关注，courseWithdraw用于在“我的关注”界面取消 -->
<?php
if (isset($_COOKIE["cur_user"]) and isset($_GET["courseID_1"])){
//判断用户是否登录
$dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
$userNaame = "root";
$password = "yry001223";
$conn = new PDO($dsn, $userNaame, $password);
$name = $_COOKIE["cur_user"];
$cid = $_GET["courseID_1"];
 //从数据库的关注课程表单choose中删除该条关注记录
$sql_command = <<<EOF
    delete from choose where
    cid=?
 EOF;
    $sql_run = $conn->prepare($sql_command);

    if ($sql_run->execute([$cid])) {
    $sql_run->closeCursor();
    //若操作成功，页面提示“Withdrawal successful!”并返回“我的关注”页面
    echo <<<EOF
    <script>
        alert("Withdrawal successful!");
        window.location.href = "mainframe_stu.php";
    </script>
    EOF;
    }
}
//若用户未登录，页面提示"You need to log in!"并返回登录界面
else {
    echo <<<EOF
    <script>
        alert("You need to log in!");
        window.location.href = "index.php";
    </script>
    EOF;
    }
?>