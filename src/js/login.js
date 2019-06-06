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

function deslogar(){
    $.post("mj_controller/ControllerUsuario.php", {acao: "deslogar"}, function(retorno){

        if(retorno == "#true#"){
            window.location.assign("?pg=painel");
        }

    });
}

function buscar_propostas(situacao){

    $.post("mj_controller/ControllerProposta.php", {acao: "listar_propostas", situacao: situacao}, function(retorno){

        var objeto = JSON.parse(retorno);
        var propostas = "";

        objeto.forEach(function(proposta){
            propostas += `<tr>
                            <td scope="row">${proposta.id}</td>
                            <td>${proposta.MOTOBOYS_usuario}</td>
                            <td>${proposta.EMPRESAS_usuario}</td>
                            <td>${proposta.situacao}</td>
                            <td style="text-align: center">
                            
                                <button class='btn btn-light' onclick="abrir_proposta(${proposta.id})">
                                        <i class="fas fa-info-circle"></i>
                                </button>
                                
                            </td>
                          </tr>`;
        });

        $("#tabela-propostas").html(`<table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Motoboy</th>
                                                <th scope="col">Empresa</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" style="text-align: center">Detalhes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${propostas}
                                        </tbody>

                                    </table>`);

        

    });

}

