<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
</head>
<body>
    
</body>
</html>
<?php
// Start a new session
session_start();

$page_title = "Add Movie";

require_once 'includes/header.php';
require_once 'includes/database.php';

// Retrieve data from POST request
$title = $_POST['movie_name'] ?? '';
$year = $_POST['movie_year'] ?? '';
$bio = $_POST['movie_bio'] ?? '';
$rating = $_POST['movie_rating'] ?? '';
$image = $_POST['movie_img'] ?? '';
$trailer = $_POST['movie_trailer'] ?? '';
$genre = $_POST['genre'] ?? '';
$content_type = $_POST['content_type'] ?? 'movie';

// Debugging: print the values (remove or comment out in production)
echo "Title: $title<br>";
echo "Year: $year<br>";
echo "Bio: $bio<br>";
echo "Rating: $rating<br>";
echo "Image: $image<br>";
echo "Trailer: $trailer<br>";
echo "Genre: $genre<br>";
echo "Content Type: $content_type<br>";

// Validate the inputs
if (empty($title) || empty($year) || empty($bio) || empty($rating) || empty($image) || empty($trailer) || empty($genre) || empty($content_type)) {
    echo "All fields are required.";
    exit;
}

// Prepare the SQL statement
$query_str = "INSERT INTO movies (movie_name, movie_year, movie_rating, movie_bio, movie_img, movie_trailer, genre, content_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query_str);
$stmt->bind_param("ssssssss", $title, $year, $rating, $bio, $image, $trailer, $genre, $content_type);


// Execute the query
if ($stmt->execute()) {
    // Check the content type and redirect accordingly with success message
    if ($content_type == 'movie') {
        header("Location: movies.php?success=1");
    } elseif ($content_type == 'webseries') {
        header("Location: webseries.php?success=1");
    }
    exit;
} else {
    // Handle error
    $errno = $stmt->errno;
    $errmsg = $stmt->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
