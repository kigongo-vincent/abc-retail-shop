<?php

// function for updating a specified column for a given row in the table 

// it takes in the name of the table, the primary key (unique identifier for the row), the column to be updated and the new value to be inserted into the column 

function PATCH($table, $row, $data){

    $execution = "";

    foreach ($data as $key => $value) {
        
      $execution .= sprintf('%s = "%s", ', $key, $value);

    }

    try {

        include("./components/connect.php");

        include("./utilities/GET_ONE.php");

        $result = GET_ONE($table, "id", $row);

        if($result["status"] != 200){

            return ["status" => 404];

        }

        $sql = sprintf(
            
            'UPDATE %s SET %s WHERE %s.id = %s',

            $table,

            substr($execution, 0, -2),

            $table,

            $row
        
        );
    
        $response = mysqli_query($db_connection, $sql);

        if($response){

            return ["status" => 202];

        }else{

            return ["status" => 400];

        }

    } catch (\Throwable $th) {
        
        return ["status" => 400, "error"=> $th];

    }

}

?>