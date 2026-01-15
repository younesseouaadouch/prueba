document.addEventListener('DOMContentLoaded', function () {
    activarControles();
});

function activarControles(){
	document.querySelector('#controles').addEventListener('change',cargarListado);
	/*
	 Puedo activar aquÃ­ los botones de diÃ¡logo, que estÃ¡n desde el principio
	 PodrÃ­a hacer una funciÃ³n aparte, en plan "activarDialogos"
	 */
	const mostrar = document.querySelector('#mostrar');
	const cerrar = document.querySelector('#mostrar .cerrar');	 
	cerrar.addEventListener('click', () => {
		mostrar.close();
	});
}

async function cargarListado(){
	console.log("Hay cambios");
	const nivel = document.querySelector('#controles input[name="nivel"]:checked');
	const ciclo = document.querySelector('#controles select[name="ciclo"]').value;
	if(nivel && (ciclo > 0)){
		console.log("Ciclo "+ciclo+"\nnivel: "+nivel.value);
		//Hay que llamar a algo del tipo listado_grupo.php?nivel=2&ciclo=3
		const URL="listado_grupo.php?nivel="+nivel.value+"&ciclo="+ciclo;
		console.log("URL:"+URL);
		////////////////////////////////////////
		//// FALTA try catch
		const respuestaGet = await fetch(URL);
		if (!respuestaGet.ok) throw new Error("Error al cargar el formulario (no 200)");
		const tablaListado = await respuestaGet.text();
		const contenedor = document.querySelector('#listado');
		contenedor.innerHTML = tablaListado;
		//Ocultamos los cÃ³digos (cuando ya funcione)
		//PodrÃ­a ir en activarTabla
		// document.querySelectorAll('.listado td:first-child').forEach(item => {item.style.display='none'});
		/*
		 Podemos obtener el nombre del ciclo y ponerlo en el caption de la tabla. Lo mÃ¡s cÃ³modo es meter un caption vacÃ­o
		 const select = document.querySelector('select[name="ciclo"]');
		 const textoVisible = select.options[select.selectedIndex].text;
		 */	
		 activarTabla();
		 }	
}

function activarTabla(){
	// 	Con el nombre, mostramos datos
	const nombres= document.querySelectorAll('#listado td:nth-child(2)');
	nombres.forEach(nombre => {
		nombre.addEventListener('click', mostrarAlumno);
	});
// 	BotÃ³n editar
	const botonesEditar= document.querySelectorAll('#listado td:nth-child(3) button');
	botonesEditar.forEach(boton => {
		boton.addEventListener('click', editarAlumno);
	});
// 	BotÃ³n borrar
	const botonesBorrar= document.querySelectorAll('#listado td:nth-child(4) button');
	botonesBorrar.forEach(boton => {
		boton.addEventListener('click', borrarAlumno);
	});
}	

async function mostrarAlumno(e){
	const fila = e.target.closest('tr');
	const codigo = fila.cells[0].textContent.trim();
	console.log(e.target.textContent+": "+codigo);
	const URL="datos_alumno.php?alumno="+codigo;
	console.log("URL:"+URL);
	const respuestaGet = await fetch(URL);
	if (!respuestaGet.ok) throw new Error("Error al cargar el formulario");
	const fichaAlumno = await respuestaGet.text();	
	const dialogo = document.querySelector('#mostrar');	
	dialogo.querySelector(".datos").innerHTML = fichaAlumno;
	dialogo.showModal();
}	

async function borrarAlumno(e){
	const fila = e.target.closest('tr');
    const codigo = fila.cells[0].textContent.trim();
    const nombre = fila.cells[1].textContent.trim();
	const respuestaConfirm = confirm(`Â¿Borrar ${nombre}?`);
   if (respuestaConfirm) {
        try {
            // Preparar los datos para el POST
            const datos = new FormData();
            datos.append('alumno', codigo);

            // 3. Realizar la llamada POST
            const respuesta = await fetch('borrar_alumno.php', {
                method: 'POST',
                body: datos
            });

            // Leer la respuesta del servidor como texto
            const resultado = await respuesta.text();

            // LÃ³gica para detectar el fallo SQL
            if (resultado.toLowerCase().includes("error")) {
                console.error("Detalle del error:", resultado);
                alert("No se pudo borrar: El servidor indica un fallo en la operaciÃ³n.");
            } else {
                console.log("Alumno borrado con Ã©xito.");
                // AquÃ­ podrÃ­as eliminar la fila del DOM para que desaparezca visualmente
				//////////////////////////////////////////////////////////////////////////
				// PodrÃ­a eliminar la fila con fila.remove();
				// Prefiero recargar el listado, por si alguien mÃ¡s estuviera haciendo cambios en el servidor
				// Para que se recargue el listado, fuerzo el evento change en el select
				// O llamo a cargarListado
				/////////////////////////////////////////////////////////////////////////
				cargarListado();
            }

        } catch (error) {
            // Este catch captura errores de RED (servidor caÃ­do, sin internet, etc.)
            alert("Error crÃ­tico: No se pudo contactar con el servidor.");
        }
    }
}

async function editarAlumno(e){
	const fila = e.target.closest('tr');
    const codigo = fila.cells[0].textContent.trim();
	const modal = document.querySelector('#editar');
	console.log("Editar alumno "+codigo);
    try {
        // 1. Obtener el formulario del servidor
        const url = `formulario_edicion_alumno.php?alumno=${codigo}`;
        const respuestaGet = await fetch(url);
        const htmlFormulario = await respuestaGet.text();

        // 2. Meter el HTML dentro del diÃ¡logo y mostrarlo
        // AÃ±adimos un botÃ³n de cancelar manualmente para que siempre estÃ© ahÃ­
        modal.innerHTML = `
            <h2>Editar Alumno</h2>
            ${htmlFormulario}
            <button type="button" class="btn-cancelar">Cancelar</button>
        `;
        modal.showModal();

        // 3. Configurar el botÃ³n Cancelar
        modal.querySelector('.btn-cancelar').onclick = () => modal.close();

        // 4. CAPTURAR EL SUBMIT
        const formulario = modal.querySelector('form');
        formulario.addEventListener('submit', async (e) => {
            e.preventDefault(); // Evitamos que la pÃ¡gina se recargue

            // Recogemos todos los datos del formulario automÃ¡ticamente
            const datos = new FormData(formulario);

            try {
                const respuestaPost = await fetch('actualizar_alumno.php', {
                    method: 'POST',
                    body: datos
                });

                const resultado = await respuestaPost.text();

                // 5. Validar la respuesta (buscando la palabra "error")
                if (resultado.toLowerCase().includes("error")) {
                    alert("Error al actualizar: " + resultado);
                } else {
                    console.log("Alumno actualizado correctamente");
                    modal.close();

					cargarListado();
                }
            } catch (err) {
                alert("Error de conexiÃ³n al enviar los datos.");
            }
        });

    } catch (error) {
        alert("No se pudo cargar el formulario de ediciÃ³n.");
    }
}
