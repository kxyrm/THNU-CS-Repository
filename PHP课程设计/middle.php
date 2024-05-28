<?php
header("Content-Type:text/html; charset=utf-8");
error_reporting(0);//关闭所有php错误报告
@$user = $_COOKIE["user"];//@屏蔽一些错误信息
//echo "<script>alert('$user');</script>";//超链接到登陆界面

if(!$user){
    echo "<script>alert('请先登录');location.href='login.html'</script>";//超链接到登陆界面
    exit;
}
echo "<script>location.href='upload.html'</script>";//超链接到登陆界面