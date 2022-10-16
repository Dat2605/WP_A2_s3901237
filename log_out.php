<?php
require "tools.php";
session_unset();
unset($_SESSION['user']);
session_destroy();
header("Location: login.php");
?>