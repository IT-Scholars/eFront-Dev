<?php /* Smarty version 2.6.27, created on 2014-09-29 18:44:35
         compiled from includes/statistics/courses_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/statistics/courses_stats.tpl', 31, false),array('function', 'eF_template_printBlock', 'includes/statistics/courses_stats.tpl', 76, false),)), $this); ?>
    <?php ob_start(); ?>
            <table class = "statisticsTools statisticsSelectList">
                <tr><td class = "labelCell"><?php echo @_CHOOSECOURSE; ?>
:</td>
                    <td class = "elementCell" colspan = "4">
                        <input type = "text" id = "autocomplete" class = "autoCompleteTextBox"/>
                        <img id = "busy" src = "images/16x16/clock.png" style="display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                        <div id = "autocomplete_courses" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr><td></td>
                	<td class = "infoCell" colspan = "4"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td></tr>
    <?php if (! isset ( $this->_tpl_vars['T_CURRENT_COURSE'] )): ?>
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
.php?ctg=statistics&option=course&sel_course=<?php echo $_GET['sel_course']; ?>
&excel=1&group_filter=<?php echo $_GET['group_filter']; ?>
&branch_filter=<?php echo $_GET['branch_filter']; ?>
&job_filter=<?php echo $_GET['job_filter']; ?>
&subbranches=<?php echo $_GET['subbranches']; ?>
&user_filter=<?php echo $_GET['user_filter']; ?>
">
                            <img src = "images/file_types/xls.png" title = "<?php echo @_XLSFORMAT; ?>
" alt = "<?php echo @_XLSFORMAT; ?>
" />
                        </a>
                        <a href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=course&sel_course=<?php echo $_GET['sel_course']; ?>
&pdf=1&group_filter=<?php echo $_GET['group_filter']; ?>
&branch_filter=<?php echo $_GET['branch_filter']; ?>
&job_filter=<?php echo $_GET['job_filter']; ?>
&subbranches=<?php echo $_GET['subbranches']; ?>
&user_filter=<?php echo $_GET['user_filter']; ?>
">
                            <img src = "images/file_types/pdf.png" title = "<?php echo @_PDFFORMAT; ?>
" alt = "<?php echo @_PDFFORMAT; ?>
" />
                        </a>
                    </td></tr>
        	</table>

    		<br/>
            <table class = "statisticsGeneralInfo">
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_NAME; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['name']; ?>
</td></tr>
                </tr>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_CATEGORY; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['category_path']; ?>
</td></tr>
                </tr>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_LESSONS; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['num_lessons']; ?>
</td></tr>
                </tr>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_USERS; ?>
:</td>
                    <td class = "elementCell"><?php if ($this->_tpl_vars['T_CURRENT_COURSE']->course['num_users']): ?><?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['num_users']; ?>
 (<?php $_from = $this->_tpl_vars['T_CURRENT_COURSE']->course['users_per_role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user_types_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user_types_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['user_types_list']['iteration']++;
?><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['key']]; ?>
: <?php echo $this->_tpl_vars['item']; ?>
<?php if (! ($this->_foreach['user_types_list']['iteration'] == $this->_foreach['user_types_list']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?>)<?php else: ?>0<?php endif; ?></td>
                </tr>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_PRICE; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_COURSE']->course['price_string']; ?>
</td></tr>
                </tr>
                <?php if ($this->_tpl_vars['T_CURRENT_COURSE']->options['training_hours']): ?>
                <tr class = "<?php echo smarty_function_cycle(array('name' => 'course_common_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                    <td class = "labelCell"><?php echo @_TRAININGHOURS; ?>
:</td>
                    <td class = "elementCell"><?php echo $this->_tpl_vars['T_CURRENT_COURSE']->options['training_hours']; ?>
</td></tr>
                </tr>
                <?php endif; ?>
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

			<?php $this->assign('courseUsers_url', ($_SERVER['PHP_SELF'])."?ctg=statistics&option=course&sel_course=".($_GET['sel_course']).($this->_tpl_vars['T_STATS_FILTERS_URL'])."&"); ?>
			<?php $this->assign('courses_url', ($_SERVER['PHP_SELF'])."?ctg=statistics&option=course&sel_course=".($_GET['sel_course']).($this->_tpl_vars['T_STATS_FILTERS_URL'])."&"); ?>
			<?php $this->assign('_change_handles_', false); ?>
			<?php ob_start(); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common/course_users_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $this->_smarty_vars['capture']['t_course_users_list_code'] = ob_get_contents(); ob_end_clean(); ?>
			<?php ob_start(); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/common/courses_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $this->_smarty_vars['capture']['t_courses_list_code'] = ob_get_contents(); ob_end_clean(); ?>

	        <div class = "tabber">
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'users','title' => @_USERS,'data' => $this->_smarty_vars['capture']['t_course_users_list_code'],'image' => '32x32/users.png'), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'instances','title' => @_COURSEINSTANCES,'data' => $this->_smarty_vars['capture']['t_courses_list_code'],'image' => '32x32/courses.png'), $this);?>

			</div>


    <?php endif; ?>

    <?php $this->_smarty_vars['capture']['course_statistics'] = ob_get_contents(); ob_end_clean(); ?>

    <?php if ($this->_tpl_vars['T_CURRENT_COURSE']): ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => (@_REPORTSFORCOURSE)." <span class='innerTableName'>&quot;".($this->_tpl_vars['T_CURRENT_COURSE']->course['name'])."&quot;</span>",'data' => $this->_smarty_vars['capture']['course_statistics'],'image' => '32x32/courses.png','help' => 'Reports'), $this);?>

    <?php else: ?>
    	<?php echo smarty_function_eF_template_printBlock(array('title' => @_COURSESTATISTICS,'data' => $this->_smarty_vars['capture']['course_statistics'],'image' => '32x32/courses.png','help' => 'Reports'), $this);?>

	<?php endif; ?>