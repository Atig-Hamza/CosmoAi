//smooth scroll
const lenis = new Lenis({
    smooth: true,
    lerp: 0.11,
  });
  
  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
    ScrollTrigger.update();
  }
  
  requestAnimationFrame(raf);
  
//cursor edit
var cursor = document.querySelector('.cursor');
var cursorinner = document.querySelector('.cursor2');
var a = document.querySelectorAll('a');

document.addEventListener('mousemove', function(e){
  var x = e.clientX;
  var y = e.clientY;
  cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
});

document.addEventListener('mousemove', function(e){
  var x = e.clientX;
  var y = e.clientY;
  cursorinner.style.left = x + 'px';
  cursorinner.style.top = y + 'px';
});

document.addEventListener('mousedown', function(){
  cursor.classList.add('click');
  cursorinner.classList.add('cursorinnerhover')
});

document.addEventListener('mouseup', function(){
  cursor.classList.remove('click')
  cursorinner.classList.remove('cursorinnerhover')
});

a.forEach(item => {
  item.addEventListener('mouseover', () => {
    cursor.classList.add('hover');
  });
  item.addEventListener('mouseleave', () => {
    cursor.classList.remove('hover');
  });
})

//Loading animation hidde after 5 s
document.addEventListener('DOMContentLoaded', () => {
    const loadingScreen = document.getElementById('loading-screen');
    const content = document.getElementById('content');
  
    setTimeout(() => {
      loadingScreen.style.display = 'none';
      content.style.display = 'block';
      document.body.style.overflow = 'auto';
    }, 3000);
  });
  

//images animation by scrolling
window.addEventListener('scroll', () => {
  const scrollPosition = window.scrollY;
  const image1 = document.getElementById('image1');
  const image2 = document.getElementById('image2');
  image1.style.transform = `translateY(-${scrollPosition * 0.5}px) rotate(8deg)`;
  image2.style.transform = `translateY(-${scrollPosition * 0.5}px) rotate(-8deg)`;
});

const enableHorizontalScrollInSection = () => {
  const section = document.querySelector('.section-scroll-text');
  const scrollContainer = section.querySelector('.flex');

  if (scrollContainer) {
    gsap.to(scrollContainer, {
      x: () => -(scrollContainer.scrollWidth - window.innerWidth),
      ease: 'linear',
      scrollTrigger: {
        trigger: section,
        start: 'top top',
        end: () => `+=${scrollContainer.scrollWidth}`,
        scrub: true,
        pin: true,
        invalidateOnRefresh: true,
      },
    });
  }
};

enableHorizontalScrollInSection();

//stars animation 
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

for(const star of document.getElementsByClassName("magic-star")) {
  setTimeout(() => {
    animate(star);
    
    setInterval(() => animate(star), 1000);
  }, index++ * (interval / 3))
}

//section animation
gsap.set(".circle", { yPercent: -5 });
    gsap.set(".dotsBlue", { yPercent: 10 });
    gsap.set(".owlHorned", { yPercent: -20 });
    gsap.set(".clusterGreat", { yPercent: 5 });

    gsap.to(".circle", {
      yPercent: 5,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterGreat",
        scrub: 1
      },
    });

    gsap.to(".dotsBlue", {
      yPercent: -10,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterGreat",
        scrub: 1
      },
    });

    gsap.to(".owlHorned", {
      yPercent: 20,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterGreat",
        scrub: 1
      },
    });

    gsap.to(".caption", {
      yPercent: 100,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterGreat",
        end: "bottom center",
        scrub: 1
      },
    });

    gsap.to(".clusterGreat", {
      yPercent: -5,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterGreat",
        end: "bottom center",
        scrub: 1
      },
    });

    /* ------Burrowing Owl Sequence------ */
    gsap.set(".triangle", { yPercent: 25, rotation: -90 });
    gsap.set(".dotsWhite", { yPercent: 10 });
    gsap.set(".owlBurrowing", { yPercent: -20 });
    gsap.set(".clusterBurrowing", { yPercent: 5 });

    gsap.to(".triangle", {
      yPercent: -5,
      rotation: 40,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterBurrowing",
        scrub: 1
      },
    });

    gsap.to(".dotsWhite", {
      yPercent: -10,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterBurrowing",
        scrub: 1
      },
    });

    gsap.to(".owlBurrowing", {
      yPercent: 20,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterBurrowing",
        scrub: 1
      },
    });

    gsap.to(".captionBurrowing", {
      yPercent: 200,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterBurrowing",
        end: "bottom center",
        scrub: 1
      },
    });

    gsap.to(".clusterBurrowing", {
      yPercent: -5,
      ease: "none",
      scrollTrigger: {
        trigger: ".clusterBurrowing",
        end: "bottom center",
        scrub: 1
      },
    });