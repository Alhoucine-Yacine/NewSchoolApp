<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="pragma" content="no-cache" />
<title>
 Ecole Privé
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
  require_once("../controller/controller.php");
  $controller=new Controller();
   ?>
<tittre></tittre>
<?php
list ($str,$admin)=$controller->login();
echo $str;
 ?>
<br>
<br>

<div id="diaporama">
<figure>                       </figure>
</div>
<ul align="center" id="lis">   </ul>
<div id="video">               </div>
<br>  <br>
<div id="responsecontainer">   </div>
<script type="text/javascript" src="jq.js">
</script>

<div id="email">
</div>

  <?php
  if ($admin==1) echo '
 <h2> <a href ="../ttt/view/ttt.php"> Aller vers la page Admin </a> </h2>
'?>
</body>

</html> 
