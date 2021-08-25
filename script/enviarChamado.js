$(function(){
    $("button.enviar").on("click", function(){
        var idUsuario = $(this).attr("idUsuario");

        $.ajax({
            url: "acoes/enviarChamado.php",
            type: "POST",
            data: {
                id: idUsuario
            },

            success: function(retorno){
                retorno = JSON.parse(retorno);
                
                if(retorno["erro"]){
                    alert["erro"];
                } else {
                    window.location = window.location.href;
                }
            },
            error: function(){
                alert("erro");
            }
        });
    });
});