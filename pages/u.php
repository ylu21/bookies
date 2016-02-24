<?php
//    var_dump($_POST);
    echo "
<p>yehhhh</p>";
    $title = $_POST['title'];
    $author = $_POST['author'];
    $cookie = $_COOKIE['name'];
    $book_id = 'book_' . uniqid();

    //connect to database
    //use cookie to get uid
    //store the datas with uid
    $db = new PDO('mysql:host=localhost;port=8889;dbname=bookies','root','13413595fbI');
    $result = $db->query("
        SELECT email from user WHERE uid ='$cookie'
    ");

    $f = $result->fetch();
    $email = $f['email'];
    
    if($db->exec( 
        "INSERT INTO book (book_id, user_id, email, title, author) VALUES('$book_id', '$cookie', '$email', '$title', '$author');"
    )){  
        echo "yeh";  
    }
    
    $count = 0;
    foreach($_FILES as $index => $file)
	{
		// for easy access
		$fileName     = 'IMG_' . uniqid('', true) . '_' . $file['name'];
        $fileTempName = $file['tmp_name'];
		
        if(!empty($file['error'][$index]))
		{
			// some error occurred with the file in index $index
			// yield an error here
			return false;
		}
        
        $filepath = "";
        if(!empty($fileTempName) && is_uploaded_file($fileTempName))
		{
			// move the file from the temporary directory to somewhere of your choosing
			move_uploaded_file($fileTempName, "../user/uploads/" . $fileName);
			// mark-up to be passed to jQuery's success function.
            $filepath = "../user/uploads/" . $fileName;
            
            //add col according to count
            if($db->exec("
                ALTER TABLE extra ADD file_path " . $count . " VARCHAR(200) NOT NULL 
            ;")){
                $db->exec("
                    INSERT INTO extra (bid, file_path" . $count . " VALUES('$book_id', '$filepath')
                ;");
            }
            //then insert blabla 
			
            count++;
		}
        
	}


?>