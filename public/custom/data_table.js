$(document).ready(function (){
   $('#table-user').DataTable({
       language: {
           processing: "Đang tải",
           search: "Tìm kiếm",
           lengthMenu: "Số dòng trên 1 trang _MENU_ ",
           info: "_START_ - _END_ / _TOTAL_ ",
           infoEmpty: "",
           infoFiltered: "",
           infoPostFix: "",
           loadingRecords: "",
           zeroRecords: "Không tìm thấy dữ liệu",
           emptyTable: "Không có dữ liệu",
           paginate: {
               first: "Trang đầu",
               previous: "Trang trước",
               next: "Trang sau",
               last: "Trang cuối"
           },
           aria: {
               sortAscending: ": Message khi đang sắp xếp theo column",
               sortDescending: ": Message khi đang sắp xếp theo column",
           }
       }
   });
});
