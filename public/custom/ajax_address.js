$(document).ready(function () {

    var tokens = $("#token").attr("content");
    $('#province').on('change', function () {
        var province_ID = this.value;
        $("#district").html('');
        $.ajax({
            url: "/get-districts",
            type: "POST",
            data: {
                province_ID: province_ID,
                _token: tokens,
            },
            dataType: 'json',
            success: function (result) {
                $('#district').html('<option value="">-- Chọn quận/huyện --</option>');
                $.each(result, function (key, value) {
                    console.log(value.name);
                    $("#district").append('<option value="' + value.district_id + '">' + value.name + '</option>');
                });
                $('#ward').html('<option value="">Chọn quận/huyện trước</option>');
                console.log('sus');
            },
            error: function (xhr) {
                console.log('ajax error');

            }
        });
    });
    $('#district').on('change', function () {
        var district_id = this.value;
        $("#ward").html('');
        $.ajax({
            url: "/get-wards",
            type: "POST",
            data: {
                district_ID: district_id,
                _token: tokens,
            },
            dataType: 'json',
            success: function (result) {
                $('#ward').html('<option value="">-- Chọn phường/xã --</option>');
                $.each(result, function (key, value) {
                    $("#ward").append('<option value="' + value.ward_ID + '">' + value.name + '</option>');
                    console.log(value.id);
                });
            }
        });
    });
});
