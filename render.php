<?php

include 'DataBase.php';

 $newDB = new DataBase();
 $result = $newDB->openDataBase();
 $query = 'SELECT * FROM films_list';
// var_dump($result);
$resultdataBase = $newDB->getBasePrepare($query,Array());
if($resultdataBase == array(0)){
    echo 'Здесь пока ничего нет. Пожалуйста добавьте <a href="form.php">фильм.</a>';
} else {
    try {
    $total = $result->query('
            SELECT
                COUNT(*)
            FROM
            films_list
        ')->fetchColumn();
    $limit = 1;
    $pages = ceil($total / $limit);
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));
    $offset = ($page - 1)  * $limit;
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page='
    . ($page - 1) . '" title="Previous page">&lsaquo;</a>' :
    '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) .
    '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' :
    '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';       

    $stmt = $result->prepare('
            SELECT
                *
            FROM
            films_list
            ORDER BY
            id
            LIMIT
                :limit
            OFFSET
                :offset
        ');

        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {        
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $iterator = new IteratorIterator($stmt);
        
            foreach ($iterator as $value) {
                
                $id = $value['id'];
                $title = $value['film'];
                $date = $value['dt_release'];
                $full_desk = $value['full_desk'];            
                $tag = $value['genre']; 
                $poster= $value['poster']; 
                $country = $value['country'];
                $dt_release = $value['dt_release'];
                $duration = $value['duration'];    
                $director = $value['director'];  
                $link = $value['link'];    
                echo 
                '<div class="col-md-6 mb-4" style="width: 50%;">' .                
                    '<div class="col-md-6 mb-4">
                    <div style = "margin-top: 20px" class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                        <img src="'.$poster.'" class="img-fluid"/>                        
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
                        '<a href="'.$link.'" class="btn btn-primary">' . 'Кинопоиск' . '</a>' .                             
                        '<a href="delete.php?id='.$id.'" class="btn btn-primary">Удалить</a>'.
                        '<a href="edit_form.php?id='.$id.'" class="btn btn-primary">Редактировать</a>'.                                                     
                    '</div>
                </div>' ;                             
            }
        } else {
            echo '<p>No results could be displayed.</p>';
        }
    } catch (Exception $e) {
        echo '<p>', $e->getMessage(), '</p>';
    }
    echo 
    '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages ',
     $nextlink, ' </p></div>'; 

}
?>