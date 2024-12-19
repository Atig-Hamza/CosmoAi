const lenis = new Lenis({
    smooth: true,
    lerp: 0.12,
  });
  
  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  
  requestAnimationFrame(raf);
  