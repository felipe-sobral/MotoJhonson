<div id="logar">
    <div class="topo-padrao">
        <div class="row align-items-center" style="width: 100%; height: 100%">
            <div class="col">
                <img src="src/img/logo_branca.svg" style="width: 10%; min-width: 200px">
            </div>
        </div>
    </div>

    <div id="login" class="container">
        <div class="card text-center">
            <div class="card-header">
                Entrar no painel
            </div>
            <div class="card-body" style="text-align: left">
                <form id="mj_login">
                    <div class="form-group">
                        <label for="mj_usuario">Usuário</label>
                        <input type="text" class="form-control" id="mj_usuario" placeholder="Insira seu usuário" required>
                    </div>
                    <div class="form-group">
                        <label for="mj_senha">Senha</label>
                        <input type="password" class="form-control" id="mj_senha" placeholder="Insira sua senha" required>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
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
                <div id="usuario">
                    <div class="form-group">
                        <label for="mj_eusuario">Usuário</label>
                        <input type="text" class="form-control" id="mj_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="mj_esenha">Senha</label>
                        <input type="password" class="form-control" id="mj_senha" required>
                    </div>
                    <div class="form-group">
                        <label for="mj_eemail">E-Mail</label>
                        <input type="email" class="form-control" id="mj_email" required>
                    </div>
                    <div class="form-group">
                        <label for="mj_etelefone">Telefone</label>
                        <input type="text" class="form-control" id="mj_etelefone" required>
                    </div>
                </div>
                <div id="menu" style="text-align: center">
                    <button class="btn btn-primary">Cadastrar-se como empresa</button>
                    <button class="btn btn-primary">Ser um MotoJhonson</button>
                </div>
                <div id="empresa">
                    <form id="mj_empresa">
                        <hr>
                        <div class="form-group">
                            <label for="mj_ecnpj">CNPJ</label>
                            <input type="text" class="form-control" id="mj_ecnpj" required>
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary">Registrar-se</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a onclick="alternar(0)">Logar</a>
            </div>
        </div>
    </div>
</div>

<script>
    /*
        fn -> 0 == login
        fn -> 1 == cadastrar-se
    */
    function alternar(fn){

        switch(fn){
            case 0:
                $("#cadastrar").hide(600);
                $("#login").show(600);
                break;

            case 1:
                $("#login").hide(600);
                $("#cadastrar").show(600);

            default:
                console.log("Error");
        }

    }

</script>