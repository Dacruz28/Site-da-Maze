document.addEventListener("DOMContentLoaded", function () {
    // Seleciona os elementos que terão a animação
    const elementsToAnimate = document.querySelectorAll('.hero-content, .nav_text, .title, .subtitle, .nav_button');
    
    // Atraso de 500ms antes de adicionar a classe 'visible' e animar
    setTimeout(() => {
        elementsToAnimate.forEach(element => {
            element.classList.add('visible');
        });
    }, 500);  // Delay de 500ms (meia segundo)
});




document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card-hidden");
  
    const cardObserver = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("card-visible");
            cardObserver.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.2
      }
    );
  
    cards.forEach(card => {
      cardObserver.observe(card);
    });
  });
  




