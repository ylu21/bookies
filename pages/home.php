<?php
    $db = new PDO('mysql:host=localhost;port=8889;dbname=bookies', 'root', '13413595fbI');
    $result = $db->query("
        SELECT * FROM book ORDER BY book_id DESC
    ;");

    //goal, create an object BOOK, create an array of object book

    $books = array();

    if($result->rowCount()>0){
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            //$title[$i] = $row['title'];
            //echo "title is {$title[$i]}";
            $books[$i]=$row;
            //print_r($books[$i]->title);
            //print("\n");
            $i++;
        }
        
    }else{
        echo "<p>No books</p>";
    }

    
    //search pic
    function pickimg($book_id){
       
        $search_dir = "../user/uploads/$book_id";
        
        $images = glob("$search_dir/IMG_*.*");
        sort($images);
        
        if(count($images)>0){
            $img = $images[0];
            
        }
        return $img;
    }
    ?>
    <div class="row">
        <div class="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </span>
            </div>
            <!-- /input-group -->
        </div>
    </div>
    <br>
    <?
    echo "<div class='row'><div class='row-height'>";
    foreach($books as $book){
        
        $book_id = $book->book_id;
        $src = pickimg($book_id);
        $descrip = substr($book->description, 0, 100); 
        echo "
                <div class='blabla col-sm-4 col-md-4 col-height'>
                    <div class='inside thumbnail'>
                        <div class='content'>
                            <img src='$src' alt='BooKies' width=450 height=250 class='center-block img-rounded img-responsive' >
                        <div class='caption'>
                            <a href='pages/page.php?bid=$book->book_id'><h3>$book->title</h3></a>
                            <p>$descrip...</p>
                            <span>
                                <a href='#' class='btn btn-info cart' role='button'>Add to 
                                cart
                                </a>
                            
                           <h4 class='pull-right lead'>$$book->price</h4></span>
                               
                        </div>
                        </div>
                        
                    </div>
                </div>
                
                
                <script>
                    
                </script>
            ";
        
    }
    echo "</div></div>";
?>