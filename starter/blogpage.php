<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner:wght@400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        * {
            padding: 0;
            margin: 0%;
        }

        .title {
            height: 10vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: capitalize;
            margin: 2rem;
        }

        .blogpara {
            margin: 1rem;
            min-height: auto;
        }

        .blogpara p {
            font-family: 'Times New Roman', Times, serif, cursive;
            font-size: 2rem;
            word-spacing: 0.2rem;
        }

        .comment_section {
            margin: 3rem;
            min-height: 10vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        input {
            height: 2rem;
            width: 20%;
            border: none;
            border-bottom: 3px solid green;
            border-radius: 10px;
        }

        .comment {
            min-height: 10vh;
        }

        .comment_title {
            margin: 3rem;
        }

        .comment-section {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        .comment-input {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        #userName,
        #commentBox {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        #commentBox {
            height: 80px;
            resize: none;
        }

        #postComment {
            align-self: flex-start;
            padding: 10px 20px;
            background-color: #065fd4;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #postComment:disabled {
            background-color: #b3d4fc;
            cursor: not-allowed;
        }

        .comment-list {
            margin-top: 20px;
        }

        .comment {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .comment h4 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .comment p {
            margin: 5px 0 0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- build navbar by yourself  -->
    <?php
    include "./_dbconnect.php";
    include "../starter/_navbar.php";

    $id = $_GET['catid'];
    $sql2 = "SELECT * FROM post WHERE `sno` = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_assoc($result2)) {
        $sno = $row['sno'];
        $title = $row['title'];
        $desc = $row['description'];
        $date = $row['date'];
        $email = $row['email'];
    }

    ?>
    <br><br>
    <div>
        <h1 class="title"><?php echo $title; ?></h1>
    </div>
    <br><br>
    <div class="blogpara">
        <p><?php echo $desc; ?>
        </p><br>
        <p>Posted on :-<?php echo $date; ?></p>
    </div>




    <div class="comment-section">
        <h2>Comments</h2>

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['comment-title'];
            $comment = $_POST['comment-desc'];

            $sql4 = "INSERT INTO `comment` (`name`, `comment`, `timestamp`, `cat-id`) VALUES ('$name', '$comment', current_timestamp(), '$id')";
            $result4 = mysqli_query($conn, $sql4);
        }


        ?>
        <!-- Comment Input Area -->
        <form action="" method="POST" class="comment-input">
            <div>
                <input name="comment-title" type="text" id="userName" placeholder="Your name..." required>
            </div>
            <div>
                <textarea name="comment-desc" id="commentBox" placeholder="Add a public comment..." required></textarea>
            </div>
            <div>
                <button type="submit" id="postComment" >Comment</button>
            </div>
        </form>

        <!-- Comment List -->

        <?php
        $sql3 = "SELECT * FROM `comment` WHERE `cat-id` = $id";
        $result3 = mysqli_query($conn, $sql3);

        $comments = array();

        while ($row = mysqli_fetch_assoc($result3)) {
            $comments[] = array(
                'sno' => $row['sno'],
                'com_title' => $row['name'],
                'com_desc' => $row['comment'],
                'date' => $row['timestamp']
            );
        }

        echo '<script>console.log(' . json_encode($comments) . ');</script>';

        echo '<script>var comments = ' . json_encode($comments) . ';</script>';
        ?>

        <div class="comment-list">
            <!-- Comments will be dynamically added here -->
        </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const commentList = document.querySelector('.comment-list');

        if (comments.length > 0) {
            comments.forEach(function(comment) {
                const commentElement = document.createElement('div');
                commentElement.classList.add('comment');

                const commentTitle = document.createElement('h4');
                commentTitle.textContent = comment.com_title; // Title or name of the commenter

                const commentDesc = document.createElement('p');
                commentDesc.textContent = comment.com_desc; // Comment description

                const commentDate = document.createElement('span');
                commentDate.textContent = new Date(comment.date).toLocaleString(); // Convert timestamp to readable format
                commentDate.classList.add('comment-date');

                commentElement.appendChild(commentTitle);
                commentElement.appendChild(commentDesc);
                commentElement.appendChild(commentDate);

                commentList.appendChild(commentElement);
            });
        } else {
            // If there are no comments, you can optionally show a message
            const noComments = document.createElement('p');
            noComments.textContent = "No comments yet.";
            commentList.appendChild(noComments);
        }
    });
</script>

</html>