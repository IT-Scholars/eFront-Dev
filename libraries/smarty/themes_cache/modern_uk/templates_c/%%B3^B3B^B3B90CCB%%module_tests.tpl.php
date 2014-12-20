<?php /* Smarty version 2.6.27, created on 2014-09-22 19:08:49
         compiled from includes/module_tests.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'includes/module_tests.tpl', 22, false),array('modifier', 'mb_strtolower', 'includes/module_tests.tpl', 296, false),array('modifier', 'eF_truncate', 'includes/module_tests.tpl', 331, false),array('modifier', 'round', 'includes/module_tests.tpl', 396, false),array('modifier', 'eF_template_isOptionVisible', 'includes/module_tests.tpl', 459, false),array('modifier', 'cat', 'includes/module_tests.tpl', 760, false),array('modifier', 'sizeof', 'includes/module_tests.tpl', 1050, false),array('modifier', 'formatScore', 'includes/module_tests.tpl', 1511, false),array('function', 'eF_template_printBlock', 'includes/module_tests.tpl', 107, false),array('function', 'cycle', 'includes/module_tests.tpl', 509, false),)), $this); ?>
<script>
var sessionType 				= "<?php echo $_SESSION['s_type']; ?>
";
var editedUser 					= "<?php echo $_GET['user']; ?>
";
var setAssociatedDirections 	= '<?php echo @_SELECTASSOCIATEDDIRECTIONSCOURSESANDLESSONS; ?>
';
var setAssociatedSkills 		= '<?php echo @_SELECTASSOCIATEDSKILLSORSKILLCATEGORIES; ?>
';
var noQuestionsDefinedForLesson = '<?php echo @_NOQUESTIONSDEFINEDFORTHISLESSON; ?>
';
var noQuestionsDefinedForSkill  = '<?php echo @_NOQUESTIONSDEFINEDFORTHISSKILL; ?>
';
var theFieldNameIsMandatory		= "<?php echo @_THEFIELD; ?>
 <?php echo @_NAME; ?>
 <?php echo @_ISMANDATORY; ?>
";
var noQuestionSelection 		= "<?php echo @_NOQUESTIONSELECTIONSHAVEBEENMADE; ?>
";
var doYouWantToFurtherEdit		= "<?php echo @_DOYOUWANTTOFURTHEREDITTHETEST; ?>
";
var noQuestionsFound			= "<?php echo @_NOQUESTIONSFOUND; ?>
";
var deleteConst					='<?php echo @_DELETE; ?>
';
translations['_YOUCANNOTREMOVETHELASTELEMENT'] = '<?php echo @_YOUCANNOTREMOVETHELASTELEMENT; ?>
';
translations['_SEPARATEWORDSWITHPIPE'] = '<?php echo @_SEPARATEWORDSWITHPIPE; ?>
';
</script>


<?php if ($_GET['add_test'] && $_GET['create_quick_test']): ?>

<script>
var quickformLessonCourses 		= '<?php echo ((is_array($_tmp=$this->_tpl_vars['T_QUICKFORM_LESSON_COURSES_SELECT'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "") : smarty_modifier_replace($_tmp, "\n", "")); ?>
';
var quickformSkills				= '<?php echo ((is_array($_tmp=$this->_tpl_vars['T_QUICKFORM_SKILLS_SELECT'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "") : smarty_modifier_replace($_tmp, "\n", "")); ?>
';
var quickformeducationalCount	= '<?php echo ((is_array($_tmp=$this->_tpl_vars['T_QUICKTEST_FORM']['educational_questions_count_row']['html'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "") : smarty_modifier_replace($_tmp, "\n", "")); ?>
';
var quickformSkillQuestCount  	= '<?php echo ((is_array($_tmp=$this->_tpl_vars['T_QUICKTEST_FORM']['skill_questions_count_row']['html'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "") : smarty_modifier_replace($_tmp, "\n", "")); ?>
';
</script>

    <?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['attributes']; ?>
>
    <?php ob_start(); ?>
	                    <?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['hidden']; ?>

                <table class = "formElements">
                    <tr><td class = "labelCell"><?php echo @_NAME; ?>
:&nbsp;</td>
                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['name']['html']; ?>
&nbsp;*</td></tr>
                    <?php if ($this->_tpl_vars['T_QUICKTEST_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
                <tr><td class = "labelCell"><?php echo @_DESCRIPTION; ?>
:&nbsp;</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['description']['html']; ?>
</td></tr>
                <?php if ($this->_tpl_vars['T_QUICKTEST_FORM']['description']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUICKTEST_FORM']['description']['error']; ?>
</td></tr><?php endif; ?>
                            </table>
	<?php $this->_smarty_vars['capture']['t_create_quick_test_code'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>
		<script>var __criteria_total_number = 0;</script>
	   
	   	   	<table>
			<tr>
				<td><a href="javascript:void(0);" onclick="add_new_criterium_row(0, 'lessons')"><img src="images/16x16/add.png" title="<?php echo @_NEWSELECTION; ?>
" alt="<?php echo @_NEWSELECTION; ?>
"/ border="0"></a></td><td><a href="javascript:void(0);" onclick="add_new_criterium_row(0, 'lessons')"><?php echo @_NEWSELECTION; ?>
</a></td>
			</tr>
		</table>
	   	<table id = "lessonsTable" class="sortedTable" width="100%" noFooter="true">
	   	<tr class = "topTitle">
	   		<td class = "topTitle noSort" width= "40%"><span style="color:maroon"><?php echo @_DIRECTION; ?>
</span>, <span style="color:green"><?php echo @_COURSE; ?>
</span>&nbsp;<?php echo @_OR; ?>
&nbsp;<?php echo @_LESSON; ?>
&nbsp;(<?php echo @_QUESTIONS; ?>
)</td>
			<td class = "topTitle noSort" width= "40%"><?php echo @_QUESTIONS; ?>
</td>
			<td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
		</tr>

	   	<tr id= 'no_lessons_criteria_defined'><td class= "emptyCategory" colspan="3" ><?php echo @_SELECTASSOCIATEDDIRECTIONSCOURSESANDLESSONS; ?>
</td></tr>
	   	</table>
	       <?php $this->_smarty_vars['capture']['t_create_quick_test_code_lessons'] = ob_get_contents(); ob_end_clean(); ?>


    <?php if (@G_VERSIONTYPE == 'enterprise'): ?> 		<?php ob_start(); ?>
      			<table>
				<tr>
					<td><a href="javascript:void(0);" onclick="add_new_criterium_row(0, 'skills')"><img src="images/16x16/add.png" title="<?php echo @_NEWSELECTION; ?>
" alt="<?php echo @_NEWSELECTION; ?>
"/ border="0"></a></td><td><a href="javascript:void(0);" onclick="add_new_criterium_row(0, 'skills')"><?php echo @_NEWSELECTION; ?>
</a></td>
				</tr>
			</table>
		   	<table id = "skillsTable" class="sortedTable" width="100%" noFooter="true">
			   	<tr class = "topTitle">
			   		<td class = "topTitle noSort" width= "40%"><?php echo @_SKILL; ?>
&nbsp;<?php echo @_OR; ?>
&nbsp;<?php echo @_SKILLCATEGORY; ?>
&nbsp;(<?php echo @_QUESTIONS; ?>
)</td>
					<td class = "topTitle noSort" width= "40%"><?php echo @_QUESTIONS; ?>
</td>
					<td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
				</tr>
   				<tr id= 'no_skills_criteria_defined'><td class= "emptyCategory" colspan="3" ><?php echo @_SELECTASSOCIATEDSKILLSORSKILLCATEGORIES; ?>
</td></tr>
   			</table>
   		<?php $this->_smarty_vars['capture']['t_create_quick_test_code_skills'] = ob_get_contents(); ob_end_clean(); ?>
	<?php endif; ?>			<?php echo smarty_function_eF_template_printBlock(array('title' => @_ADDQUICKSKILLGAP,'data' => $this->_smarty_vars['capture']['t_create_quick_test_code'],'image' => '32x32/wizard.png'), $this);?>

	<br />
	<?php echo smarty_function_eF_template_printBlock(array('title' => @_SELECTQUESTIONSBASEDONLESSONS,'data' => $this->_smarty_vars['capture']['t_create_quick_test_code_lessons'],'image' => '32x32/lessons.png'), $this);?>

	<br />
	<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 	<?php echo smarty_function_eF_template_printBlock(array('title' => @_SELECTQUESTIONSBASEDONSKILLS,'data' => $this->_smarty_vars['capture']['t_create_quick_test_code_skills'],'image' => '32x32/skill_gap.png'), $this);?>

	<br />
	<?php endif; ?> 	<table width ="100%">
		<tr><td align="center"><input type="submit" value="<?php echo @_CREATETEST; ?>
" name="submit_test" class="flatButton" onClick = "if(checkQuickTestForm()) return true; else return false;"/></td></tr>
    </table>
    <br />


<?php elseif ($_GET['add_test'] || $_GET['edit_test']): ?>

	<script type="text/javascript">var tinyMCEmode = true;</script>

    <?php ob_start(); ?>
        <?php echo $this->_tpl_vars['T_TEST_FORM']['javascript']; ?>

        <form <?php echo $this->_tpl_vars['T_TEST_FORM']['attributes']; ?>
>
            <?php echo $this->_tpl_vars['T_TEST_FORM']['hidden']; ?>

            <table class = "formElements" >
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>

				<?php if ($_GET['edit_test'] && $this->_tpl_vars['T_CONFIGURATION']['use_sso'] == 'sumtotal'): ?>
					<tr><td class = "labelCell"><?php echo @_HACPURL; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo @G_SERVERNAME; ?>
hacp.php?sso=sumtotal&view_unit=<?php echo $this->_tpl_vars['T_CURRENT_TEST']->test['content_ID']; ?>
</td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['T_TEST_FORM']['parent_content']): ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['parent_content']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['parent_content']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['parent_content']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['parent_content']['error']; ?>
</td></tr><?php endif; ?>
				<?php endif; ?>
					<tr><td class = "labelCell"><?php echo @_NAME; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['name']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
					<tr><td class = "labelCell"><?php echo @_DURATIONINMINUTES; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['duration']['html']; ?>
&nbsp;<span class = "infoCell"><?php echo @_BLANKFORNOLIMIT; ?>
</span></td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['duration']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['duration']['error']; ?>
</td></tr><?php endif; ?>
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>	
					<tr><td class = "labelCell"><?php echo @_REDOABLE; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['redoable']['html']; ?>
 <span class = "infoCell"><?php echo @_BLANKFORUNLIMITED; ?>
</span></td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['redoable']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['redoable']['error']; ?>
</td></tr><?php endif; ?>
					<tr><td class = "labelCell"><?php echo @_MAINTAINHISTORY; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['maintain_history']['html']; ?>
<span> <?php echo @_REPETITIONS; ?>
 </span><span class = "infoCell">(<?php echo @_BLANKFORUNLIMITED; ?>
)</span></td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['mastery_score']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['mastery_score']['error']; ?>
</td></tr><?php endif; ?>
					<tr><td class = "labelCell"><?php echo @_MASTERYSCORE; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['mastery_score']['html']; ?>
 %</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['mastery_score']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['mastery_score']['error']; ?>
</td></tr><?php endif; ?>
				<?php else: ?>
					<tr><td class = "labelCell"><?php echo @_GENERALTHRESHOLD; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['general_threshold']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['general_threshold']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['general_threshold']['error']; ?>
</td></tr><?php endif; ?>
					<tr><td class = "labelCell"><?php echo @_ASSIGNTOALLNEWSTUDENTS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['assign_to_new']['html']; ?>
</td></tr>
					<tr><td class = "labelCell"><?php echo @_AUTOMATICALLYASSIGNLESSONS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['automatic_assignment']['html']; ?>
<img src = "images/16x16/help.png" alt = "help" title = "help" onclick = "eF_js_showHideDiv(this, 'automatic_assignment_info', event)"><div id = 'automatic_assignment_info' onclick = "eF_js_showHideDiv(this, 'automatic_assignment_info', event)" class = "popUpInfoDiv" style = "display:none"><?php echo @_AUTOMATICASSIGNMENTINFO; ?>
</div></td>
					<tr><td class = "labelCell"><?php echo @_DISPLAYRESULTSTOSTUDENTS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['student_results']['html']; ?>
</td>
				<?php endif; ?>
					<tr><td></td><td class = "elementCell">
						<span>	
							<a href = "javascript:void(0)" onclick = "toggleAdvancedParameters();"><img class = "handle" id = "advenced_parameter_image" src = "images/16x16/navigate_down.png" alt = "<?php echo @_TOGGLEADVENCEDPARAMETERS; ?>
" title = "<?php echo @_TOGGLEADVENCEDPARAMETERS; ?>
"/>&nbsp;<?php echo @_TOGGLEADVENCEDPARAMETERS; ?>
</a>
						</span>
					</td></tr>

					<tr style="display:none;" id = "publish"><td class = "labelCell"><?php echo @_PUBLISH; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['publish']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['publish']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['publish']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "onebyone"><td class = "labelCell"><?php echo @_ONEBYONE; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['onebyone']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['onebyone']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['onebyone']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "only_forward"><td class = "labelCell"><?php echo @_ONLYFORWARD; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['only_forward']['html']; ?>
 <span class = "infoCell"><?php echo @_APPLICABLETOONEBYONE; ?>
</span></td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['only_forward']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['only_forward']['error']; ?>
</td></tr><?php endif; ?>
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
<!--  					<tr style="display:none;" id = "given_answers"><td class = "labelCell" style = "white-space:normal"><?php echo @_SHOWGIVENANSWERS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['given_answers']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['given_answers']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['given_answers']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "show_score"><td class = "labelCell" style = "white-space:normal"><?php echo @_SHOWSCORE; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['show_score']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['show_score']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['show_score']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "answers"><td class = "labelCell" style = "white-space:normal"><?php echo @_SHOWRIGHTANSWERS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['answers']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['answers']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['answers']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "show_answers_if_pass"><td class = "labelCell" style = "white-space:normal"><?php echo @_SHOWANSWERSIFSTUDENTPASSED; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['show_answers_if_pass']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['show_answers_if_pass']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['show_answers_if_pass']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "redirect"><td class = "labelCell" style = "white-space:normal"><?php echo @_DONOTSHOWTESTAFTERSUBMITTING; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['redirect']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['redirect']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['redirect']['error']; ?>
</td></tr><?php endif; ?>
-->

<tr style="display:none;" id = "action_on_submit"><td class = "labelCell" style = "white-space:normal"><?php echo $this->_tpl_vars['T_TEST_FORM']['action_on_submit']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['action_on_submit']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['action_on_submit']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['action_on_submit']['error']; ?>
</td></tr><?php endif; ?>
					


	
				<?php endif; ?>
					<tr style="display:none;" id = "shuffle_answers"><td class = "labelCell"><?php echo @_SHUFFLEANSWERS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['shuffle_answers']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['shuffle_answers']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['shuffle_answers']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "shuffle_questions"><td class = "labelCell"><?php echo @_SHUFFLEQUESTIONS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['shuffle_questions']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['shuffle_questions']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['shuffle_questions']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "display_list"><td class = "labelCell"><?php echo @_DISPLAYORDEREDLIST; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['display_list']['html']; ?>
 <span class = "infoCell"><?php echo @_DISPLAYORDEREDLISTINFO; ?>
</span></td></tr>
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
					<tr style="display:none;" id = "pause_test"><td class = "labelCell"><?php echo @_TESTCANBEPAUSED; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['pause_test']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['pause_test']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['pause_test']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "display_weights"><td class = "labelCell"><?php echo @_DISPLAYQUESTIONWEIGHTS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['display_weights']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['display_weights']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['display_weights']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "answer_all"><td class = "labelCell"><?php echo @_FORCEUSERANSERALLQUESTIONS; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['answer_all']['html']; ?>
 <span class = "infoCell"><?php echo @_NOTAPPLIEDFORONLYFORWARD; ?>
</span></td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['answer_all']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['answer_all']['error']; ?>
</td></tr><?php endif; ?>
					<tr style="display:none;" id = "keep_best"><td class = "labelCell"><?php echo @_RETAINBESTEXECUTION; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['keep_best']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['keep_best']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['keep_best']['error']; ?>
</td></tr><?php endif; ?>
					
	<?php if (@G_VERSIONTYPE != 'community'): ?> 					<tr style="display:none;" id = "redo_wrong"><td class = "labelCell"><?php echo @_ALLOWUSERANSERALLRONG; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['redo_wrong']['html']; ?>
 <span class = "infoCell"><?php echo @_ALLOWANSWERWRONGINFO; ?>
</span></td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['redo_wrong']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['redo_wrong']['error']; ?>
</td></tr><?php endif; ?>
	<?php endif; ?> <?php if (( @G_VERSIONTYPE != 'community' )): ?> 	<?php if (( @G_VERSIONTYPE != 'standard' )): ?> 					<tr style="display:none;" id = "test_password"><td class = "labelCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['test_password']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['test_password']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['test_password']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['test_password']['error']; ?>
</td></tr><?php endif; ?>
	<?php endif; ?> <?php endif; ?> 				<?php endif; ?>

			<?php else: ?>
				<?php if ($this->_tpl_vars['T_TEST_FORM']['parent_content']): ?>
					<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['parent_content']['label']; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['parent_content']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['parent_content']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['parent_content']['error']; ?>
</td></tr><?php endif; ?>
				<?php endif; ?>
				<tr><td class = "labelCell"><?php echo @_NAME; ?>
:&nbsp;</td>
					<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['name']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
				<tr id = "publish"><td class = "labelCell"><?php echo @_PUBLISH; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['publish']['html']; ?>
</td></tr>
			<?php endif; ?>

					<tr><td></td><td id = "toggleeditor_cell1">
						<div class = "headerTools">
							<span>
								<img onclick = "toggleFileManager(Element.extend(this).next());" class = "ajaxHandle" id = "arrow_down" src = "images/16x16/navigate_down.png" alt = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
" title = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
"/>&nbsp;
								<a href = "javascript:void(0)" onclick = "toggleFileManager(this);"><?php echo @_TOGGLEFILEMANAGER; ?>
</a>
							</span>
							<span>
								<img onclick = "toggledInstanceEditor = 'editor_content_data';javascript:toggleEditor('editor_content_data','mceEditor');" class = "ajaxHandle" src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
								<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'editor_content_data';javascript:toggleEditor('editor_content_data','mceEditor');" id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
							</span>
						</div>
						</td></tr>
					<tr><td></td><td id = "filemanager_cell"></td></tr>
					<tr><td class = "labelCell"><?php echo @_DESCRIPTION; ?>
:&nbsp;</td>
						<td class = "elementCell"><?php echo $this->_tpl_vars['T_TEST_FORM']['description']['html']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['T_TEST_FORM']['description']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_TEST_FORM']['description']['error']; ?>
</td></tr><?php endif; ?>
					<tr><td colspan = "2">&nbsp;</td></tr>
					<tr><td></td>
						<td class = "elementCell">
							<?php echo $this->_tpl_vars['T_TEST_FORM']['submit_test']['html']; ?>
&nbsp;
							<?php if ($_GET['edit_test']): ?><?php echo $this->_tpl_vars['T_TEST_FORM']['submit_test_new']['html']; ?>
<?php endif; ?>
						</td></tr>

			</table>
		</form>
		<div id = "fmInitial"><div id = "filemanager_div" style = "display:none;"><?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>
</div></div>
	<?php $this->_smarty_vars['capture']['t_test_properties'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>
		<script>var hoursshorthand = '<?php echo @_HOURSSHORTHAND; ?>
';var minutesshorthand = '<?php echo @_MINUTESSHORTHAND; ?>
';var secondsshorthand = '<?php echo @_SECONDSSHORTHAND; ?>
';</script>
		<div id = "random_wizard_div" style = "display:none">
		<?php ob_start(); ?>
			<div class = "tabber">
		    	<div class = "tabbertab" title = "<?php echo @_BASICTESTPARAMETERS; ?>
">
					<form id = "general_form">
						<table class = "randomTest" style = "width:100%;">
							<tr><td><?php echo @_SELECTOPTION; ?>
:</td></tr>
							<tr><td>1. <?php echo @_CREATERANDOMTESTTHATLASTS; ?>
 <input type = "text" name = "duration" size = "5"> <?php echo @_MINUTES; ?>
 </td></tr>
							<tr><td>2. <?php echo @_CREATERANDOMTESTTHATHAS; ?>
 <input type = "text" name = "multitude" size = "5"> <?php echo mb_strtolower(@_QUESTIONS); ?>
</td></tr>
									<tr><td><?php echo @_IMPORTANCEOFQUESTIONSVSDURATION; ?>
: <span id = "balance_value_questions">50</span>% <?php echo @_QUESTIONS; ?>
 - <span id = "balance_value_duration">50</span>% <?php echo @_DURATION; ?>

									<div id="slider" style = "width:256px; margin:10px 0; background-color:#ccc; height:10px; position: relative;">
		    							<div id="slider_handle" style = "width:16px; height:16px; background-image:url('images/16x16/navigate_up.png'); cursor:move; position: absolute;"></div>
		    							<input type = "hidden" id = "balance" name = "balance" value = "50">
		    						</div>
		    					</td></tr>
														<tr><td>
									<input type = "button" class = "flatButton" value = "<?php echo @_OK; ?>
" onclick = "randomize(this)">
								</td></tr>
						</table>
					</form>
				</div>
		        <div class = "tabbertab" title = "<?php echo @_CHANGEQUESTIONSBASEDONDIFFICULTY; ?>
">
					<form id = "difficulty_form">
						<table class = "randomTest randomTestMatrix">
							<tr><td></td><td colspan = "4"><?php echo @_DIFFICULTYLEVELS; ?>
</td></tr>
							<tr><td><?php echo @_UNITS; ?>
</td>
							<?php $_from = ($this->_tpl_vars['T_QUESTION_DIFFICULTIES']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_difficulties'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_difficulties']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['difficulty'] => $this->_tpl_vars['item']):
        $this->_foreach['question_difficulties']['iteration']++;
?>
								<td><input type = "checkbox" checked name = "difficulty[<?php echo $this->_tpl_vars['difficulty']; ?>
]"><img src = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES_ICONS'][$this->_tpl_vars['difficulty']]; ?>
" alt = "<?php echo $this->_tpl_vars['item']; ?>
" title = "<?php echo $this->_tpl_vars['item']; ?>
"></td>
							<?php endforeach; endif; unset($_from); ?>
							</tr>
							<?php $_from = $this->_tpl_vars['T_UNITS_NAMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['units_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['units_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['unit']):
        $this->_foreach['units_list']['iteration']++;
?>
		<?php if ($this->_tpl_vars['T_UNITS_TO_QUESTIONS_DIFFICULTIES'][$this->_tpl_vars['id']]): ?>
							<tr><td style = "text-align:left"><input type = "checkbox" name = "unit[<?php echo $this->_tpl_vars['id']; ?>
]" checked> <span><?php echo ((is_array($_tmp=$this->_tpl_vars['unit'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>
</span></td>
								<?php $_from = ($this->_tpl_vars['T_QUESTION_DIFFICULTIES']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_difficulties'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_difficulties']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['difficulty'] => $this->_tpl_vars['item']):
        $this->_foreach['question_difficulties']['iteration']++;
?>
								<td>
			<?php if ($this->_tpl_vars['T_UNITS_TO_QUESTIONS_DIFFICULTIES'][$this->_tpl_vars['id']][$this->_tpl_vars['difficulty']]): ?>
								<select name = "unit_to_difficulty[<?php echo $this->_tpl_vars['id']; ?>
][<?php echo $this->_tpl_vars['difficulty']; ?>
]" id = "unit_to_difficulty[<?php echo $this->_tpl_vars['id']; ?>
][<?php echo $this->_tpl_vars['difficulty']; ?>
]">
										<option value = "any"><?php echo @_ANY; ?>
</option>
										<option value = "0" selected>0</option>
										<?php unset($this->_sections['questions_list']);
$this->_sections['questions_list']['name'] = 'questions_list';
$this->_sections['questions_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_UNITS_TO_QUESTIONS_DIFFICULTIES'][$this->_tpl_vars['id']][$this->_tpl_vars['difficulty']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['questions_list']['show'] = true;
$this->_sections['questions_list']['max'] = $this->_sections['questions_list']['loop'];
$this->_sections['questions_list']['step'] = 1;
$this->_sections['questions_list']['start'] = $this->_sections['questions_list']['step'] > 0 ? 0 : $this->_sections['questions_list']['loop']-1;
if ($this->_sections['questions_list']['show']) {
    $this->_sections['questions_list']['total'] = $this->_sections['questions_list']['loop'];
    if ($this->_sections['questions_list']['total'] == 0)
        $this->_sections['questions_list']['show'] = false;
} else
    $this->_sections['questions_list']['total'] = 0;
if ($this->_sections['questions_list']['show']):

            for ($this->_sections['questions_list']['index'] = $this->_sections['questions_list']['start'], $this->_sections['questions_list']['iteration'] = 1;
                 $this->_sections['questions_list']['iteration'] <= $this->_sections['questions_list']['total'];
                 $this->_sections['questions_list']['index'] += $this->_sections['questions_list']['step'], $this->_sections['questions_list']['iteration']++):
$this->_sections['questions_list']['rownum'] = $this->_sections['questions_list']['iteration'];
$this->_sections['questions_list']['index_prev'] = $this->_sections['questions_list']['index'] - $this->_sections['questions_list']['step'];
$this->_sections['questions_list']['index_next'] = $this->_sections['questions_list']['index'] + $this->_sections['questions_list']['step'];
$this->_sections['questions_list']['first']      = ($this->_sections['questions_list']['iteration'] == 1);
$this->_sections['questions_list']['last']       = ($this->_sections['questions_list']['iteration'] == $this->_sections['questions_list']['total']);
?>
										<option value = "<?php echo $this->_sections['questions_list']['iteration']; ?>
" <?php if ($this->_sections['questions_list']['iteration'] == $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['difficulties'][$this->_tpl_vars['id']][$this->_tpl_vars['difficulty']]): ?>selected<?php endif; ?>>
											<?php echo $this->_sections['questions_list']['iteration']; ?>
</option>
										<?php endfor; endif; ?>
									</select>
			<?php endif; ?>
									</td>
								<?php endforeach; endif; unset($_from); ?>
							</tr>
		<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							<tr><td colspan = "5"><input type = "button" class = "flatButton" value = "<?php echo @_OK; ?>
" onclick = "randomize(this, 'difficulty')"></td></tr>
						</table>
					</form>
				</div>
		        <div class = "tabbertab" title = "<?php echo @_ADJUSTTYPE; ?>
">
					<form id = "type_form">
						<table class = "randomTest randomTestMatrix">
							<tr><td></td><td colspan = "7"><?php echo @_QUESTIONTYPES; ?>
</td></tr>
							<tr><td><?php echo @_UNITS; ?>
</td>
							<?php $_from = ($this->_tpl_vars['T_QUESTION_TYPES']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_types'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_types']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['item']):
        $this->_foreach['question_types']['iteration']++;
?>
								<td><input type = "checkbox" checked name = "type[<?php echo $this->_tpl_vars['type']; ?>
]"><img src = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES_ICONS'][$this->_tpl_vars['type']]; ?>
" alt = "<?php echo $this->_tpl_vars['item']; ?>
" title = "<?php echo $this->_tpl_vars['item']; ?>
"></td>
							<?php endforeach; endif; unset($_from); ?>
							</tr>
							<?php $_from = $this->_tpl_vars['T_UNITS_NAMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['units_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['units_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['unit']):
        $this->_foreach['units_list']['iteration']++;
?>
		<?php if ($this->_tpl_vars['T_UNITS_TO_QUESTIONS_TYPES'][$this->_tpl_vars['id']]): ?>
							<tr><td style = "text-align:left"><input type = "checkbox" name = "unit[<?php echo $this->_tpl_vars['id']; ?>
]" checked> <span><?php echo ((is_array($_tmp=$this->_tpl_vars['unit'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>
</span></td>
								<?php $_from = $this->_tpl_vars['T_QUESTION_TYPES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_types'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_types']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['item']):
        $this->_foreach['question_types']['iteration']++;
?>
								<td>
			<?php if ($this->_tpl_vars['T_UNITS_TO_QUESTIONS_TYPES'][$this->_tpl_vars['id']][$this->_tpl_vars['type']]): ?>
								<select name = "unit_to_type[<?php echo $this->_tpl_vars['id']; ?>
][<?php echo $this->_tpl_vars['type']; ?>
]" id = "unit_to_type[<?php echo $this->_tpl_vars['id']; ?>
][<?php echo $this->_tpl_vars['type']; ?>
]">
										<option value = "any"><?php echo @_ANY; ?>
</option>
										<option value = "0" selected>0</option>
										<?php unset($this->_sections['questions_list']);
$this->_sections['questions_list']['name'] = 'questions_list';
$this->_sections['questions_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_UNITS_TO_QUESTIONS_TYPES'][$this->_tpl_vars['id']][$this->_tpl_vars['type']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['questions_list']['show'] = true;
$this->_sections['questions_list']['max'] = $this->_sections['questions_list']['loop'];
$this->_sections['questions_list']['step'] = 1;
$this->_sections['questions_list']['start'] = $this->_sections['questions_list']['step'] > 0 ? 0 : $this->_sections['questions_list']['loop']-1;
if ($this->_sections['questions_list']['show']) {
    $this->_sections['questions_list']['total'] = $this->_sections['questions_list']['loop'];
    if ($this->_sections['questions_list']['total'] == 0)
        $this->_sections['questions_list']['show'] = false;
} else
    $this->_sections['questions_list']['total'] = 0;
if ($this->_sections['questions_list']['show']):

            for ($this->_sections['questions_list']['index'] = $this->_sections['questions_list']['start'], $this->_sections['questions_list']['iteration'] = 1;
                 $this->_sections['questions_list']['iteration'] <= $this->_sections['questions_list']['total'];
                 $this->_sections['questions_list']['index'] += $this->_sections['questions_list']['step'], $this->_sections['questions_list']['iteration']++):
$this->_sections['questions_list']['rownum'] = $this->_sections['questions_list']['iteration'];
$this->_sections['questions_list']['index_prev'] = $this->_sections['questions_list']['index'] - $this->_sections['questions_list']['step'];
$this->_sections['questions_list']['index_next'] = $this->_sections['questions_list']['index'] + $this->_sections['questions_list']['step'];
$this->_sections['questions_list']['first']      = ($this->_sections['questions_list']['iteration'] == 1);
$this->_sections['questions_list']['last']       = ($this->_sections['questions_list']['iteration'] == $this->_sections['questions_list']['total']);
?>
										<option value = "<?php echo $this->_sections['questions_list']['iteration']; ?>
" <?php if ($this->_sections['questions_list']['iteration'] == $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['types'][$this->_tpl_vars['id']][$this->_tpl_vars['type']]): ?>selected<?php endif; ?>>
											<?php echo $this->_sections['questions_list']['iteration']; ?>
</option>
										<?php endfor; endif; ?>
									</select>
			<?php endif; ?>
									</td>
								<?php endforeach; endif; unset($_from); ?>
							</tr>
		<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							<tr><td colspan = "8"><input type = "button" class = "flatButton" value = "<?php echo @_OK; ?>
" onclick = "randomize(this, 'type')"></td></tr>
						</table>
					</form>
				</div>
		        <div class = "tabbertab" title = "<?php echo @_QUESTIONSBYPERCENTAGE; ?>
">
					<form id = "percentage_form">
						<table class = "randomTest randomTestMatrix">
							<tr><td><?php echo @_UNITS; ?>
</td><td><?php echo @_QUESTIONPERCENTAGE; ?>
 (%)</td><td><?php echo @_ACCURATEPERCENTAGE; ?>
</td></tr>
							<?php $_from = $this->_tpl_vars['T_UNITS_NAMES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['units_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['units_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['unit']):
        $this->_foreach['units_list']['iteration']++;
?>
		<?php if ($this->_tpl_vars['T_UNITS_TO_QUESTIONS_TYPES'][$this->_tpl_vars['id']]): ?>
							<tr><td style = "text-align:left"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['unit'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 30) : smarty_modifier_eF_truncate($_tmp, 30)); ?>
</span></td>
								<td><select name = "unit_to_percentage[<?php echo $this->_tpl_vars['id']; ?>
]" id = "unit_to_percentage[<?php echo $this->_tpl_vars['id']; ?>
]">
										<option value = "0">0</option>
										<?php unset($this->_sections['questions_list']);
$this->_sections['questions_list']['name'] = 'questions_list';
$this->_sections['questions_list']['loop'] = is_array($_loop=10) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['questions_list']['show'] = true;
$this->_sections['questions_list']['max'] = $this->_sections['questions_list']['loop'];
$this->_sections['questions_list']['step'] = 1;
$this->_sections['questions_list']['start'] = $this->_sections['questions_list']['step'] > 0 ? 0 : $this->_sections['questions_list']['loop']-1;
if ($this->_sections['questions_list']['show']) {
    $this->_sections['questions_list']['total'] = $this->_sections['questions_list']['loop'];
    if ($this->_sections['questions_list']['total'] == 0)
        $this->_sections['questions_list']['show'] = false;
} else
    $this->_sections['questions_list']['total'] = 0;
if ($this->_sections['questions_list']['show']):

            for ($this->_sections['questions_list']['index'] = $this->_sections['questions_list']['start'], $this->_sections['questions_list']['iteration'] = 1;
                 $this->_sections['questions_list']['iteration'] <= $this->_sections['questions_list']['total'];
                 $this->_sections['questions_list']['index'] += $this->_sections['questions_list']['step'], $this->_sections['questions_list']['iteration']++):
$this->_sections['questions_list']['rownum'] = $this->_sections['questions_list']['iteration'];
$this->_sections['questions_list']['index_prev'] = $this->_sections['questions_list']['index'] - $this->_sections['questions_list']['step'];
$this->_sections['questions_list']['index_next'] = $this->_sections['questions_list']['index'] + $this->_sections['questions_list']['step'];
$this->_sections['questions_list']['first']      = ($this->_sections['questions_list']['iteration'] == 1);
$this->_sections['questions_list']['last']       = ($this->_sections['questions_list']['iteration'] == $this->_sections['questions_list']['total']);
?>
										<option value = "<?php echo $this->_sections['questions_list']['iteration']*10; ?>
" <?php if ($this->_sections['questions_list']['iteration'] == round($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['percentage'][$this->_tpl_vars['id']])): ?>selected<?php endif; ?>>
											<?php echo $this->_sections['questions_list']['iteration']*10; ?>
</option>
										<?php endfor; endif; ?>
									</select>
								</td>
								<td class = "unit_to_accurate_percentage" id = "unit_to_accurate_percentage[<?php echo $this->_tpl_vars['id']; ?>
]"><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['percentage'][$this->_tpl_vars['id']]*10; ?>
%</td>
							</tr>
		<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							<tr><td colspan = "3"><input type = "button" class = "flatButton" value = "<?php echo @_OK; ?>
" onclick = "randomize(this, 'percentage')"></td></tr>
						</table>
					</form>
				</div>
		        <div class = "tabbertab" title = "<?php echo @_ADVANCEDSETTINGS; ?>
">
					<form id = "advanced_form">
						<table class = "randomTest" style = "width:100%">
							<tr><td><?php echo @_SELECTOPTION; ?>
:</td></tr>
							<tr><td><?php echo @_USE; ?>
 <input name = "random_pool" type = "text" size = "5" value = "<?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['random_pool']; ?>
"> <?php echo @_QUESTIONSINEACHEXECUTION; ?>
</td></tr>
							<tr><td><input type = "checkbox" name = "show_incomplete" <?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['show_incomplete']): ?>checked<?php endif; ?>> <?php echo @_SHOWINCOMPLETEQUESTIONSEACHTIME; ?>
</td></tr>
							<tr><td><input type = "checkbox" name = "user_configurable" <?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['user_configurable']): ?>checked<?php endif; ?>> <?php echo @_ALLOWSTUDENTSTOSPECIFYTOTALQUESTIONS; ?>
</td></tr>
							<tr><td><input type = "checkbox" name = "update_test_time"> <?php echo @_UPDATETOTALTESTTIME; ?>
</td></tr>
							<tr><td><input type = "button" class = "flatButton" value = "<?php echo @_OK; ?>
" onclick = "setRandomPool(this)"></td></tr>
						</table>
					</form>
				</div>
			</div>
			<div id = "inner_test_settings">
				<?php echo @_CURRENTTESTHAS; ?>

				<span id = "questions_number"><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['multitude']; ?>
</span>
				<?php echo @_QUESTIONSOFTOTALTIME; ?>

				<span id = "questions_time_hours"><?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['hours']): ?><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['hours']; ?>
<?php echo @_HOURSSHORTHAND; ?>
 <?php endif; ?></span>
		        <span id = "questions_time_minutes"><?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['minutes']): ?><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 <?php endif; ?></span>
		        <span id = "questions_time_seconds"><?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['seconds']): ?><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?> <?php if (! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['seconds'] && ! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['minutes'] && ! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['hours']): ?>0<?php echo @_MINUTESSHORTHAND; ?>
<?php endif; ?></span>
				<span <?php if (! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['random_pool']): ?>style = "display:none"<?php endif; ?>><?php echo @_WHEREARANDOMPOOLOF; ?>
 <span><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['random_pool']; ?>
</span> <?php echo @_QUESTIONSISUSEDEACHTIME; ?>
</span>
			</div>
		<?php $this->_smarty_vars['capture']['t_random_test_wizard_code'] = ob_get_contents(); ob_end_clean(); ?>
		 <?php echo smarty_function_eF_template_printBlock(array('title' => @_ADJUSTQUESTIONS,'data' => $this->_smarty_vars['capture']['t_random_test_wizard_code'],'image' => '32x32/tests.png'), $this);?>

		</div>
	<?php $this->_smarty_vars['capture']['t_random_test_wizard'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>
	    <div class = "headerTools">
	    	<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	      	<span>
				<img src = "images/16x16/rules.png" title = "<?php echo @_ADJUSTQUESTIONS; ?>
" alt = "<?php echo @_ADJUSTQUESTIONS; ?>
"/>
	        	<a href = "javascript:void(0)" onclick = "initSlider();eF_js_showDivPopup(event, '<?php echo @_ADJUSTQUESTIONS; ?>
', 2, 'random_wizard_div')"><?php echo @_ADJUSTQUESTIONS; ?>
</a>
	        </span>
	        <?php endif; ?>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	      	<span>
	        	<img src = "images/16x16/add.png" title = "<?php echo @_ADDQUESTION; ?>
" alt = "<?php echo @_ADDQUESTION; ?>
"/>
				<select name = "question_type" onchange = "if (this.options[this.options.selectedIndex].value) window.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&add_question=1&question_type='+this.options[this.options.selectedIndex].value">
					<option value = "" selected><?php echo @_ADDQUESTIONOFTYPE; ?>
</option>
					<option value = "" >---------------</option>
					<?php $_from = $this->_tpl_vars['T_QUESTIONTYPESTRANSLATIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_types'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_types']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['question_types']['iteration']++;
?>
						<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] || $this->_tpl_vars['key'] != 'raw_text'): ?>						
						<option value = "<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</select>
	        </span>
			<?php endif; ?>
			
			<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && ((is_array($_tmp='questions_pool')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
				<span style = "float:right;border-width:0px">
				<?php if (! $_GET['showall']): ?>
     				<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&edit_test=<?php echo $_GET['edit_test']; ?>
&showall=1&tab=questions" ><img src = "images/16x16/order.png" alt = "<?php echo @_SHOWQUESTIONSPOOL; ?>
" title = "<?php echo @_SHOWQUESTIONSPOOL; ?>
"/>&nbsp;<?php echo @_SHOWQUESTIONSPOOL; ?>
</a>
     			<?php else: ?>
     				<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&edit_test=<?php echo $_GET['edit_test']; ?>
&showall=<?php if (! $_GET['showall']): ?>1<?php else: ?>0<?php endif; ?>&tab=questions" ><img src = "images/16x16/order.png" alt = "<?php echo @_SHOWLESSONQUESTIONS; ?>
" title = "<?php echo @_SHOWLESSONQUESTIONS; ?>
"/>&nbsp;<?php echo @_SHOWLESSONQUESTIONS; ?>
</a>
     			<?php endif; ?>
     			</span> 
			<?php endif; ?> 
			
		</div>

		<?php echo $this->_smarty_vars['capture']['t_random_test_wizard']; ?>

		<div id = "test_settings">
		<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
			<?php echo @_CURRENTTESTHAS; ?>

			<span id = "questions_number"><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['multitude']; ?>
</span>
			<?php echo @_QUESTIONSOFTOTALTIME; ?>

			<span id = "questions_time_hours"><?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['hours']): ?><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['hours']; ?>
<?php echo @_HOURSSHORTHAND; ?>
 <?php endif; ?></span>
	        <span id = "questions_time_minutes"><?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['minutes']): ?><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 <?php endif; ?></span>
	        <span id = "questions_time_seconds"><?php if ($this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['seconds']): ?><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?> <?php if (! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['seconds'] && ! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['minutes'] && ! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['duration']['hours']): ?>0<?php echo @_MINUTESSHORTHAND; ?>
<?php endif; ?></span>
		<?php endif; ?>
			<span <?php if (! $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['random_pool']): ?>style = "display:none"<?php endif; ?>><?php echo @_WHEREARANDOMPOOLOF; ?>
 <span id = "questions_random_pool"><?php echo $this->_tpl_vars['T_TEST_QUESTIONS_STATISTICS']['random_pool']; ?>
</span> <?php echo @_QUESTIONSISUSEDEACHTIME; ?>
</span>
		</div>

  	
<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'questionsTable'): ?>
  <?php if ($_GET['showall'] && ((is_array($_tmp='questions_pool')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
<!--ajax:questionsTable-->
        <table class = "QuestionsListTable sortedTable" id = "questionsTable" size = "<?php echo $this->_tpl_vars['T_QUESTIONS_SIZE']; ?>
" sortBy = "7" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&edit_test=<?php echo $_GET['edit_test']; ?>
&tab=<?php echo $_GET['tab']; ?>
&showall=<?php echo $_GET['showall']; ?>
&">
            <tr><td class = "topTitle" name = "text"><?php echo @_QUESTIONTEXT; ?>
</td>
            <?php if ($_GET['showall'] && ((is_array($_tmp='questions_pool')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
	        	<td name = "lesson_name" class = "topTitle"><?php echo @_LESSON; ?>
</td>
	        <?php endif; ?>
                <td class = "topTitle centerAlign" name = "type"><?php echo @_QUESTIONTYPE; ?>
</td>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
                <td class = "topTitle centerAlign" name = "difficulty"><?php echo @_DIFFICULTY; ?>
</td>
			<?php endif; ?>
            <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
                <td class = "topTitle centerAlign" name = "weight"><?php echo @_QUESTIONWEIGHT; ?>
</td>
            <?php endif; ?>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
            	<td class = "topTitle centerAlign" name = "estimate"><?php echo @_TIME; ?>
</td>
			<?php endif; ?>
                <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
                <td class = "topTitle centerAlign" name = "partof"><?php echo @_USEQUESTION; ?>
</td></tr>
			<?php $_from = $this->_tpl_vars['T_UNIT_QUESTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['questions_list']['iteration']++;
?>
            <?php if ($this->_tpl_vars['T_CTG'] == 'tests' || ( $this->_tpl_vars['T_CTG'] == 'feedback' && $this->_tpl_vars['item']['type'] != 'true_false' )): ?>
				<tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor, evenRowColor"), $this);?>
">
				<?php if ($this->_tpl_vars['item']['lessons_ID'] == $_SESSION['s_lessons_ID']): ?>
					<td><a  class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['item']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['item']['lessons_ID']; ?>
" title="<?php echo $this->_tpl_vars['item']['text']; ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</a></td>
				<?php else: ?>
					<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</td>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
					<td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
				<?php else: ?>
	        		<td><span title = "<?php echo $this->_tpl_vars['T_LESSONS'][$this->_tpl_vars['item']['lessons_ID']]['lesson_path']; ?>
"><?php echo $this->_tpl_vars['item']['lesson_name']; ?>
</span></td>
	        	<?php endif; ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_TYPE_ICONS'][$this->_tpl_vars['item']['type']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['item']['type']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['item']['type']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['item']['type']; ?>
</span>					</td>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTY_ICONS'][$this->_tpl_vars['item']['difficulty']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['item']['difficulty']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['item']['difficulty']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['item']['difficulty']; ?>
</span>					</td>
				<?php endif; ?>
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign"><?php echo $this->_tpl_vars['T_TEST_FORM']['question_weight'][$this->_tpl_vars['key']]['html']; ?>
</td>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign"><?php if (! $this->_tpl_vars['item']['estimate']): ?>-<?php else: ?><?php if ($this->_tpl_vars['item']['estimate_interval']['minutes']): ?><?php echo $this->_tpl_vars['item']['estimate_interval']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['item']['estimate_interval']['seconds']): ?><?php echo $this->_tpl_vars['item']['estimate_interval']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?><?php endif; ?></td>
				<?php endif; ?>
					<td class = "centerAlign">
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_PREVIEW; ?>
', 2)"><img src = "images/16x16/search.png" alt = "<?php echo @_PREVIEW; ?>
" title = "<?php echo @_PREVIEW; ?>
" /></a>
						<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&lessonId=<?php echo $this->_tpl_vars['item']['lessons_ID']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_CORRELATESKILLSTOQUESTION; ?>
', 2)"><img src = "images/16x16/tools.png" alt = "<?php echo @_CORRELATESKILLSTOQUESTION; ?>
" title = "<?php echo @_CORRELATESKILLSTOQUESTION; ?>
" /></a>
						<?php endif; ?>
						<?php if (( $this->_tpl_vars['T_CTG'] != 'feedback' && $this->_tpl_vars['item']['lessons_ID'] == $_SESSION['s_lessons_ID'] ) || $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['item']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['item']['lessons_ID']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDIT; ?>
" title = "<?php echo @_EDIT; ?>
"/></a>
						<?php endif; ?>
					</td>
					<td class = "centerAlign"><?php echo $this->_tpl_vars['T_TEST_FORM']['questions'][$this->_tpl_vars['key']]['html']; ?>
<span style = "display:none"><?php echo $this->_tpl_vars['T_TEST_FORM']['questions'][$this->_tpl_vars['key']]['value']; ?>
</span></td> 				</tr>
			<?php endif; ?>
            <?php endforeach; else: ?>
            <tr class = "oddRowColor defaultRowHeight"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
            <?php endif; unset($_from); ?>
        </table>
<!--/ajax:questionsTable-->
  <?php else: ?>
<!--ajax:questionsTable-->
        <table class = "QuestionsListTable sortedTable" id = "questionsTable" size = "<?php echo $this->_tpl_vars['T_QUESTIONS_SIZE']; ?>
" sortBy = "7" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&edit_test=<?php echo $_GET['edit_test']; ?>
&tab=<?php echo $_GET['tab']; ?>
&showall=<?php echo $_GET['showall']; ?>
&">
            <tr><td class = "topTitle" name = "text"><?php echo @_QUESTIONTEXT; ?>
</td>
            <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
                <td class = "topTitle" name = "parent_name"><?php echo @_UNITNAME; ?>
</td>
            <?php else: ?>
                <td name="name" class = "topTitle"><?php echo @_ASSOCIATEDWITH; ?>
</td>
            <?php endif; ?>
                <td class = "topTitle centerAlign" name = "type"><?php echo @_QUESTIONTYPE; ?>
</td>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
                <td class = "topTitle centerAlign" name = "difficulty"><?php echo @_DIFFICULTY; ?>
</td>
			<?php endif; ?>
            <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
                <td class = "topTitle centerAlign" name = "weight"><?php echo @_QUESTIONWEIGHT; ?>
</td>
            <?php endif; ?>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
            	<td class = "topTitle centerAlign" name = "estimate"><?php echo @_TIME; ?>
</td>
			<?php endif; ?>
                <td class = "topTitle centerAlign noSort"><?php echo @_OPERATIONS; ?>
</td>
                <td class = "topTitle centerAlign" name = "partof"><?php echo @_USEQUESTION; ?>
</td></tr>
			<?php $_from = $this->_tpl_vars['T_UNIT_QUESTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['questions_list']['iteration']++;
?>
            <?php if ($this->_tpl_vars['T_CTG'] == 'tests' || ( $this->_tpl_vars['T_CTG'] == 'feedback' && $this->_tpl_vars['item']['type'] != 'true_false' )): ?>
				<tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor, evenRowColor"), $this);?>
">
				<?php if ($this->_tpl_vars['item']['lessons_ID'] == $_SESSION['s_lessons_ID']): ?>	
					<td><a  class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['item']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['item']['lessons_ID']; ?>
" title="<?php echo $this->_tpl_vars['item']['text']; ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</a></td>
				<?php else: ?>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 50) : smarty_modifier_eF_truncate($_tmp, 50)); ?>
</td>
				<?php endif; ?>
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
					<td><?php if ($this->_tpl_vars['item']['parent_name']): ?><?php echo $this->_tpl_vars['item']['parent_name']; ?>
<?php else: ?><?php echo @_NONE; ?>
<?php endif; ?></td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
				<?php endif; ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_TYPE_ICONS'][$this->_tpl_vars['item']['type']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['item']['type']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['item']['type']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['item']['type']; ?>
</span>					</td>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTY_ICONS'][$this->_tpl_vars['item']['difficulty']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['item']['difficulty']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['item']['difficulty']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['item']['difficulty']; ?>
</span>					</td>
				<?php endif; ?>
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign"><?php echo $this->_tpl_vars['T_TEST_FORM']['question_weight'][$this->_tpl_vars['key']]['html']; ?>
</td>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign"><?php if (! $this->_tpl_vars['item']['estimate']): ?>-<?php else: ?><?php if ($this->_tpl_vars['item']['estimate_interval']['minutes']): ?><?php echo $this->_tpl_vars['item']['estimate_interval']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['item']['estimate_interval']['seconds']): ?><?php echo $this->_tpl_vars['item']['estimate_interval']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?><?php endif; ?></td>
				<?php endif; ?>
					<td class = "centerAlign">
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_PREVIEW; ?>
', 2)"><img src = "images/16x16/search.png" alt = "<?php echo @_PREVIEW; ?>
" title = "<?php echo @_PREVIEW; ?>
" /></a>
				<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&lessonId=<?php echo $this->_tpl_vars['item']['lessons_ID']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_CORRELATESKILLSTOQUESTION; ?>
', 2)"><img src = "images/16x16/tools.png" alt = "<?php echo @_CORRELATESKILLSTOQUESTION; ?>
" title = "<?php echo @_CORRELATESKILLSTOQUESTION; ?>
" /></a>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback' && $this->_tpl_vars['item']['lessons_ID'] == $_SESSION['s_lessons_ID'] || $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
					<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['item']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['item']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['item']['lessons_ID']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDIT; ?>
" title = "<?php echo @_EDIT; ?>
"/></a>
				<?php endif; ?>
					</td>
					<td class = "centerAlign"><?php echo $this->_tpl_vars['T_TEST_FORM']['questions'][$this->_tpl_vars['key']]['html']; ?>
<span style = "display:none"><?php echo $this->_tpl_vars['T_TEST_FORM']['questions'][$this->_tpl_vars['key']]['value']; ?>
</span></td> 				</tr>
			<?php endif; ?>
            <?php endforeach; else: ?>
            <tr class = "oddRowColor defaultRowHeight"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
            <?php endif; unset($_from); ?>
        </table>
<!--/ajax:questionsTable-->
  <?php endif; ?>
<?php endif; ?>
	<?php $this->_smarty_vars['capture']['t_test_questions'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>
		<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
			<?php $this->assign('tempTitle', @_TESTOPTIONS); ?>
			<?php $this->assign('questionsTitle', @_TESTQUESTIONS); ?>
		<?php else: ?>
			<?php $this->assign('tempTitle', @_FEEDBACKOPTIONS); ?>
			<?php $this->assign('questionsTitle', @_QUESTIONS); ?>
		<?php endif; ?>
		<div class = "tabber">
        	<div class = "tabbertab" id="test_options" title = "<?php echo $this->_tpl_vars['tempTitle']; ?>
">

				<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['tempTitle'],'data' => $this->_smarty_vars['capture']['t_test_properties'],'image' => '32x32/generic.png'), $this);?>

            </div>
        <?php if ($_GET['edit_test']): ?>
        	<div class = "tabbertab <?php if ($_GET['tab'] == 'question' || $_GET['tab'] == 'questions'): ?>tabbertabdefault<?php endif; ?>" id = "test_questions" title = "<?php echo $this->_tpl_vars['questionsTitle']; ?>
">
				<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['questionsTitle'],'data' => $this->_smarty_vars['capture']['t_test_questions'],'image' => '32x32/question_and_answer.png'), $this);?>

            </div>
		<?php endif; ?>

		        <?php if ($this->_tpl_vars['T_SKILLGAP_TEST'] && $_GET['edit_test']): ?>
			<?php ob_start(); ?>
<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'testUsersTable'): ?>
<!--ajax:testUsersTable-->
	        <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_USERS_SIZE']; ?>
" sortBy = "0" id = "testUsersTable" useAjax = "1" branchFilter="true" jobFilter="<?php echo $this->_tpl_vars['T_JOBS_FILTER']; ?>
" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
"  url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_test=<?php echo $_GET['edit_test']; ?>
&">
	            <tr class = "topTitle">
	                <td class = "topTitle" name = "login"><?php echo @_USER; ?>
</td>
	                <td class = "topTitle centerAlign" name = "partof"><?php echo @_CHECK; ?>
</td>
	            </tr>
	    <?php $_from = $this->_tpl_vars['T_ALL_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
	            <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
	                <td>#filter:login-<?php echo $this->_tpl_vars['user']['login']; ?>
#</td>
	                <td class = "centerAlign">
	                    <?php if ($this->_tpl_vars['user']['solved'] == 1): ?>
	                    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['user']['completed_test_id']; ?>
&test_analysis=<?php echo $_GET['edit_test']; ?>
&user=<?php echo $this->_tpl_vars['user']['login']; ?>
"><img border="0" src="images/16x16/analysis.png" style="vertical-align:middle" alt="<?php echo @_TESTSOLVEDVIEWTOSEESKILLGAPANALYSIS; ?>
" title="<?php echo @_TESTSOLVEDVIEWTOSEESKILLGAPANALYSIS; ?>
" /></a>
	                    <a href = "javascript:void(0);" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) ajaxRemoveSolvedTest(this, '<?php echo $this->_tpl_vars['user']['login']; ?>
', '<?php echo $this->_tpl_vars['user']['completed_test_id']; ?>
','<?php echo $_GET['edit_test']; ?>
');"/><img border="0" src="images/16x16/error_delete.png" style="vertical-align:middle" alt="<?php echo @_DELETESKILLGAPTESTRECORD; ?>
" title="<?php echo @_DELETESKILLGAPTESTRECORD; ?>
"/> </a>
	                    <?php else: ?>
	                    <input class = "inputCheckbox" type = "checkbox" name = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" id = "checked_<?php echo $this->_tpl_vars['user']['login']; ?>
" onclick = "ajaxPost('<?php echo $this->_tpl_vars['user']['login']; ?>
', this,'testUsersTable');" <?php if (isset ( $this->_tpl_vars['user']['partof'] )): ?>checked = "checked"<?php endif; ?> /><?php if (in_array ( $this->_tpl_vars['user']['login'] , $this->_tpl_vars['T_LESSON_USERS'] )): ?><span style = "display:none">checked</span><?php endif; ?> 	                    <?php endif; ?>
	                </td>
	            </tr>
	    <?php endforeach; else: ?>
	            <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
	    <?php endif; unset($_from); ?>
	        </table>
<!--/ajax:testUsersTable-->
<?php endif; ?>
			<?php $this->_smarty_vars['capture']['t_test_users_code'] = ob_get_contents(); ob_end_clean(); ?>

	        <div class = "tabbertab" id = "test_users" title = "<?php echo @_USERS; ?>
">
				<?php echo smarty_function_eF_template_printBlock(array('title' => @_USERS,'data' => $this->_smarty_vars['capture']['t_test_users_code'],'image' => '32x32/users.png'), $this);?>

	    	</div>
    	<?php endif; ?>
		</div>
    <?php $this->_smarty_vars['capture']['t_edit_test_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php if ($_GET['edit_test']): ?>
	    <?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => (@_OPTIONSFORSKILLGAPTEST)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_edit_test_code'],'image' => '32x32/skill_gap.png'), $this);?>

	    <?php elseif ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => (@_OPTIONSFORTEST)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_edit_test_code'],'image' => '32x32/tests.png'), $this);?>

	    <?php else: ?>
			 <?php echo smarty_function_eF_template_printBlock(array('title' => (@_OPTIONSFORFEEDBACK)." <span class = 'innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['t_edit_test_code'],'image' => '32x32/feedback.png'), $this);?>

		<?php endif; ?>
	<?php elseif ($_GET['add_test']): ?>
	    <?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => (@_ADDSKILLGAPTEST),'data' => $this->_smarty_vars['capture']['t_edit_test_code'],'image' => '32x32/skill_gap.png'), $this);?>

	    <?php elseif ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => @_ADDTEST,'data' => $this->_smarty_vars['capture']['t_edit_test_code'],'image' => '32x32/tests.png'), $this);?>

		<?php else: ?>
			<?php echo smarty_function_eF_template_printBlock(array('title' => @_ADDFEEDBACSFEEDBACK,'data' => $this->_smarty_vars['capture']['t_edit_test_code'],'image' => '32x32/tests.png'), $this);?>

	    <?php endif; ?>
	<?php endif; ?>

<?php elseif ($_GET['add_question'] || $_GET['edit_question']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/tests/add_question.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($_GET['show_test'] || isset ( $this->_tpl_vars['T_TEST_UNSOLVED'] )): ?>
	<?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?view_unit=".($this->_tpl_vars['T_CURRENT_TEST']->test['content_ID'])."'>".(@_VIEWTEST).": ".($this->_tpl_vars['T_CURRENT_TEST']->test['name'])."</a>"); ?>
	<?php ob_start(); ?>
	<table id="shown_test" width = "100%" align = "center" >
	   <?php if (! isset ( $_GET['popup'] )): ?>
	    <tr><td colspan = "2">
	            <table>
	                <tr><td style = "border-right:1px solid black;">
	                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>edit_unit=<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
<?php else: ?>edit_test=<?php echo $_GET['show_test']; ?>
<?php endif; ?>"><img border="0" src="images/16x16/edit.png" style="vertical-align:middle" alt="<?php echo @_UPDATETEST; ?>
" title="<?php echo @_UPDATETEST; ?>
"></a>
	                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>edit_unit=<?php echo $this->_tpl_vars['T_UNIT']['id']; ?>
<?php else: ?>edit_test=<?php echo $_GET['show_test']; ?>
<?php endif; ?>" style = "vertical-align:middle"><?php echo @_EDITTEST; ?>
</a>&nbsp;
	                </td><td style = "border-right:1px solid black;">
	                    &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&add_test=1"><img border="0" src="images/16x16/add.png" style="vertical-align:middle" alt="<?php echo @_CREATETEST; ?>
" title="<?php echo @_CREATETEST; ?>
"></a>
	                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&add_test=1" style = "vertical-align:middle"><?php echo @_CREATETEST; ?>
</a>&nbsp;
	                </td>
	                	                <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
	                <td>
	                    &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&add_unit=1"><img border="0" src="images/16x16/add.png" style="vertical-align:middle" alt="<?php echo @_CREATEUNIT; ?>
" title="<?php echo @_CREATEUNIT; ?>
"></a>
	                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&add_unit=1" style = "vertical-align:middle"><?php echo @_CREATEUNIT; ?>
</a>&nbsp;
	                </td>
	                <?php endif; ?>
	                </tr>
	            </table>
	    </td></tr>
	    <tr><td colspan = "2" class = "horizontalSeparator"></td></tr>

	    <?php endif; ?>
	    <tr><td id = "singleColumn">
	    <?php if ($_GET['print']): ?>
	    <p style = "text-align:center"><input id = "print_button" class = "flatButton" type = "submit" onClick = "$('print_button').hide();window.print()" value = "<?php echo @_PRINTIT; ?>
"/></p>
	    <?php endif; ?>
	    <?php echo $this->_tpl_vars['T_TEST_UNSOLVED']; ?>

	    </td></tr>
	</table>
	<?php $this->_smarty_vars['capture']['t_show_test'] = ob_get_contents(); ob_end_clean(); ?>
	<?php echo smarty_function_eF_template_printBlock(array('title' => @_PREVIEW,'data' => $this->_smarty_vars['capture']['t_show_test'],'image' => '32x32/generic.png'), $this);?>

	<br/><br/>
<?php elseif ($_GET['quick_test_add']): ?>
	<?php ob_start(); ?>
	<table id="skillQuestionsTable" width="100%" border = "0" width = "100%"  class = "sortedTable" sortBy = "0">
	    <tr class = "topTitle">
	        <td class = "topTitle"><?php echo @_SKILL; ?>
</td>
	        <td class = "topTitle"><?php echo @_QUESTIONS; ?>
</td>
	    </tr>
	    <?php $_from = $this->_tpl_vars['T_QUESTION_SKILLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['skill']):
        $this->_foreach['_list']['iteration']++;
?>
	    <tr>
	        <td><?php echo $this->_tpl_vars['skill']['description']; ?>
</td>
	        <td>
	        	<span id = "span_skill_checked_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" style="display:none"><?php if (isset ( $this->_tpl_vars['skill']['questions_ID'] )): ?>1<?php else: ?>0<?php endif; ?></span>
	            <input class = "inputText" type = "checkbox" id = "questions_for_skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
"  name = "questions_for_skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
">
	        </td>
	    </tr>
	    <?php endforeach; else: ?>
	    <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "6"><?php echo @_NODATAFOUND; ?>
</td></tr>
	    <?php endif; unset($_from); ?>
	</table>

	<?php $this->_smarty_vars['capture']['t_random_questions_from_skills'] = ob_get_contents(); ob_end_clean(); ?>
	<?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_CORRELATETOQUESTION)) ? $this->_run_mod_handler('cat', true, $_tmp, ':&nbsp;<i>') : smarty_modifier_cat($_tmp, ':&nbsp;<i>')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_QUESTION_TEXT']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_QUESTION_TEXT'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</i>') : smarty_modifier_cat($_tmp, '</i>')),'data' => $this->_smarty_vars['capture']['t_random_questions_from_skills'],'image' => '32x32/generic.png','options' => $this->_tpl_vars['T_SUGGEST_QUESTION_']), $this);?>

<?php elseif ($_GET['show_solved_test']): ?>
	<?php if (! $_GET['test_analysis']): ?>
		<?php ob_start(); ?>
	    	<?php if ($_GET['print']): ?>
	    	<p style = "text-align:center"><input class = "flatButton" type = "submit" onClick = "window.print()" value = "<?php echo @_PRINTIT; ?>
"/></p>
	        <?php endif; ?>
		    <?php echo $this->_tpl_vars['T_TEST_SOLVED']; ?>


		    		    <?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
			    <?php echo '
				    <script>
				    if (document.getElementById(\'redoLinkHref\')) {
					    document.getElementById(\'redoLinkHref\').href = "'; ?>
<?php echo $_SESSION['s_type']; ?>
<?php echo '.php?ctg=tests&delete_solved_test='; ?>
<?php echo $_GET['show_solved_test']; ?>
<?php echo '&test_id='; ?>
<?php echo $this->_tpl_vars['T_TEST_DATA']->test['id']; ?>
<?php echo '&users_login='; ?>
<?php echo $this->_tpl_vars['T_TEST_DATA']->completedTest['login']; ?>
<?php echo '";
					    document.getElementById(\'redoLinkHref\').onclick = "";
				    }
				    document.getElementById(\'testAnalysisLinkHref\').href = document.getElementById(\'testAnalysisLinkHref\').href + "&user='; ?>
<?php echo $this->_tpl_vars['T_TEST_DATA']->completedTest['login']; ?>
<?php echo '";
				    </script>
			    '; ?>

		    <?php endif; ?>
	    <?php $this->_smarty_vars['capture']['t_solved_test_code'] = ob_get_contents(); ob_end_clean(); ?>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
				<?php echo smarty_function_eF_template_printBlock(array('title' => (@_SOLVEDTEST)." ".(@_FORTEST)." <span class = \"innerTableName\">&quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</span> ".(@_ANDUSER)." <span class = \"innerTableName\">&quot;#filter:login-".($this->_tpl_vars['T_TEST_DATA']->completedTest['login'])."#&quot;</span>",'data' => $this->_smarty_vars['capture']['t_solved_test_code'],'image' => '32x32/tests.png'), $this);?>

			<?php else: ?>
				<?php echo smarty_function_eF_template_printBlock(array('title' => (@_FEEDBACK)." <span class = \"innerTableName\">&quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</span> ".(@_ANDUSER)." <span class = \"innerTableName\">&quot;#filter:login-".($this->_tpl_vars['T_TEST_DATA']->completedTest['login'])."#&quot;</span>",'data' => $this->_smarty_vars['capture']['t_solved_test_code'],'image' => '32x32/feedback.png'), $this);?>

			<?php endif; ?>
		<?php else: ?>
	    <?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>

            <?php ob_start(); ?>
                <div class="tabber" >
                    <div class="tabbertab">
                        <h3><?php echo @_SKILLSCORES; ?>
</h3>
                    <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                         <?php if ($this->_tpl_vars['_change_']): ?>
                        <div class = "headerTools">
                        	<span>
                        		<img id="addToSkillSetImg" src="images/16x16/tools.png" title="<?php echo @_ADDSKILLSTOSKILLSET; ?>
" alt="<?php echo @_ADDSKILLSTOSKILLSET; ?>
"/>
                        		<a href="javascript:void(0);" onclick="eF_addTestSkills()"><?php echo @_ADDSKILLSTOSKILLSET; ?>
</a>
                        	</span>
                        </div>
                        <?php endif; ?>
					<?php endif; ?>                         <table id="skillScoresTable" border = "0" width = "100%"  class = "sortedTable" sortBy = "0">
                            <tr class = "topTitle">
                                <td class = "topTitle"><?php echo @_SKILL; ?>
</td>
                                <td class = "topTitle"><?php echo @_SCORE; ?>
</td>
                                <td class = "topTitle"><?php echo @_THRESHOLD; ?>
</td>
                            <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                 <?php if ($this->_tpl_vars['_change_']): ?>
                                <td class = "topTitle centerAlign"><?php echo @_OPERATIONS; ?>
</td>
                                <?php endif; ?>
                            <?php endif; ?>                             </tr>

                            <?php $_from = $this->_tpl_vars['T_SKILLSGAP']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['skills_gap_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['skills_gap_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['skill']):
        $this->_foreach['skills_gap_list']['iteration']++;
?>
                            <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
">
                                <td><?php echo $this->_tpl_vars['skill']['skill']; ?>
</td>
                                <td class = "progressCell">
                                    <span style = "display:none"><?php echo $this->_tpl_vars['skill']['score']; ?>
</span>
                                    <span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['skill']['score']; ?>
#%</span>
                                    <span id="<?php echo $this->_tpl_vars['skill']['id']; ?>
_bar" class = "progressBar" style = "background-color:<?php if ($this->_tpl_vars['skill']['score'] >= $this->_tpl_vars['T_TEST_DATA']->options['general_threshold']): ?>#00FF00<?php else: ?>#FF0000<?php endif; ?>;width:<?php echo $this->_tpl_vars['skill']['score']; ?>
px;">&nbsp;</span>&nbsp;
                                </td>

                                <td>
                                <?php if ($this->_tpl_vars['_change_']): ?>                                
                                	<input type="text" id="<?php echo $this->_tpl_vars['skill']['id']; ?>
_threshold" value="<?php echo $this->_tpl_vars['T_TEST_DATA']->options['general_threshold']; ?>
" onChange="eF_thresholdChange('<?php echo $this->_tpl_vars['skill']['id']; ?>
', '<?php echo $this->_tpl_vars['skill']['score']; ?>
',true)" />&nbsp;%<input type="hidden" id="<?php echo $this->_tpl_vars['skill']['id']; ?>
_previous_threshold" value = "<?php echo $this->_tpl_vars['T_TEST_DATA']->options['general_threshold']; ?>
" />
                                <?php else: ?>
                                	<?php echo $this->_tpl_vars['T_TEST_DATA']->options['general_threshold']; ?>

                                <?php endif; ?>
                                </td>

                            <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                 <?php if ($this->_tpl_vars['_change_']): ?>
                                <td align="center"><a href="javascript:void(0);" onclick="eF_addSingleTestSkill('<?php echo $this->_tpl_vars['skill']['id']; ?>
')"><img id="addToSkillSetImg<?php echo $this->_tpl_vars['skill']['id']; ?>
" src="images/16x16/tools.png" title="<?php echo @_ADDSKILLTOSKILLSET; ?>
" alt="<?php echo @_ADDSKILLTOSKILLSET; ?>
"/ border="0"></a></td>
                                <?php endif; ?>
                            <?php endif; ?>                             </tr>
                            <?php endforeach; else: ?>
                            <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NOSKILLSCORRELATEDWITHTHETESTSQUESTIONS; ?>
</td></tr>
                            <?php endif; unset($_from); ?>
                        </table>

                        <?php if ($this->_tpl_vars['T_SKILLSGAP'] && $this->_tpl_vars['_change_']): ?>
                        <br />
                        <table>
                            <tr>
                                <td><?php echo @_GENERALTHRESHOLD; ?>
:&nbsp;</td>
                                <td><input type="text" id="shold" value="<?php echo $this->_tpl_vars['T_TEST_DATA']->options['general_threshold']; ?>
" onChange="javascript:eF_generalThresholdChange(this.value)" />&nbsp;%<input type="hidden" id="general_previous_threshold" value = "<?php echo $this->_tpl_vars['T_TEST_DATA']->options['general_threshold']; ?>
" /></td>
                            </tr>
                        </table>
                        <?php endif; ?>
                    </div>
                    <div class="tabbertab">
                        <h3><?php echo @_PROPOSEDASSIGNMENTS; ?>
</h3>

                         <div class="tabber" >
                        <?php if ($this->_tpl_vars['T_CONFIGURATION']['lesson_enroll']): ?> 
                                <div class="tabbertab">
                       <h3><?php echo @_LESSONS; ?>
</h3>

<!--ajax:proposedLessonsTable-->
                        <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_PROPOSED_LESSONS_SIZE']; ?>
" sortBy = "0" id = "proposedLessonsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $_GET['show_solved_test']; ?>
&test_analysis=<?php echo $_GET['test_analysis']; ?>
&user=<?php echo $_GET['user']; ?>
<?php echo $this->_tpl_vars['T_MISSING_SKILLS_URL']; ?>
&">
                                        <tr class = "topTitle">
                                            <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
                                            <td class = "topTitle" name = "direction_name"><?php echo @_CATEGORY; ?>
</td>
                                            <td class = "topTitle" name = "languages_NAME"><?php echo @_LANGUAGE; ?>
</td>
                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                             <td class = "topTitle centerAlign" name ="skills_offered"><?php echo @_SKILLSOFFERED; ?>
</td>
                                        <?php else: ?>                                             <td class = "topTitle centerAlign" name = "price"><?php echo @_PRICE; ?>
</td>
                                        <?php endif; ?>                                             <td class = "topTitle centerAlign"><?php echo @_CHECK; ?>
</td>
                                        </tr>
                        <?php $_from = $this->_tpl_vars['T_PROPOSED_LESSONS_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['proposed_lesson']):
        $this->_foreach['lessons_list2']['iteration']++;
?>
                                        <tr id="row_<?php echo $this->_tpl_vars['proposed_lesson']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['proposed_lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
                                            <td id = "column_<?php echo $this->_tpl_vars['proposed_lesson']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['proposed_lesson']['link']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['proposed_lesson']['direction_name']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['proposed_lesson']['languages_NAME']; ?>
</td>
                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                             <td align="center"><?php if ($this->_tpl_vars['proposed_lesson']['skills_offered'] == 0): ?><?php echo @_NOSKILLSOFFERED; ?>
<?php else: ?><?php echo $this->_tpl_vars['proposed_lesson']['skills_offered']; ?>
<?php endif; ?></td>
                                        <?php else: ?>                                             <td align="center"><?php if ($this->_tpl_vars['proposed_lesson']['price'] == 0): ?><?php echo @_FREE; ?>
<?php else: ?><?php echo $this->_tpl_vars['proposed_lesson']['price']; ?>
 <?php echo $this->_tpl_vars['T_CURRENCYSYMBOLS'][$this->_tpl_vars['T_CONFIGURATION']['currency']]; ?>
<?php endif; ?></td>
                                        <?php endif; ?> 
                                        <?php if ($this->_tpl_vars['T_SKILLGAP_TEST'] && ( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change' )): ?>
                                            <td class = "centerAlign">
                                                <?php if ($_SESSION['s_type'] == 'administrator'): ?>
	                                                <img class = "ajaxHandle" src = "images/16x16/arrow_right.png" id = "lesson_<?php echo $this->_tpl_vars['proposed_lesson']['id']; ?>
"  name = "lesson_<?php echo $this->_tpl_vars['proposed_lesson']['id']; ?>
"  onclick ="ajaxPost('<?php echo $this->_tpl_vars['proposed_lesson']['id']; ?>
', this,'proposedLessonsTable');">
                                                <?php elseif ($this->_tpl_vars['proposed_course']['show_catalog']): ?>
                                                    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&catalog=1&info_lesson=<?php echo $this->_tpl_vars['proposed_lesson']['id']; ?>
"><img src = "images/16x16/view.png" alt = "<?php echo @_MOREINFO; ?>
" title = "<?php echo @_MOREINFO; ?>
"/></a>
                                                <?php endif; ?>
                                                                                            </td>
                                        <?php endif; ?>

                                        </tr>

                        <?php endforeach; else: ?>
                                    <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NOLESSONSPROPOSEDACCORDINGTOANALYSIS; ?>
</td></tr>
                        <?php endif; unset($_from); ?>
                    </table>
<!--/ajax:proposedLessonsTable-->
                            </div>
                            <?php endif; ?>
                            <div class="tabbertab">
                               <h3><?php echo @_COURSES; ?>
</h3>
<!--ajax:proposedCoursesTable-->
                                <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_PROPOSED_COURSES_SIZE']; ?>
" sortBy = "0" id = "proposedCoursesTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $_GET['show_solved_test']; ?>
&test_analysis=<?php echo $_GET['test_analysis']; ?>
&user=<?php echo $_GET['user']; ?>
<?php echo $this->_tpl_vars['T_MISSING_SKILLS_URL']; ?>
&">
                                                <tr class = "topTitle">
                                                    <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
                                                    <td class = "topTitle" name = "direction_name"><?php echo @_CATEGORY; ?>
</td>
                                                    <td class = "topTitle" name = "languages_NAME"><?php echo @_LANGUAGE; ?>
</td>
                                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                                     <td class = "topTitle centerAlign" name ="skills_offered"><?php echo @_SKILLSOFFERED; ?>
</td>
                                                <?php else: ?>                                                     <td class = "topTitle centerAlign" name = "price"><?php echo @_PRICE; ?>
</td>
                                                <?php endif; ?>                                                     <td class = "topTitle centerAlign"><?php echo @_OPTIONS; ?>
</td>
                                                </tr>
                                <?php $_from = $this->_tpl_vars['T_PROPOSED_COURSES_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['courses_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['courses_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['proposed_course']):
        $this->_foreach['courses_list2']['iteration']++;
?>
                                                <tr id="row_<?php echo $this->_tpl_vars['proposed_course']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['proposed_course']['active']): ?>deactivatedTableElement<?php endif; ?>">
                                                    <td id = "column_<?php echo $this->_tpl_vars['proposed_course']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['proposed_course']['link']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['proposed_course']['direction_name']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['proposed_course']['languages_NAME']; ?>
</td>
                                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                                     <td align="center"><?php if ($this->_tpl_vars['proposed_course']['skills_offered'] == 0): ?><?php echo @_NOSKILLSOFFERED; ?>
<?php else: ?><?php echo $this->_tpl_vars['proposed_course']['skills_offered']; ?>
<?php endif; ?></td>
                                                <?php else: ?>                                                     <td align="center"><?php if ($this->_tpl_vars['proposed_course']['price'] == 0): ?><?php echo @_FREE; ?>
<?php else: ?><?php echo $this->_tpl_vars['proposed_course']['price']; ?>
 <?php echo $this->_tpl_vars['T_CURRENCYSYMBOLS'][$this->_tpl_vars['T_CONFIGURATION']['currency']]; ?>
<?php endif; ?></td>
                                                <?php endif; ?> 
                                                <?php if ($this->_tpl_vars['T_SKILLGAP_TEST'] && ( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['users'] == 'change' )): ?>
                                                    <td class = "centerAlign">
                                                    <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                                                        <input class = "inputCheckBox" type = "checkbox" id = "course_<?php echo $this->_tpl_vars['proposed_course']['id']; ?>
"  name = "course_<?php echo $this->_tpl_vars['proposed_course']['id']; ?>
"  onclick ="ajaxPost('<?php echo $this->_tpl_vars['proposed_course']['id']; ?>
', this,'proposedCoursesTable');">
                                                    <?php elseif ($this->_tpl_vars['proposed_course']['show_catalog']): ?>
                                                    	<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&catalog=1&info_course=<?php echo $this->_tpl_vars['proposed_course']['id']; ?>
"><img src = "images/16x16/view.png" alt = "<?php echo @_MOREINFO; ?>
" title = "<?php echo @_MOREINFO; ?>
"/></a>
                                                    <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>

                                                </tr>

                                <?php endforeach; else: ?>
                                            <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NOCOURSESPROPOSEDACCORDINGTOANALYSIS; ?>
</td></tr>
                                <?php endif; unset($_from); ?>
                            </table>
<!--/ajax:proposedCoursesTable-->

                            </div>
                        </div>
                    </div>
<?php if ($_SESSION['s_type'] == 'administrator'): ?>
                    <div class="tabbertab">
                        <h3><?php echo @_ATTENDING; ?>
</h3>

                        <div class="tabber">
                        <?php if ($this->_tpl_vars['T_CONFIGURATION']['lesson_enroll']): ?>                         
                            <div class="tabbertab">
                            <h3><?php echo @_LESSONS; ?>
</h3>

<!--ajax:assignedLessonsTable-->
                                <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_ASSIGNED_LESSONS_SIZE']; ?>
" sortBy = "0" id = "assignedLessonsTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $_GET['show_solved_test']; ?>
&test_analysis=<?php echo $_GET['test_analysis']; ?>
&user=<?php echo $_GET['user']; ?>
&">
                                                <tr class = "topTitle">
                                                    <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
                                                    <td class = "topTitle" name = "direction_name"><?php echo @_CATEGORY; ?>
</td>
                                                    <td class = "topTitle" name = "languages_NAME"><?php echo @_LANGUAGE; ?>
</td>
                                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                                     <td class = "topTitle centerAlign" name ="skills_offered"><?php echo @_SKILLSOFFERED; ?>
</td>
                                                <?php else: ?>                                                     <td class = "topTitle centerAlign" name = "price"><?php echo @_PRICE; ?>
</td>
                                                <?php endif; ?>                                                 </tr>
                                <?php $_from = $this->_tpl_vars['T_ASSIGNED_LESSONS_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lessons_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lessons_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['assigned_lesson']):
        $this->_foreach['lessons_list2']['iteration']++;
?>
                                                <tr id="row_<?php echo $this->_tpl_vars['assigned_lesson']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['assigned_lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
                                                    <td id = "column_<?php echo $this->_tpl_vars['assigned_lesson']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['assigned_lesson']['link']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['assigned_lesson']['direction_name']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['assigned_lesson']['languages_NAME']; ?>
</td>
                                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                                     <td align="center"><?php if ($this->_tpl_vars['assigned_lesson']['skills_offered'] == 0): ?><?php echo @_NOSKILLSOFFERED; ?>
<?php else: ?><?php echo $this->_tpl_vars['assigned_lesson']['skills_offered']; ?>
<?php endif; ?></td>
                                                <?php else: ?>                                                     <td align="center"><?php if ($this->_tpl_vars['assigned_lesson']['price'] == 0): ?><?php echo @_FREE; ?>
<?php else: ?><?php echo $this->_tpl_vars['assigned_lesson']['price']; ?>
 <?php echo $this->_tpl_vars['T_CURRENCYSYMBOLS'][$this->_tpl_vars['T_CONFIGURATION']['currency']]; ?>
<?php endif; ?></td>
                                                <?php endif; ?> 
                                                </tr>
                                <?php endforeach; else: ?>
                                            <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NOLESSONSFOUND; ?>
</td></tr>
                                <?php endif; unset($_from); ?>
                            </table>
<!--/ajax:assignedLessonsTable-->
                           </div>
						<?php endif; ?>
                            <div class="tabbertab">
                            <h3><?php echo @_COURSES; ?>
</h3>

<!--ajax:assignedCoursesTable-->
                                <table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_ASSIGNED_COURSES_SIZE']; ?>
" sortBy = "0" id = "assignedCoursesTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $_GET['show_solved_test']; ?>
&test_analysis=<?php echo $_GET['test_analysis']; ?>
&user=<?php echo $_GET['user']; ?>
&">
                                                <tr class = "topTitle">
                                                    <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
 </td>
                                                    <td class = "topTitle" name = "direction_name"><?php echo @_CATEGORY; ?>
</td>
                                                    <td class = "topTitle" name = "languages_NAME"><?php echo @_LANGUAGE; ?>
</td>
                                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                                     <td class = "topTitle centerAlign" name ="skills_offered"><?php echo @_SKILLSOFFERED; ?>
</td>
                                                <?php else: ?>                                                     <td class = "topTitle centerAlign" name = "price"><?php echo @_PRICE; ?>
</td>
                                                <?php endif; ?>                                                 </tr>
                                <?php $_from = $this->_tpl_vars['T_ASSIGNED_COURSES_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['courses_list2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['courses_list2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['assigned_course']):
        $this->_foreach['courses_list2']['iteration']++;
?>
                                                <tr id="row_<?php echo $this->_tpl_vars['assigned_course']['id']; ?>
" class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['assigned_course']['active']): ?>deactivatedTableElement<?php endif; ?>">
                                                    <td id = "column_<?php echo $this->_tpl_vars['assigned_course']['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['assigned_course']['name']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['assigned_course']['directions_name']; ?>
</td>
                                                    <td><?php echo $this->_tpl_vars['assigned_course']['languages_NAME']; ?>
</td>
                                                                                                <?php if (@G_VERSIONTYPE == 'enterprise'): ?>                                                     <td align="center"><?php if ($this->_tpl_vars['assigned_course']['skills_offered'] == 0): ?><?php echo @_NOSKILLSOFFERED; ?>
<?php else: ?><?php echo $this->_tpl_vars['assigned_course']['skills_offered']; ?>
<?php endif; ?></td>
                                                <?php else: ?>                                                     <td align="center"><?php if ($this->_tpl_vars['assigned_course']['price'] == 0): ?><?php echo @_FREE; ?>
<?php else: ?><?php echo $this->_tpl_vars['assigned_course']['price']; ?>
 <?php echo $this->_tpl_vars['T_CURRENCYSYMBOLS'][$this->_tpl_vars['T_CONFIGURATION']['currency']]; ?>
<?php endif; ?></td>
                                                <?php endif; ?>                                                 </tr>
                                <?php endforeach; else: ?>
                                            <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%"><?php echo @_NOCOURSESFOUND; ?>
</td></tr>
                                <?php endif; unset($_from); ?>
                            </table>
<!--/ajax:assignedCoursesTable-->
                            </div>
                        </div>
                    </div>
<?php endif; ?>
                </div>
            <?php $this->_smarty_vars['capture']['t_user_code'] = ob_get_contents(); ob_end_clean(); ?>

            <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_SKILLGAPANALYSISFORUSER)) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;<i>') : smarty_modifier_cat($_tmp, '&nbsp;<i>')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_USER_INFO']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_USER_INFO']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;') : smarty_modifier_cat($_tmp, '&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_USER_INFO']['surname']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_USER_INFO']['surname'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</i>&nbsp;') : smarty_modifier_cat($_tmp, '</i>&nbsp;')))) ? $this->_run_mod_handler('cat', true, $_tmp, @_ACCORDINGTOTEST) : smarty_modifier_cat($_tmp, @_ACCORDINGTOTEST)))) ? $this->_run_mod_handler('cat', true, $_tmp, '&nbsp;<i>') : smarty_modifier_cat($_tmp, '&nbsp;<i>')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_TEST_DATA']->test['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_TEST_DATA']->test['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</i>') : smarty_modifier_cat($_tmp, '</i>')),'data' => $this->_smarty_vars['capture']['t_user_code'],'image' => '32x32/profile.png','options' => $this->_tpl_vars['T_USER_LINK']), $this);?>

		<?php else: ?>
			<?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&show_solved_test=".($this->_tpl_vars['T_TEST_DATA']->completedTest['id'])."&test_analysis=1'>".(@_TESTANALYSISFORTEST)." &quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</a>"); ?>

			<?php ob_start(); ?>
            	<div class = "headerTools">
                	<span>
                    	<img src = "images/16x16/arrow_left.png" alt = "<?php echo @_VIEWSOLVEDTEST; ?>
" title = "<?php echo @_VIEWSOLVEDTEST; ?>
">
                        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $_GET['show_solved_test']; ?>
"><?php echo @_VIEWSOLVEDTEST; ?>
</a>
                    </span>
					<?php if (sizeof($this->_tpl_vars['T_TEST_STATUS']['testIds']) > 1): ?>
                    <span>
                        <img src = "images/16x16/go_into.png" alt = "<?php echo @_JUMPTOEXECUTION; ?>
" title = "<?php echo @_JUMPTOEXECUTION; ?>
">
                    	<?php echo @_JUMPTOEXECUTION; ?>

	                    <select  style = "vertical-align:middle" onchange = "location.toString().match(/show_solved_test/) ? location = location.toString().replace(/show_solved_test=\d+/, 'show_solved_test='+this.options[this.selectedIndex].value) : location = location + '&show_solved_test='+this.options[this.selectedIndex].value">
	                    	<?php $_from = $this->_tpl_vars['T_TEST_STATUS']['testIds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['test_analysis_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['test_analysis_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['test_analysis_list']['iteration']++;
?>
	                    		<option value = "<?php echo $this->_tpl_vars['item']; ?>
" <?php if ($_GET['show_solved_test'] == $this->_tpl_vars['item']): ?>selected<?php endif; ?>>#<?php echo $this->_foreach['test_analysis_list']['iteration']; ?>
 - #filter:timestamp_time-<?php echo $this->_tpl_vars['T_TEST_STATUS']['timestamps'][$this->_tpl_vars['key']]; ?>
#</option>
	                    	<?php endforeach; endif; unset($_from); ?>
	                    </select>
                    </span>
					<?php endif; ?>
                </div>
                <table style = "width:100%">
                    <tr><td style = "vertical-align:top"><?php echo $this->_tpl_vars['T_CONTENT_ANALYSIS']; ?>
</td></tr>
                    <tr><td>
                    	<div id = "graph_table"><div id = "proto_chart" class = "proto_graph"></div></div>
                    	<script>var show_test_graph = true;</script>
                    </td></tr>
                </table>
            <?php $this->_smarty_vars['capture']['t_test_analysis_code'] = ob_get_contents(); ob_end_clean(); ?>

            <?php echo smarty_function_eF_template_printBlock(array('title' => (@_TESTANALYSIS)." ".(@_FORTEST)." <span class = \"innerTableName\">&quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</span> ".(@_ANDUSER)." <span class = \"innerTableName\">&quot;#filter:login-".($this->_tpl_vars['T_TEST_DATA']->completedTest['login'])."#&quot;</span>",'data' => $this->_smarty_vars['capture']['t_test_analysis_code'],'image' => '32x32/tests.png'), $this);?>

        <?php endif; ?>
    <?php endif; ?>
<?php elseif ($_GET['questions_order']): ?>

                                <?php ob_start(); ?>
                                    <ul id = "dhtmlgoodies_question_tree" class = "dhtmlgoodies_tree">
                                    <?php $_from = $this->_tpl_vars['T_QUESTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['question']):
        $this->_foreach['questions_list']['iteration']++;
?>
                                        <li id = "dragtree_<?php echo $this->_tpl_vars['id']; ?>
" noChildren = "true">
                                            <a class = "drag_tree_questions" href = "javascript:void(0)" onmouseover = "eF_js_showHideDiv(this, 'div_<?php echo $this->_tpl_vars['id']; ?>
', event)" onmouseout = "$('div_<?php echo $this->_tpl_vars['id']; ?>
').hide()">: <?php echo ((is_array($_tmp=$this->_tpl_vars['question']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 100) : smarty_modifier_eF_truncate($_tmp, 100)); ?>
</a>
                                        </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </ul>
                                    <?php $_from = $this->_tpl_vars['T_QUESTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['question']):
        $this->_foreach['questions_list']['iteration']++;
?>
                                                                                <div id = "div_<?php echo $this->_tpl_vars['id']; ?>
" style = "display:none;width:70%" class = "popUpInfoDiv"><?php echo $this->_tpl_vars['question']['text']; ?>
</div>
                                    <?php endforeach; endif; unset($_from); ?>
                                <?php $this->_smarty_vars['capture']['questions_tree'] = ob_get_contents(); ob_end_clean(); ?>

								<?php ob_start(); ?>
                                <table style = "width:100%">
                                    <tr><td class = "mediumHeader popUpInfoDiv" style = "width:90%"><?php echo @_DRAGITEMSTOCHANGEQUESTIONSORDER; ?>
</td></tr>
									<tr><td>&nbsp;</td></tr>
									<tr><td>&nbsp;</td></tr>
                                    <tr><td><?php echo $this->_smarty_vars['capture']['questions_tree']; ?>
</td></tr>
                                    <tr><td>&nbsp;</td></tr>
                                    <tr><td><input class = "flatButton" type="button" onclick="saveQuestionTree()" value="<?php echo @_SAVECHANGES; ?>
"></td></tr>
                                </table>
                                								<?php $this->_smarty_vars['capture']['questions_treeTotal'] = ob_get_contents(); ob_end_clean(); ?>
								<?php echo smarty_function_eF_template_printBlock(array('title' => @_CHANGEORDER,'data' => $this->_smarty_vars['capture']['questions_treeTotal'],'image' => '32x32/order.png'), $this);?>



                                <script>
                                <?php echo '
                                function saveQuestionTree() {
                                    //alert(treeObj.getNodeOrders());

                                    new Ajax.Request(\''; ?>
<?php echo $_SERVER['PHP_SELF']; ?>
<?php echo '?ctg=tests&questions_order='; ?>
<?php echo $_GET['questions_order']; ?>
<?php echo '&ajax=1&order=\'+treeObj.getNodeOrders(), {
                                        method:\'get\',
                                        asynchronous:true,
                                        onSuccess: function (transport) {
                                            alert(transport.responseText);
                                        }
                                    });

                                }
                                '; ?>

                                </script>

<?php elseif ($_GET['show_question']): ?>
								<?php ob_start(); ?>
                                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=tests&show_question=".($this->_tpl_vars['T_QUESTION']['id'])."'>".(@_VIEWQUESTION)."</a>"); ?>
                                <br/>
                                	<?php echo '<style type = "text/css">span.orderedList{display:none;}</style>'; ?>

                                    <table width = "100%" align = "center" tyle = "border:1px solid black">
                                        <tr><td>
                                            <?php echo $this->_tpl_vars['T_QUESTION_PREVIEW']; ?>

                                        </td></tr>
                                    </table>
								<?php $this->_smarty_vars['capture']['t_show_question_code'] = ob_get_contents(); ob_end_clean(); ?>
								<?php echo smarty_function_eF_template_printBlock(array('title' => @_PREVIEW,'data' => $this->_smarty_vars['capture']['t_show_question_code'],'image' => '32x32/search.png'), $this);?>

                                <br/><br/>

                            <?php elseif ($_GET['test_results']): ?>
                                <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=".($this->_tpl_vars['T_CTG'])."&test_results=".($_GET['test_results'])."'>".($this->_tpl_vars['T_TEST']->test['name'])." ".(@_RESULTS)."</a>"); ?>
                                <?php ob_start(); ?>
								<div class = "headerTools">
									<span>
										<img src = "images/16x16/error_delete.png" alt = "<?php echo @_RESETEXECUTIONSFORALLUSERS; ?>
" title = "<?php echo @_RESETEXECUTIONSFORALLUSERS; ?>
"/>
										<a href = "javascript:void(0)" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteAllTestsForAllUsers(this);"><?php echo @_RESETEXECUTIONSFORALLUSERS; ?>
</a>
									</span>
								</div>
                                    <table class = "sortedTable" style = "width:100%">
                                        <tr class="defaultRowHeight"><td class = "topTitle"><?php echo @_USER; ?>
</td>
                                            <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
                                            <td class = "topTitle centerAlign"><?php echo @_PENDING; ?>
</td>
												<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
													<td class = "topTitle centerAlign"><?php echo @_TIMESDONE; ?>
</td>
												<?php endif; ?>
                                            <?php endif; ?>
											<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
												<td class = "topTitle centerAlign"><?php echo @_AVERAGESCORE; ?>
</td>
												<td class = "topTitle centerAlign"><?php echo @_MAXSCORE; ?>
</td>
												<td class = "topTitle centerAlign"><?php echo @_MINSCORE; ?>
</td>
											<?php endif; ?>
											<td class = "topTitle centerAlign"><?php echo @_FUNCTIONS; ?>
</td></tr>
                                    <?php $_from = $this->_tpl_vars['T_DONE_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['questions_list']['iteration']++;
?>
                                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor, evenRowColor"), $this);?>
 defaultRowHeight">
                                            <td><?php echo $this->_tpl_vars['key']; ?>
 (<?php echo $this->_tpl_vars['item']['surname']; ?>
 <?php echo $this->_tpl_vars['item']['name']; ?>
)</td>
                                            <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
                                            <td class = "centerAlign"><?php if ($this->_tpl_vars['item'][$this->_tpl_vars['item']['last_test_id']]['pending']): ?><?php echo @_YES; ?>
<?php else: ?><?php echo @_NO; ?>
<?php endif; ?></td>
												<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
													<td class = "centerAlign"><?php echo $this->_tpl_vars['item']['times_done']; ?>
</td>
												<?php endif; ?>
                                            <?php endif; ?>
											<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
												<td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['item']['average_score']; ?>
#%</td>
												<td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['item']['max_score']; ?>
#%</td>
												<td class = "centerAlign">#filter:score-<?php echo $this->_tpl_vars['item']['min_score']; ?>
#%</td>
											<?php endif; ?>
                                            <td class = "centerAlign">
                    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&show_solved_test=<?php echo $this->_tpl_vars['item']['last_test_id']; ?>
">
                        <img src = "images/16x16/search.png" alt = "<?php echo @_VIEWTEST; ?>
" title = "<?php echo @_VIEWTEST; ?>
" border = "0"/></a>
                    <?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['item']['last_test_id']; ?>
&test_analysis=1&user=<?php echo $this->_tpl_vars['key']; ?>
">
							<img src = "images/16x16/analysis.png" alt = "<?php echo @_TESTANALYSIS; ?>
" title = "<?php echo @_TESTANALYSIS; ?>
" border = "0"/></a>
                    <?php endif; ?>
					<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
                    <a href = "javascript:void(0)" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteAllTests(this, '<?php echo $this->_tpl_vars['key']; ?>
')">
                        <img src = "images/16x16/error_delete.png" alt = "<?php echo @_RESETALLTESTSSTATUS; ?>
" title = "<?php echo @_RESETALLTESTSSTATUS; ?>
" border = "0"/></a>
                    <?php else: ?>
                    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&delete_solved_test=<?php echo $this->_tpl_vars['item']['last_test_id']; ?>
&test_id=<?php echo $_GET['test_results']; ?>
&users_login=<?php echo $this->_tpl_vars['key']; ?>
" onclick = "return confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
');"/>
                        <img border="0" src="images/16x16/error_delete.png" style="vertical-align:middle" alt="<?php echo @_DELETESKILLGAPTESTRECORD; ?>
" title="<?php echo @_DELETESKILLGAPTESTRECORD; ?>
" </a>
                    <?php endif; ?>
                                            </td></tr>
                                    <?php endforeach; else: ?>
                                            <tr class = "oddRowColor defaultRowHeight"><td class = "emptyCategory" colspan = "100%"><?php echo @_NODATAFOUND; ?>
</td></tr>
                                    <?php endif; unset($_from); ?>
                                    </table>
                                <?php $this->_smarty_vars['capture']['t_test_results_code'] = ob_get_contents(); ob_end_clean(); ?>
								<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
									<?php echo smarty_function_eF_template_printBlock(array('title' => @_TESTRESULTS,'data' => $this->_smarty_vars['capture']['t_test_results_code'],'image' => '32x32/tests.png'), $this);?>

								<?php else: ?>
									<?php echo smarty_function_eF_template_printBlock(array('title' => @_FEEDBACKRESULTS,'data' => $this->_smarty_vars['capture']['t_test_results_code'],'image' => '32x32/feedback.png'), $this);?>

								<?php endif; ?>
							<?php elseif ($_GET['solved_tests']): ?>
                                <?php ob_start(); ?>

                                                <table width = "100%" class = "sortedTable">
                                                    <tr class = "defaultRowHeight">
                                                        <td class = "topTitle"><?php echo @_DATE; ?>
</td>
                                                        <td class = "topTitle"><?php echo @_NAME; ?>
</td>
                                                        <td class = "topTitle"><?php echo @_STUDENT; ?>
</td>
                                                        <td class = "topTitle centerAlign"><?php echo @_SCORE; ?>
</td>
                                                        <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
                                                    </tr>
                                    <?php $_from = $this->_tpl_vars['T_RECENT_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['t_recently_completed_tests'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t_recently_completed_tests']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['recent_test']):
        $this->_foreach['t_recently_completed_tests']['iteration']++;
?>
                                                    <tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
                                                        <td>#filter:timestamp_time-<?php echo $this->_tpl_vars['recent_test']['timestamp']; ?>
#</td>
                                                        <td><?php echo $this->_tpl_vars['recent_test']['name']; ?>
</td>
                                                        <td>#filter:login-<?php echo $this->_tpl_vars['recent_test']['users_LOGIN']; ?>
#</td>
                                                        <td class = "centerAlign"><?php if ($this->_tpl_vars['recent_test']['score']): ?><?php echo $this->_tpl_vars['recent_test']['score']; ?>
%<?php else: ?>0.00%<?php endif; ?></td>
                                                        <td align = "center">
                                                            <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['recent_test']['id']; ?>
">
                                                                <img src = "images/16x16/search.png" alt = "<?php echo @_VIEWTEST; ?>
" title = "<?php echo @_VIEWTEST; ?>
" border = "0"/></a>
                                                            <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['recent_test']['id']; ?>
&test_analysis=1&user=<?php echo $this->_tpl_vars['recent_test']['users_LOGIN']; ?>
">
                                                                <img src = "images/16x16/analysis.png" alt = "<?php echo @_TESTANALYSIS; ?>
" title = "<?php echo @_TESTANALYSIS; ?>
" border = "0"/></a>
                                                            <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&delete_solved_test=<?php echo $this->_tpl_vars['recent_test']['id']; ?>
&test_id=<?php echo $this->_tpl_vars['recent_test']['tests_ID']; ?>
&users_login=<?php echo $this->_tpl_vars['recent_test']['users_LOGIN']; ?>
" onclick = "return confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
');"/>
                                                                <img src="images/16x16/error_delete.png" style="vertical-align:middle" alt="<?php echo @_DELETESKILLGAPTESTRECORD; ?>
" title="<?php echo @_DELETESKILLGAPTESTRECORD; ?>
"> </a>
                                                        </td>
                                                    </tr>
                                    <?php endforeach; else: ?>
                                                    <tr><td class = "emptyCategory oddRowColor" colspan = "100%" style = "text-align:center"><?php echo @_NOCOMPLETEDSKILLGAP; ?>
</td></tr>
                                    <?php endif; unset($_from); ?>
                                                </table>

                                <?php $this->_smarty_vars['capture']['t_recently_completed'] = ob_get_contents(); ob_end_clean(); ?>
                                <?php echo smarty_function_eF_template_printBlock(array('title' => @_SKILLGAPTESTS,'data' => $this->_smarty_vars['capture']['t_recently_completed'],'image' => '32x32/skill_gap.png'), $this);?>


<?php else: ?>

	<?php ob_start(); ?>
		<script>var published = '<?php echo @_PUBLISHED; ?>
';var notpublished = '<?php echo @_NOTPUBLISHED; ?>
';</script>
	    <?php if ($this->_tpl_vars['_change_']): ?>
	        <div class = "headerTools">
	        	<span>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	        		<img src = "images/16x16/add.png" title = "<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?><?php echo @_ADDSKILLGAPTEST; ?>
<?php else: ?><?php echo @_ADDTEST; ?>
<?php endif; ?>" alt = "<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?><?php echo @_ADDSKILLGAPTEST; ?>
<?php else: ?><?php echo @_ADDTEST; ?>
<?php endif; ?>"/>
	        		<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&add_test=1<?php if ($_GET['from_unit']): ?>&from_unit=<?php echo $_GET['from_unit']; ?>
<?php endif; ?>"><?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?><?php echo @_ADDSKILLGAPTEST; ?>
<?php else: ?><?php echo @_ADDTEST; ?>
<?php endif; ?></a>
	        	<?php else: ?>
								<img src = "images/16x16/add.png" title = "<?php echo @_ADDFEEDBACSFEEDBACK; ?>
" alt = "<?php echo @_ADDFEEDBACSFEEDBACK; ?>
"/>
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=feedback&add_test=1<?php if ($_GET['from_unit']): ?>&from_unit=<?php echo $_GET['from_unit']; ?>
<?php endif; ?>"><?php echo @_ADDFEEDBACSFEEDBACK; ?>
</a>
							<?php endif; ?>
				</span>
	    	<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
	        	<span>
	            	<img src = "images/16x16/wizard.png" alt = "<?php echo @_ADDQUICKSKILLGAP; ?>
" title = "<?php echo @_ADDQUICKSKILLGAP; ?>
" />
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&add_test=1&create_quick_test=1"><?php echo @_ADDQUICKSKILLGAP; ?>
</a>
	            </span>
	    	<?php endif; ?>
	        </div>
	    <?php endif; ?>

	    <table width = "100%" class = "sortedTable">
	        <tr class = "defaultRowHeight">
	            <td class = "topTitle"><?php echo @_NAME; ?>
</td>
	        <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	            <td class = "topTitle"><?php echo @_UNITPARENT; ?>
</td>
			<?php elseif ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
				<td class = "topTitle centerAlign"><?php echo @_GENERALTHRESHOLD; ?>
</td>
			<?php endif; ?>
				<td class = "topTitle centerAlign"><?php echo @_PUBLISHED; ?>
</td>
	            <td class = "topTitle centerAlign"><?php echo @_QUESTIONS; ?>
</td>
	            <?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "topTitle centerAlign"><?php echo @_AVERAGESCORE; ?>
</td>
	            <?php endif; ?>
				<td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
	        </tr>
			<?php $_from = $this->_tpl_vars['T_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tests_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tests_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['test']):
        $this->_foreach['tests_list']['iteration']++;
?>
	        <tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
	        <?php if ($this->_tpl_vars['_change_']): ?>
	            <td><a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&edit_test=<?php echo $this->_tpl_vars['test']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['test']['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</a></td>
	        <?php else: ?>
	        	 <td><?php echo ((is_array($_tmp=$this->_tpl_vars['test']['name'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 40) : smarty_modifier_eF_truncate($_tmp, 40)); ?>
</td>
	        <?php endif; ?>
			<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	            <td><?php echo $this->_tpl_vars['test']['parent_unit']; ?>
</td>
	        <?php elseif ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	            <td class = "centerAlign"><?php echo $this->_tpl_vars['test']['options']['general_threshold']; ?>
%</td>
	        <?php endif; ?>
	            <td class = "centerAlign"><?php if ($this->_tpl_vars['test']['publish']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_PUBLISHED; ?>
" title = "<?php echo @_PUBLISHED; ?>
" onclick = "publish(this, <?php echo $this->_tpl_vars['test']['id']; ?>
)" class = "ajaxHandle"><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NOTPUBLISHED; ?>
" title = "<?php echo @_NOTPUBLISHED; ?>
" onclick = "publish(this, <?php echo $this->_tpl_vars['test']['id']; ?>
)" class = "ajaxHandle"><?php endif; ?></td>
	            <td class = "centerAlign"><?php echo $this->_tpl_vars['test']['questions_num']; ?>
</td>
	            <?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign"><?php if (isset ( $this->_tpl_vars['test']['average_score'] ) || $this->_tpl_vars['test']['average_score'] === 0): ?>#filter:score-<?php echo $this->_tpl_vars['test']['average_score']; ?>
#&nbsp;%<?php else: ?>-<?php endif; ?></td>
	            <?php endif; ?>
				<td class = "noWrap centerAlign">
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&test_results=<?php echo $this->_tpl_vars['test']['id']; ?>
"><img src = "images/16x16/unit.png" alt = "<?php echo @_RESULTS; ?>
" title = "<?php echo @_RESULTS; ?>
" /></a>
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>view_unit=<?php echo $this->_tpl_vars['test']['content_ID']; ?>
<?php else: ?>ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&show_test=<?php echo $this->_tpl_vars['test']['id']; ?>
<?php endif; ?>"><img src = "images/16x16/search.png" alt = "<?php echo @_PREVIEW; ?>
" title = "<?php echo @_PREVIEW; ?>
"/></a>
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&show_test=<?php echo $this->_tpl_vars['test']['id']; ?>
&print=1&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_PRINT; ?>
', 2)"><img src = "images/16x16/printer.png" alt = "<?php echo @_PRINT; ?>
" title = "<?php echo @_PRINT; ?>
" /></a>
	  
	  <?php if (@G_VERSIONTYPE != 'community'): ?>       
			<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['statistics'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['statistics'] != 'hidden'): ?>
	                <?php if ($this->_tpl_vars['T_CTG'] == 'feedback'): ?> 
	       	        	<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=feedback&sel_test=<?php echo $this->_tpl_vars['test']['id']; ?>
"><img src = "images/16x16/reports.png" alt = "<?php echo @_REPORTS; ?>
" title = "<?php echo @_REPORTS; ?>
" /></a>
	       			<?php else: ?>
	               		<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=test&sel_test=<?php echo $this->_tpl_vars['test']['id']; ?>
"><img src = "images/16x16/reports.png" alt = "<?php echo @_REPORTS; ?>
" title = "<?php echo @_REPORTS; ?>
" /></a>
	        		<?php endif; ?>
			<?php endif; ?>
	  <?php endif; ?>		        <?php if ($this->_tpl_vars['_change_']): ?>
	                <?php if (! $this->_tpl_vars['test']['options']['shuffle_questions'] && ! $this->_tpl_vars['test']['options']['random_pool']): ?>
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&questions_order=<?php echo $this->_tpl_vars['test']['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_CHANGEORDER; ?>
', 2)"><img src = "images/16x16/order.png" alt = "<?php echo @_CHANGEORDER; ?>
" title = "<?php echo @_CHANGEORDER; ?>
"/></a>
	                <?php endif; ?>
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&edit_test=<?php echo $this->_tpl_vars['test']['id']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDIT; ?>
" title = "<?php echo @_EDIT; ?>
" /></a>
	                <img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteTest(this, '<?php echo $this->_tpl_vars['test']['id']; ?>
');"/>
	        <?php endif; ?>
	            </td></tr>
	        <?php endforeach; else: ?>
	        <tr class = "defaultRowHeight oddRowColor"><td colspan = "7" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
	        <?php endif; unset($_from); ?>
	    </table>
	<?php $this->_smarty_vars['capture']['t_tests_code'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>
		<?php if ($this->_tpl_vars['_change_'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
		<div class = "headerTools">
			<span>
				<img src = "images/16x16/add.png" title = "<?php echo @_ADDQUESTION; ?>
" alt = "<?php echo @_ADDQUESTION; ?>
"/>
				<select name = "question_type" onchange = "if (this.options[this.options.selectedIndex].value) window.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&add_question=1&question_type='+this.options[this.options.selectedIndex].value">
					<option value = ""><?php echo @_ADDQUESTIONOFTYPE; ?>
</option>
					<option value = "">---------------</option>
					<?php $_from = $this->_tpl_vars['T_QUESTIONTYPESTRANSLATIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_types'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_types']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['question_types']['iteration']++;
?>
						<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] || $this->_tpl_vars['key'] != 'raw_text'): ?>
						<option value = "<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</span>
			<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && ((is_array($_tmp='questions_pool')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
				<span style = "float:right;border-width:0px">
				<?php if (! $_GET['showall']): ?>
     				<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&showall=1&tab=questions" ><img src = "images/16x16/order.png" alt = "<?php echo @_SHOWQUESTIONSPOOL; ?>
" title = "<?php echo @_SHOWQUESTIONSPOOL; ?>
"/>&nbsp;<?php echo @_SHOWQUESTIONSPOOL; ?>
</a>
	     		<?php else: ?>
	     			<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&showall=0&tab=questions" ><img src = "images/16x16/order.png" alt = "<?php echo @_SHOWLESSONQUESTIONS; ?>
" title = "<?php echo @_SHOWLESSONQUESTIONS; ?>
"/>&nbsp;<?php echo @_SHOWLESSONQUESTIONS; ?>
</a>
	       		<?php endif; ?>
	     		</span>
	     	<?php endif; ?>
		</div>
		<?php endif; ?>
	 
<?php if ($_GET['showall'] && ((is_array($_tmp='questions_pool')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>     
<!--ajax:questionsTable-->
		<table class = "QuestionsListTable sortedTable" id = "questionsTable" size = "<?php echo $this->_tpl_vars['T_QUESTIONS_SIZE']; ?>
" sortBy = "0" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&from_unit=<?php echo $_GET['from_unit']; ?>
&tab=<?php echo $_GET['tab']; ?>
&showall=<?php echo $_GET['showall']; ?>
&">
	        <tr class = "defaultRowHeight">
	            <td name = "text" class = "topTitle"><?php echo @_QUESTION; ?>
</td>
	        <?php if ($_GET['showall']): ?>
	        	<td name = "lesson_name" class = "topTitle"><?php echo @_LESSON; ?>
</td>
	        <?php endif; ?>
	            <td name = "type" class = "topTitle centerAlign"><?php echo @_QUESTIONTYPE; ?>
</td>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	            <td name = "difficulty" class = "topTitle centerAlign"><?php echo @_DIFFICULTY; ?>
</td>
	            <td class = "topTitle centerAlign" name = "estimate"><?php echo @_TIME; ?>
</td>
			<?php endif; ?>
	            <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
	        </tr>
			<?php $_from = $this->_tpl_vars['T_QUESTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['question']):
        $this->_foreach['questions_list']['iteration']++;
?>
			<?php if ($this->_tpl_vars['T_CTG'] == 'tests' || ( $this->_tpl_vars['T_CTG'] == 'feedback' && $this->_tpl_vars['question']['type'] != 'true_false' )): ?>
				<tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
					<td>
				<?php if ($this->_tpl_vars['_change_'] && $this->_tpl_vars['question']['lessons_ID'] == $_SESSION['s_lessons_ID']): ?>
						<a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['question']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['question']['lessons_ID']; ?>
" title= "<?php echo $this->_tpl_vars['question']['text']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['question']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 70) : smarty_modifier_eF_truncate($_tmp, 70)); ?>
</a>
				<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['question']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 70) : smarty_modifier_eF_truncate($_tmp, 70)); ?>
<?php endif; ?>
					</td>
				<?php if ($_GET['showall']): ?>
	        		<td><span title = "<?php echo $this->_tpl_vars['T_LESSONS'][$this->_tpl_vars['question']['lessons_ID']]['lesson_path']; ?>
"><?php echo $this->_tpl_vars['question']['lesson_name']; ?>
</span></td>
	        	<?php endif; ?>	
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_TYPE_ICONS'][$this->_tpl_vars['question']['type']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['question']['type']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['question']['type']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['question']['type']; ?>
</span>
					</td>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTY_ICONS'][$this->_tpl_vars['question']['difficulty']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['question']['difficulty']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['question']['difficulty']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['question']['difficulty']; ?>
</span>
					</td>
					<td class = "centerAlign"><?php if (! $this->_tpl_vars['question']['estimate']): ?>-<?php else: ?><?php if ($this->_tpl_vars['question']['estimate_interval']['minutes']): ?><?php echo $this->_tpl_vars['question']['estimate_interval']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['question']['estimate_interval']['seconds']): ?><?php echo $this->_tpl_vars['question']['estimate_interval']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?><?php endif; ?></td>
				<?php endif; ?>
				   <td class = "centerAlign noWrap">
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_PREVIEW; ?>
', 1)"><img src = "images/16x16/search.png" alt = "<?php echo @_PREVIEW; ?>
" title = "<?php echo @_PREVIEW; ?>
" /></a>
					<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
						<?php if ($this->_tpl_vars['T_CTG'] != 'feedback' && $this->_tpl_vars['question']['lessons_ID'] == $_SESSION['s_lessons_ID']): ?>
							<a class = "editLink"   href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['question']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['question']['lessons_ID']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_CORRECTION; ?>
" title = "<?php echo @_CORRECTION; ?>
"/></a>
							<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteQuestion(this, '<?php echo $this->_tpl_vars['question']['id']; ?>
')"/>
						<?php endif; ?>
					<?php endif; ?>
					</td>
				</tr>
			<?php endif; ?>
			<?php endforeach; else: ?>
	        <tr class = "oddRowColor defaultRowHeight"><td class = "emptyCategory" colspan = "6"><?php echo @_NOQUESTIONSSETFORTHISUNIT; ?>
</td></tr>
	        <?php endif; unset($_from); ?>
	    </table>
<!--/ajax:questionsTable-->
<?php else: ?>
<!--ajax:questionsTable-->
		<table class = "QuestionsListTable sortedTable" id = "questionsTable" size = "<?php echo $this->_tpl_vars['T_QUESTIONS_SIZE']; ?>
" sortBy = "0" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&from_unit=<?php echo $_GET['from_unit']; ?>
&tab=<?php echo $_GET['tab']; ?>
&showall=<?php echo $_GET['showall']; ?>
&">
	        <tr class = "defaultRowHeight">
	            <td name = "text" class = "topTitle"><?php echo @_QUESTION; ?>
</td>
	        <?php if ($_GET['showall']): ?>
	        	<td name = "lesson" class = "topTitle"><?php echo @_LESSON; ?>
</td>
	        <?php endif; ?>
	        <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
	            <td name = "parent_unit" class = "topTitle"><?php echo @_UNIT; ?>
</td>
	        <?php else: ?>
	            <td name = "name" class = "topTitle"><?php echo @_ASSOCIATEDWITH; ?>
</td>
	        <?php endif; ?>
	            <td name = "type" class = "topTitle centerAlign"><?php echo @_QUESTIONTYPE; ?>
</td>
			<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
	            <td name = "difficulty" class = "topTitle centerAlign"><?php echo @_DIFFICULTY; ?>
</td>
	            <td class = "topTitle centerAlign" name = "estimate"><?php echo @_TIME; ?>
</td>
			<?php endif; ?>
	            <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
	        </tr>
			<?php $_from = $this->_tpl_vars['T_QUESTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['question']):
        $this->_foreach['questions_list']['iteration']++;
?>
			<?php if ($this->_tpl_vars['T_CTG'] == 'tests' || ( $this->_tpl_vars['T_CTG'] == 'feedback' && $this->_tpl_vars['question']['type'] != 'true_false' )): ?>
				<tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
					<td>
				<?php if ($this->_tpl_vars['_change_']): ?>
						<a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['question']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['question']['lessons_ID']; ?>
" title= "<?php echo $this->_tpl_vars['question']['text']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['question']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 70) : smarty_modifier_eF_truncate($_tmp, 70)); ?>
</a>
				<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['question']['text'])) ? $this->_run_mod_handler('eF_truncate', true, $_tmp, 70) : smarty_modifier_eF_truncate($_tmp, 70)); ?>
<?php endif; ?>
					</td>
				<?php if ($_GET['showall']): ?>
	        		<td><span title = "<?php echo $this->_tpl_vars['T_LESSONS'][$this->_tpl_vars['question']['lessons_ID']]['lesson_path']; ?>
"><?php echo $this->_tpl_vars['T_LESSONS'][$this->_tpl_vars['question']['lessons_ID']]['name']; ?>
</span></td>
	        	<?php endif; ?>	
					
				<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
					<td><?php echo $this->_tpl_vars['question']['parent_unit']; ?>
</td>
				<?php else: ?>
					<td><?php echo $this->_tpl_vars['question']['name']; ?>
</td>
				<?php endif; ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_TYPE_ICONS'][$this->_tpl_vars['question']['type']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['question']['type']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_TYPES'][$this->_tpl_vars['question']['type']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['question']['type']; ?>
</span>
					</td>
				<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
					<td class = "centerAlign">
						<img src = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTY_ICONS'][$this->_tpl_vars['question']['difficulty']]; ?>
" title = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['question']['difficulty']]; ?>
" alt = "<?php echo $this->_tpl_vars['T_QUESTION_DIFFICULTIES'][$this->_tpl_vars['question']['difficulty']]; ?>
" />
						<span style = "display:none"><?php echo $this->_tpl_vars['question']['difficulty']; ?>
</span>
					</td>
					<td class = "centerAlign"><?php if (! $this->_tpl_vars['question']['estimate']): ?>-<?php else: ?><?php if ($this->_tpl_vars['question']['estimate_interval']['minutes']): ?><?php echo $this->_tpl_vars['question']['estimate_interval']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['question']['estimate_interval']['seconds']): ?><?php echo $this->_tpl_vars['question']['estimate_interval']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?><?php endif; ?></td>
				<?php endif; ?>
				   <td class = "centerAlign noWrap">
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_PREVIEW; ?>
', 1)"><img src = "images/16x16/search.png" alt = "<?php echo @_PREVIEW; ?>
" title = "<?php echo @_PREVIEW; ?>
" /></a>
					<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
						<?php if ($this->_tpl_vars['T_SKILLGAP_TEST'] && ( ! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['skillgaptests'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['skillgaptests'] == 'change' )): ?>
						<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&lessonId=<?php echo $this->_tpl_vars['question']['lessons_ID']; ?>
&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, '<?php echo @_CORRELATESKILLSTOQUESTION; ?>
', 2)"><img src = "images/16x16/tools.png" alt = "<?php echo @_CORRELATESKILLSTOQUESTION; ?>
" title = "<?php echo @_CORRELATESKILLSTOQUESTION; ?>
" /></a>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
							<a class = "editLink"   href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&edit_question=<?php echo $this->_tpl_vars['question']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['question']['type']; ?>
&lessonId=<?php echo $this->_tpl_vars['question']['lessons_ID']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_CORRECTION; ?>
" title = "<?php echo @_CORRECTION; ?>
"/></a>
							<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteQuestion(this, '<?php echo $this->_tpl_vars['question']['id']; ?>
')"/>
						<?php endif; ?>
					<?php endif; ?>
					</td>
				</tr>
			<?php endif; ?>
			<?php endforeach; else: ?>
	        <tr class = "oddRowColor defaultRowHeight"><td class = "emptyCategory" colspan = "6"><?php echo @_NOQUESTIONSSETFORTHISUNIT; ?>
</td></tr>
	        <?php endif; unset($_from); ?>
	    </table>
<!--/ajax:questionsTable-->
<?php endif; ?>
	<?php $this->_smarty_vars['capture']['t_questions_code'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>
	    <?php if (! $this->_tpl_vars['T_SKILLGAP_TEST'] && $this->_tpl_vars['T_CTG'] != 'feedback'): ?>
		<div class = "headerTools">
			<span><?php echo @_SHOWDATAFORUNIT; ?>
:&nbsp;</span>
			<select name = "select_unit" onchange = "var tab = 'tests';$$('div.tabbertab').each(function (s) {if (!s.hasClassName('tabbertabhide')) {tab = s.id;}});document.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&from_unit='+this.options[this.selectedIndex].value+'&tab='+tab">
	        	<option value = "-1" <?php if ($_GET['from_unit'] == -1): ?>selected<?php endif; ?>><?php echo @_ALLUNITS; ?>
</option>
	            <option value = "-2">-----------</option>
			<?php $_from = $this->_tpl_vars['T_UNITS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['unit_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['unit_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['unit']):
        $this->_foreach['unit_options']['iteration']++;
?>
			    <option value = "<?php echo $this->_tpl_vars['id']; ?>
" <?php if ($this->_tpl_vars['id'] == $_GET['from_unit']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['unit']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
	    <?php endif; ?>

	<?php ob_start(); ?>
				<?php echo $this->_smarty_vars['capture']['t_tests_code']; ?>

		        <br>
		        		        <?php ob_start(); ?>
<!--ajax:pendingTable-->
				<table style = "width:100%" class = "sortedTable" id = "pendingTable" size = "<?php echo $this->_tpl_vars['T_PENDING_SIZE']; ?>
" sortBy = "0" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&">
			        <tr class = "defaultRowHeight">
			            <td class = "topTitle" name = "time_end"><?php echo @_COMPLETEDON; ?>
</td>
			            <td class = "topTitle" name = "name"><?php echo @_NAME; ?>
</td>
			            <td class = "topTitle" name = "users_LOGIN"><?php echo @_STUDENT; ?>
</td>
					<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
			            <td class = "topTitle" name = "pending"><?php echo @_PENDING; ?>
</td>
			            <td class = "topTitle centerAlign" name = "score" ><?php echo @_SCORE; ?>
</td>
					<?php endif; ?>
			            <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>
			        </tr>
		<?php $_from = $this->_tpl_vars['T_PENDING_TESTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pending_tests_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pending_tests_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['pending_tests_loop']['iteration']++;
?>
		            <tr class = "<?php echo smarty_function_cycle(array('name' => 'main_cycle','values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
		                <td>#filter:timestamp_time-<?php if (isset ( $this->_tpl_vars['item']['time_end'] )): ?><?php echo $this->_tpl_vars['item']['time_end']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['timestamp']; ?>
<?php endif; ?>#</td>
		            <?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>  	
		              	<td><a class="editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
		            <?php else: ?>
		             	<td><a class="editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=feedback&show_solved_test=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>		          	
		            <?php endif; ?>  	
		              	<td>#filter:login-<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
#</td>
					<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
		              	<td><?php if ($this->_tpl_vars['item']['pending']): ?><?php echo @_YES; ?>
<?php else: ?><?php echo @_NO; ?>
<?php endif; ?></td>
		              	<td class = "centerAlign"><?php if ($this->_tpl_vars['item']['score']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['score'])) ? $this->_run_mod_handler('formatScore', true, $_tmp) : formatScore($_tmp)); ?>
%<?php else: ?>0.00%<?php endif; ?></td>
					<?php endif; ?>
		                <td class = "centerAlign">
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php echo $this->_tpl_vars['T_CTG']; ?>
&show_solved_test=<?php echo $this->_tpl_vars['item']['id']; ?>
">
		              			<img src = "images/16x16/search.png" alt = "<?php echo @_VIEWTEST; ?>
" title = "<?php echo @_VIEWTEST; ?>
"/></a>
		           	<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
							<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=tests&show_solved_test=<?php echo $this->_tpl_vars['item']['id']; ?>
&test_analysis=1&user=<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
">
		              			<img src = "images/16x16/analysis.png" alt = "<?php echo @_TESTANALYSIS; ?>
" title = "<?php echo @_TESTANALYSIS; ?>
"/></a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['_change_']): ?>
						<img class = "ajaxHandle" src="images/16x16/error_delete.png" alt="<?php echo @_RESETTESTSTATUS; ?>
" title="<?php echo @_RESETTESTSTATUS; ?>
" onclick = "ajaxRemoveSolvedTest(this, '<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
', '<?php echo $this->_tpl_vars['item']['id']; ?>
','<?php echo $this->_tpl_vars['item']['tests_ID']; ?>
')"> </a>
		            <?php endif; ?>	
		            	</td>
					</tr>
		<?php endforeach; else: ?>
		        	<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "6"><?php echo @_NODATAFOUND; ?>
</td></tr>
		<?php endif; unset($_from); ?>
				</table>
<!--/ajax:pendingTable-->
				<?php $this->_smarty_vars['capture']['t_pending_tests'] = ob_get_contents(); ob_end_clean(); ?>
				<?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
		           	<?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTLYCOMPLETEDSKILLGAP,'data' => $this->_smarty_vars['capture']['t_pending_tests'],'image' => '32x32/skill_gap.png','options' => $this->_tpl_vars['T_RECENTLY_SKILLGAP_OPTIONS']), $this);?>

		        <?php elseif ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
		           	<?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTLYCOMPLETEDTESTS,'data' => $this->_smarty_vars['capture']['t_pending_tests'],'image' => '32x32/tests.png'), $this);?>

		        <?php else: ?>
					<?php echo smarty_function_eF_template_printBlock(array('title' => @_RECENTLYCOMPLETEDFEEDBACK,'data' => $this->_smarty_vars['capture']['t_pending_tests'],'image' => '32x32/feedback.png'), $this);?>

				<?php endif; ?>

		<?php $this->_smarty_vars['capture']['t_all_tests_code'] = ob_get_contents(); ob_end_clean(); ?>
		<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
			<?php $this->assign('tempTitle', @_TESTS); ?>
			<?php $this->assign('tempImage', 'tests'); ?>
		<?php else: ?>
			<?php $this->assign('tempTitle', @_FEEDBACK); ?>
			<?php $this->assign('tempImage', 'feedback'); ?>
		<?php endif; ?>
		<div class = "tabber">
		    <div class = "tabbertab" title = "<?php echo $this->_tpl_vars['tempTitle']; ?>
" id = "tests">
				<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['tempTitle'],'data' => $this->_smarty_vars['capture']['t_all_tests_code'],'image' => "32x32/".($this->_tpl_vars['tempImage']).".png"), $this);?>

			</div>
		   	<div title = "<?php echo @_QUESTIONS; ?>
" class = "tabbertab <?php if ($_GET['tab'] == 'question' || $_GET['tab'] == 'questions'): ?> tabbertabdefault<?php endif; ?>"  id = "question" title = "<?php echo @_QUESTIONS; ?>
">
				<?php echo smarty_function_eF_template_printBlock(array('title' => @_QUESTIONS,'data' => $this->_smarty_vars['capture']['t_questions_code'],'image' => '32x32/question_and_answer.png'), $this);?>

		    </div>
		</div>
	<?php $this->_smarty_vars['capture']['t_tests_and_questions_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php if (! $this->_tpl_vars['T_SKILLGAP_TEST']): ?>
		<?php if ($this->_tpl_vars['T_CTG'] != 'feedback'): ?>
			<?php echo smarty_function_eF_template_printBlock(array('title' => @_UNITANDSUBUNITSTESTS,'data' => $this->_smarty_vars['capture']['t_tests_and_questions_code'],'image' => '32x32/tests.png','help' => 'Tests'), $this);?>

		<?php else: ?>
			<?php echo smarty_function_eF_template_printBlock(array('title' => @_FEEDBACK,'data' => $this->_smarty_vars['capture']['t_tests_and_questions_code'],'image' => '32x32/feedback.png','help' => 'Feedback'), $this);?>

		<?php endif; ?>
	<?php else: ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_SKILLGAPTESTS,'data' => $this->_smarty_vars['capture']['t_tests_and_questions_code'],'image' => '32x32/skill_gap.png','help' => 'Skill_gap_tests'), $this);?>

	<?php endif; ?>
<?php endif; ?>