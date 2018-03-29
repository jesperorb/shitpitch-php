<!-- Remove error of undefined index -->
<?php if (!isset($row['likes'])){
    $row['likes'] = NULL;
}; ?>

<div class="column is-offset-1-mobile is-10-mobile is-10-tablet is-5-desktop">
    <div class="card" id="pitch-<?= $row['id'] ?>">
    <header class="card-header notification is-primary">
        <h3 class="title" style="margin: 1rem;"><?= $row['title'] ?></h3>
        <p class="tag is-large is-danger" style="position: absolute; right: 30px; top: 30px;">Likes: <span><?= $row['likes'] ?></span></p>
    </header>
    <div class="card-content" style="min-height: 350px;">
            <p class="title"><?= $row['content'] ?></p>
            <p>
                <?php foreach (explode(",", $row['actors']) as $tag) :?>
                    <span class="tag is-dark is-large"><?= $tag ?></span>
                <?php endforeach; ?>
            </p>
            <!-- <p>
                <?php foreach (explode(",", $row['tags']) as $tag) :?>
                    <span class="tag is-primary"><?= $tag ?></span>
                <?php endforeach; ?>
            </p>-->
    </div>
    <footer class="card-footer">
        <?php if(isset($_SESSION['loggedIn'])) : ?>
        <form method='POST' action="/like" class="card-footer-item likeButtonForm" data-id="<?= $row['id'] ?>">
            <input name="id" type='hidden' value='<?= $row['id'] ?>'>
            <input name="user_id" type='hidden' value='<?= $_SESSION['user']['id'] ?>'>
            <button type='submit' class="hide-submit <?= (int)($row['liked']) ? 'liked': ''?>">
                <i class="fa fa-heart" aria-hidden="true"></i>
            </button>
            <br />
        </form>
        <?php endif; ?>
        <?php if(isset($_SESSION['loggedIn']) && $row['created_by'] == $_SESSION['user']['id']) : ?>
        <form method='GET' action="/edit" class="card-footer-item">
            <input name="id" type='hidden' value='<?= $row['id'] ?>'>
            <input name="user_id" type='hidden' value='<?= $_SESSION['user']['id'] ?>'>
            <button type='submit' class="hide-submit" value="">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
            </button><br/>
        </form>
        <form method='POST' action="/pitch" class="card-footer-item deleteButtonForm" data-id="<?= $row['id'] ?>">
            <input name="id" type='hidden' value='<?= $row['id'] ?>'>
            <button type='submit' class="hide-submit" value="">
                <i class="fa fa-trash" aria-hidden="true"></i> Delete
            </button>
            <br />
        </form>
        <?php endif; ?>
    </footer>
    </div>
</div>