<?php
	include_once 'database-conn.inc.php';
 
	if($_GET['movie_id']){
		$movie_id = $_GET['movie_id'];

        $sql = "DELETE FROM movies WHERE 'movie_id' = $movie_id;";
        mysqli_query($conn, $sql);

		header("location: ../index.php");
	}	
?>