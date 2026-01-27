<?php
/* Smarty version 5.7.0, created on 2026-01-26 00:10:13
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6976a2d5be1293_93325884',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '683c5cf5fab47c653dd767cabd6c64420d1db60d' => 
    array (
      0 => 'profile.tpl',
      1 => 1769382610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6976a2d5be1293_93325884 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12697284156976a2d5bc1ee7_40881507', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_12697284156976a2d5bc1ee7_40881507 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<section>

<header class="major profile-header-top">
    <h2><span class="profile-username">@<?php echo $_smarty_tpl->getValue('username');?>
</span></h2>
</header>

    <div class="profile-header">

        <div class="avatar">
            <?php if ($_smarty_tpl->getValue('hasAvatar')) {?>
                <img src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('avatar');?>
">
            <?php } else { ?>
                <div class="avatar-placeholder"><?php echo $_smarty_tpl->getValue('avatarInitial');?>
</div>
            <?php }?>
        </div>

        <div class="profile-info">

            <div class="profile-row">
                <p>
                    <strong>Iscritto dal:</strong> <?php echo $_smarty_tpl->getValue('createdAt');?>

                </p>

                <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/follow/<?php echo $_smarty_tpl->getValue('username');?>
"
                   class="profile-stats-link">
                    <div class="profile-stats">
                        <div class="stat">
                            <div>
                                <?php echo $_smarty_tpl->getValue('followerCount');?>

                            </div>
                            <div>Follower</div>
                        </div>
                        <div class="stat">
                            <div>
                                <?php echo $_smarty_tpl->getValue('followingCount');?>

                            </div>
                            <div>Following</div>
                        </div>
                    </div>
                </a>
            </div>

            <?php if ($_smarty_tpl->getValue('bio')) {?>
                <p class="bio"><?php echo $_smarty_tpl->getValue('bio');?>
</p>
            <?php } else { ?>
                <p class="bio muted">Nessuna bio inserita</p>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('isOwner')) {?>
                <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profileEdit" class="button primary fit profile-follow-btn">
                    Modifica profilo
                </a>
            <?php } else { ?>
                <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/toggle/<?php echo $_smarty_tpl->getValue('username');?>
" class="button primary fit profile-follow-btn">
                    <?php if ($_smarty_tpl->getValue('isFollowing')) {?>
                        Non seguire
                    <?php } else { ?>
                        Segui
                    <?php }?>
                </a>
            <?php }?>
            
        </div>

    </div>

    <hr>

    <h3>
    <?php if ($_smarty_tpl->getValue('isOwner')) {?>
        Le tue creazioni
    <?php } else { ?>
        Le creazioni di @<?php echo $_smarty_tpl->getValue('username');?>

    <?php }?>
    </h3>

    <div class="posts">

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('creations'), 'creation');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('creation')->value) {
$foreach0DoElse = false;
?>

    <article class="creation-card">

        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creation/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
" class="image-link">
            <?php if ($_smarty_tpl->getValue('creation')['image']) {?>
                <img
                    src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('creation')['image'];?>
"
                    alt="<?php echo $_smarty_tpl->getValue('creation')['title'];?>
"
                    class="creation-thumb"
                >
            <?php }?>

            <ul class="stats">
            <li>❤️ <?php echo $_smarty_tpl->getValue('creation')['likesCount'];?>
</li>
            <li>💬 <?php echo $_smarty_tpl->getValue('creation')['commentsCount'];?>
</li>
            <li>📌 <?php echo $_smarty_tpl->getValue('creation')['savedCount'];?>
</li>
            </ul>
        </a>

        <h3><?php echo $_smarty_tpl->getValue('creation')['title'];?>
</h3>

        <?php if ($_smarty_tpl->getValue('isOwner')) {?>
            <ul class="actions small">
                <li>
                    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creationEdit/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
"
                    class="button small">
                        Modifica
                    </a>
                </li>

                <li>
                    <form method="post" action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creationDelete/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('creation')['id'];?>
">
                        <button type="submit" class="button small danger"
                        onclick="return confirm('Eliminare definitivamente questa creazione?');">
                            Elimina
                        </button>
                    </form>
                </li>
            </ul>
        <?php }?>

    </article>

    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    </div>

</section>

<?php if ($_smarty_tpl->getValue('isLogged')) {?>
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creationNew"
       class="button primary icon solid fa-plus floating-create">
        Pubblica
    </a>
<?php }?>

<?php
}
}
/* {/block "content"} */
}
