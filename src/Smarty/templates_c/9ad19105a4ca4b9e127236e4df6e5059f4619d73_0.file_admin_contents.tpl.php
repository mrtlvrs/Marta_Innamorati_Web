<?php
/* Smarty version 5.7.0, created on 2026-01-03 23:26:53
  from 'file:admin_contents.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_695997ad2fccb2_03351314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ad19105a4ca4b9e127236e4df6e5059f4619d73' => 
    array (
      0 => 'admin_contents.tpl',
      1 => 1767479208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695997ad2fccb2_03351314 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1704805937695997ad2edc24_48625685', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2042760754695997ad2efe13_91902537', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1704805937695997ad2edc24_48625685 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>
Gestione contenuti | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_2042760754695997ad2efe13_91902537 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

<section class="admin">
    <header class="major">
        <h2>Gestione contenuti</h2>
    </header>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('creations')) == 0) {?>
        <p>Nessuna creazione presente.</p>
    <?php } else { ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Data</th>
                    <th>Commenti</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('creations'), 'c');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('c')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('c')['title'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('c')['author'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('c')['date'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('c')['commentsCount'];?>
</td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminContentView/<?php echo $_smarty_tpl->getValue('c')['id'];?>
">Visualizza</a> |
                            <a href="<?php echo BASE_URL;?>
/adminContentDelete/<?php echo $_smarty_tpl->getValue('c')['id'];?>
"
                               onclick="return confirm('Eliminare definitivamente questa creazione?');">
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
