<?php

$errors = "";

$db = mysqli_connect("localhost", "root", "", "movies");

if (isset($_POST['submit'])) {
    if (empty($_POST['movie'])) {
        $errors = "Please enter a movie title!";
    }else{
        $task = $_POST['movie'];
        $sql = "INSERT INTO movies (movie) VALUES ('$movie')";
        mysqli_query($db, $sql);
        header('location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimizer</title>
</head>

<body>
<h1>Movimizer</h1>

<form method="POST" action="index.php" class="input_form">
    <label for="movie" id="movie">Movie to Watch:</label>
    <input type="text" name="movie" placeholder="Movie Name">
    <br>
    <button type="submit" name="submit" id="add_btn">Add Movie</button>
</form>


<h2>To Watch List:</h2>


    
</body>
</html>