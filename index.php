<!DOCTYPE html>
<html>
<head>
    <title>Aplicación de Cotización</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <h1>Aplicación de Cotización</h1>

    <!-- Categorías -->
    <div class="categories">
        <h2>Categorías:</h2>
        <ul>
            <li><a href="#tarifas">Tarifas Particulares</a></li>
            <li><a href="#insumos">Insumos</a></li>
            <li><a href="#medicamentos">Medicamentos</a></li>
            <li><a href="#no-tarifa">NO-Tarifa de Heridas</a></li>
        </ul>
    </div>

    <!-- Sección de Tarifas Particulares -->
    <div id="tarifas" class="section">
        <h2>Tarifas Particulares</h2>
        <input type="text" id="search-tarifas" placeholder="Buscar...">
        <ul>
            <!-- Aquí se generará la lista de tarifas mediante PHP -->
            <?php
            // Array de tarifas particulares
            $tarifasParticulares = array(
                array("TERAPIA FISICA", "60.000,00"),
                array("TERAPIA FONOADIOLOGIA", "60.000,00"),
                array("TERAPIA OCUPACIONAL", "60.000,00"),
                // Agrega más tarifas aquí si es necesario
            );

            foreach ($tarifasParticulares as $tarifa) {
                echo '<li>';
                echo '<input type="checkbox" class="checkbox-tarifas" value="' . $tarifa[0] . '"> ' . $tarifa[0];
                echo ' <input type="number" class="cantidad-tarifas" min="1" value="1">';
                echo '</li>';
            }
            ?>
        </ul>
        
    </div>

    <!-- Sección de Insumos -->
    <div id="insumos" class="section">
        <h2>Insumos</h2>
        <input type="text" id="search-insumos" placeholder="Buscar...">
        <ul>
            <!-- Aquí se generará la lista de insumos mediante PHP -->
            <?php
            // Array de insumos
            $insumos = array(
                array("MED439", "ALSUCRAL 1GR CAJA X 20 TAB", "MEDICAMENTOS POS", "1.286", "2.187"),
                array("MED298", "ASKINA FOAM 10 X 10", "MATERIALES E INSUMOS MEDICOS QUIRURGICOS", "26.460", "44.982"),
                // Agrega más insumos aquí si es necesario
            );

            foreach ($insumos as $insumo) {
                echo '<li>';
                echo '<input type="checkbox" class="checkbox-insumos" value="' . $insumo[0] . '"> ' . $insumo[1];
                echo ' <input type="number" class="cantidad-insumos" min="1" value="1"> ';
                echo '</li>';
            }
            ?>
        </ul>
     
    </div>

    <!-- Sección de Medicamentos -->
    <div id="medicamentos" class="section">
        <h2>Medicamentos</h2>
        <input type="text" id="search-medicamentos" placeholder="Buscar...">
        <ul>
            <!-- Aquí se generará la lista de medicamentos mediante PHP -->
            <?php
            // Array de medicamentos
            $medicamentos = array(
                array("MED461", "CEFTAROLINA 600MG", "MEDICAMENTOS POS", "169.000,00", "287.300,00"),
                array("MED460", "PARACETAMOL 1GR SOLUCION INYECTABLE", "MEDICAMENTOS POS", "10.710,00", "18.207,00"),
                // Agrega más medicamentos aquí si es necesario
            );

            foreach ($medicamentos as $medicamento) {
                echo '<li>';
                echo '<input type="checkbox" class="checkbox-medicamentos" value="' . $medicamento[0] . '"> ' . $medicamento[1];
                echo ' <input type="number" class="cantidad-medicamentos" min="1" value="1">';
                echo '</li>';
            }
            ?>
        </ul>
        
    </div>

    <!-- Sección de NO-Tarifa de Heridas -->
    <div id="no-tarifa" class="section">
        <h2>NO-Tarifa de Heridas</h2>
        <input  type="text" id="search-no-tarifa" placeholder="Buscar..." class="cantidad-tarifas">
        <ul>
            <!-- Aquí se generará la lista de NO-Tarifa de Heridas mediante PHP -->
            <?php
            // Array de NO-Tarifa de Heridas
            $noTarifaHeridas = array(
                array("CURACION DE HERIDA COMPLEJA TIPO I", "869500-1", "280.000"),
                array("CURACION DE HERIDA COMPLEJA TIPO II", "869500-2", "380.000"),
                // Agrega más NO-Tarifa de Heridas aquí si es necesario
            );

            foreach ($noTarifaHeridas as $herida) {
                echo '<li>';
                echo '<input type="checkbox" class="checkbox-no-tarifa" value="' . $herida[0] . '"> ' . $herida[0];
                echo ' <input type="number" class="cantidad-no-tarifa" min="1" value="1">';
                echo '</li>';
            }
            ?>
        </ul>
        <button onclick="openModal()">Cotizar</button>

    </div>

    <!-- Modal de Cotización -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Resumen de Cotización</h2>
            <div id="cotizacion-resumen"></div>
            <p id="cotizacion-total">Total: </p>
            <button onclick="goBack()">Regresar</button>
            <button onclick="generatePDF()">Enviar cotización</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
**styles.css:**
```css
<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
}

.categories ul {
    list-style-type: none;
    padding: 0;
    margin-bottom: 20px;
}

.categories ul li {
    display: inline;
    margin-right: 10px;
}

.section {
    margin-bottom: 40px;
}

.section h2 {
    margin-bottom: 10px;
}

.section input[type="text"] {
    margin-bottom: 10px;
    padding: 5px;
    width: 100%;
}

.section ul {
    list-style-type: none;
    padding: 0;
}

.section li {
    margin-bottom: 5px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #ddd;
}

#cotizacion-resumen {
    margin-bottom: 10px;
}

#cotizacion-total {
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .modal-content {
        width: 90%;
    }
}

</style>