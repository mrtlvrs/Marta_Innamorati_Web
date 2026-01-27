<?php
/* Smarty version 5.7.0, created on 2026-01-09 13:15:23
  from 'file:new.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6960f15b861d76_55698535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6429de7485a3923af6f5e9731abf0e654410285' => 
    array (
      0 => 'new.tpl',
      1 => 1767960921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6960f15b861d76_55698535 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12975907646960f15b83d778_56537362', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_12975907646960f15b83d778_56537362 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<h2>Nuova creazione</h2>

<?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
    <p class="error"><?php echo $_smarty_tpl->getValue('error');?>
</p>
<?php }?>

<form method="post"
      action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarns'), 'yarn');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('yarn')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('yarn')['id'];?>
">
                    <?php echo $_smarty_tpl->getValue('yarn')['name'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="yarn_weight">Spessore filato</label>
        <select id="yarn_weight" name="yarn_weight_id" required>
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarnWeights'), 'weight');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('weight')->value) {
$foreach1DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('weight')['id'];?>
">
                    <?php echo $_smarty_tpl->getValue('weight')['weight'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="crochet">Uncinetto</label>
        <select id="crochet" name="crochet_id" required>
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('crochets'), 'crochet');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('crochet')->value) {
$foreach2DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('crochet')['id'];?>
">
                    <?php echo $_smarty_tpl->getValue('crochet')['size'];?>
 mm
                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>

    <div class="field">
        <label for="category">Categoria</label>
        <select id="category" name="category_id" required>
            <option value="">-- seleziona --</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach3DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('category')['id'];?>
">
                    <?php echo $_smarty_tpl->getValue('category')['name'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
