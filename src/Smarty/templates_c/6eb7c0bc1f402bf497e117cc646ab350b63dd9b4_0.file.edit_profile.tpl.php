<?php
/* Smarty version 4.5.6, created on 2026-01-26 11:49:23
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/edit_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697746b3ac2993_45131118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6eb7c0bc1f402bf497e117cc646ab350b63dd9b4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/edit_profile.tpl',
      1 => 1769277432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697746b3ac2993_45131118 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1502630121697746b3abeaf8_31815435', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_1502630121697746b3abeaf8_31815435 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1502630121697746b3abeaf8_31815435',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Modifica profilo</h1>

<form method="post"
      action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profileSave"
      enctype="multipart/form-data">

    <div class="field">
        <label>Username</label>
        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" disabled>
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" disabled>
    </div>

    <div class="field">
        <label>Bio</label>
        <textarea name="bio"><?php echo $_smarty_tpl->tpl_vars['bio']->value;?>
</textarea>
    </div>

    <div class="field">
        <label>Avatar</label>
        <input type="file" name="avatar" accept="image/*">
    </div>

    <?php if ($_smarty_tpl->tpl_vars['hasAvatar']->value) {?>
        <div class="field">
            <button type="submit"
                    name="remove_avatar"
                    value="1"
                    class="button danger"
                    onclick="return confirm('Vuoi rimuovere l\'avatar?');">
                Rimuovi avatar
            </button>
        </div>
    <?php }?>

    <ul class="actions">
        <li>
            <button type="submit" class="button primary">
                Salva modifiche
            </button>
        </li>
    </ul>

</form>

<?php
}
}
/* {/block "content"} */
}
