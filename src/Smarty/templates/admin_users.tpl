{extends file="layout.tpl"}

{block name="title"}Gestione utenti | CrochetHub{/block}

{block name="content"}
<section class="admin">
    <h2>Gestione utenti</h2>

    {if $users|@count == 0}
        <p>Nessun utente registrato.</p>
    {else}
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Ruolo</th>
                    <th>Iscrizione</th>
                    <th>Creazioni</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                {foreach $users as $u}
                    <tr>
                        <td>{$u.username|escape}</td>
                        <td>{$u.email|escape}</td>
                        <td>{$u.role}</td>
                        <td>{$u.createdAt}</td>
                        <td>{$u.creationsCount}</td>
                        <td>
                            <a href="{BASE_URL}/adminUserView/{$u.id}">Visualizza</a> |
                            <a href="{BASE_URL}/adminUserDelete/{$u.id}"
                               onclick="return confirm('Eliminare definitivamente questo utente?');">
                                Elimina
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {/if}
</section>
{/block}