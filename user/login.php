<?php 
    if (!empty($_POST['email'])&&!empty($_POST['password'])){
        $email=strval($_POST['email']);
	    $password=strval($_POST['password']);
        $db = new PDO('mysql:host=localhost;port=8889;dbname=bookies','root','13413595fbI');
        $result = $db->query("SELECT * FROM user WHERE email= '$email'");
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $pass = $row['password'];
                if (crypt($password, $pass) == $pass){
                    $cookie= strval(uniqid());
			        $db->exec("UPDATE user SET uid='$cookie' WHERE email='$email'");
			        $int = 86400 * 7; //7 days 
			        //setcookie('uid',$cookie,time()+$int); 
                    setcookie("name",$cookie,time()+$int, '/'); 
                    echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
                }else{
                    echo "<script>
                        window.history.go(-1);
                        alert('Wrong password');
            
                    </script>";
                }
            }
        }else{  
            echo "<script>
                window.history.go(-1);
                alert('Account does not exist');
            
            </script>";
        }
    }

?>