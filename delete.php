<?php
// function delete()
//         {
            include 'DataBase.php';                         
            $id = $_GET['id'];           
            $newDB = new DataBase();            
            $query = "DELETE FROM films_list where id = '$id'";
            $delete = $newDB->setBasePrepare($query,array());
            
            header('location:main.php');            
        // }    
?>