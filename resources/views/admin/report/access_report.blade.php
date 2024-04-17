@extends('admin.layout.app')

@section('content')
<div class="row">
    <div class="container">
        <div class="small-box bg-gradient-success">
            <div class="inner">
            <h3>{{ $today_access }}</h3>
            <p>本日のログインユーザー数</p>
            </div>
            <div class="icon">
            <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>

    <div class="container">
        <canvas id="chart"></canvas>
    </div>    
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
                    label: 'ログインユーザー数',
                    data: @json($access_count),
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