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
$controller->getMainMenu();
 ?>

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
