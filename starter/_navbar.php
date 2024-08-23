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
        <li>
            <button class="admin_btn" >Admin login</button>
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

    <section>
        <!-- login modal -->

        <div id="loginmodal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Login</h2>
                <form id="loginForm">
                    <label for="userid">User ID:</label>
                    <input type="text" id="userid" name="userid" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Login</button>
                    <p id="error-message">User ID or password is incorrect.</p>
                </form>
            </div>
        </div>
    </section>

    <script>
        // JavaScript to handle modal behavior and form validation

        // Get elements
        var btn = document.querySelector(".admin_btn");
        var span = document.getElementsByClassName("close")[0];
        var loginForm = document.getElementById("loginForm");
        var errorMessage = document.getElementById("error-message");

        btn.onclick = function () {
            modal.style.display = "block";
            loginForm.reset();
            errorMessage.style.display = "none";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        loginForm.addEventListener("submit", function (event) {
            event.preventDefault(); 

        
            // Check credentials
            if (enteredUserId === validUserId && enteredPassword === validPassword) {
                // Successful login
                alert("Login successful!");
                modal.style.display = "none";
                // You can add further actions here, such as redirecting the user
            } else {
                // Display error message
                errorMessage.style.display = "block";
            }
        });
    </script>

<style> 
    .admin_btn {
 
    margin: 1rem;
    border-radius : 10px;
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

    
</nav>