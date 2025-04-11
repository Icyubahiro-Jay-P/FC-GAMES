<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "fc_games";

try{
  $conn = mysqli_connect($db_host,
                        $db_user,
                        $db_pass,
                        $db_name);
}catch(mysqli_sql_exception){
  echo "Failed to connect to the database";
}
?>