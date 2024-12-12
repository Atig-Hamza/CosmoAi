const STAR_COLOR = '#0000FF';
const STAR_SIZE = 1.5;
const STAR_MIN_SCALE = 2;
const OVERFLOW_THRESHOLD = 50;
const STAR_COUNT = (window.innerWidth + window.innerHeight) / 8;

const canvas = document.querySelector('canvas');
const context = canvas.getContext('2d');

let scale = 1; // Device pixel ratio
let width;
let height;

let stars = [];
let velocity = { x: 0, y: 0, z: 0.0005 };

initialize();
resize();
animate();

window.onresize = resize;

function initialize() {
    for (let i = 0; i < STAR_COUNT; i++) {
        stars.push({
            x: Math.random() * width,
            y: Math.random() * height,
            z: STAR_MIN_SCALE + Math.random() * (1 - STAR_MIN_SCALE),
        });
    }
}

function resize() {
    scale = window.devicePixelRatio || 1;
    width = window.innerWidth * scale;
    height = window.innerHeight * scale;

    canvas.width = width;
    canvas.height = height;

    stars.forEach(placeStar);
}

function placeStar(star) {
    star.x = Math.random() * width;
    star.y = Math.random() * height;
}

function recycleStar(star) {
    star.z = STAR_MIN_SCALE + Math.random() * (1 - STAR_MIN_SCALE);
    star.x = Math.random() * width;
    star.y = Math.random() * height;
}

function animate() {
    context.clearRect(0, 0, width, height);

    updateStars();
    renderStars();

    requestAnimationFrame(animate);
}

function updateStars() {
    stars.forEach((star) => {
        star.x += velocity.x * star.z;
        star.y += velocity.y * star.z;

        star.x += (star.x - width / 2) * velocity.z * star.z;
        star.y += (star.y - height / 2) * velocity.z * star.z;
        star.z += velocity.z;

        if (
            star.x < -OVERFLOW_THRESHOLD ||
            star.x > width + OVERFLOW_THRESHOLD ||
            star.y < -OVERFLOW_THRESHOLD ||
            star.y > height + OVERFLOW_THRESHOLD
        ) {
            recycleStar(star);
        }
    });
}

function renderStars() {
    stars.forEach((star) => {
        context.beginPath();
        context.lineCap = 'round';
        context.lineWidth = STAR_SIZE * star.z * scale;
        context.globalAlpha = 0.5 + 0.5 * Math.random();
        context.strokeStyle = STAR_COLOR;

        context.moveTo(star.x, star.y);
        context.lineTo(star.x, star.y); // Static lines (no tail effect)
        context.stroke();
    });
}