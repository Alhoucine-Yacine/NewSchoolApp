<!DOCTYPE html>
<html>
<head>
<title>page admin</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

</script>

<h1 align="center">page admin </h1>
 
<h3> Ajout d'un type de formation </h3> 


<?php
require_once ('../controller/getInit.php');
$cont=new Controller();
echo $cont->printForm();

?>




<h3> Liste des formations </h3> 
<table class="tableau" border="1" align="center" >
<tr><th scope="col">Formation</th><th scope="col">Volume</th><th scope="col">HT</th><th scope="col">taux de taxe %</th><th scope="col">TTC</th> <th> Modifier</th><th> Supprimer</th></tr>
<tbody id="tab">
  <?php
      
      echo $cont->init();
  ?>
</tbody>
</table>
<br>
<br>

<h3 align="center"> Panneau de modification </h3>
<br>
<?php

echo $cont->getPanel();

 ?>

<script type="text/javascript" src="jq.js"></script>
</body>
</html>