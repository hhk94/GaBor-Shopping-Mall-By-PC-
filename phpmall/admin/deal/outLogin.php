<?php

session_start();
session_destroy();

echo "<script>alert('成功退出');top.location.href='./../login.php'</script>"
?>