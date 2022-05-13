<template>
    <div class="container">
        <h1>Per completare il tuo ordine presso {{name}} compila i seguenti dati</h1>

        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="client_name" class="col-form-label col-4">Nome e cognome<strong>*</strong></label>
                    <input class="col-7" type="text" name="" id="client_name" required placeholder="inserisci il tuo nome">
                </div>

                <div class="form-group">
                    <label for="client_address" class="col-form-label col-4">Indirizzo<strong>*</strong></label>
                    <input class="col-7" type="text" name="" id="client_address" required placeholder="inserisci il tuo indirizzo">
                </div>

                <div class="form-group">
                    <label for="client_phone" class="col-form-label col-4">Numero di cellulare<strong>*</strong></label>
                    <input class="col-7" type="text" name="" id="client_phone" required placeholder="inserisci il tuo telefono">
                </div>

                <div class="form-group">
                    <label for="client_note" class="col-form-label col-4">Note aggiuntive</label>
                    <small class="d-block col-4">max: 255 caratteri</small>
                    <textarea class="form-control" name="" id="client_note" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>

        
        
    </div>
</template>

<script>
    export default {
        name: 'Order',
        data(){
            return{
                name: this.$route.params.name
            }
        }
    }
</script>

<style>

</style>