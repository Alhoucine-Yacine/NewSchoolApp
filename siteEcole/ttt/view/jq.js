$(".submitt").click(function(){
	var formation= $("#nomFormation").val();
	var vol= $("#vol").val();
	var HT= $("#HT").val();
	var TAUX= $("#TAUX").val();
	var TTC = $("#HT").val()+$("#HT").val()*$("#TAUX").val()/100;
	var formm = $("#nomfFormation").val();

	if (formation!="" && vol!="" && HT!="" && TAUX!="" && formm!=""){
	var phrase = '<tr><td><h2>' + formation +'</h2><br>' +formm +'<br></td><td >'+ vol +'</td><td class="HT">'+ HT +'</td><td class="HT">' + TAUX + '</td><td class="TTC">'+ TTC+ '</td><td><input type="submit" value ="modifier" class="ediOP" id="'+formation+'" </td> <td><input type="submit" value="supprimer" class="delOP" id="'+formation+'$" </td></tr>';
	$("#tab").append(phrase);
	  var phrase11="insert into type_formation (nom,volume,ht,taux) values('"+formation+"',"+vol+","+HT+","+TAUX+");";
	  var phrase22="insert into formations (nom,type) values('"+formm+"','"+formation+"');";
	  $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
    	

    }
});	 
$.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase22},
    success: function(response) {
    	location.reload();

    }
}); 
}
else (alert("Veuillez remplir tous les champs !"));
});




$(".delOP").click(function(){
	var r=confirm("voulez vous vraiment supprimer "+this.id.replace('$',''));
	if (r==true){
	var phrase11='delete from type_formation where nom="' + this.id.replace('$','')+'";';
	 $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
    	location.reload();
    }
});
	 }
	});

$(".submitVideo").click(function(){
	var phrase11='insert into videos (link) values ("' + $('#video').val()+'");';
	 $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
    	location.reload();
    }
});
	 
	});

$(".submitTitle").click(function(){
    var phrase11='update titre set description="' + $('#newTitle').val()+'";';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });

$(".submitEm").click(function(){
    var phrase11='update email set adr="' + $('#em').val()+'";';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });

$(".submitImage").click(function(){
    var phrase11='delete from images where link="' + $('#image').val()+'";';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });

$(".submitBColor").click(function(){
    var phrase11='update colorBody set color="' + $('#newBColor').val()+'" where id=1;';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });


$(".submitLCOLOR").click(function(){
    var phrase11='update colorList set color="' + $('#newLColor').val()+'" where id=1;';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });



$(".submitImg").click(function(){
    var phrase11='insert into images (link) values ("' + $('#imgAdd').val()+'");';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 
    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });



$(".ediOP").click(function(){
	var name=prompt("Type de formation : ",this.id);
	var volume=prompt("Volume en heures : ","");
	var tarif=prompt("Le tarif : ","");
	var taux=prompt("Le taux : ","");

	if (name!="" && volume !="" && tarif!="" && taux!="")
	{	var phrase15='delete from type_formation where nom="' + this.id.replace('$','')+'";';
		$.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase15},
    success: function(response) {
    	phrase16='insert into type_formation (nom,volume,ht,taux) values("' + name+'",'+volume+','+tarif+','+taux+');';
			$.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase16},
    success: function(response) {
    	location.reload();
    }
});
    }
});
			



	}

	// ","type formation : "," ","type formation : "," 
	});

$(".delF").click(function(){
	var r=confirm("voulez vous vraiment supprimer "+this.id);
	if (r==true){
	var phrase11='delete from formations where nom="' + this.id+'";';
	 $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
    	location.reload();
    }
});
	 }
	});

$(".submitt2").click(function(){
	var nf=$("#nomFormation2").val();
	var nt=$("#nomfFormation2").val();
	var phrase11='insert into formations (nom,type) values("' +nt +'","'+ nf +'");';
	 $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 
    data: { text1: phrase11},
    success: function(response) {
        alert(phrase11);
    	location.reload();
    }
});
	 
	});

$(".delClass").click(function(){
    var id=this.id;
     var phrase11='delete from images where link="' + id+'";';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});


});

$(".colB").click(function(){
    var phrase11='update colorBody set color="'+this.id+'" where id=1;';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });

$(".colL").click(function(){
    var phrase11='update colorList set color="'+this.id.replace('!','')+'" where id=1;';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
     
    });


$(".delVid").click(function(){
    
    var phrase11='update selectedVideo set link="' + this.id+'" where id=1;';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
    });

$(".delVid").click(function(){
    
    var phrase11='update selectedVideo set link="' + this.id+'" where id=1;';
     $.ajax({  
    type: 'POST',  
    url: '../controller/insertDB.php', 

    data: { text1: phrase11},
    success: function(response) {
        location.reload();
    }
});
    });









