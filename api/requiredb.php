<?php
require "config.php";

function getUsers($connect){
    $query = "SELECT * FROM `users`;";
    $res = mysqli_query($connect, $query);

    $listusers = [];
    while ($row = mysqli_fetch_array($res)) {
        $row['photo'] = base64_encode($row['photo']);
        $row[5] = base64_encode($row[5]);
        $listusers[] = $row;
    }
    
    echo json_encode($listusers);
}

function getUser($connect, $id){
    $query = "SELECT * FROM `users` WHERE `id` = '$id';";
    $res = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($res) === 0){

        http_response_code(404);
        $reaction = [
            "status" => false,
            "message" => "Пользователь не найден"
        ];
        echo json_encode($reaction);
    }

    $user = mysqli_fetch_assoc($res);
    echo json_encode($user);
}

function addUser($connect, $post, $img){
    $id = $post['id'];
    $name = $post['name'];
    $telephone = $post['telephone'];
    $email = $post['email'];
    $birthday = $post['birthday'];
    $photo = NULL;
    if(isset($post['photo'])){
        $photo = $post['photo'];
    }else{
        $photo = $img;
    }

    if(isset($id)){
        $query = "INSERT INTO `users` (`id`, `name`, `telephone`, `email`, `birthday`, `photo`) 
        VALUES ('$id', '$name', '$telephone', '$email', '$birthday', '$photo');";

    }else{
        $query = "INSERT INTO `users` (`id`, `name`, `telephone`, `email`, `birthday`, `photo`) 
        VALUES (NULL, '$name', '$telephone', '$email', '$birthday', '$photo');";
    }

    $res = mysqli_query($connect, $query);
    if($res){

        http_response_code(200);
        $reaction = [
            "status" => true,
            "user_id" => mysqli_insert_id($connect),
            "message" => "Пользователь добавлен"
        ];
        echo json_encode($reaction);

    }else{
        http_response_code(400);
        $reaction = [
            "status" => true,
            "message" => "Невозможно добавить данного пользователя"
        ];
        echo json_encode($reaction);
    }
}


function deleteUser($connect, $id){
    $query = "DELETE FROM `users` WHERE `id` = '$id';";
    $res = mysqli_query($connect, $query);

    if($res){

        http_response_code(200);
        $reaction = [
            "status" => true,
            "user_id" => $id,
            "message" => "Пользователь удален"
        ];
        echo json_encode($reaction);

    }else{
        http_response_code(400);
        $reaction = [
            "status" => true,
            "message" => "Невозможно удалить данного пользователя"
        ];
        echo json_encode($reaction);
    }
}

?>