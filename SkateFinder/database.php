<?php
$mysqli=new mysqli('localhost','root','pw','sf');
if($mysqli->connect_error){

	printf("can not connect databse %s\n",$mysqli->connect_error);
	exit();
}



