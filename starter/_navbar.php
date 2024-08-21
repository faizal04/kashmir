<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $logined = true;
} else {
    $logined = false;
}
?>

<nav class="nav">
    <h1>KASHMIR</h1>
    <ul class="nav__links">
        <li class="nav__item">
            <a class="nav__link" href="#section--1">Tradition</a>
        </li>
        <li class="nav__item">
            <a class="nav__link" href="#section--2">Explore</a>
        </li>
        <li class="nav__item">
            <a class="nav__link" href="#section--3">Gallery</a>
        </li>
        <li class="nav__item">
            <a class="nav__link" href="./starter/blog.php">Blogs</a>
        </li>
        <?php
        if(!$logined){
            echo "       <li class='nav__item'>
            <a href='./starter/_adminlogin.php' class='tm-nav-link' data-bs-toggle='modal'>
                Admin Login
            </a>
        </li>";
        } else {
            echo "       <li class='nav__item'>
            <a href='../partials/_logout.php' class='tm-nav-link' data-bs-toggle='modal'>
                Logout
            </a>
        </li>";
        }
        ?>
    </ul>
</nav>