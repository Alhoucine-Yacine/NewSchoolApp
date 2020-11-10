<?php 
class actUser{
public static $user="any";

public static function getUser(){
	return self::$user;
}

public static function setUser($usr){
	self::$user=$usr;
}
}
?>