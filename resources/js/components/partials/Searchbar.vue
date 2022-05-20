<template>
<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-none border-bottom">
        <a class="navbar-brand pl-4" href="#">
            <img id="logo" :src="require('../../../../public/img/deliveroo-logo-tumb.png')" alt="logo deliveroo">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="w-100 row">
                <div class="d-flex align-items-center bg-white rounded border border-2 pl-1 w-75">
                    <i class="fa-solid fa-magnifying-glass ml-2"></i>
                    <input v-model="search" class="form-control mr-sm-2 border-0" type="search" placeholder="Ristoranti, tipologie" @keyup.enter="$emit('goSearch', search)">
                </div>
            </div>
        </div>
        <div class="px-4">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <div v-if="cartVoid"></div>
                    <div v-else><router-link :to="{name:'restaurant',params:{slug:restaurant}}"><button class="btn mr-2 border border-1" type="button"  style="background-color: white; color: black;"><i class="fa-solid fa-basket-shopping mr-1 text-dark"></i><span>{{(totalPrice).toFixed(2)}}&euro;</span></button></router-link></div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row m-2 d-block d-lg-none">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4 d-flex align-items-center border rounded">
            <div class="img-search">
                <span class="img-search-span">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" fill="#efefef"/></svg>
                </span>
            </div>
            <form class="form-inline my-2 my-lg-0 bg-white pl-1 w-100">
                <input v-model="search" id="ms_input" class="form-control border-0 w-100" type="search" placeholder="Ristoranti, tipologie" >
            </form>
        </div>
    </div> 
</div>
</template>

<script>
export default {
    name: 'Searchbar',
    data() {
        return {
            search: '',
            quantityFood: 1,
            cart: [],
            totalPrice:0,
            cartVoid: true,
            restaurant: null,
        }
    },
    methods: {
        getLocal(){
            if (localStorage.getItem('myCart') != null){
                let carrello = localStorage.getItem('myCart');
                carrello = JSON.parse(localStorage.getItem('myCart'));
                this.cart=carrello;
                this.cartVoid = false;
                this.getTotal();
            }
            
        },
        getTotal(){
            this.totalPrice = 0;
            for(let i = 0; i < this.cart.length; i++){
                this.totalPrice += this.cart[i].total;
            }       
        }
    },
    mounted(){
        this.getLocal();
        if(!this.cartVoid) 
          this.restaurant= this.cart[0].food.user.slug
    },
}
</script>

<style scoped lang="scss">
#logo {
    width: 50%;
}
div {
    i {
        color: #efefef;
    }
}
</style>