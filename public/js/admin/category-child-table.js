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
        idCategoryDad = $(this).attr("data-id-category-dad")
        $('#id-category-dad-edit').val(idCategoryDad)
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

        // Append Id Category Dad old to form
        idCategoryDad = $("#id-category-dad-edit").val()
        Form.append("idCategoryDad", idCategoryDad)


        $.ajax({
            type: 'POST',
            url: '/admin/update-category-child-table/' + id,
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: Form,
            success: function (response) {
                alert('Update success')
                $divEdit.html('')
                $id = response.CategoryChild.id
                $name = response.CategoryChild.name
                $nameCategoryDad = response.CategoryChild.category_dad.name
                $idCategoryDad = response.CategoryChild.category_dad.id
                $divEdit.append(
                    $(
                        `<td>${$id}</td>
                        <td>${$nameCategoryDad}</td>
                        <td>${$name}</td>
                        <td>
                            <div class="w-100 d-flex">
                                <button id="edit-${$id}" class="edit-data btn btn-warning mr-2" data-name="${$name}" data-id-category-dad="${$idCategoryDad}" data-toggle="modal" data-target="#modal-edit">Edit</button>
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
            url: '/admin/delete-category-child-table/' + id,
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
