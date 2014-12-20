<?php /* Smarty version 2.6.27, created on 2014-09-15 16:33:30
         compiled from /var/www/efront/www/modules/module_kaseya_university_workbook/module.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printForm', '/var/www/efront/www/modules/module_kaseya_university_workbook/module.tpl', 10, false),array('function', 'eF_template_printBlock', '/var/www/efront/www/modules/module_kaseya_university_workbook/module.tpl', 17, false),)), $this); ?>
<?php if ($_SESSION['s_type'] == 'administrator'): ?>
	<?php ob_start(); ?>
		<div class = "headerTools">
			<span>
				<img src = "images/16x16/import.png" alt = "<?php echo @_UPLOAD; ?>
" title = "<?php echo @_UPLOAD; ?>
"/>
				<a href = "javascript:void(0)" onclick = "eF_js_showDivPopup(event, '<?php echo @_UPLOADFILE; ?>
', 1, 'module_leaflet_upload_div')"><?php echo @_UPLOADFILE; ?>
</a>
			</span>
		</div>
		<div id = "module_leaflet_upload_div" style = "display:none">
			<?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_UPLOAD_FORM']), $this);?>

		</div>
		<?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>

	<?php $this->_smarty_vars['capture']['t_import_code'] = ob_get_contents(); ob_end_clean(); ?>
	
	<?php ob_start(); ?>
		<div class = "tabber">
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'upload','title' => @_MODULE_LEAFLET_MANAGEFILES,'data' => $this->_smarty_vars['capture']['t_import_code'],'image' => '32x32/import.png'), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'list','title' => @_MODULE_LEAFLET_FILESLIST,'columns' => 3,'links' => $this->_tpl_vars['T_FILES'],'image' => '32x32/folders.png'), $this);?>

		</div>
	<?php $this->_smarty_vars['capture']['t_leaflet_code'] = ob_get_contents(); ob_end_clean(); ?>
	<?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_LEAFLET_MODULELEAFLET,'data' => $this->_smarty_vars['capture']['t_leaflet_code'],'image' => '32x32/information.png'), $this);?>

<?php else: ?>
	<?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_LEAFLET_MODULELEAFLET,'columns' => 3,'links' => $this->_tpl_vars['T_FILES'],'image' => '32x32/information.png'), $this);?>

	<?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_LEAFLET_MODULELEAFLET,'columns' => 3,'links' => $this->_tpl_vars['T_CurrentUser'],'image' => '32x32/information.png'), $this);?>

<?php endif; ?>
