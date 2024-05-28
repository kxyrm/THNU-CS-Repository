<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set('PRC');//时区的控制 PRC是中国
$user = $_COOKIE["user"];//以键值的形式保存在文件夹内
//$password = md5(trim($_POST['password']));
//if($user){
//    echo "欢迎 $user 登录";//单引号不解析
//}
//else{
//    echo "<script>alert('请先登录');location.href='login.html'</script>";//超链接到登陆界面
//exit;
//}
function prt($one)
{
    echo "<script> alert('$one');  window.history.back();</script>";//返回上一级
    die;
}
function prtt($one)
{
    echo "<script>alert('$one');</script>";
}
//$len =  ob_get_length($_FILES['file']['name']);
//echo "<script>alert($len);window.history.go(-1); exit(0);</script>";

//上传文件个数
$len = count($_FILES['file']['name']);
//echo "<script>alert('$len');</script>";
for ($i = 0; $i < $len; $i++) {
    $filename = $_FILES['file']['name'][$i];
    $temp_name = $_FILES['file']['tmp_name'][$i];
    $size = $_FILES['file']['size'][$i];
    $error = $_FILES['file']['error'][$i];
//判断文件大小
    if ($size > 2 * 1024 * 1024) {
        echo "<script>alert('文件大小超过2M大小');</script>";
        header('refresh:0.5; url=upload.html');//0.5秒跳到其他页面
        exit(0);
    }
//判断文件类型
    $arr = pathinfo($filename);//pathinfo以数组形式返回关于文件路径的信息
    $ext_suffix = $arr['extension'];
    $allow_suffix = array('jpg', 'txt','doc','xls','ppt');
    if (!in_array($ext_suffix, $allow_suffix)) {//in_array函数搜索数组中是否存在指定的值
        echo "<script>alert('上传的文件类型只能是jpg,txt,doc,ppt,xls');</script>";
        header('refresh:0.5; url=upload.html');
        exit(0);
    }
    if (!is_dir("file/$user"))
        mkdir("file/$user");//不存在建立一个文件
    if (file_exists("file/$user/" . iconv("utf-8", "gbk", $filename))) {
        prtt("当前用户:" . $user . '\n' . "该文件已存在");
    } else {
        move_uploaded_file($temp_name, "file/$user/" . iconv("utf-8", "gbk", $filename));//move_uploaded_file函数可用于更改客户端请求上传的文件的存储位置 iconv转码
        prtt("当前用户:" . $user . '\n' . "保存成功,保存在:" . "file/$user/" . $filename);
    }
}
//echo "<script>window.history.back();</script>";
header('refresh:0.5; url=upload.html');