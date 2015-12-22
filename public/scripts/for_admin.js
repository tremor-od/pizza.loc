/**
 * Created by oleg on 03.02.15.
 */
$(document).ready(function () {

    $(document).on("click", ".addNewPriceSize", function(){

        var obj = $(this);
        var productId = $('.productId').val();

        $.ajax({
            url: '/admin/productAction/addPriceSize/'+productId,
            type:'post',
            dataType:'json',
            data:{productId:productId},
            success: function(result) {

                $('.priceSizeTable > tbody').append(result.content);

            }
        });

    });

    $(document).on("click", ".removePriceSize", function(){

        var obj = $(this);
        var productId = $('.productId').val();
        var priceSizeId = obj.attr('priceSizeId');

        $.ajax({
            url: '/admin/productAction/removePriceSize/'+productId,
            type:'post',
            dataType:'json',
            data:{priceSizeId:priceSizeId},
            success: function(result) {

                obj.parent().parent().hide();

            }
        });

    });

    $(document).on("click", ".addNewGroup", function(){

        var obj = $(this);
        var productId = $('.productId').val();

        $.ajax({
            url: '/admin/productAction/addGroup/'+productId,
            type:'post',
            dataType:'json',
            data:{productId:productId},
            success: function(result) {

                $('.groupTable > tbody').append(result.content);

            }
        });

    });

    $(document).on("click", ".removeGroup", function(){

        var obj = $(this);
        var productId = $('.productId').val();
        var groupId = obj.attr('groupId');

        $.ajax({
            url: '/admin/productAction/removeGroup/'+productId,
            type:'post',
            dataType:'json',
            data:{groupId:groupId},
            success: function(result) {

                obj.parent().parent().hide();

            }
        });

    });

}); // end document ready
