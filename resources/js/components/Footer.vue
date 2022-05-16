<template>
    <footer class="my_bg_footer">

        <div class="container-fluid  text-white ">

            <div class="row px-5 py-4 justify-content-around">


                <div class=" col-12 mb-2 col-sm-6 col-lg-3">
                    <FooterPartial title="Scopri Deliveboo" :items="discoverDeliveboo"/>
                </div>

                <div class=" col-12 mb-2 col-sm-6 col-lg-3">
                    <FooterPartial title="Note legali" :items="legalNotices"/>
                </div>

                <div class=" col-12 mb-2 col-sm-6 col-lg-3">
                    <FooterPartial title="Aiuto" :items="help"/>
                </div>

                <div class=" col-12 mb-2 col-sm-6 col-lg-3">
                    <FooterPartial title="Deliveboo Apps" :items="bringDeliveboo"/>
                </div>

                <!-- <div class="col bg-secondary text-white">
                    <h4>Scopri Deliveboo</h4>
                    <ul>
                        <li><a href="#">Investitori</a></li>
                        <li><a href="#">Chi siamo</a></li>
                        <li><a href="#">Ristoranti</a></li>
                        <li><a href="#">Altro</a></li>
                        <li><a href="#">Pressroom</a></li>
                        <li><a href="#">Il nostro blog</a></li>
                        <li><a href="#">Programmazione</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Lavora con noi</a></li>
                        <li><a href="#">Diventa nostro partner</a></li>
                    </ul>
                </div>

                <div class="col bg-secondary text-white">
                    <h4>Note legali</h4>
                    <ul>
                        <li><a href="#">Termini &amp; Condizioni</a></li>
                        <li><a href="#">Informativa sulla privacy</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>

                <div class="col bg-secondary text-white">
                    <h4>Aiuto</h4>
                    <ul>
                        <li><a href="#">Contatti</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Tipi di cucina</a></li>
                    </ul>
                </div>

                <div class="col bg-secondary text-white">
                    <h4>Porta DeliveBoo con te</h4>
                    <ul>
                        <li><img src="" alt=""></li>
                        <li><img src="" alt=""></li>
                    </ul>
                </div> -->

            </div>
        </div>
    </footer>
</template>

<script>
import FooterPartial from './partials/FooterPartial.vue';
export default {
    name: 'Footer',
    components: {
        FooterPartial
    },
    data() {
        return {
            discoverDeliveboo: [
                {
                    src: "#",
                    text: "Investitori"
                },
                {
                    src: "#",
                    text: "Chi siamo"
                },
                {
                    src: "#",
                    text: "Ristoranti"
                },
                {
                    src: "#",
                    text: "Altro"
                },
                {
                    src: "#",
                    text: "Pressroom"
                },
                {
                    src: "#",
                    text: "Il nostro blog"
                },
                {
                    src: "#",
                    text: "Programmazione"
                },
                {
                    src: "#",
                    text: "Design"
                },
                {
                    src: "#",
                    text: "Lavora con noi"
                },
                {
                    src: "#",
                    text: "Diventa nostro partner"
                }
            ],
            legalNotices: [
                {
                    src: "#",
                    text: "Termini e Condizioni"
                },
                {
                    src: "#",
                    text: "Informativa sulla privacy"
                },
                {
                    src: "#",
                    text: "Cookies"
                }
            ],
            help: [
                {
                    src: "#",
                    text: "Contatti"  
                },
                {
                    src: "#",
                    text: "FAQ"  
                },
                {
                    src: "#",
                    text: "Tipi di cucina"  
                }
            ],
            bringDeliveboo: [
                {
                    image: ""
                },
                {
                    image: ""
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
    .my_bg_footer {
        background-color: #2e3333;
    }
</style>