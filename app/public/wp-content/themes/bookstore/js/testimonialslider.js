var btnslide = document.getElementsByClassName("btnslide");
var testimonialslide = document.getElementById("testimonial-slide");
btnslide[0].onclick = function() {
    testimonialslide.style.transform = "translateX(0px)";
    for (i=0; i<2; i++) {
        btnslide[i].classList.remove("activebtn");
    } 
    this.classList.add("activebtn");
}
btnslide[1].onclick = function() {
    testimonialslide.style.transform = "translateX(-313px)";
    for (i=0; i<2; i++) {
        btnslide[i].classList.remove("activebtn");
    } 
    this.classList.add("activebtn");
}