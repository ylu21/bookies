<?php

    $title = $_POST['title'];
    if(strpos($title, "'")!==false)
        $title = str_replace("'", "''", $title);
    $author = $_POST['author'];
    if(strpos($author, "'")!==false)
        $author = str_replace("'", "''", $author);
    $descrip = $_POST['description'];
    if(strpos($descrip, "'")!==false)
        $descrip = str_replace("'", "''", $descrip);
    $isbn = $_POST['isbn2'];
    $price = $_POST['price'];
    $cookie = $_COOKIE['name'];
    $book_id = 'book_' . uniqid();
    
    $db = new PDO('mysql:host=localhost;port=8889;dbname=bookies','root','13413595fbI');
    $result = $db->query("
        SELECT email from user WHERE uid ='$cookie'
    ");

    $f = $result->fetch();
    $email = $f['email'];
    
    if($db->exec( 
        "
            INSERT INTO book (book_id, user_id, email, title, author, isbn, description, price) VALUES ('$book_id', '$cookie', '$email', 
            '$title', '$author', '$isbn', '$descrip', '$price'
            )
        ;"   
    )){  
        echo "<p class='text-center'>Successfully create a post!
           <a class='center-block btn btn-default' href='../' role='button'>HOME</a>
        </p>
            
        ";  
        
    }else{
        print_r($db->errorInfo());  
    }
    
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

        if(!empty($fileTempName) && is_uploaded_file($fileTempName))
		{
			// move the file from the temporary directory to somewhere of your choosing
            mkdir("../user/uploads/{$book_id}",0755);
			move_uploaded_file($fileTempName, "../user/uploads/{$book_id}/" . $fileName);
			
            
		}
        
	}

$db->commit();


?>