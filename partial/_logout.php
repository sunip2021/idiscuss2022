<?php
session_start();

echo "logging out please wait";
session_destroy();
header("location:/forum/index.php");

?>