		
			<section class="row-fluid">
					<section class="span4 offset4 main">
						<form action="<?php echo base_url().'filmes/cadastrar_filme/'?>" class="form-5 clearfix" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
									<fieldset>
											<legend>Cadastrar filme</legend>
								
												<input type="text" name="nome_filme" id="nome_filme" placeholder="Digite o nome do filme" required title="É necessário informar o nome do filme">
												<input type="text" name="link" id="link" placeholder="Digite o link do trailer" required title="É necessário informar o link para o trailer">
												<select name="categoria">
												  <option  value="Terror">Terror</option>
												  <option  value="Ação">Ação</option>
												  <option  value="Romance">Romance</option>
												  <option  value="Animação">Animação</option>
												</select>
												<?php	echo form_upload(array('name'=>'arquivo'), set_value('arquivo')); ?> </br>
												<input type="submit" name="cadastrar" value="Cadastrar Filme" class="btn btn-primary pull-left"  />

												<a href="<?php echo base_url(); ?>" class = "btn btn-default espaco" title = "Voltar para Tela Inicial">Voltar</a>
										</fieldset>
							</form>	
					</section>
				</section>

										<!--<i class="icon-arrow-right"> </i>
											<span>Cadastrar Filme</span>-->