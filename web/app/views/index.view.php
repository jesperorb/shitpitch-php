<?php require 'partials/head.php'; ?>

<section class="columns is-centered is-multiline" style="padding: 3rem 0 ;">
    <?php foreach ($pitches as $row) : ?>
    <?php if (isset($_SESSION['user'])) {
    $row['user_id'] = $_SESSION['user']['id'];
};?>
    <?php require 'partials/card.php' ?>
    <?php  endforeach; ?>
</section>


<?php require 'partials/footer.php'; ?>