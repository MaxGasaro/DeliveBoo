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

let checkBoxes = document.getElementsByClassName('control-check');

let form = document.getElementById("register-form");

let button = document.getElementById("register");

if (button){
  button.addEventListener("click", function(e){
    console.log(checkBoxes);
    
    let isChecked = false; 
    for (let i = 0; i < checkBoxes.length; i++){ 
      if (checkBoxes[i].checked ) { 
        isChecked = true; 
      } 
    }
    if (!isChecked) {
      e.preventDefault();

      $("#typology-selection").modal();
      /* console.log("Seleziona almeno una tipologia"); */
    }
  });
}




