<template>
  <div class="row">
    <VueSlickCarousel v-bind="settings" class="col-2">
        <div v-for="category in categories" :key="category.id">
            <img :src="category.img" alt="#">
            <span>{{category.name}}</span>
        </div>
    </VueSlickCarousel>
  </div>
</template>
    
<script>
import VueSlickCarousel from 'vue-slick-carousel'

import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
    name: 'CarouselCopy',
    components: {
        VueSlickCarousel
    },
    data() {
        return {
            categories: [],
            settings: {
                "dots": true,
                "infinite": false,
                "speed": 500,
                "slidesToShow": 4,
                "slidesToScroll": 4,
                "initialSlide": 0,
                "responsive": [
                    {
                    "breakpoint": 1024,
                    "settings": {
                        "slidesToShow": 3,
                        "slidesToScroll": 3,
                        "infinite": true,
                        "dots": true
                    }
                    },
                    {
                    "breakpoint": 600,
                    "settings": {
                        "slidesToShow": 2,
                        "slidesToScroll": 2,
                        "initialSlide": 2
                    }
                    },
                    {
                    "breakpoint": 480,
                    "settings": {
                        "slidesToShow": 1,
                        "slidesToScroll": 1
                    }
                    }
                ]
            }
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