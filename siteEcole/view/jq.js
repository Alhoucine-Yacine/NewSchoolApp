var getdata= setInterval(function() 
        {      
         $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getTab: 'demande'},
            success:function(result){ 
             $("#responsecontainer").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 

 $(document).ready(function(){
  
  //document.body.style.backgroundColor = "white"; 
  /*var div = document.getElementById( 'div_id' );
div.onmouseover = function() {
  this.style.backgroundColor = 'green';*/
        var response = '';

        $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getBody: 'demande'},
            success:function(result){
             document.body.style.backgroundColor = result; 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        
         $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getTab: 'demande'},
            success:function(result){
             $("#responsecontainer").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

         
          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getTitle: 'demande'},
            success:function(result){
             $("Tittre").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getDiapo: 'demande'},
            success:function(result){
             $("figure").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getVideo: 'demande'},
            success:function(result){
             $("#video").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getEmail: 'demande'},
            success:function(result){
             $("#email").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });

          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getLC: 'demande'},
            success:function(result){
             document.getElementById("lis").style.background=result; 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
     
        });

var getdata2= setInterval(function() 
        {
        var response = '';
        
          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getList: 'demande'},
            success:function(result){
             $("#lis").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 

 $(document).ready(function(){
        var response = '';
        
          $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getList: 'demande'},
            success:function(result){
             $("#lis").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        });


 var getdata= setInterval(function() 
        {
        
         $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getTitle: 'demande'},
            success:function(result){
             $("Tittre").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 

 var getdata= setInterval(function() 
        {
        
         $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getDiapo: 'demande'},
            success:function(result){
             $("figure").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 

 var getdata= setInterval(function() 
        {
        
         $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getVideo: 'demande'},
            success:function(result){
             $("#video").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 

 var getdata= setInterval(function() 
        {
        
         $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getEmail: 'demande'},
            success:function(result){
             $("#email").html(result);
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000);

 var getdata2= setInterval(function() 
        {
        
            $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getBody: 'demande'},
            success:function(result){
             document.body.style.backgroundColor = result; 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 

 var getdata2= setInterval(function() 
        {
        
            $.ajax({
            url:"../controller/controller.php", //the page containing php script
            type: "post", //request type,
            dataType: 'html',
           data: {getLC: 'demande'},
            success:function(result){
             document.getElementById("lis").style.background=result; 
           },
           error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
                }
         });
        },5000); 