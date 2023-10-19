<?php
include("../../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_id"]) && is_numeric($_POST["product_id"])) {
        $product_id = $_POST["product_id"];

        // Prepara y enlaza la consulta SQL para eliminar el producto por su ID
        $stmt = $conn->prepare("DELETE FROM products WHERE Id = ?");
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            // La eliminación fue exitosa
            echo "Producto con ID " . $product_id . " eliminado exitosamente.";
        } else {
            // Hubo un error al eliminar el producto
            echo "Error al eliminar el producto.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
