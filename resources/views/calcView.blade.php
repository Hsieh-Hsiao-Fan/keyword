<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="p-4">

        <div id="container"></div>
    </div>
    <div class="flex w-full flex-wrap	">
        @foreach ($employees as $employee)
        <a href="{{ url("/keyword/$employee->uuid") }}">
            <div class="m-1 p-2 bg-orange-400 flex justify-center rounded" style="min-width:60px;">{{$employee->name}}</div>
        </a>
        @endforeach
    </div>
    <script>
        let chart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: '即時統計',
                align: 'left'
            },

            xAxis: {
                categories: [],
            },
            yAxis: {
                min: 0,
                max: 30,
                title: {
                    text: '個',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
                gridLineWidth: 0
            },
            tooltip: {},
            legend: {

            },
            credits: {
                enabled: false
            },
            series: [{
                name: '',
                data: []
            }]
        });

        function updateChartData() {
            $.ajax({
                url: "/api/keyword/calc",
                type: "GET",
                success: function(data) {
                    let temdata = [];
                    let temEmp = []
                    data.data.forEach(element => {
                        temdata.push(element.count);
                        temEmp.push(element.name)
                    })

                    chart.series[0].setData(temdata);
                    chart.xAxis[0].update({
                        categories: temEmp
                    });
                },
                error: function(xhr, status, error) {}
            });
        }

        $(function() {
            setInterval(updateChartData, 2000);
        });
    </script>
</body>

</html>