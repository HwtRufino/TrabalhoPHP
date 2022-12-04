<?php
require("header-inc.php");

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: dashboard.php");
    exit;
}

// Include config file
require_once("connection.php");

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, digite o usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, digite a senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["adm_login"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Usuário ou senha incorretos.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Usuário ou senha incorretos.";
                }
            } else {
                echo "Oops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
        </div>

<body class="sub_page">
    <section class="login_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Login
                </h2>
                <p>Por favor, entre com os seus dados de login.</p>
                <br>
                <div class="col-md-6">
                    <div class="form_container contact-form">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div>
                                        <input type="text" placeholder="Usuário" name="username"
                                            class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                            value="<?php echo $username; ?>">
                                        <span class="invalid-feedback">
                                            <?php echo $username_err; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div>
                                        <input type="password" placeholder="Senha" name="password"
                                            class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                        <span class="invalid-feedback">
                                            <?php echo $password_err; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="btn_box">
                                <button>
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <p>Não possui uma conta? <a href="register.php">Registre-se agora</a>.</p>
            </div>
        </div>

    </section>
</body>

<?php require("footer-inc.php"); ?>