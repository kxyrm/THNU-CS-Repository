<?php
header("Content-Type:text/html; charset=utf-8");
$conn = mysqli_connect('127.0.0.1', 'root', '') or die('服务器连接失败' . mysqli_connect_error());//连接数据库
mysqli_select_db($conn, 'user') or die('数据库不存在' . mysqli_error($conn));//选择数据库
mysqli_set_charset($conn, 'utf8');//设置字符串
session_start();//启动session 初始化
//$username=$_SESSION['logged'];
//$password=$_SESSION['password'];
$username = $_COOKIE["user"];//cookie用来保存session
$password = md5(trim($_POST['password']));//接收变量 md5加密 trim去掉前部尾部空格
if($username){
    echo "欢迎 $username 登录";//单引号不解析$username 所以用双引号
}
else{
    echo "<script>alert('请先登录');location.href='login.html'</script>";//超链接到登陆界面
    exit;
}
$new_password=md5(trim($_POST['new_password']));//接收变量 md5加密
//include_once('connect.php');//字符集
//修改信息
//$sql_update="update userinfo set password='$new_password' where username='$username'and password='$password' ";
$sql_update="update userinfo set password='$new_password' where username='$username' ";//更改语句
$result=mysqli_query($conn,$sql_update);//执行语句
//$_result = mysqli_fetch_array($result);
if($result)
{
    echo "<script>alert('密码修改成功');location.href='upload.html'</script>";
}
else
{
    echo "<script>alert('密码修改失败,原密码输入错误');location.href='upload.html'</script>";
}
