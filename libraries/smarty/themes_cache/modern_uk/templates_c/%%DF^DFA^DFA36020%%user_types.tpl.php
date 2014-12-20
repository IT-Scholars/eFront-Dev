<?php /* Smarty version 2.6.27, created on 2014-09-16 15:04:11
         compiled from includes/user_types.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/user_types.tpl', 82, false),array('function', 'cycle', 'includes/user_types.tpl', 114, false),array('modifier', 'cat', 'includes/user_types.tpl', 82, false),)), $this); ?>
	<?php ob_start(); ?>
		<tr>
			<td class = "moduleCell">
				<?php if ($_GET['add_user_type'] || $_GET['edit_user_type']): ?>
					<?php ob_start(); ?>
						<table id = "user_type_options">
							<tr>
								<td class = "topAlign">
								<?php echo $this->_tpl_vars['T_USERTYPES_FORM']['javascript']; ?>

								<form <?php echo $this->_tpl_vars['T_USERTYPES_FORM']['attributes']; ?>
>
									<?php echo $this->_tpl_vars['T_USERTYPES_FORM']['hidden']; ?>

									<table class = "formElements">
										<tr>
											<td class = "labelCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['name']['label']; ?>
:&nbsp;</td>
											<td class = "elementCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['name']['html']; ?>
</td>
										</tr>
                                        
										<?php if ($this->_tpl_vars['T_USERTYPES_FORM']['name']['error']): ?>
											<tr>
												<td></td>
												<td class = "formError"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['name']['error']; ?>
</td>
											</tr>
										<?php endif; ?>
                                        
										<tr>
											<td class = "labelCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['basic_user_type']['label']; ?>
:&nbsp;</td>
											<td class = "elementCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['basic_user_type']['html']; ?>
</td>
										</tr>
										
										<?php if ($this->_tpl_vars['T_USERTYPES_FORM']['basic_user_type']['error']): ?>
										<tr>
											<td></td>
											<td class = "formError"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['basic_user_type']['error']; ?>
</td>
										</tr>
										<?php endif; ?>

										<?php $_from = $this->_tpl_vars['T_USERTYPES_OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['usertype_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['usertype_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option'] => $this->_tpl_vars['value']):
        $this->_foreach['usertype_options']['iteration']++;
?>
                                        
                                        <tr>
											<td class = "labelCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['core_access'][$this->_tpl_vars['option']]['label']; ?>
:&nbsp;</td>
											<td class = "elementCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['core_access'][$this->_tpl_vars['option']]['html']; ?>
</td>
										</tr>
											
										<?php if ($this->_tpl_vars['T_USERTYPES_FORM']['core_access'][$this->_tpl_vars['option']]['error']): ?>
										<tr>
											<td></td>
											<td class = "formError"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['core_access'][$this->_tpl_vars['option']]['error']; ?>
</td>
										</tr>
										<?php endif; ?>
										
										<?php endforeach; endif; unset($_from); ?>
                                         
										<?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['user_types'] != 'view'): ?>
                                        <tr>
                                        	<td colspan = "2">&nbsp;</td>
                                        </tr>
										<tr>
											<td class = "labelCell"><?php echo @_SETALLTO; ?>
:&nbsp;</td>
											<td class = "elementCell">
												<select id = "set_options_selected" onchange = "$('user_type_options').select('select').each(function(s)  {if (s.id != 'basic_user_type') s.options.selectedIndex = $('set_options_selected').options.selectedIndex; });">
													<option><?php echo @_CHANGE; ?>
</option>
													<option><?php echo @_VIEW; ?>
</option>
													<option><?php echo @_HIDE; ?>
</option>
												</select>
											</td>
										</tr>
										<?php endif; ?>
                                        
                                        <tr>
											<td></td>
											<td class = "submitCell"><?php echo $this->_tpl_vars['T_USERTYPES_FORM']['submit_type']['html']; ?>
</td>
										</tr>
									</table>
								</form>
								</td>
							</tr>
						</table>
					<?php $this->_smarty_vars['capture']['t_new_role_code'] = ob_get_contents(); ob_end_clean(); ?>

					<?php if ($_GET['edit_user_type']): ?>
    	            	<?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_OPTIONSUSERTYPEFOR)) ? $this->_run_mod_handler('cat', true, $_tmp, "&nbsp;<span class = 'innerTableName'>&quot;") : smarty_modifier_cat($_tmp, "&nbsp;<span class = 'innerTableName'>&quot;")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_USER_TYPE_NAME']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_USER_TYPE_NAME'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&quot;</span>") : smarty_modifier_cat($_tmp, "&quot;</span>")),'data' => $this->_smarty_vars['capture']['t_new_role_code'],'image' => '32x32/user_types.png'), $this);?>

					<?php else: ?>
						<?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWUSERTYPE,'data' => $this->_smarty_vars['capture']['t_new_role_code'],'image' => '32x32/user_types.png'), $this);?>

					<?php endif; ?>

				<?php else: ?>
					<?php ob_start(); ?>
						<script>var activate = '<?php echo @_ACTIVATE; ?>
';var deactivate = '<?php echo @_DEACTIVATE; ?>
';</script>
						<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['configuration'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['configuration'] == 'change'): ?>
							<div class = "headerTools">
								<span>
									<img src = "images/16x16/add.png" title = "<?php echo @_NEWUSERTYPE; ?>
" alt = "<?php echo @_NEWUSERTYPE; ?>
">
									<a href = "administrator.php?ctg=user_types&add_user_type=1" title = "<?php echo @_NEWUSERTYPE; ?>
" ><?php echo @_NEWUSERTYPE; ?>
</a>                                                    
								</span>
							</div>
				                                
							<?php $this->assign('change_user_types', 1); ?>
						<?php endif; ?>
						
						<table style = "width:100%" class = "sortedTable" sortBy = "0">
							<tr class = "topTitle">
								<td class = "topTitle" name="name"><?php echo @_TYPENAME; ?>
</td>
								<td class = "topTitle" name="basic_user_type"><?php echo @_BASICUSERTYPE; ?>
</td>
								<td class = "topTitle centerAlign" name="active"><?php echo @_ACTIVE2; ?>
</td>
	                            
								<?php if ($this->_tpl_vars['change_user_types']): ?>
								<td class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
								<?php endif; ?>
							</tr>
							
							<?php $_from = $this->_tpl_vars['T_USERTYPES_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['usertype_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['usertype_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['type']):
        $this->_foreach['usertype_list']['iteration']++;
?>
							
							<tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
								<td>
									<a href = "administrator.php?ctg=user_types&edit_user_type=<?php echo $this->_tpl_vars['type']['id']; ?>
"  class = "editLink"><?php echo $this->_tpl_vars['type']['name']; ?>
</a>
								</td>
								<td><?php echo $this->_tpl_vars['T_BASIC_USER_TYPES'][$this->_tpl_vars['type']['basic_user_type']]; ?>
</td>
								<td class = "centerAlign">
								<?php if ($this->_tpl_vars['type']['active'] == 1): ?>
									<img class = "ajaxHandle" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['change_user_types']): ?>onclick = "activateUserType(this, '<?php echo $this->_tpl_vars['type']['id']; ?>
')"<?php endif; ?>>
								<?php else: ?>
									<img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png"   alt = "<?php echo @_ACTIVATE; ?>
"   title = "<?php echo @_ACTIVATE; ?>
"   <?php if ($this->_tpl_vars['change_user_types']): ?>onclick = "activateUserType(this, '<?php echo $this->_tpl_vars['type']['id']; ?>
')"<?php endif; ?>>
								<?php endif; ?>
								</td>
								
								<?php if ($this->_tpl_vars['change_user_types']): ?>
								<td class = "centerAlign">
									<a href = "administrator.php?ctg=user_types&edit_user_type=<?php echo $this->_tpl_vars['type']['id']; ?>
"  class = "editLink"><img src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
									<?php if ($this->_tpl_vars['type']['id'] != $this->_tpl_vars['T_CURRENT_USER']->user['user_types_ID']): ?>
										<img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTODELETEUSERTYPE; ?>
')) deleteUserType(this, '<?php echo $this->_tpl_vars['type']['id']; ?>
');"/>
									<?php else: ?>
										<img class = "inactiveImage" src = "images/16x16/error_delete.png" title = "<?php echo @_CANNOTDELETEOWNTYPE; ?>
" alt = "<?php echo @_CANNOTDELETEOWNTYPE; ?>
" />
									<?php endif; ?>
								</td>
								<?php endif; ?>
							</tr>
							
							<?php endforeach; else: ?>
							
	                        <tr class = "defaultRowHeight oddRowColor">
	                        	<td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td>
	                        </tr>
							
							<?php endif; unset($_from); ?>
						</table>
					<?php $this->_smarty_vars['capture']['t_roles_code'] = ob_get_contents(); ob_end_clean(); ?>
                
                	<?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATEUSERTYPES,'data' => $this->_smarty_vars['capture']['t_roles_code'],'image' => '32x32/user_types.png','help' => 'User_types'), $this);?>

				<?php endif; ?>
			</td>
		</tr>
	<?php $this->_smarty_vars['capture']['moduleRoles'] = ob_get_contents(); ob_end_clean(); ?>