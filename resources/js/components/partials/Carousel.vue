<template>

    <div class="row">
        <div v-for="category in categories" :key="category.id" class="col position-relative">
            <img :src="category.img" alt="#">
            <span>{{category.name}}</span>
        </div>
        <button class="control-prev" type="button"></button>
    </div>

</template>

<script>
export default {
    name: 'Carousel',
    data() {
        return {
            categories: []
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