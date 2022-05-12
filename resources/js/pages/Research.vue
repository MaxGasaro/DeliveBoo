<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Deliveboo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="row justify-content-center mx-auto">
                <form class="form-inline my-2 my-lg-0 bg-white rounded border border-2 pl-1">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input class="form-control mr-sm-2 border-0" type="search" placeholder="Ristoranti, tipologie..." >
                </form>
            </div>
            <div class="ml-auto pr-5">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Menu</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="px-5">
        <div class="row">
            <!-- Part left -->
            <div class="col-2 p-left">
                <div class="row">
                    <div class="col-3">
                        <img src="" alt="">
                    </div>
                    <div class="col-6">
                        <p>Indirizzo</p>
                        <p>...</p>
                    </div>
                    <div class="col-3">
                        <a href="#">Cambia</a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group">
                        <form>
                            <div id="select">
                                <input type="radio" value="val1" name="select" id="consegna"><label for="consegna"><span class="ml-1"> Consegna</span></label><br>
                                <input type="radio" value="val2" name="select" id="ritiro"><label for="ritiro"><span class="ml-1"> Ritiro</span></label>
                            </div>
                        </form>                     
                    </div>
                </div>
                <!-- Category -->
                <div class="category">
                    <p>  
                        <a v-fo data-toggle="collapse" href="#collapseExample" role="button">
                            Categoria
                            <i onclick="changeArrow()" class="fa fa-arrow-right"></i>
                        </a>
                    </p>
                    <div class="collapse list-category" id="collapseExample" data-bs-spy="scroll"> 
                        <form action="" @submit.prevent="getFilterRestaurants()">
                            <ul >
                                <li v-for="typology in typologies" :key="typology.id">
                                    <input class="form-check-input" type="checkbox" v-model="selected" :value="typology.id" :id="'typology_' + typology.id">
                                    <label class="form-check-label" :for="'typology_' + typology.id">{{typology.name}}</label>
                                </li>

                            </ul>

                        
                            <div>
                                <button type="submit" class="btn btn-primary">Cerca</button>
                            </div>
                        </form>
                    </div> 
                </div>        
            </div>
            <!-- Part right -->
            <div class="col-10 px-5 p-right">
                <div class="row">
                    <div>
                        <!-- qui andranno le categorie selezionate -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p>tipologia 1</p>
                                    <img src="#" class="d-block w-100" alt="#">
                                </div>
                                <div class="carousel-item">
                                    <p>tipologia 2</p>
                                    <img src="#" class="d-block w-100" alt="#">
                                </div>
                                <div class="carousel-item">
                                    <p>tipologia 3</p>
                                    <img src="#" class="d-block w-100" alt="#">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-stretch container-restaurants">
                    <div class="col-3" v-for="restaurant in restaurants" :key="restaurant.id">
                        <CardRestaurant :restaurant ="restaurant"/>           
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import CardRestaurant from "./../components/partials/CardRestaurant";
export default {
    name: 'Research',
    
    data(){
        return{
            typologies: [],
            restaurants: [],
            selected:[],
        }
    },
    components: {
        CardRestaurant
    },

    methods:{   
        GetTipologies(){
            axios.get("/api/typologies")
            .then(response =>{
                this.typologies = response.data.response;
            });
        },

        GetRestaurants(){
            axios.get("/api/restaurants")
            .then(response =>{
                this.restaurants = response.data.results;
                console.log(this.restaurants);
            })
        },

        getFilterRestaurants(){
            this.restaurants = [];
                if(this.selected.length > 0){
                    axios.get('api/restaurants/'+ this.selected) 
                    .then(response =>{
                        this.restaurants = response.data.results;
                        console.log(this.restaurants);
                    })
                }else{
                    this.GetRestaurants();
                }
        }
    },

    mounted(){
        this.GetTipologies();
        this.GetRestaurants();
    }

}
</script>

<style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style-type: none;
    }

    .p-left{
    height: 100vh;
    }

    .container-restaurants{
    -ms-overflow-style: none;
    scrollbar-width: none;
    overflow-y: scroll; 
    height: 100vh;
    }

    .container-restaurants::-webkit-scrollbar {
    display: none;
    }

</style>