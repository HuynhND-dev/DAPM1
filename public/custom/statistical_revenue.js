var dataDiv = document.getElementById('data');
var revenue = dataDiv.getAttribute('revenue');
console.log(revenue);
$(function chart() {
    'use strict';
    var areaOptions = {
        plugins: {
            filler: {
                propagate: true
            }
        }
    }
    $(function ()
    {
        $('input[name="chart_revenue"]').daterangepicker(
            {
                locale: {
                    format: 'DD/MM/YYYY'
                },
                startDate: '16/07/2023',
                endDate: '16/07/2023'
            },
            function (start, end, label) {
                // alert(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                var revenue = document.getElementById('filter').value;
                console.log(revenue);
                $(document).ready(function () {
                    $.ajax({
                        url: "/admin/statistical/revenue-statistical",
                        type: "GET",
                        data: {
                            star_date: start.format('YYYY-MM-DD'),
                            end_date: end.format('YYYY-MM-DD'),
                            filter: revenue
                        },
                        dataType: 'json',
                        success: function (result) {
                            $('#chart_revenue').remove();
                            $('#revenue').append('<canvas id="chart_revenue"></canvas>');

                            // var employer = result.employer;
                            // var candidate = result.candidate;
                            // var userDeleted = result.userdelete;

                            var areaChartCanvas = $("#chart_revenue").get(0).getContext("2d");
                            areaData.labels = [];
                            areaData.datasets = [];

                            const labels = [];
                            const data = [];
                            $.each(result, function (key, value) {
                               labels.push(value.ngay);
                                data.push(value.doanh_thu)
                                // labels.push(value.ngay)
                            })
                            console.log(labels);
                            var areaChart = new Chart(areaChartCanvas, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Doanh thu (1000VND)',
                                        data: data,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1,
                                        fill: true, // 3: no fill
                                    }]
                                },
                                options:  areaOptions
                            });

                            // console.log(result);
                        },
                        error: function (xhr) {
                            console.log('ajax error');

                        }
                    });
                });
                areaChart.update();
            });
    });

    var areaData = {
        labels: ["Hôm nay",],
        datasets: [{
            label: 'Doanh thu (1000VND)',
            data: [revenue, revenue],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }]
    };




    if ($("#chart_revenue").length) {
        var areaChartCanvas = $("#chart_revenue").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaData,
            options: areaOptions
        });
    }

});



