<template>
<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand pl-4" href="#">
            <img id="logo" src="img/logo-deliveroo.png" alt="logo deliveroo">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ml-auto row">
                <form class="form-inline my-2 my-lg-0 bg-white rounded border border-2 pl-1">
                    <i class="fa-solid fa-magnifying-glass ml-2"></i>
                    <input class="form-control mr-sm-2 border-0" type="search" placeholder="Ristoranti, tipologie..." >
                </form>
            </div>
        </div>
        <div class="px-4">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <button class="btn btn-outline-success my-sm-0" type="submit">Menu</button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row m-2 d-block d-lg-none">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4 d-flex align-items-center border rounded">
            <div class="img-search">
                <span class="img-search-span">
                    <svg width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
                </span>
            </div>
            <form class="form-inline my-2 my-lg-0 bg-white pl-1 w-100">
                <input id="ms_input" class="form-control border-0 w-100" type="search" placeholder="Ristoranti, tipologie..." >
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'Searchbar'
}
</script>

<style scoped lang="scss">
#logo {
    width: 20%;
}
form {
    i {
        color: lightgray;
    }
}
</style>