<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Trabalho PHP</title>
</head>

<body>
    <div class="content_area">

        <div class="content_bg_box">
            <img src="images/background.png" alt="">
        </div>

        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/11590086.png" width="150px" class="d-inline-block align-top" alt="">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>

                            <?php
                            if (isset($_SESSION["adm_login"])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="servico.php">Serviços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contato.php">Contatos</a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="cadastrar-contato.php">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="consulta.php">Consultas</a>
                            </li>
                            <button type="button" class="btn form-button dropdown-toggle" data-toggle="dropdown">
                                <?php echo htmlspecialchars($_SESSION["username"]); ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                $msgerror = $_GET['msgerror'];
                if ($msg == 'insert success') {
                    echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso!</div>";
                } else if ($msg == 'insert error') {
                    echo "<div class='alert alert-danger' role='alert'>Falha ao inserir o registro! {$msgerror}</div>";
                } else if ($msg == 'update success') {
                    echo "<div class='alert alert-success' role='alert'>Registro atualizado com sucesso!</div>";
                } else if ($msg == 'update error') {
                    echo "<div class='alert alert-danger' role='alert'>Falha ao atualizar o registro! {$msgerror}</div>";
                } else if ($msg == 'delete success') {
                    echo "<div class='alert alert-success' role='alert'>Registro excluido com sucesso!</div>";
                } else if ($msg == 'delete error') {
                    echo "<div class='alert alert-danger' role='alert'>Falha ao excluir o registro! {$msgerror}</div>";
                }
            }
            ?>