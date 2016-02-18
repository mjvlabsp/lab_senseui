<?php
//echo json_encode($json);
?>


	
    <div id="mapa">
        <span class="b11 mesa1"></span>
        <span class="b12 mesa2"></span>
        <span class="b13 mesa3"></span>
        <span class="b14 mesa4"></span>
        <span class="b21 privada1"></span>
        <span class="b22 pia1"></span>
        <span class="b23 batente1"></span>
        <span class="b31 privada2"></span>
        <span class="b32 pia2"></span>
        <span class="b33 batente2"></span>
        <span class="b41 porta1"></span>
        <span class="b42 porta2"></span>
        <span class="b51 estante1"></span>
        <span class="b52 estante2"></span>
        <span class="b53 estante3"></span>
        <span class="b61 armario1"></span>
        <span class="b62 armario2"></span>
        <span class="b63 armario3"></span>
        <span class="b71 centro1"></span>
        <span class="b72 centro2"></span>
        <span class="b81 impressora"></span>
        
        
    </div>
    
    
    <script type="text/javascript">
        j = 0;
        function getPoints() {
            $.ajax({
                url: "/data/real_time_json",
                context: document.body,
                dataType: "JSON",
                cache: false
            }).done(function(response) {
                $('.b11, .b12, .b13, .b14, .b21, .b22, .b23, .b31, .b32, .b33, .b41, .b42, .b51, .b52, .b53, .b61, .b62, .b63, .b71, .b72, .b81').hide();
                //console.log(response);
                $.each(response, function(data){
                    //console.log(data);
                    //console.log(response[data][2]);
                    var d = new Date();
                    var n = d.getTime();
                    n = n/1000;
                    n = Math.floor(n)
                    //console.log(response[data]);
                    
                    
                    showPoint(response[data]);
                    j++;
                    if (j > 100) {
                        $('.b11,.b12,.b13,.b14').css('background-color','black');
                    }
                    
                });
            });
        }
        
        function showPoint(data) {
            var d = new Date();
                    var n = d.getTime();
                    n = n/1000;
                    n = Math.floor(n);
                
            var pirtime = 2000;
            var ultratime = 800;
            if (data[0] == "Mesa 1" && n - data[2] < pirtime && data[1] == 1) {
                $('.b11').show();
            }
            if (data[0] == "Mesa 2" && n - data[2] < pirtime && data[1] == 1) {
                $('.b12').show();
            }
            if (data[0] == "Mesa 3" && n - data[2] < pirtime && data[1] == 1) {
                $('.b13').show();
            }
            if (data[0] == "Mesa 4" && n - data[2] < pirtime && data[1] == 1) {
                $('.b14').show();
            }
            if (data[0] == "Privada 1" && n - data[2] < ultratime) {
                $('.b21').show();
            }
            
            if (data[0] == "Pia 1" && n - data[2] < ultratime) {
                $('.b22').show();
            }
            
            if (data[0] == "Batente 1" && n - data[2] < ultratime) {
                $('.b23').show();
            }
            
            if (data[0] == "Privada 2" && n - data[2] < ultratime) {
                $('.b31').show();
            }
            
            if (data[0] == "Pia 2" && n - data[2] < ultratime) {
                $('.b32').show();
            }
            
            if (data[0] == "Batente 2" && n - data[2] < ultratime) {
                $('.b33').show();
            }
            
            if (data[0] == "Porta 1" && n - data[2] < ultratime) {
                $('.b41').show();
            }
            
            if (data[0] == "Porta 2" && n - data[2] < ultratime) {
                $('.b42').show();
            }
            
            if (data[0] == "Estante 1" && n - data[2] < ultratime) {
                $('.b51').show();
            }
            
            if (data[0] == "Estante 2" && n - data[2] < ultratime) {
                $('.b52').show();
            }
            
            if (data[0] == "Armario 1" && n - data[2] < ultratime) {
                $('.b61').show();
            }
            
            if (data[0] == "Armario 2" && n - data[2] < ultratime) {
                $('.b62').show();
            }
            
            if (data[0] == "Armario 3" && n - data[2] < ultratime) {
                $('.b63').show();
            }
            
            if (data[0] == "Centro 1" && n - data[2] < ultratime) {
                $('.b71').show();
            }
            
            if (data[0] == "Centro 2" && n - data[2] < ultratime) {
                $('.b72').show();
            }
            
            if (data[0] == "Impressora" && n - data[2] < ultratime) {
                $('.b81').show();
            }
            
            //console.log(n - data[2]);
            console.log(data[1]);
            //console.log(data[0]);
        }
        
        setInterval(getPoints, 30000);
        
    </script>
