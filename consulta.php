<?php
require("header-inc.php");

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}
?>
</div>

<body class="sub_page">
    <section class="login_section layout_padding">
        <div class="container" style="margin-top:50px">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Consultas</h1>

                    <!-- DataTales Example -->
                    <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col" align="left">
                                    <a href="cadastrar-consulta.php" class="btn btn-primary">Cadastrar</a>
                                </div>
                                <?php
                                if (isset($_SESSION["adm_login"])) {
                                ?>
                                <div class="col" align="right">
                                    <form action="">
                                        <input name="busca" value="<?php if (isset($_GET['busca']))
                                        echo $_GET['busca']; ?>" placeholder="Pesquisar por paciente" type="text">
                                        <button type="submit" class="btn btn-dark">Buscar</button>
                                    </form>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="doctor_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Serviço</th>
                                            <th>Data</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        require_once('connection.php');

                                        if (isset($_GET['busca'])) {
                                            // $mysql_query = "SELECT * FROM paciente";
                                            $pesquisa = $_GET['busca'];
                                            $mysql_query = "SELECT * 
                                            FROM  consultas  
                                            WHERE nome LIKE '%$pesquisa%' 
                                            OR rg LIKE '%$pesquisa%'
                                            OR servico LIKE '%$pesquisa%'";
                                        } else {
                                            $mysql_query = "SELECT * FROM consultas ";
                                        }

                                        $result = $conn->query($mysql_query);
                                        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                        if ($result === TRUE) {
                                            $msg = "insert success";
                                            $msgerror = "";
                                        } else {
                                            $msg = "insert error";
                                            $msgerror = $conn->error;
                                        }

                                        //Connection Close
                                        mysqli_close($conn);
                                        foreach ($json as $row) {
                                            // if ($row->adm_login == $_SESSION["adm_login"]) {
                                        ?>
                                        <tr role="row" class="even">
                                            <td>
                                                <?= $row["nome"] ?>
                                            </td>
                                            <td>
                                                <?= $row["servico"] ?>
                                            </td>
                                            <td>
                                                <?= $row["data"] ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div align="center">
                                                        <a href="excluir-consulta.php?id=<?= $row["id"] ?>"
                                                            class="btn btn-danger">Excluir</a><br><br>
                                                        <a href="editar-consulta.php?id=<?= $row["id"] ?>"
                                                            class="btn btn-warning">Editar</a><br><br>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            // }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </section>
</body>



<?php require("footer-inc.php"); ?>