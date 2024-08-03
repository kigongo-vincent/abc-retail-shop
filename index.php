<?php

include("./utilities/GET.php");

include("./components/connect.php");

$result = GET($db_connection, "products", FALSE);

print_r($result["data"]);
