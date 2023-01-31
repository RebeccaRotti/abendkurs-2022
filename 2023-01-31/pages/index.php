<!doctype html>
<html lang="en">
<?php
include_once ('../inc/head.inc.php')
?>
<body>
<main class="container py-4">
    <article>
        <form method="post" action="../logic/logicInsert.php">
            <div class="mb-3">
                <label for="inputMail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="inputMail" id="inputMail">
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName"name="inputName">
            </div>

            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </article>

    <article class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mail</th>
                <th scope="col">created</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $stmt = "SELECT * FROM exercise01";
                foreach ($pdo->query($stmt) as $row) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['mail'] ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-dark">Edit</a>
                    <a href="../logic/logicDelete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </article>

</main>

<?php
include_once ('../inc/script.inc.php');
?>
</body>
</html>
