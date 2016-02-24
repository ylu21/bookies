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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php
//    echo '9780762436316';
    if(!empty($_GET['booktitle'])){
        $title = $_GET['booktitle'];
        $author = $_GET['bookauthor'];
        $isbn = $_GET['isbn'];
//        echo $title;
        echo '<script>
            $(function() {
                $("#p1").hide();
                $("#p2").hide();
                $("#manualform").show();
                $("input[name=title]").val("' . $title . '");
                $("input[name=author]").val("' . $author . '");
                $("input[name=isbn2]").val("' . $isbn . '");
});
        </script>';
    }
?>

    <body>
        <div class="container">
                    <header>
            <a class="title" href=".."><h1>BooKies!</h1></a>
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
            
            <div class="shadow">
                <?php if (isset($_COOKIE["name"])): ?>
                    <!--if cookie is set-->
                    <div class="page">
                        <div class="row postpage">
                            <button class="logout btn btn-primary pull-right" href="user/logout.php">Logout</button>
                        </div>
                        
                        <div id="homepage" class="homepage">

                            <div id="postform" class="text-center postform">
                                <div id="p1" class="form-group">
                                    <label for="author">ENTER ISBN:</label>
                                    <form action="../user/fetch.php" method="get">
                                        <input type="text" name="isbn" placeholder="Input ISBN">
                                        <button class="btn btn-default">Fetch</button>
                                    </form>
                                </div>
                                <div id="p2" class="form-group">
                                    <label for="manual">Or</label>
                                    <br>
                                    <button type="text" class="btn btn-default" onclick="openForm()">Manually edit posting information</button>
                                </div>
                                <br>
                                <div id="manualform" class="manualform">
                                    <form id="rmanualform" onsubmit="return submitForm();" class="form-horizontal" role="form">
                                         <div class="form-group">
                                            <label for="coverpage">Coverpage:</label>
                                            <div id="preview" class="row"></div>
                                            <input type="file" onchange="myFunction()" class="form-control" id="fileInput" name="file" multiple required>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="author">Author:</label>
                                            <input type="text" class="form-control" name="author" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn2">ISBN(13 or 10):</label>
                                            <input type="text" pattern="(ISBN[-]*(1[03])*[ ]*(: ){0,1})*(([0-9Xx][- ]*){13}|([0-9Xx][- ]*){10})" title="not the right format" class="form-control" name="isbn2">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control"  minlength="20" rows=3 name="description" required></textarea>
                                        </div>
                                        <div class="input-group">
                                            <label for="price">Price</label>
                                            <span class="input-group-addon">$</span><input name="price" type="number" class="form-control" min="10" max="1000" step="0.01" placeholder="Price" required/>
                                        </div>
                                        <br>
                                        <button type="submit" class="center-block btn btn-default ">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <!--ask user to login or create account-->
                        <div class="page">
                            <div class="loginpage">
                                <a href="../user/register.php">
                                    <img src="http://www.sonomacountygolf.com/wp-content/uploads/2011/01/create-an-account.png">
                                </a>
                            </div>
                            <div class="loginform">
                                <form class="form-horizontal" role="form" action="user/login.php" method="post ">
                                    <div class="form-group ">
                                        <label for="email ">Email address:</label>
                                        <input type="email " class="form-control col-sm-2" name="email ">
                                    </div>
                                    <div class="form-group ">
                                        <label for="pwd ">Password:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="checkbox text-center">
                                        <label>
                                            <input type="checkbox"> Remember me</label>
                                    </div>
                                    <br>
                                    <button type="submit" class="center-block btn btn-default ">Submit</button>
                                </form>
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

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js " integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS " crossorigin="anonymous "></script>
        <script>
            function handlefiles(files) {
                var preview = document.getElementById('preview');
                console.log(files.length);
                preview.innerHTML = "";
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    var img = document.createElement('img');
                    img.classList.add('thumbnail');
                    img.classList.add('col-md-4');
                    img.classList.add('col-sm-6');
                    img.classList.add('col-md-offset-1');
                    img.file = file;
                    preview.appendChild(img);

                    var reader = new FileReader();
                    reader.onload = (function (aImg) {
                        return function (e) {
                            aImg.src = e.target.result;
                        };
                    })(img);

                    reader.readAsDataURL(file);
                }
            }

            $("form").submit(function (e) {
                if ($('input[type="email "]').val() == " " || $('input[type="password "]').val() == " ") {
                    alert("empty ");
                    e.preventDefault();
                }
            });

            function submitForm() {
                var text = $('#rmanualform').serializeArray();
                var fd = new FormData();

                var files = document.getElementById('fileInput').files;
                for (var i = 0; i < files.length; i++) {
                    fd.append("file" + i, files[i]);
                }

                $.each(text, function (k, v) {
                    fd.append(v.name, v.value);
                });

                console.log(fd);
                $.ajax({
                    url: 'upload.php',
                    data: fd,
                    processData: false,
                    type: 'POST',
                    async: true,
                    contentType: false,
                    success: function (data) {
                        $('#homepage').html(data);
                    }
                });

                return false;
            }

            function openForm() {
                $('#manualform').show();
                $('#homepage').load('post.php #rmanualform');
            }
            function myFunction(){
                console.log("mymy");
                var input = document.getElementById('fileInput');
                handlefiles(input.files);
            }
        </script>
    </body>

</html>