<template>
  <div>
      Payment Component
      <div v-if="tokenGenerate">
        <v-braintree 
            :authorization="authorization"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"
        ></v-braintree>

         <div>
            <p v-if="error" class="text-red mt-4">
                {{ error }}
            </p>
        </div>

      </div>
  </div>
</template>

<script>
export default {
    name:'payment',
    data(){
        return{
            authorization: null,
            tokenGenerate: false,
            error: ''
        }
    },
    methods: {
        onSuccess (payload) {
            const token = payload.nonce;
            this.$emit('onSuccess', token)
        // Do something great with the nonce...
        },
        onError (error) {
            const message = error.message
            if (message === 'No payment method is available.') {
                this.error = 'Seleziona un metodo di Pagamento'
            } else {
                this.error = message
            }
                this.$emit('onError', message)
        }
    },
    created(){
        
        axios.get("/api/orders/generate")
        .then((response) => {
            this.authorization = response.data.token;
            console.log("questo è il token" + this.authorization);
            this.tokenGenerate = true;
        })
            
    }

}
</script>

<style>

</style>