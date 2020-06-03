<?php
session_start();
session_destroy();
setcookie("user_id", "", time() - 1);
echo '<script>window.location.href="index.php"</script>';
?>

