<?php
session_start();
session_destroy();
header("location:".$_POST['redirect_to']);
?>
