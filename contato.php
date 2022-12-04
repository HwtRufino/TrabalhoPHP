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
                    <h1 class="h3 mb-4 text-gray-800">Contatos</h1>

                    <!-- DataTales Example -->
                    <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h6 class="m-0 font-weight-bold text-primary">Contatos</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="doctor_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Comentario</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        require_once('connection.php');
                                        $mysql_query = "SELECT * FROM contato";

                                        $result = $conn->query($mysql_query);
                                        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        mysqli_close($conn);

                                        foreach ($json as $row) {
                                        ?>
                                        <tr role="row" class="even">
                                            <td>
                                                <strong>
                                                    <?= $row["nome"] ?>
                                                </strong>
                                            </td>
                                            <td>
                                                <?= $row["email"] ?>
                                            </td>
                                            <td>
                                                <?= $row["telefone"] ?>
                                            </td>
                                            <td>
                                                <?= $row["comentario"] ?>
                                            </td>
                                            <td>
                                                <div align="center">
                                                    <a href="excluir-contato.php?id=<?= $row["id"] ?>"
                                                        class="btn btn-danger">Excluir</a><br><br>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
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