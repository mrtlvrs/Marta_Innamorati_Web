<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <title>{$title|default:"CrochetHub"}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSS -->
    <link rel="stylesheet" href="{$BASE_PUBLIC}/css/main.css">  
</head>

<body class="is-preload">

<div id="wrapper">

    <!-- MAIN -->
    <div id="main">
        <div class="inner">

            {include file="header.tpl"}

            {block name="content"}{/block}

        </div>
    </div>

    <!-- SIDEBAR -->
    {include file="sidebar.tpl"}

</div>

{* crea una variabile visibile a tutti i JS *}
<script>
    window.BASE_URL = "{$BASE_URL}";
</script>


<!-- JS -->
<script src="{$BASE_PUBLIC}/js/jquery.min.js"></script>
<script src="{$BASE_PUBLIC}/js/browser.min.js"></script>
<script src="{$BASE_PUBLIC}/js/breakpoints.min.js"></script>
<script src="{$BASE_PUBLIC}/js/util.js"></script>
<script src="{$BASE_PUBLIC}/js/main.js"></script>

<!-- JS specifici della pagina -->
{block name="scripts"}{/block}

</body>
</html>