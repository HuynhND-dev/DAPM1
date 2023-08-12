// $('input[name="daterange"]').daterangepicker(
//     {
//         locale: {
//             format: 'DD/MM/YYYY'
//         },
//         startDate: '16/07/2023',
//         endDate: '16/07/2023'
//     },
//     function (start, end, label) {
//         alert(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
//         $(document).ready(function () {
//             function fetchData(callback) {
//
//                 $.ajax({
//                     url: "user-statistical",
//                     type: "GET",
//                     data: {
//                         star_date: start.format('YYYY-MM-DD'),
//                         end_date: end.format('YYYY-MM-DD')
//                     },
//                     dataType: 'json',
//                     success: function (result) {
//                         chart(result);
//                         callback(result);
//                     },
//                     error: function (xhr) {
//                         console.log('ajax error');
//
//                     }
//                 });
//             }
//         });
//         fetchData(function(result) {
//             chart(result); // Gọi hàm từ file chart.js và truyền kết quả trả về
//         });
//
//     });
