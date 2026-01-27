{extends file="layout.tpl"}

{block name="content"}

<h2>Nuova creazione</h2>

{if isset($error)}
    <p class="error">{$error}</p>
{/if}

<form method="post"
      action="{$BASE_URL}/creationSave"
      enctype="multipart/form-data">

    <div class="field">
        <label>Titolo</label>
        <input type="text" name="title" required>
    </div>

    <div class="field">
        <label>Descrizione</label>
        <textarea name="description" required></textarea>
    </div>

    <div class="field">
        <label>Immagini</label>
        <input type="file" name="images[]" multiple accept="image/*">
    </div>

    <!-- MATERIALI -->
    <div class="field">
        <label for="yarn">Filato</label>
        <select id="yarn" name="yarn_id" required>          <!-- può selezionarne uno solo, il form invia solo l'ID -->
            <option value="">-- seleziona --</option>
            {foreach $yarns as $yarn}
                <option value="{$yarn.id}">
                    {$yarn.name}
                </option>
            {/foreach}
        </select>
    </div>

    <div class="field">
        <label for="yarn_weight">Spessore filato</label>
        <select id="yarn_weight" name="yarn_weight_id" required>
            <option value="">-- seleziona --</option>
            {foreach $yarnWeights as $weight}
                <option value="{$weight.id}">
                    {$weight.weight}
                </option>
            {/foreach}
        </select>
    </div>

    <div class="field">
        <label for="crochet">Uncinetto</label>
        <select id="crochet" name="crochet_id" required>
            <option value="">-- seleziona --</option>
            {foreach $crochets as $crochet}
                <option value="{$crochet.id}">
                    {$crochet.size} mm
                </option>
            {/foreach}
        </select>
    </div>

    <div class="field">
        <label for="category">Categoria</label>
        <select id="category" name="category_id" required>
            <option value="">-- seleziona --</option>
            {foreach $categories as $category}
                <option value="{$category.id}">
                    {$category.name}
                </option>
            {/foreach}
        </select>
    </div>

    <div class="field">
        <label for="accessories">Accessori (opzionale)</label>
        <textarea id="accessories" name="accessories"></textarea>
    </div>

    <ul class="actions">
        <li>
            <button type="submit" class="button primary">
                Pubblica
            </button>
        </li>
    </ul>

</form>

{/block}