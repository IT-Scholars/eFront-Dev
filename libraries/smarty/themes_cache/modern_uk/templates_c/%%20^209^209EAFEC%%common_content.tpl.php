<?php /* Smarty version 2.6.27, created on 2014-09-15 13:37:57
         compiled from includes/common_content.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/common_content.tpl', 141, false),array('function', 'cycle', 'includes/common_content.tpl', 371, false),array('function', 'counter', 'includes/common_content.tpl', 432, false),array('modifier', 'eF_truncate', 'includes/common_content.tpl', 256, false),array('modifier', 'eF_template_isOptionVisible', 'includes/common_content.tpl', 369, false),array('modifier', 'str_replace', 'includes/common_content.tpl', 395, false),array('modifier', 'replace', 'includes/common_content.tpl', 538, false),array('modifier', 'cat', 'includes/common_content.tpl', 542, false),)), $this); ?>
	<?php ob_start(); ?>
			<script language="JavaScript" type="text/javascript" src="js/LMSFunctions<?php if ($this->_tpl_vars['T_SCORM_VERSION'] == '1.3'): ?>2004<?php endif; ?>.php?view_unit=<?php if ($_GET['view_unit']): ?><?php echo $_GET['view_unit']; ?>
<?php elseif ($_GET['target']): ?><?php echo $_GET['target']; ?>
<?php else: ?><?php echo $_GET['package_ID']; ?>
<?php endif; ?>"></script>
			<form id = "scorm_form" name = "scorm_form" method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&ajax=1&commit_lms=1&scorm_version=<?php if ($this->_tpl_vars['T_SCORM_VERSION'] == '1.3'): ?>2004&package_ID=<?php echo $_GET['package_ID']; ?>
<?php else: ?>1.2&view_unit=<?php echo $_GET['view_unit']; ?>
<?php endif; ?>" style = "display:none">
				<input type = "hidden" name = "id"				id = "id"				/>
				<input type = "hidden" name = "content_ID"		id = "content_ID"		/>
				<input type = "hidden" name = "users_LOGIN"	   id = "users_LOGIN"	   />
				<input type = "hidden" name = "lesson_location"   id = "lesson_location"   />
				<input type = "hidden" name = "maxtimeallowed"	id = "maxtimeallowed"	/>
				<input type = "hidden" name = "timelimitaction"   id = "timelimitaction"   />
				<input type = "hidden" name = "masteryscore"	  id = "masteryscore"	  />
				<input type = "hidden" name = "datafromlms"	   id = "datafromlms"	   />
				<input type = "hidden" name = "entry"			 id = "entry"			 />
								<input type = "hidden" name = "comments"		  id = "comments"		  />
				<input type = "hidden" name = "comments_from_lms" id = "comments_from_lms" />
				<input type = "hidden" name = "completion_status" id = "completion_status" />
				<input type = "hidden" name = "lesson_status"	 id = "lesson_status"	 />
				<input type = "hidden" name = "score"			 id = "score"			 />
				<input type = "hidden" name = "scorm_exit"		id = "scorm_exit"		/>
				<input type = "hidden" name = "minscore"		  id = "minscore"		  />
				<input type = "hidden" name = "maxscore"		  id = "maxscore"		  />
				<input type = "hidden" name = "suspend_data"	  id = "suspend_data"	  />
				<input type = "hidden" name = "session_time"	  id = "session_time"	  />
				<input type = "hidden" name = "credit"			id = "credit"			/>

				<input type = "hidden" name = "navigation"		id = "navigation"		/>
				<input type = "hidden" name = "success_status"	id = "success_status"	/>
				<input type = "hidden" name = "score_scaled"	  id = "score_scaled"	   />
				<input type = "hidden" name = "progress_measure"  id = "progress_measure"  />
				<input type = "hidden" name = "objectives"		  id = "objectives"		   />
				<input type = "hidden" name = "shared_data"		  id = "shared_data"	   />

				<input type = "hidden" name = "comments_from_lms" id = "comments_from_lms" />
				<input type = "hidden" name = "interactions"  	  id = "interactions" />
				<input type = "hidden" name = "comments_from_learner" id = "comments_from_learner" />
				<input type = "hidden" name = "learner_preferences"   id = "learner_preferences" />
				<input type = "hidden" name = "finish"				  id = "finish" />

			</form>
	<?php $this->_smarty_vars['capture']['t_scorm_form_code'] = ob_get_contents(); ob_end_clean(); ?>

	<?php $this->assign('category', 'lessons'); ?>
	<?php if ($_GET['add'] || $_GET['edit']): ?>
				<?php ob_start(); ?>
			<tr><td class = "moduleCell">
				<?php ob_start(); ?>
					<?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

					<form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
						<?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

						<table class = "formElements" style = "width:100%">
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['html']; ?>
</td>
							</tr>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['parent_content_ID']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['parent_content_ID']['html']; ?>
</td></tr>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['parent_content_ID']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['parent_content_ID']['error']; ?>
</td></tr><?php endif; ?>
					
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['hide_navigation']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['hide_navigation']['html']; ?>
</td></tr>
					<?php if (! $this->_tpl_vars['T_SCORM']): ?>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_unit_setting']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_unit_setting']['html']; ?>
</td></tr>
							<tr <?php if ($this->_tpl_vars['T_EDITED_UNIT']['options']['complete_unit_setting'] != 3): ?>style = "display:none"<?php endif; ?> id = "complete_time_row"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_time']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_time']['html']; ?>
</td></tr>
							<tr <?php if ($this->_tpl_vars['T_EDITED_UNIT']['options']['complete_unit_setting'] != 2): ?>style = "display:none"<?php endif; ?> id = "complete_question_row"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_question']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_question']['html']; ?>
</td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['pdf_check']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['pdf_check']['html']; ?>
</td></tr>
					<?php endif; ?>
							<tr style="display:none;" id="pdf_content"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['pdf_content']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['pdf_content']['html']; ?>
</td></tr>
							<tr style="display:none;" id="pdf_upload"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['pdf_upload']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['pdf_upload']['html']; ?>
</td></tr>
                            <tr style="display:none;" id="pdf_upload_max_size"><td></td><td class = "infoCell"><?php echo @_FILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>

							<tr><td></td><td class = "elementCell">
								<span>
									<a href = "javascript:void(0)" onclick = "toggleAdvancedParameters();"><img class = "handle" id = "advenced_parameter_image" src = "images/16x16/navigate_down.png" alt = "<?php echo @_TOGGLEADVENCEDPARAMETERS; ?>
" title = "<?php echo @_TOGGLEADVENCEDPARAMETERS; ?>
"/>&nbsp;<?php echo @_TOGGLEADVENCEDPARAMETERS; ?>
</a>
								</span>
							</td></tr>

							<?php if (! $this->_tpl_vars['T_SCORM']): ?>
								<tr style="display:none;" id = "ctg_type"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['ctg_type']['label']; ?>
:&nbsp;</td>
									<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['ctg_type']['html']; ?>
</td></tr>
								<?php if ($this->_tpl_vars['T_ENTITY_FORM']['ctg_type']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['ctg_type']['error']; ?>
</td></tr><?php endif; ?>
							<?php endif; ?>
							<tr style="display:none;" id = "maximize_viewport"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['maximize_viewport']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['maximize_viewport']['html']; ?>
</td></tr>
							<tr style="display:none;" id = "object_ids"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['object_ids']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['object_ids']['html']; ?>
&nbsp;<span class = "infoCell"><?php echo @_COMMASEPARATEDLIST; ?>
</span></td></tr>
							<tr style="display:none;" id = "indexed"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['indexed']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['indexed']['html']; ?>
&nbsp;</td></tr>
							<tr style="display:none;" id = "accessible_explanation"><td></td><td class = "infoCell"><?php echo @_DIRECTLACCESSIBLEEXPLANATION; ?>
<br/><?php echo @G_SERVERNAME; ?>
view_resource.php?type=content&id=<?php if ($_GET['edit']): ?><?php echo $_GET['edit']; ?>
<?php else: ?>&lt;unit_id&gt;<?php endif; ?></td></tr>

						<?php if ($this->_tpl_vars['T_SCORM']): ?>
							<tr style="display:none;" id = "scorm_asynchronous"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_asynchronous']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_asynchronous']['html']; ?>
</td></tr>
							<tr style="display:none;" id = "scorm_asynchronous_explanation"><td></td><td class = "infoCell"><?php echo @_SCORMASYNCHRONOUSEXPLANATION; ?>
</td></tr>
							<tr tyle="display:none;" id = "no_before_unload"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['no_before_unload']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['no_before_unload']['html']; ?>
</td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_size']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_size']['html']; ?>
 px</td></tr>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['scorm_size']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_size']['error']; ?>
</td></tr><?php endif; ?>
							<tr><td></td><td class = "infoCell"><?php echo @_EXPLICITSIZEEXPLANATION; ?>
</td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['reentry_action']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['reentry_action']['html']; ?>
</td></tr>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['reentry_action']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['reentry_action']['error']; ?>
</td></tr><?php endif; ?>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['embed_type']): ?>
								<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['embed_type']['label']; ?>
:
									<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['embed_type']['html']; ?>
</td></tr>
								<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['popup_parameters']['label']; ?>
:
									<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['popup_parameters']['html']; ?>
</td></tr>
							<?php endif; ?>
							<tr id = "nonPdfTable" width="100%"><td width="100%" colspan = "2" class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['data']['html']; ?>
</td></tr>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['data']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['data']['error']; ?>
</td></tr><?php endif; ?>
						<?php else: ?>
							<tr id = "toggleTools"><td colspan = "2" id = "toggleeditor_cell1">
								<div class = "headerTools">
									<span>
										<img onclick = "toggleFileManager(Element.extend(this).next());" class = "ajaxHandle" id = "arrow_down" src = "images/16x16/navigate_down.png" alt = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
" title = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
"/>&nbsp;
										<a href = "javascript:void(0)" onclick = "toggleFileManager(this);"><?php echo @_TOGGLEFILEMANAGER; ?>
</a>
									</span>
									<span>
										<img src = "images/16x16/order.png" onclick = "toggledInstanceEditor = 'editor_content_data'; javascript:toggleEditor('editor_content_data','mceEditor');" class = "ajaxHandle" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
										<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'editor_content_data';javascript:toggleEditor('editor_content_data','mceEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
									</span>
								</div>
								</td></tr>
							<tr><td colspan = "2" id = "filemanager_cell"></td></tr>
							<tr id = "nonPdfTable" width="100%"><td width="100%" colspan = "2" class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['data']['html']; ?>
</td></tr>
							<?php if ($this->_tpl_vars['T_ENTITY_FORM']['data']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['data']['error']; ?>
</td></tr><?php endif; ?>
						<?php endif; ?>
							<tr><td colspan = "2" class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_insert_content']['html']; ?>
</td></tr>
						</table>
					</form>
					<script>var editPdfContent = <?php if ($this->_tpl_vars['T_EDITPDFCONTENT']): ?>true<?php else: ?>false<?php endif; ?>;</script>
					<div id = "fmInitial"><div id = "filemanager_div" style = "display:none;"><?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>
</div></div>
				<?php $this->_smarty_vars['capture']['t_insert_content_code'] = ob_get_contents(); ob_end_clean(); ?>
				<?php echo smarty_function_eF_template_printBlock(array('title' => @_UNITPROPERTIES,'data' => $this->_smarty_vars['capture']['t_insert_content_code'],'image' => '32x32/edit.png','help' => 'Content'), $this);?>

			</td></tr>
		<?php $this->_smarty_vars['capture']['moduleInsertContent'] = ob_get_contents(); ob_end_clean(); ?>
	<?php elseif ($_GET['apply_all']): ?>
		<?php ob_start(); ?>
					<?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

					<form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
						<?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

						<fieldset class = "fieldsetSeparator">
						<legend><?php echo @_UNITPROPERTIES; ?>
</legend>
						<table class = "formElements" width="100%">
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['ctg_type']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['ctg_type']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['hide_navigation']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['hide_navigation']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_unit_setting']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_unit_setting']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr <?php if ($this->_tpl_vars['T_EDITED_UNIT']['options']['complete_unit_setting'] != 3): ?>style = "display:none"<?php endif; ?> id = "complete_time_row"><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_time']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['complete_time']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['maximize_viewport']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['maximize_viewport']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['object_ids']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['object_ids']['html']; ?>
&nbsp;<img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['no_before_unload']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['no_before_unload']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['indexed']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['indexed']['html']; ?>
&nbsp;<img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this)"/></td></tr>
						</table>
						</fieldset>
						<fieldset class = "fieldsetSeparator">
						<legend><?php echo @_SCORMSPECIFICPROPERTIES; ?>
</legend>
						<table class = "formElements" width="100%">
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_asynchronous']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_asynchronous']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this, true)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_size']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['scorm_size']['html']; ?>
 px <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this, true)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['reentry_action']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['reentry_action']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this, true)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['embed_type']['label']; ?>
:
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['embed_type']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this, true)"/></td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['popup_parameters']['label']; ?>
:
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['popup_parameters']['html']; ?>
 <img src = "images/16x16/success.png" alt = "<?php echo @_SUBMIT; ?>
" title = "<?php echo @_SUBMIT; ?>
" class = "ajaxHandle" onclick = "setAllUnitsProperties(this, true)"/></td></tr>
						</table>
						</fieldset>
					</form>
								
		<?php $this->_smarty_vars['capture']['t_all_units_properties_code'] = ob_get_contents(); ob_end_clean(); ?>	
		<?php ob_start(); ?>
			<tr><td class = "moduleCell">
			<?php echo smarty_function_eF_template_printBlock(array('title' => @_ALLUNITSPROPERTIES,'data' => $this->_smarty_vars['capture']['t_all_units_properties_code'],'image' => '32x32/edit.png'), $this);?>

			</td></tr>
		<?php $this->_smarty_vars['capture']['moduleInsertContent'] = ob_get_contents(); ob_end_clean(); ?>	
	<?php elseif (! $this->_tpl_vars['T_UNIT'] && $this->_tpl_vars['_student_']): ?>
		<?php if ($_GET['type'] == 'theory'): ?>
			<?php $this->assign('specific_title', @_THEORY); ?>
			<?php $this->assign('image', "32x32/theory.png"); ?>
		<?php elseif ($_GET['type'] == 'examples'): ?>
			<?php $this->assign('specific_title', @_EXAMPLES); ?>
			<?php $this->assign('image', "32x32/examples.png"); ?>
		<?php elseif ($_GET['type'] == 'tests'): ?>
			<?php $this->assign('specific_title', @_TESTS); ?>
			<?php $this->assign('image', "32x32/tests.png"); ?>
		<?php else: ?>
			<?php $this->assign('specific_title', @_CONTENT); ?>
			<?php $this->assign('image', "32x32/content.png"); ?>
		<?php endif; ?>
				<?php ob_start(); ?>
			<tr><td class = "moduleCell">
				<?php ob_start(); ?>
					<?php echo $this->_tpl_vars['T_THEORY_TREE']; ?>

				<?php $this->_smarty_vars['capture']['t_theory_tree_code'] = ob_get_contents(); ob_end_clean(); ?>
				<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['specific_title'],'data' => $this->_smarty_vars['capture']['t_theory_tree_code'],'image' => $this->_tpl_vars['image']), $this);?>

			</td></tr>
		<?php $this->_smarty_vars['capture']['moduleSpecificContent'] = ob_get_contents(); ob_end_clean(); ?>
	<?php elseif ($_GET['bare']): ?>
		<?php if (! $this->_tpl_vars['T_SCORM'] && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'tests' && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>
		<span style = "display:none" id = "user_total_time_in_unit"></span>		
				
		<span style = "display:none" id = "required_time_in_unit"><?php echo $this->_tpl_vars['T_REQUIRED_TIME_IN_UNIT']; ?>
</span>					
		<span style = "display:none" id = "user_time_in_lesson"></span>
		<span style = "display:none" id = "required_time_in_lesson"><?php echo $this->_tpl_vars['T_REQUIRED_TIME_IN_LESSON']; ?>
</span>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['T_SCORM']): ?>
			<?php echo $this->_smarty_vars['capture']['t_scorm_form_code']; ?>

		<?php endif; ?>
		<?php echo $this->_tpl_vars['T_UNIT']['data']; ?>

	<?php else: ?>
		<?php if (! $this->_tpl_vars['T_SCORM'] && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'tests' && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>
		<span style = "display:none" id = "user_total_time_in_unit"></span>		
				
		<span style = "display:none" id = "required_time_in_unit"><?php echo $this->_tpl_vars['T_REQUIRED_TIME_IN_UNIT']; ?>
</span>					
		<span style = "display:none" id = "user_time_in_lesson"></span>
		<span style = "display:none" id = "required_time_in_lesson"><?php echo $this->_tpl_vars['T_REQUIRED_TIME_IN_LESSON']; ?>
</span>
				
		<?php endif; ?>
		<?php ob_start(); ?>
							<table class = "navigationTable">
								<tr>
									<td class = "previousUnitHandleIcon">
				<?php if (( $this->_tpl_vars['T_UNIT']['data'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback' ) && ! $this->_tpl_vars['T_TEST_UNDERGOING'] && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 1 && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 3): ?>
					<?php if ($this->_tpl_vars['T_PREVIOUS_UNIT']): ?>
						<?php $this->assign('show_content_footer', 1); ?>
										<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['id']; ?>
" title = "<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['name']; ?>
">
											<img class = "handle" src = "images/32x32/<?php echo $this->_tpl_vars['T_ARROW_PREVIOUS']; ?>
.png"  title = "<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['name']; ?>
" alt = "<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['name']; ?>
" />
										</a>
					<?php endif; ?>
				<?php endif; ?>
									</td>
									<td class = "previousUnitHandle">
				<?php if (( $this->_tpl_vars['T_UNIT']['data'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback' ) && ! $this->_tpl_vars['T_TEST_UNDERGOING'] && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 1 && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 3): ?>
					<?php if ($this->_tpl_vars['T_PREVIOUS_UNIT']): ?>
						<?php $this->assign('show_content_footer', 1); ?>
										<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['id']; ?>
" title = "<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['name']; ?>
">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['T_PREVIOUS_UNIT']['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>

										</a>
					<?php endif; ?>
				<?php endif; ?>
									</td>
									<td class = "completeUnitHandle">
					<?php if ($this->_tpl_vars['T_UNIT']['options']['complete_unit_setting'] == 0 && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'tests' && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback' && ! $this->_tpl_vars['_professor_']): ?><?php $this->assign('hideStyle', ''); ?><?php $this->assign('show_content_footer', 1); ?><?php else: ?><?php $this->assign('hideStyle', 'style = "visibility:hidden"'); ?><?php endif; ?>
					<?php if ($this->_tpl_vars['T_QUESTION']): ?>
						<?php $this->assign('show_content_footer', 1); ?>
										<div class = "unitQuestionArea">
											<form id = "question_form" method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $_GET['view_unit']; ?>
"><?php echo $this->_tpl_vars['T_QUESTION']; ?>
</form>
											<span id = "contentQuestionAnswer">
												<input class = "flatButton" type = "button" value = "<?php echo @_SUBMIT; ?>
" onclick = "answerQuestion(this)">
												<img class = "ajaxHandle" style = "display:none" id = "correct_answer" src = "images/32x32/success.png" alt = "<?php echo @_CORRECTANSWER; ?>
" title = "<?php echo @_CORRECTANSWER; ?>
">
												<img class = "ajaxHandle" style = "display:none" id = "wrong_answer" src = "images/32x32/error_delete.png" alt = "<?php echo @_WRONGANSWER; ?>
" title = "<?php echo @_WRONGANSWER; ?>
">
											</span>
										</div>
					<?php elseif ($this->_tpl_vars['_change_'] && $this->_tpl_vars['_student_']): ?>
										<a <?php if (! $this->_tpl_vars['hideStyle']): ?>id = "seenLink"<?php endif; ?> href = "javascript:void(0)" onclick = "setSeenUnit();" <?php echo $this->_tpl_vars['hideStyle']; ?>
>
											 <?php if ($this->_tpl_vars['T_SEEN_UNIT']): ?>
												 <img class = "handle" src = "images/32x32/unit_completed.png" title = "<?php echo @_NOTSAWUNIT; ?>
" alt = "<?php echo @_NOTSAWUNIT; ?>
" />
												 <div><?php echo @_NOTSAWUNIT; ?>
</div>
											 <?php else: ?>
												 <img class = "handle" src = "images/32x32/unit.png"	title = "<?php echo @_SAWUNIT; ?>
" alt = "<?php echo @_SAWUNIT; ?>
" />
												 <div><?php echo @_SAWUNIT; ?>
</div>
											 <?php endif; ?>
										</a>
					<?php endif; ?>
									</td>
									<td class = "nextUnitHandle">
				<?php if (( $this->_tpl_vars['T_UNIT']['data'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback' ) && ! $this->_tpl_vars['T_TEST_UNDERGOING'] && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 1 && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 3): ?>
					<?php if ($this->_tpl_vars['T_NEXT_UNIT']): ?>
						<?php $this->assign('show_content_footer', 1); ?>
										<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $this->_tpl_vars['T_NEXT_UNIT']['id']; ?>
" title = "<?php echo $this->_tpl_vars['T_NEXT_UNIT']['name']; ?>
">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['T_NEXT_UNIT']['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>

										</a>
					<?php endif; ?>
				<?php endif; ?>
									</td>
									<td class = "nextUnitHandleIcon">
				<?php if (( $this->_tpl_vars['T_UNIT']['data'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback' ) && ! $this->_tpl_vars['T_TEST_UNDERGOING'] && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 1 && $this->_tpl_vars['T_UNIT']['options']['hide_navigation'] != 3): ?>
					<?php if ($this->_tpl_vars['T_NEXT_UNIT']): ?>
						<?php $this->assign('show_content_footer', 1); ?>
										<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $this->_tpl_vars['T_NEXT_UNIT']['id']; ?>
" title = "<?php echo $this->_tpl_vars['T_NEXT_UNIT']['name']; ?>
">
											<img class = "handle" src = "images/32x32/<?php echo $this->_tpl_vars['T_ARROW_NEXT']; ?>
.png"  title = "<?php echo $this->_tpl_vars['T_NEXT_UNIT']['name']; ?>
" alt = "<?php echo $this->_tpl_vars['T_NEXT_UNIT']['name']; ?>
" />
										</a>
					<?php endif; ?>
				<?php endif; ?>
									</td>
							</table>		
		<?php $this->_smarty_vars['capture']['t_content_footer_code'] = ob_get_contents(); ob_end_clean(); ?>
		
		<?php ob_start(); ?>
								<script>var sawunit  = '<?php echo @_SAWUNIT; ?>
';var notsawunit = '<?php echo @_NOTSAWUNIT; ?>
';var unitId   = '<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
';
						var unitType = '<?php echo $this->_tpl_vars['T_UNIT']['ctg_type']; ?>
';var hasSeen = '<?php echo $this->_tpl_vars['T_SEEN_UNIT']; ?>
';var nextId = '<?php echo $this->_tpl_vars['T_NEXT_UNIT']['id']; ?>
';var previousId = '<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['id']; ?>
';</script>
				<?php if ($this->_tpl_vars['T_UNIT']['options']['object_ids']): ?>
						<script>var matchscreenobjectid= '<?php echo $this->_tpl_vars['T_UNIT']['options']['object_ids']; ?>
';</script>
				<?php endif; ?>

				<?php if ($this->_tpl_vars['_change_'] && ! $this->_tpl_vars['_student_']): ?>
					<div class = "headerTools">
						<span>
							<img src = "images/16x16/add.png" title = "<?php echo @_CREATEUNIT; ?>
" alt = "<?php echo @_CREATEUNIT; ?>
"/>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&add=1" title = "<?php echo @_CREATEUNIT; ?>
"><?php echo @_CREATEUNIT; ?>
</a>
						</span>
					<?php if ($this->_tpl_vars['T_UNIT']): ?>
						<?php if (! $this->_tpl_vars['T_SCORM']): ?>
						<span>
							<img src = "images/16x16/add.png" title = "<?php echo @_CREATESUBUNIT; ?>
" alt = "<?php echo @_CREATESUBUNIT; ?>
"/>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&add=1&view_unit=<?php if ($_GET['view_unit'] != ""): ?><?php echo $_GET['view_unit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['T_CURRENTUNITID']; ?>
<?php endif; ?>" title = "<?php echo @_CREATESUBUNIT; ?>
"><?php echo @_CREATESUBUNIT; ?>
</a>
						</span>
						<?php endif; ?>
						<?php if (! $this->_tpl_vars['T_SCORM_2004_TITLE'] && ! $this->_tpl_vars['T_UNIT']['linked_to']): ?>
						<span>
							<img src = "images/16x16/edit.png" title = "<?php echo @_UPDATEUNIT; ?>
" alt = "<?php echo @_UPDATEUNIT; ?>
"/>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests'): ?>tests<?php elseif ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?>feedback<?php else: ?>content<?php endif; ?>&edit=<?php if ($_GET['view_unit'] != ""): ?><?php echo $_GET['view_unit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['T_CURRENTUNITID']; ?>
<?php endif; ?>" title = "<?php echo @_UPDATEUNIT; ?>
"><?php echo @_UPDATEUNIT; ?>
</a>
						</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests'): ?>
						<span>
							<img src = "images/16x16/search.png" title = "<?php echo @_VIEWALL; ?>
" alt = "<?php echo @_VIEWALL; ?>
"/>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $_GET['view_unit']; ?>
&show_all=1" title = "<?php echo @_VIEWALL; ?>
"><?php echo @_VIEWALL; ?>
</a>
						</span>
						<span>
							<img src = "images/16x16/success.png" title = "<?php echo @_SHOWRIGHTANSWERS; ?>
" alt = "<?php echo @_SHOWRIGHTANSWERS; ?>
"/>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?view_unit=<?php echo $_GET['view_unit']; ?>
&show_all=1&preview_correct=1" title = "<?php echo @_SHOWRIGHTANSWERS; ?>
"><?php echo @_SHOWRIGHTANSWERS; ?>
</a>
						</span>
						<?php endif; ?>
					<?php endif; ?>
					</div>
				<?php endif; ?>
					<table id = "unitContent">
			<?php if (! $this->_tpl_vars['_student_'] || ! $this->_tpl_vars['T_RULE_CHECK_FAILED']): ?>
						<tr><td class = "unitContent">
								<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/tests/show_unsolved_test.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								<?php else: ?>
									<?php if ($this->_tpl_vars['T_UNIT']['data']): ?>
										<?php echo $this->_tpl_vars['T_UNIT']['data']; ?>

									<?php elseif ($this->_tpl_vars['T_NO_START']): ?>
										<?php echo @_CHOOSEUNIT; ?>
: <?php echo $this->_tpl_vars['T_SUBTREE']; ?>

									<?php else: ?>
										<div class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</div>
									<?php endif; ?>
								<?php endif; ?>
							</td></tr>
						<?php if ($this->_tpl_vars['show_content_footer']): ?>
						<tr><td>
							<?php echo $this->_smarty_vars['capture']['t_content_footer_code']; ?>

						</td></tr>
						<?php endif; ?>
			<?php endif; ?>
			<?php if (((is_array($_tmp='comments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp)) && $this->_tpl_vars['T_COMMENTS']): ?>
				<?php unset($this->_sections['comments_list']);
$this->_sections['comments_list']['name'] = 'comments_list';
$this->_sections['comments_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_COMMENTS']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['comments_list']['show'] = true;
$this->_sections['comments_list']['max'] = $this->_sections['comments_list']['loop'];
$this->_sections['comments_list']['step'] = 1;
$this->_sections['comments_list']['start'] = $this->_sections['comments_list']['step'] > 0 ? 0 : $this->_sections['comments_list']['loop']-1;
if ($this->_sections['comments_list']['show']) {
    $this->_sections['comments_list']['total'] = $this->_sections['comments_list']['loop'];
    if ($this->_sections['comments_list']['total'] == 0)
        $this->_sections['comments_list']['show'] = false;
} else
    $this->_sections['comments_list']['total'] = 0;
if ($this->_sections['comments_list']['show']):

            for ($this->_sections['comments_list']['index'] = $this->_sections['comments_list']['start'], $this->_sections['comments_list']['iteration'] = 1;
                 $this->_sections['comments_list']['iteration'] <= $this->_sections['comments_list']['total'];
                 $this->_sections['comments_list']['index'] += $this->_sections['comments_list']['step'], $this->_sections['comments_list']['iteration']++):
$this->_sections['comments_list']['rownum'] = $this->_sections['comments_list']['iteration'];
$this->_sections['comments_list']['index_prev'] = $this->_sections['comments_list']['index'] - $this->_sections['comments_list']['step'];
$this->_sections['comments_list']['index_next'] = $this->_sections['comments_list']['index'] + $this->_sections['comments_list']['step'];
$this->_sections['comments_list']['first']      = ($this->_sections['comments_list']['iteration'] == 1);
$this->_sections['comments_list']['last']       = ($this->_sections['comments_list']['iteration'] == $this->_sections['comments_list']['total']);
?>
						<tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
							<td>
								<div style = "float:right">
								<?php if ($this->_tpl_vars['T_COMMENTS'][$this->_sections['comments_list']['index']]['users_LOGIN'] == $this->_tpl_vars['T_CURRENT_USER']->user['login']): ?>
									<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=comments&view_unit=<?php echo $_GET['view_unit']; ?>
&edit=<?php echo $this->_tpl_vars['T_COMMENTS'][$this->_sections['comments_list']['index']]['id']; ?>
&popup=1", onclick = "eF_js_showDivPopup(event, '<?php echo @_EDITCOMMENT; ?>
', 1)" target = "POPUP_FRAME"><img class = "handle" src = "images/16x16/edit.png" alt = "<?php echo @_CORRECTION; ?>
" title = "<?php echo @_CORRECTION; ?>
"/></a>&nbsp;
								<?php endif; ?>
								<?php if ($this->_tpl_vars['T_COMMENTS'][$this->_sections['comments_list']['index']]['users_LOGIN'] == $this->_tpl_vars['T_CURRENT_USER']->user['login'] || $this->_tpl_vars['_professor_']): ?>
									<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm ('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteComment(this, '<?php echo $this->_tpl_vars['T_COMMENTS'][$this->_sections['comments_list']['index']]['id']; ?>
')"/>
								<?php endif; ?>
								</div>
								#filter:login-<?php echo $this->_tpl_vars['T_COMMENTS'][$this->_sections['comments_list']['index']]['users_LOGIN']; ?>
#: <?php echo $this->_tpl_vars['T_COMMENTS'][$this->_sections['comments_list']['index']]['data']; ?>

						</td></tr>
				<?php endfor; endif; ?>
										<?php endif; ?>
					</table>
		<?php $this->_smarty_vars['capture']['t_content_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['T_CURRENT_LESSON']->options['tracking'] && $this->_tpl_vars['_change_'] && $this->_tpl_vars['_student_']): ?>
				<div id = "progress_bar">
				<?php echo @_PROGRESS; ?>
:&nbsp;
				<span style = "position:relative">
					<span class = "progressNumber"><?php echo $this->_tpl_vars['T_USER_PROGRESS']['overall_progress']; ?>
%</span>
					<span class = "progressBar" style = "width:<?php echo ((is_array($_tmp=",")) ? $this->_run_mod_handler('str_replace', true, $_tmp, ".", $this->_tpl_vars['T_USER_PROGRESS']['overall_progress']) : str_replace($_tmp, ".", $this->_tpl_vars['T_USER_PROGRESS']['overall_progress'])); ?>
px;">&nbsp;</span>&nbsp;
				</span>
				<?php if ($this->_tpl_vars['T_USER_PROGRESS']['total_conditions'] > 0 && $this->_tpl_vars['T_CURRENT_LESSON']->options['lesson_info']): ?>
					<a id = "lesson_passed" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lesson_information&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_LESSONINFORMATION; ?>
', 2)" target = "POPUP_FRAME">
						<span class = "<?php if ($this->_tpl_vars['T_USER_PROGRESS']['lesson_passed']): ?>success<?php else: ?>failure<?php endif; ?>"><?php echo @_CONDITIONSCOMPLETED; ?>
: <span id = "passed_conditions"><?php echo $this->_tpl_vars['T_USER_PROGRESS']['conditions_passed']; ?>
</span> <?php echo @_OUTOF; ?>
 <?php echo $this->_tpl_vars['T_USER_PROGRESS']['total_conditions']; ?>
</span>
					</a>
				<?php endif; ?>
				</div>
				<?php if ($this->_tpl_vars['T_SCORM'] && $this->_tpl_vars['T_NOCREDIT']): ?>
					<div><script>var nocredit = false</script><?php echo @_YOUAREREVISITINGCHANGESNOTTAKENINTOACCOUNT; ?>
</div>
				<?php endif; ?>
				<div <?php if (! $this->_tpl_vars['T_CURRENT_LESSON']->options['timers'] || $this->_tpl_vars['T_SCORM'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?>style = "display:none"<?php endif; ?>><?php echo @_TOTALTIMESPENTONTHISUNIT; ?>
:&nbsp;<span id = "user_time_in_unit_display"></span></div>
				<div <?php if (! $this->_tpl_vars['T_CURRENT_LESSON']->options['timers'] || $this->_tpl_vars['T_SCORM'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?>style = "display:none"<?php endif; ?>><?php echo @_TOTALTIMESPENTONTHISLESSON; ?>
:&nbsp;<span id = "user_time_in_lesson_display"></span></div>
				<script>
				<?php if (! $this->_tpl_vars['T_CURRENT_LESSON']->options['timers'] || $this->_tpl_vars['T_SCORM'] || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?>var timers = false<?php else: ?>var timers=true<?php endif; ?> 
				//var seconds = <?php echo $this->_tpl_vars['T_USER_TIME_IN_UNIT']['seconds']; ?>
;
				//var minutes = <?php echo $this->_tpl_vars['T_USER_TIME_IN_UNIT']['minutes']; ?>
;
				//var hours   = <?php echo $this->_tpl_vars['T_USER_TIME_IN_UNIT']['hours']; ?>
;
				//var lesson_seconds = <?php echo $this->_tpl_vars['T_USER_TIME_IN_LESSON']['seconds']; ?>
;
				//var lesson_minutes = <?php echo $this->_tpl_vars['T_USER_TIME_IN_LESSON']['minutes']; ?>
;
				//var lesson_hours   = <?php echo $this->_tpl_vars['T_USER_TIME_IN_LESSON']['hours']; ?>
;
				<?php if (! $this->_tpl_vars['T_RULE_CHECK_FAILED']): ?>
					<?php if ($this->_tpl_vars['T_CONTAINS_FLASH']): ?>
					var start_timer = 'flash';
					<?php elseif ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests'): ?>
					var start_timer = false;
					<?php else: ?>
					var start_timer = true;
					<?php endif; ?>
				<?php endif; ?>
				</script>
			<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_progress_bar'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
			<?php if (( $this->_tpl_vars['T_CURRENT_LESSON']->options['print_content'] || $this->_tpl_vars['_professor_'] ) && ! $this->_tpl_vars['T_SCORM']): ?>
				<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] != 'tests'): ?>
					<div><?php echo smarty_function_counter(array('name' => 'unit_operations'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&view_unit=<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
&popup=1&print=1", onclick = "eF_js_showDivPopup(event, '<?php echo @_PRINTERFRIENDLY; ?>
', 2)" target = "POPUP_FRAME"><?php echo @_PRINTERFRIENDLY; ?>
</a></div>
				<?php else: ?>
					<div><?php echo smarty_function_counter(array('name' => 'unit_operations'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_test=<?php echo $this->_tpl_vars['T_UNIT_TEST_ID']; ?>
&popup=1&print=1<?php if ($_GET['show_all']): ?>&show_all=1<?php endif; ?><?php if ($_GET['preview_correct']): ?>&preview_correct=1<?php endif; ?>", onclick = "eF_js_showDivPopup(event, '<?php echo @_PRINTERFRIENDLY; ?>
', 2)" target = "POPUP_FRAME"><?php echo @_PRINTERFRIENDLY; ?>
</a></div>
				<?php endif; ?>
			<?php endif; ?>
			<?php if (((is_array($_tmp='comments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp)) && $this->_tpl_vars['_change_'] && ! $this->_tpl_vars['T_RULE_CHECK_FAILED']): ?>
				<div><?php echo smarty_function_counter(array('name' => 'unit_operations'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=comments&view_unit=<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
&add=1&popup=1", onclick = "eF_js_showDivPopup(event, '<?php echo @_ADDCOMMENT; ?>
', 1)" target = "POPUP_FRAME"><?php echo @_ADDCOMMENT; ?>
</a></div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['_student_'] && $this->_tpl_vars['T_CURRENT_LESSON']->options['content_report']): ?>
				<div><?php echo smarty_function_counter(array('name' => 'unit_operations'), $this);?>
. <a href = "content_report.php?<?php echo $_SERVER['QUERY_STRING']; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_CONTENTREPORT; ?>
', 1)" target = "POPUP_FRAME"><?php echo @_CONTENTREPORTTOPROFS; ?>
</a></div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['T_LESSON_FORUM']): ?>
				<div><?php echo smarty_function_counter(array('name' => 'unit_operations'), $this);?>
. <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&add=1&type=topic&forum_id=<?php echo $this->_tpl_vars['T_LESSON_FORUM']; ?>
&subject=<?php echo $this->_tpl_vars['T_UNIT']['name']; ?>
", onclick = "eF_js_showDivPopup(event, '<?php echo @_ADDFORUMPOSTONTHISUNIT; ?>
', 2)" target = "POPUP_FRAME" title="<?php echo @_ADDFORUMPOSTONTHISUNIT; ?>
"><?php echo ((is_array($_tmp=@_ADDFORUMPOSTONTHISUNIT)) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 25, "...", true) : smarty_modifier_eF_truncate($_tmp, 25, "...", true)); ?>
</a></div>
			<?php endif; ?>
			<?php if (! $this->_tpl_vars['T_SCORM']): ?>
			<div><?php echo smarty_function_counter(array('name' => 'unit_operations'), $this);?>
. <a href = "javascript:void(0)", onclick = "window.open('<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&view_unit=<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
&popup=1','unit_popup','width=900,height=600,scrollbars=yes,resizable=yes,status=yes,toolbar=no,location=no,menubar=no')"><?php echo @_OPENUNITINPOPUP; ?>
</a></div>
			<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_unit_operations'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <a title = "<?php echo @_UPLOADFILESANDIMAGES; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=file_manager&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_UPLOADFILESANDIMAGES; ?>
', 3)" target = "POPUP_FRAME"><?php echo ((is_array($_tmp=@_UPLOADFILESANDIMAGES)) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</a></div>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <a title = "<?php echo @_COPYFROMANOTHERLESSON; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=copy"><?php echo ((is_array($_tmp=@_COPYFROMANOTHERLESSON)) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</a></div>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <a title = "<?php echo @_CONTENTTREEMANAGEMENT; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=order"><?php echo ((is_array($_tmp=@_CONTENTTREEMANAGEMENT)) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</a></div>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <a title = "<?php echo @_SCORMIMPORT; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=scorm&scorm_import=1"><?php echo @_SCORMIMPORT; ?>
</a></div>
			<?php if ($this->_tpl_vars['T_UNIT']): ?>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <a title = "<?php echo @_CONTENTMETADATA; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=metadata&unit=<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
"><?php echo ((is_array($_tmp=@_CONTENTMETADATA)) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</a></div>
			<?php endif; ?>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <a title = "<?php echo @_APPLYFUNCTIONTOALLUNITS; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&apply_all=1"><?php echo ((is_array($_tmp=@_APPLYFUNCTIONTOALLUNITS)) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</a></div>
			<?php $_from = $this->_tpl_vars['T_MODULE_TOOLS_LINKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['t_modules_tools_links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t_modules_tools_links']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['t_modules_tools_links']['iteration']++;
?>
			<div><?php echo smarty_function_counter(array('name' => 'content_tools'), $this);?>
. <?php echo $this->_tpl_vars['item']; ?>
</div>
			<?php endforeach; endif; unset($_from); ?>
		<?php $this->_smarty_vars['capture']['t_content_tools'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
			<div>
				<p class = "smallHeader"><?php echo @_FINISHLESSONMESSAGE; ?>
</p>
				<p class = "smallHeader">
					<span id = "show_certificate_block" <?php if (! $this->_tpl_vars['T_CERTIFICATE_DOWNLOAD']): ?> style = "display:none" <?php endif; ?>>
						<input type = "button" class =  "flatButton" value = "<?php echo @_VIEWCOURSECERTIFICATE; ?>
" onclick = "location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&export=<?php echo $this->_tpl_vars['T_CERTIFICATE_EXPORT_METHOD']; ?>
&user=<?php echo $_SESSION['s_login']; ?>
&course=<?php echo $_SESSION['s_courses_ID']; ?>
'">
					</span>
					<?php if ($this->_tpl_vars['T_NEXTLESSON'] != false): ?>
						<input type = "button" class =  "flatButton" value = "<?php echo @_NEXTLESSON; ?>
" onclick = "nextLesson(this)">
	            	<?php endif; ?>
				<?php if (! isset ( $this->_tpl_vars['T_CURRENT_LESSON']->options['show_dashboard'] ) || $this->_tpl_vars['T_CURRENT_LESSON']->options['show_dashboard']): ?>
					<input type = "button" class =  "flatButton" value = "<?php echo @_CONTROLPANEL; ?>
" onclick = "location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=control_panel'">
				<?php endif; ?>
					<input type = "button" class =  "flatButton" value = "<?php echo @_MYCOURSES; ?>
" onclick = "location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons'">			
				</p>
				<p class = "smallHeader"><a href = "javascript:void(0)" onclick = "setCookie('hide_complete_lesson_<?php echo $this->_tpl_vars['T_CURRENT_LESSON']->lesson['id']; ?>
', true);new Effect.Fade($('completed_block').down());" class = "infoCell"><?php echo @_HIDE; ?>
</a></p>
			</div>
		<?php $this->_smarty_vars['capture']['t_end_of_lesson_code'] = ob_get_contents(); ob_end_clean(); ?>

				<?php ob_start(); ?>
			<tr><td class = "moduleCell" style = "height:100%">
			
			<?php if ($this->_tpl_vars['T_AUTO_SET_SEEN_UNIT'] && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'scorm' && $this->_tpl_vars['T_UNIT']['ctg_type'] != 'scorm_test'): ?><script>autoSetSeenUnit = 1;</script><?php endif; ?>
			<?php if ($this->_tpl_vars['T_UNIT']['options']['previous']): ?><?php $this->assign('T_PREVIOUS_UNIT', ""); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['T_UNIT']['options']['continue']): ?><?php $this->assign('T_NEXT_UNIT', ""); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['T_UNIT']['name']): ?><?php $this->assign('unit_name', $this->_tpl_vars['T_UNIT']['name']); ?><?php else: ?><?php $this->assign('unit_name', @_NOCONTENT); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests'): ?><?php $this->assign('image', "32x32/tests.png"); ?><?php elseif ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?><?php $this->assign('image', "32x32/feedback.png"); ?><?php elseif ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'examples'): ?><?php $this->assign('image', "32x32/examples.png"); ?><?php else: ?><?php $this->assign('image', "32x32/theory.png"); ?><?php endif; ?>
			<?php if (! $this->_tpl_vars['T_TEST_UNDERGOING']): ?><?php $this->assign('unit_options', $this->_tpl_vars['T_UNIT_OPTIONS']); ?><?php else: ?><?php $this->assign('unit_options', ""); ?><?php endif; ?>
			<script>
				var nextUnit = '<?php echo $this->_tpl_vars['T_NEXT_UNIT']['id']; ?>
';var previousUnit = '<?php echo $this->_tpl_vars['T_PREVIOUS_UNIT']['id']; ?>
';<?php if ($this->_tpl_vars['T_UNIT']['options']['no_before_unload']): ?>var noBeforeUnload = true;<?php else: ?>var noBeforeUnload = false;<?php endif; ?>
				translations['_YOUAREATTHELASTLESSONYOUMAYVISIT'] = '<?php echo @_YOUAREATTHELASTLESSONYOUMAYVISIT; ?>
';
				var _information_json = '<?php echo $this->_tpl_vars['T_INFORMATION_JSON']; ?>
';
				</script>			<table class = "contentArea">
				<tr>
					<td id = "centerColumn">
				   	<?php if ($_GET['print']): ?>
				   		<?php if (! $this->_tpl_vars['T_DISABLEPRINTUNIT']): ?>
				   		<p style = "text-align:center"><input id = "print_button" class = "flatButton" type = "submit" onClick = "$('print_button').hide();window.print()" value = "<?php echo @_PRINTIT; ?>
"/></p>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] == 'tests' || $this->_tpl_vars['T_UNIT']['ctg_type'] == 'feedback'): ?>
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/tests/show_unsolved_test.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<?php else: ?>
						<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['T_UNIT']['name'],'data' => $this->_tpl_vars['T_UNIT']['data'],'image' => '32x32/printer.png'), $this);?>

						<?php endif; ?>
				   	<?php else: ?>
				   		<span id = "completed_block" <?php if (! $this->_tpl_vars['T_USER_PROGRESS']['lesson_passed'] && ! $this->_tpl_vars['T_USER_PROGRESS']['completed']): ?>style = "display:none"<?php endif; ?>>
						<?php $this->assign('cookie_value', "hide_complete_lesson_".($this->_tpl_vars['T_CURRENT_LESSON']->lesson['id'])); ?>
						<?php if (! $_COOKIE[$this->_tpl_vars['cookie_value']]): ?>
					   		<?php echo smarty_function_eF_template_printBlock(array('title' => @_LESSONFINISHED,'data' => $this->_smarty_vars['capture']['t_end_of_lesson_code'],'image' => '32x32/information.png'), $this);?>

					   	<?php endif; ?>
					   	</span>
						<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['unit_name'],'data' => $this->_smarty_vars['capture']['t_content_code'],'image' => $this->_tpl_vars['image'],'options' => $this->_tpl_vars['unit_options'],'settings' => $this->_tpl_vars['T_UNIT_SETTINGS']), $this);?>

				   	<?php endif; ?>
					</td>
					</tr>
			</table>
		<?php $this->_smarty_vars['capture']['moduleShowUnit'] = ob_get_contents(); ob_end_clean(); ?>
		<?php ob_start(); ?>
				<tr>
					<td id = "sideColumn">
					<?php if (! $this->_tpl_vars['_student_']): ?>
						<?php echo smarty_function_eF_template_printBlock(array('title' => @_CONTENTTOOLS,'data' => $this->_smarty_vars['capture']['t_content_tools'],'image' => "32x32/tools.png"), $this);?>

					<?php endif; ?>
						<?php echo smarty_function_eF_template_printBlock(array('title' => @_LESSONMATERIAL,'data' => $this->_tpl_vars['T_CONTENT_TREE'],'image' => "32x32/theory.png"), $this);?>

					<?php if ($this->_tpl_vars['_student_'] && ( ! isset ( $this->_tpl_vars['T_CURRENT_LESSON']->options['show_percentage'] ) || $this->_tpl_vars['T_CURRENT_LESSON']->options['show_percentage'] )): ?>
						<?php echo smarty_function_eF_template_printBlock(array('title' => @_LESSONPROGRESS,'data' => $this->_smarty_vars['capture']['t_progress_bar'],'image' => "32x32/status.png"), $this);?>

					<?php endif; ?>
					<?php if (! isset ( $this->_tpl_vars['T_CURRENT_LESSON']->options['show_content_tools'] ) || $this->_tpl_vars['T_CURRENT_LESSON']->options['show_content_tools']): ?>
						<?php echo smarty_function_eF_template_printBlock(array('title' => @_UNITOPERATIONS,'data' => $this->_smarty_vars['capture']['t_unit_operations'],'image' => "32x32/options.png"), $this);?>

												<?php $_from = $this->_tpl_vars['T_CONTENT_SIDE_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_content_side_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_content_side_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['moduleItem']):
        $this->_foreach['module_content_side_list']['iteration']++;
?>
							<?php ob_start(); ?>													<?php $this->assign('module_name', ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))); ?>
								<?php if ($this->_tpl_vars['moduleItem']['smarty_file']): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['moduleItem']['smarty_file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php else: ?><?php echo $this->_tpl_vars['moduleItem']['html_code']; ?>
<?php endif; ?>
							<?php $this->_smarty_vars['capture'][((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('replace', true, $_tmp, '_', "") : smarty_modifier_replace($_tmp, '_', ""))] = ob_get_contents(); ob_end_clean(); ?>
							<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['moduleItem']['title'],'data' => $this->_smarty_vars['capture'][$this->_tpl_vars['module_name']],'id' => ((is_array($_tmp=$this->_tpl_vars['module_name'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_id') : smarty_modifier_cat($_tmp, '_id'))), $this);?>

						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					</td>
				</tr>
		<?php $this->_smarty_vars['capture']['moduleSideOperations'] = ob_get_contents(); ob_end_clean(); ?>

		<script>
			var show_left_bar = <?php if ($this->_tpl_vars['_student_']): ?>'<?php echo $this->_tpl_vars['T_CURRENT_LESSON']->options['show_left_bar']; ?>
'<?php else: ?>1<?php endif; ?>;
		</script>

		<?php if ($this->_tpl_vars['T_SCORM']): ?>
			<?php echo $this->_smarty_vars['capture']['t_scorm_form_code']; ?>

			<?php if ($this->_tpl_vars['T_SCORM_ASYNCHRONOUS']): ?><script>var scorm_asynchronous = true;</script><?php else: ?><script>var scorm_asynchronous = false;</script><?php endif; ?>
		<?php endif; ?>

	<?php endif; ?>