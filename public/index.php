<?php
//index.php

use MTG\Controllers\DatabaseConnection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// require_once __DIR__ . '/../Config/config.php';
require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->post('/register', function (Request $request, Response $response, $args) {
	$data = $request->getParsedBody();
  $username = $data['username'];
  $email = $data['email'];
  $password = $data['password'];
  $password2 = $data['password2'];

	if ($password !== $password2) {
		$response->getBody()->write('Passwords do not match');
    return $response->withStatus(400);
  }

	$db = new DatabaseConnection();
	$query = $db->getConnection()->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
	$query->bindParam(":username", $username);
	$query->bindParam(":email", $email);
	$query->bindParam(":password", $password);
	$result = $query->execute();

	if($result){
		$response->getBody()->write("You have registered");
	} else {
		$response->getBody()->write("There was a problem with the registration");
	}

	return $response;
});

$app->delete('/delete/{id}', function (Request $request, Response $response, $args) {
	// $data = $request->getParsedBody();
  $id = $args['id'];

	$db = new DatabaseConnection();
	$query = $db->getConnection()->prepare("DELETE FROM users WHERE user_id = :id");
	$query->bindParam(":id", $id);
	$query->execute();
	
	if($query->rowCount() >= 1){
		$response->getBody()->write("You have been deleted");
	} else {
		$response->getBody()->write("There was a problem with the deletion");
	}

	return $response;
});


$app->run();
?>