<?php 
session_start();
include 'DataBase.php';
$id=$_GET['id'];
$newDB = new DataBase();         
$edit_film = $newDB->getBasePrepare("SELECT * FROM films_list WHERE id = $id", Array());
$film_data=$edit_film[0];
$film=$film_data['film'];
$director=$film_data['director'];
$country=$film_data['country'];
$studia=$film_data['studia'];
$dt_release=$film_data['dt_release'];
$genre=$film_data['genre'];
$full_desk=$film_data['full_desk'];
$duration=$film_data['duration'];
$link=$film_data['link'];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
    href="css/styleRed.css"
    />
</head>
<body>

<h2 class="header">Форма редактирования</h2>


<div class="container_2">   <form action = "main.php">
  <input type="submit"  value="X"> </form>    
 
  <form enctype="multipart/form-data" action="/save_edit_form.php?id=<?php echo $id ?>" method="post">
  <input type="file" name="poster" id="poster" >
    <div class="row">
      <div class="col-25">
        <label for="film">Фильм</label>
      </div>
      <div class="col-75">
        <input type="text" id="filmName" name="film" value ='<?php echo $film?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="director">Режиссер</label>
      </div>
      <div class="col-75">
        <input type="text" id="director" name="director"  value ='<?php echo $director?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Страна</label>
      </div>
      <div class="col-75">
        <input type="text" id="country" name="country" value ='<?php echo $country?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="studia">Студия</label>
      </div>
      <div class="col-75">
        <input type="text" id="studia" name="studia" value ='<?php echo $studia?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="dt_release">Дата релиза</label>
      </div>
      <div class="col-75">
        <input type="date" id="dt" name="dt_release" value ='<?php echo $dt_release?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="duration">Прожолжительность</label>
      </div>
      <div class="col-75">
        <input type="time" id="dt" name="duration" value ='<?php echo $duration?>'>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="link">Ссылка на "Кинопоиск"</label>
        </div>
        <div class="col-75">
            <input type="text" id="link" name="link"  value ='<?php echo $link?>'>
        </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="genre">Жанр</label>
      </div>
      <div class="col-75">
        <select id="genre" name="genre" >
          <option value ='<?php echo $genre?>' selected><?php echo $genre?></option>
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
        <textarea id="full_desk" name="full_desk" style="height:200px"><?php echo $full_desk?></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit"  value="Сохранить" > 
    </div>
  </form>

  </div>

</body>
</html>



