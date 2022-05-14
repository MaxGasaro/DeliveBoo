<template>
<div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Deliveboo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <div class=" dropdown my-2 mr-5 my-lg-0">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="total-quantity">0</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                
            </div>
        </nav>
    </header>
  <div class="container-fluid">
      <div class="row">
          <div class="col">
            <div v-if="restaurant">
                <h1>{{restaurant.name}}</h1>

                <img class="w-50" :src="restaurant.image" :alt="restaurant.name">
                <!--Aggiungere tutte le tipologie del ristorante-->
                <p>{{restaurant.address}}</p>

                <div class="row">
                    <div class="col-8">
                       <div class="row">
                            <div class="col-6 mb-2" v-for="food in foods" :key="food.id">
                               <div class="card  h-100" style="max-width: 540px;">
                                    <div class="row no-gutters ">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center pl-2 ">
                                            <img :src="food.img" :alt="food.name" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
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

                    <div class="col-4">
                        <div class="box">
                            <div>
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p>Il carrello è vuoto</p>
                            </div>
                            <button class="btn btn-secondary">Vai al pagamento</button>
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
export default {
    name:'SingleRestaurant',
    data(){
        return{
            restaurant : null,
            foods: [],
            slug: this.$route.params.slug,
            showCart: false,
        }
    },
    methods:{
        getRestaurant(){
            axios.get('/api/restaurant/' + this.slug)
            .then(response =>{
            if (response.data.success == false){
                
                this.$router.push({name: 'not-found'});
            }else{
                console.log(response);
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
        }
    },
    mounted(){
        this.getRestaurant();
        this.getFoods();
    }
}
</script>

<style>

</style>