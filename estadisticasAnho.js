function cargarEstadisticaAnho() {
    var ctx = document.createElement('canvas');
    ctx.id = 'estadisticasChart';
    var container = document.getElementById('estadisticas-container');
    container.innerHTML = '';
    container.appendChild(ctx);

    var data = {
        labels: Object.keys(edades),
        datasets: [{
            label: 'Cantidad de personas',
            data: Object.values(edades),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        responsive: true,
        maintainAspectRatio: false
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
}
