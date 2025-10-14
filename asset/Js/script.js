$(document).ready(() => {
    // ============= SLIDER =============
    let image = $('#slider img')
    let nbrSlides = image.length;
    let imageActive = 0;
    image.eq(imageActive).show();
    returnSlide();
    
    function returnSlide() {  
        $('#sgauche').click(() => {
            if(imageActive > 0)
                imageActive--;
            else
                imageActive = nbrSlides - 1;
            image.not(imageActive).fadeOut(500);
            image.eq(imageActive).fadeIn(500);
        });
        
        $('#sdroite').click(() => {
            imageActive++;
            if(imageActive == nbrSlides)
                imageActive = 0;
            image.not(imageActive).fadeOut(500);
            image.eq(imageActive).fadeIn(500);
        });
    }

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