$('.btnLogout').click(function(){
    Swal.fire({
        title: "Logout?",
        text: "Apakah anda yakin keluar dari aplikasi!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar!'
    }).then((next) => {
        if (next.isConfirmed) {
            window.location.href = "/user/logout";
        }
    });
});