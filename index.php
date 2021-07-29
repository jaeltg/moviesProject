<?php

include_once 'includes/database-conn.inc.php'

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

    <form action="includes/movies.inc.php" method="POST">
        <label for="movie" id="movie">Movie to Watch:</label>
        <input type="text" name="movie" placeholder="Movie Name" required>
        <br>
        <button type="submit" name="submit" id="submit">Add Movie</button>
    </form>

    <h2>To Watch List:</h2>

    <table>
    <tbody>
    <?php 
            $movies = mysqli_query($conn, "SELECT * FROM movies");
            $resultCheck = mysqli_num_rows($movies);

            if (isset($_GET['del_movie'])) {
                $id = $_GET['del_movie'];
            
                mysqli_query($conn, "DELETE FROM movies WHERE movie_id =".$id);
                header('location: index.php');
            }

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($movies)) { ?>
                    <li> <?php echo $row['movie']; ?> 
                    <a href='index.php?del_movie=<?php echo $row['movie_id']?>'> 
                    Watched </a> 
                    </li>
           <?php         
                }
            }
            ?>

    </tbody>

    
    
    </table> 

    <button>
        Select Movie
    </button>
    
    <?php
    $selected_movie = array_rand($movies, 1);
    
    ?>

    <p>
    <?php
    echo $selected_movie;
    ?>
    </p>

</body>
</html>