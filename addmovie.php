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

require_once('includes/database.php');
$page_title = "Add Movie";
require_once('includes/header.php');

?>
<div class="container wrapper">
  <ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Add Movie</li>
  </ul>

  <h1 class="text-center">ADD MOVIE</h1>
  <p class="lead text-center">Please add your desired movie</p>
  <div class="col-xs-8 col-xs-offset-2">
    <form class="form-horizontal" role="form" action="processmovie.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="newMovieName" class="col-sm-3 control-label">Title</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="newMovieName" name="movie_name" placeholder="Movie Title" required>
        </div>
      </div>
      <div class="form-group">
        <label for="movieYear" class="col-sm-3 control-label">Year</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" id="movieYear" name="movie_year" placeholder="Year" required>
        </div>
      </div>
      <div class="form-group">
        <label for="movieBio" class="col-sm-3 control-label">Storyline</label>
        <div class="col-sm-9">
          <textarea class="form-control" id="movieBio" name="movie_bio" rows="4" placeholder="Enter Storyline" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="newImage" class="col-sm-3 control-label">Movie Cover URL</label>
        <div class="col-sm-9">
          <input type="text" id="newImage" class="form-control" name="movie_img" placeholder="Enter URL" required>
        </div>
      </div>
      <div class="form-group">
        <label for="movieRating" class="col-sm-3 control-label">Rating</label>
        <div class="col-sm-9">
          <select id="movieRating" name="movie_rating" class="form-control" required>
            <option value="G">G</option>
            <option value="PG">PG</option>
            <option value="PG-13">PG-13</option>
            <option value="R">R</option>
            <option value="NR">NR (Not Rated)</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="movieTrailer" class="col-sm-3 control-label">Movie Trailer Link</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="movieTrailer" name="movie_trailer" placeholder="Enter YouTube URL" required>
        </div>
      </div>
      <div class="form-group">
        <label for="movieGenre" class="col-sm-3 control-label">Genre</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="movieGenre" name="genre" placeholder="Enter Genre" required>
        </div>
      </div>
      <div class="form-group">
        <label for="contentType" class="col-sm-3 control-label">Content Type</label>
        <div class="col-sm-9">
          <select id="contentType" name="content_type" class="form-control" required>
            <option value="movie">Movie</option>
            <option value="webseries">Web Series</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success">Add Movie</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
  include('includes/footer.php');
?>
