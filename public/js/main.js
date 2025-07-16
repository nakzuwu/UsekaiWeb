document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById('social-toggle');
  const popup = document.getElementById('social-popup');
  const overlay = document.getElementById('overlay');

  toggleBtn.addEventListener('click', () => {
    popup.classList.toggle('hidden');
    overlay.classList.toggle('hidden');
  });

  overlay.addEventListener('click', () => {
    popup.classList.add('hidden');
    overlay.classList.add('hidden');
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const overlay = document.getElementById("overlay");
  const socialPopup = document.getElementById("social-popup");
  const infoPopup = document.getElementById("info-popup");
  const comingSoon = document.getElementById("coming-soon");

  document.getElementById("social-toggle").addEventListener("click", () => {
    socialPopup.classList.remove("hidden");
    overlay.classList.remove("hidden");
  });

  document.querySelector('button:nth-child(2)').addEventListener("click", () => {
    infoPopup.classList.remove("hidden");
    overlay.classList.remove("hidden");
  });

  document.querySelector('button:nth-child(1)').addEventListener("click", () => {
    comingSoon.classList.remove("hidden");
    overlay.classList.remove("hidden");
  });

  overlay.addEventListener("click", () => {
    socialPopup.classList.add("hidden");
    infoPopup.classList.add("hidden");
    comingSoon.classList.add("hidden");
    overlay.classList.add("hidden");
  });
});

      const video = document.getElementById("preload-video");
      const preloader = document.getElementById("preloader");

      // Paksa preloader hilang setelah 3.5 detik
      setTimeout(() => {
        preloader.style.transition = "opacity 0.5s ease";
        preloader.style.opacity = "0";
        setTimeout(() => {
          preloader.style.display = "none";
        }, 500);
      }, 3000); 