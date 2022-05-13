<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Deliveboo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
        <form class="form-inline my-2 my-lg-0 ml-auto">
          <button class="btn btn-outline-success mx-1 my-2 my-sm-0" @click="link_admin" type="button">Area ristorante </button>
          <button class="btn btn-outline-success mx-1 my-2 my-sm-0" type="submit">Menu</button>
        </form>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
    name: 'Home',
    
    
    methods:{ 
      link_admin(){
        this.$router.push('/admin');
        this.$router.go();
      }
    },
}


</script>

<style>

</style>