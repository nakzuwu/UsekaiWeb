document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("social-toggle");
    const popup = document.getElementById("social-popup");
    const overlay = document.getElementById("overlay");

    toggleBtn.addEventListener("click", () => {
        popup.classList.toggle("hidden");
        overlay.classList.toggle("hidden");
    });

    overlay.addEventListener("click", () => {
        popup.classList.add("hidden");
        overlay.classList.add("hidden");
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

    document
        .querySelector("button:nth-child(2)")
        .addEventListener("click", () => {
            infoPopup.classList.remove("hidden");
            overlay.classList.remove("hidden");
        });

    document
        .querySelector("button:nth-child(1)")
        .addEventListener("click", () => {
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

const canvas = document.getElementById("particle-canvas");
const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

const particles = [];
const particleCount = 50; // lebih sedikit

function createParticle(fromLeft = true) {
    const y = Math.random() * canvas.height;
    const x = fromLeft ? 0 : canvas.width;
    const speed = 1 + Math.random() * 1.5;
    const size = 1 + Math.random() * 1.5; // lebih tipis
    const direction = fromLeft ? 1 : -1;

    particles.push({ x, y, size, speed, direction });
}

function updateParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = particles.length - 1; i >= 0; i--) {
        const p = particles[i];
        p.x += p.speed * p.direction;

        // Opacity fades as it reaches center
        const centerX = canvas.width / 2;
        const distToCenter = Math.abs(centerX - p.x);
        const maxDist = centerX;
        const alpha = Math.max(0, distToCenter / maxDist);

        ctx.beginPath();
        ctx.fillStyle = `rgba(255, 255, 255, ${alpha})`;
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        ctx.fill();

        // Remove particle if near center
        if (distToCenter < 30) {
            particles.splice(i, 1);
        }
    }

    // Randomly add new particles
    if (particles.length < particleCount) {
        createParticle(Math.random() < 0.5);
    }

    requestAnimationFrame(updateParticles);
}

updateParticles();
