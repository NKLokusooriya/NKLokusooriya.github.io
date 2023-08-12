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
  function sanitizeInput($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $nameError = $emailError = $messageError = '';
  
  if($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (empty($_POST["name"])) 
    {
      $nameError = "Name is required";
    } 
    else 
    {
      $name = sanitizeInput($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
          $nameError = "Only letters and spaces allowed";
      }
    }

    if (empty($_POST["email"])) 
    {
      $emailError = "Email is required";
    } else 
    {
      $email = sanitizeInput($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        $emailError = "Invalid email format";
      }
    }

    if (empty($_POST["message"])) 
    {
      $messageError = "Message is required";
    } else 
    {
      $message = sanitizeInput($_POST["message"]);
      $message = strip_tags($message);
    }
  }
  
  $errors = array_filter(array(
    'nameError' => $nameError,
    'emailError' => $emailError,
    'messageError' => $messageError
  ));
  
  if (empty($errors)) 
  {
    $sql = "INSERT INTO details(Name, Email, Message) VALUES ('$name', '$email', '$message')";
    if ($connection->query($sql) === TRUE) 
    {
      echo "Data inserted successfully!";
    } 
    else 
    {
      echo "Error: " . $sql . "<br>" . $connection->error;
    }
  } 
  else 
  {
    echo json_encode($errors);
  }
  
  $connection->close();
  
?>  