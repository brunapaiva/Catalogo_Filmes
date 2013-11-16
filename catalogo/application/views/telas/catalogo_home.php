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
					<li><a href="<?php echo (base_url().'filmes/cadastrar_filme'); ?>" class="bt-icon icon-user-outline">Cadastrar Filmes</a></li>
				</ul>
			</nav>