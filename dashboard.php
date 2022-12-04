<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<div class="container">
  <h2 style="color: #ffffff;">Bem vindo!</h2>
  <p style="color: #ffffff;">Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Seja Bem-Vindo!!.</h1>
  <hr> 
  <p>&nbsp;</p>
  <p>
    <a href="reset-password.php" class="btn btn-warning">Resete a sua senha</a>
    <a href="logout.php" class="btn btn-danger ml-3">Faça logout em sua conta</a>
  </p>
</div>

<?php require("footer-inc.php"); ?>