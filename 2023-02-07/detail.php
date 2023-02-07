<!doctype html>
<html lang="en">
<?php
include_once ('inc/head.inc.php')
?>
<body>
<main class="container py-4">
<?php
$id = $_GET['id'];
$statement = $pdo->prepare("SELECT * FROM exercise01 WHERE id = ?");
$statement->execute(array($id));
while($row = $statement->fetch()) { ?>
    <form method="post" action="logic/logicEdit.php" class="mb-4">
        <input type="hidden" name="updateId" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label for="inputMail" class="form-label">Email address</label>
            <input type="email" name="inputMail" class="form-control" id="inputMail" value="<?= $row['mail'] ?>">
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="inputName" class="form-control" id="inputName" value="<?= $row['name'] ?>">
        </div>

        <button type="submit" class="btn btn-dark">Ändern</button>
    </form>
<?php } ?>

</main>

<?php
include_once ('inc/script.inc.php');
?>
</body>
</html>
