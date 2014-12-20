<?php /* Smarty version 2.6.27, created on 2014-09-16 16:10:19
         compiled from includes/comments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/comments.tpl', 30, false),)), $this); ?>
<?php ob_start(); ?>
	<tr><td class = "moduleCell">
	<?php if ($_GET['add'] || $_GET['edit']): ?>
	    <?php ob_start(); ?>
			<?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

			<form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
			    <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

			    <table class = "formElements">
					<tr><td></td><td>
						<span>
							<img style="vertical-align:middle" onclick = "toggledInstanceEditor = 'data';javascript:toggleEditor('data','simpleEditor');" class = "handle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
							<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'data';javascript:toggleEditor('data','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
						</span>
					</td></tr>
			        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['data']['label']; ?>
:&nbsp;</td>
			            <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['data']['html']; ?>
</td></tr>
			        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['private']['label']; ?>
:&nbsp;</td>
			            <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['private']['html']; ?>
</td></tr>
			        <tr><td></td>
			            <td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit']['html']; ?>
</td></tr>
			    </table>
			</form>	    	

		<?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
	    <script>parent.location=parent.location;</script>
		<?php endif; ?>	

		<?php $this->_smarty_vars['capture']['t_add_code'] = ob_get_contents(); ob_end_clean(); ?>
		
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_COMMENTPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_code'],'image' => '32x32/note.png'), $this);?>

	<?php endif; ?>
	</td></tr>
<?php $this->_smarty_vars['capture']['moduleComments'] = ob_get_contents(); ob_end_clean(); ?>