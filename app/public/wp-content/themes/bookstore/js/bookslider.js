var btn = document.getElementsByClassName("btn");
var slide = document.getElementById("category-slide");
btn[0].onclick = function() {
    slide.style.transform = "translateX(0px)";
    for (i=0; i<2; i++) {
        btn[i].classList.remove("active");
    } 
    this.classList.add("active");
}
btn[1].onclick = function() {
    slide.style.transform = "translateX(-313px)";
    for (i=0; i<2; i++) {
        btn[i].classList.remove("active");
    } 
    this.classList.add("active");
}