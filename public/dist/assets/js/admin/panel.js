$('#btn-slider').click(function(){
    if($('#sliders').hasClass('active')){
        $('#sliders').removeClass('active');
        $('#sliders-background').removeClass('active');
    } else {
        $('#sliders').addClass('active');
        $('#sliders-background').addClass('active');
    }
});


$('#sliders-background').click(function(){
    $('#sliders').removeClass('active');
    $('#sliders-background').removeClass('active');
});

$('.btnLogout').click(() => {
    Swal.fire({
        title: 'Are you sure?',
        text: "Your will logout form admins system!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/admin/logout';
        }
      })
});
