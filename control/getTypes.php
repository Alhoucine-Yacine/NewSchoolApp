<?php 

$host ="localhost";
$user="root";
$password="";
$database="tdw";
$connection=mysqli_connect($host,$user,$password,$database);

function getLC(){
  $query="select * from ecole";
  $result = mysqli_query($GLOBALS['connection'],$query);
  $str=" Ecole 1 :
<select id='etab1'>";
$str2=" Ecole 2 :
<select id='etab2'>";

if ($result){
      while ($row =mysqli_fetch_assoc($result)){
        $str=$str. '<option id="'.$row['id'].'"value="'.$row['id'].'">'.$row['nom']."</option>";
        $str2=$str2. '<option id="'.$row['id'].'"value="'.$row['id'].'">'.$row['nom']."</option>";
        }

      $str=$str. "</select>";
      $str2=$str2. "</select>";
    }
            return $str.'<br><br>'.$str2; 
  
}

function getcmp($i){
  $query="select * from ecole where id=".$i.";";
  $result = mysqli_query($GLOBALS['connection'],$query);
  $str="";

if ($result){
      while ($row =mysqli_fetch_assoc($result)){
        $query1="select * from comments where idF=".$i.";";
  $result1 = mysqli_query($GLOBALS['connection'],$query1);
        $str="<td>".$row['nom']."<d><td>".$row['type']."</td><td> ".$row['categorie']."</td><td> ".$row['tarif']." da</td><td> ".$row['volume'].'</td>';
        $str=$str."<td>";
        if ($result1){
      while ($row1 =mysqli_fetch_assoc($result1)){
        $str=$str.'" '.$row1['text'].' "'.'<br>';
      }
    }
  }
}
    $str=$str.'</td>';
    return $str;

}

if(isset($_POST['getLC'])) {
  
  echo getLC();
}

if(isset($_POST['getcmp'])) {
    echo getcmp($_POST['getcmp']);
  }

if(isset($_POST['comm'])) {
    header("location:comment.php");
  }
?>