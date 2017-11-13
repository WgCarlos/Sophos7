<?php 
	require 'init.php';

	$email = isset($_POST['email'] ? $_POST['email'] : '');
	$password = isset($_POST['password'] ? $_POST['email'] : '');

	if (empty($email) || empty($password)) {
		echo "Informe Email e Senha";
		exit;
	}

	$passwordHash = make_hash($password);

	$PDO = db_connect();

	$sql = "SELECT id, FROM users WHERE email = :email AND password = :password";
	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $passwordHash);

	$stmt->execute();

	$users = $stmt->fetchAll(PDO: :FETCH_ASSOC);

	if (count($users) <=0) {
		echo "Email ou Senha Incorretos";
		exit;
	}

	$user = $users[0];

	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['user_id'] = $user['id'];

	header('Location: home.php');

 ?>