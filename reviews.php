<?php include('header.php'); ?>
<?php require_once('database.php'); ?>


<?php 

if(!empty($_GET['id'])) {
  $company_id = intval($_GET['id']);
  

try {
  $results = $db->prepare('select * from reviews join companies on companies.id = reviews.company_id where companies.id = ? group by companies.id');
  $results->bindParam(1, $company_id);
  $results->execute();
} catch(Exception $e) {
 echo $e->getMessage(); 
  die();
}

$reviews = $results->fetch(PDO::FETCH_ASSOC);
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
  <h1><?php echo $reviews['name']?></h1>
  	</div>
  <h2><?php   echo 'Title: '.$reviews['title']; ?></h2>
  
   <ol><?php echo '<b>Review Contents: </b>'. $reviews['content']; ?> </ol>
   <ol><?php echo '<b>Review Rating: </b>' .$reviews['rating']; ?></ol>
   </div>

</body>

</html>


