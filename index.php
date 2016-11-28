<?php
require_once('App.php');

spl_autoload_register(function($class){
	
	if(file_exists($class . '.php'))
	{
		require_once($class . '.php');
	}
	else if(file_exists('models/' . $class . '.php')) 
	{
		require_once('models/' . $class . '.php');
	}
	else if(file_exists('controllers/' . $class . 'Controller.php'))
	{
		require_once('controllers/' . $class . 'Controller.php');
	}
});

$app = new App();


/*
require_once('DB.php');
require_once('models/User.php');

$db = new DB("IOSTest1", "localhost", "root", "");

$db->Query("SELECT * FROM users ", []);

$users = [];
foreach($db->getResult() as $r)
{
	$user = new User($r['ime'], $r['prezime'], $r['email'], $r['username'], $r['password']);
	$user->setId($r['id']);
	array_push($users, $user);
}

$json_users = json_encode($users);

echo $json_users;

$decoded_users = json_decode($json_users);


foreach($decoded_users as $user)
{
	$user = User::fromStdClass($user);
	echo "Email: " . $user->getEmail() . "</br>";
	echo "Id: " . $user->getId() . "</br>";
	echo "<hr>";
}


$db=NULL;
*/

