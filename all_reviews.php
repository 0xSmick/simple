<? include('header.php'); ?>
<? require_once('database.php'); ?>

<?php try {
      $results = $db->query('Select * from reviews');
} catch(Exception $e) {
 echo $e->getMessage(); 
  die();
} 

$reviews = $results->fetchAll(PDO::FETCH_ASSOC);
?>
 <div class="container">
 <div class="jumbotron text-center">
<h1>All Reviews</h1>
	</div>
	</div>
<ol>
	<?php 
	foreach($reviews as $review){
     echo '<li><i class="lens"></i><a href="reviews.php?id='.$review["id"].'">'.$review["title"].'</li>'; 
    }
	?>
</ol>
