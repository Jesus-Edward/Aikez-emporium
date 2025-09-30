"use strict";

function EditCategory(id, url) {
    $.ajax({
        method: "GET",
        url: url + id,
        dataType: "json",
        success: function (data) {

            $("#cat_id").val(data.id);
            $("#cat").val(data.category);
            $("#catStatus").val(data.status);

            // if($("#catStatus").val(data.status) == 1) {
            //     $("#catStatus").addClass("selected");
            // }else if ($("#catStatus").val(data.status) == 0) {
            //     $("#catStatus").addClass("selected");
            // }
        },
    });
}

function markNotificationAsRead(url, notificationId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(url + notificationId, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({})
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("notification-count").textContent =
            data.count;
    })
    .catch(error => {
        console.log("Error", error);
    });
}
