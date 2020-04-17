<?php 
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
//$x = 0;
// while($x++ < 50){
    $time=date('r');//rand(1,50);
//    echo "data: : {$time}\n\n";
//$time = date('r');
//echo "data: The server time is: {$time}\n\n";
//ob_flush();

//  }

$file = fopen("test.txt","r");

//while(!feof($file))
 // {
  $line = fgets($file);
  echo "data: <h1> {$line} </h1>\n\n";
  //echo "retry : {500}";
//  }
//echo "data: : {$time}\n\n";
fclose($file);
ob_flush();
flush();
?>