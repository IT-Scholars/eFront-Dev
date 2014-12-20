<?php /* Smarty version 2.6.27, created on 2014-09-17 20:52:25
         compiled from includes/order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/order.tpl', 8, false),array('modifier', 'cat', 'includes/order.tpl', 8, false),)), $this); ?>

<?php ob_start(); ?>
	<tr><td class = "moduleCell">
        <?php ob_start(); ?>
			<?php echo $this->_tpl_vars['T_UNIT_ORDER_TREE']; ?>

        <?php $this->_smarty_vars['capture']['content_tree'] = ob_get_contents(); ob_end_clean(); ?>
        <?php echo smarty_function_eF_template_printBlock(array('title' => @_DRAGAUNITTOCHANGEITSPOSITION,'data' => $this->_smarty_vars['capture']['content_tree'],'image' => "32x32/theory.png",'alt' => ((is_array($_tmp=((is_array($_tmp='<span class = "emptyCategory">')) ? $this->_run_mod_handler('cat', true, $_tmp, @_NOCONTENTFOUND) : smarty_modifier_cat($_tmp, @_NOCONTENTFOUND)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</span>') : smarty_modifier_cat($_tmp, '</span>')),'options' => $this->_tpl_vars['T_TABLE_OPTIONS'],'help' => 'Content_tree_management'), $this);?>

        <input class = "flatButton" type = "button" onclick = "saveTree(this)" value = "<?php echo @_SAVECHANGES; ?>
" />
        <input class = "flatButton" type = "button" onclick = "window.location.reload()" value = "<?php echo @_UNDOCHANGES; ?>
" id = "reload_button"/>
	</td></tr>
<?php $this->_smarty_vars['capture']['moduleUnitOrder'] = ob_get_contents(); ob_end_clean(); ?>