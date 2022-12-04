<?php require("header-inc.php"); ?>

<section class="index_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            require_once('connection.php');
            $mysql_query = "SELECT * FROM servico";

            $result = $conn->query($mysql_query);
            $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_close($conn);

            $i = 0;
            foreach ($json as $row) {
                $i = $i + 1;
            ?>
            <div class="carousel-item <?php if ($i == 1) { ?> active <?php } ?>">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="detail-box">
                                <h1>
                                    <?= $row["nome"] ?>
                                </h1>
                                <p>
                                    <?= $row["descricao"] ?>
                                </p>
                                <div class="btn-box">
                                    <a href="cadastrar-consulta.php" class="btn1">
                                        contratar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <ol class="carousel-indicators">
            <?php
            $j = 0;
            foreach ($json as $row) {
                $j = $j + 1;
            ?>
            <li data-target="#customCarousel1" data-slide-to="<?= $j - 1 ?>" <?php if ($j == 1) { ?> class="active" <?php } ?>> </li>
            <?php
            }
            ?>
        </ol>
    </div>
</section>

<?php require("footer-inc.php"); ?>