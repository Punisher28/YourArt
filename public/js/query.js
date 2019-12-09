$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".btn-submit-pass").click(function(e){
    e.preventDefault();
    var data = $('#changePass').serialize();
console.log(data);
    $.ajax({
        type:'POST',
        url:'profile/changePass',
        data:data,
        success:function(res){
            if(res.error){
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-danger').text(res.error);
            }else {
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-success').text(res.success);
            }
        }
    });
});
$("#form-birthday button").click(function(e){
    e.preventDefault();
    var data = $('#changeBirthday').serialize();
    $.ajax({
        type:'POST',
        url:'profile/changeBirthday',
        data:data,
        success:function(res){
            if(res.error){
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-danger').text(res.error);
            }else {

                $('#info-birthday').empty();
                $('#info-birthday').append(res.res);
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-success').text(res.success);
            }
        }
    });
});
$("#form-city button").click(function(e){
    e.preventDefault();
    var data = $('#changeCity').serialize();
    console.log(data);
    $.ajax({
        type:'POST',
        url:'profile/changeCity',
        data:data,
        success:function(res){
            if(res.error){
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-danger').text(res.error);
            }else {

                $('#info-city').empty();
                $('#info-city').append(res.res);
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-success').text(res.success);
            }
        }
    });
});
$("#form-tel button").click(function(e){
    e.preventDefault();
    var data = $('#changeTel').serialize();
    console.log(data);
    $.ajax({
        type:'POST',
        url:'profile/changeTel',
        data:data,
        success:function(res){
            if(res.error){
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-danger').text(res.error);
            }else {
                $('#info-tel').empty();
                $('#info-tel').append(res.res);
                $('#errors').removeClass();
                $('#errors').addClass('alert alert-success').text(res.success);
            }
        }
    });
});


