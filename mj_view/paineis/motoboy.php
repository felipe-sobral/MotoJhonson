<div class="container" style="margin-top: 2%; margin-bottom: 5%">

    <div class="card text-center">
        <div class="card-header">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
        </div>
        <div class="card-body">
            <div class="card" id="propostas">
            
                <div class="card-body">
                    <h5 class="card-title">Últimas propostas</h5>
                    
                    <div id="tabela-propostas"></div>
                    <script>buscar_propostas("*"); </script>

                </div>
                <div class="card-footer text-muted">

                    <div class="row">
                    
                        <div class="col-6 align-self-center">
                            Status: 
                            <a id="disponivel-icon">
                                <?php
                                    echo "<script>var disponivel_g = {$login["disponivel"]}</script>";
                                    if($login["disponivel"]){
                                        echo "<span id='disponivel_true' class='fas fa-check-circle' style='color: #48e80d'></span>";
                                    } else {
                                        echo "<span id='disponivel_false' class='fas fa-times-circle' style='color: #e84b0c'></span>";
                                    }

                                ?>
                            </a>
                            
                        </div>
                        <div class="col-6 align-self-center" style="text-align: right">
                            <button id="btn-ficardisponivel" class="btn btn-success" onclick="ficar_disponivel()">Ficar disponível</button>
                        </div>

                    </div>
                    
                </div>

            </div>
            <hr>
            <div class="card" id="informacoesdaconta">
                <div class="card-body">
                    
                    
                    <div class="row">
                    
                        <div class="col">
                            <h5 class="card-title">Informações pessoais</h5>
                        </div>
                        <div class="col" style="text-align: right">

                            <button class="btn btn-light"><span class="fas fa-user-edit"></span></button>

                        </div>
                                    
                    </div>

                    <p class="card-text">
                        
                       
                        <div class="row">
                            <div class="col-sm-4">
                                <?php

                                    echo "<strong>Nome: </strong>{$login['nome']}<br>";
                                    echo "<strong>Usuário: </strong>{$login['usuario']}<br>";

                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?php

                                    echo "<strong>Telefone: </strong>{$login['telefone']}<br>";
                                    echo "<strong id='cpf'>CPF: </strong>{$login['cpf']}<br>";

                                    
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?php

                                    echo "<strong>E-Mail: </strong>{$login['email']}<br>";
                                    echo "<strong>Veículo: </strong>{$login['veiculo']}<br>";

                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        
                            <div class="col">
                                <?php

                                    echo "<strong>Saldo: </strong>R$ {$login['carteira']}";

                                ?> 
                            </div>
                            <div class="col" style="text-align: right">
                                <button id="btn-ficardisponivel" class="btn btn-primary">Resgatar</button>
                            </div>
                        </div>

                    </p>
                    
                </div>
               
            </div>

        </div>
        <div class="card-footer text-muted">
            <?php  echo date('d/m/Y') ?>
        </div>
    </div>

</div>