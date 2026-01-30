{extends file="layout.tpl"}

{block name="content"}

<section>

<header class="major profile-header-top">
    <h2><span class="profile-username">@{$username}</span></h2>
</header>

    <div class="profile-header">

        <div class="avatar">
            {if $hasAvatar}
                <img src="{$BASE_PUBLIC}/{$avatar}">
            {else}
                <div class="avatar-placeholder">{$avatarInitial}</div>
            {/if}
        </div>

        <div class="profile-info">

            <div class="profile-row">
                <p>
                    <strong>Iscritto dal:</strong> {$createdAt}
                </p>

                <a href="{$BASE_URL}/follow/{$username}"
                   class="profile-stats-link">
                    <div class="profile-stats">
                        <div class="stat">
                            <div>
                                {$followerCount}
                            </div>
                            <div>Follower</div>
                        </div>
                        <div class="stat">
                            <div>
                                {$followingCount}
                            </div>
                            <div>Following</div>
                        </div>
                    </div>
                </a>
            </div>

            {if $bio}
                <p class="bio">{$bio}</p>
            {else}
                <p class="bio muted">Nessuna bio inserita</p>
            {/if}

            {if $isOwner}
                <a href="{$BASE_URL}/profileEdit" class="button primary fit profile-follow-btn">
                    Modifica profilo
                </a>
            {else}
                <a href="{$BASE_URL}/toggle/{$username}" class="button primary fit profile-follow-btn">
                    {if $isFollowing}
                        Non seguire
                    {else}
                        Segui
                    {/if}
                </a>
            {/if}
            
        </div>

    </div>

    <hr>

    <h3>
    {if $isOwner}
        Le tue creazioni
    {else}
        Le creazioni di @{$username}
    {/if}
    </h3>

    <div class="posts">

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

            <ul class="stats">
            <li>❤️ {$creation.likesCount}</li>
            <li>💬 {$creation.commentsCount}</li>
            <li>📌 {$creation.savedCount}</li>
            </ul>
        </a>

        <h3>{$creation.title}</h3>

        {if $isOwner}
            <ul class="actions small">
                <li>
                    <a href="{$BASE_URL}/creationEdit/{$creation.id}"
                    class="button small">
                        Modifica
                    </a>
                </li>

                <li>
                    <form method="post" action="{$BASE_URL}/creationDelete/{$creation.id}">
                        <input type="hidden" name="id" value="{$creation.id}">
                        <button type="submit" class="button small"
                        onclick="return confirm('Eliminare definitivamente questa creazione?');">
                            Elimina
                        </button>
                    </form>
                </li>
            </ul>
        {/if}

    </article>

    {/foreach}

    </div>

</section>

{if $isLogged}
    <a href="{$BASE_URL}/creationNew"
       class="button primary icon solid fa-plus floating-create">
        Pubblica
    </a>
{/if}

{/block}