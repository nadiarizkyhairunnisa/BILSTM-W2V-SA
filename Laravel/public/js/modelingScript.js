function showTables(button_value, data_table) {
    data = button_value;
    console.log(data);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "GET",
        url: $("#row").data("modelingURL"),
        data: button_value,
        success: function (data) {
            console.log("function succeeded", data);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        },
    });
}

$(document).ready(function () {
    $("button").click(function (e) {
        e.preventDefault();
        if (e.target.name == "hide") {
            $("#" + e.target.value).empty();
            console.log(e.target.value);
        } else {
            var valueButton = e.target.value;
            const valueButtonArray = valueButton.split(",");

            showTables(
                (button_value = valueButtonArray[0]),
                (data_table = "#" + valueButtonArray[1])
            );
        }
    });
});
