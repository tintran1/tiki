// get data product
$(document).ready(function () {
    cartload();
});

function cartload()
{
    $.ajax({
        url: './load-cart-data',
        method: "GET",
        success: function (response) {
            $('.basket-item-count').html('');
            var parsed = jQuery.parseJSON(response)
            var value = parsed; //Single Data Viewing
            $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
        }
    });
}

// Quantity 
$(document).ready(function () {

    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

});

 // Delete Cart Data
 $(document).ready(function () {

    $(document).on("click", ".delete", function() {
        var myBookId = $(this).data('id');
        $(".modal-footer #id_delete").val(myBookId);
    });

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();

        var product_id = $('#id_delete').val();
      
        $.ajax({
            url: './delete-cart',
            type: 'DELETE',
            data: {"product_id": product_id},
            success: function (response) {
                window.location.reload();
            }
        });
    });

});
