var c = 0;
var a = 0;
var bg1;
var bg2;
var bg3;
var font1;
var grass;
var final;
var bgPos = 0;
var bgPos2 = 900;
var bgPos3 = 0;
var bgPos4 = 900;
var music;
var music2;
var trans = 255;

var vertSpeed2 = 15;
var bgY = -100;

var a = 1;
var vertSpeed;          

var playerX;           
var y = 150;

var obSpeed = -15;           
var obX;
var obY;
var obXspawn = 1;
var obWd;
var obHt;

var score = 0;
             
var obY2;             
var obX2;
var obSpeed2;
var direction = 1;

var coin_time = 0;
var gameover;

function preload() {
    bg1 = loadImage('js/Catalog/bg1.png');	
    bg2 = loadImage('js/Catalog/bg2.png');
    bg3 = loadImage('js/Catalog/bg3.png');
    grass = loadImage('js/Catalog/grass.png');	
    final = loadImage('js/Catalog/final.png');
    font1 = loadFont('js/Catalog/Typewriter.ttf');	
    music = loadSound('js/Catalog/CreepyMusic.wav');
    music2 = loadSound('js/Catalog/Heroic_Reception.mp3');
}

function setup() {
    createCanvas(windowWidth, windowHeight).parent('game-content');;
    noLoop();
	music.loop();	

    playerX = windowWidth / 15;

    obX = random(windowWidth / 1.05, windowWidth / 1.07);
    obY = random(windowHeight / 5, windowHeight / 3);
    obX2 = windowWidth / 1.2;
    obY2 = random(windowHeight / 4.6, windowHeight / 1.8);
    obWd = random(windowWidth / 20, windowWidth / 15);
    obHt = random(windowHeight / 7, windowHeight / 7);
    obSpeed2 = windowWidth / 600;
    obSpeed = -windowWidth / 150;
    vertSpeed = windowWidth / 256;
    vertSpeed2 = windowWidth / 256;
    gameover = 1;
     
    y = windowHeight / 1.8;
}

function keyPressed() {
    if (keyIsDown(88)) {
        a ++;    
    }
}

function draw() {
	noStroke();
    background(255);
    let mouse_pos = mouseY - windowHeight;
    let mouse_pos_persent = mouse_pos / windowHeight;
    y = (windowHeight / 3) * mouse_pos_persent + windowHeight / 1.7;
    
    if (c == 0) { 
        image(bg1, 0, 0, windowWidth, windowHeight);
		image(grass, 0, windowHeight - 70 - height / 5, windowWidth, 80);
		noStroke();
  	    fill(255, 50);
        ellipse(playerX, 350, windowWidth / 10 - 20, windowWidth / 10 - 20);
        fill(255, 100);
        ellipse(playerX, 350, windowWidth / 10 - 40, windowWidth / 10 - 40);
        fill(255, 150);
        ellipse(playerX, 350, windowWidth / 10 - 60, windowWidth / 10 - 60);
        fill(0, 220);	
        rect(playerX - windowWidth / 30, 350, windowWidth / 15, windowWidth / 15 + 10);
        fill(0, 180);	
        rect(playerX - windowWidth / 30, 350, windowWidth / 15, windowWidth / 15 + 20);
        fill(0, 120);	
        rect(playerX - windowWidth / 30, 350, windowWidth / 15, windowWidth / 15 + 30);
        fill(0, 80);	
        rect(playerX - windowWidth / 30, 350, windowWidth / 15, windowWidth / 15 + 40);
        fill(0, 40);	
        rect(playerX - windowWidth / 30, 350, windowWidth / 15, windowWidth / 15 + 50);
        fill(0);
        ellipse(playerX , 350, windowWidth / 15, windowWidth / 15);
        rect(playerX - windowWidth / 30, 350, windowWidth / 15, windowHeight / 10);
	
        fill(0, 200);
	    rect(0, 0, width, height);
        fill(255);
        textSize(windowHeight / 5);
    
        text('UP AND DOWN', windowWidth / 10, windowHeight / 3);
    
        textSize(windowHeight / 6);
        text('Click To Start !', windowWidth / 4.5, windowHeight / 1.4);

        fill(0);
        rect(0, windowHeight - height / 5, width, height / 5);
	} else {
        image(bg1, 0, 0, windowWidth, windowHeight);
        gameover = 0;
		
        if (bgPos <= -900) {
			bgPos = 900;
		}
		if (bgPos2 <= -900) {
			bgPos2 = 900;
		}

        image(grass, bgPos3, windowHeight - (windowHeight / 5) - 140, windowWidth, 180);
        image(grass, bgPos4, windowHeight - (windowHeight / 5) - 140, windowWidth, 180);
			
        if (bgPos3 <= -900) {
			bgPos3 = 900;
		}
		if (bgPos4 <= -900) {
			bgPos4 = 900;
		}		
	    fill(0);                                                     
        rect(0, bgY, width, height / 5);
        bgY += vertSpeed2;
	
        if (bgY >= -20) {
		    vertSpeed2 = 0;
	    }
			
	    rect(0, windowHeight - height / 5, width, height / 5);
        fill(255);
        textSize(windowHeight / 8);
        text("Score : " + Math.trunc(coin_time), 50, windowHeight / 8);

        fill(0);
        
        noStroke();
        fill(255, 50);
        ellipse(playerX, y, windowWidth / 10 - 20, windowWidth / 10 - 20);
        fill(255, 100);
        ellipse(playerX, y, windowWidth / 10 - 40, windowWidth / 10 - 40);
        fill(255, 150);
        ellipse(playerX, y, windowWidth / 10 - 60, windowWidth / 10 - 60);
        
        fill(0, 220);	
        rect(playerX - windowWidth / 30, y, windowWidth / 15, windowWidth / 15 + 10);
        fill(0, 180);	
        rect(playerX - windowWidth / 30, y, windowWidth / 15, windowWidth / 15 + 20);
        fill(0, 120);	
        rect(playerX - windowWidth / 30, y, windowWidth / 15, windowWidth / 15 + 30);
        fill(0, 80);	
        rect(playerX - windowWidth / 30, y, windowWidth / 15, windowWidth / 15 + 40);
        fill(0, 40);	
        rect(playerX - windowWidth / 30, y, windowWidth / 15, windowWidth / 15 + 50);
        
        fill(0);
        ellipse(playerX , y, windowWidth / 15, windowWidth / 15);
        rect(playerX - windowWidth / 30, y, windowWidth / 15, windowHeight / 10);

        if (obXspawn == 1) {
            if (obX <= -100) {
                obX = windowWidth / 1.1;
                obY = random(windowHeight / 5, windowHeight / 1.6);
                obWd = random(windowWidth / 20, windowWidth / 15);
                obHt = random(windowHeight / 7, windowHeight / 7);
            }
        }
  
        if (coin_time >= 301) {
            if (obX <= -80) {
                obXspawn = 0;
                obY2 += obSpeed2 * direction;
                
                if (obY2 <= windowHeight / 4.8 || obY2 >= windowHeight / 1.7) {
                    direction = -direction
                }                                   
        
                if (direction == 1) {
                    rect(obX2, obY2, obWd, obHt);
                } else {
                    rect(obX2, obY2, obWd, obHt);
                }

                if (obX2 <= -80) {
                    obX2 = windowWidth / 1.1;
                    obY2 = random(windowHeight / 4.6, windowHeight / 1.8);
                    obWd = random(windowWidth / 20, windowWidth / 15);
                    obHt = random(windowHeight / 7, windowHeight / 7);
                }                
            }
        }

        if (coin_time <= 300 || obXspawn == 1) {
            rect(obX, obY, obWd, obHt);                              
            obX += obSpeed;
        } else if(coin_time >= 301 && obXspawn == 0) {
            rect(obX2, obY2, obWd, obHt);
            obX2 += obSpeed;
        }
        
        if (obX >= playerX - windowWidth / 60 && obX <= playerX) {
            if (obY >= y - obHt - windowWidth / 30 && obY <= y + windowWidth / 17) {
                coin_time = 0;
                gameover = 1;

                fill(0, 200);
                rect(0, 0, width, height);
                fill(255);
                textSize(windowHeight / 5);

                push();
                translate(windowWidth / 5, windowHeight / 2);
                text('Game over!', 0, 0);
                pop();

                $('#mouse-hand').css('display', '');

                obX = windowWidth / 1.1;
                obY = random(windowHeight / 5, windowHeight / 1.6);

                noLoop(); 
            } 
        }
  
        if (obX2 >= playerX - windowWidth / 60 && obX2 <= playerX) {
            if (obY2 >= y - obHt - windowWidth / 30 && obY2 <= y + windowWidth / 30) {
                coin_time = 0;
                gameover = 1;

                fill(0, 200);
                rect(0, 0, width, height);
                fill(255);
                textSize(windowHeight / 5);
                    
                push();
                translate(windowWidth / 5, windowHeight / 2);
                text('Game over!!', 0, 0);
                pop();

                obX2 = windowWidth / 1.1;
                obY2 = random(windowHeight / 4.6, windowHeight / 1.8);
                
                $('#mouse-hand').css('display', '');

                noLoop(); 
            } 
        }
  
        if (Math.trunc(coin_time) == 1000) {  
            gameover = 1;
            fill(0, 200);
            rect(0, 0, width, height);
            fill(255);
            textSize(windowHeight / 5);
        
            push();
            translate(windowWidth / 3.5, windowHeight / 2);
            text('You Win!', 0, 0);
            pop();

            music.stop();
            noLoop();            
	    }
	}

    bgPos += -obSpeed2;
    bgPos2 += -obSpeed2;
    bgPos3 += obSpeed;
    bgPos4 += obSpeed;
    c ++;

    coin_time += 0.05;
}

function mousePressed() {
    $('#mouse-hand').css('display', 'none');

    if (gameover == 1) {
        coin_time = 0;
        gameover == 0;
        loop(); 
    }
}