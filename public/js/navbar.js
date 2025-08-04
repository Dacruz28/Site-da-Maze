// JavaScript para fixar a navbar no topo
window.onscroll = function() {
    fixNavbar();
};

let header = document.querySelector('header'); // Seleciona o elemento header
let sticky = header.offsetTop; // Pega a posição inicial do header na página

function fixNavbar() {
    if (window.pageYOffset > sticky) {
        // Quando o usuário rolar para baixo, adicione a classe 'fixed' ao header
        header.classList.add('fixed');
    } else {
        // Quando o usuário voltar para o topo, remova a classe 'fixed'
        header.classList.remove('fixed');
    }
}


document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".navbar a");
  
    window.addEventListener("scroll", () => {
      let scrollY = window.pageYOffset;
  
      sections.forEach(current => {
        const sectionHeight = current.offsetHeight;
        const sectionTop = current.offsetTop - 100;
        const sectionId = current.getAttribute("id");
  
        if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
          navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href") === `#${sectionId}`) {
              link.classList.add("active");
            }
          });
        }
      });
    });
  });
  