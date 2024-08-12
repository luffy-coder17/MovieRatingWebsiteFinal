<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .thumbnail {
        position: relative;
        overflow: hidden;
        transition: transform 0.5s ease-in-out; /* Increased duration to 0.5s and added ease-in-out for smoother effect */
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .thumbnail img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .thumbnail:hover {
        transform: scale(1.05);
    }
    .youtube-icon {
        color: #FF0000; /* Red color for the icon */
    }
    .youtube-icon:hover {
        color: #D50000; /* Darker red on hover */
    }
</style>



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
$content_type = isset($_GET['content_type']) ? $conn->real_escape_string($_GET['content_type']) : 'movie'; // Default to 'movie'

// Construct the SQL query based on the search term, selected genre, and content type
$query_str = "SELECT * FROM movies WHERE content_type = '$content_type'"; // Filter by content type

if ($search_term) {
    $query_str .= " AND movie_name LIKE '%$search_term%'"; // Add search term condition
}

if ($selected_genre && $selected_genre != 'all') {
    $query_str .= " AND genre = '$selected_genre'"; // Add genre filter condition
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
        // Display a message based on whether a search has been made
        if (!empty($search_term) || ($selected_genre && $selected_genre != 'all')) {
            if ($num_results > 0) {
                echo "Search Results"; // Display "Search Results" if content is found
            } else {
                echo "0 results found"; // Display "0 results found" if no content matches the criteria
            }
        } else {
            echo ucfirst($content_type); // Display 'Movies' or 'Webseries' based on the content type
        }
        ?>
    </h1>

    <!-- Display success message if redirected with success -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success text-center">
            <?php echo ucfirst($content_type) . " added successfully!"; ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
            <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                <div class="input-group">
                    <label class="sr-only" for="movieSearch">Search <?php echo ucfirst($content_type); ?></label>
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
                    </label>
                </div>
            </form>
        </div>
    </div>

    <div class="movie-list">
        <?php
        if ($num_results > 0) {
            // Display each movie/webseries in the result set
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
                               echo "<a href='" . $result_row['movie_trailer'] . "' target='_blank'><i class='fab fa-youtube youtube-icon'></i> Trailer </a>";

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
            // Display a message if no movies/webseries are found
            if (!empty($search_term) || ($selected_genre && $selected_genre != 'all')) {
                echo "<p>No " . $content_type . " found matching your criteria.</p>";
            } else {
                // Optionally display a message when no search has been made yet
                echo "<p>Use the search box and filters to find " . $content_type . ".</p>";
            }
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
