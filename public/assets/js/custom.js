function swalConfirm(title, text, confirmButtonText, callback) {
    Swal.fire({
        title,
        text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText,
    }).then((result) => {
        if (result.isConfirmed) {
            callback();
        }
    });
}
