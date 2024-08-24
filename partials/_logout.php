<?php
if (session_status() === PHP_SESSION_NONE) {  
    session_start();
}
echo "<h2>Logging you out. Please wait...</h2>";

session_destroy();
header("Location: /proj%20kashmir/kashmir_website/index.php ");
exit();
