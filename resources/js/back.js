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

function CheckBoxes(){ 
  let checkBoxes = document.getElementsByClassName('control-check');
  console.log(checkBoxes);
  let isChecked = false; 
  for (let i = 0; i < checkBoxes.length; i++){ 
    if ( checkBoxes[i].checked ) { 
      isChecked = true; 
    } 
  }
  if (!isChecked) { 
    alert( 'Seleziona almeno una tipologia'); 
  } 
}