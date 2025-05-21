<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre_completo = $_POST['email'];
    $alias = $_POST['Alias'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $barbero_id = $_POST['barbero'];
    $corte_id = $_POST['desc'];
    
    // Insertar en la base de datos
    $query = "INSERT INTO citas (nombre_cliente, alias, fecha, hora, barbero_id, corte_id) 
              VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssssii", $nombre_completo, $alias, $fecha, $hora, $barbero_id, $corte_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Cita agendada con éxito');</script>";
    } else {
        echo "<script>alert('Error al agendar la cita');</script>";
    }
    
    $stmt->close();
}
?>

<script>
// Esto iría después de tu código PHP que consulta la base de datos
const BARBEROS = <?php 
    $barberos = [];
    while($row = $result_barberos->fetch_assoc()) {
        $barberos[] = $row;
    }
    echo json_encode($barberos); 
?>;

const CATEGORIAS_CORTE = <?php 
    $categorias = [];
    while($row = $result_categorias->fetch_assoc()) {
        $categorias[] = $row;
    }
    echo json_encode($categorias); 
?>;

// Ahora puedes usar estas constantes en tu JavaScript
console.log(BARBEROS);
console.log(CATEGORIAS_CORTE);
</script>