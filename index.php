
<?php include('header.php'); ?>

<main>
    <!-- Imagen de portada con h1 -->
    <section class="portada">
        <h1>Estos son nuestros mejores platos</h1>
        <img src="./images/fondo.jpg" alt="Restaurante" class="imagen-portada">
    </section>

    <!-- Sección para mostrar el plato seleccionado -->
    <section class="platos">
        <h2>Selecciona un tipo de plato</h2>        
        <!-- Select para cambiar entre los tipos de platos -->
        <select id="tipoPlato" onchange="cambiarPlato()">
            <option value="entrada">Entrada</option>
            <option value="plato_principal">Plato Principal</option>
            <option value="postre">Postre</option>
        </select>
        
        <!-- Imagen y descripción que cambian según la selección -->
        <div id="platoSeleccionado" class="plato-item">
            <img id="imagenPlato" src="./images/ensalada.jpg" alt="Entrada ensalada" class="imagen-plato">
            <div id="descripcionPlato" class="descripcion-plato">
                <p>Deliciosa ensalada fresca con tomates y queso feta.</p>
            </div>
        </div>
    </section>
</main>

<script>
    function cambiarPlato() {
        const tipoPlato = document.getElementById('tipoPlato').value;
        const imagen = document.getElementById('imagenPlato');
        const descripcion = document.getElementById('descripcionPlato');

        if (tipoPlato === 'entrada') {
            imagen.src = './images/ensalada.jpg';
            descripcion.innerHTML = '<p>Deliciosa ensalada fresca con tomates y queso feta.</p>';
        } else if (tipoPlato === 'plato_principal') {
            imagen.src = './images/filete.jpg';
            descripcion.innerHTML = '<p>Un suculento filete con papas al gusto.</p>';
        } else if (tipoPlato === 'postre') {
            imagen.src = './images/pastel.jpg';
            descripcion.innerHTML = '<p>Exquisito pastel de chocolate con crema.</p>';
        }
    }
</script>

<?php include('footer.php'); ?>
