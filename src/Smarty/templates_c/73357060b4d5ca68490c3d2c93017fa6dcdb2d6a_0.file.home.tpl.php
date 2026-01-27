<?php
/* Smarty version 4.5.6, created on 2026-01-27 09:18:28
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697874d447bc36_06807077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73357060b4d5ca68490c3d2c93017fa6dcdb2d6a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/home.tpl',
      1 => 1769501863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697874d447bc36_06807077 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108608243697874d443a121_39761429', "scripts");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2120405679697874d443ea84_50406383', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "scripts"} */
class Block_108608243697874d443a121_39761429 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_108608243697874d443a121_39761429',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/home.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "content"} */
class Block_2120405679697874d443ea84_50406383 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2120405679697874d443ea84_50406383',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>


<?php if ($_smarty_tpl->tpl_vars['isLogged']->value) {?>
    <header class="section-title2">
    <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'latest') {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home?reset=1" class="button primary fit">Ultime creazioni</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home/following?reset=1" class="button fit">Per te</a>
    <?php } else { ?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home?reset=1" class="button fit">Ultime creazioni</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home/following?reset=1" class="button primary fit">Per te</a>
    <?php }?>

    </header>
<?php } else { ?>
    <header class="section-title">
    <h2>Ultime creazioni</h2>
    </header>
<?php }?>

<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'following') {?>/following<?php }?>" class="filters">
    <div>

        <div class="field">
            <label for="category">Categoria</label>
            <select name="category" id="category">
                <option value="">Tutte</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->getId();?>
" <?php if ((isset($_smarty_tpl->tpl_vars['filters']->value['category'])) && $_smarty_tpl->tpl_vars['filters']->value['category'] == $_smarty_tpl->tpl_vars['cat']->value->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->tpl_vars['cat']->value->getName();?>

                    </option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <label for="yarn">Filato</label>
            <select name="yarn" id="yarn">
                <option value="">Tutti</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarns']->value, 'y');
$_smarty_tpl->tpl_vars['y']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['y']->value) {
$_smarty_tpl->tpl_vars['y']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['y']->value->getId();?>
" <?php if ((isset($_smarty_tpl->tpl_vars['filters']->value['yarn'])) && $_smarty_tpl->tpl_vars['filters']->value['yarn'] == $_smarty_tpl->tpl_vars['y']->value->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->tpl_vars['y']->value->getName();?>

                    </option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <label for="yarnWeight">Spessore</label>
            <select name="yarnWeight" id="yarnWeight">
                <option value="">Tutti</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['yarnWeights']->value, 'yw');
$_smarty_tpl->tpl_vars['yw']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['yw']->value) {
$_smarty_tpl->tpl_vars['yw']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['yw']->value->getId();?>
" <?php if ((isset($_smarty_tpl->tpl_vars['filters']->value['yarnWeight'])) && $_smarty_tpl->tpl_vars['filters']->value['yarnWeight'] == $_smarty_tpl->tpl_vars['yw']->value->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->tpl_vars['yw']->value->getWeight();?>

                    </option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <label for="crochet">Uncinetto</label>
            <select name="crochet" id="crochet">
                <option value="">Tutti</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['crochets']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->getId();?>
" <?php if ((isset($_smarty_tpl->tpl_vars['filters']->value['crochet'])) && $_smarty_tpl->tpl_vars['filters']->value['crochet'] == $_smarty_tpl->tpl_vars['c']->value->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->tpl_vars['c']->value->getSize();?>

                    </option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <button type="submit" class="button">Filtra</button>
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'following') {?>/following<?php }?>?reset=1" class="button secondary js-reset-filters">
                Reset
            </a>
        </div>

    </div>
</form>

<?php $_smarty_tpl->_assignInScope('hasSavedFilters', false);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filters']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value !== null && $_smarty_tpl->tpl_vars['v']->value !== '') {?>
        <?php $_smarty_tpl->_assignInScope('hasSavedFilters', true);?>
        <?php break 1;?>
    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if ($_smarty_tpl->tpl_vars['hasSavedFilters']->value && (smarty_modifier_count($_GET) == 0)) {?>
    <p class="filters-hint">
        Filtri salvati dalla navigazione precedente.
        Premi <strong>“Filtra”</strong> per usarli.
    </p>
<?php }?>


<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['creations']->value) == 0) {?>
    <p class="muted">
        <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'following') {?>
            Nessun post pubblicato dai tuoi amici.
        <?php } else { ?>
            Nessuna creazione disponibile al momento.
        <?php }?>
    </p>
<?php }?>

<div class="posts">

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['creations']->value, 'creation');
$_smarty_tpl->tpl_vars['creation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['creation']->value) {
$_smarty_tpl->tpl_vars['creation']->do_else = false;
?>

<article class="creation-card">

    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creation/<?php echo $_smarty_tpl->tpl_vars['creation']->value['id'];?>
" class="image-link">

        <?php if ($_smarty_tpl->tpl_vars['creation']->value['firstImage']) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['creation']->value['firstImage'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['creation']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" class="creation-thumb">
        <?php }?>

        <ul class="stats">
            <li>❤️ <?php echo $_smarty_tpl->tpl_vars['creation']->value['likesCount'];?>
</li>
            <li>💬 <?php echo $_smarty_tpl->tpl_vars['creation']->value['commentsCount'];?>
</li>
            <li>📌 <?php echo $_smarty_tpl->tpl_vars['creation']->value['savedCount'];?>
</li>

            <?php if ($_smarty_tpl->tpl_vars['creation']->value['isSaved']) {?>
                <li class="saved-flag">Salvato</li>
            <?php }?>
        </ul>

    </a>

    <h3><?php echo $_smarty_tpl->tpl_vars['creation']->value['title'];?>
</h3>
    <h5> <p class="author">di @<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['creation']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['creation']->value['author'];?>
</a></p></h5>

</article>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div>

<?php $_smarty_tpl->_assignInScope('filterQuery', '');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filters']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>          <?php if ($_smarty_tpl->tpl_vars['k']->value != 'page' && $_smarty_tpl->tpl_vars['v']->value !== null && $_smarty_tpl->tpl_vars['v']->value !== '') {?>
        <?php $_smarty_tpl->_assignInScope('filterQuery', (((($_smarty_tpl->tpl_vars['filterQuery']->value).("&")).($_smarty_tpl->tpl_vars['k']->value)).("=")).($_smarty_tpl->tpl_vars['v']->value));?>
    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
    <div class="pagination-wrapper">
        <ul class="pagination">
            
            <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'following') {?>/following<?php }?>?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;
echo $_smarty_tpl->tpl_vars['filterQuery']->value;?>
"
                       class="button small">
                        Prev
                    </a>
                </li>
            <?php } else { ?>
                <li><span class="button small disabled">Prev</span></li>
            <?php }?>

            <?php
$__section_p_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['totalPages']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_p_0_total = $__section_p_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_p'] = new Smarty_Variable(array());
if ($__section_p_0_total !== 0) {
for ($__section_p_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] = 0; $__section_p_0_iteration <= $__section_p_0_total; $__section_p_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']++){
?>
                <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)+1 == $_smarty_tpl->tpl_vars['page']->value) {?>
                    <li><span class="page active"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)+1;?>
</span></li>
                <?php } else { ?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'following') {?>/following<?php }?>?page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)+1;
echo $_smarty_tpl->tpl_vars['filterQuery']->value;?>
"
                           class="page">
                            <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)+1;?>

                        </a>
                    </li>
                <?php }?>
            <?php
}
}
?>

            <?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/home<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'following') {?>/following<?php }?>?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;
echo $_smarty_tpl->tpl_vars['filterQuery']->value;?>
"
                       class="button small">
                        Next
                    </a>
                </li>
            <?php } else { ?>
                <li><span class="button small disabled">Next</span></li>
            <?php }?>

        </ul>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['isLogged']->value) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/creationNew"
       class="button primary icon solid fa-plus floating-create">
        Pubblica
    </a>
<?php }?>

<?php
}
}
/* {/block "content"} */
}
