<?php
require("header-inc.php");

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}
require_once("connection.php");

if ($_POST) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";

    $sql = "INSERT INTO servico (nome, descricao) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_nome, $param_descricao);

        // Set parameters
        $param_nome = $nome;
        $param_descricao = $descricao;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location: servico.php");
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
            <h2 class="border-bottom border-gray pb-2 mb-0"><strong class="text-gray-dark">Cadastrar
                    servico</strong></h2>
            <form method="post">
                <label for="nome">Nome: </label>
                <input type="nome" name="nome" id="nome">
                <br>
                <label for="descricao">Descricao: </label>
                <textarea type="descricao" name="descricao" id="descricao"></textarea>
                <br>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
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