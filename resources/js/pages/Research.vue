<template>
  <div>
    <Searchbar></Searchbar>
    <div class="px-md-4">
        <div class="row justify-content-center">
            <!-- Part left -->
            <div class="d-none d-md-block col-2 p-left">
                <div class="row my-3">
                    <div class="col-3">
                        <img id="rider" src="img/rider-deliveroo.png" alt="">
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
                <div class="row d-none">
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
                <h3 class="my-2">Ristoranti per le tipologie selezionate</h3>
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
import Searchbar from "./../components/partials/Searchbar";
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
        CardRestaurant,
        Searchbar
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
    height: 100%;
    }

    .list-category{
    overflow-y: auto;
    height: 100%;
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

    

    /* #ms_input::before {
        content: 'f002';
        width: 10px;
        height: 10px;
    } */

   

    #rider {
        width: 30px;
        height: 30px;
    }

    .category a {
        color:#00b8a9;
    }

   

</style>