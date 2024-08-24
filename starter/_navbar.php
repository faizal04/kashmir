<!-- Commented PHP code -->
<!-- <?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $logined = true;
} else {
    $logined = false;
}
?> -->

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
        <li>
            <button id="openModalBtn" class="admin_btn">Admin Login</button>
        </li>
        <!-- Commented PHP code -->
        <!-- <?php
        if(!$logined){
            echo "<li class='nav__item'>
                <a href='./starter/_adminlogin.php' class='tm-nav-link' data-bs-toggle='modal'>
                    Admin Login
                </a>
            </li>";
        } else {
            echo "<li class='nav__item'>
                <a href='../partials/_logout.php' class='tm-nav-link' data-bs-toggle='modal'>
                    Logout
                </a>
            </li>";
        }
        ?> -->
    </ul>

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
        <!-- <script src="../js/modal-window.js"></script> -->
</nav>
