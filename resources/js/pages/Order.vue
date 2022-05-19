<template>
    <div class="container-fluid pb-5">
        <h1 class="text-center">Per completare il tuo ordine presso {{name}} compila i seguenti dati</h1>
        <div class="container">

            <div class="row">

                <div class="modal" tabindex="-1" id="thx">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-title w-100">Grazie per aver ordinato🎉</h5>
                            <button type="button" class="close" data-dismiss="modal" id="closed">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Grazie per aver ordinato da noi. Riceverai presto un'email di conferma dell'avvenuto ordine. Speriamo di rivederla presto👍</p>
                        </div>
                        <div class="modal-footer px-2">
                            <router-link id="leave" class="btn btn-primary w-100" :to="{name: 'home'}">Torna alla home</router-link>
                        </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-md-8">
                    <form @submit.prevent="makeOrder" class="w-100 p-5 card">
                        
                        <div class="form-group">
                            <label for="customer_name" class="col-form-label col-12 col-md-4">Nome e cognome<strong>*</strong></label>
                            <input :disabled="inputBlock" v-model="customer_name" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.customer_name}" type="text" name="customer_name" id="customer_name" required maxlength="50" placeholder="inserisci il tuo nome">

                            <p v-for="(error, index) in errors.customer_name" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="customer_address" class="col-form-label col-12 col-md-4">Indirizzo<strong>*</strong></label>
                            <input :disabled="inputBlock" v-model="customer_address" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.customer_address}" type="text" name="customer_address" id="customer_address" required maxlength="100" placeholder="inserisci il tuo indirizzo">
                        
                            <p v-for="(error, index) in errors.customer_address" :key="'error_address' +index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="customer_email" class="col-form-label col-12 col-md-4">Email<strong>*</strong></label>
                            <input :disabled="inputBlock" v-model="customer_email" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.customer_email}" type="email" name="customer_email" id="customer_email" required maxlength="100" placeholder="inserisci la tua email">

                            <p v-for="(error, index) in errors.customer_email" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="customer_phone" class="col-form-label col-12 col-md-4">Numero di cellulare<strong>*</strong></label>
                            <input :disabled="inputBlock" v-model="customer_phone" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.customer_phone}" type="text" name="customer_phone" id="customer_phone" required pattern="[0-9]+" minlength="9" maxlength="15" placeholder="inserisci il tuo telefono">
                        
                            <p v-for="(error, index) in errors.customer_phone" :key="'error_phone' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="comment" class="col-form-label col-12 col-md-4">Note aggiuntive</label>
                            <small class="d-block col-12 col-md-4">max: 255 caratteri</small>
                            <textarea v-model="comment" class="form-control" :class="{'is-invalid':errors.comment}" name="comment" id="comment" cols="30" rows="10"></textarea>
                        
                            <p v-for="(error, index) in errors.comment" :key="'error_comment' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <button :disabled='orderSending' type="submit" class="btn btn-primary">{{orderSending ? 'Ordinazione in corso' : 'Ordina'}}</button>

                        <div class="collapse">
                            <div class="card card-body">
                               <payment
                                @onSuccess="paymentOnSuccess"
                                @onError="paymentOnError"
                                />
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card p-4">

                        <h3>Riepilogo Ordine</h3>
                        <ul>
                            <li v-for="(el, index) in cart " :key="index">
                                {{el.food.name}} {{el.quantity}} x {{el.food.price}} =  {{(el.quantity * el.food.price).toFixed(2)}} &euro;
                            </li>
                        </ul>
                        
                        <h2>Totale: {{totalPrice.toFixed(2)}} &euro;</h2>
                    </div>

                </div>
                
            </div> 
        </div>
    </div>
    
</template>


<script>

import payment from './partials/payment.vue';
    export default {
        name: 'Order',
        components:{
            payment,
        },
        data(){
            return{
                name: this.$route.params.name,
                customer_name: '',
                customer_address: '',
                customer_email: '',
                customer_phone: '',
                comment: '',
                errors: {},
                orderSending: false, //booleano che mostra la conferma di ordine inviato
                cart: null,
                totalPrice: 0,
                disableBuyButton : false,
                loadingPayment: true,
                inputBlock: false,
                form: {
                    token: '',
                    amount: ''
                }
                
            }
        },
        methods: {
            makeOrder(){

                this.orderSending = true;

                axios.post("/api/order", {
                    "customer_name" : this.customer_name,
                    "customer_address" : this.customer_address,
                    "customer_email" : this.customer_email,
                    "customer_phone" : this.customer_phone,
                    "customer_note" : this.customer_note,
                    "cart" : this.cart,
                    "price" : this.totalPrice
                }).then(response =>{
                    
                    /* this.orderSending = false; */
                    console.log(response);

                    if(response.data.errors){
                        this.errors = response.data.errors;
                        console.log(this.errors);
                        this.orderSending = true;
                    }else{
                        this.inputBlock = true;
                        $(".collapse").collapse('show');
                        /* this.customer_name= '';
                        this.customer_address= '';
                        this.customer_email= '';
                        this.customer_phone= '';
                        this.comment= ''; */
                    }
                });
            },
            getLocal(){
               this.cart =  localStorage.getItem('myCart');
               this.cart = JSON.parse(this.cart);
               console.log(this.cart);
            },
            getTotal(){
                this.totalPrice = 0;

                for(let i = 0; i <= this.cart.length; i++){
                    this.totalPrice += this.cart[i].total;
                }

                
                
            },
            paymentOnSuccess (nonce) {
            // alert(nonce);
                this.form.token = nonce
                this.buy()
            },
            // eslint-disable-next-line node/handle-callback-err
            paymentOnError (error) {
            },
            buy () {
                this.disableBuyButton = true
                this.loadingPayment = true

                try {
                    axios.post('/api/orders/make/payment', this.form )
                    .then(response =>{
                    console.log(response);
                    });
                    $("#thx").modal();
                } catch (error) {
                    this.disableBuyButton = false
                    this.loadingPayment = false
                }
            },
            leave(){
                $("#leave").click(function (e){
                    e.preventDefault();
                    document.getElementById('closed').click();
                })
            }

                    

        },
        created() {
            
            this.getLocal();
            this.getTotal();
            
        },
        mounted(){
            this.form.amount = this.totalPrice;
        }
    }
</script>

<style scoped lang="scss">
    .container-fluid{
        background: rgb(0,204,188);
        background: linear-gradient(160deg, rgba(0,204,188,1) 0%, rgba(0,204,188,1) 45%, rgba(255,255,255,1) 45%);
        

         input{
            display: inline-block;
        } 
    }

</style>