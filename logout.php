<?php
include  'inc/base.php';

session_unset();
session_destroy();
header("Location:login.php");
