<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card border-0 rounded-3 shadow bg-dark text-light p-3" style="height:100%">
            <img src="<?= BASE_URL . '/img/' . $data['event']['image']; ?>" class="card-img-top rounded-3" alt="Event Image" style="max-height:450px">
            <div class="card-body">
                <h3 class="card-title mb-3 text-center"><?= $data['event']['name'] ?></h3>
                <h5 class="card-text">📃 <?= $data['event']['detail'] ?></h5>
                <p>🕒 <?= $data['event']['date'] ?></p>
                <a href="<?= BASE_URL ?>/event" class="d-block w-25 ms-auto mt-3 btn btn-info">&leftarrow; Back</a>
            </div>
        </div>
    </div>
</div>