<?php 
  
if (isset($_POST['lgout'])){ 
    $controller->logOut();
    header("Refresh:0");}
  

include_once ('../control/controller.php');
$controller=new controller();

if (isset($_POST['lgin']))
  header("Location:login.php");
  
echo '<div class="sidenav">
  <a href="about1.php">A propos</a>
  <a href="index.php">Accueil</a>
  <a href="maternelle1.php">Maternelle</a>
  <a href="primaire1.php">Primaire</a>
  <a href="moyen1.php">Moyen</a>
  <a href="secondaire1.php">Secondaire</a>
  <a href="professionnelle.php">professionnelle</a>
  <a href="univ.php">université</a>
  <a href="compare.php">Comparer</a>';
  if ($controller->getCurrentUser()=='admin')
    echo '<a href="users.php">users</a>';
  echo'</div>
<div align="center" class="main">';
if ($controller->getCurrentUser()!="any")
echo 
  '<div id="both"><div class="titre" align="left" ><Button  class="ussr" disabled>'.$controller->getCurrentUser().'</Button><form method="post" class="btns"> <Button  name="lgout" class="ussr"> Log out </Button></form></div> <div class="titre" ><span>Education website</span>  </div></div>';
else 
  echo '<div id="both"><div class="titre" align="left"> <form method="post"> <Button id="loggin" name="lgin"> Login </Button> </form>  </div><div class="titre" ><span>Education website</span> </div> </div>';
  echo
  '<img src="../media/icon.png" id ="logo" align="center" >

<div align="center" class="slideshow-container" style="height: 20%; width: 80%">

  <div class="mySlides fade" style="height:100%">
    <img  src="../media/1.jpg" style="width:100%;border-radius: 5%;; height: 100%">
  </div>

  <div class="mySlides fade" style="height:100%">
    <img src="../media/2.jpg" style="width:100%; height: 100% ;border-radius: 5%">
  </div>

  <div class="mySlides fade" style="height:100%">
    <img src="../media/3.jpg" style="width:100%;border-radius: 5%; height: 100%">
  </div>

</div>';
?>