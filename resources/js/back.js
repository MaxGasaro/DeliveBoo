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