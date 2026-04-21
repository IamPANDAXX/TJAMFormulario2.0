//manejo de selección (checkbox o radio) de forma dinámica
function handleInputSelection(input) {
    const container = input.closest('tr') || input.closest('.contenedor-general');
    const inputs = container.querySelectorAll('input'); //busca todos los inputs (checkboxes o radios)
    
    //si es checkbox, solo desmarcar los demás checkboxes
    if (input.type === 'checkbox') {
        inputs.forEach(i => {
            if (i !== input) i.checked = false; //desmarcar los demás
        });
    }
    //si es radio, desmarcar todos los radios de ese grupo (pero no otros checkboxes)
    else if (input.type === 'radio') {
        inputs.forEach(i => {
            if (i !== input) i.checked = false; //desmarcar los demás
        });
    }


    limpiarError(container);
    actualizarProgreso();
}

//limpiar errores (remover mensajes de error)
function limpiarError(elemento) {
    elemento.classList.remove('error');
    const mensaje = elemento.querySelector('.mensaje-error');
    if (mensaje) mensaje.remove();
}

let primerErrorMostrado = false;
//mostrar error de forma animada
function mostrarError(elemento, texto) {
    if (!elemento.querySelector('.mensaje-error')) {
        const mensaje = document.createElement('div');
        mensaje.classList.add('mensaje-error', 'animated', 'fadeIn');
        mensaje.textContent = texto;
        elemento.classList.add('error');
        elemento.appendChild(mensaje);
    }

    if (!primerErrorMostrado) {
        elemento.scrollIntoView({ behavior: 'smooth', block: 'center' });
        primerErrorMostrado = true;
    }
}
//************************************************************//
//validación automática para cualquier tipo de contenedor
function validarTodo() {
    let todoBien = true;
    primerErrorMostrado = false;

    //limpiar errores anteriores
    document.querySelectorAll('.error').forEach(el => {
        el.classList.remove('error');
        const mensaje = el.querySelector('.mensaje-error');
        if (mensaje) mensaje.remove();
    });

    //valida si las filas de la tabla esta completas
    const filas = document.querySelectorAll('table tr');
    filas.forEach(fila => {
        const inputs = fila.querySelectorAll('input');
        if (inputs.length > 0) {
            const algunoMarcado = Array.from(inputs).some(input => input.checked);
            if (!algunoMarcado) {
                todoBien = false;
                mostrarError(fila, '⚠️ Debes seleccionar una opción para este candidato.');
            }
        }
    });

    //buscar todos los contenedores con checkbox, radios, textareas, selects y los files
    const contenedores = document.querySelectorAll('.contenedor-general');
    contenedores.forEach((contenedor) => {
        if (contenedor.classList.contains('opcional')) return;
        let algunoMarcado = false;

        const inputs = contenedor.querySelectorAll('input[type="checkbox"], input[type="radio"]');
        const textarea = contenedor.querySelector('textarea');
        const select = contenedor.querySelector('select');
        const file = contenedor.querySelector('input[type="file"]');

        if ([...inputs].some(input => input.checked)) algunoMarcado = true;
        if (textarea && textarea.value.trim() !== '') algunoMarcado = true;
        if (select && select.value !== '') algunoMarcado = true;
        if (file && file.files.length > 0) algunoMarcado = true;

        if (!algunoMarcado) {
            todoBien = false;
            mostrarError(contenedor, '⚠️ Debes seleccionar o completar este campo.');
        }
    });

    //validacion de otros contenedores
     const otrosContenedores = document.querySelectorAll('.contenedor-general');
     
     otrosContenedores.forEach((contenedor) =>{
        if (contenedor.classList.contains('opcional')) return;

        const textarea = contenedor.querySelector('textarea');
        const select = contenedor.querySelector('select');
        const file = contenedor.querySelector('input[type="file"]');

        if (textarea && textarea.value.trim() ===''){
            limpiarError(contenedor);
            todoBien = false;
            mostrarError(contenedor, '⚠️ Este campo de texto es obligatorio.')
        }
        if (select && select.value ===''){
            limpiarError(contenedor);
            todoBien = false;
            mostrarError(contenedor, '⚠️ Debes seleccionar una de las opciones.')
        }
        if (file && file.files.length === 0){
            limpiarError(contenedor);
            todoBien = false;
            mostrarError(contenedor, '⚠️ Debes subir un archivo.')
        }
     });

    //mensajes de errores
    if (!todoBien) {
        errorToast();
    }
    showToast();
}
//*************************************************************//
//mostrar mensaje de éxito (formulario completo)
function showToast() {
    const toast = document.getElementById("toast");
    toast.classList.add("show", "fadeIn"); //agregar animación CSS
    setTimeout(() => toast.classList.remove("show", "fadeIn"), 4000);
}

//mostrar mensaje de error (formulario incompleto)
function errorToast() {
    const errorToast = document.getElementById("error-toast");
    errorToast.classList.add("show", "shake");
    setTimeout(() => errorToast.classList.remove("show", "shake"), 4000);
}
//************************************************************//
//actualizar la barra de progreso con transiciones suaves
function actualizarProgreso() {
    const filas = document.querySelectorAll('table tr'); 
    const contenedores = document.querySelectorAll('.contenedor-general');
    let respondidas = 0;
    let total =0;

    //evaluar filas de tabla (candidatos)
    filas.forEach(fila => {
        const inputs = fila.querySelectorAll('input');
        if (inputs.length > 0) { //solo contar filas con inputs
            total++;
            if ([...inputs].some(input => input.checked)) {
                respondidas++;
            }
        }
    });

    //evaluar contenedores generales
    contenedores.forEach(contenedor =>{
        let respondido = false;

        const inputs = contenedor.querySelectorAll('input[type="checkbox"], input[type="radio"]');
        const textarea = contenedor.querySelector('textarea');
        const select = contenedor.querySelector('select');
        const file = contenedor.querySelector('input[type="file"]');

        //evaluacion de los campos
        if ([...inputs].some(input => input.checked)) respondido = true;
        if (textarea && textarea.value.trim() !== '') respondido = true;
        if (select && select.value !== '') respondido = true;
        if (file && file.files.length > 0) respondido = true;

        if (inputs.length > 0 || textarea || select || file) {
            total++; //suma solo una vez por contenedor
            if (respondido) respondidas++;
        }
    });

    const porcentaje = Math.round((respondidas / total) * 100);
    const barra = document.getElementById("barra");
    barra.style.transition = 'width 0.5s ease-in-out';
    barra.style.width = `${porcentaje}%`;
    barra.textContent = `${porcentaje}%`;

    if (porcentaje <= 30) {
        barra.style.backgroundColor = "#e74c3c";
    } else if (porcentaje <= 65) {
        barra.style.backgroundColor = "#f39c12";
    } else if (porcentaje <= 90) {
        barra.style.backgroundColor = "#f1c40f";
    } else {
        barra.style.backgroundColor = "#2ecc71";
    }
}

//delegación de eventos (mejor manejo de eventos)
document.addEventListener('change', (e) => {
    const target = e.target;
    if (target.matches('input[type="checkbox"], input[type="radio"]')) {
        handleInputSelection(target);
    }
    if (target.matches('select, input[type="file"], textarea')){
        const contenedor = target.closest('.contenedor-general');
        limpiarError(contenedor);
        actualizarProgreso();
    }
});

/***********************************************************/

////////////////////////MANEJO DE PASOS////////////////////////
function irAlSiguientePaso(pasoActual) {
    const paso = document.getElementById(`step-${pasoActual}`);
    const siguientePaso = document.getElementById(`step-${pasoActual + 1}`);
    

    let todoBien = true;
    primerErrorMostrado = false;

    // Validación de los inputs del paso actual
    const inputs = paso.querySelectorAll('input[type="radio"], input[type="checkbox"], textarea, select, input[type="file"]');
    
    const validados = new Set();
    

    inputs.forEach(input => {
        const contenedor = input.closest('.contenedor-general') || input.closest('tr');
        if (!contenedor || validados.has(contenedor)) return;
        validados.add(contenedor);

        if (contenedor.classList.contains('opcional')) return;

        const tipo = input.type;
        let valorOk = false;

        if (tipo === 'radio' || tipo === 'checkbox') {
            const grupo = contenedor.querySelectorAll(`input[type="${tipo}"]`);
            if ([...grupo].some(i => i.checked)) valorOk = true;
        } else if (tipo === 'file') {
            if (input.files.length > 0) valorOk = true;
        } else {
            if (input.value.trim() !== '') valorOk = true;
        }

        if (!valorOk) {
            todoBien = false;
            mostrarError(contenedor, '⚠️ Tienes que contestar este campo.');
        }
    });

    if (todoBien) {
        paso.style.display = 'none';
        siguientePaso.style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
        actualizarProgreso();
    } else {
        errorToast();
    }
}

function irAlAnteriorPaso(pasoActual){
    const paso = document.getElementById(`step-${pasoActual}`)
    const pasoAnterior = document.getElementById(`step-${pasoActual - 1}`);

    paso.style.display = 'none';
    pasoAnterior.style.display = 'block';
    window.scrollTo({ top:0, behavior: 'smooth'});
}