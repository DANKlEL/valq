function cargarEstadisticaSexo() {
    // Crear contenedor para las gráficas
    $('#estadisticas-container').html(`
        <div class="chart-container" style="position: relative; height:30vh; width:70vw; margin: 0 auto;">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-container" style="position: relative; height:30vh; width:70vw; margin: 0 auto; display:ruby;">
            <canvas id="pieChart"></canvas>
        </div>
        <p>Hombres: ${hombres}, Mujeres: ${mujeres}</p>
    `);

    // Datos para las gráficas
    var data = {
        labels: ['Hombres', 'Mujeres'],
        datasets: [{
            label: 'Cantidad',
            data: [hombres, mujeres],
            backgroundColor: ['#0000FF', '#FFC0CB'], // Azul para hombres, rosa para mujeres
            borderColor: ['#0000FF', '#FFC0CB'],
            borderWidth: 1
        }]
    };

    // Opciones para la gráfica de barras
    var barOptions = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Crear gráfica de barras
    var barCtx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(barCtx, {
        type: 'bar',
        data: data,
        options: barOptions
    });

    // Opciones para la gráfica de pastel
    var pieOptions = {
        responsive: true
    };

    // Crear gráfica de pastel
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: data,
        options: pieOptions
    });
}
