<?php
/* Smarty version 4.5.6, created on 2026-01-26 17:01:00
  from '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69778fbc11c064_85946905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca18bc4b5731fbe562f9b3c5499a90d50d73bfe1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/crochethub/src/Smarty/templates/login.tpl',
      1 => 1768900064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69778fbc11c064_85946905 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104755369469778fbc10eda8_70780871', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_104755369469778fbc10eda8_70780871 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_104755369469778fbc10eda8_70780871',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<section class="login">

    <h2>Login</h2>

    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
        <p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
    <?php }?>

    <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/login">

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Accedi</button>
    </form>

    <p>
        Non hai un account?
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/register">Registrati</a>
    </p>

</section>

<?php
}
}
/* {/block "content"} */
}
