// Logica da Tela de Perguntas
// Seleciona todos os elementos com a classe 'accordion'
const accordions = document.querySelectorAll(".accordion");

// Função para fechar todos os acordes
function closeAllAccordions() {
  accordions.forEach((accordion) => {
    const body = accordion.querySelector(".accordion-body");
    body.classList.remove("active");
  });
}

// Itera sobre cada elemento 'accordion'
accordions.forEach((accordion) => {
  // Adiciona um evento de clique ao elemento atual
  accordion.addEventListener("click", function () {
    // Fecha todos os outros acordes
    closeAllAccordions();

    // Encontra o elemento com a classe 'accordion-body' dentro do accordion atual
    const body = accordion.querySelector(".accordion-body");

    // Alterna a classe 'active' no elemento encontrado
    body.classList.toggle("active");
  });
});
// Fim da Logica da Tela de Perguntas


// Logica Campanhas
function displayImage(input) {
  if (input.files && input.files[0]) {
      const reade = new FileReader();
      reade.onload = function (e) {
          const uploadedImage = document.getElementById('uploaded_image');
          uploadedImage.src = e.target.result;
          uploadedImage.classList.remove('default_image');
          uploadedImage.classList.add('uploaded_image');
      }
      reade.readAsDataURL(input.files[0]);
  }
}
// Fim da Logica Campanhas
