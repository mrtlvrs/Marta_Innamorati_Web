<?php
/* Smarty version 4.5.6, created on 2026-01-26 11:54:29
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/edit_creation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697747e55afff0_64577712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '082be8af6528824205c8886163632b64007a54a8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/edit_creation.tpl',
      1 => 1769277672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697747e55afff0_64577712 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_125120557697747e5593058_42157724', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_125120557697747e5593058_42157724 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_125120557697747e5593058_42157724',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2>Modifica creazione</h2>

<?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
    <div class="error-message">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
<?php }?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creationUpdate/<?php echo $_smarty_tpl->tpl_vars['creationId']->value;?>
">

    <!-- TITOLO -->
    <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text"
               id="title"
               name="title"
               value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
"
               required>
    </div>

    <!-- DESCRIZIONE -->
    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea id="description"
                  name="description"
                  rows="6"
                  required><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['description']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>

    <!-- FILO -->
    <div class="form-group">
        <label for="yarn_id">Filato</label>
        <select name="yarn_id" id="yarn_id" required>
            <option value="">Seleziona un filo</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarns']->value, 'yarn');
$_smarty_tpl->tpl_vars['yarn']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['yarn']->value) {
$_smarty_tpl->tpl_vars['yarn']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['yarn']->value['id'];?>
"
                    <?php if ($_smarty_tpl->tpl_vars['yarn']->value['id'] == $_smarty_tpl->tpl_vars['selectedYarn']->value) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['yarn']->value['name'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- SPESSORE -->
    <div class="form-group">
        <label for="yarn_weight_id">Spessore</label>
        <select name="yarn_weight_id" id="yarn_weight_id" required>
            <option value="">Seleziona uno spessore</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarnWeights']->value, 'weight');
$_smarty_tpl->tpl_vars['weight']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['weight']->value) {
$_smarty_tpl->tpl_vars['weight']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['weight']->value['id'];?>
"
                    <?php if ($_smarty_tpl->tpl_vars['weight']->value['id'] == $_smarty_tpl->tpl_vars['selectedYarnWeight']->value) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['weight']->value['weight'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- UNCINETTO -->
    <div class="form-group">
        <label for="crochet_id">Uncinetto</label>
        <select name="crochet_id" id="crochet_id" required>
            <option value="">Seleziona uncinetto</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['crochets']->value, 'crochet');
$_smarty_tpl->tpl_vars['crochet']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['crochet']->value) {
$_smarty_tpl->tpl_vars['crochet']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['crochet']->value['id'];?>
"
                    <?php if ($_smarty_tpl->tpl_vars['crochet']->value['id'] == $_smarty_tpl->tpl_vars['selectedCrochet']->value) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['crochet']->value['size'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- CATEGORIA -->
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" id="category_id" required>
            <option value="">Seleziona categoria</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['selectedCategory']->value) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                </option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- INFO IMMAGINI -->
    <div class="info-box">
        <p>
            ⚠️ Le immagini non sono modificabili dopo la pubblicazione.
        </p>
    </div>

    <!-- AZIONI -->
    <div class="form-actions">
        <button type="submit" class="btn-primary">
            Salva modifiche
        </button>

        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile" class="btn-secondary">
            Annulla
        </a>
    </div>

</form>

<?php
}
}
/* {/block "content"} */
}
