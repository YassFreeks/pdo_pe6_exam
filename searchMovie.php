<?php

require_once 'vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepo = new MovieRepository();

if (isset($_POST['search'])) {
    $searchTitle = $_POST['search'];

    $movies = $movieRepo->findByTitle($searchTitle);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movies</title>
</head>

<body>
    <h1>Search Movies</h1>

    <form method="post" action="">
        <input type="text" name="search" placeholder="Enter movie title">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($movies) && !empty($movies)) : ?>
        <h2>Found Movies:</h2>
        <ul>
            <?php foreach ($movies as $movie) : ?>
                <li><?php echo $movie['title']; ?> - <?php echo $movie['release_date']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No movies found.</p>
    <?php endif; ?>
</body>

</html>