(function () {
  'use strict';
  window.addEventListener('load', function () {
    var canvas = document.getElementById('canvas');
    
    if (!canvas || !canvas.getContext) {
      return false;
    }

    /********************
      Random Number Function
    ********************/

    function rand(min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min);
    }

    /********************
      Variables
    ********************/

      var ctx = canvas.getContext('2d');
      var X = canvas.width = window.innerWidth;
      var Y = canvas.height = window.innerHeight;
      var mouseX = null;
      var mouseY = null;
      var particles = [];
      var numParticles = 300; // Number of icons
      var attractionForce = 0.1; // How strongly icons are attracted to the cursor (increase for faster attraction)
      var friction = 0.78; // How quickly they slow down (decrease for faster movement)
      var scatterDistance = 150; // Distance after which particles start scattering
      var scatterDelay = 400; // Time delay (in ms) after which particles scatter if no mouse movement (3 seconds)
      var scatterSpeed = 50; // Custom scatter speed (increase for faster scattering)
      var lastMoveTime = 0; // Timestamp of the last mousemove event
      var scattered = false; // Flag to check if particles should scatter

    // Add the icon image
    var icon = new Image();
    icon.src = '../images/favicon/favicon-32x32.png'; // Replace with the path to your icon

    /********************
      Particle Constructor
    ********************/

    function Particle(ctx, x, y) {
      this.ctx = ctx;
      this.init(x, y);
    }

    Particle.prototype.init = function(x, y) {
      this.x = x;
      this.y = y;
      this.vx = 0; // Velocity on the x-axis
      this.vy = 0; // Velocity on the y-axis
      this.size = rand(15, 18); // Random size for each icon
      this.scattered = false; // Flag to mark if the particle has scattered
    };

    Particle.prototype.update = function() {
      // Calculate the distance from the mouse
      var dx = mouseX - this.x;
      var dy = mouseY - this.y;
      var distance = Math.sqrt(dx * dx + dy * dy);

      // Attract the icon towards the mouse
      if (!scattered && distance < scatterDistance) {
        this.vx += dx * attractionForce;
        this.vy += dy * attractionForce;
      }

      // Scatter particles after the mouse has stopped moving
      if (scattered) {
        // Change the velocity direction to scatter the particles for a short time (3 seconds)
        this.vx += rand(-3, 3);
        this.vy += rand(-3, 3);
      }

      // Apply friction to slow the movement down
      this.vx *= friction;
      this.vy *= friction;

      // Update position
      this.x += this.vx;
      this.y += this.vy;
    };

    Particle.prototype.draw = function() {
      var ctx = this.ctx;
      // Draw the icon image instead of a circle
      ctx.drawImage(icon, this.x - this.size / 2, this.y - this.size / 2, this.size, this.size);
    };

    /********************
      Render Function
    ********************/

    function render() {
      ctx.clearRect(0, 0, X, Y); // Clear the canvas each frame
      ctx.fillStyle = 'rgba(0, 0, 0, 0.8)'; // Dark background
      ctx.fillRect(0, 0, X, Y); // Fill the background

      // Update and draw each particle
      for (var i = 0; i < particles.length; i++) {
        particles[i].update();
        particles[i].draw();
      }

      requestAnimationFrame(render); // Continue the animation loop
    }

    /********************
      Event Listeners
    ********************/

    function onResize() {
      X = canvas.width = window.innerWidth;
      Y = canvas.height = window.innerHeight;
      particles = []; // Reset particles on resize
      spawnParticles();
    }

    // Spawn particles when the mouse moves
    window.addEventListener('mousemove', function(e) {
      mouseX = e.clientX;
      mouseY = e.clientY;
      lastMoveTime = Date.now(); // Update the time when the mouse moves
      if (scattered) {
        scattered = false; // Reset scattered flag when the mouse moves again
      }
    });

    // Resize the canvas on window resize
    window.addEventListener('resize', onResize);

    // Create initial particles
    function spawnParticles() {
      for (var i = 0; i < numParticles; i++) {
        var p = new Particle(ctx, rand(0, X), rand(0, Y));
        particles.push(p);
      }
    }

    // Check if the mouse has stopped moving for the specified time delay
    function checkForScatter() {
      if (Date.now() - lastMoveTime > scatterDelay && !scattered) {
        scattered = true; // Trigger scattering when the mouse stops moving
      }
    }

    // Initial setup
    spawnParticles();
    render(); // Start the animation

    // Set interval to check for mouse inactivity (3 seconds)
    setInterval(checkForScatter, 100);

  });
})();
