<?php
/* Smarty version 4.5.6, created on 2026-01-27 00:24:50
  from '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/admin_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6977f7c202db54_26214803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2034c23f748ba1047141630c5cca53e26d605701' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates/admin_users.tpl',
      1 => 1767480396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6977f7c202db54_26214803 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15387293976977f7c2014327_31731421', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15494965676977f7c2018317_01200292', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_15387293976977f7c2014327_31731421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_15387293976977f7c2014327_31731421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Gestione utenti | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_15494965676977f7c2018317_01200292 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15494965676977f7c2018317_01200292',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="admin">
    <h2>Gestione utenti</h2>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['users']->value) == 0) {?>
        <p>Nessun utente registrato.</p>
    <?php } else { ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Ruolo</th>
                    <th>Iscrizione</th>
                    <th>Creazioni</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
                    <tr>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['u']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['u']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['u']->value['role'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['u']->value['createdAt'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['u']->value['creationsCount'];?>
</td>
                        <td>
                            <a href="<?php echo BASE_URL;?>
/adminUserView/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
">Visualizza</a> |
                            <a href="<?php echo BASE_URL;?>
/adminUserDelete/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"
                               onclick="return confirm('Eliminare definitivamente questo utente?');">
                                Elimina
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php }?>
</section>
<?php
}
}
/* {/block "content"} */
}
