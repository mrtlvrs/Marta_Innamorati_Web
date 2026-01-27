<?php
/* Smarty version 4.5.6, created on 2026-01-25 22:52:25
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69769099913298_66764094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fce52ac9332df1cf97e74089229575529cb0198' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/login.tpl',
      1 => 1768900064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69769099913298_66764094 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207354540869769099903398_79134621', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_207354540869769099903398_79134621 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_207354540869769099903398_79134621',
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
