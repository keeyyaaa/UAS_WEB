<?php 
if( !session_id() ) session_start(); // <--- INI WAJIB ADA AGAR LOGIN JALAN

require_once '../app/init.php';

$app = new App;