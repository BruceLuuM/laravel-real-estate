function isValidNumber(value) {
    return /^(\d+,)?(\d+.)*(\d+)$/.test(value);
}

$("#price").on("keyup", function () {
    $value = $(this).val();
    console.log(isValidNumber($value));
    if (!isValidNumber($value)) {
        $("#price_unit").attr("disabled", true).val("");
    } else {
        $("#price_unit").attr("disabled", false);
    }
});
