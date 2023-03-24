ClassicEditor.create(document.querySelector("#editor"))
    .then((newEditor) => {
        editor = newEditor;
    })
    .catch((error) => {
        console.error(error);
    });

function optImages(opt) {
    if (opt.files[0]) {
        var reader = new FileReader();

        reader.onload = function (opt) {
            document
                .querySelector("#displayGambar")
                .setAttribute("src", opt.target.result);
        };
        reader.readAsDataURL(opt.files[0]);
    }
    $('.box-prepare-images').addClass('d-none');
    $('#displayGambar').removeClass('d-none');
    $('#displayGambar').addClass('d-block');
}


// images multiple
var images = new Array();

$("#filesImages").change(function () {
    var image = $(this)[0].files;
    for (i = 0; i < image.length; i++) {
        if (check_duplicate(image[i].name)) {
            images.push({
                name: image[i].name,
                url: URL.createObjectURL(image[i]),
                file: image[i],
            });
        } else {
            alert(image[i].name + " is already added to the list");
        }
    }
    $(".gallery-product").html(image_show());
});

function image_show() {
    var image = "";
    images.forEach((i) => {
        image +=
            '<div class="col-6 col-md-4 col-lg-3 p-2" id="data-image">' +
            '<img src="' +
            i.url +
            '" alt="image" class="image-fields">' +
            '<button class="btn-image-fields btn" type="button" onclick="delete_image(' +
            images.indexOf(i) +
            ')">' +
            '<i class="fas fa-times "></i>' +
            "</button>" +
            "</div>";
    });
    console.log(images);
    return image;
}

function delete_image(e) {
    images.splice(e, 1);
    $(".gallery-product").html(image_show());
}

function reset_image() {
    images = [];
    $(".gallery-product").html("");
}

function check_duplicate(name) {
    var image = true;
    if (images.length > 0) {
        for (e = 0; e < images.length; e++) {
            if (images[e].name == name) {
                image = false;
                break;
            }
        }
    }
    return image;
}

$("#form").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    for (let i = 0; i < images.length; i++) {
        formData.append("imagesMultiple[" + i + "]", images[i]["file"]);
    }
    $.ajax({
        url: "/admin/product/store",
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            Swal.fire("Good job!", response.message, "success");
            // reset form
            reset_image();
            $('#form').trigger("reset");
            $('#editor').html("");
            editor.setData('', function () {
                this.updateElement();
            })
        },
        error: function (data) {
            console.log(data);
        },
    });
});


// this script for edit
function uploadMultipleImg() {
    $('#prosesuploadfoto').click();
}

$('.removeImages').click(function () {
    var id = $(this).attr('key');
    var urle = '/admin/product/images/delete/' + id;
    Swal.fire({
        title: "Images",
        text: "Apakah anda ingin menghapus images?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Delete',
    })
    .then((next) => {
        if (next.isConfirmed) {
            window.location.href = urle;
        }
    });
});

$('#minus').click(() => {
    var stock = parseInt($('#stock').val());
    if(stock > 1){
        var minus = stock - 1;
    }else{
        var minus = 1;
    }
    $('#stock').val(minus);
});
$('#plus').click(() => {
    var stock = parseInt($('#stock').val());
    if(isNaN(stock)){
        var plus = 1;
    }else{
        var plus = stock + 1;
    }
    $('#stock').val(plus);
});