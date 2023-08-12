$(document).ready(function () {

    $('#btnApply').on('click', '#apply', function () {

        var tokens = $("#token").attr("content");
        var job_ID = $("#apply").attr("job");
        var stt_ID = $("#apply").attr("stt");
        var candidate_ID = $("#apply").attr("candidate");
        $.ajax({
            url: "/apply",
            type: "get",
            data: {
                job_ID: job_ID,
                candidate_ID: candidate_ID,
                stt_ID: stt_ID,
                _token: tokens,
            },
            dataType: 'json',
            success: function (result) {
                // $('#apply').html('<option value="">-- Chọn quận/huyện --</option>');
                console.log(result.stt);

                    if (result.stt == 'apply'){
                        console.log(8686);
                        $('#apply').remove();
                        $('#btnApply').append('<button id="apply" stt="' +
                            1 +
                            '" candidate="' +
                            result.candidate +
                            '" job="' +
                            result.job +
                            '" class="btn btn-offer d-inline-block ' +
                            'btn-danger' +
                            ' px-lg-4 my-2 px-md-3">Huỷ ứng tuyển</button>')
                    }
                    if (result.stt == 'cancer'){
                        console.log('huỷ');
                        $('#apply').remove();
                        $('#btnApply').append('<button id="apply" stt="' +
                            0 +
                            '" candidate="' +
                            result.candidate +
                            '" job="' +
                            result.job +
                            '" class="btn btn-offer d-inline-block ' +
                            'btn-primary' +
                            ' px-lg-4 my-2 px-md-3">Ứng tuyển</button>')
                    }
                console.log('sus');
            },
            error: function (xhr) {
                // window.location.href = '/login';
                console.log('ajax error');

            }
        });
    });
});
