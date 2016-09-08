function buscarMaterial(valor){
	$.ajax({
		url:'../controller/ctrMaterial.php',
		type: 'POST',
		data: 'valor ='+valor+'&boton=buscar'


	}).done(function(resp){
		alert(resp);

	});
}

