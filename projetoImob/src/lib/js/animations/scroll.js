export default function scroll(){
    document.addEventListener('DOMContentLoaded' ,function(){
        document.querySelectorAll('nav a[href^="#"]').forEach(link => {
        
            link.addEventListener('click', function(event){
                event.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if(targetElement){
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior:'smooth'
                    });
                }
            })
        })
    })
}