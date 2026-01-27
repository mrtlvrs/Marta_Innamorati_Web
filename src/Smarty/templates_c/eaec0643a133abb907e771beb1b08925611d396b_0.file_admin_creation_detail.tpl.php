<?php
/* Smarty version 5.7.0, created on 2026-01-19 23:19:32
  from 'file:admin_creation_detail.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_696eadf41f0667_83285643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaec0643a133abb907e771beb1b08925611d396b' => 
    array (
      0 => 'admin_creation_detail.tpl',
      1 => 1768861169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696eadf41f0667_83285643 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1779211918696eadf41d3c11_93423748', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2029389892696eadf41db493_27471601', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1779211918696eadf41d3c11_93423748 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>
Dettaglio creazione | CrochetHub<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_2029389892696eadf41db493_27471601 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/CrochetHub/src/Smarty/templates';
?>

<section class="admin">
    <h2>Dettaglio creazione</h2>

    <article>
        <h3><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('creation')['title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
        <p><strong>Autore:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('creation')['author'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        <p><strong>Data:</strong> <?php echo $_smarty_tpl->getValue('creation')['date'];?>
</p>

        <div class="creation-description">
            <?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->getValue('creation')['description'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>

        </div>

        <p>
            <a href="<?php echo BASE_URL;?>
/adminContentDelete/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
"
               onclick="return confirm('Eliminare definitivamente questa creazione?');">
                Elimina creazione
            </a>
        </p>
    </article>

    <hr>

    <section>
        <h3>Commenti</h3>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('creation')['comments']) == 0) {?>
            <p>Nessun commento.</p>
        <?php } else { ?>
            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('creation')['comments'], 'comment');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach0DoElse = false;
?>
                    <li>
                        <strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['author'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
                        (<?php echo $_smarty_tpl->getValue('comment')['date'];?>
)<br>
                        <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['text'], ENT_QUOTES, 'UTF-8', true);?>

                        <br>
                        <a href="<?php echo BASE_URL;?>
/adminCommentDelete/<?php echo $_smarty_tpl->getValue('comment')['id'];?>
/<?php echo $_smarty_tpl->getValue('creation')['id'];?>
"
                           onclick="return confirm('Eliminare questo commento?');">
                            Elimina commento
                        </a>
                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php }?>
    </section>

    <p>
        <a href="<?php echo BASE_URL;?>
/adminContents">← Torna alla gestione contenuti</a>
    </p>
</section>
<?php
}
}
/* {/block "content"} */
}
