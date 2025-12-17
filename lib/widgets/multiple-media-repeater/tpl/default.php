<div class="accordion" id="accordion-<?= $unique_id ?>">
<?php
$unique_id = uniqid();

$to_show = true; // the first one is shown
foreach ($instance['unfoldable'] as $i => $item) {
    ?>
        <div class="card">
            <div class="card-header" id="heading<?= $i ?>">
            <h2 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="<?= $to_show ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>"><?= $item['repeat_title'] ?></button>
            </h2>
            </div>
            <div class="collapse <?= $to_show ? 'show' : '' ?>" id="collapse<?= $i ?>" aria-labelledby="heading<?= $i ?>" data-parent="#accordion-<?= $unique_id ?>">
            <div class="card-body">
                <?= $item['repeat_body'] ?>
            </div>
            </div>
        </div>
    <?php
    $to_show = false; // the remaining items must not be shown
}
?>
</div>
