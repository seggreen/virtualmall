<?php

session_start();

#TITLE.....
$title = "";

#INCLUDE DB......
include 'includes/db.php';

#INCLUDE FUNCTIONS.....
include 'includes/functions.php';

#INCLUDE DASHBOARD HEADER.....
include 'includes/dashboard_header.php';

#ERRORS....
$errors = [];