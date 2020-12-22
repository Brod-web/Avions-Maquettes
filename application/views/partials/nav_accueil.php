<nav id="menu">
    <ul class="d-flex flex-wrap justify-content-end">
        <li id="login"><a href="<? echo base_url('login')?>">Accueil</a></li>
        <li id="signin"><a href="<? echo base_url('signin')?>">S'inscrire</a></li>
        <li><a href="<? echo base_url('login')?>#savoir">En savoir +</a></li>
    </ul>
</nav>

<nav id="menu-mobile">
    <div class="nav-item dropdown">
        <button class="btn text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px;"><i class="fas fa-bars"></i></button>
        <div class="dropdown-menu text-center">
            <div><a class="dropdown-item" href="<? echo base_url('login')?>">Accueil</a></div>
            <div><a class="dropdown-item" href="<? echo base_url('signin')?>">S'inscrire</a></div>
            <div><a class="dropdown-item" href="<? echo base_url('login')?>#savoir">En savoir +</a></div>
        </div>
    </div>
</nav>

<script>
/*$('.menuItem').on('click', function(){
    $('.menuItem').removeClass('on');
    $(this).addClass('on');
});*/
</script>