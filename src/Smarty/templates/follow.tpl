{extends file="layout.tpl"}

{block name="content"}

<div class="follow-container">


<h2>@{$username}</h2>

<header class="section-title" style="display:flex; gap:2rem; align-items:center;">
{if $mode == 'followers'}
    <a href="{$BASE_URL}/follow/{$username}" class="button primary fit">Follower</a>
    <a href="{$BASE_URL}/follow/{$username}/following" class="button fit">Following</a>
{else}
    <a href="{$BASE_URL}/follow/{$username}" class="button fit">Follower</a>
    <a href="{$BASE_URL}/follow/{$username}/following" class="button primary fit">Following</a>
{/if}
</header>


{if $users|@count == 0}
    <p class="muted">
        {if $mode == 'followers'}
            Nessun follower
        {else}
            Nessun utente seguito
        {/if}
    </p>
{else}
    <ul class="user-list">
    {foreach $users as $u}
        <li class="user-item" style="display:flex; align-items:center; gap:1rem; margin-bottom:1rem;">
            <a href="{$BASE_URL}/profile/{$u.username}" style="display:flex; align-items:center; gap:1rem;">
                {if $u.avatar}
                    <img src="{$BASE_PUBLIC}/{$u.avatar}" class="avatar-small">
                {else}
                    <span class="avatar-placeholder small">
                        {$u.username|substr:0:1}
                    </span>
                {/if}
                <span>@{$u.username}</span>
            </a>
        </li>
    {/foreach}
    </ul>
{/if}

</div>


{/block}