<?php /* Smarty version 2.6.27, created on 2014-11-12 14:53:23
         compiled from /var/www/efront/www/modules/module_idle_users/module.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printForm', '/var/www/efront/www/modules/module_idle_users/module.tpl', 2, false),array('function', 'cycle', '/var/www/efront/www/modules/module_idle_users/module.tpl', 14, false),array('function', 'eF_template_printBlock', '/var/www/efront/www/modules/module_idle_users/module.tpl', 38, false),)), $this); ?>
	<?php ob_start(); ?>
		<?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_IDLE_USER_FORM']), $this);?>

		<br/>
<!--ajax:idleUsersTable-->
						<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "idleUsersTable" useAjax = "1" activeFilter = 1 rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&">
							<tr class = "topTitle">
								<td class = "topTitle" name = "login"><?php echo @_USER; ?>
</td>
								<td class = "topTitle" name = "last_action"><?php echo @_MODULE_IDLE_USERS_LASTACTION; ?>
</td>
								<td class = "topTitle" name = "last_action_since"><?php echo @_MODULE_IDLE_USERS_LASTACTIONSINCE; ?>
</td>
								<td class = "topTitle centerAlign" name = "active"><?php echo @_STATUS; ?>
</td>
								<td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
							</tr>
		<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
							<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
								<td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['user']['login']; ?>
&op=profile" class = "editLink">#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</a></td>
								<td><?php if ($this->_tpl_vars['user']['last_action']): ?>#filter:timestamp_time-<?php echo $this->_tpl_vars['user']['last_action']; ?>
#<?php else: ?><?php echo @_NEVER; ?>
<?php endif; ?></td>
								<td><?php if ($this->_tpl_vars['user']['last_action_since']): ?><?php echo $this->_tpl_vars['user']['last_action_since']; ?>
 <?php echo @_AGO; ?>
<?php else: ?>-<?php endif; ?></td>
								<td class = "centerAlign">
									<img class = "ajaxHandle" src="images/16x16/trafficlight_<?php if ($this->_tpl_vars['user']['active']): ?>green<?php else: ?>red<?php endif; ?>.png" title="<?php echo @_MODULE_IDLE_USERS_TOGGLESTATUS; ?>
" alt="<?php echo @_MODULE_IDLE_USERS_TOGGLESTATUS; ?>
" onclick = "toggleUser(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
								</td>
								<td class = "centerAlign">
								<?php if ($this->_tpl_vars['user']['login'] != $_SESSION['s_login']): ?>
									<img class = "ajaxHandle" src="images/16x16/error_delete.png" title="<?php echo @_ARCHIVE; ?>
" alt="<?php echo @_ARCHIVE; ?>
" onclick = "archiveUser(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
								<?php endif; ?>
								</td>
						</tr>
		<?php endforeach; else: ?>
						<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
		<?php endif; unset($_from); ?>
					</table>
<!--/ajax:idleUsersTable-->
					<div class = ""><span><?php echo @_OPERATIONS; ?>
:</span>
						<img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_MODULE_IDLE_USERS_DEACTIVATEALLUSERS; ?>
" title = "<?php echo @_MODULE_IDLE_USERS_DEACTIVATEALLUSERS; ?>
" onclick = "if (confirm('<?php echo @_MODULE_IDLE_USERS_THISWILLDEACTIVATEALLUSERSAREYOUSURE; ?>
')) deactivateAllIdleUsers(this)"/>
						<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_MODULE_IDLE_USERS_ARCHIVEALLUSERS; ?>
" title = "<?php echo @_MODULE_IDLE_USERS_ARCHIVEALLUSERS; ?>
" onclick = "if (confirm('<?php echo @_MODULE_IDLE_USERS_THISWILLARCHIVEALLUSERSAREYOUSURE; ?>
')) archiveAllIdleUsers(this)"/>
						<a href = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&excel=1" target = "_new"><img class = "handle" src = "images/file_types/xls.png" title = "<?php echo @_XLSFORMAT; ?>
" alt = "<?php echo @_XLSFORMAT; ?>
" /></a>
					</div>
	<?php $this->_smarty_vars['capture']['t_idle_users_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => 'Idle users','data' => $this->_smarty_vars['capture']['t_idle_users_code']), $this);?>