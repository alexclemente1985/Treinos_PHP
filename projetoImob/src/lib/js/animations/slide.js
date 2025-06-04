export default function slide(){
    document.addEventListener("DOMContentLoaded" ,function(){
    const slides = document.querySelectorAll(".carousel .slide");
    const prevButton = document.querySelector(".carousel .prev");
    const nextButton = document.querySelector(".carousel .next");

    let currentIndex = 0;
    const totalSlides = slides.length;

    function showSlide(index){        
        //Nesse caso, se for clicado o botão prev no index 0
        if(index<0) index = totalSlides - 1;
        //Se for clicado o botão next no index totalSlides -1
        if(index>=totalSlides) index = 0;

        document.querySelector(".slides").style.transform = `translateX(-${index*100}%)`;

        slides.forEach((slide,i) => {
            slide.style.opacity = (i===index) ? '1':'0';
        });

        currentIndex = index;
    }

    setInterval(() => {
        showSlide(currentIndex+1);
    },4000);

    prevButton.addEventListener('click', () =>{
        showSlide(currentIndex-1);
    });

    nextButton.addEventListener('click', () => {
        showSlide(currentIndex+1);
    });

    
    showSlide(currentIndex);
})
}