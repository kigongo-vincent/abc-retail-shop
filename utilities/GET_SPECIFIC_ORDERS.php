<?php

function GET_SPECIFIC_ORDERS($db_connection, $user){

try {
    
    $query = "SELECT * FROM orders LEFT JOIN products ON orders.product = products.product_id LEFT JOIN users ON orders.user = users.user_id WHERE orders.user = ".$user.";";

    $response = mysqli_query($db_connection, $query);

    $count = mysqli_num_rows($response);
                
    $response = mysqli_fetch_all($response);
        
    return ["data"=> $response, "status"=> 200, "count" => $count];

} catch (\Throwable $th) {
    
    return ["status" => 400, "error"=> $th];

}

}

?>