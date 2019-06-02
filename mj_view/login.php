<?php

    isset($_SESSION) ? : session_start();
    echo "<script src='src/js/login.js'></script>";
    $tipo = isset($_POST["mj_login"]["tipo"]) ? $_POST["mj_login"]["tipo"] : "default";
    echo "<script>verificar_sessao('login', '$tipo');</script>";
?>




<div id="logar">
    <div class="topo-padrao">
        <div class="row align-items-center" style="width: 100%; height: 100%">
            <div class="col">
                <a href="?pg=index"><img src="src/img/logo_branca.svg" style="width: 10%; min-width: 200px"></a>
            </div>
        </div>
    </div>

    <div id="login" class="container">
        <div class="card text-center">
            <div class="card-header">
                Entrar no painel
            </div>
            <div class="card-body" style="text-align: left">

                <!-- FORMULÁRIO LOGIN -->
                <form id="mj_login">
                    <div class="form-group">
                        <label for="mj_cpfcnpj">CPF/CNPJ</label>
                        <input type="text" class="form-control" id="mj_cpfcnpj" placeholder="Insira CPF/CNPJ para entrar" required>
                    </div>
                    <div class="form-group">
                        <label for="mj_senha">Senha</label>
                        <input type="password" class="form-control" id="mj_senha" placeholder="Insira sua senha" required>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
                <!-- FIM FORMULÁRIO LOGIN -->

            </div>
            <div class="card-footer text-muted">
                <a onclick="alternar(1)">Cadastrar-se</a>
            </div>
        </div>
    </div>

    <div id="cadastrar" class="container" style="display: none">
        <div class="card text-center">
            <div class="card-header">
                Fazer cadastro
            </div>
            <div class="card-body" style="text-align: left">
                <!-- usuario, nome, telefone, senha, email-->
                <form id="mj_registrar">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="mj_registro_usuario">Usuário</label>
                            <input type="text" class="form-control" id="mj_registro_usuario" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="mj_registro_senha">Senha</label>
                            <input type="password" class="form-control" id="mj_registro_senha" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="mj_registro_email">E-Mail</label>
                            <input type="email" class="form-control" id="mj_registro_email" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="mj_registro_telefone">Telefone</label>
                            <input type="text" class="form-control" id="mj_registro_telefone" required>
                        </div>
                    </div>
                    <div style="text-align: center; color: #fff">
                        <div class="row">
                            <div class="col-sm-6">
                                <a onclick="alternar(2)" class="btn btn-primary btn-block">Como <strong>Empresa</strong></a><br>
                            </div>
                            <div onclick="alternar(3)" class="col-sm-6">
                                <a class="btn btn-primary btn-block">Como <strong>MotoJhonson</strong></a>
                            </div>
                        </div>
                    </div>

                    <!-- FORMULÁRIO EMPRESA -->
                    <div id="empresa" style="display: none">
                        <hr>
                        <div class="form-group">
                            <label for="mj_registro_cnpj">CNPJ</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><a onclick="verificar_cnpj()">Verificar</a></div>
                                </div>
                                <input type="text" class="form-control" id="mj_registro_e_cnpj">
                            </div>
                        </div>
                        <div id="empresa-pt2" style="display:none">
                            <div class="form-group">
                                <label for="mj_registro_e_nome">Nome fantasia</label>
                                <input type="text" class="form-control" id="mj_registro_e_nome">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="mj_registro_e_cep">CEP</label>
                                    <input type="text" class="form-control" id="mj_registro_e_cep">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="mj_registro_e_municipio">Município</label>
                                    <input type="text" class="form-control" id="mj_registro_e_municipio">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="mj_registro_e_uf">UF</label>
                                    <input type="text" class="form-control" id="mj_registro_e_uf">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="mj_registro_e_bairro">Bairro</label>
                                    <input type="text" class="form-control" id="mj_registro_e_bairro">
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="mj_registro_e_logradouro">Logradouro</label>
                                    <input type="text" class="form-control" id="mj_registro_e_logradouro">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="mj_registro_e_numero">N°</label>
                                    <input type="text" class="form-control" id="mj_registro_e_numero">
                                </div>
                            </div>
                            <div class="form-group" style="text-align: center">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                    <!-- FIM FORMULÁRIO EMPRESA --> 
                    <div id="motojhonson" style="display:none">
                        <hr>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="mj_registro_m_cpf">CPF</label>
                                <input type="text" class="form-control" id="mj_registro_m_cpf">
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="mj_registro_m_nome">Nome completo</label>
                                <input type="text" class="form-control" id="mj_registro_m_nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mj_registro_m_veiculo">Veículo</label>
                            <input type="text" class="form-control" id="mj_registro_m_veiculo" placeholder="Ex: Honda CG 125 Fan">
                        </div>
                        <div class="form-group" style="text-align: center">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>       
                    </div>
                    
                </form>

            </div>
            <div class="card-footer text-muted">
                <a onclick="alternar(0)">Logar</a>
            </div>
        </div>
    </div>
</div>

<script>

    var tipo_cadastro;
    
</script>