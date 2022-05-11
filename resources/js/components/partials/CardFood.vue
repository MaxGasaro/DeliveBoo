<template>
    <div class="card h-100">
        <router-link :to="{name: 'single-food', params: {slug: slug}}">
            <img class="card-img-top" :src="restaurant.image" :alt="restaurant.name">
            <div class="card-body">
                <h2 class="card-title font-weight-bold">{{restaurant.name}}</h2>
                <span v-for="typology in restaurant.typologies" :key="typology.id" class="card-text">
                    &#183; {{typology.name}}
                </span>
            </div>
            
        </router-link>
    </div>
    
</template>

<script>
export default {
    name: 'CardFood',
    props: ["restaurant"]
}
</script>

<style>

</style>