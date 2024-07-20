let carrousel = document.getElementById('carrousel');
let carrousel_div = document.getElementById('carrousel-div');
let image_number = document.getElementById('carrousel').getAttribute('data-image-number');
let prev = document.getElementById('prev');
let next = document.getElementById('next');
let currentSlideIndex = 0;

//prev.addEventListener('click', (e) =>{
    //carrousel_div.style.transform = "translateX(-"+890+"px)";
//});

//next.addEventListener('click', (e) =>{
   // carrousel_div.style.transform = "translateX("+890+"px)";
//});

next.addEventListener('click', () => {
    currentSlideIndex = (currentSlideIndex + 1) % (carrousel_div.children.length);
    console.log(currentSlideIndex);
    updateSlideVisibility();
});

prev.addEventListener('click',  carousel());

function updateSlideVisibility() {
    carrousel_div.style.transform = `translateY(-${currentSlideIndex * 100}%)`;
}

function carousel () {
    currentSlideIndex = (currentSlideIndex - 1) % carrousel_div.children.length;
    console.log(currentSlideIndex);
    if ((-currentSlideIndex) === carrousel_div.children.length) {
        currentSlideIndex = 0;
    }
    updateSlideVisibility();
}

setInterval(carousel(), 200);

