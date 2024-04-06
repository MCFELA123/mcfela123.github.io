<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text">
<center>
<div id="weld">
  
<?php
   $target = mktime(0, 0, 0, 4, 7, 2024) ;
   $today = time() ;
    $difference =($target-$today) ; 
    $days =(int) ($difference/86400) ;
    
   print "Your travel will be live in $days day(s)"; 
   
   ?>

</div>
</center>
</body>
</html>