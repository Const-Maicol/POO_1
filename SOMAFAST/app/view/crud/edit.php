<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <?php
    // Incluye el archivo de configuración de la base de datos
    include("../../config/config.php");

    // Verifica si se envió un ID válido por GET
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $product_id = $_GET["id"];

        // Consulta para obtener la información del producto por su ID
        $sql = $conn->prepare("SELECT * FROM products WHERE Id = ?");
        $sql->bind_param("i", $product_id);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows === 1) {
            $producto = $result->fetch_assoc();
        } else {
            echo '<div class="alert alert-danger">El producto no existe.</div>';
        }

        $sql->close();
    } else {
        echo '<p>ID de producto no válido.</p>';
        exit();
    }
    ?>
    <!-- Verifica si $producto está definido antes de mostrar el formulario de edición -->
    <?php if (isset($producto)) { ?>
        <form method="post" action="../../controller/edit_product.php"> <!-- Cambia "edit_product.php" al nombre de tu controlador de edición -->
            <input type="hidden" name="Id" value="<?= $producto['Id'] ?>">
            <div>
                <label for="Name">Nombre del producto:</label>
                <input type="text" name="Name" value="<?= htmlspecialchars($producto['Name']) ?>">
            </div>
            <div>
                <label for="Description">Descripción:</label>
                <textarea name="Description"><?= htmlspecialchars($producto['Description']) ?></textarea>
            </div>
            <div>
                <label for="due_date">Fecha de Vencimiento:</label>
                <input type="date" name="due_date" value="<?= htmlspecialchars($producto['due_date']) ?>">
            </div>
            <!-- Agrega más campos según la estructura de tu base de datos -->
            <div>
                <input type="submit" name="submit" value="Guardar Cambios">
            </div>
        </form>
    <?php } ?>
    <a href="../crud/index.php">Volver a la lista de productos</a>
</body>
</html>
