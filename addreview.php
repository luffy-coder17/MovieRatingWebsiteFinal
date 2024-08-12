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

$page_title = "ReviewHub: Add Review";
require_once ('includes/header.php');
require_once('includes/database.php');

$movie_id = $_GET['id'];

?>

<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li class="active">Adding Reviews</li>
    </ul>

    <h1 class="text-center">Add Review</h1>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-2">
            <form action="createreview.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>"/>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-right" for="addRating">Add Rating</label>
                    <div class="col-sm-9">
                        <div class="star-rating">
                            <input type="hidden" name="review_rating" id="review_rating" value="0">
                            <span class="fa fa-star" data-rating="1"></span>
                            <span class="fa fa-star" data-rating="2"></span>
                            <span class="fa fa-star" data-rating="3"></span>
                            <span class="fa fa-star" data-rating="4"></span>
                            <span class="fa fa-star" data-rating="5"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-right" for="addReview">Review Text</label>
                    <div class="col-sm-9">
                        <textarea name="review_content" placeholder="Write Review" id="addReview" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Add!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

// close the connection.
$conn->close();
include_once('includes/footer.php');
?>

<style>
.star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    padding: 10px;
}

.star-rating .fa-star {
    font-size: 2em;
    color: #ccc;
    cursor: pointer;
}

.star-rating .fa-star.checked {
    color: #1E90FF;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating .fa-star');
        const ratingInput = document.getElementById('review_rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                ratingInput.value = rating;
                updateStars(rating);
            });

            star.addEventListener('mouseover', function() {
                const rating = this.getAttribute('data-rating');
                updateStars(rating);
            });

            star.addEventListener('mouseout', function() {
                updateStars(ratingInput.value);
            });
        });

        function updateStars(rating) {
            stars.forEach(star => {
                if (star.getAttribute('data-rating') <= rating) {
                    star.classList.add('checked');
                } else {
                    star.classList.remove('checked');
                }
            });
        }
    });
</script>
