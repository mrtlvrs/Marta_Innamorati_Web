{extends file="layout.tpl"}

{block name="content"}

<section class="register">

    <h2>Registrazione</h2>

    {if isset($error)}
        <p class="error">{$error}</p>
    {/if}

    <form method="POST" action="{BASE_URL}/register">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Registrati</button>
    </form>

    <p>
        Hai già un account?
        <a href="{$BASE_URL}/login">Accedi</a>
    </p>

</section>

{/block}