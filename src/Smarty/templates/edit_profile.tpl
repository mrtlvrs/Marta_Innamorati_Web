{extends file="layout.tpl"}

{block name="content"}

<h1>Modifica profilo</h1>

<form method="post"
      action="{$BASE_URL}/profileSave"
      enctype="multipart/form-data">

    <div class="field">
        <label>Username</label>
        <input type="text" value="{$username}" disabled>
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" value="{$email}" disabled>
    </div>

    <div class="field">
        <label>Bio</label>
        <textarea name="bio">{$bio}</textarea>
    </div>

    <div class="field">
        <label>Avatar</label>
        <input type="file" name="avatar" accept="image/*">
    </div>

    {if $hasAvatar}
        <div class="field">
            <button type="submit"
                    name="remove_avatar"
                    value="1"
                    class="button danger"
                    onclick="return confirm('Vuoi rimuovere l\'avatar?');">
                Rimuovi avatar
            </button>
        </div>
    {/if}

    <ul class="actions">
        <li>
            <button type="submit" class="button primary">
                Salva modifiche
            </button>
        </li>
    </ul>

</form>

{/block}