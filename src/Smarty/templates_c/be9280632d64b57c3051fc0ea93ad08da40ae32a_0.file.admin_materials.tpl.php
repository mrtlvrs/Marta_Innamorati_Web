<?php
/* Smarty version 4.5.6, created on 2026-01-27 00:30:37
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/admin_materials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6977f91deaf2c9_59012834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be9280632d64b57c3051fc0ea93ad08da40ae32a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/admin_materials.tpl',
      1 => 1769419208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6977f91deaf2c9_59012834 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16259248416977f91de826f4_27568405', "scripts");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1525220376977f91de85515_40483896', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12057816166977f91de85ac6_79234193', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "scripts"} */
class Block_16259248416977f91de826f4_27568405 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_16259248416977f91de826f4_27568405',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/admin.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "title"} */
class Block_1525220376977f91de85515_40483896 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1525220376977f91de85515_40483896',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Gestione materiali | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_12057816166977f91de85ac6_79234193 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12057816166977f91de85ac6_79234193',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="admin">
    <h2>Gestione materiali</h2>

        <div class="material-tabs">
        <button type="button" onclick="showTab('categories')">Categorie</button>
        <button type="button" onclick="showTab('yarns')">Filati</button>
        <button type="button" onclick="showTab('weights')">Spessori</button>
        <button type="button" onclick="showTab('crochets')">Uncinetti</button>
    </div>

    <hr>

        <section id="categories" class="material-section">
        <h3>Categorie</h3>

        <form method="post" action="<?php echo BASE_URL;?>
/adminCategoryAdd">
            <input type="text" name="name" placeholder="Nuova categoria" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->tpl_vars['c']->value['active']) {?>inactive<?php }?>">
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['c']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['c']->value['active']) {?>Attiva<?php } else { ?>Disattiva<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminCategoryToggle/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['c']->value['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </section>

        <section id="yarns" class="material-section" style="display:none">
        <h3>Filati</h3>

        <form method="post" action="<?php echo BASE_URL;?>
/adminYarnAdd">
            <input type="text" name="name" placeholder="Nuovo filato" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarns']->value, 'y');
$_smarty_tpl->tpl_vars['y']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['y']->value) {
$_smarty_tpl->tpl_vars['y']->do_else = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->tpl_vars['y']->value['active']) {?>inactive<?php }?>">
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['y']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['y']->value['active']) {?>Attivo<?php } else { ?>Disattivo<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminYarnToggle/<?php echo $_smarty_tpl->tpl_vars['y']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['y']->value['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </section>

        <section id="weights" class="material-section" style="display:none">
        <h3>Spessori</h3>

        <form method="post" action="<?php echo BASE_URL;?>
/adminWeightAdd">
            <input type="text" name="weight" placeholder="Nuovo spessore" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Spessore</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weights']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->tpl_vars['w']->value['active']) {?>inactive<?php }?>">
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['w']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['w']->value['active']) {?>Attivo<?php } else { ?>Disattivo<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminWeightToggle/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['w']->value['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </section>

        <section id="crochets" class="material-section" style="display:none">
        <h3>Uncinetti</h3>

        <form method="post" action="<?php echo BASE_URL;?>
/adminCrochetAdd">
            <input type="number" step="0.5" name="size" placeholder="Misura (mm)" required>
            <button type="submit">Aggiungi</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Misura (mm)</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['crochets']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->tpl_vars['c']->value['active']) {?>inactive<?php }?>">
                        <td><?php echo $_smarty_tpl->tpl_vars['c']->value['size'];?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['c']->value['active']) {?>Attivo<?php } else { ?>Disattivo<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminCrochetToggle/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['c']->value['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </section>
</section>

<?php
}
}
/* {/block "content"} */
}
