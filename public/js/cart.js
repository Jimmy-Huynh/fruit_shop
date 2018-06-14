$(document).ready(function () {
    $(document).on('click', '.delete', function () {
        //get $key
        var val = $(this).parent().find("input").val();
        // tr will be remove
        var tr = $(this).parent().closest('tr');
        $.ajax({
            type: "POST",
            url: 'http://localhost/shop/cart/deleteCart/',
            data:{id:val},
            success: function (data) {
                if(data === "OK"){
                    tr.remove();
                }
            }
        });
    });
});


