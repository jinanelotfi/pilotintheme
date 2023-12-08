// Réglages appartition des blocs
// On crée l'observateur
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Si l'élément est visible, on ajoute la classe d'animation
        entry.target.classList.add('appear');
      } else {
        // Si l'élément n'est pas visible, on retire la classe d'animation
        entry.target.classList.remove('appear');
      }
    });
});

// On récupère tous les éléments ayant la classe pin et on commence à les observer
const pinElements = document.querySelectorAll('.pin');
pinElements.forEach(pinElement => {
  observer.observe(pinElement);
});

// Réglages menu dropdown
// document.addEventListener('DOMContentLoaded', function () {
//   var hasSubmenus = document.querySelectorAll('.has-submenu');

//   hasSubmenus.forEach(function (element) {
//       element.addEventListener('click', function (event) {
//           event.preventDefault(); // Empêche la redirection par défaut

//           var submenu = this.querySelector('.submenu');
//           closeOtherSubmenus(this); // Ferme les autres sous-menus
//           toggleVisibility(submenu); // Bascule la visibilité du sous-menu
//       });
//   });

//   document.addEventListener('click', function (event) {
//       var clickedElement = event.target;

//       if (!clickedElement.closest('.has-submenu')) {
//           var allSubmenus = document.querySelectorAll('.submenu');
//           allSubmenus.forEach(function (submenu) {
//               submenu.style.display = 'none'; // Cache tous les sous-menus
//           });
//       }
//   });

//   function closeOtherSubmenus(currentElement) {
//       var allSubmenus = document.querySelectorAll('.submenu');
//       allSubmenus.forEach(function (submenu) {
//           if (submenu !== currentElement.querySelector('.submenu')) {
//               submenu.style.display = 'none'; // Cache les autres sous-menus
//           }
//       });
//   }

//   function toggleVisibility(element) {
//       var currentDisplay = window.getComputedStyle(element).display;
//       element.style.display = currentDisplay === 'none' ? 'flex' : 'none';
//   }
// });












// Réglages menu hamburger
const hamburgerButton = document.querySelector(".nav-toggler")
const navigation = document.querySelector(".nav-burger")

hamburgerButton.addEventListener("click", toggleNav)

function toggleNav() {
  hamburgerButton.classList.toggle("active")
  navigation.classList.toggle("active")
}

// Réglages du Carrousel

const slides = [
	{
		"image":"./wp-content/themes/pilotintheme/assets/images/carrousel1.png",
    "title": "Thierry Soubestre",
    "subtitle": "In a few weeks, 5 critical financial data sources were integrated and information is now available every day.",
    "chartIcon": "./wp-content/themes/pilotintheme/assets/images/ekki-logo.png"
	},
	{
    "image":"./wp-content/themes/pilotintheme/assets/images/carrousel2.png",
    "title": "Bruno Parent",
    "subtitle": "With propilot, we are able to share information in real time and use this effectively to steer the covid19 recovery plan across all ministries",
    "chartIcon": "./wp-content/themes/pilotintheme/assets/images/bruno-logo.png"
	},
	{
		"image":"./wp-content/themes/pilotintheme/assets/images/carrousel3.png",
    "title": "Hervé Gouëzel",
    "subtitle": "The solutions offered by Pilot'in let us keep control of our plan. In the end, we were able to largely surpass our initial objectives.",
    "chartIcon": "./wp-content/themes/pilotintheme/assets/images/bnp-logo.png"
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
  const image = document.querySelector('.banner-img');
  const carouselContent = document.querySelector('.title-factory .carousel-content');

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
    updateArrowClick(-1);
  });

  arrowRight.addEventListener("click", () => {
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
