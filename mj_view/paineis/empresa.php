<div class="container" style="margin-top: 2%; margin-bottom: 5%">

    <div class="card text-center">
        <div class="card-header">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
        </div>                                                      
                                      
        <div class="card-body">
            <div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#entregadores" onclick="buscar_entregadores()">Solicitar Entregador</button>

            </div>
                  

            <div class="card" id="propostas">
            
                <div class="card-body">

                    <h5 class="card-title">Últimas propostas</h5>

                    <div id="tabela-propostas"></div>
                    <script>buscar_propostas("*"); </script>

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
                                    
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?php

                                    echo "<strong>Telefone: </strong>{$login['telefone']}<br>";
                                    echo "<strong>Cnpj: </strong>{$login['cnpj']}<br>";

                                    
                                ?>
                            </div>
                            <div class="col-sm-4">
                                <?php

                                    echo "<strong>E-Mail: </strong>{$login['email']}<br>";
                                    echo "<strong>Usuário: </strong>{$login['usuario']}<br>";
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
                                <button id="btn-ficardisponivel" class="btn btn-primary" onclick="ficarDisponivel()">depositar</button>
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


<!-- MODAL -->

<div class="modal fade" id="entregadores" tabindex="-1" role="dialog" aria-labelledby="entregadores-titulo" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="text-align: center">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
                <h5 class="modal-title" id="entregadores-titulo">Entregadores disponíveis</h5>
                <br>
                <div id="entregadores-conteudo"></div>               
            </div>

        </div>
    </div>
</div>