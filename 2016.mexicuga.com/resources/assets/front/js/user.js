$(document).ready(function(){
    $('#UpdateProfile').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(),function(data){
            if(parseInt(data) === 2){
                $('#alertprofile').addClass("alert-danger").css("display","block").text('Please provide valid information');
            }else if(parseInt(data) === 0){
                $('#alertprofile').addClass("alert-danger").css("display","block").text('Sorry, Failed to update');
            }else{
                $('#alertprofile').removeClass("alert-danger").css("display","block").text('Profile Updated');
            }
        });
        return false;
    });
    
    $('#UpdatePassword').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(),function(data){
            if(parseInt(data) === 2){
                $('#alertprofilepass').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Please provide valid information');
            }else if(parseInt(data) === 0){
                $('#alertprofilepass').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Sorry, Failed to update');
            }else if(parseInt(data) === 3){
                $('#alertprofilepass').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Invalid Password');
            }else{
                $('#resetpasses').trigger("click");
                $('#alertprofilepass').removeClass("alert-danger").addClass("alert-success").css("display","block").text('Password Updated');
            }
        });
        return false;
    });
    
    
    $('#UpdateBilling').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(),function(data){
            if(parseInt(data) === 2){
                $('#alertbilling').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Please provide valid information');
            }else if(parseInt(data) === 0){
                $('#alertbilling').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Sorry, Failed to update');
            }else{
                $('#alertbilling').removeClass("alert-danger").addClass("alert-success").css("display","block").text('Billing Information Updated');
            }
        });
        return false;
    });
    
    $('#UpdateShipping').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(),function(data){
            if(parseInt(data) === 2){
                $('#alertshipping').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Please provide valid information');
            }else if(parseInt(data) === 0){
                $('#alertshipping').removeClass("alert-success").addClass("alert-danger").css("display","block").text('Sorry, Failed to update');
            }else{
                $('#alertshipping').removeClass("alert-danger").addClass("alert-success").css("display","block").text('Shipping Information Updated');
            }
        });
        return false;
    });
    
    
    
});

