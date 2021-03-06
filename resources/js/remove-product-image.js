$(document).ready(function() {
    $(".remove-symbol").click(function(e) {
        var deletedImages = $("#product-deleted-images").val();
        if (deletedImages) {
            deletedImages = deletedImages.split(',');
        } else {
            deletedImages = [];
        }
        deletedImages.push($(this).data('img-path'));
        $(this).parent().remove();
        deletedImages = deletedImages.join(',');
        $("#product-deleted-images").val(deletedImages);
    });
});
