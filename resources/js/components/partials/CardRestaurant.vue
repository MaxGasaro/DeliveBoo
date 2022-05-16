<template>
    <div class="card h-100">
        <router-link :to="{name: 'restaurant', params: {slug: restaurant.slug}}">
            <img class="card-img-top" :src="restaurant.image" :alt="restaurant.name">
            <div class="card-body">
                <h5 class="card-title font-weight-semibold mb-1">{{restaurant.name}}</h5>
                <span v-for="typology in restaurant.typologies" :key="typology.id" class="card-text font-weight-light">
                    {{typology.name}} &#183; 
                </span>
                <p class="font-weight-lighter mt-2">{{restaurant.address}} &#183; Consegna gratuita</p>
            </div>
        </router-link>
    </div>
    
</template>

<script>
export default {
    name: 'CardRestaurant',
    props: ["restaurant"]
}
</script>

<style scoped lang="scss">
.card {
    .card-img-top {
        height: 150px;
    }
    .card-body {
        color: #000;
        span, p {
            font-size: 14px;
        }
    }
}
</style>

