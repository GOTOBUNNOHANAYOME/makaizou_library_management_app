@extends('admin.layout.app')

@section('content')
<div class="container">
    <div class="small-box bg-gradient-primary">
        <div class="inner">
        <h3>{{ $today_created }}</h3>
        <p>本日登録したユーザー数</p>
        </div>
        <div class="icon">
        <i class="fas fa-user-plus"></i>
        </div>
    </div>
</div>

<div class="container">
    <canvas id="chart"></canvas>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        var ctx = $('#chart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($date),
                datasets: [{
                    label: '新規ユーザー数',
                    data: @json($created_user_count),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        display: true,
                        title: {
                        display: true
                        }
                    },
                    y: {
                        beginAtZero: false,
                        ticks: {
                        stepSize: 1,
                    },
                    suggestedMin: 0,
                    suggestedMax: 100
                    }
                }
            }
        });
    });
</script>
@endsection