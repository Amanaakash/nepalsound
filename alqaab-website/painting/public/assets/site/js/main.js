



//  var slideIndex = 1;
//  showSlides(slideIndex);

//  function plusSlides(n) {
//    showSlides(slideIndex += n);
//  }

//  function currentSlide(n) {
//    showSlides(slideIndex = n);
//  }

//  function showSlides(n) {
//    var i;
//    var slides = document.getElementsByClassName("mySlides");
//    var dots = document.getElementsByClassName("dot");
//    if (n > slides.length) {slideIndex = 1}    
//    if (n < 1) {slideIndex = slides.length}
//    for (i = 0; i < slides.length; i++) {
//        slides[i].style.display = "none";  
//    }
//    for (i = 0; i < dots.length; i++) {
//        dots[i].className = dots[i].className.replace(" active");
//    }
//    slides[slideIndex-1].style.display = "block";  
//    dots[slideIndex-1].className += " active";
//  }
//  window.onload = function () {
//    setInterval(function() {
//      plusSlides(2);
//    }, 10000);
//  }


document.getElementById('fab').addEventListener('click', function() {
  var options = document.querySelector('.fab-options');
  options.style.display = (options.style.display == 'block') ? 'none' : 'block';
});


// var splide = new Splide( '.splide', {
// //   type     : 'loop',
// //   height   : '15rem',
// //   focus    : 'center',
// //   autoWidth: true,
//   type   : 'loop',
//   perPage: 3,
//   gap    : '0.7rem',
//   focus  : 'center',
// } );

// splide.mount();
// var splide = new Splide('.splide', {
//   type   : 'loop',
//   perPage: 3,
//   gap    : '0.7rem',
//   focus  : 'center',
//   dots   : false,

//   breakpoints: {
//     1024: {
//       perPage: 2,
//     },
//     768: {
//       perPage: 1,
//       gap: '0.5rem',
//     },
//   },
// });

var splide = new Splide('.splide', {
  type   : 'loop',
  perPage: 3,
  gap    : '0.7rem',
  focus  : 'center',
  pagination: false, // ✅ correct option to disable dots

  breakpoints: {
    1024: {
      perPage: 2,
    },
    768: {
      perPage: 1,
      gap: '0.5rem',
    },
  },
});

splide.mount();





let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}