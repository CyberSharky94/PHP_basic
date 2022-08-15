<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConvoQS Ping Monitor</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <style>
        .uplink {
            background-color: greenyellow;
        }

        .downlink {
            background-color: ;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Ping Monitor</h3>
        <form action="" onsubmit="return false;">
        <div class="form-group">
                <label for="">Enter IP Address</label>
                <input type="text" name="ipaddress" id="ipaddress">
                <button class="btn btn-info" type="button" id="btn_add">Add</button>
        </div>
        </form>
        <br>
        <button type="button" class="btn btn-success" id="btn_start_timer">START TIMER</button> &nbsp; <button type="button" class="btn btn-warning" id="btn_stop_timer" disabled>STOP TIMER</button> &nbsp; PING STATUS: <b><span id="timer_status">STOP</span></b>

        <hr>
        <h4>Ping Results</h4>

        <table class="table table-bordered table-hover">
            <thead>
                <th>#</th>
                <th>IP Address</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody class="ping_result">
                <!-- <tr class="active table-success" style="">
                    <td class="act_num">1</td>
                    <td class="act_ip">192.168.1.1</td>
                    <td class="act_status">UP</td>
                    <td>
                        <button type="button" class="btn_act_remove">REMOVE</button>
                    </td>
                </tr>

                <tr class="active table-danger" style="">
                    <td class="act_num">2</td>
                    <td class="act_ip">192.168.1.1</td>
                    <td class="act_status">DOWN</td>
                    <td>
                        <button type="button" class="btn_act_remove">REMOVE</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {

            $('#btn_add').on('click', function(){
                add_ip();
                $('#ipaddress').val('');
            });

            $('body').on('click', '.btn_act_remove', function(){
                console.log($('.btn_act_remove').index($(this)));
                var index = $('.btn_act_remove').index($(this));

                remove_ip(index);
            });

            $('#btn_start_timer').on('click', function(){
                start_timer();
            });

            $('#btn_stop_timer').on('click', function(){
                stop_timer();
            });

            $('#ipaddress').on('keypress', function(e) {
                if(e.which == 13)
                {
                    $('#btn_add').trigger('click');
                }
            });
        });

        function check_ping()
        {
            var count = $('.act_ip').length;

            for(let i = 0; i < count; i++)
            {
                ip = $('.act_ip:eq('+i+')').html();

                check_one_ping(ip).then(function(msg) {
                    selector = $('.active:eq('+i+')');

                    if(msg == 'success')
                    {
                        if(selector.hasClass('table-danger') || selector.hasClass('table-warning'))
                        {
                            selector.removeClass('table-danger');
                            selector.removeClass('table-warning');
                            selector.addClass('table-success');
                            $('.act_status:eq('+i+')').html('UP');
                        }
                    } else {
                        if(selector.hasClass('table-success') || selector.hasClass('table-warning'))
                        {
                            selector.removeClass('table-success');
                            selector.removeClass('table-warning');
                            selector.addClass('table-danger');
                            $('.act_status:eq('+i+')').html('DOWN');
                        }
                    }
                });
            }
        }

        function check_one_ping(ip)
        {
            var xhr = $.ajax({
                method: "POST",
                url: "engine.php",
                dataType: 'json',
                data: { "ip": ip }
            });
            
            xhr.done(function( msg ) {
                console.log(msg);
                if(msg == 'success')
                {
                    // console.log(true);
                } else {
                    // console.log(false);
                }
            });

            return xhr;
        }

        function add_ip()
        {
            var new_count = $('.act_ip').length + 1;

            var data = '<tr class="active table-warning" style=""><td class="act_num">'+new_count+'</td><td class="act_ip">'+$('#ipaddress').val()+'</td><td class="act_status">CHECKING...</td><td><button type="button" class="btn_act_remove">REMOVE</button></td></tr>';
                $('.ping_result').append(data);

            // check_one_ping($('#ipaddress').val()).then(function(msg){
            //     if(msg == 'success')
            //     {
            //         var data = '<tr class="active table-success" style=""><td class="act_num">'+new_count+'</td><td class="act_ip">'+$('#ipaddress').val()+'</td><td class="act_status">UP</td><td><button type="button" class="btn_act_remove">REMOVE</button></td></tr>';
            //     $('.ping_result').append(data);
            //     } else {
            //         var data = '<tr class="active table-danger" style=""><td class="act_num">'+new_count+'</td><td class="act_ip">'+$('#ipaddress').val()+'</td><td class="act_status">DOWN</td><td><button type="button" class="btn_act_remove">REMOVE</button></td></tr>';
            //     $('.ping_result').append(data);
            //     }
            // });
        }

        function remove_ip(id)
        {
            $('.active:eq('+id+')').remove();

            // Reshufle number
            var count = $('.act_num').length;

            for(let i = 0; i < count; i++)
            {
                $('.act_num:eq('+i+')').html(i+1);
            }
        }

        function start_timer()
        {
            check_ping();
            let timerId = setInterval(() => check_ping(), 1000);
            $('#timer_status').html('RUNNING');

            $('#btn_start_timer').prop('disabled', true);
            $('#btn_stop_timer').prop('disabled', false);
        }

        function stop_timer()
        {
            clearInterval();
            $('#timer_status').html('STOP');

            $('#btn_start_timer').prop('disabled', false);
            $('#btn_stop_timer').prop('disabled', true);
        }

    </script>
</body>
</html>