<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            <?php
            include 'style.css';
            ?>
        </style>
    </head>
    <body>
        <?php
        session_start();
        $user = $pw = "";
        $userErr = $pwErr ="";
        require 'Connection.php';
                
       if($_SERVER["REQUEST_METHOD"] == "POST")
        {
         if(empty($_POST["user"]))
         {
           $userErr = "Username is required";
         }
         else
         {
           $name = test_input($_POST["user"]);
           
           if(!preg_match("/^[a-zA-Z ]*$/",$user))
           {
             $userErr = "Only letters and white space can be used";  
           }
           else
           {
            $query = $access->prepare("SELECT Username FROM loginadmins WHERE Username = ?");
            $query->execute(array($name));
            $row = $query->fetch();
           }
         }
         if(empty($_POST["pw"]))
         {
           $pwErr = "Password is required";
         }      
         else
         {
           $pass = test_input($_POST["pw"]);
           
           if(!preg_match("/^[a-zA-Z0-9]*$/",$pw))
           {
             $pwErr = "Must only contain letters and numbers";  
           }
           else
           {
            $query = $access->prepare("SELECT Password FROM loginadmins WHERE Password = ?");
            $query->execute(array($pass));
            $row = $query->fetch();
            
            
           }
         }
         
        
        }
        //Checks for errors in login form.
        function test_input($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
        
        
      ?>
        
        <h2>Administrator Login:</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Username: <input type="text" name="user" value="<?php $user; ?>">
            <span class="error">* <?php echo $userErr; ?></span>
            <br><br>
            Password: <input type="text" action="<?php echo $pw ?>">
            <span class="error">* <?php echo $pwErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Login">
            <a href="http://localhost/VolunteerManagement/AdminPage.php">Admin</a>
        </form>
    </body>
</html>
