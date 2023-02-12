<?php
include 'Database.php';

	if ( !empty($_POST['password']) and !empty($_POST['login']) ) {
		
		$login = $_POST['login'];
		$password = $_POST['password'];
        $password = md5($password);
		  
        $getUsers = new DataBase();
        $query = "SELECT * FROM account WHERE login='$login' AND password='$password'";
        $resultUsers = $getUsers->getBasePrepare($query,Array());
		if ($resultUsers == true){
			$user = $resultUsers[0];
		} 
		 
		
	if (!empty($user)) {
			session_start(); 
		        $_SESSION['auth'] = true; 
                $_SESSION['id'] = $user['id']; 
			    $_SESSION['login'] = $user['login'];
                echo 'Привет, '.$_SESSION['login'] . " ". "Вы успешно вошли!  <a href='main.php'>Главная страница</a>";               
	    } else {
			echo 'Пользователь неверно ввел логин или пароль. Вернитесь на страницу <a href="index.html">авторизации.</a> ';
		}        
	}
?>
 


