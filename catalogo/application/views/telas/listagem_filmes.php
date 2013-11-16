			<section class="row-fluid">
				
				<section class="span8 offset2">
					
					<table class="table table-hover table-bordered table-ordered">
						
						<thead>
					
							<tr>
								<th>Nome</th>
								<th>Categoria</th>
								<th>Link do Trailer</th>
								<th>Ações</th>			
							</tr>
							
						</thead>
						
						<tbody>
							
							<?php
					
								$filmes = $this->filmes->get_all()->result();
								foreach ($filmes as $f) {
									
									echo '<tr>';
									echo ('<td>'.$f->nome_filme.'</td>');
									echo ('<td>'.$f->categoria.'</td>');
									echo ('<td>'.$f->link.'</td>');
									echo ('<td>
											<a href="'.base_url().'filmes/editar/'.$f->id.'" title="Editar"><img src="http://localhost/catalogo/img/edit.png"/></a>
											<a href="'.base_url().'filmes/deletar/'.$f->id.'" class="deletar" title="Deletar"><img src="http://localhost/catalogo/img/delete.png"/></a>
										   </td>');
									echo '</tr>';
									
								}
							
							?>
							
						</tbody>
						
					</table>
					
					<a href="<?php echo base_url(); ?>" class = "btn btn-default espaco" title = "Voltar para Tela Inicial">Voltar</a>
					
				</section>
				
			</section>
