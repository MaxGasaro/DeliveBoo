<template>
    <div class="container">
        <h1>Per completare il tuo ordine presso {{name}} compila i seguenti dati</h1>

        <div class="row">

            <form @submit.prevent="makeOrder" class="w-100">
                <div class="col-8">
                    <div class="form-group">
                        <label for="customer_name" class="col-form-label col-4">Nome e cognome<strong>*</strong></label>
                        <input v-model="customer_name" class="col-7" type="text" name="customer_name" id="customer_name" maxlength="50" required placeholder="inserisci il tuo nome">

                        <p v-for="(error, index) in errors.customer_name" :key="'error_name' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="customer_address" class="col-form-label col-4">Indirizzo<strong>*</strong></label>
                        <input v-model="customer_address" class="col-7" type="text" name="customer_address" id="customer_address" maxlength="100" required placeholder="inserisci il tuo indirizzo">
                    
                        <p v-for="(error, index) in errors.customer_address" :key="'error_address' +index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="customer_phone" class="col-form-label col-4">Numero di cellulare<strong>*</strong></label>
                        <input v-model="customer_phone" class="col-7" type="text" name="customer_phone" id="customer_phone" required pattern="[0-9]+" maxlength="15" placeholder="inserisci il tuo telefono">
                    
                        <p v-for="(error, index) in errors.customer_phone" :key="'error_phone' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="comment" class="col-form-label col-4">Note aggiuntive</label>
                        <small class="d-block col-4">max: 255 caratteri</small>
                        <textarea v-model="comment" class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>
                    
                        <p v-for="(error, index) in errors.comment" :key="'error_comment' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ordina</button>
            </form>
            
        </div>

        
        
    </div>
</template>

<script>
    export default {
        name: 'Order',
        data(){
            return{
                name: this.$route.params.name,
                customer_name: '',
                customer_address: '',
                customer_phone: '',
                comment: '',
                errors: {}

            }
        },
        methods: {
            makeOrder(){
                axios.post("/api/order", {
                    "customer_name" : this.customer_name,
                    "customer_address" : this.customer_address,
                    "customer_phone" : this.customer_phone,
                    "customer_note" : this.customer_note
                }).then(response =>{
                    console.log(response);

                    if(response.data.errors){
                        this.errors = response.data.errors;
                        console.log(this.errors);
                    }else{
                        this.customer_name= '';
                        this.customer_address= '';
                        this.customer_phone= '';
                        this.comment= '';
                    }
                });
            }
        }
    }
</script>

<style>

</style>