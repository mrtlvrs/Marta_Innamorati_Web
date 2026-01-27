<?php
/* Smarty version 4.5.6, created on 2026-01-27 09:26:03
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/saved.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6978769bae25f7_05669033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52b02108585dd6c3df3c15d8dcb51fa12ca76a52' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/saved.tpl',
      1 => 1768900348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6978769bae25f7_05669033 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8246948046978769bacc1b5_37377508', "scripts");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16394524896978769bacf093_90268107', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "scripts"} */
class Block_8246948046978769bacc1b5_37377508 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_8246948046978769bacc1b5_37377508',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/js/saved.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts"} */
/* {block "content"} */
class Block_16394524896978769bacf093_90268107 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16394524896978769bacf093_90268107',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>


<header class="section-title">
    <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
</header>

<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['creations']->value) === 0) {?>
    <p>Non hai ancora salvato nessuna creazione.</p>
<?php } else { ?>
    <div id="saved-posts" class="posts">

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

            <?php if ($_smarty_tpl->tpl_vars['creation']->value['image']) {?>
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['BASE_PUBLIC']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['creation']->value['image'];?>
"
                    alt="<?php echo $_smarty_tpl->tpl_vars['creation']->value['title'];?>
"
                    class="creation-thumb"
                >
            <?php }?>

        </a>

        <h3><?php echo $_smarty_tpl->tpl_vars['creation']->value['title'];?>
</h3>
        <h5> <p class="author">di @<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['creation']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['creation']->value['author'];?>
</a></p></h5>
        

        <ul class="stats">
            <li>❤️ <?php echo $_smarty_tpl->tpl_vars['creation']->value['likes'];?>
</li>
            <li>💬 <?php echo $_smarty_tpl->tpl_vars['creation']->value['comments'];?>
</li>
            <li>📌 <?php echo $_smarty_tpl->tpl_vars['creation']->value['saves'];?>
</li>
        </ul>


    </article>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
        <div class="pagination-wrapper">
            <ul class="pagination">

                <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/saved?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" class="button small">
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
/saved?page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null)+1;?>
" class="page">
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
/saved?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
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
