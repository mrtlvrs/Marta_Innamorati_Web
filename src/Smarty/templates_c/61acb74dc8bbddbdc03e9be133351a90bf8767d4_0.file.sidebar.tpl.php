<?php
/* Smarty version 4.5.6, created on 2026-01-26 17:01:00
  from '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69778fbc142c57_29306798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61acb74dc8bbddbdc03e9be133351a90bf8767d4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/sidebar.tpl',
      1 => 1769425178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69778fbc142c57_29306798 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="sidebar" class="inactive">
    <div class="inner">

        <section>
            <header class="major">
                <h2>Menu</h2>
            </header>

            <ul>
                <li><h3>  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Home </a></h3></li>
                <li><h3>  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile">Profilo </a></h3></li>
                <li><h3>  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/saved">Salvati </a></h3></li>
            </ul>
        </section>

        
        <?php if ((isset($_smarty_tpl->tpl_vars['lastCreation']->value))) {?>
        <article class="creation-card">
            <section>
                <header class="major">
                    <h3>Ultima creazione</h3>
                </header>

                <div class="sidebar-item">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creation/<?php echo $_smarty_tpl->tpl_vars['lastCreation']->value['id'];?>
" class="image-link">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lastCreation']->value['firstImage'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['lastCreation']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" class="creation-thumb">
                    </a>
                    <h3><?php echo $_smarty_tpl->tpl_vars['lastCreation']->value['title'];?>
</h3>
                </div>
            </section>
        </article>
        <?php }?>

        <?php if ((isset($_smarty_tpl->tpl_vars['lastAuthor']->value))) {?>
        <section>
            <header class="major">
                <h3>Ultimo autore</h3>
            </header>

            <div class="sidebar-author">
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['lastAuthor']->value['username'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['lastAuthor']->value['hasAvatar']) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lastAuthor']->value['avatar'];?>
" class="sidebar-avatar">
                    <?php } else { ?>
                        <div class="sidebar-avatar placeholder"><?php echo $_smarty_tpl->tpl_vars['lastAuthor']->value['initial'];?>
</div>
                    <?php }?>
                    <h3>@<?php echo $_smarty_tpl->tpl_vars['lastAuthor']->value['username'];?>
</h3>
                </a>
            </div>
        </section>
        <?php }?>

        <?php if ((isset($_smarty_tpl->tpl_vars['isAdmin']->value)) && $_smarty_tpl->tpl_vars['isAdmin']->value) {?>
            <section class="admin-menu">
                <header class="major">
                    <h3>Amministrazione</h3>
                </header>

                <ul>
                    <li><h3>  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/adminContents"> Gestione contenuti </a></h3></li>
                    <li><h3>  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/adminUsers"> Gestione utenti </a></h3></li>
                    <li><h3>  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/adminMaterials"> Gestione materiali </a></h3></li>
                </ul>
            </section>
        <?php }?>


    </div>
</div><?php }
}
