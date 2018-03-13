<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TicTacToe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="js/jquery-3.2.1.js"></script>
</head>
<body>



    <?php if(!empty($_POST["name"])):?>
        <center><h1>Hello <?php echo $_POST['name'].", "; echo date('F jS Y');?></center>
        <div class="gamecontainer"><script src="js/game.js"></script></div>
    <?php else:?>
        <div class="content">
            
            <div class="innercontent" >
                <h1>TicTacToe Game</h1>
                <div class ="formdiv">
                    <form id="form1" method="post" action="#" >
                        <input type="text" name="name" placeholder="Player Name" autocomplete ="off" required>
                        <div>
                            <button type="submit" class="play">play</button>
                        </div>
                    </form>
                </div>
            </div>

            <script src="js/createUser.js"></script>

    <?php endif;?>
</body>
</html>