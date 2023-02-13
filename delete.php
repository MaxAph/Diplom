<?php
// function delete()
//         {
            include 'DataBase.php';                         
             $id = $_GET['id'];       
            $newDB = new DataBase();    
            $query_img ="SELECT poster FROM films_list where id = '$id'";
            $select_img = $newDB->getBasePrepare($query_img, array());
            $select_img = $select_img[0];
            $remove_img =  $select_img['poster'];            
            unlink($remove_img);
            $query = "DELETE FROM films_list where id = '$id'";
            $delete = $newDB->setBasePrepare($query,array());
            
            header('location:main.php');            
        // }    
?>