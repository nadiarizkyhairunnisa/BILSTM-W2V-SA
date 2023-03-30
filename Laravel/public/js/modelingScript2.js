$(document).ready(function () {
    $("button").click(function (e) {
        e.preventDefault();
        var buttonValue = e.target.value;
        console.log(buttonValue);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: $("#row").data("modelingURL"),
            type: "POST",
            data: { buttonValue: buttonValue },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
