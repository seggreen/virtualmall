<?php
    function doAdminRegister($conn, $input) {
    	#HASH PASSWORD.....
    	$hash = password_hash($input['password'], PASSWORD_BCRYPT);

    	#INSERT DATA.....
    	$stmt = $conn->prepare("INSERT INTO adnim(fname, lname, email, hash) VALUES(:fn, :ln, :e, :h)");

    	#BIND PARAMS.....
    	$data = [':fn'=>$input['fname'], ':ln'=>$input['lname'], ':e'=>$input['email'], ':h'=>$hash];
    	
    	$stmt->execute($data);
    }
