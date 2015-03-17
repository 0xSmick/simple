<?php require_once('database.php'); ?>

<?php

if(function_exists($_GET['function'])) {
	$_GET['function']();
}

function getAllCompanies() {
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
      $results = $db->query('Select * from companies');
      $companies = $results->fetchAll(PDO::FETCH_ASSOC);
      $companies = json_encode($companies);
      echo $companies;
} 

function getAllReviews() {
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$results = $db->query('Select * from reviews');
	$reviews = $results->fetchAll(PDO::FETCH_ASSOC);
	$reviews = json_encode($reviews);
	echo $reviews;
}

function getCompany() {
	$id = (int)$_GET['id'];
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$results = $db->prepare('SELECT * from Companies where companies.id = :id');
	$results->bindParam(':id', $id, PDO::PARAM_INT);
	$results->execute();
	$company = $results->fetch(PDO::FETCH_ASSOC);
	$company = json_encode($company);
	echo $company;

}

function getReview() {
	$id = $_GET['id'];
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$results = $db->prepare('SELECT * from Reviews where reviews.id = :id');
	$results->bindParam(':id', $id, PDO::PARAM_INT);
	$results->execute();
	$review = $results->fetch(PDO::FETCH_ASSOC);
	$review = json_encode($review);
	echo $review;

}

function getReviewByCompanyId() {
	$id = $_GET['id'];
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$results = $db->prepare('select * from reviews join companies on companies.id = reviews.company_id where companies.id = :id');
	$results->bindParam(':id', $id, PDO::PARAM_INT);
	$results->execute();
	$review = $results->fetchAll(PDO::FETCH_ASSOC);
	$review = json_encode($review);
	echo $review;
}

function createReview() {
	$c_id = $_GET['id'];
	$title = $_GET['title'];
	$content = $_GET['content'];
	$rating = $_GET['rating'];
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$query = $db->prepare('insert into reviews (company_id, title, content, rating) VALUES (:c_id, :title, :content, :rating)');
	$results = $query->execute(array(
		":c_id" => $c_id,
		":title" => $title,
		":content" => $content,
		":rating" => $rating));
	echo $query->rowCount() . " record CREATED successfully";
}

function updateReview() {
	$r_id = $_GET['id'];
	$title = $_GET['title'];
	$content = $_GET['content'];
	$rating = $_GET['rating'];
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$query = $db->prepare('UPDATE reviews SET title = :title, content = :content, rating = :rating where reviews.id = :r_id');
	$results = $query->execute(array(
		":r_id" => $r_id,
		":title" => $title,
		":content" => $content,
		":rating" => $rating));
	echo $query->rowCount() . " record UPDATED successfully";

}

function deleteReview() {
	$r_id = $_GET['id'];
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
	$results = $db->prepare('DELETE from reviews where reviews.id = :r_id');
	$results->bindParam(':r_id', $r_id, PDO::PARAM_INT);
	$results->execute();
	$review = $results->fetch(PDO::FETCH_ASSOC);
	echo $results->rowCount() . " record DELETED successfully";
}


?>