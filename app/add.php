<?php

if(isset($_POST['title'])){
    require "../db_conn.php";

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=eror");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../index.php?mess=succsess");
        }else{
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=eror");
}