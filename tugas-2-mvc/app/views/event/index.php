<!-- Create Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Add Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>/event/create" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="date">Date</label>
                        <input type="datetime-local" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group mb-2">
                        <label for="detail">Detail</label>
                        <textarea class="form-control" id="detail" name="detail"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="img">Image</label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <center>
                        <button type="submit" class="btn btn-sm btn-dark my-2 submitBtnEvent" onclick="">Create Event</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register Form Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalTitle">Register Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>/event/register" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <select name="user_id" id="username" class="form-control">
                            <option selected>Select User</option>
                            <?php foreach ($data['users'] as $user) : ?>
                                <option value="<?= $user['id'] ?>"><?= $user['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="username">Event</label>
                        <select name="event_id" id="event" class="form-control">
                            <option selected>Select Event</option>
                            <?php foreach ($data['events'] as $event) : ?>
                                <option value="<?= $event['id'] ?>"><?= $event['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-sm btn-dark my-2 submitBtnRegister" onclick="return confirm('Regiser?')">Register Event</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">

    <!-- Flash Message -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <!-- Button trigger modal -->
    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-sm btn-success addBtnEvent" data-bs-toggle="modal" data-bs-target="#formModal">
                Add Event
            </button>
            <button type="button" class="btn btn-sm btn-secondary registerBtn" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register Event
            </button>
        </div>
    </div>

    <!-- Search form -->
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASE_URL; ?>/event/search" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Event..." id="keyword" name="keyword" autocomplete="off">
                    <button class="btn btn-outline-success" type="submit" id="searchBtn">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-9">

            <!-- Event Item -->
            <div class="row gap-3 justify-content-center">
                <?php foreach ($data['events'] as $item) : ?>
                    <div class="col-lg-3">
                        <div class="card border-0 shadow" style="height: 100%;">
                            <img src="<?= BASE_URL . '/img/' . $item['image']; ?>" alt="Event Image" class="card-img-top" height="180">
                            <div class="card-body">
                                <h6 class="card-title"><?= $item['name'] ?></h6>
                                <p class="card-text small">🕒 <?= $item['date'] ?></p>
                                <div class="d-flex gap-2">
                                    <a href="<?= BASE_URL . '/event/detail/' . $item['id']; ?>" class="btn btn-sm btn-primary">Detail</a>
                                    <button class="btn btn-sm btn-warning editModalBtnEvent" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $item['id']; ?>">Edit</button>
                                    <form action="<?= BASE_URL ?>/event/delete" method="POST">
                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Delete?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!--  -->