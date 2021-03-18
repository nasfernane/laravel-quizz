@include ('commons.header')

<div class="homeContainer">
    <header class="homeContainer__header">
        <p class="homeContainer__header__userName">
        </p>
        <form action="./php/controllers/handler.php?task=logout" method="POST" class="homeContainer__header__form">
            <button  class="homeContainer__header__form--btn">Se déconnecter</button>
        </form>
        
    </header>
    <h1>Home</h1>
</div>

@include ('commons.footer')
    
