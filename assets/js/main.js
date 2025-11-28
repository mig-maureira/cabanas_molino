function scrollup() {
  window.scrollTo(0, 0);
}

console.log("main.js cargado y preparado  woof!  ");

const btnIrArriba = document.getElementById("arriba");

btnIrArriba.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth" 
  });
})