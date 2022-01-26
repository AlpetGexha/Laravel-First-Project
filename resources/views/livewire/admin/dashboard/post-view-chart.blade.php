<div class="mb-5 mt-3">
    <div style="margin: auto;">
        @if (count($views) > 0)
            <canvas id="viewCountLine"></canvas>
        @else
            <span class="d-flex justify-content-center" style="color: var(--danger)">Nuk ka rezultat</span>
        @endif
    </div>
    {{-- <pre>
    {{ print_r($datas) }}
    {{ json_encode($datas) }} --}}
    <script>
        const view = document.getElementById('viewCountLine').getContext('2d');
        const viewCountLine = new Chart(view, {
            type: 'line',
            data: {
                labels: <?= json_encode($mounth) ?>,
                datasets: [{
                    label: 'Shikimet e potimeve',
                    data: <?= json_encode($views) ?>,
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
