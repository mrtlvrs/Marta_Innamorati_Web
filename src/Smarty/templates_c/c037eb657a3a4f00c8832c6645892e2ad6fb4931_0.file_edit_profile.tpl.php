<?php
/* Smarty version 5.7.0, created on 2026-01-24 18:56:59
  from 'file:edit_profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697507eb5fefc2_24621680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c037eb657a3a4f00c8832c6645892e2ad6fb4931' => 
    array (
      0 => 'edit_profile.tpl',
      1 => 1769277402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697507eb5fefc2_24621680 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1021226557697507eb5f1cf3_63296235', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1021226557697507eb5f1cf3_63296235 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<h1>Modifica profilo</h1>

<form method="post"
      action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profileSave"
      enctype="multipart/form-data">

    <div class="field">
        <label>Username</label>
        <input type="text" value="<?php echo $_smarty_tpl->getValue('username');?>
" disabled>
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" value="<?php echo $_smarty_tpl->getValue('email');?>
" disabled>
    </div>

    <div class="field">
        <label>Bio</label>
        <textarea name="bio"><?php echo $_smarty_tpl->getValue('bio');?>
</textarea>
    </div>

    <div class="field">
        <label>Avatar</label>
        <input type="file" name="avatar" accept="image/*">
    </div>

    <?php if ($_smarty_tpl->getValue('hasAvatar')) {?>
        <div class="field">
            <button type="submit"
                    name="remove_avatar"
                    value="1"
                    class="button danger"
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
