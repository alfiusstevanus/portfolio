<?php
session_start();
include 'server/connection.php';

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['email']);
        header('location: login.php');
        exit;
    }
}
$q = 'SELECT * FROM user';
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$q_skill = 'SELECT * FROM skills';
$r_skill = mysqli_query($conn, $q_skill);

$tittle = 'Home';
include 'layout/header.php';
?>
<div class="container menu-list">
    <div class="border-3 border-bottom border-dark welcoming py-3 mb-2">
        <div class="d-flex row align-items-center">
            <h1 class="fs-2 mb-2">Siapakah saya?</h1>

            <div class="content col-md-4">
                <img class="d-absolute rounded-circle m-20 py-4" src="images/<?= $row['photo'] ?>" alt="<?= $row['nama'] ?>.jpg" style="width: 250px;">
            </div>
            <div class="content col-md-5">
                <p class="bg-yellow p-3 rounded-4 text-dark my-shadow">
                    Perkenalkan nama saya <span class="fw-bold"><?= $row['nama'] ?></span>, saya merupakan seorang <?= $row['kelamin'] ?> berumur <?= $row['umur'] ?> asal Kota <?= $row['domisili'] ?>. Saya seorang Mahasiswa di Institut Teknologi Nasional Bandung. Saya memiliki hobi <?= $row['hobi'] ?>. Saya memiliki beberapa keahlian, keahlian - keahlian tersebut akan saya tampilkan dibawah ini.
                </p>
            </div>
        </div>
    </div>
    <div class="d-flex row align-items-center">
        <div class="col-md-2 ">
            <h1 class="fs-2 py-3 mb-2">My Skills</h1>
        </div>
        <div class="col-md-2 ">
            <a type="button" class="btn btn btn-primary bg-success border-0 py-3 mb-2" role="button" data-bs-toggle="modal" data-bs-target="#tambahSkill">
                Add Skill
            </a>
        </div>
        <div class="col-md-4 ">
            <?php
            if (isset($_GET["login"]) && $_GET["login"] == true) {
            ?>
                <div id="alert" class="alert alert-success alert-dismissible fade show mt-2 " role="alert">
                    Hai <?php $nama = explode(" ", $row['nama']);
                        echo $nama[0]; ?>, Anda berhasil Login!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php }
            if (isset($_GET["created"]) && $_GET["created"] == true) {
            ?>
                <div id="alert" class="alert alert-success alert-dismissible fade show mt-2 " role="alert">
                    Skill berhasil ditambahkan!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php } else if (isset($_GET["created"]) && $_GET["created"] == false) { ?>
                <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    Gagal menambah Skill tersebut!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php }
            if (isset($_GET["updated"]) && $_GET["updated"] == true) {
            ?>
                <div id="alert" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    Skill tersebut berhasil di-Update!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php } else if (isset($_GET["updated"]) && $_GET["updated"] == false) { ?>
                <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    Gagal me-Update Skill tersebut!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php }
            if (isset($_GET["deleted"]) && $_GET["deleted"] == true) {
            ?>
                <div id="alert" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    Skill berhasil dihapus!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php } else if (isset($_GET["deleted"]) && $_GET["deleted"] == false) { ?>
                <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    Gagal menghapus skill tersebut!
                    <a href="index.php" class="btn-close"></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($r_skill)) : ?>
            <div class="col-lg-4">
                <div class="product-item mb-4 bg-yellow p-4 rounded-4">
                    <div class="row justify-content-evenly align-items-center">
                        <div>
                            <h4 class="text-center text-dark form-control"><?= $row['keahlian'] ?></h4>
                        </div>
                        <div>
                            <textarea class="form-control text-left border-0 my-2 no-scrol readonly-textarea" cols="30" rows="10" readonly><?= $row['deskripsi'] ?></textarea>
                            <!-- <p class="col-lg-4 form-control text-center border-0 my-2"><?= $row['deskripsi'] ?></p> -->
                        </div>
                        <div class="col-lg-4 mt-3">
                            <a class="btn btn btn-primary bg-success border-0 py-3" role="button" data-bs-toggle="modal" data-bs-target="#editSkill<?= $row['id'] ?>">
                                Update
                            </a>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <a class="btn btn btn-primary bg-danger border-0 py-3" role="button" data-bs-toggle="modal" data-bs-target="#deleteSkill<?= $row['id'] ?>">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modals start -->
            <div class="modal fade" id="editSkill<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editSkillLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSkillLabel">Update Skill</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="controller/update.php?id=<?= $row['id'] ?>">
                                <div class="container">
                                    <div>
                                        <h5>Keahlian:</h5>
                                        <input type="text" name="keahlian" class="form-control my-3" value="<?= $row['keahlian'] ?>" required>
                                    </div>
                                    <div>
                                        <h5>Deskripsi:</h5>
                                        <textarea name="deskripsi" class="form-control my-3 no-resize" required rows="7"><?= $row['deskripsi'] ?></textarea>
                                        <!-- <input type="text" name="price" class="form-control my-3" placeholder="Harga Produk" required> -->
                                    </div>
                                    <!-- <div>
                                <h5>Foto Produk:</h5>
                                <input type="file" name="picture" class="form-control my-3" required>
                            </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary btn-success mt-3" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteSkill<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteSkillLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteSkillLabel">Delete Skill</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Anda yakin ingin menghapus Skill <?= $row['keahlian'] ?> Anda?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                            <a role="submit" class="btn btn-danger btn-success mt-3" href="controller/delete.php?id=<?= $row['id'] ?>">Delete</a>
                            <!-- <input type="submit" class="btn btn-danger btn-success mt-3" value="Delete"> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="modal fade" id="tambahSkill" tabindex="-1" aria-labelledby="tambahSkillLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSkillLabel">Add New Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="controller/create.php">
                        <div class="container">
                            <div>
                                <h5>Masukan Keahlian:</h5>
                                <input type="text" name="keahlian" class="form-control my-3" placeholder="Keahlian" required>
                            </div>
                            <div>
                                <h5>Masukan Deskripsi:</h5>
                                <textarea name="deskripsi" class="form-control my-3 no-resize" placeholder="Deskripsi" required rows="7"></textarea>
                                <!-- <input type="text" name="price" class="form-control my-3" placeholder="Harga Produk" required> -->
                            </div>
                            <!-- <div>
                                <h5>Foto Produk:</h5>
                                <input type="file" name="picture" class="form-control my-3" required>
                            </div> -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary btn-success mt-3" value="Add Skill">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modall end -->
</div>
<?php
include 'layout/footer.php';
?>