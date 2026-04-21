<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormularioTJAM</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="barra-progreso">
        <div id="barra" class="barra">0%</div>
    </div>
    <!-- Primero Parte del Cuestionario -->
    <div class="form-step" id="step-1">
    

    <div class="contenedor-contenedor">

   
    <h2>Si fueran los candidatos al gobierno de Michoacán ¿por quién votaria?</h2>
     <h4>Escenario 0:</h4>
    <div class="contenedor-general">  
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Eric Iturbide</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Alex Trinidad</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Angel Lemus</p>
        </div>
        
    </div>

    <h4>Escenario 1:</h4>
    <div class="contenedor-general">  
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Fabiola Alanís</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Alfonso Martínez</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Guillermo Valencia</p>
        </div>
        
    </div>  
    
    
    <h2>Algun comentario:</h2>
    <div class="contenedor-general" id="comentario-opcional">
       <textarea class="comentario" name="comentario" id="comentario" rows="5" cols="40" placeholder="Escribe algo aqui..."></textarea> 
    </div>

    <h2>Edad</h2>
    <div class="contenedor-general">  
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 18 y 25</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 26 y 35</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 36 y 45</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 46 y 59</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Más de 60</p>
        </div>
    </div>


    <h2>Género</h2>
    <div class="contenedor-general">
        <div class="votacion">
                <input class="votar" type="checkbox" onclick="checkGeneroOne(this)">
                <p>Hombre</p>
            </div>
            <div class="votacion">
                <input class="votar" type="checkbox" onclick="checkGeneroOne(this)">
                <p>Mujer</p>
            </div>
            <div class="votacion">
                <input class="votar" type="checkbox" onclick="checkGeneroOne(this)">
                <p>Otro</p>
            </div>
        </div>


        <h2>¿Qué opinión tiene sobre los siguientes candidatos?</h2>
    <table>
        <thead>
            <tr>
            <th>Candidato</th>
            <th>Valoracion</th>
            <th>Profesión</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Eric</td>
                <td>
                    <div class="contenedor-general opcional">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
                    <td>
                        <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>Alex</td>
                    <td>
                        <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
                    <td>
                        <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
            
                </tr>
                
            </tbody>
        </table>



        <div class="contenedor-button">
            <button class="siguiente-formulario" onclick="irAlSiguientePaso(1)">Siguiente</button>
        </div>


    </div>
    </div>
    

    <!-- Segunda Parte del Cuestionario -->
<div class="form-step" id="step-2">

    <div class="contenedor-contenedor">

   
    <h2>Si fueran los candidatos al gobierno de Michoacán ¿por quién votaria?</h2>
     <h4>Escenario 0:</h4>
    <div class="contenedor-general">  
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Eric Iturbide</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Alex Trinidad</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Angel Lemus</p>
        </div>
        
    </div>

    <h4>Escenario 1:</h4>
    <div class="contenedor-general">  
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Fabiola Alanís</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Alfonso Martínez</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radiosOnlyOne(this)">
            <p>Guillermo Valencia</p>
        </div>
        
    </div>  
    
    
    <h2>Algun comentario:</h2>
    <div class="contenedor-general" id="comentario-opcional">
       <textarea class="comentario" name="comentario" id="comentario" rows="5" cols="40" placeholder="Escribe algo aqui..."></textarea> 
    </div>

    <h2>Edad</h2>
    <div class="contenedor-general">  
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 18 y 25</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 26 y 35</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 36 y 45</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Entre 46 y 59</p>
        </div>
        <div class="votacion">
            <input class="votar" type="radio" onclick="radioOnlyOne(this)">
            <p>Más de 60</p>
        </div>
    </div>


    <h2>Género</h2>
    <div class="contenedor-general opcional">
        <div class="votacion">
                <input class="votar" type="checkbox" onclick="checkGeneroOne(this)">
                <p>Hombre</p>
            </div>
            <div class="votacion">
                <input class="votar" type="checkbox" onclick="checkGeneroOne(this)">
                <p>Mujer</p>
            </div>
            <div class="votacion">
                <input class="votar" type="checkbox" onclick="checkGeneroOne(this)">
                <p>Otro</p>
            </div>
        </div>


        <h2>¿Qué opinión tiene sobre los siguientes candidatos?</h2>
    <table>
        <thead>
            <tr>
            <th>Candidato</th>
            <th>Valoracion</th>
            <th>Profesión</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Eric</td>
                <td>
                    <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
                    <td>
                        <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>Alex</td>
                    <td>
                        <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
                    <td>
                        <div class="contenedor-general">
                    <select name="opcion" id="opciones">
                        <option value="">Selecciona una Opcion</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                    </div>
                    </td>
            
                </tr>
                
            </tbody>
        </table>



        <div class="contenedor-button">
            <button type="button" class="anterior-formulario" onclick="irAlAnteriorPaso(2)">Anterior</button>
            <button type="button" class="enviar-formulario" onclick="validarTodo()">Enviar</button>
        </div>

    
    </div>
    </div>
    
    <div id="toast" class="toast">✔️ Formulario completo. Gracias por contestarlo.
        </div>

    <div id="error-toast" class="error-toast">❌ Formulario incompleto. Por favor, completa todas las respuestas.
    </div>

    <script src="script.js"></script>
</body>
</html>