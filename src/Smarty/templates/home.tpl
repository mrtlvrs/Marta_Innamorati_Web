{extends file="layout.tpl"}

{block name="scripts"}
    <script src="{$BASE_PUBLIC}/js/home.js"></script>
{/block}

{block name="content"}

{if $isLogged}
    <header class="section-title2">
    {if $mode == 'latest'}
        <a href="{$BASE_URL}/home?reset=1" class="button primary fit">Ultime creazioni</a>
        <a href="{$BASE_URL}/home/following?reset=1" class="button fit">Per te</a>
    {else}
        <a href="{$BASE_URL}/home?reset=1" class="button fit">Ultime creazioni</a>
        <a href="{$BASE_URL}/home/following?reset=1" class="button primary fit">Per te</a>
    {/if}

    </header>
{else}
    <header class="section-title">
    <h2>Ultime creazioni</h2>
    </header>
{/if}

<form method="get" action="{$BASE_URL}/home{if $mode == 'following'}/following{/if}" class="filters">
    <div>

        <div class="field">
            <label for="category">Categoria</label>
            <select name="category" id="category">
                <option value="">Tutte</option>
                {foreach $categories as $cat}
                    <option value="{$cat->getId()}" {if isset($filters.category) && $filters.category == $cat->getId()}selected{/if}>
                        {$cat->getName()}
                    </option>
                {/foreach}
            </select>
        </div>

        <div class="field">
            <label for="yarn">Filato</label>
            <select name="yarn" id="yarn">
                <option value="">Tutti</option>
                {foreach $yarns as $y}
                    <option value="{$y->getId()}" {if isset($filters.yarn) && $filters.yarn == $y->getId()}selected{/if}>
                        {$y->getName()}
                    </option>
                {/foreach}
            </select>
        </div>

        <div class="field">
            <label for="yarnWeight">Spessore</label>
            <select name="yarnWeight" id="yarnWeight">
                <option value="">Tutti</option>
                {foreach $yarnWeights as $yw}
                    <option value="{$yw->getId()}" {if isset($filters.yarnWeight) && $filters.yarnWeight == $yw->getId()}selected{/if}>
                        {$yw->getWeight()}
                    </option>
                {/foreach}
            </select>
        </div>

        <div class="field">
            <label for="crochet">Uncinetto</label>
            <select name="crochet" id="crochet">
                <option value="">Tutti</option>
                {foreach $crochets as $c}
                    <option value="{$c->getId()}" {if isset($filters.crochet) && $filters.crochet == $c->getId()}selected{/if}>
                        {$c->getSize()}
                    </option>
                {/foreach}
            </select>
        </div>

        <div class="field">
            <button type="submit" class="button">Filtra</button>
            <a href="{$BASE_URL}/home{if $mode == 'following'}/following{/if}?reset=1" class="button secondary js-reset-filters">
                Reset
            </a>
        </div>

    </div>
</form>

{* Mostra l'hint solo se ci sono filtri salvati (con valore non vuoto) e non ci sono parametri GET *}
{assign var=hasSavedFilters value=false}
{foreach $filters as $k => $v}
    {if $v !== null && $v !== ''}
        {assign var=hasSavedFilters value=true}
        {break}
    {/if}
{/foreach}

{if $hasSavedFilters && ($smarty.get|@count == 0)}
    <p class="filters-hint">
        Filtri salvati dalla navigazione precedente.
        Premi <strong>“Filtra”</strong> per usarli.
    </p>
{/if}


{if $creations|@count == 0}
    <p class="muted">
        {if $mode == 'following'}
            Nessun post pubblicato dai tuoi amici.
        {else}
            Nessuna creazione disponibile al momento.
        {/if}
    </p>
{/if}

<div class="posts">

{foreach $creations as $creation}

<article class="creation-card">

    <a href="{$BASE_URL}/creation/{$creation.id}" class="image-link">

        {if $creation.firstImage}
            <img src="{$BASE_PUBLIC}/{$creation.firstImage}" alt="{$creation.title|escape}" class="creation-thumb">
        {/if}

        <ul class="stats">
            <li>❤️ {$creation.likesCount}</li>
            <li>💬 {$creation.commentsCount}</li>
            <li>📌 {$creation.savedCount}</li>

            {if $creation.isSaved}
                <li class="saved-flag">Salvato</li>
            {/if}
        </ul>

    </a>

    <h3>{$creation.title}</h3>
    <h5> <p class="author">di @<a href="{$BASE_URL}/profile/{$creation.author}">{$creation.author}</a></p></h5>

</article>

{/foreach}

</div>

{* salvo i filtri in una variabile da concatenare agli URL per cambiare pagina in modo che vengano mantenuti i filtri *}
{assign var=filterQuery value=""}
{foreach $filters as $k => $v}      {* filters è l'array di filtri passato dalla view *}
    {if $k != 'page' && $v !== null && $v !== ''}
        {assign var=filterQuery value=$filterQuery|cat:"&"|cat:$k|cat:"="|cat:$v}
    {/if}
{/foreach}

{if $totalPages > 1}
    <div class="pagination-wrapper">
        <ul class="pagination">
            
            {if $page > 1}
                <li>
                    <a href="{$BASE_URL}/home{if $mode == 'following'}/following{/if}?page={$page-1}{$filterQuery}"
                       class="button small">
                        Prev
                    </a>
                </li>
            {else}
                <li><span class="button small disabled">Prev</span></li>
            {/if}

            {section name=p loop=$totalPages}
                {if $smarty.section.p.index+1 == $page}
                    <li><span class="page active">{$smarty.section.p.index+1}</span></li>
                {else}
                    <li>
                        <a href="{$BASE_URL}/home{if $mode == 'following'}/following{/if}?page={$smarty.section.p.index+1}{$filterQuery}"
                           class="page">
                            {$smarty.section.p.index+1}
                        </a>
                    </li>
                {/if}
            {/section}

            {if $page < $totalPages}
                <li>
                    <a href="{$BASE_URL}/home{if $mode == 'following'}/following{/if}?page={$page+1}{$filterQuery}"
                       class="button small">
                        Next
                    </a>
                </li>
            {else}
                <li><span class="button small disabled">Next</span></li>
            {/if}

        </ul>
    </div>
{/if}

{if $isLogged}
    <a href="{$BASE_URL}/creationNew"
       class="button primary icon solid fa-plus floating-create">
        Pubblica
    </a>
{/if}

{/block}
