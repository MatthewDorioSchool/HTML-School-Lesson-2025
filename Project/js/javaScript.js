document.addEventListener('DOMContentLoaded',(loaded) =>{
    console.log("JS code connected");
    document.getElementById("globalHeader").style.cssText = "display: flex; " +
        "height: 20vw; background-color: black; align-items: center;";
});

document.addEventListener('DOMContentLoaded',(loaded) =>{
    console.log("JS code connected");
    document.getElementById("globalFooter").style.cssText = "display: flex; " +
        "height: 20vw; background-color: black; align-items: center;";
});

document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('indexVideo');

    const videoSources = [
        './video/Mega_Man_2.mp4',
        './video/Super_Mario_Bros_3.mp4'
    ];

    function getRandomInterval(min = 5, max = 15) {
        return Math.floor(Math.random() * (max - min + 1) + min) * 1000;
    }

    function playRandomVideo() {
        const randomIndex = Math.floor(Math.random() * videoSources.length);
        const selectedVideo = videoSources[randomIndex];
        video.src = selectedVideo;
        video.load();
        video.play();

        const nextChange = getRandomInterval();

        setTimeout(() => {
            playRandomVideo();
        }, nextChange);
    }

    video.addEventListener('loadedmetadata', () => {
        video.currentTime = 40;
    });

    playRandomVideo();
});

function updateImages(imageMap) {
    for (const [id, value] of Object.entries(imageMap)) {
        const element = document.getElementById(id); // Get the main div element (e.g., display23)
        if (element) {
            // Find the image element inside, if it exists
            const img = element.querySelector('img');

            // --- Handle Image Updates ---
            if (img && (value.src !== undefined || value.alt !== undefined)) {
                // If there's an image and src/alt are provided, update the image
                if (img.src !== value.src) {
                    img.classList.remove('fade-in');
                    void img.offsetWidth; // Trigger reflow to restart animation

                    img.src = value.src;
                    img.alt = value.alt || '';

                    img.classList.add('fade-in');
                } else {
                    if (value.alt) img.alt = value.alt;
                }
            }

            // --- Handle Text Content Updates (for <p> tags or general HTML) ---
            if (value.hasOwnProperty('innerHTML')) {
                // If innerHTML is provided in the map, update the element's content
                element.innerHTML = value.innerHTML;
            }
            // --- Handle Full Element Visibility (if you still need this for other divs) ---
            else if (value.hasOwnProperty('hidden')) {
                // If 'hidden' property is provided, set display style
                element.style.display = value.hidden ? 'none' : '';
            }
        }
    }
}

function updateBackgroundImage(url) {
    const body = document.querySelector('body.shopPage');
    if (body) {
        body.style.backgroundImage = url ? `url('${url}')` : '';
    }
}
function setShopPageMinHeight(value) {
    const body = document.querySelector('body.shopPage');
    if (body) {
        body.style.minHeight = value;
    }
}

// Optional: clear all images to empty and remove background
function resetShopPage() {
    const clearMap = {
        display6:  { src: '', alt: '' },
        display9:  { src: '', alt: '' },
        display10: { src: '', alt: '' },
        display11: { src: '', alt: '' },
        display23: { innerHTML: '<p>$459.99</p>' },
        display24: { innerHTML: '' } // This will remove the price text from display23
        // Add more if needed
    };
    updateImages(clearMap);
    updateBackgroundImage('./img/storePage/NES_productSelect/nesProduct.png');
    setShopPageMinHeight('205vh');
}

function showNinjaGaiden() {
    updateImages({
      
        display6:  { src: './img/productPage1_ninja_img/ninjagaidenlogo.png', alt: 'Ninja Gaiden Logo' },
        display9:  { src: './img/storePage/ninjaGaidenSelected_img/ninjaGaidenSelected.png', alt: 'Ninja Gaiden Product' },
        display10: { src: './img/storePage/gameSelectShadowbox/gameshadowBox.png', alt: 'display box' },
        display11: { src: './img/storePage/ninjaGaidenSelected_img/ninjaChar.png', alt: 'Ninja Character' },
        display24: { innerHTML: '<p>$69.99</p>' }
    });
    updateBackgroundImage('./img/storePage/ninjaGaidenSelected_img/NinjaSelectUnderGlow.png');
    setShopPageMinHeight('100vh');
}

function showMegaMan2() {
    updateImages({
        
        display6:  { src: './img/productPage2_megaman2_img/megaman2logo.png', alt: 'Mega Man 2 Logo' },
        display9:  { src: './img/storePage/megaManSelected_img/MegaManSelected.png', alt: 'Mega Man 2 Product' },
        display10: { src: './img/storePage/gameSelectShadowbox/gameshadowBox.png', alt: 'display box' },
        display11: { src: './img/storePage/megaManSelected_img/megaMan2Char.png', alt: 'Mega Man 2 Character' },
        display24: { innerHTML: '<p>$59.99</p>' }
        
    });
    updateBackgroundImage('./img/storePage/megaManSelected_img/megamanSelectUnderGlow.png');
    setShopPageMinHeight('100vh');
}

function showMario3() {
    updateImages({
        
        display6:  { src: './img/productPage3_mario3_img/supermario3logo.png', alt: 'Mario 3 Logo' },
        display9:  { src: './img/storePage/Mario3Selected_img/Mario3StorepageSelect.png', alt: 'Mario 3 Product' },
        display10: { src: './img/storePage/gameSelectShadowbox/gameshadowBox.png', alt: 'display box' },
        display11: { src: './img/storePage/Mario3Selected_img/Mario3Char.png', alt: 'Mario 3 Character' },
        display23: { innerHTML: '' }, // This will remove the price text from display23
        display24: { innerHTML: '<p>$79.99</p>' }
    });
    updateBackgroundImage('./img/storePage/Mario3Selected_img/marioSelectUnderGlow.png');
    setShopPageMinHeight('100vh');
    
}


window.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slide-box");
    const slider = document.getElementById("all-slide");
    const nextBtn = document.querySelector(".next");
    const prevBtn = document.querySelector(".previous");

    let index = 0;

    function updateSlide() {
        const slideWidth = slides[0].clientWidth;
        slider.style.transform = `translateX(-${index * slideWidth}px)`;

        // Call the display function for the current slide
        if (slideFunctions[index]) {
            slideFunctions[index]();
        }
    }

    // STEP 3: Button navigation
    nextBtn.addEventListener("click", () => {
        index = (index + 1) % slides.length;
        updateSlide();
    });

    prevBtn.addEventListener("click", () => {
        index = (index - 1 + slides.length) % slides.length;
        updateSlide();
    });

    // Optional: show first slide on load
    updateSlide();
});
const slideFunctions = [
    showMario3,
    showNinjaGaiden,
    showMegaMan2,
    resetShopPage
    // Add more if you have more slides
];
