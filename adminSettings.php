<?php
$controllers = 'controllers/adminSettingsCtrl.php';
include 'parts/header.php';
?>
<div class="container-fluid py-5 my-5">
    <div class="dashboard row">
        <div class="col-sm-12 col-md-5 pb-5">
            <div class="nav flex-column nav-pills fs-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Liste des Utilisateurs</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Liste des Articles</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Liste des Mini-Posts</button>
            </div>
        </div>
        <div class="col-md-5 text-center">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="admincard card p-5">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Pseudo</th>
                                        <th scope="col">Mail</th>
                                        <th scope="col">Rôle</th>
                                        <th scope="col "><i class="bi bi-trash text-danger"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Tableau Users
                                    foreach ($usersList as $value) {
                                    ?>
                                        <tr>
                                            <td><?= $value->pseudo ?></td>
                                            <td><?= $value->mail ?></td>
                                            <td><?= $value->id_Role ?></td>
                                            <td>
                                                <button type="button" class="btn-outline-danger rounded bi bi-trash" name="deleteUser" data-bs-target="#deleteElement" data-bs-toggle="modal" data-bs-dismiss="modal" data-userID="<?= $value->id ?>" onclick="document.getElementById('deleteID').value=this.getAttribute('data-userID')"></button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="admincard card p-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Auteur</th>
                                        <th scope="col"><i class="bi bi-trash text-danger"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Tableau Articles
                                    foreach ($articlesList as $value) {
                                    ?>
                                        <tr>
                                            <td><?= $value->articleTitle ?></td>
                                            <td><?= $value->pseudo ?></td>
                                            <td>
                                                <button type="button" class="btn-outline-danger rounded bi bi-trash" name="deleteArticle" data-bs-target="#deleteElement" data-bs-toggle="modal" data-bs-dismiss="modal" data-articleID="<?= $value->articleID ?>" onclick="document.getElementById('deleteID').value=this.getAttribute('data-articleID')"></button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="admincard card p-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom OST</th>
                                        <th scope="col">Pseudo</th>
                                        <th scope="col"><i class="bi bi-trash text-danger"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Tableau mini posts
                                    foreach ($minipostList as $value) {
                                    ?>
                                        <tr>
                                            <td><?= $value->ostName ?></td>
                                            <td><?= $value->pseudo ?></td>
                                            <td>
                                                <button type="button" class="btn-outline-danger rounded bi bi-trash" name="deleteMiniPost" data-bs-target="#deleteElement" data-bs-toggle="modal" data-bs-dismiss="modal" data-miniPostID="<?= $value->miniPostID ?>" onclick="document.getElementById('deleteID').value=this.getAttribute('data-miniPostID')"></button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteElement" tabindex="-1" aria-labelledby="deleteElementLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteElementLabel">Confirmation de Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Souhaitez-vous vraiment supprimer cet élément?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="POST">
                    <input type="hidden" id="deleteID" name="deleteID">
                    <button type="submit" class="btn btn-danger" name="deleteElement">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'parts/footer.php'; ?>