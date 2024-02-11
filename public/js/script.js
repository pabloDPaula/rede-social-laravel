$(document).ready(function () {
    $('#media_path').on('change', function (e) {
        let files = e.target.files;
        $('#preview').empty();

        Array.from(files).forEach(file => {
            imgURL = URL.createObjectURL(file);
            var img = $('<img></img>').attr('src', imgURL);
            img = img.attr('alt', file.name);
            img = img.css('width', '150px');
            img = img.css('height', 'auto');
            $('#preview').append(img);
        });
    })
})