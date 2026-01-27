{extends file="layout.tpl"}

{block name="content"}

<h2>Modifica creazione</h2>

{if isset($error)}
    <div class="error-message">
        {$error}
    </div>
{/if}

<form method="post" action="{$BASE_URL}/creationUpdate/{$creationId}">

    <!-- TITOLO -->
    <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text"
               id="title"
               name="title"
               value="{$title|escape}"
               required>
    </div>

    <!-- DESCRIZIONE -->
    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea id="description"
                  name="description"
                  rows="6"
                  required>{$description|escape}</textarea>
    </div>

    <!-- FILO -->
    <div class="form-group">
        <label for="yarn_id">Filato</label>
        <select name="yarn_id" id="yarn_id" required>
            <option value="">Seleziona un filo</option>
            {foreach $yarns as $yarn}
                <option value="{$yarn.id}"
                    {if $yarn.id == $selectedYarn}selected{/if}>
                    {$yarn.name}
                </option>
            {/foreach}
        </select>
    </div>

    <!-- SPESSORE -->
    <div class="form-group">
        <label for="yarn_weight_id">Spessore</label>
        <select name="yarn_weight_id" id="yarn_weight_id" required>
            <option value="">Seleziona uno spessore</option>
            {foreach $yarnWeights as $weight}
                <option value="{$weight.id}"
                    {if $weight.id == $selectedYarnWeight}selected{/if}>
                    {$weight.weight}
                </option>
            {/foreach}
        </select>
    </div>

    <!-- UNCINETTO -->
    <div class="form-group">
        <label for="crochet_id">Uncinetto</label>
        <select name="crochet_id" id="crochet_id" required>
            <option value="">Seleziona uncinetto</option>
            {foreach $crochets as $crochet}
                <option value="{$crochet.id}"
                    {if $crochet.id == $selectedCrochet}selected{/if}>
                    {$crochet.size}
                </option>
            {/foreach}
        </select>
    </div>

    <!-- CATEGORIA -->
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" id="category_id" required>
            <option value="">Seleziona categoria</option>
            {foreach $categories as $category}
                <option value="{$category.id}"
                    {if $category.id == $selectedCategory}selected{/if}>
                    {$category.name}
                </option>
            {/foreach}
        </select>
    </div>

    <!-- INFO IMMAGINI -->
    <div class="info-box">
        <p>
            ⚠️ Le immagini non sono modificabili dopo la pubblicazione.
        </p>
    </div>

    <!-- AZIONI -->
    <div class="form-actions">
        <button type="submit" class="btn-primary">
            Salva modifiche
        </button>

        <a href="{$BASE_URL}/profile" class="btn-secondary">
            Annulla
        </a>
    </div>

</form>

{/block}