document.addEventListener('DOMContentLoaded', () => {
    const requerimientoSelect = document.querySelector('#requerimiento');
    const categoriaSelect = document.querySelector('#categoria');

    const areaSelect = document.querySelector('#arearesponsable');
    console.log(areaSelect);
    // const responsableSelect = document.querySelector('#responsable');
    
    // Fetch para obtener los datos
    fetch('obtener_requerimientos.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos recuperados: ', data);
 
            // Obtiene los Requerimientos sin repetirse
            const requerimientosUnicos = [...new Set(data.map(item => item.REQUERIMIENTO))];

            // Llena el select "Requerimiento"
            requerimientosUnicos.forEach((req, index) => {
                const option = document.createElement('option');
                option.value = req;
                option.textContent = req;
                requerimientoSelect.appendChild(option);
            });
 
            // Actualiza las categorias según el requerimiento seleccionado
            function actualizarCategorias(requerimientoSeleccionado) {
                console.log(`Seleccionaste: ${requerimientoSeleccionado}`);
 
                categoriaSelect.innerHTML = '';
 
                const categoriasFiltradas = data.filter(item => item.REQUERIMIENTO === requerimientoSeleccionado);
 
                // Llena el select "Categoria"
                categoriasFiltradas.forEach((item, index) => {
                    const option = document.createElement('option');
                    option.value = item.TIPO;
                    option.textContent = item.TIPO;
                    categoriaSelect.appendChild(option);
                });
 
                console.log('Categorías cargadas: ', categoriasFiltradas.map(item => item.TIPO));
            }
 
            // Detecta el cambio en el requerimiento y asocia la categoria
            requerimientoSelect.addEventListener('change', (event) => {
                actualizarCategorias(event.target.value);
            });
 
        })
        .catch(error => {
            console.log('Error: ', error);
        });

    // SEGUNDO FETCH 
    fetch('obtener_arearesponsable.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos recuperados: ', data);
 
            // Obtiene los Requerimientos sin repetirse
            const areasUnicas = [...new Set(data.map(item => item.CARGO))];

            // Llena el select "Requerimiento"
            areasUnicas.forEach((req, index) => {
                const option = document.createElement('option');
                option.value = req;
                option.textContent = req;
                areaSelect.appendChild(option);
            });
 
            /* Actualiza las categorias según el requerimiento seleccionado
            function actualizarResponsable(areaSeleccionada) {
                console.log(`Seleccionaste: ${areaSeleccionada}`);
 
                responsableSelect.innerHTML = '';
 
                const responsablesFiltrados = data.filter(item => item.CARGO === areaSeleccionada);
 
                // Llena el select "Categoria"
                responsablesFiltrados.forEach((item, index) => {
                    const option = document.createElement('option');
                    option.value = item.TIPO;
                    option.textContent = item.TIPO;
                    areaSelect.appendChild(option);
                });
 
                console.log('Responsables cargados: ', responsablesFiltrados.map(item => item.NOMBRE));
            }
 
            // Detecta el cambio en el requerimiento y asocia la categoria
            areaSelect.addEventListener('change', (event) => {
                actualizarResponsable(event.target.value);
            });
            */
        })
        .catch(error => {
            console.log('Error: ', error);
        });

        // FIN FETCH 

    // Envío del formulario 
    $(function(){
        $('#mnttotiendas').on("submit", function(event){
            event.preventDefault();

            var formData = new FormData(this);

            // Verifica que datos se están enviando
            for(var pair of formData.entries()){
                console.log(pair[0] + ': ' + pair[1]);
            }

            //
            $.ajax({
                url: 'mntto_tiendas_guardar.php',
                type: 'POST',
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formData,

                beforeSend: function(){
                    $('#btsubmit').val('Guardando...').prop('disabled', true);
                },

                complete: function(xhr, testStatus){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'El registro se almacenó correctamente',
                        text: data,
                        showConfirmButton: false,
                        timer: 3000
                    }).then(() => {
                        window.location.href = "mntto_tiendas_con.php";
                    });
                },

                error: function(xhr, textStatus, errorThrown){
                    console.log('Error al procesamiento del formulario.');
                }
            });
            

            /*DOS
            $.ajax({
                url: 'mntto_tiendas_guardar.php',
                type: 'POST',
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formData,

                beforeSend: function(){
                    $('#btsubmit').val('Guardando...').prop('disabled', true);
                },

                success: function(response){
                    console.log('Respuesta del servidor: ', response);

                    if(response.status === 'success'){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            text: JSON.stringify(response.datos_recibidos, null, 2),
                            showConfirmButton: true,
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error en el servidor',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },

                error: function(xhr, textStatus, errorThrown){
                    console.log('Error al procesamiento del formulario.');
                }
            })
            */
        });
    });

}); //Fin DOM
