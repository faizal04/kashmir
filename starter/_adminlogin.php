<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .error {
            color: red;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 8px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .login-container .success {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <?php
    include "../partials/_dbconnect.php";
    include "_navbar.php";
    
    $login = false;
    $showerror = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admin-login` WHERE  username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
                $login = true;  
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
              header("Location: index.php");
            }
        }

    ?>

    <div class="login-container">
        <h2>AdminLogin</h2>

        <form action="_adminlogin.php" method="post">
            <label for="username">Admin Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            
            <button type="submit">Login</button>
        
        <?php  if ($login) {
            echo "<div>You are now logged in.</div>";
            }
            // if($showerror){
            
            // echo '<div class="error">Invalid Credentials</div>';
            // }
            ?>
        </form>
    </div>

</body>

</html>