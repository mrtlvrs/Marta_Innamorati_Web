<?php
/* Smarty version 4.5.6, created on 2026-01-26 10:10:39
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/comments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69772f8fbaf5f7_17838859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '613146a333cef881d537b287ed4a007201fb9b9b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/comments.tpl',
      1 => 1768864218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69772f8fbaf5f7_17838859 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>
    <li class="comment" data-comment-id="<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
">
        <div>
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['comment']->value['text'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            <h5>
                <p class="author">
                    di @<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['comment']->value['author']->getUsername();?>
">
                        <?php echo $_smarty_tpl->tpl_vars['comment']->value['author']->getUsername();?>

                    </a>
                </p>
            </h5>
        </div>
        
        <?php if ($_smarty_tpl->tpl_vars['comment']->value['canDelete']) {?>
            <form method="post"
                  action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/commentDelete"
                  class="comment-delete-form">
                <input type="hidden" name="comment_id" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
">
                <button type="submit"
                        class="button small danger icon solid fa-trash"
                        title="Elimina commento">
                </button>
            </form>
        <?php }?>
    </li>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
