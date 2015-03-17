<? include('header.php'); ?>
<? require_once('database.php'); ?>

<? try {
      $results = $db->query('Select companies.id, companies.name, companies.address, avg(reviews.rating) Average, count(reviews.rating) Total_Reviews from reviews join companies on companies.id = reviews.company_id group by companies.id order by Average DESC');
} catch(Exception $e) {
 echo $e->getMessage(); 
} 

$companies = $results->fetchAll(PDO::FETCH_ASSOC);
?>
 <div class="container">
 <div class="jumbotron text-center">
<h1>All Companies</h1>
	</div>



	<?php foreach($companies as $company){ ?>

	<h2><?php echo '<b>Company Name: </b>' .$company['name']; ?></h2>
	<ol><?php echo '<b>Company Address: </b>'. $company['address']; ?></ol>
   	<ol><?php echo '<b>Review Rating: </b>' .$company['Average']; ?></ol>
   	<ol><?php echo '<b>Number of Reviews: </b>' .$company['Total_Reviews'];?></ol>
    <?php echo '<ol><i class="lens"></i><a href="reviews.php?id='.$company['id'].'">'."View Company".'</a></ol>'; ?> <?php } ?> 

    </div>

