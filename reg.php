<?php

require_once 'connection.php';


if(isset($_POST['form1'])){
    try{
    
        if(empty($_POST['name'])){
        
            throw new Exception('Name can not be empty');
        }
        if(empty($_POST['password'])){
        
            throw new Exception('Password can not be empty');
        }
        
        $username = $_POST[ 'name' ];
        $password = $_POST[ 'password' ];
        
        $PDOstatement = $db->prepare("INSERT INTO users (`user_name`, `user_pass`) VALUES (:username,:password)");

        $PDOstatement->bindValue('username', $username, PDO::PARAM_STR);
        $PDOstatement->bindValue('password', $password, PDO::PARAM_STR);
        $PDOstatement->execute();
        header('Location: logout.php');
        
    }
    catch(Exception $e){

    $error = $e->getMessage();
    echo $error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
</head>
<body>
 <form action="" method="post">
     <label for="name">NAME</label><br>
     <input type="text" id="name" name="name"><br>
     
     <label for="password">PASSWORD</label><br>
     <input type="text" id="password" name="password"><br>
     
     <input type="submit" name="form1">
</form>   
</body>
</html>
