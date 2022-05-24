<?php
//use port 8889 on a mac
$pdo = new PDO('mysql:host=sql209.epizy.com;port=3306;dbname=epiz_31615805_footballshop', 
   'epiz_31615805', 'O6rmv3SG1mF');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$db = mysqli_connect("sql209.epizy.com", "epiz_31615805", "O6rmv3SG1mF", "epiz_31615805_footballshop");
