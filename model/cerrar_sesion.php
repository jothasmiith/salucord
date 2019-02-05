<?php
  session_destroy();
  include("../desconexion.php");
  unset($_SESSION["usuario"]);
  header("Location: ../index.html");
  exit;
?>