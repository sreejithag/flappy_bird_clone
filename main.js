window.onload = function() {
	$('#signup').modal('show');
	
    var mainState = {
        preload: function() {
        	this.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
			this.scale.pageAlignHorizontally = true;
			this.scale.pageAlignVertically = true;
			game.load.image ('background', './assets/sky.jpg')
			game.paused=true;
			$("#start").click(function(){
				$('#signup').modal('hide');
				game.paused=false;
				
			});
			$("#restart").click(function(){
				$('#highscore').modal('hide');
				game.paused=false;
				
			});
            game.load.image('bird', './assets/bird.png')
            game.load.image('pipe', './assets/pipe.png');
            this.score = 0;
            this.labelScore = game.add.text(0, 0, "0", {
                font: "30px Arial Black",
                fill: "#ffffff"
            });
			
			
        },

        create: function() {

			game.add.tileSprite(0, 30, 800, 643, 'background');
          //game.stage.backgroundColor = '#71c5cf'
            game.physics.startSystem(Phaser.Physics.ARCADE);
            this.bird = game.add.sprite(100, 245, 'bird');
            game.physics.arcade.enable(this.bird);
            this.bird.body.gravity.y = 900;
            // this.bird.body.gravity.x = 5;
			
            var spaceKey = game.input.keyboard.addKey(
                Phaser.Keyboard.SPACEBAR);
            spaceKey.onDown.add(this.jump, this);
            game.input.onTap.add(this.jump2, this);

            this.pipes = game.add.group();
            this.timer = game.time.events.loop(2100, this.addRowOfPipes, this);
            this.bird.anchor.setTo(-0.2, 0.5);
            


        },

        update: function() {
            if (this.bird.y < 0 || this.bird.y > 643)
            {	
                this.restartGame();
                $("#warning").html("<p style=color:green>Don't make bird hit the ground..</p>");
            }
            game.physics.arcade.overlap(
                this.bird, this.pipes, this.restartGame, null, this);
            if (this.bird.angle < 20)
                this.bird.angle += 1;
            game.physics.arcade.overlap(
                this.bird, this.pipes, this.hitPipe, null, this);
        },
        jump: function() {
            if (this.bird.alive == false)
                return;
            this.bird.body.velocity.y = -350;
            var animation = game.add.tween(this.bird);
            animation.to({
                angle: -20
            }, 100);

            
            animation.start();
        },
		jump2: function(){if (this.bird.alive == false)
                return;
            this.bird.body.velocity.y = -350;
            var animation = game.add.tween(this.bird);
            animation.to({
                angle: -20
            }, 100);

            
            animation.start();
        },     

       
        restartGame: function() {
            
			this.name=$('#username').val();
			if(this.name==""){this.name="unknown";}
			$.post( "upload.php", { name: this.name, sc:this.score  } );
			$('#highscore').modal('show');
			$('#score').html("<b>Your Score: "+this.score+"<b>");
			$('#data').html("Your highest score will be recorded");
            game.state.start('main');
        },
        addOnePipe: function(x, y) {
           
            var pipe = game.add.sprite(x, y, 'pipe');


            
            this.pipes.add(pipe);

            
            game.physics.arcade.enable(pipe);

         
            pipe.body.velocity.x = -200;

         
            pipe.checkWorldBounds = true;
            pipe.outOfBoundsKill = true;
        },
        addRowOfPipes: function() {
            
            var hole = Math.floor(Math.random() * 5) + 1;
            for (var i = 0; i < 12; i++)
                if (i != hole && i != hole + 1)
                    this.addOnePipe(590, i * 60 + 25);
            this.score += 1;
            this.labelScore.text = this.score;
        },
        hitPipe: function() {
           
            if (this.bird.alive == false)
               {$("#warning").html(""); return;}

          
            this.bird.alive = false;
            $("#warning").html("");
           
            game.time.events.remove(this.timer);

           
            this.pipes.forEach(function(p) {
                p.body.velocity.x = 56;
            }, this);


        },
    };


    
    var game = new Phaser.Game(800, 643);

    
    game.state.add('main', mainState);

   
    game.state.start('main');
    
}