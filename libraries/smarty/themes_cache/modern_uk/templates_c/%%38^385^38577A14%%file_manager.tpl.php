<?php /* Smarty version 2.6.27, created on 2014-10-12 02:08:26
         compiled from includes/file_manager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/file_manager.tpl', 11, false),array('modifier', 'cat', 'includes/file_manager.tpl', 11, false),)), $this); ?>
<?php ob_start(); ?>
    <?php if ($this->_tpl_vars['T_FILE_METADATA']): ?>
            <tr><td class = "moduleCell">
                <?php ob_start(); ?>
                    <fieldset class = "fieldsetSeparator">
                        <legend><?php echo @_FILEMETADATA; ?>
</legend>
                        <?php echo $this->_tpl_vars['T_FILE_METADATA_HTML']; ?>

                    </fieldset>
                <?php $this->_smarty_vars['capture']['t_file_info_code'] = ob_get_contents(); ob_end_clean(); ?>
                <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_INFORMATIONFORFILE)) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_FILE_METADATA']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_FILE_METADATA']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;') : smarty_modifier_cat($_tmp, '&quot;')),'data' => $this->_smarty_vars['capture']['t_file_info_code'],'image' => '32x32/information.png'), $this);?>

            </td></tr>
    <?php else: ?>
            <tr><td class = "moduleCell">
                <?php ob_start(); ?>
                    <?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>

                <?php $this->_smarty_vars['capture']['t_file_manager_code'] = ob_get_contents(); ob_end_clean(); ?>
                <?php echo smarty_function_eF_template_printBlock(array('title' => @_FILEMANAGER,'data' => $this->_smarty_vars['capture']['t_file_manager_code'],'image' => '32x32/file_explorer.png','help' => 'Files'), $this);?>

            </td></tr>
    <?php endif; ?>
<?php $this->_smarty_vars['capture']['moduleFileManager'] = ob_get_contents(); ob_end_clean(); ?>