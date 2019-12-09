$('.carousel').carousel({
    interval: 2000
});

$(document).ready(function(){
    $("#icon-form-tel").click(function() {
        $("#info-tel").css('display','none');
        $("#form-tel").css('display','block');
        $("#icon-form-tel").css('display','none');
        $("#close-form-tel").css('display','block');
    });

    $("#form-tel button").click(function() {
        $("#info-tel").css('display','block');
        $("#form-tel").css('display','none');
        $("#close-form-tel").css('display','none');
        $("#icon-form-tel").css('display','block');

    });

    ///location
    $("#icon-form-city").click(function() {
        $("#info-city").css('display','none');
        $("#form-city").css('display','block');
        $("#icon-form-city").css('display','none');
        $("#close-form-city").css('display','block');
    });

    $("#form-city button").click(function() {
        $("#info-city").css('display','block');
        $("#form-city").css('display','none');
        $("#close-form-city").css('display','none');
        $("#icon-form-city").css('display','block');

    });
    //birthday
    $("#icon-form-birthday").click(function() {
        $("#info-birthday").css('display','none');
        $("#form-birthday").css('display','block');
        $("#icon-form-birthday").css('display','none');
        $("#close-form-birthday").css('display','block');
    });

    $("#form-birthday button").click(function() {
        $("#info-birthday").css('display','block');
        $("#form-birthday").css('display','none');
        $("#close-form-birthday").css('display','none');
        $("#icon-form-birthday").css('display','block');

    });
    //close
    $("#close-form-tel").click(function() {
        $("#info-tel").css('display', 'block');
        $("#form-tel").css('display', 'none');
        $("#close-form-tel").css('display', 'none');
        $("#icon-form-tel").css('display', 'block');
    });
        //city
    $("#close-form-city").click(function() {
        $("#info-city").css('display', 'block');
        $("#form-city").css('display', 'none');
        $("#close-form-city").css('display', 'none');
        $("#icon-form-city").css('display', 'block');
    });
        //birthday
    $("#close-form-birthday").click(function() {
        $("#info-birthday").css('display','block');
        $("#form-birthday").css('display','none');
        $("#close-form-birthday").css('display','none');
        $("#icon-form-birthday").css('display','block');
    });
});
// layout Masonry after each image loads
$('.grid-item').on('change', function(){
    var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer',
        horizontalOrder: true,
    });
    $grid.imagesLoaded()
        .always(function (instance) {
            console.log('all images loaded');

        })
        .done(function (instance) {
            console.log('all images successfully loaded');
            $('#item').addClass('item')
        })
        .fail(function () {
            console.log('all images loaded, at least one is broken');
        })
        .progress(function () {
            $grid.masonry();
        })}
);



/***/


$(function() {
    var i=1;

    function checkAdd(){
        if(i<3){
            $(".imgAdd").show();
        }else {
            $(".imgAdd").hide();
        }
    }

    $(".imgAdd").click(function(){
        if(i<3) {
            $(this).closest(".row").find('.imgAdd').before('<div class="imgUp"><div class="imagePreview"><div class="shadow-input">\n' +
                '                            <label class="img-input"><i class="fas fa-upload"></i>\n' +
                '                                <input type="file" name="image[]" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">\n' +
                '                            </label>\n' +
                '                        </div>' +
                '</div><i class="fa fa-times del"></i></div>');
            i++;
            console.log(i)
            checkAdd();
        }
    });

    $(document).on("click", "i.del" , function() {
        i--;
        $(this).parent().remove();
        console.log(i)
        checkAdd();
    });
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }else {
            alert('Виберіть Фото')
        }

    });
});
