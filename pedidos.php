<?php
    // Mostrar todos los pedidos disponibles
    $sqlPedidosDisponibles = "SELECT * FROM pedidos WHERE estado = 0";
    $resultPedidosDisponibles = mysqli_query($conexion , $sqlPedidosDisponibles);

    // Pedidos completados
    $sqlPedidosCompletos = "SELECT * FROM pedidos ";
    $resultPedidosCompletos = mysqli_query($conexion , $sqlPedidosCompletos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <h1>NUEVOS PEDIDOS:</h1>
        <form action="insert_pedido.php" method="POST">
            <label for="nombre" name="nombre" class="nombre">Nombre:</label>
            <input type="text" name="nombre" class="nombreIn">

            <label for="email" name="email" class="email">Email:</label>
            <input type="email" name="email" class="emailIn">

            <label for="platos" name="platos" class="platos">Plato elegido:</label>
            <select name="platos" id="platos">
                <option value="plato1">Entrada</option>
                <option value="plato2">Plato principal</option>
                <option value="plato3">Postre</option>
            </select>

            <label for="direccion" name="direccion" class="direccion">Dirección:</label>
            <input type="direccion" name="direccion" class="direccionIn">

            <button type="submit">Agregar pedido</button>
            
        </form>
    </fieldset>

    <fieldset>
    
        <?php
            print ("<h1>PEDIDOS REGISTRADOS:</h1>") ;
            echo '<table>';
            echo '<tr><th>Nombre</th><th>Email</th><th>Plato elegido</th><th>Dirección</th></tr>';

            while ($pedidoDisponible = mysqli_fetch_array($resultPedidosDisponibles, MYSQLI_ASSOC)) {
            
            echo '<tr>';
            echo '<td>' . $pedidoDisponible['nombre'] . '</td>';
            echo '<td>' . $pedidoDisponible['email'] . '</td>';
            echo '<td>' . $pedidoDisponible['plato'] . '</td>';
            echo '<td>' . $pedidoDisponible['direccion'] . '</td>';
            echo '<td>';
            echo '<form action="update_pedido.php" method="POST">';
            echo '<input type="hidden" name="pedido" value="' . $pedidoDisponible['nombre'] . '">';
            echo '<button type="submit">Completado</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </fieldset>

    <fieldset>
    
        <?php
            print ("<h1>PEDIDOS COMPLETADOS:</h1>") ;
            echo '<table>';
            echo '<tr><th>Nombre</th><th>Email</th><th>Plato elegido</th><th>Dirección</th></tr>';

            while ($pedidoCompletado = mysqli_fetch_array($resultPedidosCompletados, MYSQLI_ASSOC)) {
            
            echo '<tr>';
            echo '<td>' . $pedidoCompletado['nombre'] . '</td>';
            echo '<td>' . $pedidoCompletado['email'] . '</td>';
            echo '<td>' . $pedidoCompletado['plato'] . '</td>';
            echo '<td>' . $pedidoCompletado['direccion'] . '</td>';
            echo '<td>';
            echo '<form action="delete_pedido.php" method="POST">';
            echo '<input type="hidden" name="pedido" value="' . $pedidoCompletado['nombre'] . '">';
            echo '<button type="submit">Borrar pedido</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </fieldset>
</body>
</html>