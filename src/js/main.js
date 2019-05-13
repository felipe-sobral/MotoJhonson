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

                $("#mj_registro_nome").val(json.fantasia);
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
        acao: "inserir_UM",
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
        acao: "inserir_UEE"
    }).done(function(retorno){
        console.log(retorno);
    });
}

$("#mj_registrar").submit(function() {

    var usuario = {
        usuario: $("#mj_registro_usuario").val(),
        senha: $("#mj_registro_senha").val(),
        email: $("#mj_registro_email").val(),
        telefone: $("#mj_registro_telefone").val(),
        nome: $("#mj_registro_nome").val()
    }

    if(tipo_cadastro === "Empresa"){
        registrar_empresa(usuario);
    } else if(tipo_cadastro == "Motojhonson"){
        registrar_motojhonson(usuario);
    }    

    return false;
});