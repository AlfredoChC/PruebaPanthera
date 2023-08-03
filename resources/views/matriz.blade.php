<!DOCTYPE html>
<html>
<head>
    <title>Matriz 10x5</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            width: 50px;
            height: 50px;
            text-align: center;
            cursor: pointer;
        }

        .disabled {
            background-color: gray; /* Cambiar el color para deshabilitar */
            color: white; /* Cambiar el color del texto para deshabilitar */
        }

        .userdisabled{
            background-color: red; /* Cambiar el color para deshabilitar */
            color: white; /* Cambiar el color del texto para deshabilitar */
        }
    </style>
</head>
<body>
    <h2>Matriz 10x5</h2>
    <table>
        <?php
$disabledCells = [];

// Agregar celdas deshabilitadas al azar
while (count($disabledCells) < 5) {
    $randCell = rand(1, 50);
    if (!in_array($randCell, $disabledCells)) {
        $disabledCells[] = $randCell;
    }
}

// Generar matriz de 10x5
echo "<tbody>";
for ($row = 1; $row <= 10; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 5; $col++) {
        $cellId = ($row - 1) * 5 + $col;
        $disabled = in_array($cellId, $disabledCells) ? 'class="disabled"' : '';
        echo "<td id='cell$cellId' $disabled>$cellId</td>";
    }
    echo "</tr>";
}
echo "</tbody>";
?>
    </table>

    <script>
        const disabledCells = <?php echo json_encode($disabledCells); ?>;
        let disabledCount = <?php echo count($disabledCells); ?>;
    
        function disableCell(cell) {
            cell.classList.add('userdisabled');
            disabledCount++;
        }
    
        function handleClick(row, col) {
            const cellId = row * 5 + col + 1; // Identificador de celda (1 a 50)
            const cell = document.getElementById('cell' + cellId);
    
            if (disabledCells.includes(cellId)) {
                alert('Esta celda ya está deshabilitada');
            } else if (disabledCount >= 10) {
                alert('Ya has deshabilitado el máximo de 5 celdas refresca la pantalla!!!');
            } else {
                disableCell(cell);
            }
        }
    
        document.querySelectorAll('td').forEach(cell => {
            cell.addEventListener('click', function () {
                const row = this.parentNode.rowIndex;
                const col = this.cellIndex;
                handleClick(row, col);
            });
        });
    </script>
    <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Regresar a la pagina anterior</a>

</body>
</html>

