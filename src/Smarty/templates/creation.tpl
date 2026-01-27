{extends file="layout.tpl"}

{block name="scripts"}
    <script> const BASE_URL = "{$BASE_URL}"; </script>
    <script src="{$BASE_PUBLIC}/js/like.js"></script>
    <script src="{$BASE_PUBLIC}/js/save.js"></script>
    <script src="{$BASE_PUBLIC}/js/comments.js"></script>
{/block}

{block name="content"}

<section class="creation-layout">

    {* COLONNA SINISTRA: IMMAGINI *}
    {if $hasImages}
    <div class="creation-media">

        <div class="image-slider">
            <button class="slider-btn prev">&#10094;</button>

            <div class="slides">
                {foreach $images as $image}
                    <img src="{$BASE_PUBLIC}/{$image.path}" alt="{$title|escape}" class="slide">
                {/foreach}
            </div>

            <button class="slider-btn next">&#10095;</button>
        </div>
    <ul class="actions small">
    <li>
        <button 
            type="button"
            class="button icon solid fa-heart like-btn {if $isLiked}primary{/if}"
            data-creation-id="{$creationId}"        {* aggiancio per il js *}
            aria-label="Metti like">
            <span class="like-count">{$likesCount}</span>
        </button>
    </li>
    <li>
        <button 
            type="button"       {* non fa nulla da solo *}
            class="button icon solid fa-bookmark save-btn {if $isSaved}primary{/if}"    {* sav-btn dice a JavaScript che quello è il bottone di like *}
            data-creation-id="{$creationId}"
            aria-label="Salva creazione">
            <span class="save-count">{$savedCount}</span>
        </button>
    </li>
    </ul>
    </div>
    {/if}

    {* COLONNA DESTRA: TESTO *}
    <div class="creation-info">

        <h1 class="creation-title">{$title}</h1>
        <h4> <p class="author">di @<a href="{$BASE_URL}/profile/{$author}">{$author}</a></p></h4>
        <p class="creation-date">
            Pubblicato il {$creationDate}
            {if $isUpdated}
                • aggiornato il {$updateDate}
            {/if}
        </p>

        <h3>Materiali utilizzati</h3>
        <ul class="materials-list">
            <li class="material-item">
                <strong>Filato:</strong> {$yarn.name}
            </li>
            <li class="material-item">
                <strong>Spessore filato:</strong> {$yarnWeight.weight}
            </li>
            <li class="material-item">
                <strong>Uncinetto:</strong> {$crochet.size} mm
            </li>
            <li class="material-item">
                <strong>Categoria:</strong> {$category.name}
            </li>
        </ul>

        <h3>Accessori:</h3>
        <p>{$accessories}</p>

    </div>

</section>

<h3>Descrizione</h3>
<p>{$description}</p>

{* COMMENTI *}
<section class="comments-section">

    <h3>Commenti ({$commentsCount})</h3>

    {* LISTA COMMENTI *}
    <ul class="comments-list" id="comments-list">   {* l'id la rende agganciabile da js *}
    {foreach $comments as $comment}
        <li class="comment">
            <div>
                <p>{$comment.text}</p>
                <h5> <p class="author">di @<a href="{$BASE_URL}/profile/{$comment.author}">{$comment.author}</a></p></h5>
            </div>

            {if $comment.canDelete}
                <form method="post"
                    action="{$BASE_URL}/commentDelete"
                    class="comment-delete-form">
                    <input type="hidden" name="comment_id" value="{$comment.id}">
                    <button type="submit"
                        class="button small danger icon solid fa-trash"
                        title="Elimina commento">
                    </button>
                </form>
            {/if}

        </li>
    {/foreach}
    </ul>

    {if $commentsCount > $comments|@count}  {* commentsCount = numero totale di commenti per la creazione, $comments|@count = numero di commenti attualmente mostrati nella pagina *}
        <div class="load-more-wrapper">
            <button
                type="button"
                id="load-more-comments"     {* aggancio per js *}
                class="button secondary"
                data-creation-id="{$creationId}"    {* valore che js deve passare al backend *}
                data-offset="{$comments|@count}"    {* permette la paginazione a offset *}
                data-total="{$commentsCount}">
                Carica altri
            </button>
        </div>
    {/if}


    {* FORM PER NUOVO COMMENTO *}
    {if $isLogged}
        <form method="post" action="{$BASE_URL}/comment" class="comment-form">
            <input type="hidden" name="creation_id" value="{$creationId}">

            <div class="field">
                <textarea name="text" rows="3" placeholder="Scrivi un commento..." required></textarea>
            </div>

            <ul class="actions">
                <li>
                    <button type="submit" class="button primary">Invia</button>
                </li>
            </ul>
        </form>
    {else}
        <p class="login-hint">
            <a href="{$BASE_URL}/login">Accedi</a> per scrivere un commento.
        </p>
    {/if}

</section>

{/block}