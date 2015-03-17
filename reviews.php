<?php include('header.php'); ?>
<?php require_once('database.php'); ?>


<?php 

if(!empty($_GET['id'])) {
  $company_id = intval($_GET['id']);

	$results = $db->prepare('select * from reviews join companies on companies.id = reviews.company_id where companies.id = ? group by companies.id');
	$results->bindParam(1, $company_id);
	$results->execute();

	$title = $results->fetch(PDO::FETCH_ASSOC);
		if ($title == FALSE) {
			echo 'Sorry the title was not found';
		}
	?>

<?php
try {
  $results = $db->prepare('select reviews.id Reviews_id, reviews.title, reviews.content, reviews.rating from reviews join companies on companies.id = reviews.company_id where companies.id = ? order by reviews.rating DESC');
  $results->bindParam(1, $company_id);
  $results->execute();
} catch(Exception $e) {
 echo $e->getMessage(); 
  die();
}

$reviews = $results->fetchALL(PDO::FETCH_ASSOC);
  if ($reviews == FALSE) {
    echo 'Sorry no reviews found';
}
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">
	 <div class="container">
    <div class="jumbotron text-center">

    
  <h1><?php echo $title['name']?></h1>
  <p><?php echo 'Average Rating: '.$title['rating']?></p>
  <p><?php echo 'Address: '.$title['address'] ?></p>
  	
  	</div>

  	<?php foreach($reviews as $review) {	?>
  <h2><?php echo 'Title: '.$review['title']; ?></h2>
  
   <ol><?php echo '<b>Review Contents: </b>'. $review['content']; ?></ol>
   <ol><?php echo '<b>Review Rating: </b>' .$review['rating']; ?></ol>
   <ol><?php echo '<i class="lens"></i><a href="review.php?id='.$review['Reviews_id'].'"">'."View Full Review".'</a></ol>'; ?> <?php } ?> 

  </div>


</body>

</html>


