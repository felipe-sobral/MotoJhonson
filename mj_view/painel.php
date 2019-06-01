<?php

   isset($_SESSION) ? : session_start();

   $login = $_SESSION["mj_login"];
   print_r($login);
	 
?>

<div id="painel">
   <!--<div id="menu">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="?pg=painel">MotoJhonson</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php  // echo "Saldo: R$ {$login['carteira']}" ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Sacar</a>
							<?php
											
								// if($login["tipo"] == "EMPRESA"){
								// 	echo "<a class='dropdown-item' href='#'>Depositar</a>";
								// }

							?>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Sair</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>-->


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