<?php
/* Smarty version 5.7.0, created on 2026-01-24 16:13:38
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6974e1a2a77c88_96142752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76fadc803af8d331480879038a0a045c08910922' => 
    array (
      0 => 'home.tpl',
      1 => 1769267549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6974e1a2a77c88_96142752 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15172839706974e1a2a43d13_18487190', "scripts");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_244064606974e1a2a484f8_32688997', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "scripts"} */
class Block_15172839706974e1a2a43d13_18487190 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/home.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "content"} */
class Block_244064606974e1a2a484f8_32688997 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<?php if ($_smarty_tpl->getValue('isLogged')) {?>
    <header class="section-title2">
    <?php if ($_smarty_tpl->getValue('mode') == 'latest') {?>
        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home" class="button primary fit">Ultime creazioni</a>
        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home/following" class="button fit">Per te</a>
    <?php } else { ?>
        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home" class="button fit">Ultime creazioni</a>
        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home/following" class="button primary fit">Per te</a>
    <?php }?>

    </header>
<?php } else { ?>
    <header class="section-title">
    <h2>Ultime creazioni</h2>
    </header>
<?php }?>

<form method="get" action="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home<?php if ($_smarty_tpl->getValue('mode') == 'following') {?>/following<?php }?>" class="filters">
    <div>

        <div class="field">
            <label for="category">Categoria</label>
            <select name="category" id="category">
                <option value="">Tutte</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('cat')->getId();?>
" <?php if ((true && (true && null !== ($_smarty_tpl->getValue('filters')['category'] ?? null))) && $_smarty_tpl->getValue('filters')['category'] == $_smarty_tpl->getValue('cat')->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->getValue('cat')->getName();?>

                    </option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <label for="yarn">Filato</label>
            <select name="yarn" id="yarn">
                <option value="">Tutti</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarns'), 'y');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('y')->value) {
$foreach1DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('y')->getId();?>
" <?php if ((true && (true && null !== ($_smarty_tpl->getValue('filters')['yarn'] ?? null))) && $_smarty_tpl->getValue('filters')['yarn'] == $_smarty_tpl->getValue('y')->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->getValue('y')->getName();?>

                    </option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <label for="yarnWeight">Spessore</label>
            <select name="yarnWeight" id="yarnWeight">
                <option value="">Tutti</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('yarnWeights'), 'yw');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('yw')->value) {
$foreach2DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('yw')->getId();?>
" <?php if ((true && (true && null !== ($_smarty_tpl->getValue('filters')['yarnWeight'] ?? null))) && $_smarty_tpl->getValue('filters')['yarnWeight'] == $_smarty_tpl->getValue('yw')->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->getValue('yw')->getWeight();?>

                    </option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <label for="crochet">Uncinetto</label>
            <select name="crochet" id="crochet">
                <option value="">Tutti</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('crochets'), 'c');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('c')->value) {
$foreach3DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('c')->getId();?>
" <?php if ((true && (true && null !== ($_smarty_tpl->getValue('filters')['crochet'] ?? null))) && $_smarty_tpl->getValue('filters')['crochet'] == $_smarty_tpl->getValue('c')->getId()) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->getValue('c')->getSize();?>

                    </option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="field">
            <button type="submit" class="button">Filtra</button>
            <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home<?php if ($_smarty_tpl->getValue('mode') == 'following') {?>/following<?php }?>?reset=1" class="button secondary">
                Reset
            </a>
        </div>

    </div>
</form>

<?php $_smarty_tpl->assign('hasSavedFilters', false, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('filters'), 'v', false, 'k');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('k')->value => $_smarty_tpl->getVariable('v')->value) {
$foreach4DoElse = false;
?>
    <?php if ($_smarty_tpl->getValue('v') !== null && $_smarty_tpl->getValue('v') !== '') {?>
        <?php $_smarty_tpl->assign('hasSavedFilters', true, false, NULL);?>
        <?php break 1;?>
    <?php }
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

<?php if ($_smarty_tpl->getValue('hasSavedFilters') && ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_GET) == 0)) {?>
    <p class="filters-hint">
        Filtri salvati dalla navigazione precedente.
        Premi <strong>“Filtra”</strong> per usarli.
    </p>
<?php }?>


<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('creations')) == 0) {?>
    <p class="muted">
        <?php if ($_smarty_tpl->getValue('mode') == 'following') {?>
            Nessun post pubblicato dai tuoi amici.
        <?php } else { ?>
            Nessuna creazione disponibile al momento.
        <?php }?>
    </p>
<?php }?>

<div class="posts">

<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('creations'), 'creation');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('creation')->value) {
$foreach5DoElse = false;
?>

<article class="creation-card">

    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creation/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
" class="image-link">

        <?php if ($_smarty_tpl->getValue('creation')['firstImage']) {?>
            <img src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('creation')['firstImage'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('creation')['title'], ENT_QUOTES, 'UTF-8', true);?>
" class="creation-thumb">
        <?php }?>

        <ul class="stats">
            <li>❤️ <?php echo $_smarty_tpl->getValue('creation')['likesCount'];?>
</li>
            <li>💬 <?php echo $_smarty_tpl->getValue('creation')['commentsCount'];?>
</li>
            <li>📌 <?php echo $_smarty_tpl->getValue('creation')['savedCount'];?>
</li>

            <?php if ($_smarty_tpl->getValue('creation')['isSaved']) {?>
                <li class="saved-flag">Salvato</li>
            <?php }?>
        </ul>

    </a>

    <h3><?php echo $_smarty_tpl->getValue('creation')['title'];?>
</h3>
    <h5> <p class="author">di @<a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('creation')['author'];?>
"><?php echo $_smarty_tpl->getValue('creation')['author'];?>
</a></p></h5>

</article>

<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

</div>

<?php if ($_smarty_tpl->getValue('totalPages') > 1) {?>
    <div class="pagination-wrapper">
        <ul class="pagination">
            
            <?php if ($_smarty_tpl->getValue('page') > 1) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home<?php if ($_smarty_tpl->getValue('mode') == 'following') {?>/following<?php }?>?page=<?php echo $_smarty_tpl->getValue('page')-1;?>
"
                       class="button small">
                        Prev
                    </a>
                </li>
            <?php } else { ?>
                <li><span class="button small disabled">Prev</span></li>
            <?php }?>

            <?php
$__section_p_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('totalPages')) ? count($_loop) : max(0, (int) $_loop));
$__section_p_0_total = $__section_p_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_p'] = new \Smarty\Variable(array());
if ($__section_p_0_total !== 0) {
for ($__section_p_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] = 0; $__section_p_0_iteration <= $__section_p_0_total; $__section_p_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']++){
?>
                <?php if (($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null)+1 == $_smarty_tpl->getValue('page')) {?>
                    <li><span class="page active"><?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null)+1;?>
</span></li>
                <?php } else { ?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home<?php if ($_smarty_tpl->getValue('mode') == 'following') {?>/following<?php }?>?page=<?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null)+1;?>
"
                           class="page">
                            <?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null)+1;?>

                        </a>
                    </li>
                <?php }?>
            <?php
}
}
?>

            <?php if ($_smarty_tpl->getValue('page') < $_smarty_tpl->getValue('totalPages')) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/home<?php if ($_smarty_tpl->getValue('mode') == 'following') {?>/following<?php }?>?page=<?php echo $_smarty_tpl->getValue('page')+1;?>
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

<?php if ($_smarty_tpl->getValue('isLogged')) {?>
    <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
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
