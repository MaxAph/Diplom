<?php
session_start();
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
    $limit = 2;
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
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <nav aria-label="Page navigation example">
     <ul class="pagination">
<?php
    $prevlink = ($page > 1) ? '<li class="page-item"><a class="page-link" href="?page=1" title="First page">Previous</a href="?page='
    . ($page - 1) . '" title="Previous page">&lsaquo;</a>"></li>' :
    '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    $nextlink = ($page < $pages) ? '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) .
    '" title="Next page">&rsaquo;>Next</a><a href="?page=' . $pages . '" title="Last page">&raquo;</a></li>' :
    '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    echo 
    '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages ',
     $nextlink, ' </p></div>';
?>
 </ul>
   </nav> 

 
   
<?php   

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
                echo 
                    '<div class="card" style="width: 50%;">' .
                        '<span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">' . $tag .'</span>' .
                            '<div class="card-body">' . '<img src="'.$poster.'">'. 
                                '<h5 class="card-title">' . $title . '</h5>' . '</a>'. 
                                '<h6 class="card-subtitle mb-2 text-muted">' . $date . '</h6>' . 
                                '<p class="card-text">' . $full_desk . '</p>' . 
                                '<a href="" class="btn btn-primary">' . 'Подробнее...' . '</a>' .                             
                                '<a href="delete.php?id='.$id.'" class="btn btn-primary">Удалить</a>'.
                                '<a href="edit_form.php?id='.$id.'" class="btn btn-primary">Редактировать</a>'.                    
                            '</div>
                    </div>';                              
            }
        } else {
            echo '<p>No results could be displayed.</p>';
        }
    } catch (Exception $e) {
        echo '<p>', $e->getMessage(), '</p>';
    }
}

?>
    <!-- <nav aria-label="Page navigation example">
     <ul class="pagination">
       <li class="page-item"><a class="page-link" href="?page=1" title="First page">Previous</a href="?page='
       . ($page - 1) . '"></li>
       <li class="page-item"><a class="page-link" href="#">1</a></li>
       <li class="page-item"><a class="page-link" href="#">2</a></li>
       <li class="page-item"><a class="page-link" href="#">3</a></li>
       <li class="page-item"><a class="page-link" href="#">Next</a></li>
     </ul>
   </nav> -->