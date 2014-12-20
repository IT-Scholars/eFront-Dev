<?php /* Smarty version 2.6.27, created on 2014-11-07 13:13:17
         compiled from includes/digests.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/digests.tpl', 246, false),array('function', 'cycle', 'includes/digests.tpl', 314, false),array('modifier', 'eF_truncate', 'includes/digests.tpl', 380, false),)), $this); ?>

<script>
	<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 		var isenterprise = true;
    <?php else: ?> 		var isenterprise = false;
    <?php endif; ?> </script>

<script>translationsToJS['_ACTIVATE'] = '<?php echo @_ACTIVATE; ?>
'; translationsToJS['_DEACTIVATE'] = '<?php echo @_DEACTIVATE; ?>
';</script>
<?php if (isset ( $_GET['add_notification'] ) || isset ( $_GET['edit_notification'] )): ?>
	<script>
	var noRecipientsHaveBeenSelected = "<?php echo @_NORECIPIENTSHAVEBEENSELECTED; ?>
";
	var theFieldConst = "<?php echo @_THEFIELD; ?>
";
	var subjectConst  =	"<?php echo @_SUBJECT; ?>
";
	var isMandatoryConst = "<?php echo @_ISMANDATORY; ?>
";
	var basicTemplated 	= '<?php echo $this->_tpl_vars['T_BASIC_TEMPLATED']; ?>
';
	var basicEventRecipients = '<?php echo $this->_tpl_vars['T_BASIC_EVENT_RECIPIENTS']; ?>
';

	var allLessonEventRecipients = "<?php echo $this->_tpl_vars['T_LESSON_EVENT_RECIPIENTS']['alllesson']; ?>
";
	var allLessonUsersConst = "<?php echo @_ALLLESSONUSERS; ?>
";
	var lessonProf = "<?php echo $this->_tpl_vars['T_LESSON_EVENT_RECIPIENTS']['lessonprof']; ?>
";
	var lessonProfessorsConst = "<?php echo @_LESSONPROFESSORS; ?>
";
	var lessonNotCompleted = "<?php echo $this->_tpl_vars['T_LESSON_EVENT_RECIPIENTS']['lessonnotcompleted']; ?>
";
	var lessonNotCompletedConst = "<?php echo @_LESSONUSERSNOTCOMPLETED; ?>
";
	var expicitlySelected = "<?php echo $this->_tpl_vars['T_LESSON_EVENT_RECIPIENTS']['explicitlyselected']; ?>
";
	var expicitlySelectedConst = "<?php echo @_EXPLICITLYSELECTED; ?>
";

	var courseProf = "<?php echo $this->_tpl_vars['T_COURSE_EVENT_RECIPIENTS']['courseprof']; ?>
";
	var courseProfessorsConst = "<?php echo @_COURSEPROFESSORS; ?>
";
	var allCourseEventRecipients = "<?php echo $this->_tpl_vars['T_COURSE_EVENT_RECIPIENTS']['allcourse']; ?>
";
	var allCourseUsersConst = "<?php echo @_ALLCOURSEUSERS; ?>
";
	var courseStartDateConst = "<?php echo @_COURSESTARTDATE; ?>
";
	var courseEndDateConst = "<?php echo @_COURSEENDDATE; ?>
";

	var lessonsNameConst = "<?php echo @_LESSONNAME; ?>
";
	var courseNameConst = "<?php echo @_COURSENAME; ?>
";
	var testNameConst = "<?php echo @_TESTNAME; ?>
";
	var announcementTitleConst = "<?php echo @_ANNOUNCEMENTTITLE; ?>
";
	var announcementBodyConst = "<?php echo @_ANNOUNCEMENTBODY; ?>
";
	var unitNameConst = "<?php echo @_UNITNAME; ?>
";
	var unitContentConst = "<?php echo @_UNITCONTENT; ?>
";
	var surveyNameConst = "<?php echo @_SURVEYNAME; ?>
";
	var surveyIdConst = "<?php echo @_SURVEYID; ?>
";
	var surveyMessageConst = "<?php echo @_SURVEYMESSAGE; ?>
";
	var projectNameConst = "<?php echo @_PROJECTNAME; ?>
";
	var projectIdConst = "<?php echo @_PROJECTID; ?>
";
	
	var branchNameConst = "<?php echo @_BRANCHNAME; ?>
";
	var jobNameConst = "<?php echo @_JOBDESCRIPTIONNAME; ?>
";

	var timeAfterEvent = "<?php echo @_TIMEAFTEREVENT; ?>
";
	var timeBeforeEvent = "<?php echo @_TIMEBEFOREEVENT; ?>
";
	var everyConst = "<?php echo @_EVERY; ?>
";
	var startingFrom = "<?php echo @_STARTINGFROM; ?>
";
	var onConst = "<?php echo @_ON; ?>
";

	var trigUserNameConst = "<?php echo @_TRIGGERINGUSERSNAME; ?>
";
	var trigUserSurnConst = "<?php echo @_TRIGGERINGUSERSSURNAME; ?>
";
	var trigUserLogiConst = "<?php echo @_TRIGGERINGUSERSLOGIN; ?>
";
	var trigUserTypeConst = "<?php echo @_TRIGGERINGUSERSTYPE; ?>
";
	var trigUserEmailConst = "<?php echo @_TRIGGERINGUSERSEMAIL; ?>
";

	var addEditNotification = true;
	</script>
<script>
var customFieldsConsts 	= new Array();
var customFieldsKeys 	= new Array();
<?php $_from = $this->_tpl_vars['T_USERCUSTOMFIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['custom_fields_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['custom_fields_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['field']):
        $this->_foreach['custom_fields_list']['iteration']++;
?>
	customFieldsConsts.push("<?php echo $this->_tpl_vars['field']; ?>
");          
	customFieldsKeys.push("<?php echo $this->_tpl_vars['key']; ?>
");
<?php endforeach; endif; unset($_from); ?>	
</script>  
	<?php ob_start(); ?>
	        <?php echo $this->_tpl_vars['T_DIGESTS_FORM']['javascript']; ?>

	        <form <?php echo $this->_tpl_vars['T_DIGESTS_FORM']['attributes']; ?>
>
	            <?php echo $this->_tpl_vars['T_DIGESTS_FORM']['hidden']; ?>


				<?php if (@G_VERSIONTYPE != 'community'): ?>						<?php if (@G_VERSIONTYPE != 'standard'): ?> 	         		<fieldset class = "fieldsetSeparator">
				    <legend><?php echo @_NOTIFICATIONTIME; ?>
</legend>
					<table class="formElements">
	                    <tr><td class = "fixedLabelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['type']['label']; ?>
:&nbsp;</td>
	                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['type']['html']; ?>
</td><td id = "send_immediately_row" style="display:none"><table><tr><td> <?php echo $this->_tpl_vars['T_DIGESTS_FORM']['send_immediately']['html']; ?>
</td><td> (<?php echo $this->_tpl_vars['T_DIGESTS_FORM']['send_immediately']['label']; ?>
) </td></tr></table></td></tr>
	                </table>


					<div id="on_date" <?php if (isset ( $this->_tpl_vars['T_EVENT_FORM'] )): ?>style="display:none"<?php endif; ?>>
						<table class="formElements">
		                    <tr><td class = "fixedLabelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['when']['label']; ?>
:&nbsp;</td>
		                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['when']['html']; ?>
</td></tr>

		                    <tr id = "specific_date_row"><td class = "fixedLabelCell" id = "specific_date_label"><?php if ($this->_tpl_vars['T_SHOW_SEND_INTERVAL']): ?><?php echo @_STARTINGFROM; ?>
<?php else: ?><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['timestamp']['label']; ?>
<?php endif; ?>:&nbsp;</td>
		                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['timestamp']['html']; ?>
</td></tr>
		                 </table>
					</div>

					<div id="send_interval_div" <?php if (! isset ( $this->_tpl_vars['T_SHOW_SEND_INTERVAL'] ) && $this->_tpl_vars['T_EVENT_FORM'] != '2'): ?>style= "display:none"<?php endif; ?>>
						<table class="formElements">

		                    <tr><td class = "fixedLabelCell" id = "send_interval_label" ><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['send_interval']['label']; ?>
:&nbsp;</td>
		                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['send_interval']['html']; ?>
</td></tr>
		                </table>
					</div>

					<div id="on_after_event" <?php if (! isset ( $this->_tpl_vars['T_EVENT_FORM'] )): ?>style="display:none"<?php endif; ?>>
						<table class="formElements">
		                    <tr id = "events_category_row"><td class = "fixedLabelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['event_types']['label']; ?>
:&nbsp;</td>
		                        <td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['event_types']['html']; ?>
<?php echo $this->_tpl_vars['T_DIGESTS_FORM']['event_types_after']['html']; ?>
<?php echo $this->_tpl_vars['T_DIGESTS_FORM']['event_types_before']['html']; ?>
</td></tr>

		                </table>

		                <div  id = "av_tests_div" style="display:none">
						<table class="formElements">
		                    <tr><td class = "fixedLabelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['available_tests']['label']; ?>
:&nbsp;</td>
		                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['available_tests']['html']; ?>
</td></tr>
		                </table>
		                </div>
		                <div  id = "av_lessons_div" style="display:none">
						<table class="formElements">
		                    <tr><td class = "fixedLabelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['available_lessons']['label']; ?>
:&nbsp;</td>
		                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['available_lessons']['html']; ?>
</td></tr>
						</table>

		                </div>
		                <div  id = "av_courses_div" style="display:none">
						<table class="formElements">
							<tr><td class = "fixedLabelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['available_courses']['label']; ?>
:&nbsp;</td>
		                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['available_courses']['html']; ?>
</td></tr>
						</table>
						</div>
	</div>


                        <div id="recipients" <?php if (isset ( $this->_tpl_vars['T_EVENT_FORM'] )): ?>style="display:none"<?php endif; ?>>
	                        <table class="formElements">
								<tr><td class = "fixedLabelCell" style="vertical-align:top"><?php echo @_RECIPIENTS; ?>
:&nbsp;</td>
			                        <td colspan=3 style="white-space:nowrap;">
			                    		<table>
			                    			<tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['active_users']['html']; ?>
   </td><td align="left"><?php echo @_ALLACTIVESYSTEMUSERS; ?>
</td><td><a href ="javascript:void(0);" onclick="show_hide_additional_recipients();"><img id="arrow_down" src="images/16x16/navigate_down.png" border="0" alt="<?php echo @_SHOWRECIPIENTSCATEGORIES; ?>
" title="<?php echo @_SHOWRECIPIENTSCATEGORIES; ?>
"/><img id="arrow_up" src="images/16x16/navigate_up.png" border="0" alt="<?php echo @_HIDERECIPIENTSCATEGORIES; ?>
" title="<?php echo @_HIDERECIPIENTSCATEGORIES; ?>
" style="display:none;" /></a></td></tr>
			                    		</table>

			                    		<div id="additional_recipients_categories" style="display:none">
				                    		<table>
				                        	<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 		                                        
												<tr style = ""><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['supervisors']['html']; ?>
</td><td width="27%"><?php echo @_ALLSUPERVISORS; ?>
:&nbsp;</td></tr>

		                                        <tr <?php if (! $this->_tpl_vars['T_COURSES']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_course']['html']; ?>
</td><td width="27%"><?php echo @_USERSCONNECTEDTOSPECIFICCOURSE; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['specific_course']['html']; ?>
</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['specific_course_completed']['html']; ?>
</td><td id="specific_course_completed_label" style="visibility:hidden"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['specific_course_completed']['label']; ?>
</td></tr>
		                                        <tr <?php if (! $this->_tpl_vars['T_LESSONS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_lesson']['html']; ?>
</td><td><?php echo @_USERSCONNECTEDTOSPECIFICLESSON; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['lesson']['html']; ?>
</td></tr>
		                                        <tr <?php if (! $this->_tpl_vars['T_LESSONS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_lesson_professor']['html']; ?>
</td><td><?php echo @_PROFESSORSOFLESSON; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['professor']['html']; ?>
</td></tr>
		                                        <!--
		                                        <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_branch_job_description']['html']; ?>
</td><td width="27%"><?php echo @_EMPLOYEESOFBRANCH; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['branch_recipients']['html']; ?>
</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['include_subbranches']['html']; ?>
</td><td id="include_subbranches_label" style="visibility:hidden;white-space:nowrap;">(<?php echo $this->_tpl_vars['T_DIGESTS_FORM']['include_subbranches']['label']; ?>
)</td></tr>
		                                        <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_job_description']['html']; ?>
  </td><td><?php echo @_WITHJOBDESCRIPTION; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['job_description_recipients']['html']; ?>
</td></tr>
		                                        <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_skill']['html']; ?>
  </td><td><?php echo @_EMPLOYEESWITHSKILL; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['skill_recipients']['html']; ?>
</td></tr>
		                                        -->
		                                        <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_group']['html']; ?>
  </td><td><?php echo @_EMPLOYEESINGROUP; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['group_recipients']['html']; ?>
</td></tr>
		                                        <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_type']['html']; ?>
  </td><td><?php echo @_SPECIFICTYPEUSERS; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['user_type']['html']; ?>
</td></tr>

		                                    <?php else: ?> 		                                         		                                         <tr style="display:none;"><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['only_specific_users']['html']; ?>
   </td><td><?php echo @_ONLYRECIPIENTSDEFINEDBELOW; ?>
</td></tr>
		                                         <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['active_users']['html']; ?>
   </td><td><?php echo @_ALLACTIVESYSTEMUSERS; ?>
</td></tr>
		                                         <tr <?php if (! $this->_tpl_vars['T_COURSES']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_course']['html']; ?>
</td><td width="27%"><?php echo @_USERSCONNECTEDTOSPECIFICCOURSE; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['specific_course']['html']; ?>
</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['specific_course_completed']['html']; ?>
</td><td id="specific_course_completed_label" style="visibility:hidden"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['specific_course_completed']['label']; ?>
</td></tr>
		                                         <tr <?php if (! $this->_tpl_vars['T_LESSONS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_lesson']['html']; ?>
</td><td><?php echo @_USERSCONNECTEDTOSPECIFICLESSON; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['lesson']['html']; ?>
</td></tr>
		                                         <tr <?php if (! $this->_tpl_vars['T_LESSONS']): ?>style = "display:none"<?php endif; ?>><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_lesson_professor']['html']; ?>
</td><td><?php echo @_PROFESSORSOFLESSON; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['professor']['html']; ?>
</td></tr>
		                                         <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_type']['html']; ?>
  </td><td><?php echo @_SPECIFICTYPEUSERS; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['user_type']['html']; ?>
</td></tr>
		                                        <tr><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['recipients']['specific_group']['html']; ?>
  </td><td><?php echo @_USERSINGROUP; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['group_recipients']['html']; ?>
</td></tr>

		                                    <?php endif; ?> 

				                        	</table>
				                        </div>
			                        </td></tr>
							</table>
                        </div>
						<?php endif; ?> 				         <?php endif; ?>                         <div id="event_recipients_div" <?php if (! isset ( $this->_tpl_vars['T_EVENT_FORM'] )): ?>style="display:none"<?php endif; ?>>
							<table class="formElements">
			                    <tr><td class = "fixedLabelCell" ><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['event_recipients']['label']; ?>
:&nbsp;</td>
			                        <td style="white-space:nowrap;"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['event_recipients']['html']; ?>
</td><td id="explicitlySelectedHelp" <?php if ($this->_tpl_vars['T_SHOW_EXPLICITLY_HELP'] != 1): ?>style="display:none"<?php endif; ?>><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, 'explicitly_selected_info', event)"><div id = 'explicitly_selected_info' onclick = "eF_js_showHideDiv(this, 'explicitly_selected_info', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:450px;height:100px;position:absolute;display:none"><?php echo @_EXPLICITLYSELECTEDINFO; ?>
</div></td></tr>
			                </table>
						</div>
						</fieldset>

				        <fieldset class = "fieldsetSeparator">
				        <legend><?php echo @_MESSAGE; ?>
</legend>
						<table class="formElements" style = "width:100%">
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['header']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['header']['html']; ?>
</td></tr>
							<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['html_message']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['html_message']['html']; ?>
</td></tr>
							<tr><td></td>
								<td>
								<span>
									<img onclick = "toggledInstanceEditor = 'messageBody';javascript:toggleEditor('messageBody','simpleEditor');" class = "handle" style = "vertical-align:middle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
									<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'messageBody';javascript:toggleEditor('messageBody','simpleEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
								</span>
							</td></tr>
							<tr>
								<td class = "labelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['message']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['message']['html']; ?>
</td>
							</tr>
							<tr>
								<td class = "labelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['templ_add']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell">
									<?php echo $this->_tpl_vars['T_DIGESTS_FORM']['templ_add']['html']; ?>

									<img onClick = "addTemplatizedText($('template_add'))" src = "images/16x16/add.png" alt = "<?php echo @_ADDTEXTTEMPLATE; ?>
" title = "<?php echo @_ADDTEXTTEMPLATE; ?>
">
								</td>
							</tr>
							<?php if (! $this->_tpl_vars['T_CONFIGURATION']['onelanguage']): ?>
							<tr>
								<td class = "labelCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['languages_NAME']['label']; ?>
:&nbsp;</td>
								<td class = "elementCell">
									<?php echo $this->_tpl_vars['T_DIGESTS_FORM']['languages_NAME']['html']; ?>

									<a href= "" class = "info"><img src = "images/16x16/help.png" alt = "<?php echo @_HELP; ?>
" title = "<?php echo @_HELP; ?>
" onclick = "eF_js_showHideDiv(this, 'language_set_info', event)" ><span class = "tooltipSpan"><?php echo @_NOTIFICATIONLANGUAGETEMPLATEINFO; ?>
</div></a>
								</td>
							</tr>
							<?php endif; ?>
							<tr><td></td>
								<td class = "submitCell"><?php echo $this->_tpl_vars['T_DIGESTS_FORM']['submit_digest']['html']; ?>
</td></tr>
						</table>
						</fieldset>

		</form>
		<?php $this->_smarty_vars['capture']['t_main_digests_page'] = ob_get_contents(); ob_end_clean(); ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_EMAILDIGESTS,'data' => $this->_smarty_vars['capture']['t_main_digests_page'],'image' => '32x32/notifications.png'), $this);?>


	    <script language = "JavaScript" type = "text/javascript">
		var eventForm = "<?php echo $this->_tpl_vars['T_EVENT_FORM']; ?>
";
		var eventCategory = "<?php echo $this->_tpl_vars['T_EVENT_CATEGORY']; ?>
";
		var recipientsCategory = "<?php echo $this->_tpl_vars['T_RECIPIENTS_CATEGORY']; ?>
";
	    </script>

<?php else: ?>
    <script language = "JavaScript" type = "text/javascript">
	var addEditNotification = false;
    </script>


	<?php if (isset ( $_GET['op'] ) && $_GET['op'] == 'preview'): ?>

		<?php if (isset ( $this->_tpl_vars['T_SENT_NOTIFICATION_PREVIEW'] )): ?>
			<?php ob_start(); ?>
			<table width="100%">
				<tr><td><?php echo $this->_tpl_vars['T_SENT_NOTIFICATION_PREVIEW']['subject']; ?>
</td><td align="right">#filter:timestamp_time-<?php echo $this->_tpl_vars['T_SENT_NOTIFICATION_PREVIEW']['timestamp']; ?>
#</td></tr>
				<tr><td colspan="2">&nbsp</td></tr>
				<tr><td colspan="2">
				<?php echo $this->_tpl_vars['T_SENT_NOTIFICATION_PREVIEW']['body']; ?>

				</td></tr>
			</table>

			<?php $this->_smarty_vars['capture']['t_sent_notification_preview'] = ob_get_contents(); ob_end_clean(); ?>
			<?php echo smarty_function_eF_template_printBlock(array('title' => @_PREVIEW,'data' => $this->_smarty_vars['capture']['t_sent_notification_preview'],'image' => '32x32/notifications.png'), $this);?>

		<?php endif; ?>

	<?php else: ?>

	    <script language = "JavaScript" type = "text/javascript">
		var deactivateConst = "<?php echo @_DEACTIVATE; ?>
";
		var activateConst = "<?php echo @_ACTIVATE; ?>
";
		var recipientsCategory = "<?php echo $this->_tpl_vars['T_RECIPIENTS_CATEGORY']; ?>
";
		var sessionType = "<?php echo $_SESSION['s_type']; ?>
";
	    </script>

		<?php ob_start(); ?>
			<?php if (@G_VERSIONTYPE != 'community'): ?>					<?php if (@G_VERSIONTYPE != 'standard'): ?> 		            <?php if ($_SESSION['s_type'] == 'administrator' && ( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['notifications'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['notifications'] == 'change' )): ?>
		            <div class = "headerTools">
		            	<span>
		            		<img src="images/16x16/add.png" title="<?php echo @_ADDNOTIFICATION; ?>
" alt="<?php echo @_ADDNOTIFICATION; ?>
" >
		            		<a href="<?php echo $_SESSION['s_type']; ?>
.php?ctg=digests&add_notification=1"><?php echo @_ADDNOTIFICATION; ?>
</a>
		            	</span>
		            </div>
		            <?php endif; ?>
	            <?php endif; ?>             <?php endif; ?> 
            <table border = "0" width = "100%" class = "sortedTable">
                <tr class = "topTitle">
                    <td class = "topTitle"><?php echo @_WHEN; ?>
</td>
                    <td class = "topTitle"><?php echo @_EVENT; ?>
</td>
                    <td class = "topTitle"><?php echo @_EVENTAPPLIESTO; ?>
</td>
                    <td class = "topTitle"><?php echo @_RECIPIENTS; ?>
</td>
                    <td class = "topTitle centerAlign"><?php echo @_STATUS; ?>
</td>
                                        <?php if ($this->_tpl_vars['_change_']): ?>
                    <td class = "topTitle noSort" align="center"><?php echo @_OPERATIONS; ?>
</td>
                    <?php endif; ?>
                </tr>

       <?php if (isset ( $this->_tpl_vars['T_NOTIFICATIONS'] )): ?>
                <?php $_from = $this->_tpl_vars['T_NOTIFICATIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['notification_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['notification_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['notification']):
        $this->_foreach['notification_list']['iteration']++;
?>
	            <tr id = "notification_row_<?php echo $this->_tpl_vars['notification']['id']; ?>
_<?php if (isset ( $this->_tpl_vars['notification']['is_event'] )): ?>1<?php else: ?>0<?php endif; ?>" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['notification']['active']): ?>deactivatedTableElement<?php endif; ?>">
                    <td ><?php echo $this->_tpl_vars['notification']['when']; ?>
</td>
                    <td ><?php echo $this->_tpl_vars['notification']['event']; ?>
</td>
                    <td ><?php if ($this->_tpl_vars['notification']['event_notification_recipients'] != ""): ?><?php echo $this->_tpl_vars['notification']['recipients']; ?>
<?php endif; ?></td>
                    <td ><?php if ($this->_tpl_vars['notification']['event_notification_recipients'] != ""): ?><?php echo $this->_tpl_vars['notification']['event_notification_recipients']; ?>
<?php else: ?><?php echo $this->_tpl_vars['notification']['recipients']; ?>
<?php endif; ?></td>
                    <td class = "centerAlign">
                    	<span id = "notification_status_<?php echo $this->_tpl_vars['notification']['id']; ?>
_<?php if (isset ( $this->_tpl_vars['notification']['is_event'] )): ?>1<?php else: ?>0<?php endif; ?>" style="display:none">
                    		<?php if ($this->_tpl_vars['notification']['active'] == 1): ?>1<?php else: ?>0<?php endif; ?></span>
	    				<a href = "javascript:void(0);" <?php if ($this->_tpl_vars['_change_'] && $this->_tpl_vars['notification']['event_type'] != 7 && $this->_tpl_vars['notification']['event_type'] != 4): ?>onclick = "activateNotification(this, '<?php echo $this->_tpl_vars['notification']['id']; ?>
', '<?php echo $this->_tpl_vars['notification']['is_event']; ?>
')"<?php endif; ?>>
			                <?php if ($this->_tpl_vars['notification']['active'] == 1): ?>
			                    <img src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" border = "0">
			                <?php else: ?>
			                    <img src = "images/16x16/trafficlight_red.png" alt = "<?php echo @_ACTIVATE; ?>
" title = "<?php echo @_ACTIVATE; ?>
" border = "0">
			                <?php endif; ?>
		                </a>
					</td>
                                        <?php if ($this->_tpl_vars['_change_']): ?>
                    <td class = "centerAlign">
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=digests&edit_notification=<?php echo $this->_tpl_vars['notification']['id']; ?>
<?php if (isset ( $this->_tpl_vars['notification']['is_event'] )): ?>&event=1<?php endif; ?>" class = "editLink"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
						<?php if ($this->_tpl_vars['notification']['event_type'] != 7 && $this->_tpl_vars['notification']['event_type'] != 4): ?>
                        	<img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if(confirm('<?php echo @_AREYOUSUREYOUWANTTOREMOVETHATNOTIFICATION; ?>
')) deleteNotification(this, '<?php echo $this->_tpl_vars['notification']['id']; ?>
', '<?php echo $this->_tpl_vars['notification']['is_event']; ?>
')"/>
                        <?php endif; ?>
                    </td>
					<?php endif; ?>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
       <?php else: ?>
          <tr><td colspan=4>
          <table width = "100%">
              <tr><td class = "emptyCategory"><?php echo @_NONOTIFICATIONSHAVEBEENREGISTERED; ?>
</td></tr>
          </table>
          </td></tr>
       <?php endif; ?>


   </table>
        <?php $this->_smarty_vars['capture']['t_notifications_code'] = ob_get_contents(); ob_end_clean(); ?>

        <?php ob_start(); ?>
            <?php if ($_SESSION['s_type'] == 'administrator' && ( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['notifications'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['notifications'] == 'change' )): ?>
            <div class = "headerTools">
            	<span>
            		<img src="images/16x16/go_into.png" title="<?php echo @_SENDNEXTQUEUEMESSAGES; ?>
" alt="<?php echo @_SENDNEXTQUEUEMESSAGES; ?>
">
					<a href="javascript:void(0)" onclick = "sendQueueMessages(this)"><?php echo @_SENDNEXTQUEUEMESSAGES; ?>
</a>
            	</span>
            	<span>
            		<img src="images/16x16/error_delete.png" title="<?php echo @_CLEARQUEUEMESSAGES; ?>
" alt="<?php echo @_CLEARQUEUEMESSAGES; ?>
">
					<a href="javascript:void(0)" onclick = "clearQueueMessages(this)"><?php echo @_CLEARQUEUEMESSAGES; ?>
</a>
            	</span>
            </div>
            <?php endif; ?>

<!--ajax:msgQueueTable-->
            <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_MESSAGE_QUEUE_SIZE']; ?>
" sortBy = "0" id = "msgQueueTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "administrator.php?ctg=digests&">
                <tr class = "topTitle">
                    <td class = "topTitle" name="timestamp" width = "35%"><?php echo @_DATE; ?>
</td>
                    <td name="recipient" class = "topTitle"><?php echo @_RECIPIENTS; ?>
</td>
                    <td name="subject" class = "topTitle"><?php echo @_SUBJECT; ?>
</td>
                    <td class = "topTitle noSort centerAling"><?php echo @_OPERATIONS; ?>
</td>
                </tr>

		        <?php $_from = $this->_tpl_vars['T_QUEUE_MSGS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['queue_message_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['queue_message_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['queue_message']):
        $this->_foreach['queue_message_list']['iteration']++;
?>
		        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
  <?php if ($this->_tpl_vars['queue_message']['timestamp'] && $this->_tpl_vars['queue_message']['timestamp'] > $this->_tpl_vars['T_TIMESTAMP_NOW']): ?>deactivatedTableElement<?php endif; ?>">
		            <td ><?php if ($this->_tpl_vars['queue_message']['timestamp']): ?>#filter:timestamp_time-<?php echo $this->_tpl_vars['queue_message']['timestamp']; ?>
#<?php else: ?><?php echo @_TOBESENTIMMEDIATELY; ?>
<?php endif; ?></td>
		            <td ><?php echo $this->_tpl_vars['queue_message']['recipients']; ?>
 <?php if (isset ( $this->_tpl_vars['queue_message']['recipients_count'] )): ?>(<?php echo $this->_tpl_vars['queue_message']['recipients_count']; ?>
)<?php endif; ?></td>
		            <td ><?php echo ((is_array($_tmp=$this->_tpl_vars['queue_message']['subject'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</td>
		            <td class = "centerAlign">
                    	<img class ="ajaxHandle" src = "images/16x16/mail.png" title = "<?php echo @_SEND; ?>
" alt = "<?php echo @_SEND; ?>
" onclick = "sendQueueMessage(this, '<?php echo $this->_tpl_vars['queue_message']['id']; ?>
');"/>
                        <img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_AREYOUSUREYOUWANTTOREMOVETHATNOTIFICATION; ?>
')) clearQueueMessage(this, '<?php echo $this->_tpl_vars['queue_message']['id']; ?>
');"/>
		            </td>
		        </tr>
		        <?php endforeach; else: ?>
				<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "4"><?php echo @_NODATAFOUND; ?>
</td></tr>
		        <?php endif; unset($_from); ?>


		   </table>
<!--/ajax:msgQueueTable-->
        <?php $this->_smarty_vars['capture']['t_queue_messages_code'] = ob_get_contents(); ob_end_clean(); ?>


        <?php ob_start(); ?>
            <?php if ($_SESSION['s_type'] == 'administrator' && ( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['notifications'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['notifications'] == 'change' )): ?>
            <div class = "headerTools">
            	<span>
            		<img src="images/16x16/error_delete.png" title="<?php echo @_CLEARQUEUEMESSAGES; ?>
" alt="<?php echo @_CLEARQUEUEMESSAGES; ?>
">
					<a href="javascript:void(0)" onclick = "clearSentQueueMessages(this)"><?php echo @_CLEARQUEUEMESSAGES; ?>
</a>
            	</span>
            </div>
            <?php endif; ?>
<!--ajax:sentQueueTable-->
            <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" id = "sentQueueTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "administrator.php?ctg=digests&">
                <tr class = "topTitle">
                    <td class = "topTitle" width = "15%" name = "timestamp"><?php echo @_DATE; ?>
</td>
                    <td class = "topTitle" name = "recipient"><?php echo @_RECIPIENT; ?>
</td>
                    <td class = "topTitle" name = "subject"><?php echo @_SUBJECT; ?>
</td>
                    <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
                </tr>
		        <?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recent_messages_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recent_messages_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['recent_message']):
        $this->_foreach['recent_messages_list']['iteration']++;
?>
		        <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
		            <td >#filter:timestamp_time-<?php echo $this->_tpl_vars['recent_message']['timestamp']; ?>
#</td>
		            <td ><?php echo $this->_tpl_vars['recent_message']['recipient']; ?>
</td>
		            <td ><?php echo $this->_tpl_vars['recent_message']['subject']; ?>
</td>
		            <td class = "centerAlign">
                    	<img class ="ajaxHandle" src = "images/16x16/mail.png" title = "<?php echo @_RESEND; ?>
" alt = "<?php echo @_RESEND; ?>
" onclick = "sendSentMessage(this, '<?php echo $this->_tpl_vars['recent_message']['id']; ?>
');"/>
                        <a title="<?php echo @_PREVIEW; ?>
" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=digests&op=preview&sent_id=<?php echo $this->_tpl_vars['recent_message']['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_PREVIEW; ?>
', 3)" target = "POPUP_FRAME"  style = "vertical-align:middle">
	            			<img src="images/16x16/search.png" class="handle" title="<?php echo @_PREVIEW; ?>
" alt="<?php echo @_PREVIEW; ?>
" />
	            		</a>
		            </td>

		        </tr>
		        <?php endforeach; else: ?>
		        <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "4"><?php echo @_NODATAFOUND; ?>
</td></tr>
		        <?php endif; unset($_from); ?>
		   </table>
<!--/ajax:sentQueueTable-->
        <?php $this->_smarty_vars['capture']['t_sent_messages_code'] = ob_get_contents(); ob_end_clean(); ?>


       <?php ob_start(); ?>
			<?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['javascript']; ?>

            <form <?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['attributes']; ?>
>
                <?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['hidden']; ?>

                <table style = "width:100%">
                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_use_cron']['label']; ?>
:&nbsp;</td>
                        <td class = "elementCell"><table><tr><td><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_use_cron']['html']; ?>
</td><td align="left"><img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, 'use_cron_info', event)"><div id = 'use_cron_info' onclick = "eF_js_showHideDiv(this, 'use_cron_info', event)" class = "popUpInfoDiv" style = "padding:1em 1em 1em 1em;width:425px;height:175px;position:absolute;display:none"><table width="425px" height="175px" style="white-space: wrap;"><tr><td><?php echo @_USECRONINFO; ?>
</td></tr></table></div></td></tr></table></td></tr>

                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_pageloads']['label']; ?>
:&nbsp;</td>
                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_pageloads']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_pageloads']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_pageloads']['error']; ?>
</td></tr><?php endif; ?>

                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_maximum_inter_time']['label']; ?>
:&nbsp;</td>
                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_maximum_inter_time']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_maximum_inter_time']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_maximum_inter_time']['error']; ?>
</td></tr><?php endif; ?>
					<tr><td>&nbsp</td></tr>
                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_messages_per_time']['label']; ?>
:&nbsp;</td>
                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_messages_per_time']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_messages_per_time']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_messages_per_time']['error']; ?>
</td></tr><?php endif; ?>

                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_max_sent_messages']['label']; ?>
:&nbsp;</td>
                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_max_sent_messages']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_max_sent_messages']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_max_sent_messages']['error']; ?>
</td></tr><?php endif; ?>

                    <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_send_mode']['label']; ?>
:&nbsp;</td>
                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_send_mode']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_send_mode']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['notifications_send_mode']['error']; ?>
</td></tr><?php endif; ?>

                    <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_NOTIFICATION_VARIABLES_FORM']['submit_variables']['html']; ?>
</td></tr>
                </table>
            </form>
       <?php $this->_smarty_vars['capture']['t_configuration_form_code'] = ob_get_contents(); ob_end_clean(); ?>


		<?php ob_start(); ?>
		<div class="tabber" >
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'registered','title' => @_REGISTERED,'data' => $this->_smarty_vars['capture']['t_notifications_code'],'image' => "32x32/notifications.png",'options' => $this->_tpl_vars['T_TABLE_OPTIONS']), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'messages_queue','title' => @_MESSAGESQUEUE,'data' => $this->_smarty_vars['capture']['t_queue_messages_code'],'image' => "32x32/notifications.png"), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'recent_messages','title' => @_RECENTLYSENT,'data' => $this->_smarty_vars['capture']['t_sent_messages_code'],'image' => "32x32/notifications.png"), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'config_tab','title' => @_CONFIGURATIONOPTIONS,'data' => $this->_smarty_vars['capture']['t_configuration_form_code'],'image' => "32x32/notifications.png"), $this);?>


        </div>
        <?php $this->_smarty_vars['capture']['t_notifications'] = ob_get_contents(); ob_end_clean(); ?>
        <?php echo smarty_function_eF_template_printBlock(array('title' => @_EMAILDIGESTS,'data' => $this->_smarty_vars['capture']['t_notifications'],'image' => '32x32/notifications.png','help' => 'Notifications'), $this);?>


	<?php endif; ?>
<?php endif; ?>