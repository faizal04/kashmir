<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Modal</title>
    <script src="../js/script.js" defer></script>
    <style>
        .loginmodal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .admin-modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php
    include "../partials/_dbconnect.php";

    $login = false;
    $showerror = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admin-login` WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $login = true;
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: ../index.php");
            exit();
        }
    }

    ?>

    <div id="loginModal" class="loginmodal">
        <div class="admin-modal-content">
            <span class="close">&times;</span>
            <h2>Admin Login</h2>
            <form action="" method="post">
                <label for="username">Admin Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
                <?php if ($login) {
                    echo "<div class='success'>You are now logged in.</div>";
                } elseif ($showerror) {
                    echo "<div class='error'>Invalid Credentials</div>";
                } ?>

            </form>
        </div>
    </div>
</body>

</html>