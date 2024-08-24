<!-- Commented PHP code -->
<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $logined = true;
} else {
    $logined = false;
}
?>
<?php
session_start();
?>

<nav class="nav">
    <h1><a href="../index.php">KASHMIR</a></h1>

    <ul class="nav__links">
        <li class="nav__item">
            <a class="nav__link" href="">Tradition</a>
        </li>
        <li class="nav__item">
            <a class="nav__link" href="">Explore</a>
        </li>
        <li class="nav__item">
            <a class="nav__link" href="">Gallery</a>
        </li>
        <li class="nav__item">
            <a class="nav__link" href="./starter/blog.php">Blogs</a>
        </li>
        <li>
            <button id="openModalBtn" class="admin_btn">Admin Login</button>
        </li>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
            <li class="nav__item">
                <a href='../partials/_logout.php' class='nav__link'>Logout</a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php include "./_adminlogin.php"; ?>





<!-- modal -->
<section>
    <!-- Modal container -->
    <div id="modalContainer"></div>
</section>
<style>
    .admin_btn {
        margin: 1rem;
        border-radius: 10px;
        padding: 1.2rem;
        height: 3rem;
        width: 3rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--color-primary);
        font-size: 1rem;
        font-family: inherit;
        font-weight: 600;
        border: none;
        padding: 1.25rem 4.5rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .admin_btn:hover {
        background-color: var(--color-primary-darker);
    }
</style>