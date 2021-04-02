<?php
  session_start();
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
    if (isset($_SESSION['user']))  {
      echo "<h1>Moje stránka</h1>";
      echo "<p>Vítej na mojí stránce " . $_SESSION['user'] . "</p>";
      
    ?>
        <form method="POST" action="./konec_session.php">
            <p><input type="submit" name="odeslano" value="Odhlásit se"></p>
        </form>   

    <?php
    
    }
    else  {
      //header("Location: autentizace.php");
      ?>

      <form method="POST" action="./registrace.php">
          <p><input type="submit" name="reg" value="Zaregistrovat se"></p>
        </form> 
      <form method="POST" action="./autentizace.php">
          <p><input type="submit" name="log" value="Přihlásit se"></p>
      </form> 
      <?php
    }
  ?>
  
   </body>
</html> 

