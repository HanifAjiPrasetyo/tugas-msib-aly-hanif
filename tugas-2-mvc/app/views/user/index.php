<!-- Create Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>/user/create" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <center>
                        <button type="submit" class="btn btn-sm btn-primary my-2 submitBtnUser" onclick="">Create User</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container p-3">

    <!-- Flash Message -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <!-- Button trigger modal -->
    <div class="row mb-3">
        <div class="col-lg-4">
            <button type="button" class="btn btn-sm btn-success addBtnUser" data-bs-toggle="modal" data-bs-target="#formModal">
                Add User
            </button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['users'] as $key => $user) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1; ?></th>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['username']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>