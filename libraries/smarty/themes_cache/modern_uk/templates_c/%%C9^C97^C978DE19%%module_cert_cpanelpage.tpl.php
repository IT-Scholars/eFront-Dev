<?php /* Smarty version 2.6.27, created on 2014-09-15 13:37:22
         compiled from /var/www/efront/www/modules/module_cert/module_cert_cpanelpage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', '/var/www/efront/www/modules/module_cert/module_cert_cpanelpage.tpl', 10, false),array('function', 'eF_template_printBlock', '/var/www/efront/www/modules/module_cert/module_cert_cpanelpage.tpl', 22, false),)), $this); ?>
<?php ob_start(); ?>
<!--ajax:certTable-->

					<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "certTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&">
						<tr class = "topTitle">
							<td class = "topTitle" name = "timestamp"><?php echo @_DATE; ?>
</td>
							<td class = "topTitle" name = "data"><?php echo @_DATA; ?>
</td>
						</tr>
	<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cert_data_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cert_data_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['cert_data_list']['iteration']++;
?>
						<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
							<td>#filter:timestamp-<?php echo $this->_tpl_vars['item']['timestamp']; ?>
#</td>
							<td><?php echo $this->_tpl_vars['item']['data']; ?>
</td>
					</tr>
	<?php endforeach; else: ?>
					<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
	<?php endif; unset($_from); ?>
				</table>

<!--/ajax:certTable-->

<?php $this->_smarty_vars['capture']['t_cert_data_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_CERT_CERTDATACPANEL,'data' => $this->_smarty_vars['capture']['t_cert_data_code']), $this);?>