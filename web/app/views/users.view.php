<?php  require 'partials/head.php'; ?>

<section class="columns is-centered">
    <form method="POST" action="/users" class="column is-one-third">
        <div class="field">
            <label class="label">Username</label>
            <p class="control">
                <input class="input" type="text" placeholder="Username" value="" name="username">
            </p>
            <?php if (isset($_GET['error'])): ?>
            <p class="help is-danger">
                <?= $_GET['error'] ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <p class="control has-icon has-icon-right">
                <input class="input" type="text" name="email" placeholder="Email" value="">

            </p>
            <?php if (isset($_GET['error'])): ?>
            <p class="help is-danger">
                <?= $_GET['error'] ?>
            </p>
            <?php endif; ?>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <p class="control">
                <input class="input" type="password" name="password" placeholder="Password" value="">
            </p>
        </div>
        <div class="field is-grouped">
            <p class="control">
                <input type="submit" class="button is-primary" />
            </p>
        </div>
    </form>
</section>

<?php require 'partials/footer.php' ?>