function buscarMaterial(valor){
	$.post("../controller/ctrMaterial.php",{valor:valor,boton:"buscar"}).done(function(resp){

		var valores = JSON.parse(resp);
		html="<table class='table table-hover'><thead><th>#</th><th>Nombre</th><th>Cod. Fab.</th><th>Medida</th><th>Marca</th><th colspan='2'>Opciones</th></thead><tbody>"
		for(i=0;i<valores.length;i++){

		html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td><a href='mant_EditMaterial.php?idMaterial="+valores[i][0]+"'> <span class='glyphicon glyphicon-edit'></span>editar</a></td><td><a href='mant_deleteMaterial.php?idMaterial="+valores[i][0]+"'><span  class='glyphicon glyphicon-trash'></span>eliminar</a></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}

function buscarMat(valor){
	$.post("../controller/ctrMaterial.php",{valor:valor,boton:"buscar"}).done(function(resp){

		var valores = JSON.parse(resp);
		html="<table class='table table-hover'><thead><th>#</th><th>Nombre</th><th>Cod. Fab.</th><th>Medida</th><th>Marca</th><th colspan='2'>Opciones</th></thead><tbody>"
		for(i=0;i<valores.length;i++){

		html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td><a class='mostrarModal' href='javascript:void(0);' Mat ="+valores[i][0]+"> <span class='glyphicon glyphicon-plus-sign'></span>Agregar</a></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}

function buscarSubCategoria(valor){
	$.post("../controller/ctrActividadCategoria.php",{valor:valor}).done(function(resp){

		var resultado = JSON.parse(resp);

		html="<div class='col-sm-6'><select class='selectpicker form-control' name='idCategoria' required><option >Seleccione Sub-Categoria</option>"

		for(i=0;i<resultado.length;i++){
			html+="<option value='"+resultado[i][0]+"'>"+resultado[i][1]+"</option>"
		}
		html+="</select></div>"
		$("#subCategoria").html(html);
	});

}

