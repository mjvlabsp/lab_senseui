<span id="value">X</span><br/>
<span id="time">Tempo</span>
<script type="text/javascript">

function getData(args) {
    
    var id = location.pathname.split('/')[4]; 
    $.ajax({
        url: "http://applejuice.mjvmobile.com.br/senseui/data/calibration_ajax/"+id,
        context: document.body,
        dataType: "JSON",
        cache: false
    }).done(function(response) {
        //console.log(response);
        $.each(response, function(data){

            $.each(response[data], function(chave,dados) {
                console.log(chave); 
                console.log(dados);
                if (chave == "value") {
                    $('#value').text(dados);
                }
                if (chave == "created") {
                    $('#time').text(dados);
                }
                
            });
        
        });
    });

}
    
setInterval(getData, 500);
</script>