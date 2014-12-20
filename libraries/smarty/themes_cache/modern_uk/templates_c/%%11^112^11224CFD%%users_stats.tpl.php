<?php /* Smarty version 2.6.27, created on 2014-09-16 15:03:02
         compiled from includes/statistics/users_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/statistics/users_stats.tpl', 22, false),array('function', 'eF_template_printBlock', 'includes/statistics/users_stats.tpl', 283, false),array('modifier', 'eF_template_isOptionVisible', 'includes/statistics/users_stats.tpl', 35, false),array('modifier', 'sizeof', 'includes/statistics/users_stats.tpl', 38, false),array('modifier', 'eF_decodeIp', 'includes/statistics/users_stats.tpl', 213, false),)), $this); ?>

<?php $this->assign('courses_url', ($_SERVER['PHP_SELF'])."?ctg=statistics&option=user&sel_user=".($_GET['sel_user'])."&"); ?>
<?php $this->assign('_change_handles_', false); ?>
<?php ob_start(); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common/courses_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->_smarty_vars['capture']['t_courses_list_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['T_CONFIGURATION']['lesson_enroll']): ?>
	<?php ob_start(); ?>
		<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'lessonsTable'): ?>
<!--ajax:lessonsTable-->
		<table id = "lessonsTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" class = "sortedTable subSection" useAjax = "1" url = "<?php echo $this->_tpl_vars['courses_url']; ?>
">
			<?php echo $this->_smarty_vars['capture']['lessons_list']; ?>

		</table>
<!--/ajax:lessonsTable-->
		<?php endif; ?>
	<?php $this->_smarty_vars['capture']['t_lessons_list_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>

<?php ob_start(); ?>
	<table class = "statisticsGeneralInfo">
		<tr><td class = "topTitle" colspan = "2"><?php echo @_GENERALUSERINFO; ?>
</td></tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'general_user_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_LANGUAGE; ?>
:</td>
				<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['general']['language']; ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'general_user_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_ACTIVE; ?>
:</td>
				<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['general']['active_str']; ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'general_user_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_JOINED; ?>
:</td>
				<td class = "elementCell">#filter:timestamp-<?php echo $this->_tpl_vars['T_USER_INFO']['general']['joined']; ?>
#</td>
		</tr>
		<tr><td class = "topTitle" colspan = "2"><?php echo @_USERCOMMUNICATIONINFO; ?>
</td></tr>
		<?php if (((is_array($_tmp='forum')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_FORUMPOSTS; ?>
:</td>
				<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['communication']['forum_messages']); ?>
</td>
			</tr>
			<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_FORUMLASTMESSAGE; ?>
:</td>
				<td class = "elementCell">#filter:timestamp-<?php echo $this->_tpl_vars['T_USER_INFO']['communication']['last_message']['timestamp']; ?>
#</td>
			</tr>
		<?php endif; ?>
		<?php if (((is_array($_tmp='messages')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_PERSONALMESSAGES; ?>
:</td>
				<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['communication']['personal_messages']); ?>
</td>
			</tr>
			<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_MESSAGESFOLDERS; ?>
:</td>
				<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['communication']['personal_folders']); ?>
</td>
			</tr>
		<?php endif; ?>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell" ><?php echo @_FILES; ?>
:</td>
			<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['communication']['files']); ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_FOLDERS; ?>
:</td>
			<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['communication']['folders']); ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_TOTALSIZE; ?>
:</td>
			<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['communication']['total_size']; ?>
KB</td>
		</tr>
		
		<?php if (((is_array($_tmp='comments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<tr class = "<?php echo smarty_function_cycle(array('name' => 'communication_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td class = "labelCell"><?php echo @_COMMENTS; ?>
:</td>
				<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['communication']['comments']); ?>
</td>
			</tr>
		<?php endif; ?>
		<tr><td class = "topTitle" colspan = "2"><?php echo @_USERUSAGEINFO; ?>
</td></tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_LASTLOGIN; ?>
:</td>
			<td class = "elementCell">#filter:timestamp-<?php echo $this->_tpl_vars['T_USER_INFO']['usage']['last_login']['timestamp']; ?>
#</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_TOTALLOGINS; ?>
:</td>
			<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['usage']['logins']); ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_MONTHLOGINS; ?>
:</td>
			<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['usage']['month_logins']); ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_WEEKLOGINS; ?>
:</td>
			<td class = "elementCell"><?php echo sizeof($this->_tpl_vars['T_USER_INFO']['usage']['week_logins']); ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_MEANDURATION; ?>
:</td>
			<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['usage']['meanDuration']['time_string']; ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_MONTHMEANDURATION; ?>
:</td>
			<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['usage']['monthmeanDuration']['time_string']; ?>
</td>
		</tr>
		 <tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_WEEKMEANDURATION; ?>
:</td>
			<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['usage']['weekmeanDuration']['time_string']; ?>
</td>
		</tr>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_usage','values' => 'oddRowColor, evenRowColor'), $this);?>
">
			<td class = "labelCell"><?php echo @_LASTIPUSED; ?>
:</td>
			<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_INFO']['usage']['last_ip']; ?>
</td>
		</tr>
	</table>
<?php $this->_smarty_vars['capture']['t_moreinfo_code'] = ob_get_contents(); ob_end_clean(); ?>
	<?php if ($this->_tpl_vars['T_BASIC_TYPE'] == 'administrator' || $this->_tpl_vars['T_BASIC_TYPE'] == 'professor' || isset ( $this->_tpl_vars['T_USER_INFO']['general']['supervised_by_user'] )): ?>
<?php ob_start(); ?>
		<table class = "statisticsTools">
			<tr><td id = "right">
					<a href = "javascript:void(0)" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_access');"><?php echo @_ACCESSSTATISTICS; ?>
:</a>
					<img class = "handle" src = "images/16x16/reports.png" alt = "<?php echo @_ACCESSSTATISTICS; ?>
" title = "<?php echo @_ACCESSSTATISTICS; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_access');"/>
				</td></tr>
		</table>
		<div id = "graph_table" style = "display:none"><div id = "proto_chart" class = "proto_graph"></div></div>
		<table class = "statisticsGeneralInfo">
			<tr><td class = "topTitle" colspan = "2"><?php echo @_USERTRAFFIC; ?>
</td></tr>
			<tr class = "oddRowColor">
				<td class = "labelCell"><?php echo @_TOTALLOGINS; ?>
: </td>
				<td class = "elementCell"><?php echo $this->_tpl_vars['T_USER_TRAFFIC']['total_logins']; ?>
</td></tr>
		</table>

		<?php if ($this->_tpl_vars['T_REPORTS_USER']->user['user_type'] != 'administrator'): ?>
		<br/>
		<table class = "statisticsTools">
			<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
			<tr><td><?php echo @_ACTIVELESSONTIMES; ?>
</td></tr>
			<?php else: ?>
			<tr><td><?php echo @_LESSONTIMES; ?>
</td></tr>
			<?php endif; ?>
		</table>
		<table class = "sortedTable" style = "width:100%">
			<tr>
				<td class = "topTitle"><?php echo @_LESSON; ?>
</td>
				<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
				<td class = "topTitle centerAlign"><?php echo @_ACTIVETIMEINLESSON; ?>
</td>
				<?php else: ?>
				<td class = "topTitle centerAlign"><?php echo @_TIMEINLESSON; ?>
</td>
				<?php endif; ?>
				<td class = "topTitle centerAlign"><?php echo @_COMPLETED; ?>
</td>
							</tr>
			<?php $_from = $this->_tpl_vars['T_USER_TRAFFIC']['lessons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_traffic_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_traffic_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lesson_traffic_list']['iteration']++;
?>
				<tr class = "<?php echo smarty_function_cycle(array('name' => 'lessontraffic','values' => 'oddRowColor, evenRowColor'), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
					<td><?php echo $this->_tpl_vars['lesson']['name']; ?>
</td>
					<td class = "centerAlign">
						<span style="display:none"><?php echo $this->_tpl_vars['lesson']['total_seconds']; ?>
</span>
						<?php echo $this->_tpl_vars['lesson']['time_string']; ?>

					</td>
					<td class = "centerAlign">
						<span style="display:none"><?php echo $this->_tpl_vars['lesson']['completed']; ?>
</span>
						<?php if ($this->_tpl_vars['lesson']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo $this->_tpl_vars['smart']['const']['_YES']; ?>
" title = "<?php echo @_COMPLETEDON; ?>
 #filter:timestamp_time-<?php echo $this->_tpl_vars['lesson']['to_timestamp']; ?>
#"><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"><?php endif; ?>
					</td>
					
				</tr>
			<?php endforeach; else: ?>
				<tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
			<?php endif; unset($_from); ?>
		</table>
		<?php endif; ?>

		<br/>
		<?php if (isset ( $this->_tpl_vars['T_USER_LOG'] )): ?>
		<table class = "statisticsTools">
			<tr><td><?php echo @_ANALYTICLOG; ?>
</td></tr>
		</table>
		<table style = "width:100%">
			<tr>
				<td class = "topTitle"><?php echo @_LESSON; ?>
</td>
				<td class = "topTitle"><?php echo @_UNIT; ?>
</td>
				<td class = "topTitle"><?php echo @_ACTION; ?>
</td>
				<td class = "topTitle"><?php echo @_TIME; ?>
</td>
				<td class = "topTitle"><?php echo @_IPADDRESS; ?>
</td>
			</tr>
			<?php $_from = $this->_tpl_vars['T_USER_LOG']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user_log_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user_log_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['info']):
        $this->_foreach['user_log_loop']['iteration']++;
?>
			<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_log_list','values' => 'oddRowColor, evenRowColor'), $this);?>
">
				<td><?php echo $this->_tpl_vars['info']['lesson_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['info']['content_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['T_ACTIONS'][$this->_tpl_vars['info']['action']]; ?>
</td>
				<td>#filter:timestamp_time-<?php echo $this->_tpl_vars['info']['timestamp']; ?>
#</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['session_ip'])) ? $this->_run_mod_handler('eF_decodeIp', true, $_tmp) : eF_decodeIp($_tmp)); ?>
</td>
			</tr>
			<?php endforeach; else: ?>
			<tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
			<?php endif; unset($_from); ?>
		</table>
		<?php endif; ?>
<?php $this->_smarty_vars['capture']['t_traffic_code'] = ob_get_contents(); ob_end_clean(); ?>
	<?php endif; ?>


<?php ob_start(); ?>
	<?php if (! $this->_tpl_vars['T_SINGLE_USER']): ?>
		<table class = "statisticsSelectList">
			<tr><td class = "labelCell"><?php echo @_CHOOSEUSER; ?>
:</td>
				<td class = "elementCell">
					<input type = "text" id = "autocomplete" class = "autoCompleteTextBox"/>
					<img id = "busy" src = "images/16x16/clock.png" style = "display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
					<div id = "autocomplete_users" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr><td></td>
				<td class = "infoCell"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td>
			</tr>
		</table>
	<?php endif; ?>

	<?php if ($_GET['sel_user']): ?>
		<table class = "statisticsTools">
			<tr><td id = "right">
					<?php echo @_EXPORTSTATS; ?>

					<a href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['T_USER_LOGIN']; ?>
&excel=user">
						<img src = "images/file_types/xls.png" title = "<?php echo @_XLSFORMAT; ?>
" alt = "<?php echo @_XLSFORMAT; ?>
"/>
					</a>
					<a href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['T_USER_LOGIN']; ?>
&pdf=user">
						<img src = "images/file_types/pdf.png" title = "<?php echo @_PDFFORMAT; ?>
" alt="<?php echo @_PDFFORMAT; ?>
"/>
					</a>
				</td></tr>
		</table>
		<br/>
		<table class = "statisticsGeneralInfo">
			<tr><td id = "userAvatar">
					<img src = "view_file.php?file=<?php echo $this->_tpl_vars['T_AVATAR']; ?>
" title = "<?php echo @_USERAVATAR; ?>
" alt = "<?php echo @_USERAVATAR; ?>
"></td>
				<td>
					<table>
						<tr class = "<?php echo smarty_function_cycle(array('name' => 'common_user_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
							<td class = "labelCell"><?php echo @_USERNAME; ?>
:</td>
							<td class = "elementCell">#filter:user_login-<?php echo $this->_tpl_vars['T_USER_INFO']['general']['login']; ?>
#</td>
						</tr>
						<tr class = "<?php echo smarty_function_cycle(array('name' => 'common_user_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
							<td class = "labelCell"><?php echo @_USERTYPE; ?>
:</td>
							<td class = "elementCell"><?php if ($this->_tpl_vars['T_USER_INFO']['general']['user_types_ID']): ?><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['T_USER_INFO']['general']['user_types_ID']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['T_USER_INFO']['general']['user_type']]; ?>
<?php endif; ?></td>
						</tr>
						<tr class = "<?php echo smarty_function_cycle(array('name' => 'common_user_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
							<td class = "labelCell"><?php echo @_TOTALLOGINTIME; ?>
:</td>
							<td class = "elementCell">
								<?php if ($this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['hours'] || $this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['minutes'] || $this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['seconds']): ?>
									<?php if ($this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['hours']): ?><?php echo $this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['hours']; ?>
<?php echo @_HOURSSHORTHAND; ?>
 <?php endif; ?>
									<?php if ($this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['minutes']): ?><?php echo $this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 <?php endif; ?>
									<?php if ($this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['seconds']): ?><?php echo $this->_tpl_vars['T_USER_INFO']['general']['total_login_time']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?>
								<?php else: ?>
									<?php echo @_NOACCESSDATA; ?>

								<?php endif; ?>
							</td>
						</tr>
					</table>
			</td></tr>
		</table>
		<div class = "tabber">
		<?php if ($this->_tpl_vars['T_REPORTS_USER']->user['user_type'] != 'administrator'): ?>
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'courses','title' => @_COURSES,'data' => $this->_smarty_vars['capture']['t_courses_list_code'],'image' => '32x32/courses.png'), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'lessons','title' => @_LESSONS,'data' => $this->_smarty_vars['capture']['t_lessons_list_code'],'image' => '32x32/lessons.png'), $this);?>

		<?php endif; ?>
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'moreinfo','title' => @_MOREINFO,'data' => $this->_smarty_vars['capture']['t_moreinfo_code'],'image' => '32x32/information.png'), $this);?>

		<?php if ($this->_smarty_vars['capture']['t_traffic_code']): ?>
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'usertraffic','title' => @_TRAFFIC,'data' => $this->_smarty_vars['capture']['t_traffic_code'],'image' => '32x32/generic.png'), $this);?>

		<?php endif; ?>
		</div>
	<?php endif; ?>
<?php $this->_smarty_vars['capture']['user_statistics'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
	<table class = "informationTable">
		<tr><td colspan = "2" class = "topSubtitle"><b><?php echo @_GENERICLESSONINFO; ?>
</b></td></tr>
		<tr>
			<td><?php echo @_TIMEINLESSON; ?>
:</td>
			<td><?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['time_in_lesson']['time_string']; ?>
</td>
		</tr>
		<tr><td colspan = "2">&nbsp;</td></tr>
		<tr>
			<td colspan = "2" class="topSubtitle"><b><?php echo @_OVERALL; ?>
</b></td>
		</tr>
		<tr>
			<td><?php echo @_PROGRESS; ?>
:</td>
			<td class = "progressCell" style = "vertical-align:top;">
				<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['overall_progress']['percentage']; ?>
#%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['overall_progress']['percentage']; ?>
px;">&nbsp;</span>
			</td>
		</tr>

		<tr><td colspan = "2">&nbsp;</td></tr>
		<tr><td colspan = "2" class = "topSubtitle"><b><?php echo @_TESTS; ?>
</b></td></tr>
	<?php if ($this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['test_status']['total'] && ((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
		<tr>
			<td><?php echo @_USERAVERAGESCOREFORTESTS; ?>
:</td>
			<td class = "progressCell" style = "vertical-align:top;">
				<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['test_status']['mean_score']; ?>
#%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['test_status']['mean_score']; ?>
px;">&nbsp;</span>
			</td>
		</tr>
		<?php $_from = $this->_tpl_vars['T_USER_DONE_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['done_tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['done_tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['test_id'] => $this->_tpl_vars['test']):
        $this->_foreach['done_tests_list']['iteration']++;
?>
			<tr>
				<td <?php if (! $this->_tpl_vars['test']['active']): ?>class = "deactivatedElement"<?php endif; ?>><?php echo $this->_tpl_vars['test']['name']; ?>
:</td>
				<td class = "progressCell" style = "vertical-align:top;white-space:nowrap">
					<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['test']['active_score']; ?>
#%</span>
					<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['test']['active_score']; ?>
px;">&nbsp;</span>
					<span style = "margin-left:120px">(#filter:timestamp_time-<?php echo $this->_tpl_vars['test']['timestamp']; ?>
#)</span>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['T_USER_PENDING_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pending_tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pending_tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['test_id'] => $this->_tpl_vars['test']):
        $this->_foreach['pending_tests_list']['iteration']++;
?>
			<tr>
				<td <?php if (! $this->_tpl_vars['test']->test['active']): ?>class = "deactivatedElement"<?php endif; ?>><?php echo $this->_tpl_vars['test']->test['name']; ?>
:</td>
				<td class = "emptyCategory" style = "white-space:nowrap" colspan = "2"><?php echo @_USERNOTCOMPLETEDTEST; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr><td class = "emptyCategory" colspan = "2"><?php echo @_THEUSERHASNOTDONEANYTESTSINTHISLESSON; ?>
</td></tr>
	<?php endif; ?>

		<tr><td colspan = "2">&nbsp;</td></tr>
		<tr><td colspan = "2" class = "topSubtitle"><b><?php echo @_PROJECTS; ?>
</b></td></tr>
	<?php if (! empty ( $this->_tpl_vars['T_USER_STATUS']['assigned_projects'] )): ?>
		<tr>
			<td ><?php echo @_PROJECTAVERAGESCOREFORLESSON; ?>
:</td>
			<td class = "progressCell" style = "vertical-align:top;">
				<span class = "progressNumber"><?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['project_status']['mean_score']; ?>
%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['T_USER_STATUS_IN_LESSON']->lesson['project_status']['mean_score']; ?>
px;">&nbsp;</span>
		   </td>
		</tr>
	<?php endif; ?>
	<?php if (( sizeof($this->_tpl_vars['T_USER_STATUS']['assigned_projects']) )): ?>
		<?php $_from = $this->_tpl_vars['T_USER_STATUS']['assigned_projects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['done_projects_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['done_projects_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['project']):
        $this->_foreach['done_projects_list']['iteration']++;
?>
			<tr>
				<td><?php echo $this->_tpl_vars['project']['title']; ?>
:</td>
				<?php if ($this->_tpl_vars['project']['grade'] != ''): ?>
					<td class = "progressCell" style = "vertical-align:top;white-space:nowrap">
						<span class = "progressNumber"><?php echo $this->_tpl_vars['project']['grade']; ?>
%</span>
						<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['project']['grade']; ?>
px;">&nbsp;</span>
						<?php if ($this->_tpl_vars['project']['upload_timestamp'] > 0): ?>
							<span style = "margin-left:120px"><?php echo @_FILEUPLOADEDON; ?>
: #filter:timestamp_time-<?php echo $this->_tpl_vars['project']['upload_timestamp']; ?>
#</span>
						<?php else: ?>
							<span style = "margin-left:120px"><?php echo @_NOFILEUPLOADED; ?>
</span>
						<?php endif; ?>
					</td>
				<?php else: ?>
					<td class = "emptyCategory" style = "white-space:nowrap" colspan = "2"><?php echo @_PROJECTPENDING; ?>
</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<tr>
			<td style = "text-align:left" class = "emptyCategory" width="100%" colspan = "2"><?php echo @_THEUSERHASNOTBEENASSIGNEDANYPROJECT; ?>
</td>
		</tr>
	<?php endif; ?>
	</table>
<?php $this->_smarty_vars['capture']['t_specific_lesson_info_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
	<table class = "statisticsGeneralInfo">
		<tr>
			<td class = "topTitle" > <?php echo @_LESSON; ?>
 </td>
			<td class = "topTitle centerAlign" > <?php echo @_CONTENT; ?>
 </td>
			<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<td class = "topTitle centerAlign" > <?php echo @_TESTS; ?>
 </td>
			<?php endif; ?>
			<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<td class = "topTitle centerAlign" > <?php echo @_PROJECTS; ?>
 </td>
			<?php endif; ?>
			<td class = "topTitle centerAlign" > <?php echo @_COMPLETED; ?>
 </td>
			<td class = "topTitle centerAlign" > <?php echo @_SCORE; ?>
 </td>
		</tr>
		<?php $_from = $this->_tpl_vars['T_USER_STATUS_IN_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lesson_id'] => $this->_tpl_vars['lesson']):
        $this->_foreach['lesson_list']['iteration']++;
?>
		<tr class = "<?php echo smarty_function_cycle(array('name' => 'user_lessons_list','values' => "oddRowColor, evenRowColor"), $this);?>
">
			<td><?php echo $this->_tpl_vars['lesson']->lesson['name']; ?>
</td>
			<td class = "progressCell">
				<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']->lesson['overall_progress']['percentage']; ?>
#%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']->lesson['overall_progress']['percentage']; ?>
px;">&nbsp;</span>
			</td>
			<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<td class = "progressCell">
				<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']->lesson['test_status']['percentage']; ?>
#%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']->lesson['test_status']['percentage']; ?>
px;">&nbsp;</span>
			</td>
			<?php endif; ?>
			<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<td class = "progressCell">
				<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']->lesson['project_status']['percentage']; ?>
#%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']->lesson['project_status']['percentage']; ?>
px;">&nbsp;</span>
			</td>
			<?php endif; ?>
			<td class = "centerAlign">
				<?php if ($this->_tpl_vars['lesson']->lesson['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo $this->_tpl_vars['smart']['const']['_YES']; ?>
" title = "<?php echo @_COMPLETEDON; ?>
 #filter:timestamp_time-<?php echo $this->_tpl_vars['lesson']->lesson['to_timestamp']; ?>
#"><?php else: ?><img src = "images/16x16/error_delete.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"><?php endif; ?>
			</td>
			<td class = "centerAlign">
				<?php if ($this->_tpl_vars['lesson']->lesson['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['lesson']->lesson['score']; ?>
#%<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php $this->_smarty_vars['capture']['t_specific_course_info_code'] = ob_get_contents(); ob_end_clean(); ?>

	<?php if ($_GET['specific_lesson_info']): ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_DETAILS,'data' => $this->_smarty_vars['capture']['t_specific_lesson_info_code'],'image' => '32x32/lessons.png','help' => 'Reports'), $this);?>

	<?php elseif ($_GET['specific_course_info']): ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_DETAILS,'data' => $this->_smarty_vars['capture']['t_specific_course_info_code'],'image' => '32x32/courses.png','help' => 'Reports'), $this);?>

	<?php elseif ($this->_tpl_vars['T_REPORTS_USER']): ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => (@_REPORTSFORUSER)." <span class='innerTableName'>&quot;#filter:login-".($this->_tpl_vars['T_REPORTS_USER']->user['login'])."#&quot;</span>",'data' => $this->_smarty_vars['capture']['user_statistics'],'image' => '32x32/users.png','help' => 'Reports','options' => $this->_tpl_vars['T_EDIT_USER_LINK']), $this);?>

	<?php else: ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_USERSTATISTICS,'data' => $this->_smarty_vars['capture']['user_statistics'],'image' => '32x32/users.png','help' => 'Reports'), $this);?>

	<?php endif; ?>
