
const forgotPassDialog = document.getElementById("forgotpassdialog");
const newPasswordDialog = document.getElementById("newPassword");

function showForgotPassDialog() {
    forgotPassDialog.showModal();
}

function showNewPasswordDialog() {
    newPasswordDialog.showModal();
}

function hideForgotPassDialog() {
    forgotPassDialog.close();
}

function hideNewPasswordDialog() {
    newPasswordDialog.close();
}


window.onload = function () {
    showLogin();
};

function showLogin() {
    document.getElementById("loginForm").classList.add("active");
    document.getElementById("signupForm").classList.remove("active");
    document.getElementById("loginbutton").style.backgroundColor = 'white';
    document.getElementById("signupbutton").style.backgroundColor = '';
    document.querySelector(".welcome p").textContent = "Welcome back!"; // Reset to "Welcome back!" when login is clicked
}

function showSignUp() {
    document.getElementById("signupForm").classList.add("active");
    document.getElementById("loginForm").classList.remove("active");
    document.getElementById("signupbutton").style.backgroundColor = 'white';
    document.getElementById("loginbutton").style.backgroundColor = '';
    document.querySelector(".welcome p").textContent = "Welcome and join us!";
}
