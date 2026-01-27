{extends file="layout.tpl"}

{block name="scripts"}
    <script src="{$BASE_PUBLIC}/js/saved.js"></script>
{/block}

{block name="content"}

<header class="section-title">
    <h2>{$title}</h2>
</header>

{if $creations|@count === 0}
    <p>Non hai ancora salvato nessuna creazione.</p>
{else}
    <div id="saved-posts" class="posts">

    {foreach $creations as $creation}

    <article class="creation-card">

        <a href="{$BASE_URL}/creation/{$creation.id}" class="image-link">

            {if $creation.image}
                <img
                    src="{$BASE_PUBLIC}/{$creation.image}"
                    alt="{$creation.title}"
                    class="creation-thumb"
                >
            {/if}

        </a>

        <h3>{$creation.title}</h3>
        <h5> <p class="author">di @<a href="{$BASE_URL}/profile/{$creation.author}">{$creation.author}</a></p></h5>
        

        <ul class="stats">
            <li>❤️ {$creation.likes}</li>
            <li>💬 {$creation.comments}</li>
            <li>📌 {$creation.saves}</li>
        </ul>


    </article>

{/foreach}

    </div>
    {if $totalPages > 1}
        <div class="pagination-wrapper">
            <ul class="pagination">

                {if $page > 1}
                    <li>
                        <a href="{$BASE_URL}/saved?page={$page-1}" class="button small">
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
                            <a href="{$BASE_URL}/saved?page={$smarty.section.p.index+1}" class="page">
                                {$smarty.section.p.index+1}
                            </a>
                        </li>
                    {/if}
                {/section}

                {if $page < $totalPages}
                    <li>
                        <a href="{$BASE_URL}/saved?page={$page+1}" class="button small">
                            Next
                        </a>
                    </li>
                {else}
                    <li><span class="button small disabled">Next</span></li>
                {/if}

            </ul>
        </div>
    {/if}
{/if}

{/block}