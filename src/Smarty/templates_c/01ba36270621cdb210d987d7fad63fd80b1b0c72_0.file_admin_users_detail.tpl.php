<?php
/* Smarty version 5.7.0, created on 2026-01-03 23:48:01
  from 'file:admin_users_detail.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69599ca1736040_56368873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01ba36270621cdb210d987d7fad63fd80b1b0c72' => 
    array (
      0 => 'admin_users_detail.tpl',
      1 => 1767480076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69599ca1736040_56368873 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_146326081769599ca172b8b4_79498729', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_177883700869599ca172df88_19352533', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_146326081769599ca172b8b4_79498729 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>
Profilo utente | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_177883700869599ca172df88_19352533 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

<section class="admin">
    <h2>Profilo utente</h2>

    <p><strong>Username:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')['username'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')['email'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <p><strong>Ruolo:</strong> <?php echo $_smarty_tpl->getValue('user')['role'];?>
</p>
    <p><strong>Iscritto il:</strong> <?php echo $_smarty_tpl->getValue('user')['createdAt'];?>
</p>

    <?php if ($_smarty_tpl->getValue('user')['bio']) {?>
        <p><strong>Bio:</strong><br><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('user')['bio'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <?php }?>

    <hr>

    <p>
        Creazioni: <?php echo $_smarty_tpl->getValue('user')['creationsCount'];?>
<br>
        Follower: <?php echo $_smarty_tpl->getValue('user')['followersCount'];?>
<br>
        Seguiti: <?php echo $_smarty_tpl->getValue('user')['followingCount'];?>

    </p>

    <p>
        <a href="<?php echo BASE_URL;?>
/adminUsers/delete/<?php echo $_smarty_tpl->getValue('user')['id'];?>
"
           onclick="return confirm('Eliminare definitivamente questo utente e tutti i suoi contenuti?');">
            Elimina utente
        </a>
    </p>

    <p>
        <a href="<?php echo BASE_URL;?>
/adminUsers">← Torna alla gestione utenti</a>
    </p>
</section>
<?php
}
}
/* {/block "content"} */
}
