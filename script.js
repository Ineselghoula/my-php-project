// Sélectionne toutes les images dans la section d'animation
const images = document.querySelectorAll('#animation .ii');

// Démarre l'animation
let currentIndex = 0;
setInterval(() => {
    // Masque toutes les images
    images.forEach(image => image.classList.remove('active'));
    // Affiche l'image suivante
    images[currentIndex].classList.add('active');
    // Passe à l'image suivante
    currentIndex = (currentIndex + 1) % images.length;
}, 2000); // Change d'image toutes les 2 secondes, ajustez selon vos besoins

