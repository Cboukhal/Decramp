document.addEventListener('DOMContentLoaded', () => {
  const images = [
    'image/ampoule2.jpg',   // index 0
    'image/ampoule1.jpg',  // index 1
    'image/ampoule3.jpg'    // index 2
  ];

  // éléments
  const hero = document.querySelector('.hero');
  const bgCurrent = document.querySelector('.hero-bg-current');
  const bgNext = document.querySelector('.hero-bg-next');
  const dots = document.querySelectorAll('.hero-dots .dot');

  // sécurité
  if (!bgCurrent || !bgNext || dots.length === 0) {
    console.error('Hero elements missing.');
    return;
  }

  // précharge images
  images.forEach(src => {
    const img = new Image();
    img.src = src;
  });

  let currentIndex = 0;
  // initialise background initial
  bgCurrent.style.backgroundImage = `url('${images[currentIndex]}')`;
  bgNext.style.backgroundImage = `url('${images[(currentIndex + 1) % images.length]}')`;

  function showImage(index) {
    if (index === currentIndex) return; // rien à faire
    // place l'image cible dans bgNext
    bgNext.style.backgroundImage = `url('${images[index]}')`;
    // amener bgNext au premier plan
    bgNext.style.opacity = '1';

    // après la transition, swap des classes / calques
    setTimeout(() => {
      // mettre bgCurrent à l'image sélectionnée et remettre bgNext invisible
      bgCurrent.style.backgroundImage = `url('${images[index]}')`;
      bgNext.style.opacity = '0';
      currentIndex = index;
    }, 800); // durée identique à la transition CSS
  }

  // gestion des dots
  dots.forEach(dot => {
    dot.addEventListener('click', (e) => {
      const idx = parseInt(dot.dataset.index, 10);
      // mise à jour visuelle des dots
      dots.forEach(d => d.classList.remove('active'));
      dot.classList.add('active');
      // change d'image
      showImage(idx);
    });
  });

    // ============= BURGER - À L'INTÉRIEUR DE READY =============
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('nav');
    const navLinks = document.querySelectorAll('nav ul li a');

    // Vérification que les éléments existent
    if (burger && nav) {
        // Ouvrir/Fermer le menu
        burger.addEventListener('click', () => {
            burger.classList.toggle('croix');
            nav.classList.toggle('active');
        });

        // Fermer le menu lors du clic sur un lien
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('croix');
                nav.classList.remove('active');
            });
        });

        // Fermer le menu si on clique en dehors
        document.addEventListener('click', (e) => {
            if (!burger.contains(e.target) && !nav.contains(e.target)) {
                burger.classList.remove('croix');
                nav.classList.remove('active');
            }
        });
    } else {
        console.error('Burger ou Nav introuvable !');
    }
});

const stars = document.querySelectorAll('.star');
const ratingText = document.getElementById('ratingText');
const noteValue = document.getElementById('note-value');
const errorMessage = document.getElementById('errorMessage');
const form = document.getElementById('commentForm');
let selectedRating = 0;

const ratingLabels = {
    1: "Très insatisfait",
    2: "Insatisfait",
    3: "Moyen",
    4: "Satisfait",
    5: "Excellent !"
};

// Met à jour l'affichage des étoiles
function updateStars(rating, isHover = false) {
    stars.forEach((star, index) => {
        if (index < rating) {
            if (isHover) {
                star.classList.add('hovered');
            } else {
                star.classList.add('active');
                star.classList.remove('hovered');
            }
        } else {
            star.classList.remove('active', 'hovered');
        }
    });
}

// Survol
stars.forEach(star => {
    star.addEventListener('mouseenter', () => {
        const rating = parseInt(star.getAttribute('data-rating'));
        updateStars(rating, true);
        ratingText.textContent = ratingLabels[rating];
    });
});

// Quand on quitte le survol
document.getElementById('starRating').addEventListener('mouseleave', () => {
    updateStars(selectedRating, false);
    if (selectedRating === 0) {
        ratingText.textContent = "Choisissez une note";
    } else {
        ratingText.textContent = ratingLabels[selectedRating];
    }
});

// Au clic
stars.forEach(star => {
    star.addEventListener('click', () => {
        selectedRating = parseInt(star.getAttribute('data-rating'));
        noteValue.value = selectedRating;
        updateStars(selectedRating, false);
        ratingText.textContent = ratingLabels[selectedRating];
        errorMessage.style.display = 'none';
    });
});

// Validation du formulaire
form.addEventListener('submit', (e) => {
    if (selectedRating === 0) {
        e.preventDefault();
        errorMessage.style.display = 'block';
        document.getElementById('starRating').scrollIntoView({ behavior: 'smooth' });
    } else {
        e.preventDefault();
        alert(`Merci pour votre note de ${selectedRating}/5 étoiles !`);
        // form.submit(); // Décommentez pour envoyer réellement
    }
});