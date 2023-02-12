<?php 
session_start();
?>
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
        <div class="topnav">
            <a  href="main.php">Главная</a>
            <a  id="btnAddFilm">Добавить фильм</a> 
            <form name="search" class="search" method="post" action="search.php">
                <input type="search" name="query" placeholder="Поиск">
                <button type="submit">Найти</button>            
            </form>
            <a href="logout.php">Выйти</a>
        </div>
        
        <div class="container" id="popup"> <button style = "color: #FFFFFF" class="close"  id="btnClose">&#10006;</button>       
            <section>
                <form enctype="multipart/form-data" action="/save_form.php" method="post">
                <input type="file" name="poster" id="poster">
                    <div class="row">
                        <div class="col-25">
                            <label for="film">Фильм</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="filmName" name="film" placeholder="Название фильма">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="director">Режиссер</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="director" name="director" placeholder="Режиссер">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Страна</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="country" name="country" placeholder="Страна производства">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="studia">Студия</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="studia" name="studia" placeholder="Студия">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="dt_release">Дата релиза</label>
                        </div>
                        <div class="col-75">
                            <input type="date" id="dt" name="dt_release">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="duration">Прожолжительность</label>
                        </div>
                        <div class="col-75">
                            <input type="time" id="dt" name="duration">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="link">Ссылка на "Кинопоиск"</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="link" name="link">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="genre">Жанр</label>
                        </div>
                        <div class="col-75">
                            <select id="genre" name="genre">
                            <option value="Боевик">Боевик</option>
                            <option value="Комедия">Комедия</option>
                            <option value="Криминал">Криминал</option>
                            <option value="Драма">Драма</option>
                            <option value="Фэнтези">Фэнтези</option>
                            <option value="Исторический">Исторический</option>
                            <option value="Ужасы">Ужасы</option>
                            <option value="Романтика">Романтика</option>
                            <option value="Научная фантастика">Научная фантастика</option>
                            <option value="Триллер">Триллер</option>
                            <option value="Вестерн">Вестерн</option> 
                            <option value="Мультфильм">Мультфильм</option>          
                            </select>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-25">
                            <label for="full_desk">Описание</label>
                        </div>
                        <div class="col-75">
                            <textarea id="full_desk" name="full_desk" placeholder="Описание фильма" style="height:200px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit"  value="Сохранить"> 
                    </div>
                </form>
                            
            </section>            
        </div>
    <div class = 'render' id = 'render'>
        <?php         
        include "render.php";
        ?>       
    </div>  
    </body>
</html>