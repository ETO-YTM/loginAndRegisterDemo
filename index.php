<?php
session_start();
if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {//如果用户已经登录
    echo "登录成功，正在跳转......";
    echo '<script>window.location.href="HomePage.php"</script>';
    exit(0);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
</head>

<body>
<h1>主页</h1>
<hr>
<h4>登录</h4>
<form action="login.php" method="post">
    账户：<input type="text" name="userName"><br>
    密码：<input type="password" name="password"><br>
    <input type="submit" value="确认登录">
</form>

<h4>
    没有账号？<a href="register.php">去注册>>></a>
</h4>
</body>
</html>