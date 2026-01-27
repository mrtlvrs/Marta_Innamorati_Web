<?php
/* Smarty version 5.7.0, created on 2026-01-20 11:09:19
  from 'file:header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696f544fbd5696_31321020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ceede10e3030a1152261efc4bad308a3ce97ad5c' => 
    array (
      0 => 'header.tpl',
      1 => 1768903757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696f544fbd5696_31321020 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?><header id="header">
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home" class="logo">
        <strong>CrochetHub</strong>
    </a>

    <ul class="icons">
        <?php if ($_smarty_tpl->getValue('isLogged')) {?>
            <li>Ciao @<?php echo $_smarty_tpl->getValue('loggedUser')->getUsername();?>
</li>
            <li><a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/logout" class="button">Esci</a></li>
        <?php } else { ?>
            <li><a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/login" class="button">Accedi</a></li>
            <li><a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/register"class="button primary">Registrati</a></li>
        <?php }?>
    </ul>
</header><?php }
}
