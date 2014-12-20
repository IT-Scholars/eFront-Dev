<?php /* Smarty version 2.6.27, created on 2014-09-15 20:45:55
         compiled from includes/progress.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'str_replace', 'includes/progress.tpl', 24, false),array('modifier', 'mb_strtolower', 'includes/progress.tpl', 52, false),array('modifier', 'sizeof', 'includes/progress.tpl', 69, false),array('function', 'eF_template_printBlock', 'includes/progress.tpl', 168, false),array('function', 'cycle', 'includes/progress.tpl', 188, false),)), $this); ?>
    <?php ob_start(); ?>
	<tr><td class = "moduleCell">
	<?php if ($_GET['edit_user'] || $this->_tpl_vars['_student_']): ?>
	    <?php ob_start(); ?>
	        <?php if ($this->_tpl_vars['T_CONDITIONS']): ?>
	        <fieldset class = "fieldsetSeparator">
	            <legend><?php echo @_LESSONCONDITIONS; ?>
</legend>
	            <table>
	                <?php $_from = $this->_tpl_vars['T_CONDITIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['conditions_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['conditions_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['condition']):
        $this->_foreach['conditions_loop']['iteration']++;
?>
	                    <tr><td style = "color:<?php if ($this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?>green<?php else: ?>red<?php endif; ?>">
	                    <?php if ($this->_foreach['conditions_loop']['total'] > 1): ?><?php if ($this->_tpl_vars['condition']['relation'] == 'and'): ?>&nbsp;<?php echo @_AND; ?>
&nbsp;<?php else: ?>&nbsp;<?php echo @_OR; ?>
&nbsp;<?php endif; ?><?php endif; ?>
	                    <?php if ($this->_tpl_vars['condition']['type'] == 'all_units'): ?>
	                        <?php echo @_MUSTSEEALLUNITS; ?>
<?php if (! $this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?><img src = "images/16x16/forbidden.png" title = "<?php echo @_CONDITIONNOTMET; ?>
" alt = "<?php echo @_CONDITIONNOTMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php else: ?><img src = "images/16x16/success.png"  title = "<?php echo @_CONDITIONMET; ?>
" alt = "<?php echo @_CONDITIONMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php endif; ?>
	                    <?php elseif ($this->_tpl_vars['condition']['type'] == 'percentage_units'): ?>
	                        <?php echo @_MUSTSEE; ?>
 <?php echo $this->_tpl_vars['condition']['options']['0']; ?>
% <?php echo @_OFLESSONUNITS; ?>
<?php if (! $this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?><img src = "images/16x16/forbidden.png" title = "<?php echo @_CONDITIONNOTMET; ?>
" alt = "<?php echo @_CONDITIONNOTMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php else: ?><img src = "images/16x16/success.png"  title = "<?php echo @_CONDITIONMET; ?>
" alt = "<?php echo @_CONDITIONMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php endif; ?>
	                    <?php elseif ($this->_tpl_vars['condition']['type'] == 'specific_unit'): ?>
	                        <?php echo @_MUSTSEEUNIT; ?>
 &quot;<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['condition']['options']['0']]; ?>
&quot;<?php if (! $this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?><img src = "images/16x16/forbidden.png" title = "<?php echo @_CONDITIONNOTMET; ?>
" alt = "<?php echo @_CONDITIONNOTMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php else: ?><img src = "images/16x16/success.png"  title = "<?php echo @_CONDITIONMET; ?>
" alt = "<?php echo @_CONDITIONMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php endif; ?>
	                    <?php elseif ($this->_tpl_vars['condition']['type'] == 'all_tests'): ?>
	                        <?php echo @_MUSTCOMPLETEALLTESTS; ?>
<?php if (! $this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?><img src = "images/16x16/forbidden.png" title = "<?php echo @_CONDITIONNOTMET; ?>
" alt = "<?php echo @_CONDITIONNOTMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php else: ?><img src = "images/16x16/success.png"  title = "<?php echo @_CONDITIONMET; ?>
" alt = "<?php echo @_CONDITIONMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php endif; ?>
	                    <?php elseif ($this->_tpl_vars['condition']['type'] == 'specific_test'): ?>
	                        <?php echo @_MUSTCOMPLETETEST; ?>
 &quot;<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['condition']['options']['0']]; ?>
&quot;<?php if (! $this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?><img src = "images/16x16/forbidden.png" title = "<?php echo @_CONDITIONNOTMET; ?>
" alt = "<?php echo @_CONDITIONNOTMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php else: ?><img src = "images/16x16/success.png"  title = "<?php echo @_CONDITIONMET; ?>
" alt = "<?php echo @_CONDITIONMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php endif; ?>
		                <?php elseif ($this->_tpl_vars['condition']['type'] == 'time_in_lesson'): ?>
		                    <?php echo ((is_array($_tmp="%x")) ? $this->_run_mod_handler('str_replace', true, $_tmp, $this->_tpl_vars['condition']['options']['0'], @_MUSTSPENDXMINUTESINLESSON) : str_replace($_tmp, $this->_tpl_vars['condition']['options']['0'], @_MUSTSPENDXMINUTESINLESSON)); ?>

	                    <?php endif; ?>
	                        </td></tr>
	                <?php endforeach; endif; unset($_from); ?>
	            </table>
	        </fieldset>
	        <?php endif; ?>
	        <fieldset class = "fieldsetSeparator">
	            <legend><?php echo @_LESSONPROGRESS; ?>
</legend>
	            <table>
	            	<?php if ($this->_tpl_vars['T_CONFIGURATION']['time_reports'] == 1): ?>
		            <tr><td colspan = "3"><?php echo @_ACTIVETIMEINLESSON; ?>
: <?php echo $this->_tpl_vars['T_USER_TIME']['time_string']; ?>
</td></tr>
		            <?php else: ?>
		            <tr><td colspan = "3"><?php echo @_TIMEINLESSON; ?>
: <?php echo $this->_tpl_vars['T_USER_TIME']['time_string']; ?>
</td></tr>
		            <?php endif; ?>
		            <tr><td><?php echo @_OVERALLPROGRESS; ?>
:&nbsp;</td>
		                <td class = "progressCell">
		                    <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['T_USER_LESSONS_INFO']['overall_progress']['percentage']; ?>
#%</span>
		                    <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['T_USER_LESSONS_INFO']['overall_progress']['percentage']; ?>
px;">&nbsp;</span>
		                </td><td></td>
		            </tr>
		            <tr><td style = "padding-bottom:15px"><?php echo @_AVERAGETESTSCOREOFACTIVEEXECUTIONS; ?>
:&nbsp;</td>
		                <td class = "progressCell">
		                    <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['T_USER_LESSONS_INFO']['test_status']['mean_score']; ?>
#%</span>
		                    <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['T_USER_LESSONS_INFO']['test_status']['mean_score']; ?>
px;">&nbsp;</span>
		                </td><td></td>
		            </tr>
              <?php $_from = $this->_tpl_vars['T_USER_LESSONS_INFO']['done_tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['done_tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['done_tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['test']):
        $this->_foreach['done_tests_list']['iteration']++;
?>
              <tr><td><?php echo @_TEST; ?>
 <span class = "innerTableName">&quot;<?php echo $this->_tpl_vars['test']['name']; ?>
&quot;</span> (<?php echo @_AVERAGESCOREON; ?>
 <?php echo $this->_tpl_vars['test']['times_done']; ?>
 <?php if ($this->_tpl_vars['test']['times_done'] == 1): ?><?php echo mb_strtolower(@_EXECUTION); ?>
<?php else: ?><?php echo mb_strtolower(@_EXECUTIONS); ?>
<?php endif; ?>):&nbsp;</td>
                  <td class = "progressCell">
                      <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['test']['score']; ?>
#%</span>
                      <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['test']['score']; ?>
px;">&nbsp;</span>
                  </td><td></td>
              </tr>
              <tr><td style = "padding-bottom:10px"><?php echo @_TEST; ?>
 <span class = "innerTableName">&quot;<?php echo $this->_tpl_vars['test']['name']; ?>
&quot;</span> (<?php echo @_SCOREONACTIVEEXECUTION; ?>
):&nbsp;</td>
                  <td class = "progressCell">
                      <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['test']['active_score']; ?>
#%</span>
                      <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['test']['active_score']; ?>
px;">&nbsp;</span>
                  </td><td>
                      <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php if ($this->_tpl_vars['_student_']): ?>content&view_unit=<?php echo $this->_tpl_vars['test']['content_ID']; ?>
<?php else: ?>tests<?php endif; ?>&show_solved_test=<?php echo $this->_tpl_vars['test']['active_test_id']; ?>
">
                          <img class = "handle" src = "images/16x16/search.png" title = "<?php echo @_VIEWTEST; ?>
" alt = "<?php echo @_VIEWTEST; ?>
">
                      </a>
                  </td>
              </tr>
              <?php endforeach; else: ?>
              	<?php if (sizeof($this->_tpl_vars['T_USER_LESSONS_INFO']['scorm_done_tests']) == 0): ?>
              		<tr><td colspan = "3" class = "emptyCategory"><?php echo @_TESTS; ?>
: <?php echo @_NODATAFOUND; ?>
</td></tr>
				<?php endif; ?>
              <?php endif; unset($_from); ?>
              <?php $_from = $this->_tpl_vars['T_USER_LESSONS_INFO']['scorm_done_tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['scorm_done_tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['scorm_done_tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['test']):
        $this->_foreach['scorm_done_tests_list']['iteration']++;
?>
              <tr><td><?php echo @_TEST; ?>
 <span class = "innerTableName">&quot;<?php echo $this->_tpl_vars['test']['name']; ?>
&quot;</span></td>
                  <td class = "progressCell">
                      <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['test']['score']; ?>
#%</span>
                      <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['test']['score']; ?>
px;">&nbsp;</span>
                  </td><td></td>
              </tr>
              <?php endforeach; endif; unset($_from); ?>
              <?php $_from = $this->_tpl_vars['T_PENDING_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pending_tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pending_tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['name']):
        $this->_foreach['pending_tests_list']['iteration']++;
?>
                  <tr><td><?php echo @_TEST; ?>
 <span class = "innerTableName">&quot;<?php echo $this->_tpl_vars['name']; ?>
&quot;</span>:</td>
                      <td class = "emptyCategory" colspan = "2"><?php echo @_USERHASNOTDONETEST; ?>
</td>
                  </tr>
              <?php endforeach; endif; unset($_from); ?>



		            <?php if ($this->_tpl_vars['T_USER_PROJECTS']): ?>
		            <tr><td style = "padding-top:15px;padding-bottom:15px"><?php echo @_AVERAGEPROJECTSCORE; ?>
:&nbsp;</td>
		                <td class = "progressCell" style = "padding-top:15px">
		                    <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['T_USER_LESSONS_INFO']['project_status']['mean_score']; ?>
#%</span>
		                    <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['T_USER_LESSONS_INFO']['project_status']['mean_score']; ?>
px;">&nbsp;</span>
		               </td><td></td>
		            </tr>
		            <?php endif; ?>

		            <?php $_from = $this->_tpl_vars['T_USER_PROJECTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['done_projects_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['done_projects_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['project']):
        $this->_foreach['done_projects_list']['iteration']++;
?>
		                <tr><td><?php echo @_PROJECT; ?>
 <span class = "innerTableName">&quot;<?php echo $this->_tpl_vars['project']['title']; ?>
&quot;</span>:</td>
		                <?php if ($this->_tpl_vars['project']['grade']): ?>
		                    <td class = "progressCell">
		                        <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['project']['grade']; ?>
#%</span>
		                        <span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['project']['grade']; ?>
px;">&nbsp;</span>
		                    </td><td>
		                        <?php if ($this->_tpl_vars['project']['timestamp']): ?>(#filter:timestamp-<?php echo $this->_tpl_vars['project']['timestamp']; ?>
#) &nbsp;<?php endif; ?>
		                    </td>
		                <?php else: ?>
		                    <td class = "emptyCategory" colspan = "2"><?php echo @_PROJECTPENDING; ?>
</td>
		                <?php endif; ?>
		                </tr>
		            <?php endforeach; else: ?>
		                <tr><td colspan = "3" class = "emptyCategory"><?php echo @_PROJECTS; ?>
: <?php echo @_NODATAFOUND; ?>
</td></tr>
		            <?php endif; unset($_from); ?>
		        </table>
	        </fieldset>

	        <?php if (@G_VERSIONTYPE == 'enterprise'): ?> 	        <fieldset class = "fieldsetSeparator">
	            <legend><?php echo @_EVALUATIONS; ?>
</legend>
					<table width="100%">
                    <?php $_from = $this->_tpl_vars['T_EVALUATIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['evaluation'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['evaluation']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['evaluation']):
        $this->_foreach['evaluation']['iteration']++;
?>
                            <tr><td width="10%">#filter:timestamp-<?php echo $this->_tpl_vars['evaluation']['timestamp']; ?>
#:&nbsp;</td><td class = "elementFormCell"><?php echo $this->_tpl_vars['evaluation']['specification']; ?>
&nbsp;[<?php echo $this->_tpl_vars['evaluation']['surname']; ?>
&nbsp;<?php echo $this->_tpl_vars['evaluation']['name']; ?>
]</td></tr>
                    <?php endforeach; else: ?>
                            <tr><td colspan=3><?php echo @_NOEVALUATIONSASSIGNEDYET; ?>
</td></tr>
                    <?php endif; unset($_from); ?>
                    </table>
	            </form>
	        </fieldset>
	        <?php endif; ?> 
	        <fieldset class = "fieldsetSeparator">
	            <legend><?php echo @_COMPLETELESSON; ?>
</legend>
	            <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['javascript']; ?>

	            <form <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['attributes']; ?>
>
	                <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['hidden']; ?>

	                <table class = "formElements">
	                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['completed']['label']; ?>
&nbsp;:</td>
	                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['completed']['html']; ?>
</td></tr>
	                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['score']['label']; ?>
&nbsp;:</td>
	                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['score']['html']; ?>
</td></tr>
	                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['score']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['score']['error']; ?>
</td></tr><?php endif; ?>
	                    <?php if ($this->_tpl_vars['T_STUDENT_ROLE'] != true): ?>
							<tr><td></td>
								<td><span>
								<img onclick = "toggledInstanceEditor = 'comments';javascript:toggleEditor('comments','simpleEditor');" class = "handle"  style="vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
								<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'comments';javascript:toggleEditor('comments','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
								</span></td>
							</tr>
						<?php endif; ?>
						<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['comments']['label']; ?>
&nbsp;:</td>
	                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['comments']['html']; ?>
</td></tr>
	                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['comments']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['comments']['error']; ?>
</td></tr><?php endif; ?>
	                    <tr><td colspan = "100%">&nbsp;</td></tr>
	                    <tr><td></td><td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['submit_lesson_complete']['html']; ?>
</td></tr>
	                </table>
	            </form>
	        </fieldset>

		   	<?php $_from = $this->_tpl_vars['T_MODULE_FIELDSETS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_fieldsets_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_fieldsets_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['fieldset']):
        $this->_foreach['module_fieldsets_list']['iteration']++;
?>
		        <fieldset class = "fieldsetSeparator">
		        	<legend><?php echo $this->_tpl_vars['fieldset']['title']; ?>
</legend>
		            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['fieldset']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		        </fieldset>
			<?php endforeach; endif; unset($_from); ?>

	    <?php $this->_smarty_vars['capture']['t_edit_progress_code'] = ob_get_contents(); ob_end_clean(); ?>

	    <?php echo smarty_function_eF_template_printBlock(array('title' => (@_PROGRESSFORUSER).": <span class = 'innerTableName'>&quot;#filter:login-".($this->_tpl_vars['T_USER_LESSONS_INFO']['users_LOGIN'])."#&quot;</span>",'data' => $this->_smarty_vars['capture']['t_edit_progress_code'],'image' => '32x32/users.png','help' => 'Users_status'), $this);?>


	<?php else: ?>
	        <?php ob_start(); ?>
	        <link rel = "stylesheet" type = "text/css" href = "js/includes/datepicker/datepicker.css" />
	<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'usersTable'): ?>
<!--ajax:usersTable-->
	                <table style = "width:100%" activeFilter = "1" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "usersTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=progress&">
	                    <tr class = "topTitle">
	                        <td class = "topTitle" name = "login"><?php echo @_USER; ?>
</td>
	                        	                        <td class = "topTitle centerAlign" name = "completed" ><?php echo @_LESSONSTATUS; ?>
</td>
	                        <td class = "topTitle centerAlign" name = "timestamp_completed" ><?php echo @_COMPLETED; ?>
</td>
	                        <td class = "topTitle centerAlign" name = "score" ><?php echo @_LESSONSCORE; ?>
</td>
	                        <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
	                        <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>
	                         	<td class = "topTitle centerAlign"><?php echo @_SELECT; ?>
</td>
	                        <?php endif; ?>
	                    </tr>
	        <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_progress_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_progress_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['login'] => $this->_tpl_vars['item']):
        $this->_foreach['users_progress_list']['iteration']++;
?>
	                    <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['item']['active']): ?>deactivatedTableElement<?php endif; ?>">
	                        <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=progress&edit_user=<?php echo $this->_tpl_vars['item']['login']; ?>
" class = "editLink">#filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
#</a></td>
	                        <td class = "centerAlign">
	                            <?php if ($this->_tpl_vars['item']['completed']): ?>
	                            	<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>
	                                	<img class = "ajaxHandle" src = "images/16x16/success.png" title = "<?php echo @_COMPLETED; ?>
" alt = "<?php echo @_COMPLETED; ?>
" onclick = "if (confirm(translations['_IRREVERSIBLEACTIONAREYOUSURE'])) changeProgressInLesson(this, '<?php echo $this->_tpl_vars['item']['login']; ?>
');" />
									<?php else: ?>
	                            	 	<img  src = "images/16x16/success.png" title = "<?php echo @_COMPLETED; ?>
" alt = "<?php echo @_COMPLETED; ?>
" />
	                            	<?php endif; ?>
								<?php else: ?>
									<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>
	                            		<img class = "ajaxHandle" src = "images/16x16/forbidden.png" title = "<?php echo @_NOTCOMPLETED; ?>
" alt = "<?php echo @_NOTCOMPLETED; ?>
" onclick = "$('<?php echo $this->_tpl_vars['item']['login']; ?>
_status_id').show();" />
	                            		<input type="text" style="display:none" id="<?php echo $this->_tpl_vars['item']['login']; ?>
_status_id" class="datepicker" name="<?php echo $this->_tpl_vars['item']['login']; ?>
_status_name" value="" maxlength="10" size="7"  />									
									<?php else: ?>
	                            		<img src = "images/16x16/forbidden.png" title = "<?php echo @_NOTCOMPLETED; ?>
" alt = "<?php echo @_NOTCOMPLETED; ?>
" />
	                            	<?php endif; ?>
								<?php endif; ?>
	                        </td>
	                        
	                        <td class = "centerAlign">
	                        	<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>
									<?php if ($this->_tpl_vars['item']['completed']): ?>
		                        		<span style="cursor:pointer;" onclick = "$('<?php echo $this->_tpl_vars['item']['login']; ?>
_status_id').show();">#filter:timestamp-<?php echo $this->_tpl_vars['item']['timestamp_completed']; ?>
#</span>
		                        		<input type="text" style="display:none;" id="<?php echo $this->_tpl_vars['item']['login']; ?>
_status_id" class="datepicker" name="<?php echo $this->_tpl_vars['item']['login']; ?>
_status_name" value="" maxlength="10" size="7"  />									
									<?php endif; ?>
								<?php else: ?>
									<?php if ($this->_tpl_vars['item']['completed']): ?>
		                        		#filter:timestamp-<?php echo $this->_tpl_vars['item']['timestamp_completed']; ?>
#
		                        	<?php endif; ?>
								<?php endif; ?>	
	                        </td>
	                        
	                        <td class = "centerAlign"><?php if ($this->_tpl_vars['item']['score']): ?>#filter:score-<?php echo $this->_tpl_vars['item']['score']; ?>
#%<?php endif; ?></td>
	                        <td class = "centerAlign">
	                        <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>
	                        	<img class = "ajaxHandle" src="images/16x16/refresh.png" title="<?php echo @_RESETPROGRESSDATA; ?>
" alt="<?php echo @_RESETPROGRESSDATA; ?>
" onclick = "if (confirm(translations['_IRREVERSIBLEACTIONAREYOUSURE'])) resetProgressInLesson(this, '<?php echo $this->_tpl_vars['item']['login']; ?>
');">
	                        <?php endif; ?>  
	                            <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=progress&edit_user=<?php echo $this->_tpl_vars['item']['login']; ?>
" title = "<?php echo @_VIEWUSERLESSONPROGRESS; ?>
">
	                                <img src = "images/16x16/search.png" title = "<?php echo @_VIEWUSERLESSONPROGRESS; ?>
" alt = "<?php echo @_VIEWUSERLESSONPROGRESS; ?>
" border = "0"/>
	                            </a>
	                        </td>
	                        <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>
	                         	 <td class = "centerAlign"><input class = "inputCheckbox" type = "checkbox" id = "check_<?php echo $this->_tpl_vars['item']['login']; ?>
" value = "<?php echo $this->_tpl_vars['item']['login']; ?>
"/></td>
	                        <?php endif; ?>
	                    </tr>

	        <?php endforeach; else: ?>
	                <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NOUSERDATAFOUND; ?>
</td></tr>
	        <?php endif; unset($_from); ?>
	            </table>           
<!--/ajax:usersTable-->
            <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['progress'] == 'change'): ?>            
	            <div class = "horizontalSeparatorAbove">
	            	<span style = "vertical-align:middle"><?php echo @_WITHSELECTED; ?>
:</span>
	            	<img id = "all_image_id" class = "ajaxHandle" src = "images/16x16/success.png" title = "<?php echo @_SETALLTOCOMPLETED; ?>
" alt = "<?php echo @_SETALLTOCOMPLETED; ?>
" onclick = "$('all_status_id').show();">
	            	<img class = "ajaxHandle" src = "images/16x16/forbidden.png" title = "<?php echo @_SETALLTOUNCOMPLETED; ?>
" alt = "<?php echo @_SETALLTOUNCOMPLETED; ?>
" onclick = "uncompleteSelected(this, 'usersTable');">      
	            	<input type="text" style="display:none" id="all_status_id" class="datepicker" name="all_status_name" value="" maxlength="10" size="7"  />      				 
	            </div>
	        <?php endif; ?>
			<script type="text/javascript">	   
			<?php echo '
			function init_date_picker(login) { 
			new DatePicker({  
			     relative:login, 
			     dateFormat: [["dd","mm","yyyy"], "-" ],
			     cellCallback : callbackfunction
			});     
			}
			function callbackfunction(cell, id) {
				if (id != \'all_status_id\') {
					var login = id.replace("_status_id", "");
					changeProgressInLesson($(id), login, $(id).value)
				} else {
					completeSelected($(\'all_image_id\'), \'usersTable\', $(id).value);
				}
			}
			'; ?>
  
			</script>
<?php endif; ?>

	        <?php $this->_smarty_vars['capture']['t_progress_code'] = ob_get_contents(); ob_end_clean(); ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => @_USERSPROGRESS,'data' => $this->_smarty_vars['capture']['t_progress_code'],'image' => '32x32/users.png','help' => 'Users_status'), $this);?>

	<?php endif; ?>
	</td></tr>
	<?php $this->_smarty_vars['capture']['moduleProgress'] = ob_get_contents(); ob_end_clean(); ?>