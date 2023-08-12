$(document).ready(function () {
    $('#table-user').on('click', '.userDisable', function () {
        var obj = $(this);
        var id = this.value;
        console.log(id);
        $.ajax({
            url: "disable-user",
            type: "GET",
            data: {
                id: id
            },
            dataType: 'json',
            success: function (result) {


                $(obj).closest('tr').remove();


                console.log('sus');
                const success = document.getElementById('success');
                // const error = document.getElementById('error');

                const toast = new bootstrap.Toast(success);

                // const toast = new bootstrap.Toast(error);

                toast.show();
            },
            error: function (xhr) {
                console.log('ajax error');

            }
        });
    });
});
