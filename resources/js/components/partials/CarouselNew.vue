<template>
  <Carousel :items-to-show="1.5">
    <Slide v-for="category in categories" :key="category.id">
      <img :src="category.img" alt="#">
      <span>{{category.name}}</span>
    </Slide>

    <template #addons>
      <Navigation />
      <Pagination />
    </template>
  </Carousel>
</template>

<script>
import { defineComponent } from 'vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

export default {
    name: 'CarouselNew',
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    data() {
        return {
            categories: [],
            images: [
                'img/category-img/antipasti',
                'img/category-img/primi',
                'img/category-img/secondi',
                'img/category-img/contorni',
                'img/category-img/dolci',
                'img/category-img/pizza',
                'img/category-img/bevande',
                'img/category-img/streetfood',
                'img/category-img/fastfood'
            ]
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
};
</script>
