<script>
	$(document).ready(function() {
		$('.txtAreaInput').autosize();

	});
</script>
<div class="container"><br><br><br>
	<div class="row" style="padding-left:15px;padding-right:15px;">
		<div class="col-sm-2 contIndex" >
				Para crear el futuro es necesario ser capaz de imaginarlo y el pensamiento productivo es una forma que le ayuda a ser esto, no es magia, se trata de un enfoque disciplinado para pensar de una forma más creativa y efectiva.
		</div>
		<div class="col-sm-6">
			<div class="containerPost contIndex">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1" style="margin-right: 5px;">
								<img src="<?= base_url();?>assets/imgs/img_perfil.png" alt="" width="40px">
							</div>
							<div class="col-sm-10">
								<textarea id="txtInputEstado" style="resize: none;max-height: 130px" class="form-control txtAreaInput" id="" cols="30" rows="1" placeholder="¿Que estas pensando?"></textarea>
							</div>
						</div>
					</div>	
					
				</div>
			</div>
			<?php 
			 foreach ($estados->result() as $row):
			 ?>
			<div class="containerPost contIndex">
				<div class="row">
					<div class="col-sm-1" style="margin-right: 10px;">
						<img src="<?= base_url();?>assets/imgs/img_perfil.png" alt="" width="50px">
					</div>
					<div class="col-sm-8">
						<div class="col-sm-8">
							<b><a href="<?=base_url();?>usuarios/perfil/<?=$row->nombre_usuario;?>" style="color: #333;"><?php echo $row->nombre;?></a></b>
						</div>
						<div class="col-sm-6">
							<input type="hidden" id="horaVal_<?=$row->hora;?>" onload="onload();" value="<?= $row->hora;?>">
							<p class="text-muted" style="font-size: 13px;" id="insertValHora_<?=$row->hora;?>">
								
								<?php
								require_once(APPPATH.'libraries/LibraryCustom.php');
									 
							    	LibraryCustom::haceTiempo($row->hora);
								

								?>
							</p>
						</div>
					</div>
				</div>
				<div class="row" style="padding-left: 10px;padding-top: 5px;">
					<div class="col-sm-12">
						<?php echo $row->estado; ?>
					</div>
				</div>
				<hr>
				<div class="row"><!-- DIV DE REACCIONES -->
					<div class="col-sm-12">
						<div class="row txtReacciones" style="padding: 0px 10px 0px 10px;">
							<div class="col-sm-6" align="center">
								<?php 
								$getLike = $controller->getLikes($row->idestado,$this->session->userdata('idUser'));
								echo '<a class="contLikes" id="clickLike_'.$row->idestado.'" onclick="likeEstado(\''.$row->idestado.'\');">';
								if($getLike==false): ?>
								 	<img src="<?=base_url();?>/assets/imgs/like.png" id="imglike_<?=$row->idestado;?>" width="20">
							     	<b id="txtlike_<?=$row->idestado;?>"> Me gusta</b>
								<?php else: ?>
									<img src="<?=base_url();?>/assets/imgs/like_active.png" id="imglike_<?=$row->idestado;?>" width="20">
							     	<b id="txtlike_<?=$row->idestado;?>" style="color: #E95420;"> Me gusta</b>
								<?php endif; ?>
								
							 	</a>
							</div>
							<div class="col-sm-6" align="center">
								<?php echo '<a class="contLikes" onclick="focusComment(\''.$row->idestado.'\');">'; ?>
								<img src="<?=base_url();?>/assets/imgs/comment.png" width="20">
							     <b> Comentar</b>
							 	</a>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row"><!-- DIV num likes -->
					<div class="col-sm-12">
						<div class="row txtReacciones" style="padding-left: 20px;">
							<div class="col-sm-3" align="left">
							     <span class="txtMG" id="txtNumLikeEstado_<?=$row->idestado;?>"><img src="<?=base_url();?>assets/imgs/num_like.png" width="16"><b id="txtNumLike_<?=$row->idestado;?>"><?=$controller->getNumLikes($row->idestado);?></b></span>
							</div>
							<div class="col-sm-6" align="left">
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php 
				$comentarios = $this->comentarios_model->getComentariosEstado($row->idestado);
				foreach ($comentarios->result() as $rowComent):
				 ?>
				<div class="row" id="contComentEstado_<?=$row->idestado;?>"><!--- COMENTARIOS -->
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1" style="margin-right: -10px;">
								<img src="<?= base_url();?>assets/imgs/img_perfil.png" alt="" width="40px">
							</div>
							<div class="col-sm-11">
								<div class="col-sm-12">
									<b><a href="<?=base_url();?>usuarios/perfil/<?=$rowComent->nombre_usuario;?>" style="color: #333;font-size: 14px;"><?php echo $rowComent->nomUser; ?> </a></b><?php echo $rowComent->txtComentario; ?>
								</div>
								<div class="col-sm-8" style="margin-left: 15px;">
									<div class="row">
										<a href="" style="font-size: 12px;">Me gusta</a> &nbsp;&nbsp;
										<a href="" style="font-size: 12px;">No me gusta</a> &nbsp;&nbsp;
										<p class="text-muted" style="font-size: 12px;">
										<?php
								require_once(APPPATH.'libraries/LibraryCustom.php');
									 
							    	LibraryCustom::haceTiempo($rowComent->horaComentario);
								

								?>
										</p> &nbsp;&nbsp;
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="row"><!-- INPUT TEXT PARA COMENTAR-->
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1" style="margin-right: 5px;">
								<img src="<?= base_url();?>assets/imgs/img_perfil.png" alt="" width="40px">
							</div>
							<div class="col-sm-10">
								<input type="hidden" id="idpost" value="<?=$row->idestado;?>">
								<?php echo '<textarea name="" id="txtInputComentario_'.$row->idestado.'" style="resize: none;max-height: 100px" class="form-control txtAreaInput" id="" cols="30" rows="1" placeholder="Escribe un comentario..." onkeydown="enviaComentario(event,\''.$row->idestado.'\');"></textarea>'; ?>
							</div>
						</div>
					</div>	
					
				</div>
			</div>
		<?php endforeach; ?>
			
		</div>
		<div class="col-sm-3 contIndex">
			
		</div>
		
	</div>
</div>