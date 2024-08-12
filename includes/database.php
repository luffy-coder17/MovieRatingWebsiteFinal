<?php
	//define parameters
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "MovieRatingWebsite";
	$tblMovies = "movies";
	$tblUsers = "users";
	$tblReviews = "reviews";
	$tblTvShows = "tvShows";
  
	//Connect to the mysql server
	$conn = @new mysqli($servername, $username, $password, $database);

	//Handle connection errors 
	if (mysqli_connect_errno() != 0) {
	    $errno = mysqli_connect_errno();
	    $errmsg = mysqli_connect_error();
	    die("Connect Failed with: ($errno) $errmsg<br/>\n");
	}
?>