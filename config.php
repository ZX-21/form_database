<?php 

   $servername = "localhost";
   $username ="root";
   $userpass ="";
   $dbname = "form_post";

   try {
    $dbcon = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    $userpass);

    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conect to database<br>";
   } catch(PDOException $e) {
    //echo "Faild to connect to database<br>" . $e->getMessage();
   }
?>