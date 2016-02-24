<?php
    $isbn = $_GET['isbn'];
    if(!empty($isbn)&&preg_match("/(ISBN[-]*(1[03])*[ ]*(: ){0,1})*(([0-9Xx][- ]*){13}|([0-9Xx][- ]*){10})/", $isbn)){
        //do stuff
            $string = "https://www.googleapis.com/books/v1/volumes?q={$isbn}&callback=handleResponse";
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        function handleResponse(response) {
            var item = response.items[0];
            // in production code, item.text should have the HTML entities escaped.
            console.log(item.volumeInfo.title);

            window.location = "../pages/post.php?booktitle=" + item.volumeInfo.title + "&bookauthor=" + item.volumeInfo.authors + "&isbn=" + <?php echo $isbn; ?>;
        }
    </script>
    <script src="<?php echo $string; ?>"></script>
    <?}
    else{
        echo 'neh';
    }
?>