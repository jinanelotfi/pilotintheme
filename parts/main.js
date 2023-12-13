// Réglages appartition des blocs
// On crée l'observateur
// const observer = new IntersectionObserver(entries => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         // Si l'élément est visible, on ajoute la classe d'animation
//         entry.target.classList.add('appear');
//       } else {
//         // Si l'élément n'est pas visible, on retire la classe d'animation
//         entry.target.classList.remove('appear');
//       }
//     });
// });

// // On récupère tous les éléments ayant la classe pin et on commence à les observer
// const pinElements = document.querySelectorAll('.pin');
// pinElements.forEach(pinElement => {
//   observer.observe(pinElement);
// });

// Réglages menu dropdown
// jQuery(document).ready(function($) {
//   // Toggle submenu on click
//   $('.menu-parent').click(function() {
//       $(this).find('.submenu').toggle();
//       console.log('coucou');
//   });
// });

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

 // Get the video element
 var video = document.getElementById('modalVideo');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    video.pause();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        video.pause();
    }
}

// Réglages du Carrousel

const slides = [
	{
		"video":"./wp-content/themes/pilotintheme/assets/images/video-grogu.mp4",
		"image":"./wp-content/themes/pilotintheme/assets/images/carrousel1.png",
    "title": "Thierry Soubestre",
    "subtitle": "In a few weeks, 5 critical financial data sources were integrated and information is now available every day.",
    "chartIcon": "./wp-content/themes/pilotintheme/assets/images/ekki-logo.png"
	},
	{
    "video":"./wp-content/themes/pilotintheme/assets/images/video-rey.mp4",
    "image":"./wp-content/themes/pilotintheme/assets/images/carrousel2.png",
    "title": "Bruno Parent",
    "subtitle": "With propilot, we are able to share information in real time and use this effectively to steer the covid19 recovery plan across all ministries",
    "chartIcon": "./wp-content/themes/pilotintheme/assets/images/bruno-logo.png"
	}
]


// Manipulation des points
function createDots() {
  const dotList = document.querySelector('.dots');
  for (let i = 0; i < slides.length; i++) {
    const point = document.createElement('li');
    point.classList.add('dot');
    dotList.appendChild(point);
  }
  dotList.querySelector('.dot').classList.add('dot-selected');
}

function updateDots(index) {
  const dotList = document.querySelector('.dots');
  const currentPoint = dotList.querySelector('.dot-selected');
  currentPoint.classList.remove('dot-selected');

  const newPoint = dotList.children[index];
  newPoint.classList.add('dot-selected');
}

// Mise à jour du contenu
function updateContent(index) {
  const currentSlide = slides[index];
  const video = document.querySelector('.banner-video');
  const image = document.querySelector('.banner-img');
  const carouselContent = document.querySelector('.title-factory .carousel-content');

  video.src = currentSlide.video;
  image.src = currentSlide.image;
  carouselContent.querySelector('.chart-line-icon').src = currentSlide.chartIcon;
  carouselContent.querySelector('h3').innerHTML = currentSlide.title;
  carouselContent.querySelector('p').innerHTML = currentSlide.subtitle;
}

// Eventlisteners sur les flèches
function addArrowEventListeners() {
  const arrowLeft = document.querySelector(".arrow-left");
  const arrowRight = document.querySelector(".arrow-right");

  arrowLeft.addEventListener("click", () => {
    console.log('coucou');
    updateArrowClick(-1);
    console.log('coucou');
  });

  arrowRight.addEventListener("click", () => {
    console.log('coucou');
    updateArrowClick(1);
    
  });
}

function updateArrowClick(direction) {
  const dotList = document.querySelector('.dots');
  const currentPoint = dotList.querySelector('.dot-selected');
  const currentIndex = Array.from(dotList.children).indexOf(currentPoint);
  const nextIndex = (currentIndex + direction + slides.length) % slides.length;

  updateDots(nextIndex);
  updateContent(nextIndex);
}

// Initialisation
createDots();
addArrowEventListeners();
