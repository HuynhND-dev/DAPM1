$(document).ready(function () {
    var tokens = $("#token").attr("content");
    $('#language').on('change', function () {
        var language_ID = this.value;
        console.log(language_ID);
        $("#certificate").html('');
        $.ajax({
            url: "get-certificate",
            type: "POST",
            data: {
                parent_ID: language_ID,
                _token: tokens,
            },
            dataType: 'json',
            success: function (result) {
                $('#certificate').html('<option value="">-- Chọn chứng chỉ --</option>');
                $.each(result, function (key, value) {
                    console.log(value.name);
                    // $('#certificate').append('<option value="">Chọn ngoại ngữ trước</option>');
                    // $('#certificate').append('<option value="">Chọn ngoại ngữ trước</option>');
                    // $('#certificate').append('<option value="">Chọn ngoại ngữ trước</option>');
                    enabledOptions = "undefined";
                    document.querySelector('#certificate').setEnabledOptions(enabledOptions);

                });

                document.querySelector('#certificate').reset();
                // $('#wards').html('<option value="">Chọn ngoại ngữ trước</option>');
                // $('certificate').multiselect('refresh');
                console.log('sus');
            },
            error: function (xhr) {
                console.log('ajax error');

            }
        });
    });
});
