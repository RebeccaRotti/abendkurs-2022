<!doctype html>
<html lang="en">
<?php
include_once ('../inc/head.inc.php')
?>
<body>
<main class="container py-4">
    <?php
        $id = $_GET['id'];
        $stmt = $pdo->prepare('SELECT * FROM exercise01 WHERE id = ?');
        $stmt->execute(array($id));
        while($row = $stmt->fetch()) {
    ?>
            <form method="post" action="../logic/logicEdit.php">
                <input type="hidden" name="inputId" value="<?= $row['id'] ?>">
                <div class="mb-3">
                    <label for="inputMail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="inputMail" id="inputMail" value="<?= $row['mail'] ?>">
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName"name="inputName" value="<?= $row['name'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Speichern</button>
            </form>
    <?php } ?>

</main>

<?php
include_once ('../inc/script.inc.php');
?>
</body>
</html>
