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
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
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

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    include "./_dbconnect.php"; // Ensure this path is correct

    session_start();

    $login = false;
    $showerror = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM `admin-login` WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $login = true;
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: ../index.php"); // Redirect after login
            exit();
        } else {
            $showerror = true;
        }
        $stmt->close();
    }
    ?>

    <div id="loginModal" class="loginmodal">
        <div class="admin-modal-content">
            <span class="close">&times;</span>
            <h2>Admin Login</h2>
            <form action="_adminlogin.php" method="post">
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