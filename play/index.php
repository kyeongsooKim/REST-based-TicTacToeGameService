
<?php
    
    if(empty($_POST)) {    // init game status with empty JSON array

     
        header('Content-Type: application/json');
        //The function header("Content-type:application/json") sends the http json header to the browser to inform him what the kind of a data he expects. we don't need this function if we added dataType: 'json' to our AJAX as Jquery will handle the data even it is sent with text/html header.
        $response = '{ "grid" : [" "," "," "," "," ","X"," "," "," "], "winner" : " "}';
        echo ($response);
    }
    else
    {


        // receive JSON data from front
        $grid = $_POST['jsonData'];


        // game going status 
        $game = false;

        // check game status from requests
        for($i=0;$i<count($grid);$i++) {
            if($grid[$i]==' ') $game=true;
        }

        //game is draw when all grid is selected and there is no winner.
        if (!$game && !isXwin($grid))
        {
            $response['grid'] = $grid;
            $response['winner'] = ' ';   
            echo json_encode($response);// send response as JSON format
            return;
        }

        if(isXwin($grid))
        {
            $response['grid'] = $grid;
            $response['winner'] = 'X';     
            echo json_encode($response);// send response as JSON format
            return;
        }
    


        //computer picks the first empty grid.

        foreach($grid as &$value ) {
            if ($value == ' ') {
                $value = 'O';
                break;
              }
          }

        $response['grid'] = $grid;

        if(isOwin($grid))
        {
           $response['winner'] = 'O';
           echo json_encode($response);// send response as JSON format
        }
        else
        {
            $response['winner'] = '';     
            echo json_encode($response);// send response as JSON format   
        }


    }

    function isXwin ($grid) {
        if( ($grid[0] == $grid[1] && $grid[1] == $grid[2] && $grid[2] == 'X') || 
            ($grid[3] == $grid[4] && $grid[4] == $grid[5] && $grid[5] == 'X') || 
            ($grid[6] == $grid[7] && $grid[7] == $grid[8] && $grid[8] == 'X') || 
            ($grid[0] == $grid[3] && $grid[3] == $grid[6] && $grid[6] == 'X') || 
            ($grid[1] == $grid[4] && $grid[4] == $grid[7] && $grid[7] == 'X') || 
            ($grid[2] == $grid[5] && $grid[5] == $grid[8] && $grid[8] == 'X') || 
            ($grid[0] == $grid[4] && $grid[4] == $grid[8] && $grid[8] == 'X') || 
            ($grid[2] == $grid[4] && $grid[4] == $grid[6] && $grid[6] == 'X') 
          )
            return true;
        else
            false;
    }

    function isOwin ($grid) {

        if( ($grid[0] == $grid[1] && $grid[1] == $grid[2] && $grid[2] == 'O') || 
            ($grid[3] == $grid[4] && $grid[4] == $grid[5] && $grid[5] == 'O') || 
            ($grid[6] == $grid[7] && $grid[7] == $grid[8] && $grid[8] == 'O') || 
            ($grid[0] == $grid[3] && $grid[3] == $grid[6] && $grid[6] == 'O') || 
            ($grid[1] == $grid[4] && $grid[4] == $grid[7] && $grid[7] == 'O') || 
            ($grid[2] == $grid[5] && $grid[5] == $grid[8] && $grid[8] == 'O') || 
            ($grid[0] == $grid[4] && $grid[4] == $grid[8] && $grid[8] == 'O') || 
            ($grid[2] == $grid[4] && $grid[4] == $grid[6] && $grid[6] == 'O')
          )
            return true;
        else
            false;
    }


?>
