var dataDiv = document.getElementById('data');
var employer = dataDiv.getAttribute('employer');
var candidate = dataDiv.getAttribute('candidate');
var userDeleted = dataDiv.getAttribute('userDeleted');

$(function chart() {
    'use strict';
    var doughnutPieData = {
        datasets: [{
            data: [userDeleted, candidate, employer,],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }],
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Người dùng đã xoá',
            'Ứng viên',
            'Nhà tuyển dụng',
        ]
    };



    $(function ()
    {
        $('input[name="chart_user"]').daterangepicker(
            {
                locale: {
                    format: 'DD/MM/YYYY'
                },
                startDate: '16/07/2023',
                endDate: '16/07/2023'
            },
            function (start, end, label) {
                // alert(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                $(document).ready(function () {
                    $.ajax({
                        url: "/admin/statistical/user-statistical",
                        type: "GET",
                        data: {
                            star_date: start.format('YYYY-MM-DD'),
                            end_date: end.format('YYYY-MM-DD')
                        },
                        dataType: 'json',
                        success: function (result) {
                            $('#chart_user').remove();
                            $('#user').append('<canvas id="chart_user"></canvas>');



                            var employer = result.employer;
                            var candidate = result.candidate;
                            var userDeleted = result.userdelete;
                            var doughnutChartCanvas = $("#chart_user").get(0).getContext("2d");

                            doughnutPieData.labels = [];
                            doughnutPieData.datasets = [];

                            var doughnutChart = new Chart(doughnutChartCanvas, {
                                type: 'doughnut',
                                data: {
                                    datasets: [{
                                        data: [userDeleted,candidate, employer,],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.5)',
                                            'rgba(54, 162, 235, 0.5)',
                                            'rgba(255, 206, 86, 0.5)',
                                            'rgba(75, 192, 192, 0.5)',
                                            'rgba(153, 102, 255, 0.5)',
                                            'rgba(255, 159, 64, 0.5)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                    }],
                                    // These labels appear in the legend and in the tooltips when hovering different arcs
                                    labels: [
                                        'Người dùng đã xoá',
                                        'Người xin việc',
                                        'Nhà tuyển dụng',
                                    ]
                                },
                                options:  doughnutPieOptions
                            });

                            console.log(result);
                        },
                        error: function (xhr) {
                            console.log('ajax error');

                        }
                    });
                });
                doughnutChart.update();
            });
    });

    if ($("#chart_user").length) {
        var doughnutChartCanvas = $("#chart_user").get(0).getContext("2d");
        var doughnutChart = new Chart(doughnutChartCanvas, {
            type: 'doughnut',
            data: doughnutPieData,
            options: doughnutPieOptions
        });
    }
    var doughnutPieOptions = {
        responsive: true,
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };

});



