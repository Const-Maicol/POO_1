<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <?php
    include("../../config/config.php");

    // Obtener la lista de productos desde la base de datos
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>ID: " . $row['Id'] . "</p>";
            echo "<p>Nombre: " . $row['Name'] . "</p>";
            echo "<p>Descripción: " . $row['Description'] . "</p>";
            echo "<p><img src='" . $row['Images'] . "' alt='" . $row['Name'] . "'></p>";
            echo "<p>Fecha de Vencimiento: " . $row['due_date'] . "</p>";

            // Agregar un botón para eliminar el producto con este ID
            echo "<form method='post' action='../../controller/crud/delete.php'>";
            echo "<input type='hidden' name='product_id' value='" . $row['Id'] . "'>";
            echo "<button type='submit'>Eliminar Producto</button>";
            echo "</form>";
        }
    } else {
        echo "No se encontraron productos.";
    }

    $conn->close();
    ?>
</body>
</html>
