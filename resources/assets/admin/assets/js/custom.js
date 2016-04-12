function ImagePreview(file,imgsrc,msg){
    // var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile === match[0]) || (imagefile === match[1]) || (imagefile === match[2]))){
        $('#'+msg).addClass("alert-danger").removeClass("alert-success").text("Please upload valid Image").css("display","block");
    }else{
        
        var reader = new FileReader();
        reader.onload = function(e){
            $('#'+imgsrc).attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
        $('#'+msg).removeClass("alert-danger").css("display","none");
    }
}
// form validation error 

function SaveImage(form,msg,pageurl){
    $(form).append('<img id="imgloader" src="'+AssetUrl+'/images/loader.gif" height="15" />');
    $.ajax({
                url: $(form).attr("action"), // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
             success: function(data){     // A function to be called if request succeeds
                $('#imgloader').remove();
                $('.error').remove();
                $('#'+msg).addClass("alert-success").removeClass("alert-danger").text("Saved Successfully").css("display","block");
                $('button[type="reset"]').trigger("click");
                if(pageurl !== false){
                    window.location = MAINURL+'/'+pageurl;
                }
                return true;
             },error: function (data) {
            //console.log(data);
                // var list = $.parseJSON(data);
                 //Console.log(list[]);
                $('.error').remove();
                var errors = '<ul>';
                for(datos in data.responseJSON){
                    $('input[name="'+datos+'"').parent().append('<small class="error">'+data.responseJSON[datos]+'</small>');
                    $('select[name="'+datos+'"').parent().append('<small class="error">'+data.responseJSON[datos]+'</small>');
                    $('textarea[name="'+datos+'"').parent().append('<small class="error">'+data.responseJSON[datos]+'</small>');
                    errors += '<li>'+data.responseJSON[datos]+'</li>';
                }
                errors += '</ul>';
                $('#imgloader').remove();
                $('#'+msg).addClass("alert-danger").removeClass("alert-success").html('Process Failed : Please fix issues').css("display","block");
                return false;
            }
        });
       // return false;
}

$('#BANNERLONUEVO').submit(function(){
    alert(SaveImage(this,'BANNERLONUEVOform',false));
    return false;
});

$('#BannerOFERTASForm').submit(function(){
    SaveImage(this,'OFERTASform',false);
    return false;
});

$('#BannerMEXIPUNTOSForm').submit(function(){
    SaveImage(this,'MEXIPUNTOSform',false);
    return false;
});

$('#BannerMAYOREOForm').submit(function(){
    SaveImage(this,'MAYOREOform',false);
    return false;
});

var NormalImg = $('#NormalImg').attr("src");
var SmallImg = $('#SmallImg').attr("src");

$('#departmentForm').submit(function(){
    SaveImage(this,'departmentmsg','admin/departamentos_view');
    $('#NormalImg').attr("src",NormalImg);
    $('#SmallImg').attr("src",SmallImg);
    return false;
});

$('#categoryForm').submit(function(){
    SaveImage(this,'categorymsg','admin/categorias_view');
    $('#NormalImg').attr("src",NormalImg);
    $('#SmallImg').attr("src",SmallImg);
    return false;
});

$('#unitsForm').submit(function(){
    SaveImage(this,'unitsmsg','admin/productos_unidades_venta_view');
    return false;
});
$('#catalogueForm').submit(function(){
    SaveImage(this,'cataloguemsg','admin/productos_catalogos_view');
    return false;
});
$('#trademarkForm').submit(function(){
    SaveImage(this,'trademarkmsg','admin/productos_marcas_view');
    return false;
});

$('#providerForm').submit(function(){
    SaveImage(this,'providermsg','admin/productos_proveedores_view');
    return false;
});

$('#transportForm').submit(function(){
    SaveImage(this,'transportmsg','admin/productos_transportistas_view');
    return false;
});

// product section


/*
$('#departmentForm').validate({
    rules: {
        department: {
          required: true
        },ImageNormal:{
          accept: "image/*"
        },ImageSmall:{
          accept: "image/*"  
        }
    },
    messages: {
            department: "Department name is required",
            ImageNormal:"Please select a valid Image",
            ImageSmall: "Please select a valid Image"
    }
});
*/

$('#BannerForm').validate({
    rules: {
        ImageFile: {
          required: true,
          accept: "image/*"
        },ImageLink:{
          url: true
        },ImageDescription:{
          required: false  
        }
    },
    messages: {
            ImageFile: "Please select a valid Image",
            ImageLink: "Please enter valid url",
            ImageDescription: "Please enter Description"
    },
  submitHandler: function(form) {
     // alert();
     /*  $.ajax({
                url: $(form).attr("action"), // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
             success: function(data){   // A function to be called if request succeeds
                $('#bannerform').addClass("alert-success").removeClass("alert-danger").text("Image Uploaded Successfully").css("display","block");
                return false;
             },error: function () {
                $('#bannerform').addClass("alert-danger").removeClass("alert-success").text("Sorry failed to upload").css("display","block");
                return false;
            }
        });
    return false;*/
    //$(form).resetForm();
  }

});




function Deleteit(me,url){
    var ichk = confirm("Are you sure want to delete")?true:false;
    if(ichk === true){
        $.get(url,function(data){
           if(parseInt(data) === 1){
                $('#'+me).remove();
                $('.footable-row-detail').hide();
                    return false;
            }
        });
    }
    return false;
}


function RemoveGalleryImg(imgid){
    $.get(MAINURL+'/admin/productos_del_gallery/'+imgid,function(){
        $('#ImgId_'+imgid).remove();
    });
}

function ChangeOrder(id,direction,path){
   $.get(path+id+'/'+direction,function(data){
        window.location = "";
    });
}