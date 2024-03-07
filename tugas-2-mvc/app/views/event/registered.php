<div class="container p-3">

    <!-- Flash Message -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Event</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['registered'] as $key => $reg) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1; ?></th>
                            <td><?= $reg['user_name']; ?></td>
                            <td class="d-flex align-items-center gap-3">
                                <img src="<?= BASE_URL; ?>/img/<?= $reg['event_image'] ?>" alt="Event Image" class="img-fluid" width="150" height="100">
                                <div class="event">
                                    <div class="event-name h6">
                                        📅 <?= $reg['event_name']; ?>
                                    </div>
                                    <small>🕒 <?= $reg['event_date'] ?></small>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>