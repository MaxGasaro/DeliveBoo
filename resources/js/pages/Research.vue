<template>
  <div class="research">
    <Searchbar @goSearch="doSearch"></Searchbar>
    <div class="px-4">
        <div class="row justify-content-center">
            <!-- Part left -->
            <div class="col-4 col-md-2 p-left">
                <div class="row my-3">
                    <div class="col-3">
                        <img id="rider" src="img/rider-deliveroo.png" alt="">
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold">Indirizzo</p>
                    </div>
                    <!-- <div class="col-3 ms_green">
                        <a class="font-weight-light" href="#">Cambia</a>
                    </div> -->
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
                        <a class="d-flex justify-content-between align-items-center" @click="changeArrow" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span>Categorie</span>
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
            <div class="col-8 col-md-10 px-5 p-right">
                <div class="row flex-wrap justify-content-start">
                    <div class="type rounded mr-2 my-2" v-for="(type, index) in nameSelected" :key="index">
                        {{type.name}}
                        <i @click="removeType(type.id)" class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <!-- <div class="row my-3">
                    <Carousel></Carousel>
                </div> -->
                <h4 class="my-2">Ristoranti per le tipologie selezionate:
                    <span v-if="nameSelected.length == 0">
                        Nessuna categoria selezionata
                    </span> 
                    <span v-else v-for=" (name, index) in nameSelected" :key="index">
                        {{name.name}} &#183;

                    </span>
                </h4>
                <div class="container-restaurants">
                    <div v-if="restaurants.length == 0" class="row h-100 justify-content-center align-items-center">
                        <span class="no-types">
                            Ci dispiace ma non sono presenti ristoranti per queste categorie
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3" v-for="restaurant in restaurants" :key="restaurant.id">
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
            nameType: false,
            nameSelected: [],
            search: '',
            urlTypes : '/api/searcht/',
            urlUsers : '/api/searchu/',
        }
    },
    components: {
        CardRestaurant,
        Searchbar,
        Carousel
    },
    
    methods:{   
        GetTipologies(){
            axios.get("/api/typologies")
            .then(response =>{
                this.typologies = response.data.response;
                console.log(this.nameSelected);
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
            this.getTipologiesFilter();
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
        doSearch(search) {
            if(this.search.length <= 0)
                this.restaurants = [],
                search = "";
            if(this.search.length < 2)
                return;

            this.searchTipology(search);
            this.searchUsers(search);
        },
        getTipologiesFilter() {
            let array=[];
            this.typologies.forEach(element => {
                if(this.selected.includes(element.id)){
                    array.push(element);
                }

                this.nameSelected = array.filter(function(item, pos) {
                    return array.indexOf(item) == pos;
                })
            });
        },
        removeType(id){
            console.log(this.selected,id);
            for(let i=0; i<this.nameSelected.length; i++){
            if(this.nameSelected[i].id == id) {
                this.nameSelected.splice(i,1);
                this.selected.splice(i,1);
                }
            }
            this.getFilterRestaurants();
        },
        searchTipology(search){
            let adaptText = search.replace(/\s+/g, '');
            adaptText = adaptText.toLowerCase();
            if(adaptText == ''){
                return 0;
            }
            axios.get(this.urlTypes+adaptText)
                .then((response) => {
            // handle success
                this.restaurants = [];
                this.typologies.push (...response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        searchUsers(search){
            let adaptText = search.replace(/\s+/g, '');
            adaptText = adaptText.toLowerCase();
            if(adaptText == ''){
                return 0;
            }
            axios.get(this.urlUsers+adaptText)
                .then((response) => {
            // handle success
                this.restaurants.push (...response.data);
                console.log(this.restaurants);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
    },

    mounted(){
        this.GetTipologies();
        this.GetRestaurants();
    }

}
</script>

<style>
/* .research {
    height: 100vh;
} */
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

    .type {
        padding: 4px 8px 4px 12px;
        background-color: #00b8a9;
        color: white;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .fa-xmark{
        font-size: 1.2em;
    }
    .fa-xmark:hover{
        cursor: pointer;
        transform: scale(1.1);
    }

    .no-types {
        color: #00b8a9;
        font-size: 2rem;
    }

</style>