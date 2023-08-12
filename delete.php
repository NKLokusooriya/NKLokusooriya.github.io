<?php
  $server_name = "localhost";
  $user_name = "root";
  $password = "";
  $database = "wtdatabase";

  $connection = new mysqli($server_name, $user_name, $password, $database);

  if($connection -> connect_error)
  {
    die("Connection Error: " . $connection->connect_error);
  }
  else
  {
    echo 'Connection ok.';
  }
  
  if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "DELETE FROM details WHERE ID = $id";

    if ($connection->query($sql) === TRUE) {
        echo "Contact deleted successfully.";
    } else {
        echo "Error deleting contact: " . $conn->error;
    }
}
$connection->close();


?>