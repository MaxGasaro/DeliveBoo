<template>
  <div>
    <!-- inizio sezione navbar -->
    <div class="bg-yellow">
    <nav class="container navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand"  style="width: 70%;" href=""><img src="img/Logo-delivero.png" alt="logo-deliveroo" style="width: 80px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
        <span class="navbar-toggler-icon" style="color: #00CCBC;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div v-if="cartVoid" class="text-center cart"></div>
        <div v-else><router-link :to="{name:'restaurant',params:{slug:restaurant}}"><button class="btn mr-2" type="button"  style="background-color: white; color: black;"><i class="fa-solid fa-basket-shopping mr-1"></i><span>{{(totalPrice).toFixed(2)}}&euro;</span></button></router-link></div>
        <form class=" my-2 my-lg-0 ">
          
          <div class="dropdown">
            <div class="row">
            </div>
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"  style="background-color: white; color: black;">
              Collabora con noi
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="http://127.0.0.1:8000/login">Area ristorante</a>
              <a class="dropdown-item" href="http://127.0.0.1:8000/register">Lavora con noi</a>
            </div>
          </div>
        </form>
      </div>
    </nav>
    <!--fine sezione navbar -->
    <!-- inizio sezione cerca -->
      <div class="container pt-5">
        <div class="row">
          <div class="col-12 mb-4 col-sm-6 text-center">
            <h1 class="font-weight-bold mb-5">I piatti che ami, a domicilio.</h1>
            <div class="px-5 bg-white py-3 rounded rounded-5 ml-3 mr-4" style="z-index: 500; position: absolute;">
                <span>Inserisci il tuo indirizzo per trovare ristoranti nei dintorni</span>
              <form action="">      
                <div class="row"> 
                  <div class="col-9 pl-0">
                    <input class="form-control mr-sm-2" type="search" required placeholder="Dove ?..." aria-label="Search">
                  </div>
                  <div class="col-3 px-1">
                    <button class="btn my-btn-home my-sm-0" @click="link_research()" required>Cerca</button>  
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-12 mb-4 col-sm-6">
            <div class="bg-right">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fine sezione cerca -->
    <!-- inizio main -->
    <!-- inizio sezione "La selezione di Deliveboo" -->
    <div class="pt-5">
      <div class="container">
        <h1 class="font-weight-bold mb-4 mx-2">La selezione di Deliveboo</h1>
        <div class="row">     
          <div class="col-12 mb-4 col-sm-6 col-lg-5" @click="click_card"> 
            <a  href="#top">
              <div class="row mx-2 m-1 py-auto" style="overflow: hidden; height: 120px; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://img.freepik.com/free-photo/big-hamburger-with-double-beef-french-fries_252907-8.jpg?w=2000');">
                <div class="col-12 text-center text-white d-flex justify-content-center align-items-center " style="heigth:100%; background-color:rgba(0, 0, 0, 0.2);  overflow: hidden;">
                  <h3 class="font-weight-bold">Comfort food</h3>
                </div>
              </div>
              <div class="mx-2">
                <div class="text-dark"><span>I grandi classici che scaldano il cuore, perfetti in ogni momento.</span></div>
                <a style="color:#00ccbc;">Scopri Comfort food</a>
              </div>
            </a>
          </div>
          <div class="col-12 mb-4 col-sm-6 col-lg-7" @click="click_card">
            <a  href="#top">
              <div class="row mx-2 m-1 py-auto" style="overflow: hidden; height: 120px; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://insanelygoodrecipes.com/wp-content/uploads/2021/02/Homemade-Key-Lime-Fruit-Tart-with-Berries-800x530.png');">
                <div class="col-12 text-center text-white d-flex justify-content-center align-items-center " style="heigth:100%; background-color:rgba(0, 0, 0, 0.2);  overflow: hidden;">
                  <h3 class="font-weight-bold">Dolci e dessert</h3>
                </div>
              </div>
              <div class="mx-2">
                <div class="text-dark"><span>Dolci piaceri per rendere la giornata ancora più gustosa.</span></div>
                <a style="color:#00ccbc;">Scopri Dolci e dessert</a>
              </div>
            </a>
          </div>
        </div>
        <div class="row">     
          <div class="col-12 mb-4 col-sm-6 col-lg-7" @click="click_card"> 
            <a  href="#top">
              <div class="row mx-2 m-1 py-auto" style="overflow: hidden; height: 120px; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://media.timeout.com/images/105634384/image.jpg');">
                <div class="col-12 text-center text-white d-flex justify-content-center align-items-center " style="heigth:100%; background-color:rgba(0, 0, 0, 0.2);  overflow: hidden;">
                  <h3 class="font-weight-bold">Perfetti da condividere</h3>
                </div>
              </div>
              <div class="mx-2">
                <div class="text-dark"><span>Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in un vera festa.</span></div>
                <a style="color:#00ccbc;">Scopri Perfetti da condividere</a>
              </div>
            </a>
          </div>
          <div class="col-12 mb-4 col-sm-6 col-lg-5" @click="click_card">
            <a  href="#top">
              <div class="row mx-2 m-1 py-auto" style="overflow: hidden; height: 120px; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://www.foodsafetynews.com/files/2020/03/dreamstime_food-delivery-online-food-sales.jpg');">
                <div class="col-12 text-center text-white d-flex justify-content-center align-items-center" style="heigth:100%; background-color:rgba(0, 0, 0, 0.2); overflow: hidden;">
                  <h3 class="font-weight-bold">Esclusiva Deliveboo</h3>
                </div>
              </div>
              <div class="mx-2">
                <div class="text-dark"><span>I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveboo.</span></div>
                <a style="color:#00ccbc;">Scopri Esclusiva Deliveboo</a>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- fine sezione "La selezione di Deliboo" -->
    <!-- inizio sezione "Lavora con Deliveboo" -->
    <div class="container">
      <h1 class="mx-1 mb-4 font-weight-bold">Lavora con Deliveboo</h1>
      <div class="row mx-1">
        <div class="col-12 mb-4 col-sm-4">
          <div>
            <img src="https://cwa.roocdn.com/_next/static/riders.90e61988.jpg" alt="" style="width: 100%; max-height: 260px;">
          </div>
          <div class="p-4" style="background-color: #FF483B; color: white; min-height: 278px;">
            <h1 class="font-weight-bold">Rider</h1>
            <div class="mb-3"><span>Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</span></div>
            <div class="dropdown mt-5 pt-3">
              <a class="btn btn-success my-2 my-sm-0"  style="background-color:#00ccbc;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                Unisciti a noi
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Scusateci, per ora non cerchiamo rider.</a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-12 mb-4 col-sm-4" style="heigth: 100%;">
          <div>
            <img src="https://cwa.roocdn.com/_next/static/restaurants.3db91a35.jpg" alt="" style="width: 100%; max-height: 260px;">
          </div>
          <div class="p-4" style="background-color: #FF8100; color: white;">
            <h1 class="font-weight-bold">Ristoranti</h1>
            <div class="mb-3"><span>Diventa partner di Deliveboo e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.</span></div>
            <a href="http://127.0.0.1:8000/register"><button class="btn btn-success my-2 my-sm-0" style="background-color:#00ccbc;">Diventa nostro partner</button></a>
          </div>
        </div>

        <div class="col-12 mb-4 col-sm-4" style="heigth: 100%;">
          <div>
            <img src="https://cwa.roocdn.com/_next/static/team.d18fbb67.jpg" alt="" style="width: 100%; max-height: 260px;">
          </div>
          <div class="p-4" style="background-color: #BAC3C3; color: white;">
            <h1 class="font-weight-bold">Lavora con noi</h1>
            <div class="mb-3"><span>La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.</span></div>
            <a href="http://127.0.0.1:8000/register" ><button class="btn btn-success my-2 my-sm-0" style="background-color:#00ccbc;">Lavora con noi</button></a>
          </div>
        </div>
      </div>     
    </div>
    <!-- fine sezione "Lavora con Deliveboo" -->
    <div id="click_card2">
      <div id="click_card" @click="disclick_card"></div>  
    </div>
  </div>
</template>

<script>
export default {
    name: 'Home',
    data(){
        return{
            quantityFood: 1,
            cart: [],
            totalPrice:0,
            cartVoid: true,
            restaurant: null,
            address: ''
          }
    },

    created() {
    window.addEventListener("scroll", this.handleScroll);
    },

    destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
    },
    

    methods:{ 

      /* link_admin(){
        this.$router.push('/admin/');
        this.$router.go();
      }, */

      link_research(){
        this.$router.push('/research');
        localStorage.setItem('myAddress', JSON.stringify(this.address));
      },

      click_card() {
        document.getElementById('click_card').style.cssText = 
          'width: 100%; min-height: 500%; opacity: 2;top: 0; z-index: 101; background: rgba(0,0,0,.3); position: absolute;'
        this.waitOnScrollTerminated(() => this.waitOnScrollMoved(this.disclick_card))
      },

      waitOnScrollTerminated(fn){
        let reExecute = () => setTimeout(() => {
            if (window.scrollY == 0){
              fn();
            }
            else
              reExecute();
          }, 200);
          reExecute();
      },

      waitOnScrollMoved(fn){
        let reExecute = () => setTimeout(() => {
            if (window.scrollY != 0){
              fn();
            }
            else
              reExecute();
          }, 200);
          reExecute();
      },

      disclick_card(){
        document.getElementById('click_card').style.cssText ='' 
      },

      handleScroll(){
        console.log(window.scrollY)
      },

      getLocal(){
            this.cart =  localStorage.getItem('myCart'); 
            this.cart = JSON.parse(this.cart);
            if(this.cart.length != 0 ){
                this.cartVoid = false;
            }
            
        },
      
        getTotal(){
            this.totalPrice = 0;
            for(let i = 0; i < this.cart.length; i++){
                this.totalPrice += this.cart[i].total;
            }       
        }
    },
    mounted(){
        this.getLocal();
        this.getTotal();
        if(!this.cartVoid) 
          this.restaurant= this.cart[0].food.user.slug
    },
}


</script>
  
<style lang="scss">
  * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      list-style-type: none;
      text-decoration: none !important; 
  }

  .navbar{
    z-index: 100;
  }

  .bg-yellow{
    background-color: #d0eb99;
    padding-bottom: 100px;
    height: 500px;
  
  }

  .bg-yellow::before{
    content: "";
    width: 100%;
    height: 400px;
    position: absolute;
    background-color: #00ccbc;
    transform: skewY(-4deg);
    transform-origin: left;
    padding-bottom: 200px;
  }

  .bg-right{
    width: 50%;
    height: 500%;
    position: absolute;
    left: 25%;
    background-image: url(https://cwa.roocdn.com/_next/static/media/campaign.df58721f.svg);
    background-repeat: no-repeat;
  }

  .my-btn-home{
    color: #00ccbc;
        background-color: white;
        border-color: #00ccbc;

      &:hover{
        background-color: #00ccbc;
        color: white;   
      }
  }

  html{
    scroll-behavior: smooth;
  }
</style>