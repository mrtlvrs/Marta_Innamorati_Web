<?php
/* Smarty version 4.5.6, created on 2026-01-26 11:52:26
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/new.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6977476ae79109_83128883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fb601dd6ac7a9a0515304e0099410776677193f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/new.tpl',
      1 => 1767960921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6977476ae79109_83128883 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6853594196977476ae62af6_73147898', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_6853594196977476ae62af6_73147898 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6853594196977476ae62af6_73147898',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2>Nuova creazione</h2>

<?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
    <p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php }?>

<form method="post"
      action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creationSave"
      enctype="multipart/form-data">

    <div class="field">
        <label>Titolo</label>
        <input type="text" name="title" required>
    </div>

    <div class="field">
        <label>Descrizione</label>
        <textarea name="description" required></textarea>
    </div>

    <div class="field">
        <label>Immagini</label>
        <input type="file" name="images[]" multiple accept="image/*">
    </div>

    <!-- MATERIALI -->
    <div class="field">
        <label for="yarn">Filato</label>
        <select id="yarn" name="yarn_id" required>          <!-- può selezionarne uno solo, il form invia solo l'ID -->
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarns']->value, 'yarn');
$_smarty_tpl->tpl_vars['yarn']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['yarn']->value) {
$_smarty_tpl->tpl_vars['yarn']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['yarn']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['yarn']->value['name'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="yarn_weight">Spessore filato</label>
        <select id="yarn_weight" name="yarn_weight_id" required>
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarnWeights']->value, 'weight');
$_smarty_tpl->tpl_vars['weight']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['weight']->value) {
$_smarty_tpl->tpl_vars['weight']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['weight']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['weight']->value['weight'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="crochet">Uncinetto</label>
        <select id="crochet" name="crochet_id" required>
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['crochets']->value, 'crochet');
$_smarty_tpl->tpl_vars['crochet']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['crochet']->value) {
$_smarty_tpl->tpl_vars['crochet']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['crochet']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['crochet']->value['size'];?>
 mm
                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="category">Categoria</label>
        <select id="category" name="category_id" required>
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="accessories">Accessori (opzionale)</label>
        <textarea id="accessories" name="accessories"></textarea>
    </div>

    <ul class="actions">
        <li>
            <button type="submit" class="button primary">
                Pubblica
            </button>
        </li>
    </ul>

</form>

<?php
}
}
/* {/block "content"} */
}
