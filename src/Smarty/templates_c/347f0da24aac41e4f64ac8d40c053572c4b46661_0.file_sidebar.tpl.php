<?php
/* Smarty version 5.7.0, created on 2026-01-25 23:09:43
  from 'file:sidebar.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697694a7d9e400_97101678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '347f0da24aac41e4f64ac8d40c053572c4b46661' => 
    array (
      0 => 'sidebar.tpl',
      1 => 1769377991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697694a7d9e400_97101678 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?><div id="sidebar" class="inactive">
    <div class="inner">

        <section>
            <header class="major">
                <h2>Menu</h2>
            </header>

            <ul>
                <li><h3>  <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
">Home </a></h3></li>
                <li><h3>  <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile">Profilo </a></h3></li>
                <li><h3>  <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/saved">Salvati </a></h3></li>
            </ul>
        </section>

        
        <?php if ($_smarty_tpl->getValue('lastCreation')) {?>
        <article class="creation-card">
            <section>
                <header class="major">
                    <h3>Ultima creazione</h3>
                </header>

                <div class="sidebar-item">
                    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creation/<?php echo $_smarty_tpl->getValue('lastCreation')['id'];?>
" class="image-link">
                        <img src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('lastCreation')['firstImage'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('lastCreation')['title'], ENT_QUOTES, 'UTF-8', true);?>
" class="creation-thumb">
                    </a>
                    <h3><?php echo $_smarty_tpl->getValue('lastCreation')['title'];?>
</h3>
                </div>
            </section>
        </article>
        <?php }?>

        <?php if ($_smarty_tpl->getValue('lastAuthor')) {?>
        <section>
            <header class="major">
                <h3>Ultimo autore</h3>
            </header>

            <div class="sidebar-author">
                <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('lastAuthor')['username'];?>
">
                    <?php if ($_smarty_tpl->getValue('lastAuthor')['hasAvatar']) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('lastAuthor')['avatar'];?>
" class="sidebar-avatar">
                    <?php } else { ?>
                        <div class="sidebar-avatar placeholder"><?php echo $_smarty_tpl->getValue('lastAuthor')['initial'];?>
</div>
                    <?php }?>
                    <h3>@<?php echo $_smarty_tpl->getValue('lastAuthor')['username'];?>
</h3>
                </a>
            </div>
        </section>
        <?php }?>

        <?php if ((true && ($_smarty_tpl->hasVariable('isAdmin') && null !== ($_smarty_tpl->getValue('isAdmin') ?? null))) && $_smarty_tpl->getValue('isAdmin')) {?>
            <section class="admin-menu">
                <header class="major">
                    <h3>Amministrazione</h3>
                </header>

                <ul>
                    <li><h3>  <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/adminContents"> Gestione contenuti </a></h3></li>
                    <li><h3>  <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/adminUsers"> Gestione utenti </a></h3></li>
                    <li><h3>  <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/adminMaterials"> Gestione materiali </a></h3></li>
                </ul>
            </section>
        <?php }?>


    </div>
</div><?php }
}
