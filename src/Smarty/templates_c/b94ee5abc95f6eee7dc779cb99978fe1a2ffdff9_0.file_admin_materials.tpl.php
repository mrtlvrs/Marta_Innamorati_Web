<?php
/* Smarty version 5.7.0, created on 2026-01-20 00:02:30
  from 'file:admin_materials.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696eb806211077_39915664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b94ee5abc95f6eee7dc779cb99978fe1a2ffdff9' => 
    array (
      0 => 'admin_materials.tpl',
      1 => 1768863744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696eb806211077_39915664 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1212207723696eb8061e2e35_19976140', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_915376567696eb8061e59f2_94903717', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1212207723696eb8061e2e35_19976140 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>
Gestione materiali | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_915376567696eb8061e59f2_94903717 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'c');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('c')->value) {
$foreach0DoElse = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->getValue('c')['active']) {?>inactive<?php }?>">
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('c')['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php if ($_smarty_tpl->getValue('c')['active']) {?>Attiva<?php } else { ?>Disattiva<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminCategoryToggle/<?php echo $_smarty_tpl->getValue('c')['id'];?>
">
                                <?php if ($_smarty_tpl->getValue('c')['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarns'), 'y');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('y')->value) {
$foreach1DoElse = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->getValue('y')['active']) {?>inactive<?php }?>">
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('y')['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php if ($_smarty_tpl->getValue('y')['active']) {?>Attivo<?php } else { ?>Disattivo<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminYarnToggle/<?php echo $_smarty_tpl->getValue('y')['id'];?>
">
                                <?php if ($_smarty_tpl->getValue('y')['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('weights'), 'w');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('w')->value) {
$foreach2DoElse = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->getValue('w')['active']) {?>inactive<?php }?>">
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('w')['value'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php if ($_smarty_tpl->getValue('w')['active']) {?>Attivo<?php } else { ?>Disattivo<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminWeightToggle/<?php echo $_smarty_tpl->getValue('w')['id'];?>
">
                                <?php if ($_smarty_tpl->getValue('w')['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('crochets'), 'c');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('c')->value) {
$foreach3DoElse = false;
?>
                    <tr class="<?php if (!$_smarty_tpl->getValue('c')['active']) {?>inactive<?php }?>">
                        <td><?php echo $_smarty_tpl->getValue('c')['size'];?>
</td>
                        <td><?php if ($_smarty_tpl->getValue('c')['active']) {?>Attivo<?php } else { ?>Disattivo<?php }?></td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminCrochetToggle/<?php echo $_smarty_tpl->getValue('c')['id'];?>
">
                                <?php if ($_smarty_tpl->getValue('c')['active']) {?>Disattiva<?php } else { ?>Riattiva<?php }?>
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </section>
</section>

<?php echo '<script'; ?>
>
function showTab(id) {
    document.querySelectorAll('.material-section')                  .forEach(s => s.style.display = 'none');                document.getElementById(id).style.display = 'block';    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
