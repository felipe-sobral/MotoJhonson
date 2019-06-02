<?php
	isset($_SESSION) ? : session_start();

	
	$tipo = isset($_POST["mj_login"]["tipo"]) ? $_POST["mj_login"]["tipo"] : "default";
	echo "<script src='src/js/login.js'></script>";
	echo "<script>verificar_sessao('painel', '$tipo');</script>";

	$login = isset($_SESSION["mj_login"]) ? $_SESSION["mj_login"] : exit;
   print_r($login);
?>



<div id="painel">

   <div class="topo-padrao">
      <div class="row align-items-center" style="width: 100%; height: 100%">
         <div class="col">
            <a href="?pg=index"><img src="src/img/logo_branca.svg" style="width: 10%; min-width: 200px"></a>
         </div>
   	</div>
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