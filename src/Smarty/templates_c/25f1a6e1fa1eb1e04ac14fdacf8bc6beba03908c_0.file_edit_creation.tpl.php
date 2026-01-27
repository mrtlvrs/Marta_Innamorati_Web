<?php
/* Smarty version 5.7.0, created on 2026-01-13 19:32:00
  from 'file:edit_creation.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69668fa01b6a19_68890643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25f1a6e1fa1eb1e04ac14fdacf8bc6beba03908c' => 
    array (
      0 => 'edit_creation.tpl',
      1 => 1768329103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69668fa01b6a19_68890643 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_128101393969668fa018c594_08609924', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_128101393969668fa018c594_08609924 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<h2>Modifica creazione</h2>

<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
    <div class="error-message">
        <?php echo $_smarty_tpl->getValue('error');?>

    </div>
<?php }?>

<form method="post" action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creationUpdate/<?php echo $_smarty_tpl->getValue('creationId');?>
">

    <!-- TITOLO -->
    <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text"
               id="title"
               name="title"
               value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('title'), ENT_QUOTES, 'UTF-8', true);?>
"
               required>
    </div>

    <!-- DESCRIZIONE -->
    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea id="description"
                  name="description"
                  rows="6"
                  required><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('description'), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>

    <!-- FILO -->
    <div class="form-group">
        <label for="yarn_id">Filo</label>
        <select name="yarn_id" id="yarn_id" required>
            <option value="">Seleziona un filo</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarns'), 'yarn');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('yarn')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('yarn')['id'];?>
"
                    <?php if ($_smarty_tpl->getValue('yarn')['id'] == $_smarty_tpl->getValue('selectedYarn')) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->getValue('yarn')['name'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- SPESSORE -->
    <div class="form-group">
        <label for="yarn_weight_id">Spessore</label>
        <select name="yarn_weight_id" id="yarn_weight_id" required>
            <option value="">Seleziona uno spessore</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarnWeights'), 'weight');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('weight')->value) {
$foreach1DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('weight')['id'];?>
"
                    <?php if ($_smarty_tpl->getValue('weight')['id'] == $_smarty_tpl->getValue('selectedYarnWeight')) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->getValue('weight')['weight'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- UNCINETTO -->
    <div class="form-group">
        <label for="crochet_id">Uncinetto</label>
        <select name="crochet_id" id="crochet_id" required>
            <option value="">Seleziona uncinetto</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('crochets'), 'crochet');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('crochet')->value) {
$foreach2DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('crochet')['id'];?>
"
                    <?php if ($_smarty_tpl->getValue('crochet')['id'] == $_smarty_tpl->getValue('selectedCrochet')) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->getValue('crochet')['size'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <!-- CATEGORIA -->
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" id="category_id" required>
            <option value="">Seleziona categoria</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach3DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('category')['id'];?>
"
                    <?php if ($_smarty_tpl->getValue('category')['id'] == $_smarty_tpl->getValue('selectedCategory')) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->getValue('category')['name'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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

        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
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
