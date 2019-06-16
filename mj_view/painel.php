<?php
	isset($_SESSION) ? : session_start();
	
	$tipo = isset($_SESSION["mj_login"]["tipo"]) ? $_SESSION["mj_login"]["tipo"] : "default";
	echo "<script src='src/js/login.js'></script>";
	echo "<script>verificar_sessao('painel', '$tipo');</script>";

	$login = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : exit;
   //print_r($login);
?>



<div id="painel">

   <div class="topo-padrao">
		<div style="text-align: right">
			<button class="btn btn-outline-danger" onclick="deslogar()" style="border: 0"><i class="fas fa-sign-out-alt"></i></button>
		</div>
      <a href="?pg=index"><img src="src/img/logo_branca.svg" style="width: 10%; min-width: 200px"></a>
   </div>

   <div id="conteudo">

      <?php

			if($login["tipo"] == "EMPRESA"){
				include_once "mj_view/paineis/empresa.php";
			} elseif ($login["tipo"] == "MOTOJHONSON"){
				include_once "mj_view/paineis/motoboy.php";
			}

		?>

   </div>

	<div class="modal fade" id="proposta" tabindex="-1" role="dialog" aria-labelledby="proposta-titulo" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="text-align: center">

				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<br>
					<h5 class="modal-title" id="proposta-titulo">Entregadores disponíveis</h5>
					<br>
					<div id="proposta-conteudo"></div>
					<div id="proposta-opcoes"></div>               
				</div>

			</div>
		</div>
	</div>

</div>