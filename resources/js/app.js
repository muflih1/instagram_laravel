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
});
