document.addEventListener("DOMContentLoaded",function () {
    evento();
    darkMode();
});

function evento() {
    const mobileMenu= document.querySelector (".mobile-menu");
    mobileMenu.addEventListener("click",navegacionReponsiva);

}

function darkMode() {
    // Comprueba si el dark mode estaba habilitado en el almacenamiento local
    let darkLocal = window.localStorage.getItem('dark') === 'true';
  
    // Agrega la clase 'dark-mode' al body si darkLocal es true
    document.body.classList.toggle('dark-mode', darkLocal);
  
    // Añade el evento de click al botón de dark mode
    document.querySelector('.dark-mode-boton').addEventListener('click', darkChange);
  }
  
  function darkChange() {
    // Obtiene el valor actual del dark mode del almacenamiento local
    const darkLocal = window.localStorage.getItem('dark') !== 'true';
  
    // Guarda el nuevo valor del dark mode en el almacenamiento local
    window.localStorage.setItem('dark', darkLocal);
  
    // Añade o elimina la clase 'dark-mode' en el body según el nuevo valor de darkLocal
    document.body.classList.toggle('dark-mode', darkLocal);
  }
  




    function navegacionReponsiva() {
        const navegacion = document.querySelector(".navegacion");
        const imagen = document.querySelector("#icono_barra");
        //El toggle retornara true o False
        navegacion.classList.toggle("mostrar");
        //Operador Ternario es un if y un else, aqui se cambia la imagen de contains, la cual es util
        imagen.src = navegacion.classList.contains("mostrar") ? "/komotu/build/img/minimizar.svg" : "/komotu/build/img/barras.svg";
      }