<?php require 'partials/head.php'; ?>

<section class="columns">
    <form method="POST" action="/edit" class="column is-half is-offset-one-quarter">
        <div class="field">
            <label class="label" for="title">Title of movie</label>
            <p class="control has-icon has-icon-right">
                <input class="input" type="text" value="<?= $pitch['title'] ?>" name="title"
                />
            </p>
            <p class="help"></p>
        </div>

        <div class="field">
            <label for="content" class="label">The Pitch</label>
            <p class="control has-icon has-icon-right">
                <textarea class="textarea" name="content"><?= $pitch['content'] ?></textarea>
            </p>
        </div>
        <div class="field">
            <label for="actors" class="label">Actors
                <span style="color: rgba(0,0,0,0.4)">(Nicolas Cage, Dame Judi Dench)</span>
            </label>
            <p class="control">
                <input class="input" type="text" name="actors" value="<?= $pitch['actors'] ?>"
                />
            </p>
        </div>
        <div class="field">
            <label for="tags" class="label">Tags
                <span style="color: rgba(0,0,0,0.4)">(Action, Drama, Romance)</span>
            </label>
            <p class="control">
                <input class="input" type="text" name="tags" value="<?= $pitch['tags'] ?>"
                />
            </p>
        </div>
        <input name="id" type='hidden' value='<?= $pitch[' id '] ?>'>
        <div class="field is-grouped">
            <p class="control">
                <input type="submit" class="button is-primary" />
            </p>
        </div>

    </form>
</section>

<?php require 'partials/footer.php' ?>
<?php require 'partials/footer.php'; ?>