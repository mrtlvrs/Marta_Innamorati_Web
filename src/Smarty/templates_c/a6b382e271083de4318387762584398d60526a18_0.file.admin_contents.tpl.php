<?php
/* Smarty version 4.5.6, created on 2026-01-26 11:57:19
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/admin_contents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6977488f74f5f3_30516774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6b382e271083de4318387762584398d60526a18' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/admin_contents.tpl',
      1 => 1767479208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6977488f74f5f3_30516774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2312066806977488f737257_26889248', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5526934986977488f73bfd8_80883288', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_2312066806977488f737257_26889248 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2312066806977488f737257_26889248',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Gestione contenuti | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_5526934986977488f73bfd8_80883288 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5526934986977488f73bfd8_80883288',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="admin">
    <header class="major">
        <h2>Gestione contenuti</h2>
    </header>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['creations']->value) == 0) {?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['creations']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                    <tr>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['c']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['c']->value['author'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value['date'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value['commentsCount'];?>
</td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminContentView/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">Visualizza</a> |
                            <a href="<?php echo BASE_URL;?>
/adminContentDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"
                               onclick="return confirm('Eliminare definitivamente questa creazione?');">
                                Elimina
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php }?>
</section>
<?php
}
}
/* {/block "content"} */
}
