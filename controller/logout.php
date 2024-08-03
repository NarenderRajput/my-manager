<?php
include_once __DIR__."/../config/app.php";
session_start();
session_destroy();

header('location: '.ROOT.'/dashboard.php');
exit;