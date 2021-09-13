<?php

if(isset($_POST['titre'])){
    require '../db_conn.php';

    $titre = $_POST['titre'];

    if(empty($titre)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO taches(titre) VALUE(?)");
        $res = $stmt->execute([$titre]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}