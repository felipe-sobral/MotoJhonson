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

</div>