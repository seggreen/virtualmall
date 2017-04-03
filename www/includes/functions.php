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
        $confirm = true;

        $stmt = $conn->prepare("SELECT adnim_id, email, hash FROM adnim WHERE email=:e");
        $stmt->execute([":e" => $e]);

        #FETCH ROW RESULT....

        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $stmt->rowCount();

        #CHECK FOR MATCH......
        if($result <= 0) {
        	$confirm = false;
        }

          if(!password_verify($p, $rows['hash'])) {
               $confirm = false;
        }

        return [$confirm, $rows];
}

    #FUNCTION CHECK IF EMAIL EXIST........ 
    function doesEmailExist($conn, $e) {
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

    
