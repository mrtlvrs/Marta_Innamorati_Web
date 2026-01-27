{extends file="layout.tpl"}

{block name="scripts"}
    <script src="{$BASE_PUBLIC}/js/admin.js"></script>
{/block}

{block name="title"}Gestione materiali | CrochetHub{/block}

{block name="content"}
<section class="admin">
    <h2>Gestione materiali</h2>

    {* -------- BOTTONI -------- *}
    <div class="material-tabs">
        <button type="button" onclick="showTab('categories')">Categorie</button>
        <button type="button" onclick="showTab('yarns')">Filati</button>
        <button type="button" onclick="showTab('weights')">Spessori</button>
        <button type="button" onclick="showTab('crochets')">Uncinetti</button>
    </div>

    <hr>

    {* CATEGORIE *}
    <section id="categories" class="material-section">
        <h3>Categorie</h3>

        <form method="post" action="{BASE_URL}/adminCategoryAdd">
            <input type="text" name="name" placeholder="Nuova categoria" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                {foreach $categories as $c}
                    <tr class="{if !$c.active}inactive{/if}">
                        <td>{$c.name|escape}</td>
                        <td>{if $c.active}Attiva{else}Disattiva{/if}</td>
                        <td>
                            <a href="{BASE_URL}/adminCategoryToggle/{$c.id}">
                                {if $c.active}Disattiva{else}Riattiva{/if}
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>

    {* FILATI *}
    <section id="yarns" class="material-section" style="display:none">
        <h3>Filati</h3>

        <form method="post" action="{BASE_URL}/adminYarnAdd">
            <input type="text" name="name" placeholder="Nuovo filato" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                {foreach $yarns as $y}
                    <tr class="{if !$y.active}inactive{/if}">
                        <td>{$y.name|escape}</td>
                        <td>{if $y.active}Attivo{else}Disattivo{/if}</td>
                        <td>
                            <a href="{BASE_URL}/adminYarnToggle/{$y.id}">
                                {if $y.active}Disattiva{else}Riattiva{/if}
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>

    {* SPESSORI *}
    <section id="weights" class="material-section" style="display:none">
        <h3>Spessori</h3>

        <form method="post" action="{BASE_URL}/adminWeightAdd">
            <input type="text" name="weight" placeholder="Nuovo spessore" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Spessore</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                {foreach $weights as $w}
                    <tr class="{if !$w.active}inactive{/if}">
                        <td>{$w.value|escape}</td>
                        <td>{if $w.active}Attivo{else}Disattivo{/if}</td>
                        <td>
                            <a href="{BASE_URL}/adminWeightToggle/{$w.id}">
                                {if $w.active}Disattiva{else}Riattiva{/if}
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>

    {* UNCINETTI *}
    <section id="crochets" class="material-section" style="display:none">
        <h3>Uncinetti</h3>

        <form method="post" action="{BASE_URL}/adminCrochetAdd">
            <input type="number" step="0.5" name="size" placeholder="Misura (mm)" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Misura (mm)</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                {foreach $crochets as $c}
                    <tr class="{if !$c.active}inactive{/if}">
                        <td>{$c.size}</td>
                        <td>{if $c.active}Attivo{else}Disattivo{/if}</td>
                        <td>
                            <a href="{BASE_URL}/adminCrochetToggle/{$c.id}">
                                {if $c.active}Disattiva{else}Riattiva{/if}
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
</section>

{/block}