<?php
session_start();
include 'server/connection.php';

if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = ? AND password = ? LIMIT 1";
    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {

        $stmt_login->bind_result(
            $id,
            $nama,
            $email,
            $password,
            $kelamin,
            $umur,
            $photo,
            $domisili,
            $hobi
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {

            $stmt_login->fetch();

            $_SESSION['id'] = $id;
            $_SESSION['nama'] = $nama;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['kelamin'] = $kelamin;
            $_SESSION['umur'] = $umur;
            $_SESSION['photo'] = $photo;
            $_SESSION['domisili'] = $domisili;
            $_SESSION['hobi'] = $hobi;
            $_SESSION['logged_in'] = true;
            header("location: index.php?login=1");
        } else {
            header('location: login.php?error=Email atau Password salah!');
        }
    } else {
        header('location: login.php?error=Terjadi suatu kesalahan!');
    }
}
$tittle = 'Login';
include 'layout/header.php';
?>
<div class="container w-75">
    <h1 class="my-5 text-center">Login</h1>
    <form method="post">
        <div class="container">
            <div>
                <h5>Masukan Email:</h5>
                <input type="text" name="email" class="form-control my-3" placeholder="Email" required>
            </div>
            <div>
                <h5>Masukan Password:</h5>
                <input type="password" name="password" class="form-control my-3" placeholder="Password" required>
            </div>
            <div>
                <input type="submit" class="btn btn-primary btn-success mt-3" name="submit" value="Login">
            </div><br>
            <?php if (isset($_GET['error'])) ?>
            <div class="error text-danger">
                <?php
                if (isset($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
            </div>
        </div>
    </form>
</div>
<?php
include 'layout/footer.php';
?>