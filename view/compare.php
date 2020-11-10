<?php
require("../control/controller.php");
$controller=new Controller();
?>




<!DOCTYPE html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1" charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="../media/css.css">
<link rel="stylesheet" type="text/css" href="../media/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
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

<div>
<br>
<br> Type :
<select class="type" onchange="typeSelect()"  onfocus="typeSelect()">
  <option value="ecole">ecole</option>
  <option value="univ">université</option>
  <option value="maternelle">maternelle</option>
  <option value="primaire">primaire</option>
  <option value="moyen">moyen</option>
  <option value="formation">formation</option>
</select>
<br>
<br>
  </select>
<br>
<div id="ecole1"> </div>
<br><br>
<button id="compare" onclick="compare()">Compare</button>

<br>
<br>
<table style="width:100%" class='blueTable'>
  <tr>
    <th>Nom</th>
    <th>type</th> 
    <th>categorie</th> 
    <th>tarif</th> 
    <th>volume</th>
    <th>commentaires</th>
  </tr>
    <tr id="cmp1"> </tr>
    <tr id="cmp2"> </tr>
</table>
<br>
<br>
</div>
<footer >
  <?php  
  include("footer.php");
   ?>
</footer>
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
