<?php
$_SESSION['login'];
session_destroy();
//echo "<script>document.location.href='http://localhost/carnex'</script>";
header('Location: index.php');