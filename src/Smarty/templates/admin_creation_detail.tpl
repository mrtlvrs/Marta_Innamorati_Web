{extends file="layout.tpl"}

{block name="title"}Dettaglio creazione | CrochetHub{/block}

{block name="content"}
<section class="admin">
    <h2>Dettaglio creazione</h2>

    <article>
        <h3>{$creation.title|escape}</h3>
        <p><strong>Autore:</strong> {$creation.author|escape}</p>
        <p><strong>Data:</strong> {$creation.date}</p>

        <div class="creation-description">
            {$creation.description|escape|nl2br}
        </div>

        <p>
            <a href="{BASE_URL}/adminContentDelete/{$creation.id}"
               onclick="return confirm('Eliminare definitivamente questa creazione?');">
                Elimina creazione
            </a>
        </p>
    </article>

    <hr>

    <section>
        <h3>Commenti</h3>

        {if $creation.comments|@count == 0}
            <p>Nessun commento.</p>
        {else}
            <ul>
                {foreach $creation.comments as $comment}
                    <li>
                        <strong>{$comment.author|escape}</strong>
                        ({$comment.date})<br>
                        {$comment.text|escape}
                        <br>
                        <a href="{BASE_URL}/adminCommentDelete/{$comment.id}/{$creation.id}"
                           onclick="return confirm('Eliminare questo commento?');">
                            Elimina commento
                        </a>
                    </li>
                {/foreach}
            </ul>
        {/if}
    </section>

    <p>
        <a href="{BASE_URL}/adminContents">← Torna alla gestione contenuti</a>
    </p>
</section>
{/block}