<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleFooter.css">
</head>
<body>
    
</body>
</html>
<?php

$page_title = "ReviewHub: Search Results";

require_once('includes/header.php');
require_once('includes/database.php');

// Capture the search term, selected genre, and content type from the form submission
$search_term = isset($_GET['movie']) ? $conn->real_escape_string($_GET['movie']) : '';
$selected_genre = isset($_GET['filter']) ? $conn->real_escape_string($_GET['filter']) : '';
$selected_content_type = isset($_GET['content_type']) ? $conn->real_escape_string($_GET['content_type']) : 'all';

// Construct the SQL query based on the search term, selected genre, and content type
$query_str = "SELECT * FROM movies WHERE 1=1"; // Base query

if ($search_term) {
    $query_str .= " AND movie_name LIKE '%$search_term%'"; // Add search term condition
}

if ($selected_genre && $selected_genre != 'all') {
    $query_str .= " AND genre = '$selected_genre'"; // Add genre filter condition
}

if ($selected_content_type && $selected_content_type != 'all') {
    $query_str .= " AND content_type = '$selected_content_type'"; // Add content type filter condition
}

// Execute the query
$result = $conn->query($query_str);

if (!$result) {
    // Handle query execution error
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}

// Get the number of results
$num_results = $result->num_rows;

?>

<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Search Results</li>
    </ul>

    <h1 class="text-center">
        <?php
        if ($num_results > 0) {
            echo "$num_results search result(s) found"; // Display the number of search results found
        } else {
            echo "0 results found"; // Display "0 results found" if no movies or web series match the criteria
        }
        ?>
    </h1>

    <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
            <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                <div class="input-group">
                    <label class="sr-only" for="movieSearch">Search</label>
                    <div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
                    <input type="text" name="movie" placeholder="Search" id="movieSearch" class="form-control" value="<?php echo htmlspecialchars($search_term); ?>"/>
                </div>
                <button type="button" class="btn btn-secondary" id="filterButton">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <button type="submit" class="btn btn-primary">Go!</button>
                <div id="filterOptions">
                    <!-- Genre filter options -->
                    <label>
                        <input type="radio" name="filter" value="all" <?php if ($selected_genre == 'all') echo 'checked'; ?>> All
                    </label><br>
                    <label>
                        <input type="radio" name="filter" value="action" <?php if ($selected_genre == 'action') echo 'checked'; ?>> Action
                    </label><br>
                    <label>
                        <input type="radio" name="filter" value="comedy" <?php if ($selected_genre == 'comedy') echo 'checked'; ?>> Comedy
                    </label><br>
                    <label>
                        <input type="radio" name="filter" value="drama" <?php if ($selected_genre == 'drama') echo 'checked'; ?>> Drama
                    </label><br>
                    <label>
                        <input type="radio" name="filter" value="horror" <?php if ($selected_genre == 'horror') echo 'checked'; ?>> Horror
                    </label><br>
                    <label>
                        <input type="radio" name="filter" value="romance" <?php if ($selected_genre == 'romance') echo 'checked'; ?>> Romance
                    </label><br>
                    <label>
                        <input type="radio" name="filter" value="sci-fi" <?php if ($selected_genre == 'sci-fi') echo 'checked'; ?>> Sci-Fi
                    </label><br>

                    <!-- Content type filter options -->
                    <label>
                        <input type="radio" name="content_type" value="all" <?php if ($selected_content_type == 'all') echo 'checked'; ?>> All
                    </label><br>
                    <label>
                        <input type="radio" name="content_type" value="movie" <?php if ($selected_content_type == 'movie') echo 'checked'; ?>> Movies
                    </label><br>
                    <label>
                        <input type="radio" name="content_type" value="webseries" <?php if ($selected_content_type == 'webseries') echo 'checked'; ?>> Web Series
                    </label>
                </div>
            </form>
        </div>
    </div>

    <div class="movie-list">
        <?php
        if ($num_results > 0) {
            // Display each movie or web series in the result set
            $i = 0;
            while ($result_row = $result->fetch_assoc()) :
                $i++;
                if ($i == 1) :
                    ?>
                    <div class="row">
                <?php endif; ?>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <div class="text-center">
                                <a href="moviedetails.php?id=<?php echo $result_row['movie_id'] ?>">
                                    <img src="<?php echo $result_row['movie_img'] ?>" />
                                </a>
                            </div>
                            <h3 class="text-center">
                                <?php
                                echo "<a href='moviedetails.php?id=" . $result_row['movie_id'] . "'>", $result_row['movie_name'], "</a>";
                                ?>
                            </h3>
                            <div class="text-center">
                                <?php
                                echo "<a href='" . $result_row['movie_trailer'] . "' target='_blank'><i class='fab fa-youtube'></i> Trailer </a>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($i == 3) : ?>
                </div>
                <?php $i = 0; endif; endwhile; ?>
            <?php
        } else {
            // Display a message if no movies or web series are found
            echo "<p>No movies or web series found matching your criteria.</p>";
        }
        ?>
    </div>
</div>

<?php
// Clean up the result set
$result->close();
// Close the database connection
$conn->close();

include('includes/footer.php');
?>

<style>
    #filterOptions {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        width: 200px;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        z-index: 1000;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        opacity: 0;
        visibility: hidden;
    }

    #filterOptions.show {
        opacity: 1;
        visibility: visible;
    }
</style>

<script>
    // Toggle the display of filter options
    document.getElementById('filterButton').addEventListener('click', function() {
        var filterOptions = document.getElementById('filterOptions');
        if (filterOptions.classList.contains('show')) {
            filterOptions.classList.remove('show');
        } else {
            filterOptions.classList.add('show');
        }
    });
</script>
