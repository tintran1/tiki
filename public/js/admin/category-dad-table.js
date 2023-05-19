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
        name = $(this).attr("data-name")
        $("#name-edit").val(name)
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

        // Append name to form
        name = $("#name-edit").val()
        Form.append("name", name)

        // Append image old to form
        image = $("#image-old").val()
        Form.append("idCategoryDad", image)

        // Append file image new to form
        Form.append("image[]", $("#image-edit").get(0).files[0]);
        
        $.ajax({
            type: 'POST',
            url: '/admin/update-category-dad-table/' + id,
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: Form,
            success: function (response) {
                alert('Update success')
                $divEdit.html('') 
                $id = response.CategoryDad.id
                $name = response.CategoryDad.name
                $img = response.CategoryDad.img
                $divEdit.append(
                    $(
                        `<td>${$id}</td>
                        <td>${$name}</td>
                        <td>
                            <img src='${$img}'>
                        </td>
                        <td>
                            <div class="w-100 d-flex">
                                <button id="edit-${$id}" class="edit-data btn btn-warning mr-2" data-name="${$name}" data-img="${$img}" data-toggle="modal" data-target="#modal-edit">Edit</button>
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
            url: '/admin/delete-category-dad-table/' + id,
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
