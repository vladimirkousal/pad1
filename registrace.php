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
    if (isset($_POST['odeslano'])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $password2 = $_POST["password"];
      $email = $_POST["email"];

      if ($_POST['password']== $_POST["password2"]){
        $connect = new mysqli($host, $user, $pass, $db) or die("nepodařilo se připojit k databázi");
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
        $result = mysqli_query($connect, $query);

        $row = mysqli_fetch_array($result);
        if(is_null($row)){
          $sql = "INSERT INTO users(username, password, email) VALUES('$username', '$password', '$email')";
          $connect->query($sql) or die("špatný dotaz: " . $sql);
          
          $_SESSION['user'] = $_POST["username"]; 
          header("Location: index.php"); 
      } else{
          echo "Uživatel / E-mail byl již použit.";        }
      }
        else {
            echo "<p>Hesla se neshodují</p>";        
        }
    }        
    ?>
    <h1>Registace uživatele</h1>
    <form method="POST"> 
        <p>Uživatelské jméno: <input type="text" name="username" required></p>
        <p>Heslo: <input type="password" name="password" minlength="7" required></p>
        <p>Heslo znovu: <input type="password" name="password2" minlength="7" required></p> 
        <p>E-mail: <input type="email" name="email" required></p>  
        <p><input type="submit" name="odeslano" value="Zaregistrovat se"></p>
    </form>
   
  </body>
</html> 

