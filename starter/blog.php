<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


    <?php include "./_dbconnect.php" ?>
    <?php include "./_navbar.php" ?>


    <!-- stater img -->
    <section>
        <div class="featured_blog">
            <img src="./img/gallery 1.jpg" alt="">
        </div>
    </section>


    <!-- blogs  -->
    <section class="recent_blog">
        <div class="section__title">
            <h2 class="section__description">recent_blog</h2>
        </div>

        <div class="blog">
            <!-- get post from database -->
    
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $logined = true;
            } else {
                $logined = false;
            }
            $sql2 = "SELECT * FROM post";
            $result2 = mysqli_query($conn, $sql2);
            while ($row = mysqli_fetch_assoc($result2)) {
                $sno = $row['sno'];
                $title = $row['title'];
                $desc = $row['description'];
                $date = $row['date'];
                $email = $row['email'];

            ?>
                <div class="headblog">
                    <div class="recent_blog--header">
                        <div class="recent_blog--content">
                            <img src="./img/card.jpg" alt="">
                        </div>

                        <div class="blog_tilte">
                            <h4><a href="blogpage.php?catid=<?php echo $sno; ?>"><?php echo $title; ?></a></h4>
                            <p><?php echo substr($desc, 0, 250); ?></p>
                            <p><?php echo $date; ?></p>

                            <?php if ($logined) { ?>
                                <form action="blog.php" method="get" style="display:inline;">
                                    <input type="hidden" name="delete" value="<?php echo $sno; ?>">
                                    <button type="submit" class="delete">Delete</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            }


            if (isset($_GET['delete'])) {
                $sno = $_GET['delete'];
                $delete = true;
                $sql = "DELETE FROM `post` WHERE `sno` = $sno";
                $result3 = mysqli_query($conn, $sql);
            }
            ?>

            <!-- <div class="headblog">
                <div class="recent_blog--header">
                    <div class="recent_blog--content">
                        <img src="./img/card.jpg" alt="">
                    </div>

                    <div class="blog_tilte">
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, quaerat.
                        </h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores rowquam ipsum
                            libero
                            maxime voluptatibus voluptatem non ducimus laborum ipsam error?</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- compose btn -->
    <button class="btn"> <img src="./img/compose.png" alt="">
    </button>

    <!-- insert data to database  -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['blogTitle']);
        $content = mysqli_real_escape_string($conn, $_POST['blogContent']);
        $email = mysqli_real_escape_string($conn, $_POST['blogemail']);

        $sql = "INSERT INTO `post` (`title`, `description`, `date`, `email`) VALUES ('$title', '$content', current_timestamp(), '$email');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Blog post inserted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    ?>
    <!-- create blog form -->
    <section>
        <div id="blogModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Create a New Blog Post</h2>
                <form id="blogForm" action="blog.php" method="post">
                    <label for="blogTitle">Title:</label>
                    <input maxlength="50" type="text" id="blogTitle" name="blogTitle" required>

                    <label for="blogContent">Content:</label>
                    <textarea maxlength="10000" id="blogContent" name="blogContent" rows="10" required></textarea>

                    <label for="blogemail">Email:</label>
                    <input type="email" id="blogemail" name="blogemail" required>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

    </section>



</body>
<script>
    // const lftbtn = document.querySelector(".slider__btn--left");
    // const rgtbtn = document.querySelector(".slider__btn--right");
    // const dotshole = document.querySelectorAll(".dots__dot");
    // const slide = document.querySelectorAll(".slide");

    // let maxSlide = slide.length;
    // let currSlide = 0;
    // // go to the slide function
    // const gotoslide = function (sli) {
    //     slide.forEach((sl, i) => {
    //         sl.style.transform = `translateX(${100 * (i - sli)}%)`;
    //     })
    //     // activedot(sli);
    // }
    // gotoslide(0);

    // const nextSlide = function () {
    //     if (currSlide === maxSlide - 1) {
    //         currSlide = 0;
    //     }
    //     else
    //         currSlide++;
    //     console.log(currSlide);
    //     gotoslide(currSlide);
    // }
    // const prevSlide = function () {
    //     if (currSlide === 0) {
    //         currSlide = maxSlide - 1;
    //     }
    //     else
    //         currSlide--;
    //     gotoslide(currSlide);
    // }
    // rgtbtn.addEventListener("click", nextSlide);
    // lftbtn.addEventListener("click", prevSlide)

    // dotshole.forEach((d, i) => {
    //     d.addEventListener("click", function () {
    //         gotoslide(i);
    //     })
    // })



    var modal = document.getElementById("blogModal");
    var btn = document.querySelector(".btn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</html>