$(document).ready(function(){
    $("#ContactForm").validate({
            rules: {
                    name: "required",
                    mobile: {
                        number:true,
                        digits: true,
                        minlength: 10,
                        maxlength: 12
                    },
                    email: {
                            required: true,
                            email: true
                    },
                    message: "required"
            },
            messages: {
                    name: "Please enter your Name",
                    mobile: "Please enter Valid Mobile no.",
                    email: "Please enter a valid email address",
                    message: "Please enter your message"
            },
            
       submitHandler: function(form) {
           $("#contactBtn").css("display","none");
           $("#loadingBtn").css("display","block");

                $.post($(form).attr('action'),$(form).serialize(),function(data){
                    if(parseInt(data) === 2){
                        $('#contactinfoform').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Please provide valid information');
                    }else if(parseInt(data) === 0){
                        $('#contactinfoform').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Sorry, Try again Later');
                    }else{
                        $('#creset').trigger("click");
                        $('#contactinfoform').removeClass("alert-danger").addClass("alert-success").css("display","block").text('Thanks for contacting us');
                    }
                    $("#contactBtn").css("display","block");
                    $("#loadingBtn").css("display","none");
                    setInterval(function(){ $('#contactinfoform').hide() }, 3000);
                });
                return false;
       }
    });
    
    $("#ContactPage").validate({
            rules: {
                    name: "required",
                    mobile: {
                        number:true,
                        digits: true,
                        minlength: 10,
                        maxlength: 12
                    },
                    email: {
                            required: true,
                            email: true
                    },
                    message: "required"
            },
            messages: {
                    name: "Please enter your Name",
                    mobile: "Please enter Valid Mobile no.",
                    email: "Please enter a valid email address",
                    message: "Please enter your message"
            },
            
       submitHandler: function(form) {
                $.post($(form).attr('action'),$(form).serialize(),function(data){
                    if(parseInt(data) === 2){
                        $('#contactinfo').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Please provide valid information');
                    }else if(parseInt(data) === 0){
                        $('#contactinfo').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Sorry, Try again Later');
                    }else{
                        $('#ContactFormReset').trigger("click");
                        $('#contactinfo').removeClass("alert-danger").addClass("alert-success").css("display","block").text('Thanks for contacting us');
                    }
                    setInterval(function(){ $('#contactinfo').hide() }, 3000);
                });
                return false;
       }
    });
              
    
    
    
    
    
    
    
    
});

function rateit(value){
    $('#star_'+value).hover();
}

function AddProduct(productid){
    var priceid = $('#Priceidform_'+productid).val();
    var qty     = $('#proqty_'+productid).val();
    //alert(PageUrl+'/cart/'+productid+'/'+priceid+'/'+qty);
    //alert(PageUrl+'/cart/'+productid+'/'+priceid+'/'+qty);
    $.get(PageUrl+'/cart/'+productid+'/'+priceid+'/'+qty,function(){
        MiniCart();
        $('#ItsAdded_'+productid).removeClass("fa-shopping-cart").addClass("fa-check");
        $('#ItsAdded_'+productid).parent().removeAttr("onclick");
    });
    
}

function RemoveProduct(productid){
    $.get(PageUrl+'/productremove/'+productid,function(){
        MiniCart();
    });
}

function MiniCart(){
    $.ajaxSetup({ cache:false });
    $('#minicart').load(PageUrl+'/minicart');
}

function RemoveFromCart(itemHash){
    $("#"+itemHash).remove();
    RemoveProduct(itemHash);
    //$("#pago-seguro").
}

function ProductList(){
    $.ajaxSetup({ cache:false });
    $('#productlist').load(PageUrl+'/productlist');
}

function ProductListSearch(){
    $.ajaxSetup({ cache:false });
    $('#productlist').load(CurrentPage);
}

function sortIt(){
    var sor = $('#sort').val();
    $.get(PageUrl+'/productlist/sortby/'+sor,function(data){
        ProductList();
    });
}

function sortBrand(){
    var sor = $('#brand').val();
    $.get(PageUrl+'/productlist/sortbybrand/'+sor,function(data){
        ProductList();
    });
}

function sortBrandSearch(){
    var sor = $('#brand').val();
    $.get(PageUrl+'/productlist/sortbybrand/'+sor,function(data){
        ProductListSearch();
    });
}

function ShowPrice(productid){
    var priceid = $('#Priceidform_'+productid).val();
    $('#product-list_'+productid+' .tipo_precio').css("display","none");
    $('#Priceshowid_'+$('#Priceidform_'+productid).val()).css("display","block");
    $('#Product_id_'+productid+' .product-sale').css("display","none");
    $('#Discountshowid_'+priceid).show();
}

function ShowPriceAtDesc(productid){
    var priceid = $('#Priceidform_'+productid).val();
    var price   = $('#AmountPayble_'+priceid).val();
    var qty     = $('#proqty_'+productid).val();
    var TotalAmount = parseFloat(parseInt(qty)* parseFloat(price)).toFixed(2);
    //alert(TotalAmount);
    $('.product-information .tipo_precio').css("display","none");
    $('#Priceshowid_'+$('#Priceidform_'+productid).val()).css("display","block");
    $('#TotalPrice').text('$ '+TotalAmount).css("display","block");
    $('h1 .tipo_oferta').css("display","none");
    $('h1 #Discountshowid_'+priceid).show();
}

function UpdateMinicart(ItemId,id){
    var sor = $('#CartItem_'+id).val();
    $.get(PageUrl+'/cart/'+ItemId+'/'+sor,function(data){
        MiniCart();
    });
}

function ChangeCategory(department){
    window.location = PageUrl+'/product/'+department+'/'+$('#categorysort').val();
}

function ChangeCategorySearch(department,search){
    //alert(department);
    window.location = PageUrl+'/resultados-busquedas/'+department+'/'+$('#categorysort').val()+'/'+search;
}


/*
*/