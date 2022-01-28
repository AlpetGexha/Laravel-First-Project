<div class="mb-5 mt-3">
    <div style="margin: auto;">


        @if (count($datas) > 0)
            <canvas id="viewCountWeekLine"></canvas>
        @else
            <span class="d-flex justify-content-center" style="color: var(--danger)">Nuk ka rezultat për këtë javë</span>
        @endif

    </div>
    {{-- <pre>
    {{ print_r($datas) }}
    {{ json_encode($datas) }} --}}
    <script>
        const viewWeek = document.getElementById('viewCountWeekLine').getContext('2d');
        const viewCountWeekLine = new Chart(viewWeek, {
            type: 'line',
            data: {
                labels: <?= json_encode($data_time) ?>,
                datasets: [{
                    label: 'Shikimet për javë',
                    data: <?= json_encode($datas) ?>,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
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
