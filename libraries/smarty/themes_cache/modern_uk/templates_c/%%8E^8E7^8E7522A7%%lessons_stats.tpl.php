<?php /* Smarty version 2.6.27, created on 2014-09-23 00:11:12
         compiled from includes/statistics/lessons_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/statistics/lessons_stats.tpl', 32, false),array('function', 'math', 'includes/statistics/lessons_stats.tpl', 390, false),array('function', 'eF_template_printBlock', 'includes/statistics/lessons_stats.tpl', 511, false),array('modifier', 'eF_template_isOptionVisible', 'includes/statistics/lessons_stats.tpl', 82, false),array('modifier', 'eF_decodeIp', 'includes/statistics/lessons_stats.tpl', 497, false),)), $this); ?>
        <?php ob_start(); ?>
            <table class = "statisticsTools statisticsSelectList">
                <tr><td class = "labelCell"><?php echo @_CHOOSELESSON; ?>
:</td>
                    <td class = "elementCell" colspan = "4">
                        <input type = "text" id = "autocomplete_l" class = "autoCompleteTextBox"/>
                        <img id = "busy" src = "images/16x16/clock.png" style="display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                        <div id = "autocomplete_lessons" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr><td></td>
                	<td class = "infoCell" colspan = "4"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td></tr>
        <?php if (! isset ( $this->_tpl_vars['T_CURRENT_LESSON_INFO'] )): ?>
        	</table>
        <?php else: ?>

				<tr>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/statistics/stats_filters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <td id = "right">
                        <?php echo @_EXPORTSTATS; ?>

                        <a href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=lesson&sel_lesson=<?php echo $_GET['sel_lesson']; ?>
&group_filter=<?php echo $_GET['group_filter']; ?>
&excel=lesson&branch_filter=<?php echo $_GET['branch_filter']; ?>
&job_filter=<?php echo $_GET['job_filter']; ?>
&subbranches=<?php echo $_GET['subbranches']; ?>
&user_filter=<?php echo $_GET['user_filter']; ?>
">
                            <img src = "images/file_types/xls.png" title = "<?php echo @_XLSFORMAT; ?>
" alt = "<?php echo @_XLSFORMAT; ?>
"/>
                        </a>
                        <a href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=lesson&sel_lesson=<?php echo $_GET['sel_lesson']; ?>
&group_filter=<?php echo $_GET['group_filter']; ?>
&pdf=lesson&branch_filter=<?php echo $_GET['branch_filter']; ?>
&job_filter=<?php echo $_GET['job_filter']; ?>
&subbranches=<?php echo $_GET['subbranches']; ?>
&user_filter=<?php echo $_GET['user_filter']; ?>
">
                            <img src = "images/file_types/pdf.png" title = "<?php echo @_PDFFORMAT; ?>
" alt = "<?php echo @_PDFFORMAT; ?>
"/>
                        </a>
                    </td>
                 </tr>
        	</table>

            <br />
            <table class = "statisticsGeneralInfo">
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'common_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_NAME; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['name']; ?>
</td>
                </tr>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'common_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_CATEGORY; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['category_path']; ?>
</td>
                </tr>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'common_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_USERS; ?>
:</td>
                    <td class = "elementCell"><?php if ($this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['num_users']): ?><?php echo $this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['num_users']; ?>
 (<?php $_from = $this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['users_per_role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user_types_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user_types_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['user_types_list']['iteration']++;
?><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['key']]; ?>
: <?php echo $this->_tpl_vars['item']; ?>
<?php if (! ($this->_foreach['user_types_list']['iteration'] == $this->_foreach['user_types_list']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?>)<?php else: ?>0<?php endif; ?></td>
                </tr>
                <?php if ($this->_tpl_vars['T_AVERAGE_COMPLETION_TIME']): ?>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_AVERAGECOMPLETIONTIME; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_AVERAGE_COMPLETION_TIME']['time_string']; ?>
</td></tr>
                </tr>
                <?php endif; ?>
            </table>

            <div class = "tabber">
                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'users' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_USERS; ?>
">
	<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'lessonUsersTable'): ?>
<style>
<?php echo '
table#lessonUsersTable {width:100%;}
table#lessonUsersTable td.login{width:20%;}
table#lessonUsersTable td.user_type{width:10%;}
table#lessonUsersTable td.time_in_lesson{width:10%;}
table#lessonUsersTable td.overall_progress{width:10%;}
table#lessonUsersTable td.test_status{width:10%;}
table#lessonUsersTable td.project_status{width:10%;}
table#lessonUsersTable td.completed{width:5%;text-align:center;}
table#lessonUsersTable td.completedon{width:5%;text-align:center;}
table#lessonUsersTable td.score{width:10%;text-align:center;}
table#lessonUsersTable td.last_login{width:10%;text-align:center;}
'; ?>

</style>
<!--ajax:lessonUsersTable-->
		<table id = "lessonUsersTable" sortBy=0 size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" activeFilter = "1" class = "sortedTable" useAjax = "1" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=lesson&sel_lesson=<?php echo $_GET['sel_lesson']; ?>
<?php echo $this->_tpl_vars['T_STATS_FILTERS_URL']; ?>
&">
			<tr class = "topTitle">
				<td class = "topTitle login" name = "login"><?php echo @_USER; ?>
</td>
				<td class = "topTitle user_type" name = "role"><?php echo @_USERTYPE; ?>
</td>
				<td class = "topTitle" name = "timestamp"><?php echo @_REGISTRATIONDATE; ?>
</td>
				<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
				<td class = "topTitle time_in_lesson noSort"   name = "time_in_lesson"><?php echo @_ACTIVETIMEINLESSON; ?>
</td>
				<?php else: ?>
				<td class = "topTitle time_in_lesson noSort"   name = "time_in_lesson"><?php echo @_TIMEINLESSON; ?>
</td>
				<?php endif; ?>
				<td class = "topTitle overall_progress noSort" name = "overall_progress"><?php echo @_OVERALLPROGRESS; ?>
</td>
			<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
				<td class = "topTitle test_status noSort"		name = "test_status"><?php echo @_TESTSSCORE; ?>
</td>
			<?php endif; ?>
			<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
				<td class = "topTitle project_status noSort"   name = "project_status"><?php echo @_PROJECTSSCORE; ?>
</td>
			<?php endif; ?>
				<td class = "topTitle completed" 		name = "completed"><?php echo @_COMPLETED; ?>
</td>
				<td class = "topTitle completedon" 		name = "completed"><?php echo @_COMPLETEDON; ?>
</td>
				<td class = "topTitle score" 			name = "score"><?php echo @_SCORE; ?>
</td>
				<td class = "topTitle last_login" 		name = "last_login"><?php echo @_LASTLOGIN; ?>
</td>
			</tr>
			<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
			<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['user']['active']): ?>deactivatedTableElement<?php endif; ?>">
				<td class = "name">#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</td>
				<td class = "user_type"><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['user']['role']]; ?>
</td>
				<td>#filter:timestamp-<?php echo $this->_tpl_vars['user']['timestamp']; ?>
#</td>
				<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
				<td class = "time_in_lesson"><span style = "display:none"><?php echo $this->_tpl_vars['user']['active_time_in_lesson']['total_seconds']; ?>
&nbsp;</span><?php echo $this->_tpl_vars['user']['active_time_in_lesson']['time_string']; ?>
</td>
				<?php else: ?>
				<td class = "time_in_lesson"><span style = "display:none"><?php echo $this->_tpl_vars['user']['time_in_lesson']['total_seconds']; ?>
&nbsp;</span><?php echo $this->_tpl_vars['user']['time_in_lesson']['time_string']; ?>
</td>
				<?php endif; ?>
				<td class = "progressCell overall_progress">
					<?php if ($this->_tpl_vars['user']['role'] != 'professor'): ?>
					<span style = "display:none"><?php echo $this->_tpl_vars['user']['overall_progress']['completed']+1000; ?>
</span>
					<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['user']['overall_progress']['percentage']; ?>
#%</span>
					<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['user']['overall_progress']['percentage']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
					<?php else: ?><div class = "centerAlign">-</div><?php endif; ?>
				</td>
				<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
					<td class = "progressCell test_status">
					<?php if ($this->_tpl_vars['user']['test_status'] && $this->_tpl_vars['user']['role'] != 'professor'): ?>
						<span style = "display:none"><?php echo $this->_tpl_vars['user']['test_status']['mean_score']+1000; ?>
</span>
						<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['user']['test_status']['mean_score']; ?>
#% (<?php echo $this->_tpl_vars['user']['test_status']['completed']; ?>
/<?php echo $this->_tpl_vars['user']['test_status']['total']; ?>
)</span>
						<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['user']['test_status']['mean_score']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
					<?php else: ?><div class = "centerAlign">-</div><?php endif; ?>
					</td>
				<?php endif; ?>
				<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
					<td class = "progressCell project_status">
					<?php if ($this->_tpl_vars['user']['project_status'] && $this->_tpl_vars['user']['role'] != 'professor'): ?>
						<span style = "display:none"><?php echo $this->_tpl_vars['user']['project_status']['mean_score']+1000; ?>
</span>
						<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['user']['project_status']['mean_score']; ?>
#% (<?php echo $this->_tpl_vars['user']['project_status']['completed']; ?>
/<?php echo $this->_tpl_vars['user']['project_status']['total']; ?>
)</span>
						<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['user']['project_status']['mean_score']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
					<?php else: ?><div class = "centerAlign">-</div><?php endif; ?>
					</td>
				<?php endif; ?>
				<td class = "completed">
				<?php if ($this->_tpl_vars['user']['role'] != 'professor'): ?>
					<?php if ($this->_tpl_vars['user']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_YES; ?>
" title = "<?php echo @_YES; ?>
"/><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"/><?php endif; ?></td>
				<?php else: ?><div class = "centerAlign">-</div><?php endif; ?>
				<td class = "completedon">
						<?php if ($this->_tpl_vars['user']['completed']): ?>#filter:timestamp-<?php echo $this->_tpl_vars['user']['timestamp_completed']; ?>
#<?php endif; ?>
				
				</td>
				<td class = "score"><?php if ($this->_tpl_vars['user']['role'] != 'professor'): ?>#filter:score-<?php echo $this->_tpl_vars['user']['score']; ?>
#%<?php else: ?><div class = "centerAlign">-</div><?php endif; ?></td>
				<td class = "lastlogin">#filter:timestamp_time-<?php echo $this->_tpl_vars['user']['last_login']; ?>
#</td>
			</tr>
			<?php endforeach; else: ?>
			<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
			<?php endif; unset($_from); ?>
		</table>
<!--/ajax:lessonUsersTable-->
	<?php endif; ?>



                </div>

                <?php if (! empty ( $this->_tpl_vars['T_TESTS_INFO'] ) && ((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'tests' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_TESTS; ?>
">
                <?php $_from = $this->_tpl_vars['T_TESTS_INFO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test_id'] => $this->_tpl_vars['test_info']):
?>
                    <?php if (! $this->_tpl_vars['test_info']['general']['scorm']): ?>
					<table class = "statisticsTools">
                        <tr><td>
                                <a href = "javascript:void(0)" onclick = "toggleVisibility($('tinfo<?php echo $this->_tpl_vars['test_id']; ?>
'), Element.extend(this).down())">
									<img src = "images/16x16/navigate_down.png"  title = "<?php echo @_SHOWHIDE; ?>
" alt = "<?php echo @_SHOWHIDE; ?>
"/>
									<?php echo @_TEST; ?>
: <?php echo $this->_tpl_vars['test_info']['general']['name']; ?>
</a>
                            </td>
                            <td id = "right">
                                <a href = "javascript:void(0)" onclick = "eF_js_showDivPopup(event, '<?php echo @_QUESTIONTYPES; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_test_questions', '<?php echo $this->_tpl_vars['test_info']['general']['id']; ?>
');"><?php echo @_QUESTIONSKIND; ?>
: </a>
                                <img class = "ajaxHandle" src = "images/16x16/reports.png" alt = "<?php echo @_QUESTIONSKIND; ?>
" title = "<?php echo @_QUESTIONSKIND; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_QUESTIONTYPES; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_test_questions', '<?php echo $this->_tpl_vars['test_info']['general']['id']; ?>
');"/>
                            </td>
                    </table>
                    <table class = "statisticsSubInfo" id = "tinfo<?php echo $this->_tpl_vars['test_id']; ?>
" style = "display:none">
                        <tr>
                            <td class = "topTitle leftAlign"><?php echo @_TESTINFO; ?>
</td>
                            <td>&nbsp;</td>
                            <td class = "topTitle leftAlign"><?php echo @_QUESTIONINFO; ?>
</td>
                        </tr>
                        <tr><td>
                                <table>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'test_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_TESTDURATION; ?>
:</td><td><?php if ($this->_tpl_vars['test_info']['general']['duration_str']['hours']): ?><?php echo $this->_tpl_vars['test_info']['general']['duration_str']['hours']; ?>
<?php echo @_HOURSSHORTHAND; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['test_info']['general']['duration_str']['minutes']): ?><?php echo $this->_tpl_vars['test_info']['general']['duration_str']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['test_info']['general']['duration_str']['seconds']): ?><?php echo $this->_tpl_vars['test_info']['general']['duration_str']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?></td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'test_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_REDOABLE; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['general']['redoable_str']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'test_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_ONEBYONE; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['general']['onebyone_str']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'test_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_CREATED; ?>
:</td><td>#filter:timestamp-<?php echo $this->_tpl_vars['test_info']['general']['timestamp']; ?>
#</td></tr>
                                </table>
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <table>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_TOTALQUESTIONS; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['total']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_DEVELOPMENT; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['raw_text']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_MULTIPLEONE; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['multiple_one']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_MULTIPLEMANY; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['multiple_many']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_TRUEFALSE; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['true_false']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_MATCH; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['match']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_EMPTYSPACES; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['empty_spaces']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_DRAGNDROP; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['drag_drop']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_LOWDIFFICULTY; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['low']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_MEDIUMDIFFICULTY; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['medium']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'question_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_HIGHDIFFICULTY; ?>
:</td><td><?php echo $this->_tpl_vars['test_info']['questions']['high']; ?>
</td></tr>
                                </table>
                            </td></tr>
                    </table>
                    <?php else: ?>
					<table class = "statisticsTools">
                        <tr><td><?php echo @_TEST; ?>
: <?php echo $this->_tpl_vars['test_info']['general']['name']; ?>
 (SCORM)</td></tr>
					</table>
                    <?php endif; ?>
                    <table class = "sortedTable" sortBy = "0">
                        <tr>
                            <td style = "width:30%;" class = "topTitle"><?php echo @_USER; ?>
</td>
                            <td style = "width:100px;" class = "topTitle centerAlign"><?php echo @_SCORE; ?>
</td>
                            <td style = "" class = "topTitle centerAlign"><?php echo @_MASTERYSCORE; ?>
</td>
                            <td style = "width:10%;" class = "topTitle centerAlign"><?php echo @_STATUS; ?>
</td>
                            <td style = "width:25%;" class = "topTitle"><?php echo @_DATE; ?>
</td>
                            <td style = "width:10%;" class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
                        </tr>
                        <?php $_from = $this->_tpl_vars['T_TESTS_INFO'][$this->_tpl_vars['test_id']]['done']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['done_tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['done_tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['done_test']):
        $this->_foreach['done_tests_list']['iteration']++;
?>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => $this->_tpl_vars['test_id'],'values' => "oddRowColor, evenRowColor"), $this);?>
">
                        	<td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['done_test']['users_LOGIN']; ?>
">#filter:login-<?php echo $this->_tpl_vars['done_test']['users_LOGIN']; ?>
#</a></td>
                        	<td class = "progressCell">
                                <span style = "display:none"><?php echo $this->_tpl_vars['done_test']['score']; ?>
</span>
                                <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['done_test']['score']; ?>
#%</span>
                                <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['done_test']['score']; ?>
px;">&nbsp;</span>&nbsp;
                        	</td>
                        	<td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['done_test']['mastery_score']; ?>
#%</td>
                        	<td class = "centerAlign"><?php if ($this->_tpl_vars['done_test']['status'] == 'failed'): ?><img src = "images/16x16/close.png" alt = "<?php echo @_FAILED; ?>
" title = "<?php echo @_FAILED; ?>
" style = "vertical-align:middle"><?php else: ?><img src = "images/16x16/success.png" alt = "<?php echo @_PASSED; ?>
" title = "<?php echo @_PASSED; ?>
" style = "vertical-align:middle"><?php endif; ?></td>
                        	<td>#filter:timestamp_time-<?php echo $this->_tpl_vars['done_test']['timestamp']; ?>
#</td>
                        	<td class = "centerAlign">
                        		<?php if (! $this->_tpl_vars['test_info']['general']['scorm']): ?>
                                <a href = "view_test.php?done_test_id=<?php echo $this->_tpl_vars['done_test']['active_test_id']; ?>
&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_VIEWTEST; ?>
', 3)" target = "POPUP_FRAME">
                                	<img src = "images/16x16/search.png" alt = "<?php echo @_VIEWTEST; ?>
" title = "<?php echo @_VIEWTEST; ?>
" /></a>
                            	<?php endif; ?>
                        	</td>
						</tr>
                        <?php endforeach; else: ?>
                        <tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
                        <?php endif; unset($_from); ?>
                    </table>
                    <br/>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
                <?php endif; ?>

                <?php if (! empty ( $this->_tpl_vars['T_QUESTIONS_INFORMATION'] ) && ((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'questions' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_QUESTIONS; ?>
">
                    <table class = "sortedTable">
                        <tr>
                            <td class = "topTitle leftAlign nowrap"><?php echo @_QUESTIONTEXT; ?>
</td>
                            <td class = "topTitle centerAlign"><?php echo @_QUESTIONTYPE; ?>
</td>
                            <td class = "topTitle centerAlign nowrap"><?php echo @_DIFFICULTY; ?>
</td>
                            <td class = "topTitle centerAlign nowrap"><?php echo @_TIMESDONE; ?>
</td>
                            <td class = "topTitle centerAlign nowrap"><?php echo @_AVERAGESCORE; ?>
</td>
                        </tr>
                        <?php $_from = $this->_tpl_vars['T_QUESTIONS_INFORMATION']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['question']):
        $this->_foreach['questions_list']['iteration']++;
?>
                        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
">
                            <td><?php echo $this->_tpl_vars['question']['text']; ?>
</td>
                            <td class = "centerAlign">

                                <?php if ($this->_tpl_vars['question']['type'] == 'match'): ?>             <img src = "images/16x16/question_type_match.png"      title = "<?php echo @_MATCH; ?>
"        alt = "<?php echo @_MATCH; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['type'] == 'raw_text'): ?>      <img src = "images/16x16/question_type_free_text.png"           title = "<?php echo @_FREETEXTFILEUPLOAD; ?>
"      alt = "<?php echo @_RAWTEXT; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['type'] == 'multiple_one'): ?>  <img src = "images/16x16/question_type_one_correct.png" title = "<?php echo @_MULTIPLEONE; ?>
"  alt = "<?php echo @_MULTIPLEONE; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['type'] == 'multiple_many'): ?> <img src = "images/16x16/question_type_multiple_correct.png"         title = "<?php echo @_MULTIPLEMANY; ?>
" alt = "<?php echo @_MULTIPLEMANY; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['type'] == 'true_false'): ?>    <img src = "images/16x16/question_type_true_false.png"        title = "<?php echo @_TRUEFALSE; ?>
"    alt = "<?php echo @_TRUEFALSE; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['type'] == 'empty_spaces'): ?>  <img src = "images/16x16/question_type_empty_spaces.png"      title = "<?php echo @_EMPTYSPACES; ?>
"  alt = "<?php echo @_EMPTYSPACES; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['type'] == 'drag_drop'): ?>     <img src = "images/16x16/question_type_drag_and_drop.png"  title = "<?php echo @_DRAGNDROP; ?>
"  	alt = "<?php echo @_DRAGNDROP; ?>
" />
                                <?php endif; ?>
                            </td>
                            <td class = "centerAlign">
                                <?php if ($this->_tpl_vars['question']['difficulty'] == 'low'): ?>        <img src = "images/16x16/flag_green.png" title = "<?php echo @_LOW; ?>
"    alt = "<?php echo @_LOW; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['difficulty'] == 'medium'): ?>     <img src = "images/16x16/flag_blue.png"  title = "<?php echo @_MEDIUM; ?>
" alt = "<?php echo @_MEDIUM; ?>
" />
                                <?php elseif ($this->_tpl_vars['question']['difficulty'] == 'high'): ?>       <img src = "images/16x16/flag_red.png"   title = "<?php echo @_HIGH; ?>
"   alt = "<?php echo @_HIGH; ?>
" />
                                <?php endif; ?>
                            </td>
                            <td class = "centerAlign"><?php if ($this->_tpl_vars['question']['times_done']): ?><?php echo $this->_tpl_vars['question']['times_done']; ?>
<?php else: ?>0<?php endif; ?></td>
                            <td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['question']['avg_score']; ?>
#%</td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </table>
                </div>
                <?php endif; ?>

                <?php if (! empty ( $this->_tpl_vars['T_PROJECTS_INFORMATION'] ) && ((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'projects' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_PROJECTS; ?>
">
                    <?php $_from = $this->_tpl_vars['T_PROJECTS_INFORMATION']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['project_id'] => $this->_tpl_vars['project_info']):
?>
					<table class = "statisticsTools">
						<tr><td>
                                <a href = "javascript:void(0)" onclick = "toggleVisibility($('projects_info<?php echo $this->_tpl_vars['project_id']; ?>
'), Element.extend(this).down())">
									<img src = "images/16x16/navigate_down.png" title = "<?php echo @_SHOWHIDE; ?>
" alt = "<?php echo @_SHOWHIDE; ?>
"/><?php echo @_PROJECT; ?>
: <?php echo $this->_tpl_vars['project_info']['general']['title']; ?>
</a>
                            </td>
                        </tr>
					</table>

                    <table class = "statisticsSubInfo" id = "projects_info<?php echo $this->_tpl_vars['project_id']; ?>
" style = "display:none;">
                        <tr><td>
                                <table>
                                    <tr><td class = "topTitle" colspan = "3"><?php echo @_PROJECTINFO; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'project_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_DESCRIPTION; ?>
:</td><td><?php echo $this->_tpl_vars['project_info']['general']['data']; ?>
</td></tr>
                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'project_info','values' => 'oddRowColor, evenRowColor'), $this);?>
"><td><?php echo @_DEADLINE; ?>
:</td><td>#filter:timestamp_time-<?php echo $this->_tpl_vars['project_info']['general']['deadline']; ?>
#</td></tr>
                                </table>
                            </td></tr>
                    </table>
                    <table class = "sortedTable" sortBy = "0">
                        <tr>
                        	<td style = "" class = "topTitle"><?php echo @_USER; ?>
</td>
                        	<td style = "min-width:100px;" class = "topTitle centerAlign"><?php echo @_GRADE; ?>
</td>
                        	<td class = "topTitle"><?php echo @_DATE; ?>
</td>
                        </tr>
                    	<?php $_from = $this->_tpl_vars['project_info']['done']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['done_projects_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['done_projects_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['info']):
        $this->_foreach['done_projects_list']['iteration']++;
?>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'done_tests','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td><a href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['info']['users_LOGIN']; ?>
">#filter:login-<?php echo $this->_tpl_vars['info']['users_LOGIN']; ?>
#</a></td>
                            <td style = "width:100px;" class = "progressCell">
                                <span style = "display:none"><?php echo $this->_tpl_vars['info']['grade']; ?>
</span>
                                <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['info']['grade']; ?>
#%</span>
                                <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['info']['grade']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
                            </td>
                            <td>#filter:timestamp_time-<?php echo $this->_tpl_vars['info']['upload_timestamp']; ?>
#</td>
                        </tr>
                    	<?php endforeach; else: ?>
                        <tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NOONEHASBEENASSIGNEDTHISPROJECT; ?>
</td></tr>
                    	<?php endif; unset($_from); ?>
               		</table>
                	<br/>
                	<?php endforeach; endif; unset($_from); ?>
                </div>
                <?php endif; ?>

                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'overall' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_MOREINFO; ?>
">
                    <table class = "statisticsGeneralInfo">
                        <tr class = "defaultRowHeight">
                            <td class = "topTitle" colspan = "3"><?php echo @_GENERALLESSONINFO; ?>
</td>
                        </tr>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'general_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_PRICE; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['price_string']; ?>
</td>
                        </tr>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'general_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_ACTIVENEUTRAL; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['active_string']; ?>
</td>
                        </tr>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'general_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_LANGUAGE; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['language']; ?>
</td>
                        </tr>
                        <tr>
                            <td class = "topTitle leftAlign" colspan = "3"><?php echo @_LESSONPARTICIPATIONINFO; ?>
</td>
                        </tr>
						<?php if (((is_array($_tmp='comments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
							<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'participation_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
								<td class = "labelCell"><?php echo @_COMMENTS; ?>
:</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['comments']; ?>
</td>
							</tr>
						<?php endif; ?>
						<?php if (((is_array($_tmp='forum')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
							<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'participation_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
								<td  class = "labelCell"><?php echo @_FORUMPOSTS; ?>
:</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['messages']; ?>
</td>
							</tr>
						<?php endif; ?>
                        <tr>
                            <td class = "topTitle leftAlign" colspan = "3"><?php echo @_LESSONCONTENTINFO; ?>
</td>
                        </tr>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'content_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_THEORY; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['theory']; ?>
</td>
                        </tr>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'content_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_EXAMPLES; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['examples']; ?>
</td>
                        </tr>
						<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'content_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_PROJECTS; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['projects']; ?>
</td>
                        </tr>
						<?php endif; ?>
						<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
						<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'content_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_TESTS; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_LESSON_INFO']['tests']; ?>
</td>
                        </tr>
						<?php endif; ?>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('name' => 'content_lesson_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_TOTAL; ?>
:</td>

							<?php $this->assign('x', $this->_tpl_vars['T_LESSON_INFO']['theory']); ?>
							<?php $this->assign('y', $this->_tpl_vars['T_LESSON_INFO']['examples']); ?>
							<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
								<?php $this->assign('z', $this->_tpl_vars['T_LESSON_INFO']['projects']); ?>
							<?php else: ?>
								<?php $this->assign('z', 0); ?>
							<?php endif; ?>
							<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
								<?php $this->assign('k', $this->_tpl_vars['T_LESSON_INFO']['tests']); ?>
							<?php else: ?>
								<?php $this->assign('k', 0); ?>
							<?php endif; ?>
							<td><?php echo smarty_function_math(array('equation' => "x + y +z + k",'x' => $this->_tpl_vars['x'],'y' => $this->_tpl_vars['y'],'z' => $this->_tpl_vars['z'],'k' => $this->_tpl_vars['k']), $this);?>
</td>

						</tr>
                    </table>
                </div>

                <?php if (( $this->_tpl_vars['T_BASIC_TYPE'] == 'administrator' || $this->_tpl_vars['T_ISPROFESSOR'] == true )): ?>
                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'traffic' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_TRAFFIC; ?>
">
                    <table class = "statisticsGeneralInfo">
                    	<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
                        <tr><td class = "topTitle" colspan = "2"><?php echo @_TOTALACTIVELESSONTIME; ?>
</td></tr>
                        <?php else: ?>
                        <tr><td class = "topTitle" colspan = "2"><?php echo @_TIMEINLESSON; ?>
</td></tr>
                        <?php endif; ?>
                        <tr class = "evenRowColor">
                    		<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
                            <td class = "labelCell"><?php echo @_ACTIVETIMEINLESSON; ?>
: </td>
                            <?php else: ?>
                            <td class = "labelCell"><?php echo @_TOTALTIME; ?>
: </td>
							<?php endif; ?>                            
                            <td class = "elementCell">
                                <?php if ($this->_tpl_vars['T_LESSON_TRAFFIC']['total_seconds']): ?>
                                	<?php if ($this->_tpl_vars['T_LESSON_TRAFFIC']['total_time']['hours']): ?><?php echo $this->_tpl_vars['T_LESSON_TRAFFIC']['total_time']['hours']; ?>
<?php echo @_HOURSSHORTHAND; ?>
 <?php endif; ?>
                                	<?php if ($this->_tpl_vars['T_LESSON_TRAFFIC']['total_time']['minutes']): ?><?php echo $this->_tpl_vars['T_LESSON_TRAFFIC']['total_time']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 <?php endif; ?>
                                	<?php if ($this->_tpl_vars['T_LESSON_TRAFFIC']['total_time']['seconds']): ?><?php echo $this->_tpl_vars['T_LESSON_TRAFFIC']['total_time']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?>
                                <?php else: ?>
                                	<?php echo @_NOACCESSDATA; ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>

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
                    <table class = "sortedTable">
                        <tr>
                            <td class = "topTitle"><?php echo @_LOGIN; ?>
</td>
                            <?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
                            <td class = "topTitle centerAlign"><?php echo @_ACTIVETIMEINLESSON; ?>
</td>
                            <?php else: ?>
                            <td class = "topTitle centerAlign"><?php echo @_TIMEINLESSON; ?>
</td>
                            <?php endif; ?>
                                                    </tr>
                        <?php $_from = $this->_tpl_vars['T_LESSON_TRAFFIC']['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user_traffic_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user_traffic_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['login'] => $this->_tpl_vars['info']):
        $this->_foreach['user_traffic_list']['iteration']++;
?>
                            <tr class = "<?php echo smarty_function_cycle(array('name' => 'usertraffic','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                                <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['login']; ?>
">#filter:login-<?php echo $this->_tpl_vars['login']; ?>
#</a></td>
                                <td class = "centerAlign"><span style = "display:none"><?php echo $this->_tpl_vars['info']['total_seconds']; ?>
&nbsp;</span><?php echo $this->_tpl_vars['info']['time_string']; ?>
</td>
                                
                            </tr>
                        <?php endforeach; else: ?>
                        	<tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
                        <?php endif; unset($_from); ?>
                    </table>
                    <?php if (isset ( $this->_tpl_vars['T_LESSON_LOG'] )): ?>
                    <br/>
                    <table class = "statisticsTools">
                        <tr><td><?php echo @_ANALYTICLOG; ?>
</td></tr>
                    </table>
                    <table>
                		<tr>
                            <td class = "topTitle"><?php echo @_LOGIN; ?>
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
	                    <?php $_from = $this->_tpl_vars['T_LESSON_LOG']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_log_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_log_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['info']):
        $this->_foreach['lesson_log_loop']['iteration']++;
?>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'lesson_log_list','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td>#filter:login-<?php echo $this->_tpl_vars['info']['users_LOGIN']; ?>
#</td>
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
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
		<div id = "graph_table" style = "display:none"><div id = "proto_chart" class = "proto_graph"></div></div>
    <?php $this->_smarty_vars['capture']['lesson_statistics'] = ob_get_contents(); ob_end_clean(); ?>
    <?php if ($this->_tpl_vars['T_CURRENT_LESSON_INFO']): ?>
    	<?php echo smarty_function_eF_template_printBlock(array('title' => (@_STATISTICSFORLESSON)." <span class='innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_LESSON_INFO']->lesson['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['lesson_statistics'],'image' => '32x32/reports.png','help' => 'Reports'), $this);?>

    <?php else: ?>
    	<?php echo smarty_function_eF_template_printBlock(array('title' => (@_STATISTICSFORLESSON),'data' => $this->_smarty_vars['capture']['lesson_statistics'],'image' => '32x32/reports.png','help' => 'Reports'), $this);?>

    <?php endif; ?>