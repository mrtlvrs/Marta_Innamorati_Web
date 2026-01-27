<?php
/* Smarty version 5.7.0, created on 2026-01-20 12:48:32
  from 'file:follow.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696f6b90487189_08819349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c76d21562ba58a6f23a379fa3b976519f1a3ed9' => 
    array (
      0 => 'follow.tpl',
      1 => 1768899883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696f6b90487189_08819349 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_179681988696f6b90469e28_44311577', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_179681988696f6b90469e28_44311577 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<div class="follow-container">


<h2>@<?php echo $_smarty_tpl->getValue('username');?>
</h2>

<header class="section-title" style="display:flex; gap:2rem; align-items:center;">
<?php if ($_smarty_tpl->getValue('mode') == 'followers') {?>
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/follow/<?php echo $_smarty_tpl->getValue('username');?>
" class="button primary fit">Follower</a>
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/follow/<?php echo $_smarty_tpl->getValue('username');?>
/following" class="button fit">Following</a>
<?php } else { ?>
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/follow/<?php echo $_smarty_tpl->getValue('username');?>
" class="button fit">Follower</a>
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/follow/<?php echo $_smarty_tpl->getValue('username');?>
/following" class="button primary fit">Following</a>
<?php }?>
</header>


<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('users')) == 0) {?>
    <p class="muted">
        <?php if ($_smarty_tpl->getValue('mode') == 'followers') {?>
            Nessun follower
        <?php } else { ?>
            Nessun utente seguito
        <?php }?>
    </p>
<?php } else { ?>
    <ul class="user-list">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'u');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('u')->value) {
$foreach0DoElse = false;
?>
        <li class="user-item" style="display:flex; align-items:center; gap:1rem; margin-bottom:1rem;">
            <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('u')['username'];?>
" style="display:flex; align-items:center; gap:1rem;">
                <?php if ($_smarty_tpl->getValue('u')['avatar']) {?>
                    <img src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('u')['avatar'];?>
" class="avatar-small">
                <?php } else { ?>
                    <span class="avatar-placeholder small">
                        <?php echo substr((string) $_smarty_tpl->getValue('u')['username'], (int) 0, (int) 1);?>

                    </span>
                <?php }?>
                <span>@<?php echo $_smarty_tpl->getValue('u')['username'];?>
</span>
            </a>
        </li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php }?>

</div>


<?php
}
}
/* {/block "content"} */
}
