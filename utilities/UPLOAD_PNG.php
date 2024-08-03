<?php

function UPLOAD_PNG($temporary_strorage){

    try {

        $random_name = random_bytes(32);

        $title = bin2hex($random_name);

        $name = $title.'.png';

        $destination = '../uploads/'.$name;

        move_uploaded_file($temporary_strorage, $destination);

        return ["status" => 201, "data" => $name];
    
} catch (\Throwable $th) {
    
    return ["status" => 400];

}

}

?>

