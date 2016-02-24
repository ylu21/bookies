<?php
    $bid = $_GET['bid'];
    //locate the book in database duh 
    $db = new PDO('mysql:host=localhost;port=8889;dbname=bookies','root','13413595fbI'); 
    $result = $db->query("SELECT * FROM book WHERE book_id = '$bid';"); 
    $f = $result->fetch();
    $title = $f['title'];
    $descrip = $f['description'];
    $search_dir = "../user/uploads/$bid";
    
    $images = glob("$search_dir/IMG_*.*");
    sort($images);
    
    
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>BooKies</title>

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--    customized -->
        <link rel="stylesheet" href="../css/styles.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <div class="container">
<header>
            <a class="title" href="/"><h1>BooKies!</h1></a>
            <!--        <sub>Grab your textbook now~</sub>-->
        </header>
        <nav>
<!--
            <ul class="nav dropdown-menu">
                <li role="presentation" class="active dropdown"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Documentation</a></li>
                <li role="presentation"><a href="#">About Us</a></li>
            </ul>
-->         <!-- Single button -->
<div class="btn-group">
  <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
  </a>
  <ul class="dropdown-menu">
    <li role="presentation"><a href="#">Documentation</a></li>
    <li role="presentation"><a href="#">About Us</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
        </nav>
            <hr>
            <div class="shadow">
                <?php if (isset($_COOKIE["name"])): ?>
                    <!--if cookie is set-->
                    <div class="page">
                        <a href="user/logout.php">Logout</a>
                        <div class="postpage">
                            <p>
                                <button id="crud" onclick="edit()">Edit</button>
                            </p>
                        </div>
                        <div id="homepage" class="homepage">
                            <div class="text-center">
                                <h1><?echo $title?></h1>
                                <h5><? echo $f['author']; ?></h5>
                            </div>
                            <?php foreach ($images as $image): ?>
                                <p class="text-center center-block"><img src='<?php echo $image?>' alt='<?php echo $title?>' class='postimg img-responsive'>
                                    <?php endforeach ?>
                                
                                <p class="text-center"><?php echo $descrip; ?></p>
                                <hr>
                                <h2 class="text-right">$<?php echo $f['price']; ?></h2>
                        </div>
                    </div>
                    <?php endif; ?>
            </div>

            <hr>
            <footer>
                <h2>Credits</h2>
                <p>Yichen Lu © 2016</p>
            </footer>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>
        </script>
    </body>

    </html>