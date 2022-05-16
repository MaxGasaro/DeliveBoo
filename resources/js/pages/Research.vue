<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand pl-4" href="#">Deliveboo</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ml-auto row">
                <form class="form-inline my-2 my-lg-0 bg-white rounded border border-2 pl-1">
                    <i class="fa-solid fa-magnifying-glass ml-2"></i>
                    <input class="form-control mr-sm-2 border-0" type="search" placeholder="Ristoranti, tipologie..." >
                </form>
            </div>
        </div>
        <div class="px-4">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <button class="btn btn-outline-success my-sm-0" type="submit">Menu</button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row m-2 d-block d-lg-none">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4 d-flex align-items-center border rounded">
            <div class="img-search">
                <span class="img-search-span">
                    <svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
                </span>
            </div>
            <form class="form-inline my-2 my-lg-0 bg-white pl-1 w-100">
                <input id="ms_input" class="form-control border-0 w-100" type="search" placeholder="Ristoranti, tipologie..." >
            </form>
        </div>
    </div>
    <div class="px-md-5">
        <div class="row justify-content-center">
            <!-- Part left -->
            <div class="d-none d-md-block col-2 p-left">
                <div class="row">
                    <div class="col-3">
                        <img src="#" alt="">
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Indirizzo</p>
                    </div>
                    <div class="col-3 ms_green">
                        <a class="font-weight-light" href="#">Cambia</a>
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
                        <a @click="changeArrow" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Categoria
                            <i v-if="expandedCategory" class="fa fa-arrow-right"></i>
                            <i v-else class="fa fa-arrow-down"></i>
                        </a>
                    </p>
                    <div class="collapse list-category" id="collapseExample" data-bs-spy="scroll"> 
                        <!-- <form class="" action="" id="MyForm" > -->

                            <ul>
                                <li v-for="(typology,index) in typologies" :key="index">
                                    <input type="checkbox" v-model="selected" :value="typology.id" :id="'typology_' + typology.id" @change="getFilterRestaurants()">
                                    <label :for="'typology_' + typology.id">{{typology.name}}</label>
                                </li>
                            </ul>
                        
                        <!-- </form> -->
                    </div> 
                </div>        
            </div>
            <!-- Part right -->
            <div class="col-12 col-md-10 px-5 p-right">
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
                <div class="container-restaurants">
                    <div class="row">
                        <div class="col-6 col-lg-4 col-xl-3" v-for="restaurant in restaurants" :key="restaurant.id">
                            <CardRestaurant :restaurant ="restaurant"/>           
                        </div>
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
            expandedCategory: true,
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

        changeArrow(){
            this.expandedCategory = !this.expandedCategory;
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
            // document.getElementById('MyForm').submit;
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

    .list-category{
    overflow-y: scroll;
    height: 500px;
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

    .ms_green a {
        color: #00b8a9;
        font-size: 14px;
    }

    form i {
        color: lightgray;
    }

    /* #ms_input::before {
        content: 'f002';
        width: 10px;
        height: 10px;
    } */

   

</style>