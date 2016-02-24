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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--    customized -->
    <link rel="stylesheet" href="css/styles.css">

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
            <div class="dropdown">
                <a class="btn btn-default dropdown-toggle">

                </a>
            </div>
        </header>
        <nav>
            <!--
            <ul class="nav dropdown-menu">
                <li role="presentation" class="active dropdown"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Documentation</a></li>
                <li role="presentation"><a href="#">About Us</a></li>
            </ul>
-->
            <!-- Single button -->
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
                        <p>
                            <button class="logout btn btn-primary pull-right" href="user/logout.php">Logout</button>
                            <button class="btn btn-default pull-left" id="post" onclick="post()">Post</button>
                        </p>
                    </div>
                    <div id="homepage" class="homepage"></div>
                </div>
                <?php else: ?>
                    <!--ask user to login or create account-->
                    <div class="page">
                        <div class="loginpage">
                            <a href="user/register.php">
                                <img src="http://www.sonomacountygolf.com/wp-content/uploads/2011/01/create-an-account.png">
                            </a>
                        </div>
                        <div class="loginform">
                            <form class="form-horizontal" role="form" action="user/login.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control col-sm-2" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="checkbox text-center">
                                    <label>
                                        <input type="checkbox"> Remember me</label>
                                </div>
                                <br>
                                <button type="submit" class="center-block btn btn-default">Submit</button>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
        $("form").submit(function (e) {
            if ($('input[type="email"]').val() == "" || $('input[type="password"]').val() == "") {
                alert("empty");
                e.preventDefault();
            }
        });

        $('#homepage').load("pages/home.php");

        function post() {
            window.location = "pages/post.php";
        }
    </script>
</body>

</html>