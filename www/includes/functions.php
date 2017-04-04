<?php

     #FUNCTION DISPLAY ERROR.......
    function displayErrors($key, $arr) {
    
     if(isset($key, $arr)){
    		echo '<span class="err">' .$arr[$key]. '</span>';
    	}
    }


    #FUNCTION REGISTER ADMIN......
    function doAdminRegister($conn, $input) {
    	#HASH PASSWORD.....
    	$hash = password_hash($input['password'], PASSWORD_BCRYPT);

    	#INSERT DATA.....
    	$stmt = $conn->prepare("INSERT INTO adnim(fname, lname, email, hash) VALUES(:fn, :ln, :e, :h)");

    	#BIND PARAMS.....
    	$data = [':fn'=>$input['fname'], ':ln'=>$input['lname'], ':e'=>$input['email'], ':h'=>$hash];
    	
    	$stmt->execute($data);
    }


    #FUNCTION AUTHENTICATE ADMIN......
    function authenticateAdmin($conn, $e, $p) {
        #SET FLAG CONFIRM TO TRUE........
        $confirm = false;

        $stmt = $conn->prepare("SELECT admin_id, email, hash FROM adnim WHERE email=:e");
        $stmt->execute([":e" => $e]);

        #FETCH ROW RESULT....

        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $stmt->rowCount();

        #CHECK FOR MATCH......

        if($result > 0 && password_verify($p, $rows['hash'])) {
        	$confirm = true;
        }

        return [$confirm, $rows];
}

    #FUNCTION CHECK IF EMAIL EXIST........ 
    function doesEmailExist($conn, $email) {
    	#SET FLAG RESULT TO FALSE.....
    	$result = false;

    	$stmt = $conn->prepare("SELECT email FROM adnim WHERE email=:e");

    	#BIND PARAMS.....
    	//$data = [':e' =>$email['email']];
    	$stmt->bindParam(":e", $email);
    	$stmt->execute();

    	#GET NUMBER OF ROLLS RETURNED.......
    	$count = $stmt->rowCount();

    	if($count > 0 ) {
    		$result = true;
    	}

    	return $result;
    }

    #FUNCTION FILE UPLOAD.....
    function doFileUpload($file, $upload) {
    	#SET FLAG TO FALSE......
    	$result = flase;

    	#GENERATE RAND NUMBER......
    	$rnd = $rand(000000, 999999);

    	#STRIP FILE NAME FOR SPACE......
    	$strip_name = str_replace("", "_", $file['pic']['name']);

    	$filename = $rnd.$trip_name;
    	$destination = $upload.$filename;

    	$fly = move_uploaded_file($file['pic']['tmp_name'], $destination);

    	if($fly) {
    		$result = true;
    	}

    	return [$result, $destination];
    }

    
