$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//-------------cargar un div--------------//
	//onclick(#id_div)
function cargar_div_institu(div){
	//alert(div + url);
	$(div).load('institucion_ajax.php');
}
//----------------------------------------//
function tipo_personas(tipo){
	if(tipo=='DOCENTE'){
		document.getElementById('docente').style.display='block';
	}else{document.getElementById('docente').style.display='none';};
	if (tipo=='ALUMNO') {
		document.getElementById('alumno').style.display='block';
	}else{document.getElementById('alumno').style.display='none';};
}
function class_active_menu_head(){
	var url=window.location.pathname;
	//alert(url);
	var aca=url.search("academica");
	var confi=url.search("configuracion");
	var admision=url.search("admision");
	if(aca>0){
		document.getElementById('academica').className='active';
	}
	if(confi>0){
		document.getElementById('configuracion').className='active';
	}
	if(admision>0){
		document.getElementById('admision').className='active';
	}
}

window.onload=function(){
	class_active_menu_head();
}