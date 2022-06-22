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
//eliminazione dalla pagina
window.btnDelete= btnDelete;

//funzione dalla quale ricavo l'id e la rotta poi lo passo nell'action del form dell'index
function btnDelete(id,route){
  document.getElementById("myForm").action = route + "/" + id;
}

//funzione per vedere se si è selezionata almeno una tipologia
let checkBoxes = document.getElementsByClassName('control-check');
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




