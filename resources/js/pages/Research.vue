<template>
  <div>
    <Searchbar @goSearch="doSearch"></Searchbar>
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
                <div class="row">
                    <Carousel></Carousel>
                </div>
                <h4 class="my-2">Ristoranti per le tipologie selezionate:
                    <span v-if="nameType">
                        {{getTipologiesFilter}}
                    </span> 
                    <span v-else>
                        Nessuna categoria selezionata
                    </span>
                </h4>
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
import Carousel from "./../components/partials/Carousel";
export default {
    name: 'Research',
    
    data(){
        return{
            typologies: [],
            restaurants: [],
            selected:[],
            expandedCategory: true,
            nameType: false
        }
    },
    components: {
        CardRestaurant,
        Searchbar,
        Carousel
    },
    computed: {
        getTipologiesFilter() {
            for(let i=0; i<this.selected.length; i++) {
                console.log(this.selected[i]);
                for(let e=0; e<this.typologies.length; e++) {
                    if(this.typologies[e].id.includes(this.selected[i])) { //sistemare la funzione dentro if 
                        console.log(this.nameType);
                        this.nameType = true;
                        return this.typologies[e].name;
                    }
                }
            }
        }
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
        },
        doSearch(keyword) {
            let f = []
            if(keyword !== '') {
                f = this.restaurants.filter(e => {
                    e.name.toLowerCase().includes(keyword.toLowerCase());
                })
            } else {
                f = this.restaurants;
            }
            return f;
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