// Preloader
window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");

    loader.classList.add("loader--hidden");

    loader.addEventListener("transitionend", () => {
        document.body.removeChild(loader);
    });
});

// Slideshow
let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    slideIndex++;
    
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
    
    setTimeout(showSlides, 3000);
}

document.addEventListener("DOMContentLoaded", function() {
    showSlides();
});

// Verzameling button function
document.querySelectorAll('.buy-btn').forEach((button, index) => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.modal')[index].style.display = 'block';
    });
});

document.querySelectorAll('.close').forEach((button, index) => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.modal')[index].style.display = 'none';
    });
});

window.onclick = function(event) {
    document.querySelectorAll('.modal').forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}
