<template>
    <div class="card">
        <router-link :to="{name: 'single-food', params: {slug: slug}}" class="card-body">
            <div class="row">
                <div class="col-12">
                    <img src="" alt="">
                </div>
            </div>
            <h2 class="card-title font-weight-bold">nome ristorante</h2>
            <h5 class="card-text">tipologie</h5>
        </router-link>
    </div>
</template>

<script>
export default {
    name: 'CardRestaurant',
}
</script>

<style>

</style>