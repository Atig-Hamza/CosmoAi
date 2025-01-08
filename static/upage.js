//open call modal
const talkto = document.getElementById("talkto");
talkto.addEventListener("click", () => {
    document.getElementById("callmodal").classList.remove("hidden");
})
//speacial effects
let index = 0,
    interval = 1000;

const rand = (min, max) =>
    Math.floor(Math.random() * (max - min + 1)) + min;

const animate = star => {
    star.style.setProperty("--star-left", `${rand(-10, 100)}%`);
    star.style.setProperty("--star-top", `${rand(-40, 80)}%`);

    star.style.animation = "none";
    star.offsetHeight;
    star.style.animation = "";
}

for (const star of document.getElementsByClassName("magic-star")) {
    setTimeout(() => {
        animate(star);

        setInterval(() => animate(star), 1000);
    }, index++ * (interval / 3))
}

//text effects Upage
class TextScramble {
    constructor(el) {
        this.el = el
        this.chars = '@#$%&*()_+=[]{}|;:,.<>?/'
        this.update = this.update.bind(this)
    }
    setText(newText) {
        const oldText = this.el.innerText
        const length = Math.max(oldText.length, newText.length)
        const promise = new Promise((resolve) => this.resolve = resolve)
        this.queue = []
        for (let i = 0; i < length; i++) {
            const from = oldText[i] || ''
            const to = newText[i] || ''
            const start = Math.floor(Math.random() * 40)
            const end = start + Math.floor(Math.random() * 40)
            this.queue.push({ from, to, start, end })
        }
        cancelAnimationFrame(this.frameRequest)
        this.frame = 0
        this.update()
        return promise
    }
    update() {
        let output = ''
        let complete = 0
        for (let i = 0, n = this.queue.length; i < n; i++) {
            let { from, to, start, end, char } = this.queue[i]
            if (this.frame >= end) {
                complete++
                output += to
            } else if (this.frame >= start) {
                if (!char || Math.random() < 0.28) {
                    char = this.randomChar()
                    this.queue[i].char = char
                }
                output += `<span class="dud">${char}</span>`
            } else {
                output += from
            }
        }
        this.el.innerHTML = output
        if (complete === this.queue.length) {
            this.resolve()
        } else {
            this.frameRequest = requestAnimationFrame(this.update)
            this.frame++
        }
    }
    randomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)]
    }
}
//-----------------------
const phrases = [
    'Start chatting with Cosmo 😊',
    'Let Cosmo help you with your text.'

]

const el = document.getElementById('slogan2')
const fx = new TextScramble(el)

let counter = 0
const next = () => {
    fx.setText(phrases[counter]).then(() => {
        setTimeout(next, 2000)
    })
    counter = (counter + 1) % phrases.length
}

next()

//activate features
const deepThinkingButton = document.getElementById('deepthinking');
const BoostButton = document.getElementById('boost');
const WebSearchButton = document.getElementById('websearch');
const UploadButton = document.getElementById('upload');

deepThinkingButton.addEventListener('click', () => {
    deepThinkingButton.classList.toggle('bg-blue-700')
    deepThinkingButton.classList.toggle('text-white')
});

BoostButton.addEventListener('click', () => {
    BoostButton.classList.toggle('bg-blue-700');
    BoostButton.classList.toggle('text-white');
});

WebSearchButton.addEventListener('click', () => {
    WebSearchButton.classList.toggle('bg-blue-700');
    WebSearchButton.classList.toggle('text-white');
});
