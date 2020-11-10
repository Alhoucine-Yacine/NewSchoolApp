<?php
$host ="localhost";
$user="root";
$password="";
$database="tdw";
$connection=mysqli_connect($host,$user,$password,$database);
  require_once ('../controller/getInit.php');

  $cont=new Controller();
Class model {
  function getForm(){
  
  		return '
 
 <div1>
  Type de formation :<br>
  <input type="text" name="nomFormation" id="nomFormation"><br>
  Volume :<br>
  <input type="text" name="vol" id="vol"><br>
  HT :<br>
  <input type="text" name="HT" id="HT"><br>
  TAUX :<br>
  <input type="text" name="TAUX" id="TAUX"><br>
  Nom de la formation :<br>
  <input type="text" name="nomfFormation" id="nomfFormation"><br><br>
  <input type="submit" name="submit" class="submitt" value ="Ajouter">
  </div1>
  <div2>
  <br><br><br>'
  ."<h3> Ajout d'une formation </h3>".' 
  Type de formation :<br>
  <input type="text" name="nomFormation" id="nomFormation2"><br>
  Nom de la formation :<br>
  <input type="text" name="nomfFormation" id="nomfFormation2"><br><br>
  <input type="submit" name="submit2" class="submitt2" value ="Ajouter">
  </div2>
  ' ;

  }




  function getP(){
      $str="";
      $str=$str. 'Titre : <input type="text" name="newTitle" id="newTitle"><br><br>
  <input type="submit" name="submitTitle" class="submitTitle" value ="Modifier"> <br><br>';
      $str=$str. 'Couleur du corps : <div id="red" class="colB" style="background-color:red;width:50px"> &nbsp </div>
      <div id="blue" class="colB" style="background-color:blue;width:50px"> &nbsp</div>
      <div id="white" class="colB" style="background-color:white;width:50px"> &nbsp</div>
      <div id="orange" class="colB" style="background-color:orange;width:50px"> &nbsp</div>
      <div id="green" class="colB" style="background-color:green;width:50px"> &nbsp</div>
      <div id="yellow" class="colB" style="background-color:yellow;width:50px"> &nbsp</div>
      <div id="pink" class="colB" style="background-color:pink;width:50px"> &nbsp</div>
      <div id="purple" class="colB" style="background-color:purple;width:50px"> &nbsp</div>




      <br><br>';
      $str=$str. 'Couleur du la liste : <div id="red!" class="colL" style="background-color:red;width:50px"> &nbsp</div>
      <div id="blue!" class="colL" style="background-color:blue;width:50px"> &nbsp</div>
      <div id="white!" class="colL" style="background-color:white;width:50px"> &nbsp</div>
      <div id="orange!" class="colL" style="background-color:orange;width:50px"> &nbsp</div>
      <div id="green!" class="colL" style="background-color:green;width:50px"> &nbsp</div>
      <div id="yellow!" class="colL" style="background-color:yellow;width:50px"> &nbsp</div>
      <div id="pink!" class="colL" style="background-color:pink;width:50px"> &nbsp</div>
      <div id="purple!" class="colL" style="background-color:purple;width:50px"> &nbsp</div>  

      <br><br>';
      $str=$str. 'Email : <input type="text" name="em" id="em" placeholder="me.me@domain.com"><br><br>
      <input type="submit" name="submitEm" class="submitEm" value ="Modifier"> <br><br>';
      $str=$str. 'Nom de la video : <input type="text" name="video" id="video"><br><br>
      <input type="submit" name="submitVideo" class="submitVideo" value ="Modifier"> <br><br>';
       $sql = "SELECT * FROM videos";
       $str=$str."<h2> Choisir une video : </h2><br>";
        $mq = mysqli_query($GLOBALS['connection'],$sql) ;
        while ($mq && $row =mysqli_fetch_assoc($mq)){
        $video=$row['link'];
        $str=$str.'<video src="../../view/videos/'.$video.'" width=55% controls> </video><br>
        <input type="submit" class="delVid" id="'. $video.'" value="choisir" ><br><br>';       
      } 
      $str=$str. 'Ajouter une image : <input type="text" name="imgAdd" id="imgAdd"><br><br>
      <input type="submit" name="submitImg" class="submitImg" value ="Modifier"> <br><br>';
      $str=$str."<h2> Choisir les images à supprimer : </h2><br>";
      $sql = "SELECT * FROM images";
      $mq = mysqli_query($GLOBALS['connection'],$sql) ;
      if ($mq){
      while ($row =mysqli_fetch_assoc($mq)){
        $image=$row['link'];
        $str=$str.'<img width=50% src="../../view/images/'.$image.'"> <br>
        <input type="submit" class="delClass" id="'. $image.'" value="supprimer" > <br><br>';
        
      }
  }
    return $str;
    
  }


  function getData(){ 
    $result=$GLOBALS['cont']->getFromDB();
    $stringReturn="";

 	if ($result){

      while ($row =mysqli_fetch_assoc($result)){
        $varTAUX=$row['taux'];
        $varHT=$row['ht'];
        $varTTC=$varHT+$varHT*$varTAUX/100;

        $stringReturn=$stringReturn."<tr><td><h2>" . $row ['nom'] ."</h2>";
        $r=$GLOBALS['cont']->getForForm($row['nom']);
        if ($r){
        while ($ro =mysqli_fetch_assoc($r)){
          $stringReturn=$stringReturn.$ro['nom'];
          $stringReturn=$stringReturn.'<a href=" " class="delF" id="'.$ro['nom'] .'"> supprimer </a> <br>';
      }
  }

        $stringReturn=$stringReturn." </td><td >" . $row['volume']. 'h </td><td class="HT">' . $varHT.'DA</td><td class="TAUX">'.$varTAUX.'</td><td class="TTC">'.$varTTC.' DA</td> <td><input type="submit" value ="modifier" class="ediOP" id="'.$row ['nom'].'" </td> <td><input type="submit" value="supprimer" class="delOP" id="'.$row ['nom'].'$" </td>';
      }
              } 
              return ($stringReturn);
  } 
  }
?>