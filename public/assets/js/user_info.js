$('.file_upload').on('change', function () {
    var upload_file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
        if (upload_file.type == 'image/png' || upload_file.type == 'image/gif' || upload_file.type == 'image/jpg' || upload_file.type == 'image/jpeg') {
            $('#userinfo_avatar img').attr('src', event.target.result);
            $('.error_cover').html('');
        }
        else {
            $('.error_cover').html('Ce fichier n\'est pas autorisé');
        }
    };
    reader.onerror = function(event) {
        alert("I AM ERROR: " + event.target.error.code);
    };
    reader.readAsDataURL(upload_file);
})