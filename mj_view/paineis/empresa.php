

<div class="container" style="margin-top: 2%; margin-bottom: 5%">

    <div class="card text-center">
        <div class="card-header">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
        </div>                                                      
                                      
        <div class="card-body">
            <div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Solicitar Entregador
                </button>


                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Entregadores</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                              
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Avaliação</th>
                                        <th scope="col" style="text-align: center">Detalhes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Moto1</td>
                                            <td><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></td>

                                            <td style="text-align: center">
                                            
                                            <button class='btn btn-light'>
                                                <i class="fas fa-file-contract"></i>
                                            </button>
                                            
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>Moto2</td>
                                            <td><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></td>
                                            <td style="text-align: center">
                                            
                                                <button class='btn btn-light'>
                                                    <i class="fas fa-file-contract"></i>                                                
                                                </button>
                                            
                                            </td>
                                        </tr>
                                </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>


            </div>
                  

            <div class="card" id="propostas">
            
                <div class="card-body">

                    <h5 class="card-title">Últimas propostas</h5>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Avaliação</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="text-align: center">Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Moto1</td>
                                <td><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></td>
                                <td>Finalizado</td>
                                <td style="text-align: center">
                                
                                <button class='btn btn-light'>
                                        <i class="fas fa-info-circle"></i>
                                </button>
                                
                                
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Moto2</td>
                                <td><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></td>
                                <td>Ativo</td>
                                <td style="text-align: center">
                                
                                    <button class='btn btn-light'>
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                
                                </td>
                            </tr>
                      </tbody>
                    </table>

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