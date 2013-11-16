			<section class="row-fluid">
				
				<section class="span3 offset5">
					<?php
						$filme_id = $this->uri->segment(3);
						if($filme_id == NULL){
							
							redirect('filmes/listar_filmes');
						} 
					?>
					
					<form action="<?php echo (base_url().'filmes/editar/'.$filme_id) ?>"  method="post" accept-charset="utf-8">
						<?php $query = $this->filmes->getfilme_byid($filme_id)->row(); ?>
						<fieldset>
							<legend>Editar filme</legend>
							<input type="text" class="input-xlarge" name="nome_filme" id="nome_filme" value="<?php echo $query->nome_filme ?>" placeholder="Digite o nome do filme" required title="É necessário informar o nome do filme">
							<input type="text" class="input-xxlarge" name="link" id="link" value="<?php echo $query->link ?>" placeholder="Digite o link do trailer" required title="É necessário informar o link para o trailer">
							<input type="hidden" name="id" id="id" value="<?php echo $query->id ?>">
							<input type="submit" name="editar" value="Alterar informações" class="btn btn-primary"  />
						</fieldset>
					</form>
					
				</section>
			</section>