<?php require_once('./controller/ToDo.php'); ?>
<?php
$ToDo = new ToDo();
$Response = [];
$active = $ToDo->active;
if(isset($_POST) && isset($_POST['entry'])) {
    $Response = $ToDo->updateEntry($_POST);
    $_POST = array();
}
if(isset($_POST) && isset($_POST['delete'])) {
    $Response = $ToDo->deleteEntry($_POST['delete']);
    $_POST = array();
}
if(isset($_POST) && isset($_POST['newEntry'])) {
    $Response = $ToDo->newEntry($_POST);
    $_POST = array();
}

$ToDo = $ToDo->getToDo();
?>
<?php
require('./inc/nav.php');
?>
<main class="container py-4 mt-5 bg-light">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-4">
        <input type="hidden" name="newEntry" value="1">
        <h4 class="h3 mb-3 font-weight-normal text-center">ToDos</h4>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="inputHeadline" class="sr-only">Headline</label>
                <input type="text" id="inputHeadline" class="form-control" placeholder="Überschrift" name="headline" required autofocus value="<?php if (isset($_POST['headline'])) echo $_POST['headline']; ?>">
                <?php if (isset($Response['headline']) && !empty($Response['headline'])): ?>
                    <small class="text-danger"><?php echo $Response['headline']; ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="form-group">
                <label for="inputDescription" class="sr-only">Beschreibung</label>
                <textarea  id="inputDescription" class="form-control" name="description" required autofocus><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
                <?php if (isset($Response['description']) && !empty($Response['description'])): ?>
                    <small class="text-danger"><?php echo $Response['description']; ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12 mt-4">
            <button class="btn btn-md btn-primary btn-block" type="submit">New</button>
        </div>

    </form>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php /*echo '<pre>' . var_export($ToDo, true) . '</pre>'; */?>
        <?php if (isset($ToDo['status'])) : ?>
            <?php foreach ($ToDo['data'] as $new) :  ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $new['headline']; ?></h5>
                        </div>
                        <div class="card-text p-3">
                            <p><?= $new['description']; ?></p>
                        </div>
                        <div class="card-footer">
                            <button onclick="editData(<?= $new['id'] ?>)" class="btn btn-dark">edit</button>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="delete" value="<?= $new['id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif;  ?>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-4">
                <div class="modal-body">
                    <input type="hidden" name="entry" id="entry" value="">
                    <h4 class="h3 mb-3 font-weight-normal text-center">ToDos</h4>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <label for="editHeadline" class="sr-only">Headline</label>
                            <input type="text" id="editHeadline" class="form-control" placeholder="Überschrift" name="headline" required autofocus value="<?php if (isset($_POST['headline'])) echo $_POST['headline']; ?>">
                            <?php if (isset($Response['headline']) && !empty($Response['headline'])): ?>
                                <small class="text-danger"><?php echo $Response['headline']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <label for="editDescription" class="sr-only">Beschreibung</label>
                            <textarea  id="editDescription" class="form-control" name="description" required autofocus><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
                            <?php if (isset($Response['description']) && !empty($Response['description'])): ?>
                                <small class="text-danger"><?php echo $Response['description']; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once ('./inc/script.inc.php');
?>
<script>
    function editData(id) {
        let myModal = new bootstrap.Modal(document.getElementById('editModal'));
        const URL = 'todoEdit.php?id='+id;
        console.log(URL);
        let fetchData = {
            method: 'GET'
        }
        fetch(URL, fetchData)
            .then(response => response.json())
            .then(function(hurra) {
                console.log(hurra);
                document.querySelector('#entry').value = hurra.data[0].id;
                document.querySelector('#editHeadline').value = hurra.data[0].headline;
                document.querySelector('#editDescription').innerText = hurra.data[0].description;
                myModal.toggle();
            });
        //e.preventDefault();
    }
</script>

</body>
</html>
