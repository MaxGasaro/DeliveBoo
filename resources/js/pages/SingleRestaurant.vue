<template>
  <div class="container">
      <div class="row">
          <div class="col">
            <div v-if="restaurant">
                <h1>{{restaurant.name}}</h1>

                <img class="w-50" :src="restaurant.image" :alt="restaurant.name">
                <!--Aggiungere tutte le tipologie del ristorante-->
                <p>{{restaurant.address}}</p>

                <ul>
                    <li v-for="food in foods" :key="food.id">
                        {{food.name}}, {{food.price}}
                    </li>
                </ul>

                

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
            slug: this.$route.params.slug
        }
    },
    methods:{
        getRestaurant(){
            axios.get('/api/restaurants/' + this.slug)
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