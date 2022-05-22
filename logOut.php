<?php
if (isset($_COOKIE["cur_user"])) {
    setcookie("cur_user", "", time() - 300);
    //清除cookie
}
header("location:index.php");   //返回登录界面
exit();     //退出