<?php

$host ="localhost";
$user="root";
$password="";
$database="tdw";
$connection=mysqli_connect($host,$user,$password,$database);


mysqli_query($connection,"SET NAMES 'utf8'"); 
mysqli_query($connection,'SET CHARACTER SET utf8'); 

require_once ('../model/model.php');
$model=new Model();
class Controller {
  function getTab(){
  $query="SELECT * FROM type_formation order by nom";
      $result = mysqli_query($GLOBALS['connection'],$query);
      return $GLOBALS['model']->getTab1($result);
}

function getBody(){
  $query="select * from colorBody where id=1;";
  $result = mysqli_query($GLOBALS['connection'],$query);
  $row =mysqli_fetch_assoc($result);   
  return $row['color'];
}

function getLC(){
  $query="select * from colorList where id=1;";
  $result = mysqli_query($GLOBALS['connection'],$query);
  $row =mysqli_fetch_assoc($result);   
  return $row['color'];
}


  function getList(){
     $query="SELECT * FROM type_formation";
      $result = mysqli_query($GLOBALS['connection'],$query);
      
          return $GLOBALS['model']->sendResult($result);
  }

  function getResult2($q){
      return mysqli_query($GLOBALS['connection'],$q);
  }



  function getEmail(){

    $str="";
  $sql = "SELECT * FROM email";
  $mq = mysqli_query($GLOBALS['connection'],$sql) ;
  return $GLOBALS['model']->getEmail1($mq);
  }


  function getVideo(){
  $sql = "SELECT * FROM selectedVideo";
   $mq = mysqli_query($GLOBALS['connection'],$sql) ;

   return ($GLOBALS['model']-> getVideo1($mq));
  }

  function getTitle(){
  $sql = "SELECT * FROM titre";
   $mq = mysqli_query($GLOBALS['connection'],$sql) ;
   return $GLOBALS['model']->getTitle1($mq);

  }

  function getDiapo(){
     $sql = "SELECT * FROM images";
     $mq = mysqli_query($GLOBALS['connection'],$sql) ;
     return $GLOBALS['model']->getDiapo1($mq);

  }
              
 
 function login() {
 	$toRetString="";
 	$admin=0;
 	if (isset($_POST['login'])) {
  session_start();
  $_SESSION['user']=$_POST['userName'];
  $_SESSION['password']=$_POST['passwd'];

  $query="SELECT * FROM admins where name='".$_SESSION['user']."' and password ='".$_SESSION['password']."';";
      $result = mysqli_query($GLOBALS['connection'],$query);
      if ($result && $row =mysqli_fetch_assoc($result)){
            $admin=1;
            $toRetString= "<h2>connecté en tant que ".$_SESSION['user']."</h2>";
            }

      else {$toRetString= "<h2>nom d'utilisateur ou mot de passe erroné". '</h2><form name="logg" method="POST">
     Utilisateur : <input type="text" name="userName">
    password : <input type ="password" name="passwd">
    <input type = "submit" name="login" value="login"></form>';
	$admin=0;
	}
  session_destroy();
  
 }
 else $toRetString='<form name="logg" method="POST">
    Utilisateur : <input type="text" name="userName">
password : <input type ="password" name="passwd">
<input type = "submit" name="login" value="login"></form>';

		return ([$toRetString,$admin]);
}

}



$ctrlr=new Controller();
  


    if(isset($_POST['getTitle'])) {   
  	
      echo $GLOBALS['ctrlr']->getTitle();
}

if(isset($_POST['getBody'])) {   
    
      echo $GLOBALS['ctrlr']->getBody();
}

if(isset($_POST['getDiapo'])) {
  
  echo $GLOBALS['ctrlr']->getDiapo();
}


if(isset($_POST['getVideo'])) {
   
  echo $GLOBALS['ctrlr']->getVideo();
}

if(isset($_POST['getEmail'])) {
   
  echo $GLOBALS['ctrlr']->getEmail();
}

if(isset($_POST['getTab'])) {
   
  echo $GLOBALS['ctrlr']->getTab();
}

if(isset($_POST['getList'])) {
   
  echo $GLOBALS['ctrlr']->getList();
}

if(isset($_POST['getLC'])) {
   
  echo $GLOBALS['ctrlr']->getLC();
}

?>