@extends('template.main')

@section('title', 'Dashboard')
<style>
     .card {
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 300px;
    margin: 15px;
    padding: 20px;
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card h3 {
    margin-top: 0;
    font-size: 24px;
    position: relative;
    top: -2rem;
  }

  .card p {
    color: #666;
    font-size: 20px;
    position: relative;
    top: -2rem;
  }

  .card .icon {
    font-size: 48px;
    color: #ffffff;
    align-self: flex-end;
    position: relative;
    opacity: 0.5;
    top: 1.5rem;
  }
  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
  }
  .main-cart{
    width: 70%;
        position: relative;
        left: 7rem;
        background: #fefefe;
        padding: 10px;
        box-shadow: 0 0 1px #000;
        margin: 10px auto;
  }

  #chart-container {
        width: 100%;
        position: relative;
        /* left: 7rem; */
        background: #fefefe;
        padding: 10px;
        box-shadow: 0 0 1px #d1d1d1;
        margin: 10px auto;

    }

    #employmentChart {
        width: 100%;
        height: 400px;
    }
    .chart-title{
        text-align: center;
        font-size: 25px;
    }
</style>
@section('content')
    <div class="content-header">
        <div class="container-fluid">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
            </div>


<div class="container">
    <div class="card bg-info">
        <i class="icon fas fa-users"></i>
        <h3 class="card-title" style="color: #fefefe; font-weight:800">{{ $alumni }}</h3>
        <p class="card-text" style="color: #fefefe">Total Alumni Registered</p>
    </div>
    <div class="card bg-success">
        <i class="icon fa-solid fa-arrows-rotate"></i>
        <h3 class="card-title" style="color: #fefefe;  font-weight:800">{{ $pendingAlumniCount }}</h3>
        <p class="card-text" style="color: #fefefe">Pending Alumni Employment Data</p>
    </div>
    <div class="card bg-warning">
        <i class="icon fas fa-users"></i>
        <h3 class="card-title" style="  font-weight:800">{{ $employmentdata }}</h3>
        <p class="card-text">Total Alumni Already Responded To The Survey</p>

    </div>



        </div>
    </div>


</div>
</div>
<div class="main-cart">
    <div class="chart-title">Semi-Annual Report on Alumni Employment Status</div><hr>
    <div>
        <label for="semiAnnualSelector">Filter by Semi-Annual Period:</label>
        <select id="semiAnnualSelector">
            <option value="1" selected>(January - June)</option>
            <option value="2">(July - December)</option>
        </select>

        <label for="yearSelector"></label>
        <select id="yearSelector">
            @foreach(range(2013, date('Y')) as $year)
                <option value="{{ $year }}" @if($year == date('Y')) selected @endif>{{ $year }}</option>
            @endforeach
        </select>
    </div>
    <div id="chart-container">
        <canvas id="employmentChart" width="400" height="130"></canvas>
    </div>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('employmentChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Employed', 'Not Employed', 'With Job Offer'],
                datasets: []
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) { return Number.isInteger(value) ? value : null; }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });

        function fetchAndUpdateChart(semiAnnual, year) {
            fetch(`/getEmploymentData/${semiAnnual}/${year}`)
                .then(response => response.json())
                .then(data => {
                    const employedCount = data.employedCount || 0;
                    const unEmployedCount = data.unEmployedCount || 0;
                    const withJobOfferCount = data.withJobOfferCount || 0;

                    chart.data.datasets = [
                        {
                            label: 'Employed',
                            data: [employedCount],
                            backgroundColor: '#716E9F',
                            borderColor: '#716E9F',
                            borderWidth: 0,
                            barPercentage: 3.5,
                            categoryPercentage: 2
                        },
                        {
                            label: 'Not Employed',
                            data: [, unEmployedCount],
                            backgroundColor: '#F7A859',
                            borderColor: '#F7A859',
                            borderWidth: 0,
                            barPercentage: 3,
                            categoryPercentage: 1.0
                        },
                        {
                            label: 'With Job Offer',
                            data: [, , withJobOfferCount],
                            backgroundColor: 'rgb(0, 191, 255)',
                            borderColor: 'rgb(0, 191, 255)',
                            borderWidth: 0,
                            barPercentage: 5,
                            categoryPercentage: -1.0
                        }
                    ];
                    chart.update();
                });
        }

        // Initialize chart with current semi-annual and year data
        const currentSemiAnnual = 1;
        const currentYear = new Date().getFullYear();
        fetchAndUpdateChart(currentSemiAnnual, currentYear);

        // Add event listener to update chart when semi-annual period or year is changed
        document.getElementById('semiAnnualSelector').addEventListener('change', function() {
            const selectedSemiAnnual = this.value;
            const selectedYear = document.getElementById('yearSelector').value;
            fetchAndUpdateChart(selectedSemiAnnual, selectedYear);
        });

        document.getElementById('yearSelector').addEventListener('change', function() {
            const selectedSemiAnnual = document.getElementById('semiAnnualSelector').value;
            const selectedYear = this.value;
            fetchAndUpdateChart(selectedSemiAnnual, selectedYear);
        });
    });
</script>
