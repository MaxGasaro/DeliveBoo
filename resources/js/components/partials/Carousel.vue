<template>
  <Carousel>
    <Slide v-for="category in categories" :key="category.id" class="col-2 position-relative">
       
        <img :src="category.img" alt="#">
        <span>{{category.name}}</span>
        
    </Slide>
</Carousel>
</template>
    
<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
    name: 'CarouselCopyCopy',
        components: {
            Carousel,
            Slide
        },
    data() {
        return {
            categories: [],
        }
    },
    methods: {
        getCategories() {
            axios.get('/api/categories')
            .then(response => {
                this.categories = response.data.results;
            })
        }
    },
    mounted() {
        this.getCategories();
    }
}
</script>

<style lang="scss" scoped>
    img {
        width: 100%;
        height: 100px;
    }
    span {
        position: absolute;
        left: 8px;
        bottom: 8px;
        z-index: 999;
        color: #fff;
        text-transform: capitalize;
    }
</style>