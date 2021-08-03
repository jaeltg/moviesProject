<?php

include_once 'includes/database-conn.inc.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Righteous&display=swap" rel="stylesheet">
    <title>Movimizer</title>
</head>

<body>

    <h1 class="title">Movimizer</h1>

    <form action="includes/movies.inc.php" method="POST" class="movie-form">
        <label for="movie" id="movie">Movie to Watch:</label>
        <input type="text" name="movie" placeholder="Movie Name" required>
        <br>
        <button type="submit" name="submit" id="submit">Add Movie</button>
    </form>

    <div class="grid-container"> 

        <div class="movie-list"> 

            <h2>To Watch List:</h2>  

            <ul>
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
                            <a href='index.php?del_movie=<?php echo $row['movie_id']?>' class="watched-button"> 
                            Watched </a> 
                            </li>
                <?php         
                        }
                    }
                    ?>

            </ul>

        </div>

        <div class="random-movie">

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
                function selectRandomMovie() {
                    $.ajax({url:"script.php", success:function(result){
                        $("p").text(result);}
                    });
                }   
            </script>

            <button onclick="selectRandomMovie()" class="random-button"> Movimize! </button>

            <p></p>

        </div>

    </div>

</body>