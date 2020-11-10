function blocU(element){
$.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {bloU: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}

function delCom(element){
  $.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {delC: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}

function deblocU(element){
$.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {debloU: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}

function supU(element){
$.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {suppU: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}



function supprimer(element){
$.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {supprimerE: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}

function bloquer(element){
$.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {bloquerE: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}

function debloquer(element){
$.ajax({
            url:"../control/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {debloquerE: element.id},
            success:function(result){
             location.reload(); 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}



function typeSelect(){
   $.ajax({
            url:"../control/getTypes.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getLC: 'demande'},
            success:function(result){
             $("#ecole1").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

}
  

  function compare(){
       
  var id1 =  $("#etab1").children(":selected").attr("id");
  var id2 =  $("#etab2").children(":selected").attr("id");

  $.ajax({
            url:"../control/getTypes.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getcmp: id1},
            success:function(result){
             $("#cmp1").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

  $.ajax({
            url:"../control/getTypes.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getcmp: id2},
            success:function(result){
             $("#cmp2").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
    
};
  

