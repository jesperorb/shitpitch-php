<?php require 'partials/head.php'; ?>

<section class="columns">
    <form method="POST" action="/pitch" class="column is-half is-offset-one-quarter">
        <div class="field">
            <label class="label" for="title">Title of movie</label>
            <p class="control has-icon has-icon-right">
                <input class="input" type="text" value="" name="title">
            </p>
            <p class="help"></p>
        </div>

        <div class="field">
            <label for="tags" class="label">The Pitch</label>
            <p class="control has-icon has-icon-right">
                <textarea class="textarea" name="content" maxlength="200" onkeyup="count(this)"></textarea>
            </p>
            <p>
                <span>Characters left: </span>
                <span id="counter">200</span>
            </p>
        </div>
        <div class="field">
            <label for="actors" class="label">Actors
                <span style="color: rgba(0,0,0,0.4)">(Nicolas Cage, Dame Judi Dench)</span>
            </label>
            <p class="control">
                <input class="input" type="text" name="actors" />
            </p>
        </div>
        <div class="field">
            <label for="tags" class="label">Tags
                <span style="color: rgba(0,0,0,0.4)">(Action, Drama, Romance)</span>
            </label>
            <p class="control">
                <input class="input" type="text" name="tags" />
            </p>
        </div>
        <input type="hidden" value="<?= $_SESSION['user']['id']?>" name="user_id"
        />
        <div class="field is-grouped">
            <p class="control">
                <input type="submit" class="button is-primary" id="submitPitch" />
            </p>
        </div>
    </form>
</section>
<script>
    function count(msg) {
        document.getElementById('counter').innerHTML = 200 - Number(msg.value.length);
    }
</script>

<?php require 'partials/footer.php' ?>