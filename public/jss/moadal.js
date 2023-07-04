/*function confirmDelete(ev) {
    ev.preventDefault();
    var form = ev.target.form;
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
            form.submit();
        } else {
            swal("Your imaginary file is safe!");
        }
    });
}*/

//  form.submit();
function confirmDelete(ev) {
    ev.preventDefault();
    var form = ev.target.form;
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",

        cancelButtonColor: "#3085d6",
        confirmButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
    });
}
