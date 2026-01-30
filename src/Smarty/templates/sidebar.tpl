<div id="sidebar" class="inactive">
    <div class="inner">

        <section>
            <header class="major">
                <h2>Menu</h2>
            </header>

            <ul>
                <li><h3>  <a href="{$BASE_URL}/home?reset=1">Home </a></h3></li>
                <li><h3>  <a href="{$BASE_URL}/profile">Profilo </a></h3></li>
                <li><h3>  <a href="{$BASE_URL}/saved">Salvati </a></h3></li>
            </ul>
        </section>

        {*
            Sidebar contestuale:
            - Ultima creazione visualizzata
            - Ultimo autore visitato
            Mostrate solo se i dati esistono
        *}

        {if isset($lastCreation)}
        <article class="creation-card">
            <section>
                <header class="major">
                    <h3>Ultima creazione</h3>
                </header>

                <div class="sidebar-item">
                    <a href="{$BASE_URL}/creation/{$lastCreation.id}" class="image-link">
                        <img src="{$BASE_PUBLIC}/{$lastCreation.firstImage}" alt="{$lastCreation.title|escape}" class="creation-thumb">
                    </a>
                    <h3>{$lastCreation.title}</h3>
                </div>
            </section>
        </article>
        {/if}

        {if isset($lastAuthor)}
        <section>
            <header class="major">
                <h3>Ultimo autore</h3>
            </header>

            <div class="sidebar-author">
                <a href="{$BASE_URL}/profile/{$lastAuthor.username}">
                    {if $lastAuthor.hasAvatar}
                        <img src="{$BASE_PUBLIC}/{$lastAuthor.avatar}" class="sidebar-avatar">
                    {else}
                        <div class="sidebar-avatar placeholder">{$lastAuthor.initial}</div>
                    {/if}
                    <h3>@{$lastAuthor.username}</h3>
                </a>
            </div>
        </section>
        {/if}

        {if isset($isAdmin) && $isAdmin}
            <section class="admin-menu">
                <header class="major">
                    <h3>Amministrazione</h3>
                </header>

                <ul>
                    <li><h3>  <a href="{$BASE_URL}/adminContents"> Gestione contenuti </a></h3></li>
                    <li><h3>  <a href="{$BASE_URL}/adminUsers"> Gestione utenti </a></h3></li>
                    <li><h3>  <a href="{$BASE_URL}/adminMaterials"> Gestione materiali </a></h3></li>
                </ul>
            </section>
        {/if}


    </div>
</div>