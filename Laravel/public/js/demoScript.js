$(document).ready(function () {
    $("#demo-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $("#submit").data("demoURL"),
            data: $("#demo-form").serialize(),
            success: function (response) {
                var parsedResponse = $(response);
                var specificPart = parsedResponse.find("#result");
                $("#result").html(specificPart);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(jqXHR);
                console.error(textStatus);
                console.error(errorThrown);
            },
        });
    });
});
