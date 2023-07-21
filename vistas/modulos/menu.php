<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

		}

		
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

				
			<a href="zonas">

			<i class="fa fa-map-marker"></i>
			<span>Zonas</span>

		</a>
			</li>';

		}
		
		if($_SESSION["perfil"] == "Administrador" ){

			echo '<li>

				
			<a href="tarifas">

			<i class="fa fa-money"></i>
			<span>Tarifas</span>

		</a>
			</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

				
			<a href="generarcuenta">

			<i class="fa fa-usd"></i>
			<span>Cuentas</span>

		</a>
			</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

				
			<a href="cobros">

			<i class="fa fa-money"></i>
			<span>Cobros</span>

		</a>
			</li>';

		}
		
	

		?>

		</ul>

	 </section>

</aside>