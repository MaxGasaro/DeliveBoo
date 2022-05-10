<template>
    <div class="p-3 h-100 my_bg-div">

        <h4>{{title}}</h4>
        <ul class="list-group">
            <li v-for="(item, index) in items" :key="index">
                <a :href="item.src">{{item.text}}</a>
            </li>
        </ul>
        
    </div>
</template>

<script>
export default {
    name: 'FooterPartial',
    props: ["title", "items"]
}
</script>

<style lang="scss" scoped>
    .my_bg-div {
        background-color: #434848;
        ul {
            li {
                list-style: none;
                text-align: left;
                a {
                    text-decoration: none;
                    color: white;

                    &:hover {
                        color: #00B8A9;
                    }
                }
            }
        }
    }
</style>