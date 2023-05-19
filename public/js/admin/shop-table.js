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

    $('#avatar-add').on('change', function () {
        imagesPreview(this, $(".gallery-avatar-add"));
    })

    $('#avatar-edit').on('change', function () {
        imagesPreview(this, $(".gallery-avatar-edit"));
    })

    // Modal insert
    $('#x-modal-add').click(function () {
        $('.gallery-avatar-add').html('')
    })

    $('#close-modal-add').click(function () {
        $('.gallery-avatar-add').html('')
    })

    $('#insert-data').click(function () {
        $('.gallery-avatar-add').html('')
    })

    $('#avatar-add').click(function () {
        $('.gallery-avatar-add').html('')
    })

    // Modal edit
    $('#x-modal-edit').click(function () {
        $('.gallery-avatar-edit').html('')
    })

    $('#close-modal-edit').click(function () {
        $('.gallery-avatar-edit').html('')
    })

    $('#edit-data').click(function () {
        $('.gallery-avatar-edit').html('')
    })

    $('#avatar-edit').click(function () {
        $('.gallery-avatar-edit').html('')
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
        name = $(this).attr("data-name")
        $("#name-edit").val(name)
        avatar = $(this).attr("data-avatar")
        $("#avatar-old").attr("src", avatar)
        shopeeMall = $(this).attr("data-shopee-mall")
        if (shopeeMall == 1) {
            $("#shopee-mall-edit").click()
        }

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

        // Append avatar old to form
        avatar = $("#avatar-old").attr("src")
        Form.append("avatar", avatar)

        // Append file avatar new to form
        Form.append("file", $("#avatar-edit").get(0).files[0]);

        // Append shopee mall to form
        if ($("#shopee-mall-edit:checked").length == 1) {
            shopeeMall = 1
            Form.append("shopee_mall", shopeeMall)
        } else if ($("#shopee-mall-edit:checked").length == 0) {
            shopeeMall = 0
            Form.append("shopee_mall", shopeeMall)
        }

        $.ajax({
            type: 'POST',
            url: '/admin/update-shop-table/' + id,
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: Form,
            success: function (response) {
                alert('Update success')
                $divEdit.html('')
                $id = response.Shop.id
                $nameUser = response.Shop.user_role_id
                $nameShop = response.Shop.name
                $avatar = response.Shop.avatar
                $shopeeMall = response.Shop.shopee_mall
                if ($shopeeMall == 1) {
                    $shopeeMall = "Shopee Mall"
                } else {
                    $shopeeMall = "Không"
                }
                $divEdit.append(
                    $(
                        `<td>${$id}</td>
                        <td>${$nameUser}</td>
                        <td>${$nameShop}</td>
                        <td class="d-flex justify-content-center">
                        <img src="${$avatar}">
                        </td>
                        <td>${$shopeeMall}</td>
                        <td>
                            <div class="w-100 d-flex">
                                <button id="edit-${$id}" class="edit-data btn btn-warning mr-2" data-name="${$name}" data-avatar="${$avatar}" data-shopee-mall="${$shopeeMall}" data-toggle="modal" data-target="#modal-edit">Edit</button>
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
            url: '/admin/delete-shop-table/' + id,
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
