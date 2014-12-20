<?php /* Smarty version 2.6.27, created on 2014-10-27 11:43:24
         compiled from browsecontent.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <table>
    	<tr><td>
    		<?php echo $this->_tpl_vars['T_CONTENT_TREE']; ?>

    	</td></tr>
    </table>
    <script>
    <?php echo '
        function setLink(el) {
        	Element.extend(el);
        	parent.document.getElementById(\'href\').value = \'##EFRONTINNERLINK##.php?ctg=content&view_unit=\' + el.id.replace(/nodeATag(\\d*)/, "$1");
        }
    '; ?>

    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/closing.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>