// $("#search").on("keyup", function () {
//     $value = $(this).val();
//     $.ajax({
//         type: "get",
//         url: "/search_news",
//         data: {
//             search: $value,
//         },
//         success: function (data) {
//             $("tbody").html(data);
//         },
//     });
// });

$("*#province_id").on("change", function () {
    $value = $(this).val();
    $.ajax({
        type: "get",
        url: "/search_districts",
        data: {
            province_code: $value,
        },
        success: function (data) {
            $("*#district_id").html(data);
        },
    });
});

$("*#district_id").on("change", function () {
    $value = $(this).val();
    $.ajax({
        type: "get",
        url: "/search_wards",
        data: {
            district_code: $value,
        },
        success: function (data) {
            $("*#ward_id").html(data);
            // $('tbody').html(data);
        },
    });
});

$.ajaxSetup({ headers: { csrftoken: "{{ csrf_token() }}" } });
