document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("menu-toggle").addEventListener("click", function () {
    document.getElementById("main-nav").classList.toggle("activo");
  });
  document.getElementById("btnBuscar").addEventListener("click", function () {
    const carrera = document.getElementById("inputCarrera").value.toLowerCase();
    const region = document.getElementById("selectRegion").value.toLowerCase();
    const tarjetas = document.querySelectorAll("#contenedorConvocatorias .col-md-4");

    tarjetas.forEach(card => {
      const contenido = card.innerText.toLowerCase();
      if (contenido.includes(carrera) && (region === 'todo el país' || contenido.includes(region))) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
});
