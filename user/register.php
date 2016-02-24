<!--
//connect to database
//get the data from input
//insert to database
-->

<!--check if the && is working or not-->
<!--
<!--the form for registering-->
<!DOCTYPE html>
<html>

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
            <a class="title" href="#"><h1>BooKies!</h1></a>
            <!--        <sub>Grab your textbook now~</sub>-->
        </header>
        <nav>
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="../">Home</a></li>
                <li role="presentation"><a href="#">Documentation</a></li>
                <li role="presentation"><a href="#">About Us</a></li>
            </ul>
        </nav>
        <hr>
        <?php if (!empty($_POST['email'])): ?>
            <!--store code-->
            <?php
                $email = strval($_POST['email']);
                $password = strval($_POST['password']);
                $salt = crypt($password);
                $pass = crypt($password, $salt);
                //check user existence
                try{
                    $db = new PDO('mysql:host=localhost;port=8889;dbname=bookies', 'root', '13413595fbI');
                    if($db->exec("INSERT INTO user (email, password) VALUES ('$email','$pass');")){
                        echo "<p align='center'>You are registered.</p>
                    <p align='center'>Your email is $email</p>
                    <p align='center'>Go back <a href='../'>Home</a></p>";
                    }else{
                       echo "<script>
                            window.history.go(-1);
                            alert('Account already exist');
            
                        </script>";
                    }
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                
            ?>
                <?php else: ?>
                    <form class="form-horizontal" role="form" <?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]); ?> method="post">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control col-sm-2" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="pwdc">Password Confirmation:</label>
                            <input type="password" class="form-control" name="passwordconf">
                        </div>
                        <div class="checkbox text-center">
                            <label>
                                <input type="checkbox" name="agreement" onClick="validate()"> Agree <a href="#">Rule</a></label>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="center-block btn btn-default">Register</button>
                    </form>
                    <?php endif; ?>
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
        $(document).ready(function () {
            $("button[name='submit']").prop("disabled", true);

        });

        function validate() {
            if ($("input[name='agreement']").is(":checked")) {
                $("button[name='submit']").prop("disabled", false);
            } else {
                $("button[name='submit']").prop("disabled", true);
            }
        }

        $("form").submit(function (e) {
            var pass = $("input[name='password']").val();
            var passc = $("input[name='passwordconf']").val();
            var email = $("input[type='email']").val();

            if (pass == "" || email == "") {
                alert("empty");
                e.preventDefault();
            } else {
                //check password
                if (pass != passc) {
                    e.preventDefault();
                    alert("password mismatch");
                }
            }
        });
    </script>
</body>

</html>