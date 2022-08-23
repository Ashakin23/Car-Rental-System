<?php

$servname = "localhost";
$dbuname = "root";
$dbpass = "";
$dbname = "project370data";

$conn = mysqli_connect($servname,$dbuname,$dbpass,$dbname);

if (!$conn){
	die("Connection Failed: ". mysqli_connect_error());

}