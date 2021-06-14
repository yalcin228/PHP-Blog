<?php
session_start();
ob_start();
try {
    $conn=new PDO("mysql:host=localhost;dbname=news-blog","root","");
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>