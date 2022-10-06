import './style.css';
import { TouchX } from '@elementsx/touch-x';

const table = document.querySelector('#table');
const ball = document.querySelector('#table #ball');
const player = document.querySelector('#player');
const computer = document.querySelector('#computer');
const touchArea = document.querySelector('#touch-area');
const ballRadius = parseInt(ball.getAttribute('r'));
const ballSpeed = 4; // starting ball speed, real speed is directionX(Y)

let computerSpeed = 5;
let [directionX, directionY] = [ballSpeed, ballSpeed];

let [computerScore, playerScore] = [0, 0];
let [computerHit, playerHit] = [false, false];
let touchStart = 0; // used to calculate player moving distance

function moveBall(timestamp) {
  const cx = parseInt(ball.getAttribute('cx'));
  const cy = parseInt(ball.getAttribute('cy'));

  const leftLimit = ballRadius;
  const rightLimit = table.offsetWidth - ballRadius;
  const topLimit = ballRadius;
  const bottomLimit = table.offsetHeight - ballRadius;

  const [nextCX, nextCY] = [cx + directionX, cy + directionY];
  if (nextCX < leftLimit || nextCX > rightLimit) {
    directionX = -directionX;
  }
  if (nextCY < topLimit ) {
     directionY = -directionY;
  }
  if (playerHit && detectCollision(ball, computer)) {
    directionY = -directionY;
    [computerHit, playerHit] = [true, false];
  } else if (computerHit && detectCollision(ball, player)) {
    directionY = -directionY;
    [computerHit, playerHit] = [false, true];
  }

  const [xPos, yPos] = [cx + directionX, cy + directionY];
  if (yPos < 0) { // computer lost
    playerScore++;
    touchArea.querySelector('.score .player').innerText = playerScore;
    serveBall();
  } else if (yPos > table.offsetHeight) { // plaer lost
    computerScore++;
    touchArea.querySelector('.score .computer').innerText = computerScore;
    serveBall();
  } else {
    ball.setAttribute('cx', xPos);
    ball.setAttribute('cy', yPos);
    if (playerHit) {
      const computerPos = parseInt(computer.getAttribute('x'));
      const computerMove = xPos > computerPos ? computerSpeed : -computerSpeed;
      computer.setAttribute('x', computerPos + computerMove);
    }
    requestAnimationFrame(moveBall);
  }
}
requestAnimationFrame(moveBall);

// returns if ball and paddle collides or not
function detectCollision(ball, paddle) {
  const cx = parseInt(ball.getAttribute('cx'));
  const cy = parseInt(ball.getAttribute('cy'));
  const r = parseInt(ball.getAttribute('r'));
  const [x1, y1, w1, h1] = [cx - r, cy - r, r * 2, r * 2];

  const x2 = parseInt(paddle.getAttribute('x'));
  const y2 = parseInt(paddle.getAttribute('y'));
  const w2 = parseInt(paddle.getAttribute('width'));
  const h2 = parseInt(paddle.getAttribute('height'));

  const colliding = x1 < (x2 + w2) && (x1 + w1) > x2 &&
    y1 < (y2 + h2) && (y1 + h1) > y2;
  return colliding;
}

// moves player
document.body.addEventListener('x-swipe', event => {
  const { x0, x2, type } = event.detail;
  if (type === 'start') {
    touchStart = parseInt(player.getAttribute('x'));
  }
  else if (type === 'move') {
    let x = touchStart + (x2 - x0);
    x = x < 0 ? 0 : x;
    x = x > table.offsetWidth - 80 ? table.offsetWidth - 80 : x;
    player.setAttribute('x', x);
  }
});

// starts the game
function serveBall() {
  if (playerScore >= 7 || computerScore >= 7) {
    const msg = playerScore >= 7 ? 'You Win !!!' : 'Computer Win :(';
    // alert(msg);
  }
  const rand = ballRadius +
    Math.floor((table.offsetWidth - ballRadius) * Math.random());
  computer.setAttribute('x', rand - 40);
  ball.setAttribute('cy', ballRadius + 10);
  ball.setAttribute('cx', rand);
  computerHit = true;
  [directionX, directionY] = [ballSpeed, ballSpeed];
  setTimeout(moveBall, 3000);
}

player.setAttribute('x', 50);
player.setAttribute('y', table.offsetHeight - ballRadius);
new TouchX(touchArea);
