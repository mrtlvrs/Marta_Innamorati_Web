<?php
/* Smarty version 4.5.6, created on 2026-01-26 11:49:19
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697746af79f490_41785891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25c8d658aad28828d4bbac49838a840989d7e932' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/profile.tpl',
      1 => 1769382610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697746af79f490_41785891 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1131402845697746af77fc61_31409917', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_1131402845697746af77fc61_31409917 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1131402845697746af77fc61_31409917',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<section>

<header class="major profile-header-top">
    <h2><span class="profile-username">@<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span></h2>
</header>

    <div class="profile-header">

        <div class="avatar">
            <?php if ($_smarty_tpl->tpl_vars['hasAvatar']->value) {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
">
            <?php } else { ?>
                <div class="avatar-placeholder"><?php echo $_smarty_tpl->tpl_vars['avatarInitial']->value;?>
</div>
            <?php }?>
        </div>

        <div class="profile-info">

            <div class="profile-row">
                <p>
                    <strong>Iscritto dal:</strong> <?php echo $_smarty_tpl->tpl_vars['createdAt']->value;?>

                </p>

                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/follow/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"
                   class="profile-stats-link">
                    <div class="profile-stats">
                        <div class="stat">
                            <div>
                                <?php echo $_smarty_tpl->tpl_vars['followerCount']->value;?>

                            </div>
                            <div>Follower</div>
                        </div>
                        <div class="stat">
                            <div>
                                <?php echo $_smarty_tpl->tpl_vars['followingCount']->value;?>

                            </div>
                            <div>Following</div>
                        </div>
                    </div>
                </a>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['bio']->value) {?>
                <p class="bio"><?php echo $_smarty_tpl->tpl_vars['bio']->value;?>
</p>
            <?php } else { ?>
                <p class="bio muted">Nessuna bio inserita</p>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['isOwner']->value) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profileEdit" class="button primary fit profile-follow-btn">
                    Modifica profilo
                </a>
            <?php } else { ?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/toggle/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" class="button primary fit profile-follow-btn">
                    <?php if ($_smarty_tpl->tpl_vars['isFollowing']->value) {?>
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
    <?php if ($_smarty_tpl->tpl_vars['isOwner']->value) {?>
        Le tue creazioni
    <?php } else { ?>
        Le creazioni di @<?php echo $_smarty_tpl->tpl_vars['username']->value;?>

    <?php }?>
    </h3>

    <div class="posts">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['creations']->value, 'creation');
$_smarty_tpl->tpl_vars['creation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['creation']->value) {
$_smarty_tpl->tpl_vars['creation']->do_else = false;
?>

    <article class="creation-card">

        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creation/<?php echo $_smarty_tpl->tpl_vars['creation']->value['id'];?>
" class="image-link">
            <?php if ($_smarty_tpl->tpl_vars['creation']->value['image']) {?>
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['creation']->value['image'];?>
"
                    alt="<?php echo $_smarty_tpl->tpl_vars['creation']->value['title'];?>
"
                    class="creation-thumb"
                >
            <?php }?>

            <ul class="stats">
            <li>❤️ <?php echo $_smarty_tpl->tpl_vars['creation']->value['likesCount'];?>
</li>
            <li>💬 <?php echo $_smarty_tpl->tpl_vars['creation']->value['commentsCount'];?>
</li>
            <li>📌 <?php echo $_smarty_tpl->tpl_vars['creation']->value['savedCount'];?>
</li>
            </ul>
        </a>

        <h3><?php echo $_smarty_tpl->tpl_vars['creation']->value['title'];?>
</h3>

        <?php if ($_smarty_tpl->tpl_vars['isOwner']->value) {?>
            <ul class="actions small">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creationEdit/<?php echo $_smarty_tpl->tpl_vars['creation']->value['id'];?>
"
                    class="button small">
                        Modifica
                    </a>
                </li>

                <li>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creationDelete/<?php echo $_smarty_tpl->tpl_vars['creation']->value['id'];?>
">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['creation']->value['id'];?>
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>

</section>

<?php if ($_smarty_tpl->tpl_vars['isLogged']->value) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
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
