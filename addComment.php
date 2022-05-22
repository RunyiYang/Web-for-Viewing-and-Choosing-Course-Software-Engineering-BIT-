<?php
if (!isset($_COOKIE["cur_user"]) or !isset($_POST["courseID"])) {
    echo <<<EOF
<script>
alert("You need to log in!");
url="index.php";
window.location.href=url;
</script>
EOF;
//    登陆没
} else {
    setcookie("cur_user", $_COOKIE["cur_user"], time() + 3600);
    setcookie("cur_sid", $_COOKIE["cur_sid"], time() + 3600);
    date_default_timezone_set("PRC");
    $send_date = date("G:i:s,`m-d,`Y");
    $username = $_COOKIE["cur_user"];
//对对时间和人名
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn,$userNaame, $password);
//连接数据库
    $cid = $_POST["courseID"];
    $sid = $_COOKIE["cur_sid"];
    $text = $_POST["comment-text"];
//读取数据
    $message_length = strlen($text);
    $buffer_size = 500;
//    看看你评论写了多少字，按行插入
    if ($message_length % $buffer_size == 0) {
        $total_index = (int)($message_length / $buffer_size);
    } else {
        $total_index = (int)($message_length / $buffer_size) + 1;
    }

    $sql_command = <<<EOF
insert into comment values (?, ?, ?, ?, ?, ?)
-- 插入评论一个一个来
EOF;
    $sql_run = $conn->prepare($sql_command);

    for ($i=1; $i<=$total_index; $i++) {
        $sql_run->execute([
            $cid,
            $sid,
            $send_date,
            substr($text, 0, $buffer_size),
            $i,
            $total_index
        ]);
        $text = substr($text, $buffer_size);
    }
    $conn = null;

    echo <<<EOF
<script>
<!--跳到对应的课程界面-->
window.location.href="CourseInfo.php?courseID=$cid"
</script>
EOF;
}

