<?php include('header.php'); ?>
<?php require_once('database.php'); ?>


<?php 

if(!empty($_GET['id'])) {
  $review_id = intval($_GET['id']);

	$result = $db->prepare('select * from reviews where reviews.id = :review_id');
	$result->bindParam(':review_id', $review_id, PDO::PARAM_INT);
	$result->execute();

	$review = $result->fetch(PDO::FETCH_ASSOC);
	?>

<?php

}
?>

<!DOCTYPE html>

<html lang="en">

<body id="home">
	 <div class="container">
    <div class="jumbotron text-center">

    
  <h1><?php echo $review['title']?></h1>
  <p><?php echo 'Rating: '.$review['rating']?></p>
  	
  	</div>
  
   <ol><?php echo '<b>Review Contents: </b>'. $review['content']; ?> </ol>
   <ol><?//php echo '<b>Review Rating: </b>' .$review['rating']; ?></ol>

  </div>


</body>

</html>


