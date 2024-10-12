<?php
 // for evoid the big error massage of php. using this way can help to show 
 // a special(small) error message
 try{
  $pdo = new PDO ('mysql:host=localhost;dbname=todolist','root','');
 }
 catch (PDOException $e){
  echo '<p> erreur: '.$e -> getMessage();
  die();
 }
 ?> 