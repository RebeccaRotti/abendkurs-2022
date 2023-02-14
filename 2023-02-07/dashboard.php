
<?php
require_once('controller/Controller.php');
require('./inc/nav.php');
?>
<main class="container py-4 mt-5 bg-light">

    <form method="post" action="logic/logicInsert.php" class="mb-4">
        <div class="mb-3">
            <label for="inputMail" class="form-label">Email address</label>
            <input type="email" name="inputMail" class="form-control" id="inputMail">
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="inputName" class="form-control" id="inputName">
        </div>

        <button type="submit" class="btn btn-dark">Speichern</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">mail</th>
                <th scope="col">name</th>
                <th scope="col">created</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM exercise01";
            foreach ($pdo->query($sql) as $row) {
                ?>
                <tr>
                    <td> <?= $row['id'] ?> </td>
                    <td> <?= $row['name'] ?> </td>
                    <td> <?= $row['mail'] ?> </td>
                    <td> <?= $row['created_at'] ?> </td>
                    <td>
                        <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-dark">edit</a>
                        <a class="btn btn-danger" href="logic/logicDelete.php?id=<?= $row['id'] ?>">delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once ('./inc/script.inc.php');
?>
</body>
</html>
