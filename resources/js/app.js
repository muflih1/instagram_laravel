import "./bootstrap";
import $ from "jquery";

window.$ = $;

$(document).ready(() => {
    let emailInput = $("#email-input");
    let passwordInput = $("#password-input");

    let loginButton = $("#login_button");
    console.log(loginButton);

    loginButton.prop("disabled", true);

    emailInput.on("input", validateInputs);
    passwordInput.on("input", validateInputs);

    function validateInputs() {
        let emailLength = emailInput.val().length;
        let passwordLength = passwordInput.val().length;

        if (emailLength === 0 || passwordLength <= 5) {
            loginButton.prop("disabled", true);
        } else {
            loginButton.prop("disabled", false);
        }
    }

    $("#image-upload").on("change", function () {
        let formData = new FormData();
        formData.append("image-upload", $(this)[0].files[0]);
        let csrfToken = $("html").data("token");

        $.ajax({
            url: "http://127.0.0.1:8000/images/upload",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#preview")
                    .attr(
                        "src",
                        "http://127.0.0.1:8000/storage/" + response.uri
                    )
                    .show();
                $("#image").val(response.uri);
            },
        });
    });
});
