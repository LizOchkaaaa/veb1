<?php
   session_start(); 
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<style>
    .p11 {
        position: absolute;
        font-family: serif;
        font-style: oblique;
    }

    .p12 {
        position: absolute;
        top: 60%;
        font-family: serif;
        font-style: oblique;
    }

    .p13 {
        position: absolute;
        left: 60%;
        top: 60%;
        font-family: serif;
        font-style: oblique;
    }

    table {
        position: absolute;
        top: 20%;
        font-family: serif;
        border: 1px solid grey;
        width: 95%;
        border-collapse: collapse;
    }

    th {
      border: 1px solid grey;
    }

    td {
      border: 1px solid grey;
      text-align: center;
    }

    .time {
        position: absolute;
        top: 45%;
        font-family: serif;
        font-style: oblique;
    }
	</style>
</head>
<body>
  <?php
    date_default_timezone_set('Europe/Moscow');

    $start = microtime(true);

    $x = (double) $_POST["myradio"];
    $y = (double) $_POST["y"];
    $r = (double) $_POST["selectR"];

    $current_time = date("H:i:s");

    $rightSector = ($x >= 0 && $y >= 0 && (pow($y,2) + pow($x, 2)) <= pow($r/2, 2));
    $leftSector = ($x <= 0 && $y >= 0 && ($x + $y) <= $r/2);
    $lowerSector = (abs($x) <= $r && $x <= 0 && abs($y) <= $r/2 && $y <= 0);
    

    if(!isset($_POST["myradio"])){
      $_SESSION["base"] = array();
    }

    if(!isset($_POST["y"])){
      $_SESSION["base2"] = array();
    }

    if(!isset($_POST["selectR"])){
      $_SESSION["base3"] = array();
    }

    if(!isset($_SESSION["base4"])){
      $_SESSION["base4"] = array();
    }

    if(!isset($_SESSION["base5"])){
      $_SESSION["base5"] = array();
    }

    if(!isset($_SESSION["base6"])){
      $_SESSION["base6"] = array();
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>X</th>";
    if(isset($_POST["myradio"])) {
    
      array_push($_SESSION["base"], $x);

    foreach($_SESSION["base"] as $key => $val)
    { 
        echo "<td>$val";
    }
    }
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Y</th>";
    if(isset($_POST["y"])) {
    
  
      array_push($_SESSION["base2"], $y);
  
      foreach($_SESSION["base2"] as $key => $val)
      { 
          echo "<td>$val";
      }
    }
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>R</th>";
    if(isset($_POST["selectR"])) {
      
      array_push($_SESSION["base3"], $r);
  
      foreach($_SESSION["base3"] as $key => $val)
      { 
          echo "<td>$val";
      }
    }
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Итог</th>";
    if($leftSector || $lowerSector || $rightSector) {
      array_push($_SESSION["base4"] , "+");
      
    }
    else {
        array_push($_SESSION["base4"] , "-");
       
    }
    foreach($_SESSION["base4"] as $key => $val)
    { 
      echo "<td>$val";
    }
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Время</th>";
    $finish = microtime(true);
    $result = $finish - $start;

    array_push($_SESSION["base5"] , $current_time);
    array_push($_SESSION["base6"] , $result);

    foreach($_SESSION["base5"] as $key => $val)
    { 
      echo "<td>$val";
    }
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Скрипт</th>";
    foreach($_SESSION["base6"] as $key => $val)
    { 
      echo "<td>$val";
    }
    echo "</td>";
    echo "</tr>";
    echo "</table>";
  
?>
  </body>
</html>