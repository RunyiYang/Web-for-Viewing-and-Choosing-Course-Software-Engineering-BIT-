<?php
if (isset($_COOKIE["cur_user"]) and isset($_GET["courseID"])) {
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn,$userNaame,$password);
    $name = $_COOKIE["cur_user"];
    $cid = $_GET["courseID"];
//    点关注关注人数加一
    $sql_command1 = <<<EOF
    UPDATE `main`.`course` SET `cnum` = `cnum`+1 WHERE `cid` = '$cid'
EOF;
    $sql_run = $conn->prepare($sql_command1);
    $sql_run->execute();
//选课加入关注
    $sql_command = <<<EOF
insert into choose
select user.sid, ? from user where MemberName=?
EOF;
    $sql_run = $conn->prepare($sql_command);

    if ($sql_run->execute([$cid, $name])) {
        $sql_run->closeCursor();
        echo <<<EOF
<script>
<!--插入课程成功-->
alert("Registration successful!");
window.location.href = "Favor_stu.php";
</script>
EOF;
    }
} else {
    echo <<<EOF
<script>
alert("You need to log in!");
window.location.href = "index.php";
</script>
EOF;

}
