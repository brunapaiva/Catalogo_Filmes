		<div id="mi-slider" class="mi-slider">
					<ul>
						<?php
							$filmes = $this->filmes->get_all()->result();
							foreach ($filmes as $f) {
								if($f->categoria == 'Terror'){
									echo ('<li><a href="'.$f->link.'" target="_blank""><img src="'.base_url().'uploads/thumbs/'.$f->url_image.'"><h4>'.$f->nome_filme.'</h4></a></li>');
								}	
							}	
						?>
					</ul>
					<ul>
						<?php
							$filmes = $this->filmes->get_all()->result();
							$cont = 0;
							foreach ($filmes as $f) {
								if($f->categoria == 'Ação'){
									$cont++;
									echo ('<li><a href="'.$f->link.'" target="_blank""><img src="'.base_url().'uploads/thumbs/'.$f->url_image.'"><h4>'.$f->nome_filme.'</h4></a></li>');
								}	
							}	
							if($cont == 0){
								echo ('<li><a></a><img src=""><h4></h4></a></li>');
							}
						?>
					</ul>
					<ul>
						<?php
							$filmes = $this->filmes->get_all()->result();
							$cont = 0;
							foreach ($filmes as $f) {
								if($f->categoria == 'Romance'){
									$cont++;
									echo ('<li><a href="'.$f->link.'" target="_blank""><img src="'.base_url().'uploads/thumbs/'.$f->url_image.'"><h4>'.$f->nome_filme.'</h4></a></li>');
								}	
							}	
							if($cont == 0){
								echo ('<li><a></a><img src=""><h4></h4></a></li>');
							}
						?>
					</ul>
					<ul>
						<?php
							$filmes = $this->filmes->get_all()->result();
							$cont = 0;
							foreach ($filmes as $f) {
								if($f->categoria == 'Animação'){
									$cont++;
									echo ('<li><a href="'.$f->link.'" target="_blank""><img src="'.base_url().'uploads/thumbs/'.$f->url_image.'"><h4>'.$f->nome_filme.'</h4></a></li>');
								}	
							}	
							if($cont == 0){
								echo ('<li><a></a><img src=""><h4></h4></a></li>');
							}
						?>
					</ul>
					<nav>
						<a>Terror</a>
						<a>Ação</a>
						<a>Romance</a>
						<a>Animação</a>
					</nav>
				</div>
			</div>
			
			<nav id="bt-menu" class="bt-menu">
				<a href="" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
					<li><a href="<?php echo (base_url().'filmes/cadastrar_filme'); ?>"><img src="http://localhost/catalogo/img/add.png"/></a></li>
					<li><a href="<?php echo (base_url().'filmes/listar_filmes') ?>"><img src="http://localhost/catalogo/img/list.png"/></a></li>
					<li><a href="<?php echo (base_url().'filmes/report') ?>"><img src="http://localhost/catalogo/img/graph.png"/></a></li>
					<li><a href="https://github.com/brunapaiva/Catalogo_Filmes"><img src="http://localhost/catalogo/img/github.png"/></a></li>
				</ul>
			</nav>

			
