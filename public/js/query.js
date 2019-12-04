$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".btn-submit").click(function(e){
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