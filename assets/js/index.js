$(document).ready(function() {
	$("#txtInputEstado").on('keydown', function(event) {
		if($("#txtInputEstado").val().trim()!=""){
			if(event.keyCode==13){
				var txtEstado = $("#txtInputEstado").val();
				$.ajax({
					url: 'Estados/insertarEstado',
					type: 'POST',
					dataType: 'json',
					data: {txtEstado: txtEstado},
					success: function(response){
						if(response){
							$("#txtInputEstado").val("");
							window.location.href="../";
						}
					}
				});
				
				event.preventDefault();
			}
		}
	});
});
function enviaComentario(event,idpost){
	if($("#txtInputComentario_"+idpost).val().trim()!=""){
			//var idpost = $("#txtInputComentario").data("idpost");
			var keyCode = ('which' in event) ? event.which : event.keyCode;
			if(keyCode==13){
				var txtComentario = $("#txtInputComentario_"+idpost).val();
				$.ajax({
					url: 'Comentarios/insertarComentario',
					type: 'POST',
					dataType: 'json',
					data: {txtComentario: txtComentario, idpost: idpost},
					success: function(response){
						var json = JSON.parse(response);
						console.log(json.contenido);
						if(json.insertado){
							$("#txtInputComentario").val("");
							//window.location.href="../";
							$("#contComentEstado_"+idpost).empty();
							$("#contComentEstado_"+idpost).append(json.contenido);

						}
					}
				});
				
				event.preventDefault();
			}
		}
}
function likeEstado(idestado){
	
	$.ajax({
					url: 'Reacciones/likeEstado',
					type: 'POST',
					data: {idestado: idestado},
					success: function(response){
						var json = JSON.parse(response);
						if(json.existe==false){
							$("#imglike_"+idestado).attr("src","assets/imgs/like_active.png");
							$("#txtlike_"+idestado).css("color","#E95420");
						}
						if(json.existe==true){
							$("#imglike_"+idestado).attr("src","assets/imgs/like.png");
							$("#txtlike_"+idestado).css("color","#616770");
						}
						$("#txtNumLike_"+idestado).empty();
						$("#txtNumLike_"+idestado).append(json.numlikes);

					}
				});
}
function unlikeEstado(idestado){
	$("#imglike_"+idestado).attr("src","assets/imgs/like.png");
	$("#txtlike_"+idestado).css("color","#616770");
	$("#clickLike_"+idestado).attr("onclick","likeEstado('"+idestado+"');");
}
function focusComment(idestado){
	$("#txtInputComentario_"+idestado).focus();
}