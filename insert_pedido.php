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

    function require_params(array $param_names) {
      $params = [];
      foreach ($param_names as $pname) {
        if (!isset($_POST[$pname])) return false;
        $params[$pname] = $_POST[$pname];
      }
      return $params;
    }

    $data = require_params(["nombre", "email", "plato", "direccion"]);
    if ($_SERVER['REQUEST_METHOD'] != 'POST' || $data === false) {
      echo '<h1>Accesso invalido a pagina</h1>';
    } else {
      $conn = sql_connection();
      $stmt = mysqli_prepare($conn, "INSERT INTO pedido (nombre, email, plato, direccion) VALUES (?, ?, ?, ?)");
      mysqli_stmt_bind_param($stmt, "ssss", $data['nombre'], $data['email'], $data['plato'], $data['direccion']);

      if (mysqli_stmt_execute($stmt)) {
        echo '<h1>Pedido Creado</h1>';
      } else {
        echo '<h1>Error al intentar crear pedido</h1>';
      }
    }


    ?>

    <script>location.href='./pedidos.php'</script>
  </body>
</html>
