<?php
session_start();
include 'DataBase.php';
include 'upload.php';


    if (isset($_POST['film'])) {
         $film = $_POST['film'];
         if ($film == '') { unset($film);} 
        }    
    if (isset($_POST['director'])) {
          $director=$_POST['director'];
          if ($director =='') { unset($director);}
        }
    if (isset($_POST['country'])) {
        $country=$_POST['country'];
        if ($country =='') { unset($country);}
        }
    if (isset($_POST['studia'])) {
        $studia=$_POST['studia'];
        if ($studia =='') { unset($studia);}
        }
    if (isset($_POST['dt_release'])) {
        $dt_release=$_POST['dt_release'];
        if ($dt_release =='') { unset($dt_release);}
        }
    if (isset($_POST['duration'])) {
        $duration=$_POST['duration'];
        if ($duration =='') { unset($duration);}
        }
        if (isset($_POST['link'])) {
            $link=$_POST['link'];
            if ($link =='') { unset($link);}
            }
    if (isset($_POST['genre'])) {
        $genre=$_POST['genre'];
        if ($genre =='') { unset($genre);}
        }    
    if (isset($_POST['full_desk'])) {
        $full_desk=$_POST['full_desk'];
        if ($full_desk =='') { unset($full_desk);}
        }
       

    if (empty($film) or empty($director) or empty($country) or empty($studia) or empty($dt_release) or empty($duration) or empty($link) or empty($genre) or empty($full_desk))
    {
    exit ("Вы ввели не всю информацию, вернитесь <a href='main.php'>назад</a> и заполните все поля!");
    }

    $film = htmlspecialchars($film);
    $director = htmlspecialchars($director);   
    $country = htmlspecialchars($country);
    $studia = htmlspecialchars($studia);
    $link = htmlspecialchars($link);
    $full_desk = htmlspecialchars($full_desk);
  
   
    $date = date('d.m.Y H:i:s');      
    $id_account=$_SESSION['id'];        
    // function addLoginAndPasswordToFiles($login,$password){        
        $newDB = new DataBase();         
        $checkFilmExist = $newDB->getBasePrepare("SELECT id FROM films_list WHERE film='$film'", Array()); 
               
        if (!empty($checkFilmExist)) {
            exit ("Фильм уже существует.");
            }
        else {            
            $result = $newDB->setBasePrepare("INSERT INTO films_list (id_account, film, director, country, studia, dt_release, duration, genre, link, full_desk, poster) VALUES('$id_account', '$film','$director', '$country', '$studia', '$dt_release', '$duration', '$genre','$link', '$full_desk', '$img' )" , array());
                    
            if ($result==NULL)
            {
            echo "Фильм добавлен!  <a href='main.php'>Главная страница</a>";
            }
            else {
            echo "Ошибка!";
            }   
        }
        
    // }
    //         return $result;      
   
    ?>