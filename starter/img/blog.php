<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


    <?php include "./_navbar.php" ?>
    <?php include "../partials/_dbconnect.php" ?>


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
                            <h4><?php echo $title; ?></h4>
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

            <div class="headblog">
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
            </div>
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



<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
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