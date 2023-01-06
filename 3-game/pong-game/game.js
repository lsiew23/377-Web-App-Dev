// game.js

// Set up canvas and context
const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");

// Set up ball
const ball = {
  x: canvas.width / 2,
  y: canvas.height / 2,
  radius: 10,
  velocity: {
    x: 5,
    y: 5
  },
  draw: function() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
    ctx.fillStyle = "white";
    ctx.fill();
    ctx.closePath();
  }
};

// Set up paddles
const paddles = [
  {
    x: 10,
    y: canvas.height / 2,
    width: 10,
    height: 70,
    draw: function() {
      ctx.fillStyle = "white";
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
  },
  {
    x: canvas.width - 20,
    y: canvas.height / 2,
    width: 10,
    height: 70,
    draw: function() {
      ctx.fillStyle = "white";
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
  }
];

// Game loop
function gameLoop() {
  // Clear the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw ball and paddles
  ball.draw();
  paddles.forEach(paddle => paddle.draw());

  // Update ball position based on velocity
  ball.x += ball.velocity.x;
  ball.y += ball.velocity.y;

  // Check for ball collision with walls
  if (ball.y + ball.radius > canvas.height || ball.y - ball.radius < 0) {
    ball.velocity.y = -ball.velocity.y;
  }

  // Check for ball collision with paddles
  paddles.forEach(paddle => {
    if (
      ball.x - ball.radius < paddle.x +
