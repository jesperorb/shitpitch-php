<nav class="nav-left">
    <a href="/" class="nav-item is-tab">Home</a>
    <?php if(isset($_SESSION['loggedIn'])) {?>
        <a href="/pitch" class=" nav-item is-tab">Pitch</a>
        <a href="/logout" class="nav-item is-tab">Logout</a>
    <?php }else{ ?>
        <a href="/login" class="nav-item it-tab">Login</a>
    <?php } ?>
</nav>