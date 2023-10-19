<?php
// Incluye el archivo de configuración de la base de datos
include("../../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se envió el formulario de edición
    if (isset($_POST["submit"])) {
        $product_id = isset($_POST["Id"]) ? $_POST["Id"] : null; // Obtén el ID del producto desde el formulario
        $new_name = $_POST["Name"];
        $new_description = $_POST["Description"];
        $new_due_date = $_POST["due_date"];

        // Verifica que el ID del producto no sea nulo antes de actualizar
        if ($product_id !== null) {
            // Actualizar el producto en la base de datos
            $sql = $conn->prepare("UPDATE products SET Name=?, Description=?, due_date=? WHERE Id=?");
            $sql->bind_param("sssi", $new_name, $new_description, $new_due_date, $product_id);

            if ($sql->execute()) {
                // Redirige de regreso a la página de edición con un mensaje de éxito
                header("Location: edit.php?id=" . $product_id . "&success=1");
                exit();
            } else {
                // Redirige de regreso a la página de edición con un mensaje de error
                header("Location: edit.php?id=" . $product_id . "&error=1");
                exit();
            }

            $sql->close();
        } else {
            // Manejar el caso en el que no se recibe el ID
            echo "ID de producto no especificado.";
        }
    }
}

// Si llega a esta parte sin procesar el formulario, redirige a una página adecuada
header("Location: ../crud/index.php"); // Cambia la URL según tu estructura de carpetas
exit();
?>
