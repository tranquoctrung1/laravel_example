$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function deleteMenu(id) {
    if (confirm("Are you sure you want to delete this menu?")) {
        $.ajax({
            url: "/admin/menu/delete",
            data: { id },
            type: "DELETE",
            datatype: "json",
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert(result.message);
                }
            },
        });
    }
    console.log(id);
}
