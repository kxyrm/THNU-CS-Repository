<?php
header("Content-Type:text/html; charset=utf-8");
//$user = $_COOKIE["user"];

setcookie("user",null,time()-3600);//删除user这个cookie变量

//$user_ = $_COOKIE["user"];

//echo "<script> alert('$user_');</script>";

echo "<script> alert('退出登录成功'); window.location.href='index.html';</script>";//返回页面
