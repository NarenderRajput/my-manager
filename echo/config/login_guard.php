<?php 

if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['users'])) {
  header('location: /echo/views/auth/login.php');
  exit;
}