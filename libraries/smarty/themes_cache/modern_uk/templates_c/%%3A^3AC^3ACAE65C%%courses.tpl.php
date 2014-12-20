<?php /* Smarty version 2.6.27, created on 2014-09-15 16:53:29
         compiled from includes/courses.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'eF_template_isOptionVisible', 'includes/courses.tpl', 27, false),array('modifier', 'is_null', 'includes/courses.tpl', 171, false),array('function', 'cycle', 'includes/courses.tpl', 98, false),array('function', 'eF_template_printBlock', 'includes/courses.tpl', 331, false),)), $this); ?>
<?php ob_start(); ?>
	<tr><td class = "moduleCell">

	<?php if ($_GET['course']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/course_settings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php elseif ($_GET['add_course'] || $_GET['edit_course']): ?>
		<?php ob_start(); ?>
			<?php echo $this->_tpl_vars['T_COURSE_FORM']['javascript']; ?>

			<form <?php echo $this->_tpl_vars['T_COURSE_FORM']['attributes']; ?>
>
				<?php echo $this->_tpl_vars['T_COURSE_FORM']['hidden']; ?>

				<table class = "formElements">
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['name']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['name']['html']; ?>
</td></tr>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['directions_ID']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['directions_ID']['html']; ?>
</td></tr>
			<?php if (! $this->_tpl_vars['T_CONFIGURATION']['onelanguage']): ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['languages_NAME']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['languages_NAME']['html']; ?>
</td></tr>
			<?php endif; ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['active']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['active']['html']; ?>
</td></tr>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['show_catalog']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['show_catalog']['html']; ?>
</td></tr>
			<?php if (((is_array($_tmp='payments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['price']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['price']['html']; ?>
 <?php echo $this->_tpl_vars['T_CURRENCYSYMBOLS'][$this->_tpl_vars['T_CONFIGURATION']['currency']]; ?>
</td></tr>
			<?php endif; ?>
			<?php if (( @G_VERSIONTYPE != 'community' )): ?> 			<?php if (((is_array($_tmp='payments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['recurring']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['recurring']['html']; ?>
</td></tr>
					<tr id = "duration_row" <?php if (! $this->_tpl_vars['T_EDIT_COURSE']->options['recurring']): ?>style = "display:none"<?php endif; ?>>
						<td class = "labelCell"><?php echo @_CHARGINGEACH; ?>
:&nbsp;</td>
						<td class = "elementCell">
							<span id = "D_duration" <?php if ($this->_tpl_vars['T_EDIT_COURSE']->options['recurring'] != 'D'): ?>style = "display:none"<?php endif; ?>><?php echo $this->_tpl_vars['T_COURSE_FORM']['D_duration']['html']; ?>
 <?php echo $this->_tpl_vars['T_COURSE_FORM']['D_duration']['label']; ?>
</span>
							<span id = "W_duration" <?php if ($this->_tpl_vars['T_EDIT_COURSE']->options['recurring'] != 'W'): ?>style = "display:none"<?php endif; ?>><?php echo $this->_tpl_vars['T_COURSE_FORM']['W_duration']['html']; ?>
 <?php echo $this->_tpl_vars['T_COURSE_FORM']['W_duration']['label']; ?>
</span>
							<span id = "M_duration" <?php if ($this->_tpl_vars['T_EDIT_COURSE']->options['recurring'] != 'M'): ?>style = "display:none"<?php endif; ?>><?php echo $this->_tpl_vars['T_COURSE_FORM']['M_duration']['html']; ?>
 <?php echo $this->_tpl_vars['T_COURSE_FORM']['M_duration']['label']; ?>
</span>
							<span id = "Y_duration" <?php if ($this->_tpl_vars['T_EDIT_COURSE']->options['recurring'] != 'Y'): ?>style = "display:none"<?php endif; ?>><?php echo $this->_tpl_vars['T_COURSE_FORM']['Y_duration']['html']; ?>
 <?php echo $this->_tpl_vars['T_COURSE_FORM']['Y_duration']['label']; ?>
</span></td></tr>
			<?php endif; ?>
				<?php if (@G_VERSIONTYPE != 'standard'): ?> 					<tr><td colspan = "2">
							<fieldset class = "fieldsetSeparator"><legend><?php echo @_ADVANCEDSETTINGS; ?>
</legend></fieldset>
						</td></tr>
					<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['branches_ID_autoselect']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell">
							<?php echo $this->_tpl_vars['T_COURSE_FORM']['branches_ID_autoselect']['html']; ?>

							<img id = "busy" src = "images/16x16/clock.png" style = "display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/><div id = "autocomplete_branches" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
						<?php if ($this->_tpl_vars['T_MORE_LOCATIONS']): ?>
							<img src = "images/16x16/information.png" alt = "<?php echo @_COURSEBRANCHES; ?>
" title = "<?php echo @_COURSEBRANCHES; ?>
" class = "ajaxHandle" onclick = "eF_js_showHideDiv(this, 'course_branches_div', event)"/>
						<?php endif; ?>
						</td></tr>
						<?php if ($this->_tpl_vars['T_MORE_LOCATIONS']): ?>
					<tr><td></td>
						<td class = "infoCell"><?php echo @_MORETHANONEBRANCHESONLYFIRSTSHOWING; ?>
</td></tr>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['T_COURSE_FORM']['supervisor_LOGIN']): ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['supervisor_LOGIN']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['supervisor_LOGIN']['html']; ?>
</td></tr>
						<?php endif; ?>
					<?php endif; ?> 
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['duration']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['duration']['html']; ?>
 <?php echo @_DAYSAFTERREGISTRATION; ?>
</td></tr>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['max_users']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['max_users']['html']; ?>
</td></tr>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['training_hours']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['training_hours']['html']; ?>
</td></tr>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['ceu']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['ceu']['html']; ?>
</td></tr>
				<?php endif; ?> 			 <?php endif; ?> 					<tr><td></td>
						<td class = "submitCell"><?php echo $this->_tpl_vars['T_COURSE_FORM']['submit_course']['html']; ?>
</td></tr>
				</table>
				<div onclick = "eF_js_showHideDiv(this, 'course_branches_div', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:450px;position:absolute;z-index:100;display:none" id = "course_branches_div"><?php echo @_BRANCHES; ?>
: <?php echo $this->_tpl_vars['T_MORE_LOCATIONS']; ?>
</div>			</form>
		<?php $this->_smarty_vars['capture']['t_course_form_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
		<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'lessonsTable'): ?>
<!--ajax:lessonsTable-->
			<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "4" order = "desc" useAjax = "1" id = "lessonsTable" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $_GET['edit_course']; ?>
&">
				<tr class = "topTitle defaultRowHeight">
					<td class = "topTitle" name = "name"><?php echo @_LESSONNAME; ?>
 </td>
					<td class = "topTitle noSort"><?php echo @_DIRECTION; ?>
</td>
					<td class = "topTitle" name = "created"><?php echo @_CREATED; ?>
</td>
<?php if (( @G_VERSIONTYPE != 'community' )): ?> 	<?php if (( @G_VERSIONTYPE != 'standard' )): ?> 					<td class = "topTitle noSort"><?php echo @_MODE; ?>
</td>
	<?php endif; ?> <?php endif; ?> 					<td class = "topTitle centerAlign" name = "has_lesson" ><?php echo @_SELECT; ?>
</td>
				</tr>
			<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lessons_list2']['iteration']++;
?>
				<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
					<td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&edit_lesson=<?php echo $this->_tpl_vars['lesson']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['lesson']['name']; ?>
</a></td>
					<td><?php echo $this->_tpl_vars['lesson']['directionsPath']; ?>
</td>
					<td>#filter:timestamp-<?php echo $this->_tpl_vars['lesson']['created']; ?>
#</td>
<?php if (( @G_VERSIONTYPE != 'community' )): ?> 	<?php if (( @G_VERSIONTYPE != 'standard' )): ?> 					<td style = "white-space:nowrap">
					<?php if (! $this->_tpl_vars['T_COURSE_HAS_USERS']): ?>
						<select id = "lesson_mode_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" name = "lesson_mode" onchange = "setLessonMode(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this.options[this.options.selectedIndex].value)" <?php if (! $this->_tpl_vars['lesson']['has_lesson']): ?>style = "display:none"<?php endif; ?>>
							<option value = "shared" <?php if ($this->_tpl_vars['lesson']['mode'] == 'shared'): ?>selected<?php endif; ?>><?php echo @_SHARED; ?>
</option>
							<option value = "unique" <?php if ($this->_tpl_vars['lesson']['mode'] == 'unique'): ?>selected<?php endif; ?>><?php echo @_UNIQUE; ?>
</option>
						</select>
					<?php else: ?>
						<?php if ($this->_tpl_vars['lesson']['mode'] == 'shared'): ?><?php echo @_SHARED; ?>
<?php elseif ($this->_tpl_vars['lesson']['mode'] == 'unique'): ?><?php echo @_UNIQUE; ?>
<?php endif; ?>
					<?php endif; ?>
					</td>
	<?php endif; ?> <?php endif; ?> 
					<td class = "centerAlign">
				<?php if ($this->_tpl_vars['_change_']): ?>
						<input type = "checkbox" id = "<?php echo $this->_tpl_vars['lesson']['id']; ?>
" onclick = "lessonsAjaxPost('<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this);" <?php if ($this->_tpl_vars['lesson']['has_lesson']): ?>checked<?php endif; ?>><?php if ($this->_tpl_vars['lesson']['has_lesson']): ?><span style = "display:none">checked</span><?php endif; ?> 				<?php else: ?>
					<?php if ($this->_tpl_vars['lesson']['has_lesson']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_COURSELESSON; ?>
" title = "<?php echo @_COURSELESSON; ?>
"><span style = "display:none">checked</span><?php endif; ?>
				<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; else: ?>
				<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
			<?php endif; unset($_from); ?>
			</table>
<!--/ajax:lessonsTable-->
		<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_lessons_to_courses_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
		<script>
			translationsToJS['_USERACCESSGRANTED'] = '<?php echo @_USERACCESSGRANTED; ?>
';
			translationsToJS['_APPLICATIONPENDING'] = '<?php echo @_APPLICATIONPENDING; ?>
';
		</script>
		<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'usersTable'): ?>
<!--ajax:usersTable-->
			<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" activeFilter = "1" sortBy = "6" order="desc" useAjax = "1" id = "usersTable" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" <?php if (isset ( $this->_tpl_vars['T_JOBS_FILTER'] )): ?>branchFilter="true" jobFilter="<?php echo $this->_tpl_vars['T_JOBS_FILTER']; ?>
"<?php endif; ?> url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $_GET['edit_course']; ?>
&">
				<tr class = "topTitle">
					<td class = "topTitle" name = "login"><?php echo @_USER; ?>
</td>
					<td class = "topTitle" name = "role"><?php echo @_USERROLE; ?>
</td>
			        <td class = "topTitle" name = "active_in_course" style = "width:10%"><?php echo @_ENROLLEDON; ?>
</td>
			        <td class = "topTitle" name = "timestamp_completed"   style = "width:10%"><?php echo @_COMPLETEDON; ?>
</td>
			        <td class = "topTitle centerAlign" name = "from_timestamp" style = "width:5%"><?php echo @_STATUS; ?>
</td>
			        <td class = "topTitle centerAlign" name = "completed" style = "width:5%"><?php echo @_COMPLETED; ?>
</td>
			        <td class = "topTitle centerAlign" name = "score" style = "width:5%"><?php echo @_SCORE; ?>
</td>
					<td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
					<td class = "topTitle centerAlign" name = "active_in_course"><?php echo @_CHECK; ?>
</td>
				</tr>
			<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['login'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
				<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
					<td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['user']['login']; ?>
&op=profile" class = "editLink">#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</a></td>
					<td>
				<?php if ($this->_tpl_vars['_change_']): ?>
						<select name="type_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "type_<?php echo $this->_tpl_vars['user']['login']; ?>
" onchange = "$('checked_<?php echo $this->_tpl_vars['user']['login']; ?>
').checked=true;usersAjaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this);">
					<?php $_from = $this->_tpl_vars['T_ROLES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
							<option value="<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['user']['role']): ?><?php if ($this->_tpl_vars['user']['user_types_ID'] && $this->_tpl_vars['user']['user_types_ID'] == $this->_tpl_vars['role_key']): ?>selected<?php elseif (! $this->_tpl_vars['user']['user_types_ID'] && $this->_tpl_vars['user']['user_type'] == $this->_tpl_vars['role_key']): ?>selected<?php endif; ?><?php elseif (( $this->_tpl_vars['user']['role'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?> <?php if ($this->_tpl_vars['user']['user_types_ID'] == $this->_tpl_vars['role_key'] || $this->_tpl_vars['user']['user_type'] == $this->_tpl_vars['role_key']): ?>style = "font-weight:bold"<?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
						</select>
				<?php else: ?>
						<?php echo $this->_tpl_vars['T_ROLES'][$this->_tpl_vars['user']['user_type']]; ?>

				<?php endif; ?>
					</td>
					<td style = "white-space:nowrap">#filter:timestamp-<?php echo $this->_tpl_vars['user']['active_in_course']; ?>
#</td>
					<td style = "white-space:nowrap">#filter:timestamp-<?php echo $this->_tpl_vars['user']['timestamp_completed']; ?>
#</td>
			        <td class = "centerAlign">
					<?php if ($this->_tpl_vars['user']['active_in_course']): ?>
			            <img class = "ajaxHandle" src = "images/16x16/success.png" title = "<?php echo @_USERACCESSGRANTED; ?>
" alt = "<?php echo @_USERACCESSGRANTED; ?>
" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
', 'course')"/>
                	<?php elseif (! is_null($this->_tpl_vars['user']['active_in_course'])): ?>
			            <img class = "ajaxHandle" src = "images/16x16/warning.png" title = "<?php echo @_APPLICATIONPENDING; ?>
" alt = "<?php echo @_APPLICATIONPENDING; ?>
" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
', 'course')"/>
	            	<?php endif; ?>
			        </td>
			        <td class = "centerAlign">
					<?php if (! is_null($this->_tpl_vars['user']['active_in_course'])): ?>
						<?php if ($this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student'): ?><?php if ($this->_tpl_vars['user']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_YES; ?>
" title = "<?php echo @_YES; ?>
"><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"><?php endif; ?><?php endif; ?>
					<?php endif; ?>
					</td>
			        <td class = "centerAlign">
					<?php if (! is_null($this->_tpl_vars['user']['active_in_course'])): ?>
						<?php if ($this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student'): ?>#filter:score-<?php echo $this->_tpl_vars['user']['score']; ?>
#%<?php endif; ?>
					<?php endif; ?>
					</td>
					<td class = "centerAlign">
				<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['user']['login']; ?>
&op=evaluations&add_evaluation=1&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_NEWEVALUATION; ?>
', 1)">
							<img src="images/16x16/edit.png" title="<?php echo @_NEWEVALUATION; ?>
" alt="<?php echo @_NEWEVALUATION; ?>
">
						</a>
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=personal&user=<?php echo $this->_tpl_vars['user']['login']; ?>
&op=&op=evaluations">
							<img src="images/16x16/search.png" title="<?php echo @_SHOWEVALUATIONS; ?>
" alt="<?php echo @_SHOWEVALUATIONS; ?>
">
						</a>
				<?php endif; ?> 					<?php if ($this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['user']['user_type']] == 'student' && ! is_null($this->_tpl_vars['user']['active_in_course'])): ?>
							<img class = "ajaxHandle" src="images/16x16/refresh.png" title="<?php echo @_RESETPROGRESSDATA; ?>
" alt="<?php echo @_RESETPROGRESSDATA; ?>
" onclick = "if (confirm(translations['_IRREVERSIBLEACTIONAREYOUSURE'])) resetProgress(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
');">
					<?php endif; ?>
					</td>
					<td class = "centerAlign">
				<?php if ($this->_tpl_vars['_change_']): ?>
						<input class = "inputCheckbox" type = "checkbox" name = "checked_<?php echo $this->_tpl_vars['login']; ?>
" id = "checked_<?php echo $this->_tpl_vars['login']; ?>
" onclick = "usersAjaxPost('<?php echo $this->_tpl_vars['login']; ?>
', this);" <?php if (! is_null($this->_tpl_vars['user']['active_in_course'])): ?>checked = "checked"<?php endif; ?> /><?php if (! is_null($this->_tpl_vars['user']['active_in_course'])): ?><span style = "display:none">checked</span><?php endif; ?>
				<?php else: ?>
						<?php if (! is_null($this->_tpl_vars['user']['active_in_course'])): ?><img src = "images/16x16/success.png" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
"><span style = "display:none">checked</span><?php endif; ?>
				<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; else: ?>
				<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
			<?php endif; unset($_from); ?>
			</table>

<!--/ajax:usersTable-->
		<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_users_to_courses_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 		<?php ob_start(); ?>
		<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'skillsTable'): ?>
			<div class = "headerTools">
				<span>
					<img src = "images/16x16/add.png" title = "<?php echo @_NEWSKILL; ?>
" alt = "<?php echo @_NEWSKILL; ?>
">
					<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=module_hcd&op=skills&add_skill=1" title = "<?php echo @_NEWSKILL; ?>
" ><?php echo @_NEWSKILL; ?>
</a>
				</span>
			</div>
<!--ajax:skillsTable-->
		<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "skillsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $_GET['edit_course']; ?>
&">
			<tr class = "topTitle">
				<td class = "topTitle" name="description" style = "width:35%"><?php echo @_SKILL; ?>
</td>
				<td class = "topTitle" name="category" width="15%"><?php echo @_CATEGORY; ?>
</td>
				<td class = "topTitle" name="specification" ><?php echo @_SPECIFICATION; ?>
</td>
				<td class = "topTitle centerAlign" name = "courses_ID" style = "width:5%"><?php echo @_CHECK; ?>
</td>
			</tr>

		<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['skill_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['skill_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['skill']):
        $this->_foreach['skill_list']['iteration']++;
?>
			<tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
				<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=module_hcd&op=skills&edit_skill=<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
"><?php echo $this->_tpl_vars['skill']['description']; ?>
</a></td>
				<td><?php echo $this->_tpl_vars['skill']['category']; ?>
</td>
				<td><input class = "inputText" type="text" name="spec_skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
"  id="spec_skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" onchange="ajaxCourseSkillUserPost(2,'<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
', this);" value="<?php echo $this->_tpl_vars['skill']['specification']; ?>
"<?php if ($this->_tpl_vars['skill']['courses_ID'] != $_GET['edit_course']): ?> style="visibility:hidden" <?php endif; ?>></td>
				<td class = "centerAlign"><input class = "inputCheckBox" type = "checkbox" name = "<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" onclick="javascript:show_hide_spec('<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
');ajaxCourseSkillUserPost(1,'<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
', this);" <?php if ($this->_tpl_vars['skill']['courses_ID'] == $_GET['edit_course']): ?> checked <?php endif; ?> ></td>
			</tr>
		<?php endforeach; else: ?>
			<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "3"><?php echo @_NODATAFOUND; ?>
</td></tr>
		<?php endif; unset($_from); ?>
		</table>
<!--/ajax:skillsTable-->
		<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_course_skills'] = ob_get_contents(); ob_end_clean(); ?>

		<script>var myform = "skills_to_course";</script>
<?php endif; ?> 
<?php if (( @G_VERSIONTYPE != 'community' )): ?> 	<?php if (( @G_VERSIONTYPE != 'standard' )): ?> 	<?php if (((is_array($_tmp='course_instances')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>	
		<?php ob_start(); ?>
		<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable'): ?>
			<div class = "headerTools">
				<span>
					<img src = "images/16x16/add.png" title = "<?php echo @_ADDINSTANCE; ?>
" alt = "<?php echo @_ADDINSTANCE; ?>
">
					<a href = "javascript:void(0)" onclick = "addInstance(Element.extend(this))" title = "<?php echo @_ADDINSTANCE; ?>
" ><?php echo @_ADDINSTANCE; ?>
</a>
				</span>
			</div>
<!--ajax:instancesTable-->
			<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
"  sortBy = "3" order = "desc" id = "instancesTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $_GET['edit_course']; ?>
&">
				<tr class = "topTitle">
					<td class = "topTitle" name = "name"><?php echo @_COURSENAME; ?>
</td>
					<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 						<td class = "topTitle" name = "location"><?php echo @_BRANCH; ?>
</td>
					<?php endif; ?>					<td class = "topTitle centerAlign" name = "num_students"><?php echo @_PARTICIPATION; ?>
</td>
					<td class = "topTitle centerAlign" name = "active"><?php echo @_ACTIVE; ?>
</td>
					<td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
				</tr>
			<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['branch_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['branch_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['instance']):
        $this->_foreach['branch_list']['iteration']++;
?>
				<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['instance']['active']): ?>deactivatedTableElement<?php endif; ?>">
					<td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $this->_tpl_vars['instance']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['instance']['name']; ?>
</a></td>
					<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 						<td><?php echo $this->_tpl_vars['instance']['location']; ?>
</td>
					<?php endif; ?>					<td class = "centerAlign"><?php if ($this->_tpl_vars['instance']['max_users']): ?><?php echo $this->_tpl_vars['instance']['num_students']; ?>
/<?php echo $this->_tpl_vars['instance']['max_users']; ?>
<?php else: ?><?php echo $this->_tpl_vars['instance']['num_students']; ?>
<?php endif; ?></td>
					<td class = "centerAlign">
				<?php if ($this->_tpl_vars['instance']['active'] == 1): ?>
						<img class = "ajaxHandle" src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['_change_']): ?>onclick = "activateCourse(this, '<?php echo $this->_tpl_vars['instance']['id']; ?>
')"<?php endif; ?>>
				<?php else: ?>
						<img class = "ajaxHandle" src = "images/16x16/trafficlight_red.png"   alt = "<?php echo @_ACTIVATE; ?>
"   title = "<?php echo @_ACTIVATE; ?>
"   <?php if ($this->_tpl_vars['_change_']): ?>onclick = "activateCourse(this, '<?php echo $this->_tpl_vars['instance']['id']; ?>
')"<?php endif; ?>>
				<?php endif; ?>
					</td>
					<td class = "centerAlign">
				<?php if ($this->_tpl_vars['instance']['id'] != $this->_tpl_vars['T_EDIT_COURSE']->course['id']): ?>
						<img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTODELETEINSTANCE; ?>
')) deleteCourse(this, '<?php echo $this->_tpl_vars['instance']['id']; ?>
');"/>
				<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; else: ?>
				<tr class = "defaultRowHeight oddRowColor"><td colspan = "7" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
			<?php endif; unset($_from); ?>
			</table>
<!--/ajax:instancesTable-->
		<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_course_instances_code'] = ob_get_contents(); ob_end_clean(); ?>
	<?php endif; ?>
	<?php endif; ?> <?php endif; ?> 
		<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['T_EDIT_COURSE']->course['instance_source']): ?>
				<?php $this->assign('edit_block_title', @_EDITCOURSEINSTANCE); ?>
				<?php $this->assign('lessons_block_title', @_EDITLESSONSCOURSEINSTANCE); ?>
				<?php $this->assign('users_block_title', @_EDITUSERSCOURSEINSTANCE); ?>
				<?php $this->assign('skills_block_title', @_SKILLSOFFEREDINSTANCE); ?>
				<?php $this->assign('course_options_title', @_COURSEOPTIONSFORINSTANCE); ?>
			<?php else: ?>
				<?php $this->assign('edit_block_title', @_EDITCOURSE); ?>
				<?php $this->assign('lessons_block_title', @_EDITLESSONSCOURSE); ?>
				<?php $this->assign('users_block_title', @_EDITUSERSCOURSE); ?>
				<?php $this->assign('skills_block_title', @_SKILLSOFFERED); ?>
				<?php $this->assign('course_options_title', @_COURSEOPTIONSFOR); ?>
			<?php endif; ?>
			<?php if (sizeof ( $this->_tpl_vars['T_COURSE_INSTANCES'] ) > 1): ?>
			<div class = "headerTools" style = "float:right">
				<?php echo @_JUMPTO; ?>
:
				<select onchange = "if (sel = this.options[this.options.selectedIndex].value) location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course='+sel">
					<option value = "<?php echo $this->_tpl_vars['T_INSTANCE_SOURCE']; ?>
"><?php echo @_PARENTCOURSE; ?>
</option>
					<option value = "">----------------</option>
					<?php $_from = $this->_tpl_vars['T_COURSE_INSTANCES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['t_course_instances_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t_course_instances_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['t_course_instances_list']['iteration']++;
?>
					<option value = "<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['item']->course['id'] == $this->_tpl_vars['T_EDIT_COURSE']->course['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']->course['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
			<?php endif; ?>
			<div class = "tabber">
				<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'courses','title' => ($this->_tpl_vars['edit_block_title']),'data' => $this->_smarty_vars['capture']['t_course_form_code'],'image' => '32x32/courses.png'), $this);?>

			<?php if ($_GET['edit_course']): ?>
				<script>var editCourse = '<?php echo $_GET['edit_course']; ?>
';</script>
				<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'lessons','title' => ($this->_tpl_vars['lessons_block_title']),'data' => $this->_smarty_vars['capture']['t_lessons_to_courses_code'],'image' => '32x32/lessons.png'), $this);?>

				<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'users','title' => ($this->_tpl_vars['users_block_title']),'data' => $this->_smarty_vars['capture']['t_users_to_courses_code'],'image' => '32x32/users.png'), $this);?>


				<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 				   <?php echo smarty_function_eF_template_printBlock(array('tabber' => 'skills','title' => ($this->_tpl_vars['skills_block_title']),'data' => $this->_smarty_vars['capture']['t_course_skills'],'image' => '32x32/skills.png'), $this);?>

				<?php endif; ?> 				<?php if (( @G_VERSIONTYPE != 'community' )): ?> 					<?php if (( @G_VERSIONTYPE != 'standard' )): ?> 						<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'instances','title' => (@_COURSEINSTANCES),'data' => $this->_smarty_vars['capture']['t_course_instances_code'],'image' => '32x32/schedule.png'), $this);?>

					<?php endif; ?> 				<?php endif; ?> 			<?php endif; ?>
			</div>
		<?php $this->_smarty_vars['capture']['t_course_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php if ($_GET['add_course']): ?>
			<?php echo smarty_function_eF_template_printBlock(array('title' => @_NEWCOURSEOPTIONS,'data' => $this->_smarty_vars['capture']['t_course_code'],'image' => '32x32/courses.png'), $this);?>

		<?php else: ?>
			<?php echo smarty_function_eF_template_printBlock(array('title' => ($this->_tpl_vars['course_options_title'])." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_EDIT_COURSE']->course['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_course_code'],'image' => '32x32/courses.png','options' => $this->_tpl_vars['T_COURSE_OPTIONS']), $this);?>

		<?php endif; ?>


	<?php else: ?>	

		<?php ob_start(); ?>
			<script>translationsToJS['_ACTIVATE'] = '<?php echo @_ACTIVATE; ?>
'; translationsToJS['_DEACTIVATE'] = '<?php echo @_DEACTIVATE; ?>
';</script>
			<?php if ($this->_tpl_vars['_change_']): ?>
				<div class = "headerTools">
					<span>
						<img src = "images/16x16/add.png" title = "<?php echo @_NEWCOURSE; ?>
" alt = "<?php echo @_NEWCOURSE; ?>
">
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&add_course=1" title = "<?php echo @_NEWCOURSE; ?>
" ><?php echo @_NEWCOURSE; ?>
</a>
					</span>
					<span>
						<img src = "images/16x16/import.png" title = "<?php echo @_IMPORTCOURSE; ?>
" alt = "<?php echo @_IMPORTCOURSE; ?>
">
						<a href = "javascript:void(0)" title = "<?php echo @_IMPORTCOURSE; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_IMPORTCOURSE; ?>
', 0, 'import_course_popup')"><?php echo @_IMPORTCOURSE; ?>
</a></a>
					</span>
				</div>
				<div id = "import_course_popup" style = "display:none">
					<?php ob_start(); ?>
						<?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['javascript']; ?>

						<form <?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['attributes']; ?>
>
						<?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['hidden']; ?>

						<table class = "formElements">
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['import_content']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['import_content']['html']; ?>
</td></tr>
							<tr><td></td>
								<td class = "infoCell"><?php echo @_FILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
</td></tr>
							<tr><td></td>
								<td class = "submitCell"><?php echo $this->_tpl_vars['T_IMPORT_COURSE_FORM']['submit_course']['html']; ?>
</td></tr>
						</table>
						</form>
					<?php $this->_smarty_vars['capture']['t_import_course_code'] = ob_get_contents(); ob_end_clean(); ?>
					<?php echo smarty_function_eF_template_printBlock(array('title' => @_IMPORTCOURSE,'data' => $this->_smarty_vars['capture']['t_import_course_code'],'image' => '32x32/import.png'), $this);?>

				</div>

			<?php endif; ?>

		<?php $this->assign('courses_url', ($_SERVER['PHP_SELF'])."?ctg=courses&"); ?>
		<?php $this->assign('_change_handles_', $this->_tpl_vars['_change_']); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common/courses_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<?php $this->_smarty_vars['capture']['t_courses_code'] = ob_get_contents(); ob_end_clean(); ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_UPDATECOURSES,'data' => $this->_smarty_vars['capture']['t_courses_code'],'image' => '32x32/courses.png','help' => 'Courses'), $this);?>


	<?php endif; ?>


	</td></tr>
<?php $this->_smarty_vars['capture']['moduleCourses'] = ob_get_contents(); ob_end_clean(); ?>