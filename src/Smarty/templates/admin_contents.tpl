{extends file="layout.tpl"}

{block name="title"}Gestione contenuti | CrochetHub{/block}

{block name="content"}
<section class="admin">
    <header class="major">
        <h2>Gestione contenuti</h2>
    </header>

    {if $creations|@count == 0}
        <p>Nessuna creazione presente.</p>
    {else}
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Data</th>
                    <th>Commenti</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                {foreach $creations as $c}
                    <tr>
                        <td>{$c.title|escape}</td>
                        <td>{$c.author|escape}</td>
                        <td>{$c.date}</td>
                        <td>{$c.commentsCount}</td>
                        <td>
                            <a href="{BASE_URL}/adminContentView/{$c.id}">Visualizza</a> |
                            <a href="{BASE_URL}/adminContentDelete/{$c.id}"
                               onclick="return confirm('Eliminare definitivamente questa creazione?');">
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