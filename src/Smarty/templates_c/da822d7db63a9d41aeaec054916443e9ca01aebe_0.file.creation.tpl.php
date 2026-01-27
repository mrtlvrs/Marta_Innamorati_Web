<?php
/* Smarty version 4.5.6, created on 2026-01-25 22:53:38
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/creation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697690e28d74f3_17257208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da822d7db63a9d41aeaec054916443e9ca01aebe' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/creation.tpl',
      1 => 1769277041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697690e28d74f3_17257208 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1118362671697690e28c0344_16954133', "scripts");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_274404296697690e28c2798_66778288', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "scripts"} */
class Block_1118362671697690e28c0344_16954133 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_1118362671697690e28c0344_16954133',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
> const BASE_URL = "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
"; <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/like.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/save.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/comments.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "content"} */
class Block_274404296697690e28c2798_66778288 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_274404296697690e28c2798_66778288',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>


<section class="creation-layout">

        <?php if ($_smarty_tpl->tpl_vars['hasImages']->value) {?>
    <div class="creation-media">

        <div class="image-slider">
            <button class="slider-btn prev">&#10094;</button>

            <div class="slides">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="slide">
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>

            <button class="slider-btn next">&#10095;</button>
        </div>
    <ul class="actions small">
    <li>
        <button 
            type="button"
            class="button icon solid fa-heart like-btn <?php if ($_smarty_tpl->tpl_vars['isLiked']->value) {?>primary<?php }?>"
            data-creation-id="<?php echo $_smarty_tpl->tpl_vars['creationId']->value;?>
"                    aria-label="Metti like">
            <span class="like-count"><?php echo $_smarty_tpl->tpl_vars['likesCount']->value;?>
</span>
        </button>
    </li>
    <li>
        <button 
            type="button"                   class="button icon solid fa-bookmark save-btn <?php if ($_smarty_tpl->tpl_vars['isSaved']->value) {?>primary<?php }?>"                data-creation-id="<?php echo $_smarty_tpl->tpl_vars['creationId']->value;?>
"
            aria-label="Salva creazione">
            <span class="save-count"><?php echo $_smarty_tpl->tpl_vars['savedCount']->value;?>
</span>
        </button>
    </li>
    </ul>
    </div>
    <?php }?>

        <div class="creation-info">

        <h1 class="creation-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        <h4> <p class="author">di @<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['author']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['author']->value;?>
</a></p></h4>
        <p class="creation-date">
            Pubblicato il <?php echo $_smarty_tpl->tpl_vars['creationDate']->value;?>

            <?php if ($_smarty_tpl->tpl_vars['isUpdated']->value) {?>
                • aggiornato il <?php echo $_smarty_tpl->tpl_vars['updateDate']->value;?>

            <?php }?>
        </p>

        <h3>Materiali utilizzati</h3>
        <ul class="materials-list">
            <li class="material-item">
                <strong>Filato:</strong> <?php echo $_smarty_tpl->tpl_vars['yarn']->value['name'];?>

            </li>
            <li class="material-item">
                <strong>Spessore filato:</strong> <?php echo $_smarty_tpl->tpl_vars['yarnWeight']->value['weight'];?>

            </li>
            <li class="material-item">
                <strong>Uncinetto:</strong> <?php echo $_smarty_tpl->tpl_vars['crochet']->value['size'];?>
 mm
            </li>
            <li class="material-item">
                <strong>Categoria:</strong> <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

            </li>
        </ul>

        <h3>Accessori:</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['accessories']->value;?>
</p>

    </div>

</section>

<h3>Descrizione</h3>
<p><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p>

<section class="comments-section">

    <h3>Commenti (<?php echo $_smarty_tpl->tpl_vars['commentsCount']->value;?>
)</h3>

        <ul class="comments-list" id="comments-list">       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>
        <li class="comment">
            <div>
                <p><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
</p>
                <h5> <p class="author">di @<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>
</a></p></h5>
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

    <?php if ($_smarty_tpl->tpl_vars['commentsCount']->value > smarty_modifier_count($_smarty_tpl->tpl_vars['comments']->value)) {?>          <div class="load-more-wrapper">
            <button
                type="button"
                id="load-more-comments"                     class="button secondary"
                data-creation-id="<?php echo $_smarty_tpl->tpl_vars['creationId']->value;?>
"                    data-offset="<?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['comments']->value);?>
"                    data-total="<?php echo $_smarty_tpl->tpl_vars['commentsCount']->value;?>
">
                Carica altri
            </button>
        </div>
    <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['isLogged']->value) {?>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/comment" class="comment-form">
            <input type="hidden" name="creation_id" value="<?php echo $_smarty_tpl->tpl_vars['creationId']->value;?>
">

            <div class="field">
                <textarea name="text" rows="3" placeholder="Scrivi un commento..." required></textarea>
            </div>

            <ul class="actions">
                <li>
                    <button type="submit" class="button primary">Invia</button>
                </li>
            </ul>
        </form>
    <?php } else { ?>
        <p class="login-hint">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/login">Accedi</a> per scrivere un commento.
        </p>
    <?php }?>

</section>

<?php
}
}
/* {/block "content"} */
}
