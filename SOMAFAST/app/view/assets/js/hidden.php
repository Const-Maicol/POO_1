<!-- Agrega este script en tu archivo HTML o enlázalo desde un archivo JavaScript externo -->
<script>
    // Función para ocultar elementos del header en los formularios
    function ocultarHeaderEnFormularios() {
        // Obtener los elementos del header que deseas ocultar por su ID
        const opcion1 = document.getElementById('1');
        const opcion2 = document.getElementById('2');
        const opcion3 = document.getElementById('3');

        // Ocultar los elementos del header en los formularios
        opcion1.style.display = 'none';
        opcion2.style.display = 'none';
        opcion3.style.display = 'none';
    }

    // Ejecutar la función al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        ocultarHeaderEnFormularios();
    });
</script>
