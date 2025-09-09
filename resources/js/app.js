import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


 // Sticky navbar y cambio de color al hacer scroll
  const navbar = document.getElementById('navbar');
  const logo = document.getElementById('logo');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('bg-white', 'shadow-md');
      navbar.classList.remove('bg-transparent');
      logo.classList.add('text-indigo-700');
      logo.classList.remove('text-white');
    } else {
      navbar.classList.remove('bg-white', 'shadow-md');
      navbar.classList.add('bg-transparent');
      logo.classList.remove('text-indigo-700');
      logo.classList.add('text-white');
    }
  });
