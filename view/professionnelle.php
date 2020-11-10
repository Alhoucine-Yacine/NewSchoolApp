<?php
require("../control/controller.php");
$controller=new Controller();
$array = $controller->getSchool("prof")->fetchAll();
?>




<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1" charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="../media/css.css">
<link rel="stylesheet" type="text/css" href="../media/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="../media/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="script.js"></script>
<script type="text/javascript" language="javascript" src="../media/jquery.dataTables.min.js"></script>
</head>
<style media="all"> 
html, body{height:120%;} 
#outer{
min-height:120%;
}

* html #outer{height:120%;} /* for IE 6, if you care */

body, p { margin:0; padding:0}

</style>

<body>

<?php
include("header.php");



 ?>
<div style="padding: 20px;" style="width:50%">
  <table id="example" class="display" style="width:100%; font-size: 12px;">
        <thead>
            <tr>
                <th>Nom</th>
                <th>type</th>
                <th>Categorie</th>
                <th>Wilaya</th>
                <th>Commune</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Commenter</th>
                <?php 
                  if($controller->getcurrentUser()=="admin")
                    echo '<th>Supprimer</th>
                          <th>Modifier</th>
                          <th>Bloquer</th>
                          <th>Gerer</th>';


                ?>
            </tr>
        </thead>
        <tbody>
              <?php
              foreach ($array as $k => $v) {
               $arr = $v;
               $usr=$controller->getcurrentUser();
               if ($arr['etat']==1 || $usr=="admin"){
               echo "<tr>";
               echo "<td><a href='../siteEcole/view/index.php'>".$arr['nom']."</a></td>";
               echo "<td>".$arr['type']."</td>";
               echo "<td>".$arr['categorie']."</td>";
               echo "<td>".$arr['wilaya']."</td>";
               echo "<td>".$arr['commune']."</td>";
               echo "<td>".$arr['adresse']."</td>";
               echo "<td>".$arr['telephone']."</td>";
               echo "<td> <a href='comment.php?id=".$arr['id']."&&ecole=".$arr['nom']."'><input class='btnss' type='submit' ";if ($usr=="any") echo "disabled " ;echo"name ='comment' class='comment' value='commenter' id='".$arr['id']."'></a>";
               if($controller->getcurrentUser()=="admin"){

                    echo '<td><Button id='.$arr['id'].' class= "btnss" onclick="supprimer(this)"> supprmier</Button></td>
                          <td><form  method="post"><textarea name=id hidden >'.$arr['id'].'</textarea><Button id='.$arr['id'].' class= "btnss" name="modif" > modifier</Button></form></td>';
                          if($arr['etat']==1)
                            echo '<td><Button id='.$arr['id'].' class= "btnss" onclick="bloquer(this)"> bloquer</Button></td>';
                          else {
                            echo '<td><Button id='.$arr['id'].' class= "btnss" onclick="debloquer(this)"> debloquer</Button></td>';}
                            echo "<td> <a href='../siteEcole/ttt/view/ttt.php'><input class='btnss' type='submit' value='gerer' id='".$arr['id']."'></a>";
                          }

               echo "</tr>";
              }
            }
              ?>
            </tbody>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>type</th>
                <th>Categorie</th>
                <th>Wilaya</th>
                <th>Commune</th>
                <th>Adresse</th>
                <th>Telephone</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
<footer >
	<?php  
  include("footer.php");
   ?>
</footer>
</div>
</body>

<script>
	
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 3000); // Change image every 2 seconds
}

$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

</script>

</html> 
