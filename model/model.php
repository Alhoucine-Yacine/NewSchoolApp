<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tdw";
$connection=mysqli_connect($servername,$username,$password,$dbname);
include_once('../control/controller.php');

class Model{

    function getAllUsers(){
        $req = "SELECT * FROM users WHERE category='visitor'";
    try
{
    $conn = new PDO("mysql:host=".$GLOBALS['servername'].";dbname=".$GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare($req);
$stmt->execute();


$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
return($stmt);
    }

    function getInfo($id){
        $req="select * from ecole where id=".$id.";";
        $result = mysqli_query($GLOBALS['connection'],$req);
        if ($result){
            if($row =mysqli_fetch_assoc($result))
        return $row;
            }
    }

    function getEcole($id){
        $req="select * from ecole where id=".$id.";";
        $result = mysqli_query($GLOBALS['connection'],$req);
        if ($result){
            if($row =mysqli_fetch_assoc($result))
        return $row['nom'];
            }
    }

    function executeQuery($req){
                mysqli_query($GLOBALS['connection'], $req);

    }

    function getUser($req){

        $result = mysqli_query($GLOBALS['connection'],$req);
        if ($result){
            if($row =mysqli_fetch_assoc($result))
        return $row['user'];
            }}
    

 function getUniver($schl){
 	$req = "SELECT * FROM ecole WHERE type='".$schl."'";
 	try
{
    $conn = new PDO("mysql:host=".$GLOBALS['servername'].";dbname=".$GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare($req);
$stmt->execute();


$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
return($stmt);
 }


function getCommentsbyID($i){
  $str="";
        $query1="select * from comments where idF=".$i.";";
        $result1 = mysqli_query($GLOBALS['connection'],$query1);
        if ($result1){
      while ($row1 =mysqli_fetch_assoc($result1)){

        if ($GLOBALS['controller']->getCurrentUser()=='admin')
        $str=$str.'<h3 style="display:inline">'.$row1['user'].'</h3> : " '.$row1['text'].' " <Button class=btnss id="'.$row1['id'].'" onclick="delCom(this)"> supprimer </Button><br><br>';
        else $str=$str.'<h3 style="display:inline">'.$row1['user'].'</h3> : " '.$row1['text'].'<br><br>';
      }
    }
      return $str;

}


 function getLogin($user,$pass){
 	$req = "SELECT * FROM users WHERE user='".$user."'";

	try
	{
	    $conn = new PDO("mysql:host=".$GLOBALS['servername'].";dbname=".$GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

    $stmt = $conn->prepare($req);
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    return($stmt);
    
 }
	
}

?>