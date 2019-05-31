<div class="container" style="margin-top: 2%; margin-bottom: 5%">

    <div class="card text-center">
        <div class="card-header">
            {Frase do dia}
        </div>
        <div class="card-body">
            <div class="card" id="propostas">
            
                <div class="card-body">
                    <h5 class="card-title">Últimas propostas</h5>
                    <p class="card-text">
                    
                    </p>

                </div>
                <div class="card-footer text-muted">

                    <div class="row">
                    
                        <div class="col-6 align-self-center">
                            Status: 
                            <a id="disponivel-icon">
                                <?php

                                    if($login["disponivel"]){
                                        echo "<span class='fas fa-check-circle' style='color: #48e80d'></span>";
                                    } else {
                                        echo "<span class='fas fa-times-circle' style='color: #e84b0c'></span>";
                                    }

                                ?>
                            </a>
                            
                        </div>
                        <div class="col-6 align-self-center" style="text-align: right">
                            <button id="btn-ficardisponivel" class="btn btn-success">Ficar disponível</button>
                        </div>

                    </div>
                    
                </div>

            </div>
            <hr>
            <div class="card" id="informacoesdaconta">
                <div class="card-body">
                    <h5 class="card-title">Informações pessoais</h5>
                    <p class="card-text">
                        
                        <?php
                            
                            echo "<strong>Nome: </strong>{$login['nome']}<br>";
                            echo "<strong>Usuário: </strong>{$login['usuario']}<br>";
                            echo "<strong>Telefone: </strong>{$login['telefone']}<br>";
                            echo "<strong>CPF: </strong>{$login['cpf']}<br>";
                            echo "<strong>E-Mail: </strong>{$login['email']}<br>";
                            echo "<strong>Veículo: </strong>{$login['veiculo']}<br>";
                            echo "<strong>Saldo: </strong>R$ {$login['carteira']}<br>";
                            

                        ?>

                    </p>
                    
                </div>
                <div class="card-footer text-muted" style="text-align: right">

                    <button class="btn btn-light"><span class="fas fa-user-edit"></span></button>

                </div>
            </div>

        </div>
        <div class="card-footer text-muted">
            {data}
        </div>
    </div>

</div>