{extends file="layout.tpl"}

{block name="title"}Profilo utente | CrochetHub{/block}

{block name="content"}
<section class="admin">
    <h2>Profilo utente</h2>

    <p><strong>Username:</strong> {$user.username|escape}</p>
    <p><strong>Email:</strong> {$user.email|escape}</p>
    <p><strong>Ruolo:</strong> {$user.role}</p>
    <p><strong>Iscritto il:</strong> {$user.createdAt}</p>

    {if $user.bio}
        <p><strong>Bio:</strong><br>{$user.bio|escape}</p>
    {/if}

    <hr>

    <p>
        Creazioni: {$user.creationsCount}<br>
        Follower: {$user.followersCount}<br>
        Seguiti: {$user.followingCount}
    </p>

    <p>
        <a href="{BASE_URL}/adminUsers/delete/{$user.id}"
           onclick="return confirm('Eliminare definitivamente questo utente e tutti i suoi contenuti?');">
            Elimina utente
        </a>
    </p>

    <p>
        <a href="{BASE_URL}/adminUsers">← Torna alla gestione utenti</a>
    </p>
</section>
{/block}