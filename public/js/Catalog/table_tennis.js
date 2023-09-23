let ball_x, ball_y;
let dx, dy;
let paddle_left, paddle_right;
let score;
let myFont;
let start;

function preload() {
  myFont = loadFont('js/Catalog/Typewriter.ttf');
}

function setup() {
  createCanvas(windowWidth, windowHeight, WEBGL).parent('table-tennis-game-content');
  
  ball_x = 0;
  ball_y = 0;
  
  dx = 3;
  dy = 3;
  
  score = 0;
  
  start = false;
}

function draw() {
  background(0);
  
  if (start) {
    let mouse_pos = mouseX - (windowWidth / 2);
    let mouse_pos_persent = mouse_pos / (windowWidth / 2);

    let cX = map(mouseX, 0, width, -200, 200);
    camera(cX, 0, (height/2) / tan(PI/6), cX, 0, 0, 0, 2, 1);

    rotateX(-PI / 12);

    push();
    fill('#256D85');
    box(windowWidth / 3, windowWidth / 64, windowWidth / 2);
    pop();

    paddle_left = (windowWidth / 8) * mouse_pos_persent + (windowWidth / 25);
    paddle_right = (windowWidth / 8) * mouse_pos_persent - (windowWidth / 25);
    push();
    translate((windowWidth / 8) * mouse_pos_persent, -windowWidth / 55, windowWidth / 4.05);
    fill('#CC3636');
    box(windowWidth / 12.5, windowWidth / 32, windowWidth / 192);
    pop();

    push();
    fill(255);
    box(windowWidth / 3, windowWidth / 64, windowWidth / 96);
    pop();

    push();
    fill('#A5F1E9');
    translate(-windowWidth / 6 + windowWidth / 384, -windowWidth / 43, 0);
    box(windowWidth / 192, windowWidth / 32, windowWidth / 2);
    pop();

    push();
    fill('#A5F1E9');
    translate(windowWidth / 6 - windowWidth / 384, -windowWidth / 43, 0);
    box(windowWidth / 192, windowWidth / 32, windowWidth / 2);
    pop();

    push();
    fill('#A5F1E9');
    translate(0, -windowWidth / 43, -windowWidth / 4);
    box(windowWidth / 3, windowWidth / 32, windowWidth / 192);
    pop();

    push();
    fill('#FECD70');
    noStroke();
    translate(ball_x, -windowWidth / 38, ball_y);
    sphere(windowWidth / 64);
    pop();

    ball_x += dx;
    ball_y += dy;

    if (ball_x + windowWidth / 64 > windowWidth / 6 - windowWidth / 128 || ball_x - windowWidth / 64 < -windowWidth / 6 + windowWidth / 128) {
      dx = -dx;
    }

    if (ball_x + windowWidth / 64 > windowWidth / 6 - windowWidth / 128) {
      ball_x = windowWidth / 6 - windowWidth / 41;
    }

    if (ball_x - windowWidth / 64 < -windowWidth / 6 + windowWidth / 128) {
      ball_x = -windowWidth / 6 + windowWidth / 41;
    }

    if (ball_y <= -windowWidth / 5) {
      dy = -dy;
    }

    if (ball_y >= (windowWidth / 4.4) && ball_y < (windowWidth / 4)) {
      if (ball_x + windowWidth / 128 >= paddle_right && ball_x - windowWidth / 64 <= paddle_left) {
        
        dx = -dx;
        dy = -dy;
        ball_y = windowWidth / 4.05 - windowWidth / 48;
        if (dx > 0) dx += getRndInteger(1, 3);
        else dx -= getRndInteger(1, 3);
        if (dy > 0) dy += getRndInteger(1, 3);
        else dy -= getRndInteger(1, 3);
        
        
        score ++;
      }
    }
    
    if (ball_y - windowWidth / 64 > windowWidth / 4) {

      push();
      translate(-windowWidth / 4, -windowWidth / 10, -windowWidth / 1);
      fill(255);
      textFont(myFont);
      textSize(144);
      textAlign(CENTER);
      text('GAME OVER \nClick To Restart', windowWidth / 192, windowWidth / 40);
      pop();

      $('#mouse-hand').css('display', '');
      start = false;

      noLoop();
    }

    push();
    translate(windowWidth / 3, -windowWidth / 8, -windowWidth / 10);
    rotateX(HALF_PI + 5);
    fill(255);
    textFont(myFont);
    textSize(144);
    textAlign(CENTER);
    text('Score : ' + score, windowWidth / 192, windowWidth / 39);
    pop();
  } else {
    rotateX(-PI / 12);

    push();
    fill('#256D85');
    box(windowWidth / 3, windowWidth / 64, windowWidth / 2);
    pop();

    push();
    translate(0, -windowWidth / 55, windowWidth / 4.05);
    fill('#CC3636');
    box(windowWidth / 12.5, windowWidth / 32, windowWidth / 192);
    pop();

    push();
    fill(255);
    box(windowWidth / 3, windowWidth / 64, windowWidth / 96);
    pop();

    push();
    fill('#A5F1E9');
    translate(-windowWidth / 6 + windowWidth / 384, -windowWidth / 43, 0);
    box(windowWidth / 192, windowWidth / 32, windowWidth / 2);
    pop();

    push();
    fill('#A5F1E9');
    translate(windowWidth / 6 - windowWidth / 384, -windowWidth / 43, 0);
    box(windowWidth / 192, windowWidth / 32, windowWidth / 2);
    pop();

    push();
    fill('#A5F1E9');
    translate(0, -windowWidth / 43, -windowWidth / 4);
    box(windowWidth / 3, windowWidth / 32, windowWidth / 192);
    pop();

    push();
    fill('#FECD70');
    noStroke();
    translate(ball_x, -windowWidth / 39, ball_y);
    sphere(windowWidth / 64);
    pop();
    
    push();
    translate(-windowWidth / 4, -windowWidth / 21, -windowWidth / 2);
    fill(255);
    textFont(myFont);
    textSize(144);
    textAlign(CENTER);
    text('CLICK TO START', 10, windowWidth / 40);
    pop();
  }
}

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min) ) + min;
}

function mouseClicked() {
  if (!start) {
    start = true;
    $('#mouse-hand').css('display', 'none');
    if (!isLooping()) {
      ball_x = 0;
      ball_y = 0;

      dx = 3;
      dy = 3;

      score = 0;
      
      loop();
    }
  } 
}