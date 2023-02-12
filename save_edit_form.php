<?php
session_start();
include 'DataBase.php';
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
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }    
   
        $date = date('d.m.Y H:i:s'); 
          
        // function addLoginAndPasswordToFiles($login,$password){        
        $newDB = new DataBase();          
        $id=$_GET['id'];
                   
        $result = $newDB->setBasePrepare("UPDATE films_list
        SET  film='$film', dt_release='$dt_release', genre='$genre', country='$country', studia='$studia', director='$director', duration='$duration', link='$link', full_desk='$full_desk'
        WHERE id = $id" , array());
        if ($result==NULL)
        {
        echo "Фильм отредактирован!  <a href='main.php'>Главная страница</a>";
        }
        else {
        echo "Ошибка!";
        }   
        
        
    // }
    //         return $result;      
   
    ?>