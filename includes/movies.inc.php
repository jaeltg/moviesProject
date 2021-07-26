<?php
  include_once 'database-conn.inc.php';

  $movie = $_POST['movie'];

  $sql = "INSERT INTO movies (movie) VALUES ('$movie');";
  mysqli_query($conn, $sql);

  header('Location: ../index.php');
 ?> 