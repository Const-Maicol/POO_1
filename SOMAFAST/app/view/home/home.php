
<!DOCTYPE html>
<html>
<head>
    <title>Ventas en Línea</title>
    
    <?php
    include('../assets/css/css.php')
    ?>
</head>
<body>

<?php

  include('../assets/view/header.php')
?>

<div class="container mt-5">
    <h2 class="mb-4">Categorías Destacadas</h2>
    <div class="row">
      <!-- Categoría Electrodomésticos -->
      <div class="col-md-4 mb-4">
        <div class="card border-primary h-100">
          <img src="https://tse2.mm.bing.net/th?id=OIP.Y47EkqOfeW3vTUfY84D9XAHaEb&pid=Api&P=0&h=180" class="card-img-top" alt="Electrodomésticos">
          <div class="card-body">
            <h5 class="card-title h4">Electrodomésticos</h5>
            <p class="card-text">¡No pierdas más tiempo! Explora nuestra tienda en línea y encuentra el electrodoméstico perfecto para ti. Nuestro equipo de expertos estará encantado de ayudarte en todo momento. Mejora tu vida en el hogar con nuestros increíbles electrodomésticos.</p>
            <a href="../categorias/elec.php" class="btn btn-primary btn-lg">Explorar</a>
          </div>
        </div>
      </div>

      <!-- Categoría Mercado -->
      <div class="col-md-4 mb-4">
        <div class="card border-success h-100">
          <img src="https://tse2.mm.bing.net/th?id=OIP.1ohXGYjGsj2knt44DG_lTwHaE7&pid=Api&P=0&h=180" class="card-img-top" alt="Mercado">
          <div class="card-body">
            <h5 class="card-title h4">Mercado</h5>
            <p class="card-text">Descubre nuestra amplia variedad de productos frescos y de alta calidad. Desde frutas y verduras hasta carnes y lácteos, tenemos todo lo que necesitas para tus compras de mercado.</p>
            <a href="../categorias/ali.php" class="btn btn-success btn-lg">Descubrir</a>
          </div>
        </div>
      </div>

      <!-- Categoría Juguetes -->
      <div class="col-md-4 mb-4">
        <div class="card border-warning h-100">
          <img src="https://tse1.mm.bing.net/th?id=OIP.JBlGgEJqWbFg6PIsSHP8LgHaFi&pid=Api&P=0&h=180" class="card-img-top" alt="Juguetes">
          <div class="card-body">
            <h5 class="card-title h4">Juguetes</h5>
            <p class="card-text">¡Encuentra los juguetes perfectos para los más pequeños! Tenemos una selección de juguetes educativos y divertidos que estimularán su imaginación y creatividad.</p>
            <a href="../categorias/jug.php" class="btn btn-warning btn-lg">Ver más</a>
          </div>
        </div>
      </div>
    </div>
  </div>
 
    </div>





<?php
  include('../assets/js/js.php');
?>


</body>
</html>
