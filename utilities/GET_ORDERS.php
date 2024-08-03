<?php

function GET_ORDERS($db_connection){

try {
    
    $query = "SELECT * FROM ( SELECT * FROM orders LEFT JOIN products ON orders.product = products.product_id ) AS sub LEFT JOIN users ON sub.user = users.user_id";

    $response = mysqli_query($db_connection, $query);

    $count = mysqli_num_rows($response);
                
    $response = mysqli_fetch_all($response);
        
    return ["data"=> $response, "status"=> 200, "count" => $count];

} catch (\Throwable $th) {
    
    return ["status" => 400, "error"=> $th];

}

}

?>