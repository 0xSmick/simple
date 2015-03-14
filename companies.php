<? include('header.php'); ?>
<? require_once('database.php'); ?>

<? try {
      $results = $db->query('Select companies.id, companies.name, companies.address, avg(reviews.rating) Average, count(reviews.rating) Total_Reviews from reviews join companies on companies.id = reviews.company_id group by companies.id');
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
     echo '<li><i class="lens"></i><a href="reviews.php?id='.$company["id"].'">'.$company["name"].' Review Average: '. $company["Average"].'</li>'; 
    }
	?>
</ol>
