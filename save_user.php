<?php
include 'DataBase.php';
session_start();

    if (isset($_POST['login'])) {
         $login = $_POST['login'];
         if ($login == '') { unset($login);} 
        }    
    if (isset($_POST['password'])) {
          $password=$_POST['password'];
          if ($password =='') { unset($password);}
        }
    if (isset($_POST['email'])) {
        $email=$_POST['email'];
        if ($email =='') { unset($email);}
        }    
    if (empty($login) or empty($password) or empty($email))
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }      
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $email = trim($email);
    $date = date('d.m.Y H:i:s');    
        
    // function addLoginAndPasswordToFiles($login,$password){        
        $newDB = new DataBase();         
        $checkAccExist = $newDB->getBasePrepare("SELECT id FROM account WHERE login='$login'", Array());
                           
        if (!empty($checkAccExist)) {
            exit ("Логин уже существует. Введите другой логин.");
            }
        else {
            $password = md5($password);
            $result = $newDB->setBasePrepare("INSERT INTO account (login, password, dt_create, email) VALUES('$login','$password', '$date', '$email')" , array());
                    
            if ($result==NULL)
            {
            echo "Вы успешно зарегистрированы!  <a href='main.php'>Главная страница</a>";
            }
            else {
            echo "Ошибка! Вы не зарегистрированы.";
            }   
        }
    // }
    //         return $result;      
   
    ?>