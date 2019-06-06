/**
 * 
 * Scripts
 * MOTOJHONSON
 * View --> login.php
 * 
 * COMECO 
 * 
 */


// true -> motojhonson
// false -> empresa
function required(bool){
    $("#mj_registro_m_nome").prop("required", bool);
    $("#mj_registro_m_cpf").prop("required", bool);
    $("#mj_registro_m_veiculo").prop("required", bool);
    required_empresa(!bool);
}

function required_empresa(bool){
    $("#mj_registro_e_cnpj").prop("required", bool);
    $("#mj_registro_e_nome").prop("required", bool);
    $("#mj_registro_e_cep").prop("required", bool);
    $("#mj_registro_e_municipio").prop("required", bool);
    $("#mj_registro_e_uf").prop("required", bool);
    $("#mj_registro_e_bairro").prop("required", bool);
    $("#mj_registro_e_logradouro").prop("required", bool);
    $("#mj_registro_e_numero").prop("required", bool);
}

function alternar(fn){

    switch(fn){
        // ABRIR FORMULARIO DE LOGIN
        case 0:
            $("#cadastrar").hide(600);
            $("#login").show(600);
            break;
            
        // ABRIR FORMULARIO DE CADASTRO
        case 1:
            $("#login").hide(600);
            $("#cadastrar").show(600);
            break;

        // ABRIR FORMULARIO EMPRESA
        case 2:
            required(false);
            $("#motojhonson").hide(600);
            $("#empresa").show(600);
            tipo_cadastro = "Empresa";
            break;

        // ABRIR FORMULÁRIO MOTOJHONSON
        case 3:
            required(true); 
            $("#empresa").hide(600);
            $("#motojhonson").show(600);
            tipo_cadastro = "Motojhonson";
            break;

        default:
            console.log("Error");
    }

}

function verificar_cnpj(){
    
    var cnpj = $("#mj_registro_e_cnpj").val();

    $.ajax({
        url: "https://www.receitaws.com.br/v1/cnpj/"+cnpj,
        method: "GET",
        dataType: "jsonp",
        complete: function(retorno){
                
            json = retorno.responseJSON;
            if(json.status == "OK") {

                $("#mj_registro_e_nome").val(json.fantasia);
                $("#mj_registro_e_uf").val(json.uf);
                $("#mj_registro_e_bairro").val(json.bairro);
                $("#mj_registro_e_logradouro").val(json.logradouro);
                $("#mj_registro_e_numero").val(json.numero);
                $("#mj_registro_e_cep").val(json.cep);
                $("#mj_registro_e_municipio").val(json.municipio);
                    
                $("#empresa-pt2").show(600);
            } else {
                alert("CNPJ INVÁLIDO");
            }
        }
    });

}

function registrar_motojhonson(usuario){

    var motojhonson = {
        usuario: $("#mj_registro_usuario").val(),
        cpf: $("#mj_registro_m_cpf").val(),
        veiculo: $("#mj_registro_m_veiculo").val()
    }

    $.post("mj_controller/ControllerMotoboy.php", {
        usuario: usuario,
        motoboy: motojhonson,
        acao: "inserir_motoboy",
    }).done(function(retorno){
        console.log(retorno);
    });
}


function registrar_empresa(usuario){
    var empresa = {
        usuario: $("#mj_registro_usuario").val(),
        cnpj: $("#mj_registro_e_cnpj").val()
    }

    var endereco = {
        usuario: $("#mj_registro_usuario").val(),
        nome: $("#mj_registro_e_nome").val(),
        cep: $("#mj_registro_e_cep").val(),
        municipio: $("#mj_registro_e_municipio").val(),
        uf: $("#mj_registro_e_uf").val(),
        bairro: $("#mj_registro_e_bairro").val(),
        logradouro: $("#mj_registro_e_logradouro").val(),
        numero: $("#mj_registro_e_numero").val()
    }

    $.post("mj_controller/ControllerEmpresa.php", {
        usuario: usuario,
        empresa: empresa,
        endereco: endereco,
        acao: "inserir_empresa"
    }).done(function(retorno){
        console.log(retorno);
    });
}

$("#mj_registrar").submit(function() {

    var usuario = {
        usuario: $("#mj_registro_usuario").val(),
        senha: $("#mj_registro_senha").val(),
        email: $("#mj_registro_email").val(),
        telefone: $("#mj_registro_telefone").val()
    }

    if(tipo_cadastro === "Empresa"){
        Object.assign(usuario, {nome: $("#mj_registro_e_nome").val()});
        registrar_empresa(usuario);
    } else if(tipo_cadastro == "Motojhonson"){
        Object.assign(usuario, {nome: $("#mj_registro_m_nome").val()});
        registrar_motojhonson(usuario);
    }    

    return false;
});

function cnpj_cpf(codigo){
    
    switch(codigo.length){

        case 11:
            return "CPF";

        case 14:
            return "CNPJ";

        default:
            return false;

    }

}

$("#mj_login").submit(function(){

    var url = "mj_controller/";
    var tipo = cnpj_cpf($("#mj_cpfcnpj").val());
    var login;

    if(tipo == "CPF"){
        url = url+"ControllerMotoboy.php";
        login = "logar_motoboy";
    } else if(tipo == "CNPJ"){
        url = url+"ControllerEmpresa.php";
        login = "logar_empresa";
    }    

    $.post(url, {
        registro: $("#mj_cpfcnpj").val(),
        senha: $("#mj_senha").val(),
        acao: login
    }).done(function(retorno){
            
        if(retorno == "#true#"){
            window.location.assign("?pg=painel");
        }

    })

    return false;
});

function ficar_disponivel(){

    if(disponivel_g == 1){
        disponivel_g = 0;
    } else {
        disponivel_g = 1;
    }

    $.post("mj_controller/ControllerMotoboy.php", {disponivel: disponivel_g, acao: "ficar_disponivel_session"}).done(function(retorno){

        if(retorno == "#true#"){
            // disponivel = !disponivel
            if(disponivel_g){
                $("#disponivel-icon").html("<span id='disponivel_true' class='fas fa-check-circle' style='color: #48e80d'></span>");
            } else {
                $("#disponivel-icon").html("<span id='disponivel_false' class='fas fa-times-circle' style='color: #e84b0c'></span>");
            }

        } else {
            alert("error");
        }

    });

}

function gerar_tabela(colunas, linhas){
    var c = "";
    var l = "";
    var html;

    colunas.forEach(function(coluna){

        c += "<th scope='col'>"+coluna+"</th>";

    });

    linhas.forEach(function(motoboy){
        var atributos = "";

        motoboy.forEach(function(atributo){
            atributos += "<td>"+atributo+"</td>";
        });


        l += "<tr>"+atributos+"</tr>";

    });
    
    html =  "<table class='table table-striped'>"+
                "<thead><tr>"+ 
                    c
                +"</tr></thead>"+
                "<tbody>"+
                    l
                +"</tbody>"+
            "</table>";

    return html;
}


function buscar_entregadores(){

    $.post("mj_controller/ControllerMotoboy.php", {acao: "buscar_entregadores"}, function(retorno){

        var dados = JSON.parse(retorno);
        var array = [];

        dados.forEach(function(motoboy){
            array.push([motoboy[1], motoboy[2], "<button onclick=\"proposta('"+motoboy[1]+"')\" class='btn btn-light'><i class='fas fa-paper-plane'></i></button>"]);
        });


        $("#entregadores-conteudo").html(gerar_tabela(["Usuario", "Avaliação", "Contratar"], array));
        $("#entregadores-titulo").html("Entregadores disponíveis");

    });

}

function montar_proposta(id_motoboy){

    $.post("mj_controller/ControllerProposta.php", {acao: "montar_proposta", motoboy: id_motoboy}, function(retorno){
        
        var dados = JSON.parse(retorno);
        var entregador = dados[0];
        var empresa = dados[1][0];
        var enderecos = "";

        dados[1][1].forEach(function(endereco){
            enderecos += `<option value="${endereco.id}">${endereco.municipio}, ${endereco.bairro}, ${endereco.logradouro}, ${endereco.numero}</option>`;
        });


        $("#entregadores-conteudo").html(
            `<div id="proposta-final">
                <div class="card" style="text-align: left">
                    <div class="card-header">
                        Motoboy
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-sm-6">
                                <p>Usuario: ${entregador.usuario}</p>
                                <p>Nome: ${entregador.nome}</p>
                                <p>Telefone: ${entregador.telefone}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>E-Mail: ${entregador.email}</p>
                                <p>CPF: ${entregador.cpf}</p>
                                <p>Veículo: ${entregador.veiculo}</p>
                            </div>

                        </div>

                    </div>
                </div>
                <br>
                <div class="card" style="text-align: left">
                    <div class="card-header">
                        Empresa
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-sm-6">
                                <p>Usuario: ${empresa.usuario}</p>
                                <p>Nome: ${empresa.nome}</p>
                                <p>Telefone: ${empresa.telefone}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>E-Mail: ${empresa.email}</p>
                                <p>CNPJ: ${empresa.cnpj}</p>
                                <p>Endereco: <select id="enderecos">${enderecos}</select></p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="text-align: left">
                    <div class="card-header">
                        Valor da proposta
                    </div>
                    <div class="card-body">


                        <form class="row" id="fazer-proposta">
                            <input style="display: none" id="motoboy-usuario" value="${entregador.usuario}"></input>
                            <div class="form-group col-sm-6">
                                <label for="valor-proposta">Valor em R$</label>
                                <input type="number" step=0.1 min=0 class="form-control" id="valor-proposta" value="${entregador.valor_hora}" placeholder="Digite o valor aqui!">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="valor-tipo-proposta">Tipo</label>
                                <select class="form-control" id="valor-tipo-proposta" onchange="troca_valores()">
                                    <option value="0" select>P/ Hora</option>
                                    <option value="1">P/ Entrega</option>
                                </select>
                            </div>
                            <div class="form-group col-12" style="text-align: center">
                                <button type="submit" class="btn btn-primary">Enviar proposta</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <script>
            
                function troca_valores(){
                    var t = $("#valor-tipo-proposta option:selected").val();

                    if(t == 0){
                        $("#valor-proposta").val('${entregador.valor_hora}');
                    } else if(t == 1){
                        $("#valor-proposta").val('${entregador.valor_fixo}');
                    }
                }

                $("#fazer-proposta").submit(function(){

                    var endereco = $("#enderecos option:selected").val();
                    var valor = $("#valor-proposta").val();
                    var valor_tipo = $("#valor-tipo-proposta option:selected").val();
                    var motoboy = $("#motoboy-usuario").val();
                
                    if(valor_tipo == 0){
                        valor_tipo = "HORA";
                    } else {
                        valor_tipo = "FIXO";
                    }
                
                
                    $.post("mj_controller/ControllerProposta.php", {acao: "fazer_proposta", motoboy: motoboy, endereco: endereco, valor: valor, valor_tipo: valor_tipo}, function(retorno){
                
                        if(retorno == "#true#"){
                            buscar_propostas("*"); 
                            alert("PROPOSTA FEITA!");
                            $('#entregadores').modal('hide');
                        } else {
                            alert("ERRO =(");
                        }
                
                    });
                
                    return false;
                });

            </script>

            `
        );

    });

}

function proposta(id){
    $("#entregadores-titulo").html("Proposta");
    montar_proposta(id);
}