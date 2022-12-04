<?php
require("header-inc.php");

require_once("connection.php");

if ($_POST) {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $comentario = isset($_POST["comentario"]) ? $_POST["comentario"] : "";
    $telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";

    $sql = "INSERT INTO contato (nome, email, comentario, telefone) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $param_nome, $param_email, $param_comentario, $param_telefone);

        // Set parameters
        $param_nome = $nome;
        $param_telefone = $telefone;
        $param_email = $email;
        $param_comentario = $comentario;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location: index.php");
        } else {
            echo "Oops! Algo deu errado. Por favor, tente novamente mais tarde.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}


?>
</div>

<body class="sub_page">
    <section class="login_section layout_padding">

        <div class="container" style="margin-top:50px">
            <h2 class="border-bottom border-gray pb-2 mb-0"><strong class="text-gray-dark">Contato</strong>
            </h2>
            <form method="post">
                <br>
                <label for="data">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control">
                <br>
                <label for="data">Email:</label>
                <input type="text" name="email" id="email" class="form-control">
                <br>
                <label for="data">Telefone:</label>
                <input type="text" name="telefone" id="telefone" class="form-control">
                <br>
                <label for="data">Comentario:</label>
                <div class="row">
                    <textarea class="form-control" name="comentario" id="comentario" cols="90" rows="10"></textarea>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <?php
            if (isset($mensagem)) {
            ?>
            <a href="home.php" type="button" class="btn btn-success">
                <?= $mensagem ?>
            </a>
            <?php
            }
            ?>

        </div>

    </section>
</body>
<?php require("footer-inc.php"); ?>