<?php
/* Smarty version 5.7.0, created on 2026-01-20 11:09:55
  from 'file:saved.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696f5473c8ccb0_44522886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09ca2ad9c2d5691cf499bc2c12c1a6afde6cbe37' => 
    array (
      0 => 'saved.tpl',
      1 => 1768900348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696f5473c8ccb0_44522886 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1665503811696f5473c69357_13262454', "scripts");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1845582019696f5473c70790_42591705', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "scripts"} */
class Block_1665503811696f5473c69357_13262454 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/js/saved.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "content"} */
class Block_1845582019696f5473c70790_42591705 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>


<header class="section-title">
    <h2><?php echo $_smarty_tpl->getValue('title');?>
</h2>
</header>

<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('creations')) === 0) {?>
    <p>Non hai ancora salvato nessuna creazione.</p>
<?php } else { ?>
    <div id="saved-posts" class="posts">

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('creations'), 'creation');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('creation')->value) {
$foreach0DoElse = false;
?>

    <article class="creation-card">

        <a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/creation/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
" class="image-link">

            <?php if ($_smarty_tpl->getValue('creation')['image']) {?>
                <img
                    src="<?php echo $_smarty_tpl->getValue('BASE_PUBLIC');?>
/<?php echo $_smarty_tpl->getValue('creation')['image'];?>
"
                    alt="<?php echo $_smarty_tpl->getValue('creation')['title'];?>
"
                    class="creation-thumb"
                >
            <?php }?>

        </a>

        <h3><?php echo $_smarty_tpl->getValue('creation')['title'];?>
</h3>
        <h5> <p class="author">di @<a href="<?php echo $_smarty_tpl->getValue('BASE_URL');?>
/profile/<?php echo $_smarty_tpl->getValue('creation')['author'];?>
"><?php echo $_smarty_tpl->getValue('creation')['author'];?>
</a></p></h5>
        

        <ul class="stats">
            <li>❤️ <?php echo $_smarty_tpl->getValue('creation')['likes'];?>
</li>
            <li>💬 <?php echo $_smarty_tpl->getValue('creation')['comments'];?>
</li>
            <li>📌 <?php echo $_smarty_tpl->getValue('creation')['saves'];?>
</li>
        </ul>


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
/saved?page=<?php echo $_smarty_tpl->getValue('page')-1;?>
" class="button small">
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
/saved?page=<?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null)+1;?>
" class="page">
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
/saved?page=<?php echo $_smarty_tpl->getValue('page')+1;?>
" class="button small">
                            Next
                        </a>
                    </li>
                <?php } else { ?>
                    <li><span class="button small disabled">Next</span></li>
                <?php }?>

            </ul>
        </div>
    <?php }
}?>

<?php
}
}
/* {/block "content"} */
}
