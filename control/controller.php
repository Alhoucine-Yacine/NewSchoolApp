<?php 	
require_once ('../model/model.php');
$model=new Model();
$controller= new Controller();



class Controller{

  function getUsers(){
    echo '<table class="display" style="width:100%; font-size: 12px;border: 1px solid black;">
          <thead style="border: 1px solid black;">
              <tr style="border: 1px solid black;">
              <th style="border: 1px solid black;"> Username </th>
              <th style="border: 1px solid black;"> Bloquer </th>
              <th style="border: 1px solid black;"> Supprimer </th>
              </tr>
          </thead><tbody>';
    
      $stmt=$GLOBALS['model']->getAllUsers();
        $array = $stmt->fetchAll();
        foreach ($array as $k => $v) {
               $arr = $v;
               echo '<tr style="border: 1px solid black;"><td style="border: 1px solid black;"><h3 align=center>'.$arr['user'].'</h3></td>';
                   if ($arr['etat']==1)   echo '<td style="border: 1px solid black;"> <h6 align=center><Button  onclick="blocU(this)" id='.$arr['id'].' class=btnss> bloquer </Button></h6></td>';
                   else echo '<td style="border: 1px solid black;"> <h6 align=center><Button  onclick="deblocU(this)" id='.$arr['id'].' class=btnss> debloquer </Button></h6></td>';
                      echo '<td style="border: 1px solid black;"> <h6 align=center><Button align=center onclick="supU(this)" id='.$arr['id'].' class=btnss> Supprimer </Button></h6></td></tr>';
             }
             echo '</tbody></table>';
  }


  function suppU($id){
    $req="delete from users where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);
  }

  function reqModif($id){
    header("location:editE.php?id=".$id);
  }

  function supprimerE($id){
    $req="delete from ecole where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);

  }

  function delComm($id){
    $req="delete from comments where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);
  }

  function bloU($id){
    $req="update users set etat=0 where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);

  }


  function debloU($id){
    $req="update users set etat=1 where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);

  }

  function bloquerE($id){
    $req="update ecole set etat=0 where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);
  }

  function debloquerE($id){
    $req="update ecole set etat=1 where id=".$id.";";
    $GLOBALS['model']->executeQuery($req);
  }


  function comment(){
    $query="insert into comments (user,text,idF) values('".$GLOBALS['controller']->getCurrentUser()."','".$_POST['txt']."','".$_POST['idd']."');";
    $GLOBALS['model']->executeQuery($query);
  }

  function getComments($id){
      echo $GLOBALS['model']->getCommentsbyID($id);

  }

  function getEcoleById($id){
    return ($GLOBALS['model']->getEcole($id));
  }

  function getInfoById($id){
    return ($GLOBALS['model']->getInfo($id));
  }

  function execModif($id,$nom,$type,$categorie,$wilaya,$commune,$adresse,$telephone){
        $req="delete from ecole where id=".$id.";";
        $GLOBALS['model']->executeQuery($req);
        $req="insert into ecole (nom,type,categorie,wilaya,commune,adresse,telephone) values('".$nom."','".$type."','".$categorie."','".$wilaya."','".$commune."','".$adresse."','".$telephone."');";
        $GLOBALS['model']->executeQuery($req);
  }

	function getSchool($schl){
				$stmt=$GLOBALS['model']->getUniver($schl);
				return($stmt);

	}

  function getCurrentUser(){
    $req="select * from curentUser where id=1;";
    return ($GLOBALS['model']->getUser($req));
  }

  function logOut(){
    $req="update curentUser set user='any' where id=1;";
          $GLOBALS['model']->executeQuery($req);
  }

	function login(){
			$user = $_POST['username'];
		$pass = $_POST['password'];
	$stmt=$GLOBALS['model']->getLogin($user,$pass);
    foreach( $stmt->fetchAll() as $k=>$v)
    {	
    	$thePass = $v['password'];
    	$category = $v['category'];
    	}

    
		    if ($pass==$thePass)
		    {
		    	session_start();
		    	$_SESSION['user']=$user;
		    	$_SESSION['category']=$category;
          $req="update curentUser set user='".$user."' where id=1;";
          $GLOBALS['model']->executeQuery($req);
          session_destroy();

		    	header("Location:index.php");
		    }
		    else
		    {
		    	header("Location:login.php");
		    }
		    }

		function getMainMenu(){
			echo '<div class="categorie" align="center" style="margin-left: 15%;">
  <br><br>
  <br><br>
  <br><br>
  <div style="border: 2px solid black;
  outline: black solid 10px;
  margin-right:15%;   
  padding: 20px;
  text-align: center;">
      <a href="maternelle1.php">Maternelle</a>
  </div>
  <br><br>
  <div style="border: 2px solid black;
  outline: black solid 10px;
  margin-right:15%;  
  padding: 20px;
  text-align: center;">
    <a href="primaire1.php">Primaire</a>
  </div>
  <br><br>
  <div style="border: 2px solid black;
  outline: black solid 10px;
  margin-right:15%;  
  padding: 20px;
  text-align: center;">
    <a href="moyen1.php">Moyen</a>
  </div>
  <br><br>
  <div style="border: 2px solid black;
  outline: black solid 10px;
  margin-right:15%;   
  padding: 20px;
  text-align: center;">
    <a href="secondaire1.php">Secondaire</a>
  </div>
  <br><br>
  <div style="border: 2px solid black;
  outline: black solid 10px;
  margin-right:15%;    
  padding: 20px;
  text-align: center;">
    <a href="professionnelle.php">professionnelle</a>
  </div>
  <br><br>
  <div style="border: 2px solid black;
  outline: black solid 10px;
  margin-right:15%;   
  padding: 20px;
  text-align: center;">
    <a href="univ.php">Université</a>
  </div>
  </div>
   </div>';
		}

}



if(isset($_POST['supprimerE'])) {
    $controller->supprimerE($_POST['supprimerE']);
  }

if(isset($_POST['bloquerE'])) {
    $controller->bloquerE($_POST['bloquerE']);
  }

if(isset($_POST['debloquerE'])) {
    $controller->debloquerE($_POST['debloquerE']);
  }

if(isset($_POST['lgin'])) {
    header("location:login.php");
  }

  if(isset($_POST['btn'])) {
    $controller->comment();
  }

  if(isset($_POST['modif'])) {
    $controller->reqModif($_POST['id']);
  }

  if(isset($_POST['suppU'])) {
    $controller->suppU($_POST['suppU']);
  }

  if(isset($_POST['bloU'])) {
    $controller->bloU($_POST['bloU']);
  }

  if(isset($_POST['debloU'])) {
    $controller->debloU($_POST['debloU']);
  }

if(isset($_POST['delC'])) {
    $controller->delComm($_POST['delC']);
  }


  if(isset($_POST['mod'])) {
    $controller->execModif($_POST['id'],$_POST['nom'],$_POST['type'],$_POST['categorie'],$_POST['wilaya'],$_POST['commune'],$_POST['adresse'],$_POST['telephone']);
  
  }


?>