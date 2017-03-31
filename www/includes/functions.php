<?php
    function doAdminRegister($conn, $input) {
    	#HASH PASSWORD.....
    	$hash = password_hash($input['password'], PASSWORD_BCRYPT);

    	#INSERT DATA.....
    	$stmt = $conn->prepare("INSERT INTO adnim(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h)");

    	#BIND PARAMS.....
    	$data =[':fn'=>$input['fname'], ':ln'=>$input['lname'], ':$input'=>$input['email'], ':h'=>$hash];
    	
    	$stmt->execute($data);
    }
