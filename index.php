<?php
$user = $_GET['user'];
if($user == null){
	header("Location: http://localhost/public");
}else{
	header("Location: http://localhost/public/pendrive/publico/user/$user");
}
