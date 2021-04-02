<?php
  session_start(); 
  include "./db.php";  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <body>  
  
  <?php

    if (isset($_POST['odeslano'])){
      $username = $_POST["username"];
      $password = $_POST["password"];
      if($_POST["username"] && $_POST["password"]){
        $connect = new mysqli($host, $user, $pass, $db) or die("nepodařilo se připojit k databázi");
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($connect, $query);

        if($result){
          if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $_POST["password"]){
              $_SESSION['user'] = $_POST["username"]; 
              header("Location: index.php");
              die;
            }
          }
        } else{
          echo "<p>Špatné jméno nebo heslo.</p>";        
        }
      } else{
      echo "Špatné jméno / heslo.";
    }
  }        
    ?>
    <h1>Přihlášení uživatele</h1>
    <form method="POST" action=""> 
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>  
        <p><input type="submit" name="odeslano" value="Přihlásit se"></p>
    </form>
   
  </body>
</html> 

