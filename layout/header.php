<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio | <?= $tittle ?></title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header class="sticky sticky-top">
        <nav class="navbar navbar-expand-lg bg-yellow border-4 mb-3 border-bottom border-dark">
            <div class="container">
                <a class="navbar-brand mr-10" href="index.php"><img src="images/icon.png" width="30" class="mr-20" alt="icon.png"> My Portfolio</a>
                <a role="button" data-bs-toggle="modal" data-bs-target="#logout">
                    <img class="side" width="50" src="images/exit.png" alt="Exit" />
                </a>
            </div>
        </nav>
    </header>
    <div class="modal fade z-index-9" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutLabel">Logout!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Anda yakin ingin Logout?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Tidak</button>
                    <a role="submit" class="btn btn-success mt-3" href="index.php?logout=1">Ya</a>
                </div>
            </div>
        </div>
    </div>