$(document).ready(function(){

	$('#myModal').modal();

	$("#especifica_horarios").hide();
	$("#cenefa").hide();
	$("#tapete").hide();
	$("#medida").hide();
	$("#aprioritario").hide();
	$("#aservicio").hide();
	$("#archivoresp").hide();
	$("#seleccancelar").hide();
	$("#FloorGraphic").hide();
	$("#Portatablet").hide();
	$("#portadocumentos").hide();
	$("#AcrilicosDiscapacidad").hide();
	$("#comentariosrespuesta").hide();
	$("#vinil_senalizacion_pcd").hide();
	$("#cambio_imagen_atm").hide();
	$("#cambio_tablet").hide();
	
	$("#requerimientosMarketing").validate({

        rules: {

	        largocenefa : {number: true},
	        telefonoSolicitante : {number: true, minlength: 10}

        }
 
    });

	// TIPO DE REQUERIMIENTOS

	$("#tipoRequerimiento").change(function(){

		var tipoRequerimiento = $(this).val();

		if (tipoRequerimiento == 'Horarios fisicos' || tipoRequerimiento == 'Horarios pagina Web' || tipoRequerimiento == 'Horarios fisicos ATM' || tipoRequerimiento == 'Horarios Braille') {

			var tienda = document.getElementById('tienda').value;

		    $.get("_horariostienda.php",{tienda:tienda})
		    .done(function(data){
		    	
		    	$("#horariostienda").html(data);
		     	$("#horariooficial").val(data);
		     	console.info(data);

		    })

			$("#especifica_horarios").show('slow');

			document.getElementById("hapertura").required = true;
			document.getElementById("hcierre").required = true;
			document.getElementById("hsapetura").required = true;
			document.getElementById("hdapertura").required = true;

			$("#hsapetura").change(function(){

				var hsapetura = $(this).val();

				if (hsapetura == 'Cerrado') {

					$("#sabadocierre").hide('slow');
					document.getElementById("hscierre").required = false;

				}

				else{

					$("#sabadocierre").show();
					document.getElementById("hscierre").required = true;

				}

			})

			$("#hdapertura").change(function(){
				var hdapertura = $(this).val();
				if (hdapertura == 'Cerrado') {

					$("#domingocierre").hide('slow');
					document.getElementById("hdcierre").required = false;

				}else{
				
					$("#domingocierre").show();
					document.getElementById("hdcierre").required = true;

				}

			})

		}else{

			$("#especifica_horarios").hide('slow');
			document.getElementById("hapertura").required = false;
			document.getElementById("hcierre").required = false;
			document.getElementById("hsapetura").required = false;
			document.getElementById("hscierre").required = false;
			document.getElementById("hdapertura").required = false;
			document.getElementById("hdcierre").required = false;

		}

		if (tipoRequerimiento == 'Cenefas en cristales') {

			$("#cenefa").show('slow');
			document.getElementById("largocenefa").required = true;

		}else{

			$("#cenefa").hide('slow');
			document.getElementById("largocenefa").required = false;

		}

		if (tipoRequerimiento == 'Tapetes') {

			$("#tapete").show('slow');
			document.getElementById("mtapete").required = true;

		}else{
			
			$("#tapete").hide('slow');
			document.getElementById("mtapete").required = false;

		}

		if (tipoRequerimiento == 'Porta documentos') {
			
			$("#portadocumentos").show('slow');
			document.getElementById("mportadocumentos").required = true;

		}else{
			
			$("#portadocumentos").hide('slow');
			document.getElementById("mportadocumentos").required = false;

		}

		if (tipoRequerimiento == 'Vinil para asiento prioritario discapacitado'){
			
			$("#aprioritario").show('slow');
			document.getElementById("mprioritario").required = true;

		}else{
		
			$("#aprioritario").hide('slow');
			document.getElementById("mprioritario").required = false;			

		}	
		
		if (tipoRequerimiento == 'Electroestatico senalizacion animales de servicio discapacitado'){
			
			$("#aservicio").show('slow');
			document.getElementById("manimalserv").required = true;

		}else{
			$("#aservicio").hide('slow');
			document.getElementById("manimalserv").required = false;			

		}

		if (tipoRequerimiento == 'Acrilicos de discapacidad') {
		
			$("#AcrilicosDiscapacidad").show('slow');

		}else{
			
			$("#AcrilicosDiscapacidad").hide('slow');

		}		

		if ( tipoRequerimiento == 'Floor Graphic' || tipoRequerimiento == 'Portaflyers' || tipoRequerimiento == 'Porta Posters' || tipoRequerimiento == 'Unifilas') {
			
			$("#medida").show('slow');
			document.getElementById("addmedida").required = true;

			if (tipoRequerimiento == 'Floor Graphic'){

				$("#FloorGraphic").show('slow');

			}
		
		}else{
		
			$("#medida").hide('slow');
			$("#FloorGraphic").hide('slow');
			document.getElementById("addmedida").required = false;
		}

		/*
		if (tipoRequerimiento == 'Porta tablet'){

			$("#Portatablet").show('slow');			

		}else{

			$("#Portatablet").hide('slow');

		}
		*/

		if (tipoRequerimiento == 'Vinil senalizacion de rampa para PcD'){

			$("#vinil_senalizacion_pcd").show('slow');			

		}else{

			$("#vinil_senalizacion_pcd").hide('slow');

		}

		if (tipoRequerimiento == 'Cambio de Imagen de ATM'){

			$("#cambio_imagen_atm").show('slow');			

		}else{

			$("#cambio_imagen_atm").hide('slow');

		}

		if (tipoRequerimiento == 'Cambio de tablet para legales'){

			$("#cambio_tablet").show('slow');			

		}else{

			$("#cambio_tablet").hide('slow');

		}

	})

	$("#status").change(function(){

		var status = $(this).val();

		if(status === 'Solucionado'){

			$("#archivoresp").show();

		}
			else{

			   $("#archivoresp").hide();
			
			}
		if (status === 'Cancelado'){

			$("#comentariosrespuesta").show();
			$("#seleccancelar").show();
			
		}else{

			$("#comentariosrespuesta").hide();
			$("#seleccancelar").hide();

		}

	})	

    $('#comentarios,#comentariosedit').on('input', function (e) {

        if (!/^[ a-z0-9+$]*$/i.test(this.value)) { 
            //this.value = this.value.replace(/[^ a-z0-9+$]+/ig,"");
            this.value = this.value.replace((/[àáâãäå]/g),"a");
            this.value = this.value.replace((/[èéêë]/g),"e");
            this.value = this.value.replace((/[ìíîï]/g),"i");
            this.value = this.value.replace((/[òóôõö]/g),"o");
            this.value = this.value.replace((/[ùúûü]/g),"u");  
            this.value = this.value.replace((/[ñ]/g),"n");   
            this.value = this.value.replace((/[Á]/g),"A");
            this.value = this.value.replace((/[É]/g),"E");
            this.value = this.value.replace((/[Í]/g),"I");
            this.value = this.value.replace((/[Ó]/g),"O");
            this.value = this.value.replace((/[Ú]/g),"U");  
            this.value = this.value.replace((/[Ñ]/g),"N");                   
        }
        
    });

   $(function() {

        jQuery("#requerimientosmkt").validate({
            
            onfocusout: false,
            rules: {

                folio: {required: true},
                telefonoSolicitante : {number: true, maxlength: 10}

            },
	            submitHandler: function(form){

                var form =$('#requerimientosmkt')[0];
                var data = new FormData(form);

                jQuery.ajax({

                    url: 'mkt_requerimientos_guardar.php',
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'html',
                    data: data,

                    beforeSend: function () {

                        document.getElementById("btsubmit").value = "Guardando...";
                        document.getElementById("btsubmit").disabled = true;
                        //console.info(data);

                    },

                    complete: function(xhr, textStatus) {

                        console.info("Comunicación ok");

                    },

                    success: function(data, textStatus, xhr) {

                      Swal.fire({

                            position: 'center',
                            icon: 'success',
                            title: 'El registro se almacenó correctamente',
                            text: data,
                            showConfirmButton: false
                          
                        }),
                        
                        setTimeout(function() {
                            window.location.href = "mkt_requerimientos_con.php";
                        }, 3000);       

						
                    },

                    error: function(xhr, textStatus, errorThrown) {

                        console.info("hay un error con el procesamiento del formulario.");

                    }

                });

            },

        });

    });	

   $(function() {

        jQuery("#edrequerimientosmkt").validate({
            
            onfocusout: false,
            rules: {

                folio: {required: true},
                telefonoSolicitante : {number: true, maxlength: 10}

            },
	            submitHandler: function(form){

                var form =$('#edrequerimientosmkt')[0];
                var data = new FormData(form);

                jQuery.ajax({

                    url: 'mkt_requerimientos_actualizar.php',
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'html',
                    data: data,

                    beforeSend: function () {

                        document.getElementById("btsubmit").value = "Guardando...";
                        document.getElementById("btsubmit").disabled = true;
                        //console.info(data);

                    },

                    complete: function(xhr, textStatus) {

                        console.info("Comunicación ok");

                    },

                    success: function(data, textStatus, xhr) {

                      Swal.fire({

                            position: 'center',
                            icon: 'success',
                            title: 'El registro se almacenó correctamente',
                            text: data,
                            showConfirmButton: false
                          
                        }),
                        
                        setTimeout(function() {
                            window.location.href = "mkt_requerimientos_con.php";
                        }, 5000);   
                                             

                    },

                    error: function(xhr, textStatus, errorThrown) {

                        console.info("hay un error con el procesamiento del formulario.");

                    }

                });

            },

        });

    });

	let niv = document.getElementById('nivel').value;
	let us = document.getElementById('usuario').value;

	console.info(niv);

	if (niv >= 3){

		var div = $("#regionUsuario").val();
		var puesto = $("#puesto").val();
		var usuario = $("#usuario").val();

	    $.get("_region.php",{div:div, puesto:puesto, usuario:usuario})
	    .done(function(data){
	    	
	    	$("#region_sel").html(data);

	    })

	 	//$("#region_sel").load("_region.php");

	}

	$("#region_sel").change(function(){
	   	
	   	var reg=$(this).val();
		var div = $("#regionUsuario").val();
		var usuario = $("#usuario").val();
	   	var puesto = $("#puesto").val();
		console.log(reg+puesto+puesto);

	    $.get("_ciudad.php",{reg:reg, usuario:usuario, puesto:puesto})
	    .done(function(data){
	    	
	    	$("#ciudad_sel").html(data);

	    })

	})

	$("#ciudad_sel").change(function(){
	    
	    var suc=$(this).val();
	    let reg = document.getElementById('region_sel').value;
	    console.info(reg);
	    $.get("_sucursalnva.php",{suc:suc,reg:reg})
	    .done(function(data){
	    	
	    	$("#tienda").html(data);

		
	    })

	})	

	if (niv == 2){

	 	let reg = document.getElementById('region').value;
		let puesto = document.getElementById('puesto').value;
		let usuario = document.getElementById('usuario').value;

		console.log(puesto);

	    $.get("_ciudad.php",{reg:reg,puesto:puesto,usuario:usuario})
	    .done(function(data){
	    	
	    	$("#ciudad").html(data);

	    })

	}

	$("#ciudad").change(function(){

	    var suc=$(this).val();
	    let reg = document.getElementById('region').value;
	    $.get("_sucursalnva.php",{suc:suc,reg:reg})
	    .done(function(data){

	     	$("#tienda").html(data);

	    })

	})   

});
