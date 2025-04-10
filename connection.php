<?php

function sql_connection() {
  global $__SQL_CONNECTION;
  if (isset($__SQL_CONNECTION)) return $__SQL_CONNECTION;

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db_name = 'casdatw-2025';

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $db = mysqli_connect($host, $user, $pass, $db_name);
  if (!$db) die(mysqli_connect_error());
  $__SQL_CONNECTION = $db;
  return $__SQL_CONNECTION;
}

function sql_disconnect() {
  global $__SQL_CONNECTION;
  if (!isset($__SQL_CONNECTION)) return;
  mysqli_close($__SQL_CONNECTION);
  $__SQL_CONNECTION = null;
}


?>
