<?php 

if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['users'])) {
  header('location: '.ROOT.'/views/auth/login.php');
  exit;
}