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

    // Insert
    $(document).on('click', '#insert-data', function (e) {

        e.preventDefault()
        // Create form post
        Form = new FormData()

        // Append name to form
        name = $("#name-add").val()
        Form.append("name", name)

        // Append email to form
        email = $("#email-add").val()
        Form.append("email", email)

        // Append password to form
        password = $("#password-add").val()
        Form.append("password", password)

        // Append phone to form
        phone = $("#phone-add").val()
        Form.append("phone", phone)

        // Append file avatar to form
        Form.append("file", $("#avatar-add").get(0).files[0]);

        // Append birthday to form
        birthday = $("#birthday-add").val()
        Form.append("birthday", birthday)

        // Append male to form
        male = $("#male-add").val()
        Form.append("male", male)

        $.ajax({
            type: 'post',
            url: '/admin/insert-user-table',
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: Form,
            dataType: "json",
            success: function (response) {
                alert('Insert success')
                $return.html('')
                for (i = 0; i < response.Users.data.length; i++) {
                    $id = response.Users.data[i].id
                    $name = response.Users.data[i].name
                    $email = response.Users.data[i].email
                    $password = response.Users.data[i].password
                    $phone = response.Users.data[i].phone
                    $avatar = response.Users.data[i].avatar
                    $birthday = response.Users.data[i].birthday
                    $male = response.Users.data[i].male
                    if ($male == 1) {
                        $namemale = "Nam"
                    } else {
                        $namemale = "Nữ"
                    }
                    $return.append(
                        $(
                            `<tr>
                            <td>${$id}</td>
                            <td>${$name}</td>
                            <td>${$email}</td>
                            <td>${$password}</td>
                            <td>${$phone}</td>
                            <td class="d-flex justify-content-center">
                              <img src="${$avatar}">
                            </td>
                            <td>${$birthday}</td>
                            <td>${$namemale}</td>
                            <td>
                              <div class="w-100 d-flex">
                                <button id="edit-${$id}" class="edit-data btn btn-warning mr-2" data-name="${$name}" data-email="${$email}" data-phone="${$phone}" data-password="${$password}" data-avatar="${$avatar}" data-birthday="${$birthday}" data-male="${$male}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                                <button id="delete-${$id}" class="delete-data btn btn-danger">Delete</button>
                              </div>
                            </td>
                          </tr>`
                        )
                    )
                }
            }
        })
    })
    // End Insert

    // Get Data Edit
    $(document).on("click", ".edit-data", function () {
        id = ($(this).attr("id")).slice(5)
        $("#id-edit").val(id)
        name = $(this).attr("data-name")
        $("#name-edit").val(name)
        email = $(this).attr("data-email")
        $("#email-edit").val(email)
        password = $(this).attr("data-password")
        $("#password-edit").val(password)
        phone = $(this).attr("data-phone")
        $("#phone-edit").val(phone)
        avatar = $(this).attr("data-avatar")
        $("#avatar-old").attr("src", avatar)
        birthday = $(this).attr("data-birthday")
        $("#birthday-edit").val(birthday)
        male = $(this).attr("data-male")
        $("#male-edit").val(male)
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

        // Append email to form
        email = $("#email-edit").val()
        Form.append("email", email)

        // Append password to form
        password = $("#password-edit").val()
        Form.append("password", password)

        // Append phone to form
        phone = $("#phone-edit").val()
        Form.append("phone", phone)

        // Append avatar old to form
        avatar = $("#avatar-old").attr("src")
        Form.append("avatar", avatar)

        // Append file avatar new to form
        Form.append("file", $("#avatar-edit").get(0).files[0]);

        // Append birthday to form
        birthday = $("#birthday-edit").val()
        Form.append("birthday", birthday)

        // Append male to form
        male = $("#male-edit").val()
        Form.append("male", male)

        $.ajax({
            type: 'POST',
            url: '/admin/update-user-table/' + id,
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: Form,
            success: function (response) {
                alert('Update success')
                $divEdit.html('')
                $id = response.Users.id
                $name = response.Users.name
                $email = response.Users.email
                $password = response.Users.password
                $phone = response.Users.phone
                $avatar = response.Users.avatar
                $birthday = response.Users.birthday
                $male = response.Users.male
                if ($male == 1) {
                    $namemale = "Nam"
                } else {
                    $namemale = "Nữ"
                }
                $divEdit.append(
                    $(
                        `<td>${$id}</td>
                        <td>${$name}</td>
                        <td>${$email}</td>
                        <td>${$password}</td>
                        <td>${$phone}</td>
                        <td class="d-flex justify-content-center">
                            <img src="${$avatar}">
                        </td>
                        <td>${$birthday}</td>
                        <td>${$namemale}</td>
                        <td>
                            <div class="w-100 d-flex">
                                <button id="edit-${$id}" class="edit-data btn btn-warning mr-2" data-name="${$name}" data-email="${$email}" data-phone="${$phone}" data-password="${$password}" data-avatar="${$avatar}" data-birthday="${$birthday}" data-male="${$male}" data-toggle="modal" data-target="#modal-edit">Edit</button>
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
            url: '/admin/delete-user-table/' + id,
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
