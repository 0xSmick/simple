<? include('header.php'); ?>
<? require_once('database.php'); ?>

<? try {
      $results = $db->query('select * from companies');
} catch(Exception $e) {
 echo $e->getMessage(); 
  die();
} 

$companies = $results->fetchAll(PDO::FETCH_ASSOC);
?>
 <div class="container">
 <div class="jumbotron text-center">
<h1>All Companies</h1>
	</div>
	</div>
<ol>
	<?php 
	foreach($companies as $company){
     echo '<li><i class="lens"></i><a href="reviews.php?id='.$company["id"].'">'.$company["name"].'</li>'; 
    }
	?>
</ol>
