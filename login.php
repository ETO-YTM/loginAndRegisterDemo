<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>请稍后......</title>
</head>
<body>
<h1>
    正在登陆......
</h1>
<hr>

<?php
$connect = new mysqli("127.0.0.1", "root", "123456", "myfirstphpproj");//此处连接自己的数据库
$sqlSearch = "select username from userInfo where username= '$_POST[userName]' and password='$_POST[password]';";
if (mysqli_num_rows($connect->query($sqlSearch))) {
    $_SESSION['user_id'] = $_POST['userName'];
    setcookie('user_id', $_POST['userName'], time() + 60 * 60);//设置cookie有效期为1小时
    echo '<script>window.location.href="HomePage.php"</script>';
} else
    echo '<script>alert("用户名或密码错误！");window.location.href="index.php";</script>';
?>
</body>
</html>
