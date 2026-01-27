<?php
/* Smarty version 5.7.0, created on 2026-01-20 00:10:23
  from 'file:comments.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696eb9df0faf86_34154114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd736380fb995dd2cdff2968f9b47074c257d3716' => 
    array (
      0 => 'comments.tpl',
      1 => 1768864218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696eb9df0faf86_34154114 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('comments'), 'comment');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach0DoElse = false;
?>
    <li class="comment" data-comment-id="<?php echo $_smarty_tpl->getValue('comment')['id'];?>
">
        <div>
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['text'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            <h5>
                <p class="author">
                    di @<a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('comment')['author']->getUsername();?>
">
                        <?php echo $_smarty_tpl->getValue('comment')['author']->getUsername();?>

                    </a>
                </p>
            </h5>
        </div>
        
        <?php if ($_smarty_tpl->getValue('comment')['canDelete']) {?>
            <form method="post"
                  action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/commentDelete"
                  class="comment-delete-form">
                <input type="hidden" name="comment_id" value="<?php echo $_smarty_tpl->getValue('comment')['id'];?>
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
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
