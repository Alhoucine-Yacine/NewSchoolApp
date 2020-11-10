<?php
$host ="localhost";
$user="root";
$password="";
$database="tdw";
$connection=mysqli_connect($host,$user,$password,$database);

require_once ('../model/model.php');
$model=new model();
 
class Controller {
  function init(){ 
    return $GLOBALS['model']->getData();
  }



  function getFromDB(){ 
  	$query="SELECT * FROM type_formation order by nom";
      $result = mysqli_query($GLOBALS['connection'],$query);
   return $result; 
  }


  function getForForm($nom){
  		$q="Select * from formations where type='".$nom."' order by nom;";
  	return (mysqli_query($GLOBALS['connection'],$q));
  }


  function printForm(){

  	return ($GLOBALS['model']->getForm());
  }

  function getPanel(){

    return $GLOBALS['model']->getP();

  }
}
             

  ?>


