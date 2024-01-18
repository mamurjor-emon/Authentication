function delete_data(dataId) {
    Swal.fire({
        title: "Are you sure delete?",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm"
    }).then((t => {
        t.isConfirmed && (
            event.preventDefault(),
            document.getElementById("delete-form-" + dataId).submit(),
            Swal.fire("Deleted Successfully!", "", "success")
        )
    }))
}




