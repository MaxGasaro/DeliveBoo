window.onChange = onChange;
function onChange() {
    const password = document.getElementById("password");
    const confirm = document.getElementById("password-confirm");
  

    if (confirm.value === password.value) {
      confirm.setCustomValidity('');
    } else {
      confirm.setCustomValidity('Passwords do not match');
    }
}