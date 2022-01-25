<div class="mb-5 mt-3">
    <div style="margin: auto;">
        <canvas id="postPieChart"></canvas>
    </div>
    {{-- <pre>
    {{ print_r($datas) }}
    {{ json_encode($datas) }} --}}
    <script>
        const pie = document.getElementById('postPieChart').getContext('2d');
        const postPieChart = new Chart(pie, {
            type: 'pie',
            data: {
                labels: ['E Hënë', 'E Marte', 'E Mërkur', 'E Enjëte', 'E Premte', 'E Shtune', 'E Dielë'],
                datasets: [{
                    label: 'Përdoruesit e ri',
                    data: <?= json_encode($datas) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(147, 250, 165, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(147, 250, 165, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
