<?php
/* Smarty version 5.7.0, created on 2026-01-03 23:46:38
  from 'file:admin_users.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69599c4ec6cf40_00950581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd33fc2322d5b86f30366dd1ee58809f592cb3e14' => 
    array (
      0 => 'admin_users.tpl',
      1 => 1767480396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69599c4ec6cf40_00950581 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_185072351969599c4ec4b922_98942913', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_87339344169599c4ec51fb7_89907469', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_185072351969599c4ec4b922_98942913 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>
Gestione utenti | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_87339344169599c4ec51fb7_89907469 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

<section class="admin">
    <h2>Gestione utenti</h2>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('users')) == 0) {?>
        <p>Nessun utente registrato.</p>
    <?php } else { ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Ruolo</th>
                    <th>Iscrizione</th>
                    <th>Creazioni</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'u');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('u')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('u')['username'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('u')['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('u')['role'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('u')['createdAt'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('u')['creationsCount'];?>
</td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminUserView/<?php echo $_smarty_tpl->getValue('u')['id'];?>
">Visualizza</a> |
                            <a href="<?php echo BASE_URL;?>
/adminUserDelete/<?php echo $_smarty_tpl->getValue('u')['id'];?>
"
                               onclick="return confirm('Eliminare definitivamente questo utente?');">
                                Elimina
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php }?>
</section>
<?php
}
}
/* {/block "content"} */
}
