function ComfirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa tin này không?");
}

function validateForm() {
    // var img = document.getElementById('img');
    // if (isFileImage(img.value)) {
    //     img.setCustomValidity('Sai định dạng ảnh!!!');
    // }

    var fname = document.getElementById("news_header");
    if (fname.value == "") {
        fname.setCustomValidity("Bạn cần phải nhập tiêu đề trước !");
    } else {
        fname.setCustomValidity("");
    }
    return true;
}
