// Slider category
window.addEventListener("load", function () {
    const categorySliderMain = document.querySelector(".main__product--img-video-slider-main")
    const categorySliderMainItem = document.querySelectorAll(".main__product--img-video-slider-main-item")
    const categorySliderPrev = document.querySelector(".main__product--img-video-slider-prev")
    const categorySliderNext = document.querySelector(".main__product--img-video-slider-next")
    categorySliderPrev.style = "display: none"
    const widthSlider = categorySliderMainItem[0].offsetWidth+11
    let positionX = 0
    categorySliderPrev.addEventListener("click", function () {
        handleChangeSlide(-1)
    })
    categorySliderNext.addEventListener("click", function () {
        handleChangeSlide(1)
    })
    function handleChangeSlide(direction) {
        if (direction == 1) {
            positionX = positionX - widthSlider
            categorySliderMain.style = `transform: translateX(${positionX}px)`
            categorySliderNext.style = "display: none"
            categorySliderPrev.style = "display: flex"
            positionX = 0
        } else if (direction == -1) {
            positionX = positionX - widthSlider
            categorySliderMain.style = `transform: translateX(-${positionX}px)`
            categorySliderNext.style = "display: flex"
            categorySliderPrev.style = "display: none"
            positionX = 0
        }
    }
})
// End slider category

// add shoppingcart
$(document).ready(function() {
    $('.add-shoppingcart').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();
        var id= $('#id_users').val();
        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
                'id_users': id,
            },
            success: function(response) {
                // alertify.set('notifier', 'position', 'top-right');
                // alertify.success(response.status);
            },
        });
    });
});

// get data product
$(document).ready(function () {
    cartload();
});

function cartload()
{
    $.ajax({
        url: '/load-cart-data',
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

