// Begin preview image, video modal
$(function () {

    var imagesPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            $filesAmount = input.files.length
            for (i = 0; i < $filesAmount; i++) {
                $reader = new FileReader();
                $reader.onload = function (event) {
                    $srcImage = event.target.result
                    $(`<img src="${$srcImage}" class="col-3">`).appendTo(placeToInsertImagePreview)
                }
                $reader.readAsDataURL(input.files[i])
            }
        }
    }


    var videosPreview = function (input, placeToInsertvideoPreview) {
        if (input.files) {
            var filesAmount = input.files.length
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<video></video>')).attr('src', event.target.result).attr('class', 'col-3').attr('controls', 'controls').appendTo(placeToInsertvideoPreview);
                }
                reader.readAsDataURL(input.files[i])
            }
        }
    }

    $('#video-add').on('change', function () {
        videosPreview(this, 'div.gallery-video-add')
    })

    $('#video-edit').on('change', function () {
        videosPreview(this, 'div.gallery-video-edit')
    })


    $('#image-add').on('change', function () {
        imagesPreview(this, $(".gallery-image-add"));
    })

    $('#image-edit').on('change', function () {
        imagesPreview(this, $(".gallery-image-edit"));
    })

    // Modal insert
    $('#x-modal-add').click(function () {
        $('.gallery-image-add').html('')
    })

    $('#close-modal-add').click(function () {
        $('.gallery-image-add').html('')
    })

    $('#insert-data').click(function () {
        $('.gallery-image-add').html('')
    })

    $('#image-add').click(function () {
        $('.gallery-image-add').html('')
    })

    // Modal edit
    $('#x-modal-edit').click(function () {
        $('.gallery-image-edit').html('')
    })

    $('#close-modal-edit').click(function () {
        $('.gallery-image-edit').html('')
    })

    $('#edit-data').click(function () {
        $('.gallery-image-edit').html('')
    })

    $('#image-edit').click(function () {
        $('.gallery-image-edit').html('')
    })
})
// End preview image, video modal

$(document).ready(function () {
    // Date picker
    $(function () {
        $('#reservationdate').datetimepicker({
            format: 'L'
        })
    })
})
// End Date picker

// Begin ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    // Get Data Edit
    $(document).on("click", ".edit-data", function () {
        id = ($(this).attr("id")).slice(5)
        $("#id-edit").val(id)
        img = $(this).attr("data-img")
        $("#image-old").val(img)
        video = $(this).attr("data-video")
        $("#video-old").val(video)
        title = $(this).attr("data-title")
        $("#title-edit").val(title)
        sold = $(this).attr("data-sold")
        $("#sold-edit").val(sold)
        // Div Edit
        $divEdit = $(this).parents().eq(2)
    })
    // End Get Data Edit

    // Edit
    $('#edit-data').click(function (e) {
        e.preventDefault()
        // Create form edit
        Form = new FormData()

        // Id
        id = $("#id-edit").val()

        // Append title to form
        title = $("#title-edit").val()
        Form.append("title", title)

        // Append image old to form
        image = $("#image-old").val()
        Form.append("imageOld", image)

        // Append video old to form
        video = $("#video-old").val()
        Form.append("videoOld", video)

        // Append file image new to form
        countFileImage = $("#image-edit").get(0).files.length
        for(i = 0; i < countFileImage; i ++) {
            Form.append("image[]", $("#image-edit").get(0).files[i]);
        }

        // Append file video new to form
        countFileVideo = $("#video-edit").get(0).files.length
        for(i = 0; i < countFileVideo; i ++) {
            Form.append("video[]", $("#video-edit").get(0).files[i]);
        }

        // Append sold to form
        sold = $("#sold-edit").val()
        Form.append("sold", sold)
        
        $.ajax({
            type: 'POST',
            url: '/admin/update-product-table/' + id,
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: Form,
            success: function (response) {
                alert('Update success')
                $divEdit.html('') 
                $id = response.Product.id
                $nameCategory = response.Product.category_child.name
                $nameShop = response.Product.shop.name
                $title = response.Product.title
                $sold = response.Product.sold
                $images = (response.Product.img).split(", ")
                $countImage = $images.length
                $divImage = ""
                for ($i = 0; $i < $countImage; $i++) {
                    $divImage += ("<img src='" + $images[$i] + "'>")
                }
                $videos = (response.Product.video).split(", ")
                $countVideo = $videos.length
                $divVideo = ""
                for ($i = 0; $i < $countVideo; $i++) {
                    $divVideo += ("<video src='" + $videos[$i] + "' controls></video>")
                }
                $divEdit.append(
                    $(
                        `<td>${$id}</td>
                        <td>${$nameCategory}</td>
                        <td>${$nameShop}</td>
                        <td>${$title}</td>
                        <td>${$divImage}</td>
                        <td>${$divVideo}</td>
                        <td>${$sold}</td>
                        <td>
                            <div class="w-100 d-flex">
                                <button id="edit-${$id}" class="edit-data btn btn-warning mr-2" data-img="${response.Product.img}" data-video="${response.Product.video}" data-title="${$title}" data-sold="${$sold}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                                <button id="delete-${$id}" class="delete-data btn btn-danger">Delete</button>
                            </div>
                        </td>`
                    )
                )
            }
        })
    })
    // End Edit

    // Delete
    $(document).on("click", ".delete-data", function () {

        // Get id Delete
        id = ($(this).attr("id")).slice(7)

        // Div remove
        $divDelete = $(this).parents().eq(2)

        $.ajax({
            type: "DELETE",
            url: '/admin/delete-product-table/' + id,
            data: {
                'id': id
            },
            cache: false,
            success: function (response) {
                alert('Delete success')
                $divDelete.remove()
            }
        })
    })
    // End Edit

})
// End ajax
