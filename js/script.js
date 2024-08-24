'use strict';

///////////////////////////////////////
// Modal window

const modal = document.querySelector('.modal');
const overlay = document.querySelector('.overlay');
const btnCloseModal = document.querySelector('.btn--close-modal');
const btnsOpenModal = document.querySelectorAll('.btn--show-modal');
const linkclick = document.querySelector(".nav__links");
const header = document.querySelector(".header");
const sectionAll = document.querySelectorAll(".section");
const btntoscroll = document.querySelector(".btn--scroll-to");
const sectiontoscroll = document.querySelector("#section--1");
const tabs = document.querySelectorAll(".operations__tab");
const tabscontainer = document.querySelector(".operations__tab-container");
const content = document.querySelectorAll(".operations__content");
const nav = document.querySelector(".nav");
// const logo = nav.querySelector("img");
const lazyimg = document.querySelectorAll('img[data-src]');
const slide = document.querySelectorAll(".slide");
const lftbtn = document.querySelector(".slider__btn--left");
const rgtbtn = document.querySelector(".slider__btn--right");
const dotshole = document.querySelectorAll(".dots__dot");
const dots = document.querySelector(".dots");

const openModal = function (e) {
  e.preventDefault()
  modal.classList.remove('hidden');
  overlay.classList.remove('hidden');
};

const closeModal = function () {
  modal.classList.add('hidden');
  overlay.classList.add('hidden');
};


btnsOpenModal.forEach(btn => btn.addEventListener("click", openModal));

// btnCloseModal.addEventListener('click', closeModal);
// overlay.addEventListener('click', closeModal);

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
    closeModal();
  }
});

btntoscroll.addEventListener("click", function () {
  console.log(sectiontoscroll.clientHeight, sectiontoscroll.clientWidth);
  sectiontoscroll.scrollIntoView({ behavior: "smooth" });
});

linkclick.addEventListener("click", function (e) {

  // e.preventDefault();
  console.log(e.target);
  if (e.target.classList.contains("nav__link")) {

    const id = e.target.getAttribute('href');
    document.querySelector(id).scrollIntoView({ behavior: "smooth" });

  }
})


tabscontainer.addEventListener("click", function (event) {
  const clicked = event.target.closest(".operations__tab");
  if (!clicked) return;

  tabs.forEach(t => t.classList.remove("operations__tab--active"))
  content.forEach(cl => cl.classList.remove("operations__content--active"));

  console.log(clicked.dataset.tab);
  clicked.classList.add("operations__tab--active");

  document.querySelector(`.operations__content--${clicked.dataset.tab}`).classList.add("operations__content--active");
});


const eventfunction = function (event) {
  if (event.target.classList.contains("nav__link")) {
    const link = event.target;
    const sibling = link.closest(".nav").querySelectorAll(".nav__link");
    sibling.forEach(el => {
      if (el !== link)
        el.style.opacity = this
    });
    logo.style.opacity = this

    console.log(link);
  }
}
nav.addEventListener("mouseover", eventfunction.bind(0.5));
nav.addEventListener("mouseout", eventfunction.bind(1));



const stickNav = function (entries) {
  if (entries[0].isIntersecting === false)
    nav.classList.add("sticky");
  else
    nav.classList.remove("sticky");


}
const observerObj = {
  root: null,
  threshold: 0,
  rootMargin: "-90px",
}
const observer = new IntersectionObserver(stickNav, observerObj);
observer.observe(header);




const section_transaction_function = function (entries) {
  const [entry] = entries;


  if (entry.isIntersecting) {
    entry.target.classList.remove("section--hidden");

  }
  if (!entry.isIntersecting) {
    entry.target.classList.add("section--hidden");

  }

}

const section_transaction_object = {
  root: null,
  threshold: 0.10,
  rootMargin: "-90px"
}

const sectionTransaction = new IntersectionObserver(section_transaction_function, section_transaction_object)
sectionAll.forEach(function (section) {
  sectionTransaction.observe(section)
  section.classList.add("section--hidden");
})

const sectionloop = function () {
  sectionAll.forEach(sec => {
    sec.classList.remove("section--hidden");
  })
}

const lazyimgfunction = function (e, observer) {
  const [entry] = e;
  console.log(entry);
  if (!entry.isIntersecting) return;

  entry.target.src = entry.target.dataset.src

  entry.target.addEventListener("load", function () {
    entry.target.classList.remove("lazy-img");

  });

  observer.unobserve(entry.target);
}
const lazyimgapi = new IntersectionObserver(lazyimgfunction, {
  root: null,
  threshold: 0,
});
lazyimg.forEach(lazy => lazyimgapi.observe(lazy))






//  slider



let maxSlide = slide.length;
let currSlide = 0;

// dot built function
const dotbuilt = function () {
  slide.forEach((_, i) =>
    dots.insertAdjacentHTML(`beforeend`, `<button class="dots__dot" data-slide="${i}"></button>`))
}
dotbuilt();


// active dot function



const activedot = function (slie) {
  document.querySelectorAll(".dots__dot").forEach(d => d.classList.remove("dots__dot--active"));
  document.querySelector(`.dots__dot[data-slide="${slie}"]`).classList.add("dots__dot--active");
  // console.log(style);
}

// go to the slide function
const gotoslide = function (sli) {
  slide.forEach((sl, i) => {
    sl.style.transform = `translateX(${100 * (i - sli)}%)`;
  })
  activedot(sli);
}
gotoslide(0);





// slide function

const nextSlide = function () {
  if (currSlide === maxSlide - 1) {
    currSlide = 0;
  }
  else
    currSlide++;
  console.log(currSlide);
  gotoslide(currSlide);
}
const prevSlide = function () {
  if (currSlide === 0) {
    currSlide = maxSlide - 1;
  }
  else
    currSlide--;
  gotoslide(currSlide);
}

// btn click function call


rgtbtn.addEventListener("click", nextSlide);
lftbtn.addEventListener("click", prevSlide)

dotshole.forEach((d, i) => {
  d.addEventListener("click", function () {
    gotoslide(i);
  })
})


//  key preess
document.addEventListener("keydown", function (e) {
  console.log(e);
  if (e.key === "ArrowRight") {
    nextSlide();
  }
  if (e.key === "ArrowLeft") {
    prevSlide();
  }
})


/*
blog script

 const lftbtn = document.querySelector(".slider__btn--left");
    const rgtbtn = document.querySelector(".slider__btn--right");
    const dotshole = document.querySelectorAll(".dots__dot");
    const slide = document.querySelectorAll(".slide");

    let maxSlide = slide.length;
    let currSlide = 0;
    // go to the slide function
    const gotoslide = function (sli) {
        slide.forEach((sl, i) => {
            sl.style.transform = `translateX(${100 * (i - sli)}%)`;
        })
        // activedot(sli);
    }
    gotoslide(0);

    const nextSlide = function () {
        if (currSlide === maxSlide - 1) {
            currSlide = 0;
        }
        else
            currSlide++;
        console.log(currSlide);
        gotoslide(currSlide);
    }
    const prevSlide = function () {
        if (currSlide === 0) {
            currSlide = maxSlide - 1;
        }
        else
            currSlide--;
        gotoslide(currSlide);
    }
    rgtbtn.addEventListener("click", nextSlide);
    lftbtn.addEventListener("click", prevSlide)

    dotshole.forEach((d, i) => {
        d.addEventListener("click", function () {
            gotoslide(i);
        })
    })


*/


//  modal window check


document.addEventListener("DOMContentLoaded", function () {
  var modalContainer = document.getElementById("modalContainer");
  var openModalBtn = document.getElementById("openModalBtn");

  if (openModalBtn) {
    openModalBtn.onclick = function () {
      fetch('./starter/_adminlogin.php')
        .then(response => response.text())
        .then(data => {
          modalContainer.innerHTML = data;
          var modal = document.getElementById("loginModal");
          var closeBtn = document.getElementsByClassName("close")[0];

          if (modal) {
            modal.style.display = "block";

            closeBtn.onclick = function () {
              modal.style.display = "none";
            }

            window.onclick = function (event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
          } else {
            console.error("Modal not found.");
          }
        })
        .catch(error => console.error('Error loading modal content:', error));
    }
  }
});
