<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="img/icon.png" />

  <link rel="stylesheet" href="../css/style.css" />
  <title>Kashmir</title>
</head>

<body>

  <?php include "./starter/_navbar.php" ?>

  <header class="header">
    <div class="header__title">
      <h1>
        اگر
        <!-- Green highlight effect -->
        <span class="highlight">فردوس</span>
        بر روے زمین است،
        ہمیں است
        <span class="highlight">و ہمیں است</span>
        و ہمیں است
        <!-- <span class="highlight">minimalist</span>   -->
      </h1>
      <h4>If there is a paradise on earth,<br> It is this, it is this, it is this.</h4>
      <button class="btn--text btn--scroll-to">Learn more &DownArrow;</button>
      <img src="./img/pexels-imadclicks-3974036.jpg" class="header__img" alt="Minimalist bank items" />
    </div>
  </header>


  <section class="section" id="section--1">
    <div class="section__title">
      <h2 class="section__description">Tradition</h2>
      <h3 class="section__header">
        Everything you need in a modern bank and more.
      </h3>
    </div>

    <div class="features">
      <img src="./img/wazwan-min.jpg" data-src="./img/wazwan.jpg" alt="Computer" class="features__img lazy-img" />
      <div class="features__feature">
        <div class="features__icon">
          <svg>
            <use xlink:href="img/icons.svg#icon-monitor"></use>
          </svg>
        </div>
        <h5 class="features__header">Cuisine</h5>
        <p>
          <span class="spantxt"> Wazwan: </span> A traditional multi-course meal, often considered the epitome of
          Kashmiri
          cuisine, which includes
          dishes like Rogan Josh, Yakhni, Dum Aloo, and Gushtaba.
          <span class="spantxt"> Kahwa:</span> Traditional green tea brewed with saffron, almonds, and cardamom.
          <span class="spantxt"> Noon Chai (Sheer Chai):</span> Salty pink tea enjoyed daily.
        </p>
      </div>

      <div class="features__feature">
        <div class="features__icon">
          <svg>
            <use xlink:href="img/icons.svg#icon-trending-up"></use>
          </svg>
        </div>
        <h5 class="features__header">Clothing</h5>
        <p>
          <span class="spantxt"> Pheran:</span> A traditional woolen cloak worn by both men and women, particularly
          during the winter.
          <span class="spantxt"> Kashmiri Shawls:</span> Famous for their intricate embroidery and high-quality wool,
          especially Pashmina shawls.
        </p>
      </div>
      <img src="./img/fb52ba_9ce3abb6ecec446f9f790beda5c18bdb~mv2.webp"
        data-src="./img/fb52ba_9ce3abb6ecec446f9f790beda5c18bdb~mv2.webp" alt="Plant" class="features__img lazy-img" />

      <img src="./img/haba khtoon-min.jpg" data-src="./img/haba khtoon.jpg" alt="Haba khatoon" height="300px"
        class="features__img lazy-img" />
      <div class="features__feature">
        <div class="features__icon">
          <svg>
            <use xlink:href="img/icons.svg#icon-credit-card"></use>
          </svg>
        </div>
        <h5 class="features__header">Literature and Poetry</h5>
        <p>
          <span class="spantxt">Lal Ded (Lalleshwari):</span> A revered 14th-century mystic poetess.
          <span class="spantxt">Habba Khatoon:</span> A 16th-century poetess known for her lyrical poetry.
        </p>
      </div>
    </div>
  </section>

  <section class="section" id="section--2">
    <div class="section__title">
      <h2 class="section__description">Explore Kashmir</h2>
      <h3 class="section__header">
        یہ رنگینی، یہ بوئے گل، یہ چہچہاہٹ بلبل،
        تری تصویر کو شکل و صفا دیتا ہے کیا کیا۔

      </h3>
    </div>

    <div class="operations">
      <div class="operations__tab-container">
        <button class="btn operations__tab operations__tab--1 operations__tab--active" data-tab="1">
          <span>01</span>History
        </button>
        <button class="btn operations__tab operations__tab--2" data-tab="2">
          <span>02</span>Nature
        </button>
        <button class="btn operations__tab operations__tab--3" data-tab="3">
          <span>03</span>Tourism
        </button>
      </div>
      <div class="operations__content operations__content--1 operations__content--active">
        <div class="operations__icon operations__icon--1">
          <svg>
            <use xlink:href="img/icons.svg#icon-upload"></use>
          </svg>
        </div>
        <h5 class="operations__header">
          History of kashmir
        </h5>
        <p>
          In the first half of the first millennium, the Kashmir region became an important centre of Hinduism and later
          of Buddhism. During the 7th-14th centuries, the region was ruled by a series of Hindu dynasties, and Kashmir
          Shaivism arose. In 1320, Rinchan Shah became the first Muslim ruler of Kashmir, inaugurating the Kashmir
          Sultanate.The region was part of the Mughal Empire from 1586 to 1751, and thereafter, until 1820, of the
          Afghan Durrani Empire.
        </p>
      </div>

      <div class="operations__content operations__content--2">
        <div class="operations__icon operations__icon--2">
          <svg>
            <use xlink:href="img/icons.svg#icon-home"></use>
          </svg>
        </div>
        <h5 class="operations__header">
          Kashmir Paradise on Earth
        </h5>
        <p>
          Kashmir, often called "Paradise on Earth," is renowned for its breathtaking natural beauty that captivates
          visitors from around the world. The region is characterized by its stunning landscapes, featuring lush green
          valleys, towering snow-capped mountains, and pristine lakes. One of the most iconic sights is Dal Lake in
          Srinagar, where houseboats and shikaras glide through the calm waters, surrounded by floating gardens and
          vibrant markets.
        </p>
      </div>
      <div class="operations__content operations__content--3">
        <div class="operations__icon operations__icon--3">
          <svg>
            <use xlink:href="img/icons.svg#icon-user-x"></use>
          </svg>
        </div>
        <h5 class="operations__header">
          Tourism in Kashmir
        </h5>
        <p>
          Tourism in Kashmir is a vital part of the region's economy and a significant draw for visitors from around the
          globe, thanks to its stunning natural beauty, rich cultural heritage, and diverse attractions. The picturesque
          landscapes, featuring serene lakes, lush valleys, and majestic mountains, make Kashmir a sought-after
          destination for nature lovers and adventure enthusiasts alike.
        </p>
      </div>
    </div>
  </section>

  <section class="section" id="section--3">
    <div class="section__title section__title--testimonials">
      <h2 class="section__description">Gallery</h2>
      <h3 class="section__header">
        Welcome to our gallery, where you can immerse yourself in the breathtaking landscapes of Kashmir.
      </h3>
    </div>

    <div class="slider">



      <div class="slide"><img src="img/gallery 1.jpg" alt="Photo 1" /></div>
      <div class="slide"><img src="img/gallery 2.jpg" alt="Photo 2" /></div>
      <div class="slide"><img src="img/gallery 3.jpg" alt="Photo 3" /></div>
      <div class="slide"><img src="img/gallery 4.jpg" alt="Photo 4" /></div>
      <div class="slide"><img src="img/gallery 5.jpg" alt="Photo 4" /></div>
      <div class="slide"><img src="img/gallery 7.jpg" alt="Photo 4" /></div>

      <button class="slider__btn slider__btn--left">&larr;</button>
      <button class="slider__btn slider__btn--right">&rarr;</button>
      <div class="dots"></div>

    </div>
  </section>

  <section class="section section--sign-up">
    <div class="section__title">
      <h3 class="section__header">
        اے جنت کشمیر، دلربا وادی
        سب سے حسین تیرا، دلکش نظارا ہے

      </h3>
    </div>
  </section>



  <div class="modal hidden">
    <button class="btn--close-modal">&times;</button>
    <h2 class="modal__header">
      Open your bank account <br />
      in just <span class="highlight">5 minutes</span>
    </h2>
    <form class="modal__form">
      <label>First Name</label>
      <input type="text" />
      <label>Last Name</label>
      <input type="text" />
      <label>Email Address</label>
      <input type="email" />
      <button class="btn">Next step &rarr;</button>
    </form>
  </div>
  <div class="overlay hidden"></div>

  <?php include "./partials/_footer.php" ?>


  <script src="script"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
<!-- checking the latest update -->
</html>