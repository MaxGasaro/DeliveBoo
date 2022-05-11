<template>
  <div class="container">
      <div class="row">
          <div class="col">
            <div v-if="restaurant">
                <h1>{{restaurant.name}}</h1>

                <img class="img-fluid" :src="restaurant.image" :alt="restaurant.name">
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
    name:'Restaurant',
    data(){
    return{
      restaurant : null,
      foods: null,
    }
    },
    methods:{
        getRestaurant(){
            const slug = this.$route.params.slug;
            console.log(slug);
            axios.get('/api/restaurant/' + slug)
            .then(response =>{
            if (response.data.success == false){
                this.$router.push({name: 'not-found'});
            }else{
                console.log(response);
                this.restaurant = response.data.results;
            }
            })
        },
        getFoods(){
            const slug = this.$route.params.slug;
            axios.get('/api/foods/' + slug)
            .then(response =>{
            if (response.data.success == false){
                this.$router.push({name: 'not-found'});
            }else{
                console.log(response);
                this.foods = response.data.result;
            }
            })
        }

    },
    mounted(){
        this.getRestaurant;
    }

    
}
</script>

<style>

</style>