<?php

$controller=new controller();

class model {
function getTab1($result){
if ($result){
      $str=  '<table class="tableau" border="1" align="center" >
      <tr><th scope="col">Formation</th><th scope="col">Volume</th><th scope="col">HT</th><th scope="col">taux de taxe %</th><th scope="col">TTC</th></tr>
      <tbody id="tab">';
      while ($row =mysqli_fetch_assoc($result)){
        $varTAUX=$row['taux'];
        $varHT=$row['ht'];
        $varTTC=$varHT+$varHT*$varTAUX/100;
        $str=$str."<tr><td><h2>" . $row ['nom'] ."</h2>";
        $str=$str." </td><td >" . $row['volume']. 'h </td><td class="HT">' . $varHT.'DA</td><td class="TAUX">'.$varTAUX.'</td><td class="TTC">'.$varTTC.' DA</td>';
        ;
      }
      $str=$str.'</tbody> </table>';
  }   return $str;

}

function sendResult($result){
  $str="";

if ($result){
      while ($row =mysqli_fetch_assoc($result)){
        $str=$str. '<li class="formation"><a href="' . $row ['nom'] .'" class="lien">' . $row['nom']. '<lien>  </lien></a>';
        $q="Select * from formations where type='".$row ['nom']."';";
        $r=$GLOBALS['controller']->getResult2($q);
        if ($r){
          $str=$str. '<table class="tt">';
        while ($ro =mysqli_fetch_assoc($r)){
          $str=$str. '<tr><td>' . $ro['nom'].' </td></tr> ';
      }
      $str=$str. "</table></li>";
    }
              }
            }

            return $str;
}

function getEmail1($mq){
  $str="";
if ($mq && $row =mysqli_fetch_assoc($mq)){
        $title=$row['adr'];
        $str='<h2 align="center"><a href="mailto:'.$title.'">   Contact us</a> </h2>';
        
      }
      return $str;
}

function getVideo1($mq){
if ($mq && $row =mysqli_fetch_assoc($mq)){
        $video=$row['link'];
        $str='<video src="../view/videos/'.$video.'" width=55% controls> </video>';       
      }
      return $str; 
}

function getTitle1($mq){

  if ($mq && $row =mysqli_fetch_assoc($mq)){
        $title=$row['description'];
        $str='<h1><center><bdi>'.$title.'</bdi></center></h1>';
        
      }
      return $str;
}

function getDiapo1($mq){
if ($mq){
    $str="";
      while ($row =mysqli_fetch_assoc($mq)){
        $image=$row['link'];
        $str=$str.'<img src="../view/images/'.$image.'">';
        
      }
  }
    return $str;
}
}
  ?>