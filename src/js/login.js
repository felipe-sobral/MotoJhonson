function verificar_sessao(tipo, s_tipo){
    var url;

    switch(s_tipo){
        case "EMPRESA":
            url = "mj_controller/ControllerEmpresa.php";
            break;

        default:
            url = "mj_controller/ControllerMotoboy.php";
    }

    $.post(url, {acao: "verificar_session"}, function(retorno){
        
        switch(tipo){

            case "painel":
                if(retorno != "#true#"){
                    window.location.assign("?pg=login");
                }
                break;

            case "login":
                if(retorno == "#true#"){
                    window.location.assign("?pg=painel");
                }
                break;
                
        }

    });

}

