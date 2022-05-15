<template>
  <div>
    <!-- inizio sezione navbar -->
    <div class="bg-yellow">
    <nav class="container navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">Deliveboo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
        <form class="form-inline my-2 my-lg-0 ml-auto">
          <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
              Collabora con noi
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" @click="link_admin" href="#">Area ristorante</a>
              <a class="dropdown-item" href="#">Lavora con noi</a>
              <a class="dropdown-item" href="#">Unisciti a noi</a>
            </div>
          </div>
          <button class="btn btn-outline-dark mx-1 my-2 my-sm-0" type="submit">Menu</button>
        </form>
      </div>
    </nav>
    <!--fine sezione navbar -->
    <!-- inizio sezione cerca -->
      <div class="container pt-5">
        <div class="row">
          <div class="col-6 text-center">
            <h1>I piatti che ami, a domicilio.</h1>
            <div class="row px-5 bg-white py-3" style="z-index: 500; position: absolute;">
              <span>Inserisci il tuo indirizzo per trovare ristoranti nei dintorni</span>
              <div class="col-9">
                <input class="form-control mr-sm-2" type="search" placeholder="Dove ?..." aria-label="Search">
              </div>
              <div class="col-3">
                <button class="btn btn-outline-success mx-1 my-2 my-sm-0" @click="link_research">Cerca</button>  
              </div>
            </div>

          </div>
          <div class="col-6">
            <div class="bg-right">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fine sezione cerca -->
    <!-- inizio main -->
    <div class="pt-5">
      <div class="container">
        <h1>La selezione di Delivero</h1>
        <div class="row">     
          <div class="col-6" @click="click_card"> 
            <a  href="#top">
              <div class="row px-2 m-1" style="height: 15vh; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://img.freepik.com/free-photo/big-hamburger-with-double-beef-french-fries_252907-8.jpg?w=2000');">
                <div class="col-12 text-center my-auto p-5 text-white  m-1">
                  <h3>Compfort food</h3>
                </div>
              </div>
              <div><span>I grandi classici che scaldano il cuore, perfetti in ogni momento.</span></div>
              <a>Scopri Comfort food</a>

            </a>
          </div>
          <div class="col-6" @click="click_card">
            <a  href="#top">
              <div class="row px-2 m-1" style="height: 15vh; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://insanelygoodrecipes.com/wp-content/uploads/2021/02/Homemade-Key-Lime-Fruit-Tart-with-Berries-800x530.png');">
                <div class="col-12 text-center my-auto p-5 text-white m-1">
                  <h3>Dolci e dessert</h3>
                </div>
              </div>
              <div><span>Dolci piaceri per rendere la giornata ancora più gustosa.</span></div>
              <a>Scopri Dolci e dessert</a>
            </a>
          </div>
        </div>
        <div class="row">     
          <div class="col-6" @click="click_card"> 
            <a  href="#top">
              <div class="row px-2 m-1" style="height: 15vh; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://media.timeout.com/images/105634384/image.jpg');">
                <div class="col-12 text-center my-auto p-5 text-white  m-1">
                  <h3>Perfetti da condividere</h3>
                </div>
              </div>
              <div><span>Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in un vera festa.</span></div>
              <a>Scopri Perfetti da condividere</a>
            </a>
          </div>
          <div class="col-6" @click="click_card">
            <a  href="#top">
              <div class="row mx-2 m-1 py-auto" style="height: 15vh; background-origin: content-box; background-position: center; background-size: 120%; background-repeat: no-repeat; background-image: url('https://www.foodsafetynews.com/files/2020/03/dreamstime_food-delivery-online-food-sales.jpg');">
                <div class="col-12 text-center text-white " style="heigth:100%; background-color:rgba(0, 0, 0, 0.2);">
                  <h3 class="font-weight-bold mt-4">Esclusiva Deliberoo</h3>
                </div>
              </div>
              <div><span>I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveroo.</span></div>
              <a>Scopri Esclusiva Deliberoo</a>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="click_card2">
      <div id="click_card" @click="disclick_card"></div>  
    </div>
  </div>
</template>

<script>
export default {
    name: 'Home',

    created() {
    window.addEventListener("scroll", this.handleScroll);
    },
    destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
    },
    methods:{ 
      link_admin(){
        this.$router.push('/admin');
        this.$router.go();
      },
      link_research(){
        this.$router.push('/research');
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
    },
}


</script>
  
<style>
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
  
  html{
    scroll-behavior: smooth;
  }
</style>