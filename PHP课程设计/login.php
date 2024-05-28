<?php
echo '<meta charset="UTF-8">';
$username = trim($_GET['username']);//GET通过URL传输数据 trim删除前部尾部空格
$password = md5(trim($_GET['password']));
function prt($one)//prt输出
{
    echo "<script>alert('$one'); window.history.back();</script>";//返回上一个界面
    die;
}
if ($username == null or $password == null) {//如果用户名和密码为空 输出登陆失败

    prt("登录失败_请输入完整数据");
    exit(0);
}
$conn = mysqli_connect('127.0.0.1', 'root', '') or die('服务器连接失败' . mysqli_connect_error());//连接数据库
mysqli_select_db($conn, 'user') or die('数据库不存在' . mysqli_error($conn));//选择数据库
mysqli_set_charset($conn, 'utf8');//设置字符串
$select_username = "select * from userinfo where username = '$username' ";//查询数据表
$result_one = mysqli_query($conn, $select_username);//执行sql语句
while ($row = mysqli_fetch_array($result_one)) {//mysqli_fetch_array从结果集中取出一条数据，返回索引数组和关联数组
//    prt($password);
    if ($row['username'] == $username) {
        if ($row['password'] == $password) {

            setcookie("user",$username,time()+1800);//保存user变量cookie变量1800秒
            echo "<script> alert('登录成功'); window.location.href='upload.html';</script>";//输出登陆成功 转到上传文件界面


        } else {
            prt("登录失败_账号密码错误");
        }
        exit(0);
    }
}
prt("登录失败_账号密码错误");
