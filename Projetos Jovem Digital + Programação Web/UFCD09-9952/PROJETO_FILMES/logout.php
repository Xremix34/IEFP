<?php
  echo "<p>A sair</p>";
  session_destroy();

  header("Location: ./login/index.html");
  die();

?>