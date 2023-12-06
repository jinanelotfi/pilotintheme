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

// Réglages menu hamburger
const hamburgerButton = document.querySelector(".nav-toggler")
const navigation = document.querySelector(".nav-burger")

hamburgerButton.addEventListener("click", toggleNav)

function toggleNav() {
  hamburgerButton.classList.toggle("active")
  navigation.classList.toggle("active")
}



