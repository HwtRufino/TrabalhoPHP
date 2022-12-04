<?php
require("header-inc.php");

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}
require_once("connection.php");

if ($_POST) {
    $datahora = isset($_POST["data"]) ? $_POST["data"] : "";
    $servico = isset($_POST["servico"]) ? $_POST["servico"] : "";
    $rg = isset($_POST["rg"]) ? $_POST["rg"] : "";
    $datanascimento = isset($_POST["datanascimento"]) ? $_POST["datanascimento"] : "";
    $telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";
    $nome =  isset($_POST["nome"]) ? $_POST["nome"] : "";

    $sql = "INSERT INTO consultas (nome, rg, servico, data, datanasc, telefone) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssss", $param_nome, $param_rg, $param_servico, $param_data, $param_datanasc,$param_telefone);

        // Set parameters
        $param_data = $datahora;
        $param_nome = $nome;
        $param_rg = $rg;
        $param_servico = $servico;
        $param_datanasc = $datanascimento;
        $param_telefone = $telefone;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location: consulta.php");
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
            <h2 class="border-bottom border-gray pb-2 mb-0"><strong class="text-gray-dark">Agendar Consulta</strong>
            </h2>
            <form method="post">
                <br>
                <label for="data">Data Consulta:</label>
                <input type="datetime-local" name="data" id="data" placeholder="data" class="form-control" required>
                <br>
                <label for="data">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" >
                <br>
                <label for="data">RG:</label>
                <input type="text" name="rg" id="rg" class="form-control" >
                <br>
                <label for="data">Telefone:</label>
                <input type="text" name="telefone" id="telefone" class="form-control" >
                <br>
                <label for="data">Data Nascimento:</label>
                <input type="date" name="datanascimento" id="datanascimento" class="form-control" >
                <br>
                <label for="data">Serviço:</label>
                <select id="servico" name="servico" class="form-control">
                    <?php
                    require_once('connection.php');
                    $mysql_query = "SELECT * FROM servico";

                    $result = $conn->query($mysql_query);
                    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    mysqli_close($conn);
                    foreach ($json as $row) {
                    ?>
                    <option value="<?= $row["nome"] ?>">
                        <?= $row["nome"] ?>
                    </option>
                    <?php
                    } ?>
                </select>
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