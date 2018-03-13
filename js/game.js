const GRID_NUM = 9;

for(var i=1;i<=GRID_NUM;i++) {
    document.write("<div class='card card"+i+"' data-status=' '></div>");
}
document.write("<h1 class='gameover'></h1>");
game = true;

$('.card').click(function() {
    if(!game || $(this).hasClass('mycard') || $(this).hasClass('comcard')) return;
    $(this).addClass('mycard');
    $(this).attr('data-status', 'X');
   
  
    $data = new Array();
    for(var i=1;i<=GRID_NUM;i++) {        
        $data.push($('.card:eq('+(i-1)+')').attr('data-status'));
    }

    $.ajax({
        type : 'POST',
        url : './play/index.php',
        data : {
            'jsonData' : $data
        },
        datatype : 'json',
        success : function ($response)
        {
            $data = JSON.parse($response);
            console.log($data);

            for(i=0;i<9;i++)
            {
                if($data.grid[i] == 'O' && !$('.card:eq('+i+')').hasClass('comcard'))
                {
                    $('.card:eq('+i+')').addClass('comcard').attr('data-status', 'O');
                    break;
                }
            }

            if($data.winner!='') {
                if($data.winner==' ')
                    $('.gameover').html('Draw').show();
                else {
                    if($data.winner=='X')
                        $('.gameover').html('Winner : You').show();
                    else
                        $('.gameover').html('Winner : Com').show();
                }
                game = false;
            }
        }, false : function(e) {
            alert('failed');
        }
    });
});