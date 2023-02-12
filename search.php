<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styleRed.css"/>
  <title>Главная</title>
  <script type="module" crossorigin src="main.js"></script>
</head>    
    <body>

<?php 
include "DataBase.php";
    error_reporting(0);
    $query = $_POST['query'];
    $newDB = new DataBase();      

    if (!empty($query)) 
    { 
        if (strlen($query) < 3) {
            echo '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            echo '<p>Слишком длинный поисковый запрос.</p>';
        } else {             
            $render = $newDB->getDataBase("SELECT *
            FROM films_list WHERE film LIKE '%$query%'", Array());
           
            $film = $render[0];
            $id = $film['id'];
            $title = $film['film'];
            $director = $film['director'];
            $studia = $film['studia'];
            $dt_release = $film['dt_release'];
            $duration = $film['duration'];
            $tag = $film['genre'];
            $country = $film['country'];
            $full_desk = $film['full_desk'];
            $poster = $film['poster'];            
        }        

        if ($render== true){
            echo 
            '<div class="row gy-5">
            <div class="col-md-6 mb-4" style="width: 50%;">' .                
            '<div class="col-md-6 mb-4">
            <div style = "margin-top: 20px" class="bg-image hover-overlay ripple shadow-2-strong rounded-5 " data-mdb-ripple-color="light">
                <div><img src="'.$poster.'" class="img-fluid" /></div>                        
            </div>
            </div>'. 
                '<div><h3 class="card-title">' . $title . '</h3></div>'. 
                '<div><span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">' . $tag .'</span></div>' .                                
                '<label for="director">Режиссер:</label><text class="card-subtitle mb-2 text-muted" name="director">' . $director . '</text>' . 
                '<div><label for="country">Страна производства:</label><text class="card-subtitle mb-2 text-muted" name="country">' . $country . '</text></div>' .
                '<div><label for="dt_release">Дата выхода:</label><text class="card-subtitle mb-2 text-muted" name="dt_release">' . $dt_release . '</text></div>' .
                '<div><label for="duration">Продолжительность:</label><text class="card-subtitle mb-2 text-muted" name="duration">' . $duration . '</text></div>' .
                '<h4>Описание</h4>'.
                '<p class="card-text">' . $full_desk . '</p>' .
                '<a href="main.php" class="btn btn-primary">' . 'Назад' . '</a>'. 
                '<a href="" class="btn btn-primary">' . 'Подробнее...' . '</a>' .                             
                '<a href="delete.php?id='.$id.'" class="btn btn-primary">Удалить</a>'.
                '<a href="edit_form.php?id='.$id.'" class="btn btn-primary">Редактировать</a>'.                                                     
            '</div>
                </div>
                </div>' ; 
        }  else {
            echo 'Фильм не найден. Вернитесь на <a href ="main.php">главную страницу</a>.';
        }                       
    }
    ?>
       </body>
</html>
