<?php
echo '<meta charset="UTF-8">';
$e_mail = trim($_POST['E_mail']);
$username = trim($_POST['username']);//传递数据 创建数据
$password = trim($_POST['password']);
$confirm_password=trim($_POST['confirm_password']);
function prt($one){
    echo "<script>alert('$one'); window.history.back();</script>";//返回上一个
    die;
}
if ($e_mail == null or $username == null or $password == null) {//任意一个为空 就注册失败

    prt("注册失败_请输入完整数据");
    exit(0);
}
if($confirm_password!=$password)//密码不一致 返回
{
    echo "<script>alert('两次密码不一致');history.back();</script>";//密码不一致 返回
    exit;
}
$conn = mysqli_connect('127.0.0.1', 'root', '') or die('服务器连接失败' . mysqli_connect_error());//连接数据库
mysqli_select_db($conn, 'user') or die('数据库不存在' . mysqli_error($conn));//选择数据库
mysqli_set_charset($conn, 'utf8');//设置字符集
$select_e_mail = "select e_mail from userinfo where e_mail = '$e_mail'";//查询语句
$result_select = mysqli_query($conn, $select_e_mail);//执行语句
while ($row = mysqli_fetch_array($result_select)) {//mysqli_fetch_array从结果集中得到一行作为数字数组或关联数组
    if ($row['e_mail'] == $e_mail) {//邮箱相等 注册失败
        prt("注册失败_该邮箱已注册");
        exit(0);
    }
}
$select_username = "select username from userinfo where username = '$username'";//查询语句
$result_select_one = mysqli_query($conn, $select_username);//执行语句
while ($row = mysqli_fetch_array($result_select_one)) {//mysqli_fetch_array从结果集中得到一行作为数字数组或关联数组
    if ($row['username'] == $username) {//用户名相等
        prt("注册失败_该用户名已注册");
        exit(0);
    }
}
$password = md5(trim($_POST['password']));
$in = "insert into userinfo(e_mail, username, password) VALUE ('$e_mail','$username','$password')";
$result_insert = mysqli_query($conn, $in);
if ($result_insert) prt("注册成功");
else prt("注册失败");


