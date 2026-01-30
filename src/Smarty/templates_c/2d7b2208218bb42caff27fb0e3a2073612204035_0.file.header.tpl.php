<?php
/* Smarty version 4.5.6, created on 2026-01-27 10:30:42
  from '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697885c2ce0d20_55696463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d7b2208218bb42caff27fb0e3a2073612204035' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/header.tpl',
      1 => 1769501905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697885c2ce0d20_55696463 (Smarty_Internal_Template $_smarty_tpl) {
?><header id="header">
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home?reset=1" class="logo">
        <strong>CrochetHub</strong>
    </a>

    <ul class="icons">
        <?php if ($_smarty_tpl->tpl_vars['isLogged']->value) {?>
            <li>Ciao @<?php echo $_smarty_tpl->tpl_vars['loggedUser']->value->getUsername();?>
</li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/logout" class="button">Esci</a></li>
        <?php } else { ?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/login" class="button">Accedi</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/register"class="button primary">Registrati</a></li>
        <?php }?>
    </ul>
</header><?php }
}
