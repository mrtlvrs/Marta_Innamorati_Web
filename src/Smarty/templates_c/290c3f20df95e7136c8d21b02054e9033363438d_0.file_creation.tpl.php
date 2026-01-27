<?php
/* Smarty version 5.7.0, created on 2026-01-25 16:11:16
  from 'file:creation.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6976329459bc67_60948934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '290c3f20df95e7136c8d21b02054e9033363438d' => 
    array (
      0 => 'creation.tpl',
      1 => 1769277041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6976329459bc67_60948934 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_74810363769763294583ce4_55151747', "scripts");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_132634548697632945866f8_08477436', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "scripts"} */
class Block_74810363769763294583ce4_55151747 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

    <?php echo '<script'; ?>
> const BASE_URL = "<?php echo $_smarty_tpl->getValue('BASE_URL');?>
"; <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/like.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/save.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/comments.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "content"} */
class Block_132634548697632945866f8_08477436 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<section class="creation-layout">

        <?php if ($_smarty_tpl->getValue('hasImages')) {?>
    <div class="creation-media">

        <div class="image-slider">
            <button class="slider-btn prev">&#10094;</button>

            <div class="slides">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('images'), 'image');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach0DoElse = false;
?>
                    <img src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('image')['path'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('title'), ENT_QUOTES, 'UTF-8', true);?>
" class="slide">
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>

            <button class="slider-btn next">&#10095;</button>
        </div>
    <ul class="actions small">
    <li>
        <button 
            type="button"
            class="button icon solid fa-heart like-btn <?php if ($_smarty_tpl->getValue('isLiked')) {?>primary<?php }?>"
            data-creation-id="<?php echo $_smarty_tpl->getValue('creationId');?>
"                    aria-label="Metti like">
            <span class="like-count"><?php echo $_smarty_tpl->getValue('likesCount');?>
</span>
        </button>
    </li>
    <li>
        <button 
            type="button"                   class="button icon solid fa-bookmark save-btn <?php if ($_smarty_tpl->getValue('isSaved')) {?>primary<?php }?>"                data-creation-id="<?php echo $_smarty_tpl->getValue('creationId');?>
"
            aria-label="Salva creazione">
            <span class="save-count"><?php echo $_smarty_tpl->getValue('savedCount');?>
</span>
        </button>
    </li>
    </ul>
    </div>
    <?php }?>

        <div class="creation-info">

        <h1 class="creation-title"><?php echo $_smarty_tpl->getValue('title');?>
</h1>
        <h4> <p class="author">di @<a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('author');?>
"><?php echo $_smarty_tpl->getValue('author');?>
</a></p></h4>
        <p class="creation-date">
            Pubblicato il <?php echo $_smarty_tpl->getValue('creationDate');?>

            <?php if ($_smarty_tpl->getValue('isUpdated')) {?>
                • aggiornato il <?php echo $_smarty_tpl->getValue('updateDate');?>

            <?php }?>
        </p>

        <h3>Materiali utilizzati</h3>
        <ul class="materials-list">
            <li class="material-item">
                <strong>Filato:</strong> <?php echo $_smarty_tpl->getValue('yarn')['name'];?>

            </li>
            <li class="material-item">
                <strong>Spessore filato:</strong> <?php echo $_smarty_tpl->getValue('yarnWeight')['weight'];?>

            </li>
            <li class="material-item">
                <strong>Uncinetto:</strong> <?php echo $_smarty_tpl->getValue('crochet')['size'];?>
 mm
            </li>
            <li class="material-item">
                <strong>Categoria:</strong> <?php echo $_smarty_tpl->getValue('category')['name'];?>

            </li>
        </ul>

        <h3>Accessori:</h3>
        <p><?php echo $_smarty_tpl->getValue('accessories');?>
</p>

    </div>

</section>

<h3>Descrizione</h3>
<p><?php echo $_smarty_tpl->getValue('description');?>
</p>

<section class="comments-section">

    <h3>Commenti (<?php echo $_smarty_tpl->getValue('commentsCount');?>
)</h3>

        <ul class="comments-list" id="comments-list">       <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('comments'), 'comment');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach1DoElse = false;
?>
        <li class="comment">
            <div>
                <p><?php echo $_smarty_tpl->getValue('comment')['text'];?>
</p>
                <h5> <p class="author">di @<a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('comment')['author'];?>
"><?php echo $_smarty_tpl->getValue('comment')['author'];?>
</a></p></h5>
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
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>

    <?php if ($_smarty_tpl->getValue('commentsCount') > $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('comments'))) {?>          <div class="load-more-wrapper">
            <button
                type="button"
                id="load-more-comments"                     class="button secondary"
                data-creation-id="<?php echo $_smarty_tpl->getValue('creationId');?>
"                    data-offset="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('comments'));?>
"                    data-total="<?php echo $_smarty_tpl->getValue('commentsCount');?>
">
                Carica altri
            </button>
        </div>
    <?php }?>


        <?php if ($_smarty_tpl->getValue('isLogged')) {?>
        <form method="post" action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/comment" class="comment-form">
            <input type="hidden" name="creation_id" value="<?php echo $_smarty_tpl->getValue('creationId');?>
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
            <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/login">Accedi</a> per scrivere un commento.
        </p>
    <?php }?>

</section>

<?php
}
}
/* {/block "content"} */
}
