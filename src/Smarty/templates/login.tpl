{extends file="layout.tpl"}

{block name="content"}

<section class="login">

    <h2>Login</h2>

    {if isset($error)}
        <p class="error">{$error}</p>
    {/if}

    <form method="POST" action="{$BASE_URL}/login">

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Accedi</button>
    </form>

    <p>
        Non hai un account?
        <a href="{$BASE_URL}/register">Registrati</a>
    </p>

</section>

{/block}