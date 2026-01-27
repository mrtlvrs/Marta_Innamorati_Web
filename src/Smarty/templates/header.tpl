<header id="header">
    <a href="{$BASE_URL}/home?reset=1" class="logo">
        <strong>CrochetHub</strong>
    </a>

    <ul class="icons">
        {if $isLogged}
            <li>Ciao @{$loggedUser->getUsername()}</li>
            <li><a href="{$BASE_URL}/logout" class="button">Esci</a></li>
        {else}
            <li><a href="{$BASE_URL}/login" class="button">Accedi</a></li>
            <li><a href="{$BASE_URL}/register"class="button primary">Registrati</a></li>
        {/if}
    </ul>
</header>