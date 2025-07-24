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
let particles = [];

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

window.addEventListener("resize", resizeCanvas);
resizeCanvas();

class Particle {
    constructor(side) {
        this.x = side === "left" ? 0 : canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 2 + 1;
        this.speedX =
            side === "left"
                ? Math.random() * 1 + 0.5
                : -(Math.random() * 1 + 0.5);
        this.speedY = Math.random() * 0.5 - 0.25;
        this.opacity = Math.random() * 0.5 + 0.2;
    }

    update() {
        this.x += this.speedX;
        this.y += this.speedY;
    }

    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
        ctx.fill();
    }
}

function createParticles() {
    for (let i = 0; i < 2; i++) {
        particles.push(new Particle("left"));
        particles.push(new Particle("right"));
    }
}

function animateParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach((p, i) => {
        p.update();
        p.draw();
        // Remove if out of bounds
        if (p.x < -10 || p.x > canvas.width + 10) {
            particles.splice(i, 1);
        }
    });
    createParticles();
    requestAnimationFrame(animateParticles);
}

animateParticles();
