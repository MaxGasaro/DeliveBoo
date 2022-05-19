<template>
<div>
  <div class="container-fluid">
      <Searchbar/>
      <div class="row">
          <div class="col">
            <div v-if="restaurant">

                <div class="row p-md-5 info-restaurant">
                    <div class="col-12 col-sm-4 margin0-padding0">
                        <img class="img-fluid"  :src="restaurant.image" :alt="restaurant.name">
                    </div>

                    <div class="col-8">
                        <h1>{{restaurant.name}}</h1>
                        <span v-for="typology in restaurant.typologies" :key="typology.id" class="card-text font-weight-light">
                            {{typology.name}} &#183; 
                        </span>
                        <p>{{restaurant.address}}</p>

                    </div>
                </div>

                

                <div class="modal" tabindex="-1" id="card-product">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-title w-100">{{singleFood.name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" id="closed">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img :src="singleFood.img" :alt="singleFood.name" class="w-100">
                            <p>{{singleFood.description}}</p>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100 d-flex justify-content-center align-items-center">

                                <i class="fa-solid fa-circle-minus my-color-text" :class="(quantityFood == 1)? 'disabled':''" @click="(quantityFood == 1)? '': quantityFood --"></i>
                                <span class="px-4 h3">{{quantityFood}}</span>
                                <i class="fa-solid fa-circle-plus my-color-text" @click="quantityFood ++"></i>

                            </div>
                            <button class="w-100 btn ms-btn-cart m-2 " @click="addToCart()">Aggiungi al carrello</button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal" tabindex="-1" id="empty-cart">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-title w-100">Attenzione!</h5>
                            <button type="button" class="close" data-dismiss="modal" id="empty">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Questo piatto appartiene a un altro ristorante, per poterlo aggiungere devi prima svuotare il carrello. Vuoi procedere?</p>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex justify-content-center align-items-ceter">

                                <button class=" btn btn-secondary m-2 " data-dismiss="modal">chiudi</button>
                                <button class="btn btn-danger m-2 " @click="svuotaCarrello()">Svuota carrello </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class=" col-12 col-md-8">
                       <div class="row ">
                            <div class="col-12 col-lg-6 mb-lg-2" v-for="food in foods" :key="food.id">
                               <div v-if="food.visible" id="card-product" class="card  h-100  food-card"  @click="getSingleFood(food)">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-body">
                                                <h5 class="card-title">{{food.name}}</h5>
                                                <p class="card-text">{{food.description}}</p>
                                                <p class="card-text">{{food.price}}€</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>   
                        </div> 
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card d-flex justify-content-center align-items-center p-3 cart-element">
                            
                            <div v-if="cartVoid" class="text-center cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p>Il carrello è vuoto</p>
                            </div>
                            
                            <div v-else v-for="(el, index) in cart " :key="index" class="d-flex justify-content-between w-100 py-1 cart-foods"> 
                                 
                                <span>{{el.food.name}} {{el.quantity}} x {{el.food.price}} =  {{(el.quantity * el.food.price).toFixed(2)}} &euro;</span>  
                                <span  @click="removeToCart(index)"> <i class="fa-solid fa-trash-can"></i></span>

                               <!--  <i class="fa-solid fa-circle-minus my-color-text" ></i>
                                <span class="px-4 h3">{{el.quantity}}</span>
                                <i class="fa-solid fa-circle-plus my-color-text" ></i>
                                 -->
                                

                            </div>

                            <div class="pay-section w-100">
                                <p><strong>Totale: </strong> {{(totalPrice).toFixed(2)}}&euro;</p>
                                <router-link :to="{name: 'order', params: {name: restaurant.name}}" class="btn w-100" :class="(cartVoid)? 'disabled  btn-secondary':'ms-btn-cart'" >Vai al pagamento</router-link>
                            </div>


                        </div>
                    </div>

                    
                </div>
            </div>

          </div>
      </div>
  </div>
</div>
</template>

<script>
import Searchbar from './../components/partials/Searchbar.vue';
export default {
    name:'SingleRestaurant',
    components:{
            Searchbar
        },
    data(){
        return{
            restaurant : [],
            foods: [],
            slug: this.$route.params.slug,
            singleFood: [],
            quantityFood: 1,
            cart: [],
            cartVoid: true,
            totalPrice:0
        }
    },
    methods:{
        getRestaurant(){
            axios.get('/api/restaurant/' + this.slug)
            .then(response =>{
            if (response.data.success == false){
                this.$router.push({name: 'not-found'});
            }else{
                this.restaurant = response.data.result;
            }
            })
        },
        getFoods(){
            axios.get('/api/foods/' + this.slug)
            .then(response =>{
            if (response.data.success == false){
                this.$router.push({name: 'not-found'});
            }else{
                this.foods = response.data.result;
            }
            })
        },
        getSingleFood(food){
      
            /* if(this.cart[0].food.user_id != food.user_id){
                $("#empty-cart").modal();
            }else{
                $("#card-product").modal(); 
                this.singleFood = [];
                this.quantityFood = 1;
                this.singleFood = food;
            } */

            if(this.cart.length > 0){
                if(this.cart[0].food.user_id != food.user_id){
                    $("#empty-cart").modal();
                }else{
                    $("#card-product").modal(); 
                    this.singleFood = [];
                    this.quantityFood = 1;
                    this.singleFood = food;

                }
            }else{

                $("#card-product").modal(); 
                this.singleFood = [];
                this.quantityFood = 1;
                this.singleFood = food;
            }
            
        },
        svuotaCarrello(){
            localStorage.removeItem("myCart");
            this.cart = [];
            this.singleFood = [];
            document.getElementById('empty').click();
            this.cartVoid= true;
            this.getTotal();
        },

        addToCart(){
            
            if(this.cartVoid){
                
               this.cart.push({
                    food: this.singleFood,
                    quantity : this.quantityFood,
                    total: this.quantityFood*this.singleFood.price
                });
                this.cartVoid = false; 
            
            }else{
                let found = false;
                for(let i = 0; i < this.cart.length; i++){
                    
                    if(this.cart[i].food.id == this.singleFood.id ){
                        this.cart[i].quantity += this.quantityFood; 
                        this.cart[i].total = this.cart[i].quantity *this.singleFood.price
                        found = true;
                        break;
                    }
                }

                if(!found){
                    this.cart.push({
                        food: this.singleFood,
                        quantity : this.quantityFood,
                        total: this.quantityFood*this.singleFood.price
                    });
                }  
               
            }
            document.getElementById('closed').click();
            localStorage.setItem('myCart', JSON.stringify(this.cart));
            this.getTotal();
        },
        removeToCart(index){
            this.cart.splice(index,1);
            localStorage.setItem('myCart', JSON.stringify(this.cart));

            if(this.cart.length == 0){
                this.cartVoid = true;
            }
            this.getTotal();
        },
        getLocal(){
            
            
            if (localStorage.getItem('myCart') != null){
                let carrello = localStorage.getItem('myCart');
                carrello = JSON.parse(localStorage.getItem('myCart'));
                this.cart=carrello;
                if(this.cart.length != 0 ){
                    this.cartVoid = false;
                }
                this.getTotal();
            }
     
        },
        getTotal(){
            this.totalPrice = 0;
                if(this.cart.length != 0){
                for(let i = 0; i <= this.cart.length; i++){
                    this.totalPrice += this.cart[i].total;
                } 
                
            }
            
        
            
        }

    },
    mounted(){
        this.getRestaurant();
        this.getFoods();
        this.getLocal();
    }
}
</script>

<style lang="scss" scoped>

   .info-restaurant{
       border-top: 1px solid #e9e9e9;
       border-bottom: 1px solid #e9e9e9;
       box-shadow: 3px 6px 18px #ebebeb ;
   }

   .cart-element{
       border: none;
       box-shadow: 3px 6px 18px #ebebeb ;
       .cart{
           color: #abadad;
           i{
               font-size: 35px;
           }
       }

       .cart-foods{
           font-size: 1.1rem;
           i:hover{
               color: red;
               cursor: pointer;
           }
        }
        .pay-section{
            border-top: 1px solid #e9e9e9 ;
        }
   }

    .food-card{
        cursor: pointer;
        border: none;
        box-shadow: 3px 6px 18px #ebebeb ;

        &:hover{
            box-shadow: 7px 23px 18px #ebebeb;
        }
    }

    .margin0-padding0 {
        margin-left: 0px !important;
        margin-right: 0px !important;
        padding: 0px !important;
    }

    .ms-btn-cart{
        color: #fff;
        background-color: #00ccbc;
        border-color: #00ccbc;

        &:hover{
         background-color: #048a7ffb;   
        }
    }

    .my-color-text{
        color: #00ccbc;
    }

    
    
</style>