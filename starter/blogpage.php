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
    include "../partials/_dbconnect.php";
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

        <!-- Comment Input Area -->
        <div class="comment-input">
            <input type="text" id="userName" placeholder="Your name..." required>
            <textarea id="commentBox" placeholder="Add a public comment..." required></textarea>
            <button id="postComment" disabled>Comment</button>
            < <!-- Comment List -->
                <div class="comment-list">
                    <!-- Comments will be dynamically added here -->
                </div>
        </div>

</body>

<script>
    document.getElementById('commentBox').addEventListener('input', function() {
        const commentValue = this.value.trim();
        const nameValue = document.getElementById('userName').value.trim();
        document.getElementById('postComment').disabled = commentValue === "" || nameValue === "";
    });

    document.getElementById('userName').addEventListener('input', function() {
        const nameValue = this.value.trim();
        const commentValue = document.getElementById('commentBox').value.trim();
        document.getElementById('postComment').disabled = nameValue === "" || commentValue === "";
    });

    document.getElementById('postComment').addEventListener('click', function() {
        const userName = document.getElementById('userName').value.trim();
        const commentText = document.getElementById('commentBox').value.trim();

        if (userName && commentText) {
            addComment(userName, commentText);
            document.getElementById('userName').value = "";
            document.getElementById('commentBox').value = "";
            document.getElementById('postComment').disabled = true;
        }
    });

    function addComment(name, text) {
        const commentList = document.querySelector('.comment-list');

        const commentElement = document.createElement('div');
        commentElement.classList.add('comment');

        const userName = document.createElement('h4');
        userName.textContent = name;

        const commentText = document.createElement('p');
        commentText.textContent = text;

        commentElement.appendChild(userName);
        commentElement.appendChild(commentText);

        commentList.appendChild(commentElement);
    }
</script>

</html>