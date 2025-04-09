<?php

require_once(__DIR__ . '/connection.php');

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Pedido</title>
  </head>
  <body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['pedido'])) {
      echo '<h1>Accesso invalido a pagina</h1>';
    } else {
      $conn = sql_connection();
      $stmt = mysqli_prepare($conn, "UPDATE pedido SET completado=TRUE WHERE id=?");
      mysqli_stmt_bind_param($stmt, "i", $_POST['pedido']);

      if (mysqli_stmt_execute($stmt)) {
        echo '<h1>Pedido Actualizado</h1>';
      } else {
        echo '<h1>Error al intentar actualizar</h1>';
      }
    }


    ?>

    <script>location.href='./pedidos.php'</script>
  </body>
</html>
