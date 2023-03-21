<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");


$method = $_SERVER['REQUEST_METHOD'];
$type = $_GET['url'];
$sliceurl = explode("/",$type);
$id = $sliceurl[2];


require "config.php";
require "requiredb.php";


switch ($method){
    case "GET":
        switch ($type){
            case "v1/notebook/".$id:
                if(isset($id)){
                    getUser($connect, $id);
                }
            case "v1/notebook":
                getUsers($connect);
        }
    case "POST":
        switch ($type){
            case "v1/notebook/".$id:
                if(isset($id)){
                    if (isset($_FILES)){
                        $img = addslashes(file_get_contents($_FILES['photo']['tmp_name']));    
                    }else{
                        $img = NULL;
                    }
                    addUser($connect, $_POST, $img);
                }
            case "v1/notebook":
                if (isset($_FILES['photo'])){
                    $img = addslashes(file_get_contents($_FILES['photo']['tmp_name']));    
                }else{
                    $img = NULL;
                }
                addUser($connect, $_POST, $img);
        }

    case "DELETE":
        switch ($type){
            case "v1/notebook/".$id:
                deleteUser($connect, $id);
            }

}
?>