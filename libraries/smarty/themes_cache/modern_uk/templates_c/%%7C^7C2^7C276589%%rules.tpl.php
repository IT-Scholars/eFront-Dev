<?php /* Smarty version 2.6.27, created on 2014-10-01 19:31:00
         compiled from includes/rules.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/rules.tpl', 56, false),array('function', 'cycle', 'includes/rules.tpl', 117, false),)), $this); ?>
<?php ob_start(); ?>
    <tr><td class = "moduleCell">
    <?php if ($_GET['add_rule'] || $_GET['edit_rule']): ?>
        <?php ob_start(); ?>
            <?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['javascript']; ?>

            <form <?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['attributes']; ?>
>
                <?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['hidden']; ?>

                <fieldset class = "fieldsetSeparator">
                <legend><?php echo @_ADDCUSTOMRULE; ?>
</legend>
                <table class = "formElements" style = "margin-left:0px">
                    <tr><td class = "labelCell"><?php echo @_VALIDFOR; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['scope']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_RULE_FORM']['scope']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['scope']['error']; ?>
</td></tr><?php endif; ?>
                    <tr><td class = "labelCell"><?php echo @_TOBEEXCLUDEDFROMUNIT; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['exclusion_unit']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_RULE_FORM']['exclusion_unit']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['exclusion_unit']['error']; ?>
</td></tr><?php endif; ?>
                    <tr><td class = "labelCell"><?php echo @_BASEDONTERM; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['rule_type']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_RULE_FORM']['rule_type']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['rule_type']['error']; ?>
</td></tr><?php endif; ?>
                    <tr id = "rule_unit" style = "<?php if ($this->_tpl_vars['T_CURRENT_RULE'] != 'hasnot_seen' && $_POST['rule_type'] != 'hasnot_seen'): ?>display:none<?php endif; ?>"><td class = "labelCell"><?php echo @_WITHNAME; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['rule_unit']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_RULE_FORM']['rule_unit']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['rule_unit']['error']; ?>
</td></tr><?php endif; ?>
                    <tr id = "test_unit" style = "<?php if ($this->_tpl_vars['T_CURRENT_RULE'] != 'hasnot_passed' && $_POST['rule_type'] != 'hasnot_passed'): ?>display:none<?php endif; ?>"><td class = "labelCell"><?php echo @_WITHNAME; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['test_unit']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_RULE_FORM']['test_unit']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['test_unit']['error']; ?>
</td></tr><?php endif; ?>
                    <tr id = "test_score" style = "<?php if ($this->_tpl_vars['T_CURRENT_RULE'] != 'hasnot_passed' && $_POST['rule_type'] != 'hasnot_passed'): ?>display:none<?php endif; ?>"><td class = "labelCell"><?php echo @_ANDSCOREGREATEROREQUAL; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['score']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_ADD_RULE_FORM']['score']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['score']['error']; ?>
</td></tr><?php endif; ?>
                    <tr><td colspan = "100%">&nbsp;</td></tr>
                    <tr><td></td><td><?php echo $this->_tpl_vars['T_ADD_RULE_FORM']['submit_rule']['html']; ?>
</td></tr>
                </table>
                </fieldset>
            </form>
	        <?php if (! $_GET['edit_rule']): ?>
	            <?php echo $this->_tpl_vars['T_ADD_READY_RULE_FORM']['javascript']; ?>

	            <form <?php echo $this->_tpl_vars['T_ADD_READY_RULE_FORM']['attributes']; ?>
>
	                <?php echo $this->_tpl_vars['T_ADD_READY_RULE_FORM']['hidden']; ?>

	                <fieldset class = "fieldsetSeparator">
	                <legend><?php echo @_ADDREADYRULE; ?>
</legend>
	                <table>
	                    <tr><td class = "labelCell"><?php echo @_SERIALRULE; ?>
:&nbsp;</td>
	                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_READY_RULE_FORM']['ready_rule']['serial']['html']; ?>
</td></tr>
		                    <tr><td colspan = "100%">&nbsp;</td></tr>
	                    <tr><td class = "labelCell"></td>
	                        <td class = "elementCell"><?php echo $this->_tpl_vars['T_ADD_READY_RULE_FORM']['submit_ready_rule']['html']; ?>
</td></tr>
	                </table>
	                </fieldset>
	            </form>
	        <?php endif; ?>
        <?php $this->_smarty_vars['capture']['t_add_rule_code'] = ob_get_contents(); ob_end_clean(); ?>

        <?php echo smarty_function_eF_template_printBlock(array('title' => @_RULEPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_rule_code'],'image' => '32x32/rules.png','help' => 'Lesson_rules'), $this);?>

    <?php elseif ($_GET['add_condition'] || $_GET['edit_condition']): ?>

        <?php ob_start(); ?>
            <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['javascript']; ?>

            <form <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['attributes']; ?>
>
                <?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['hidden']; ?>

                <table class = "formElements" style = "margin-left:0px">
                    <tr><td class = "labelCell"><?php echo @_THEUSERMUSTHAVE; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['condition_types']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['condition_types']['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['condition_types']['error']; ?>
</td></tr><?php endif; ?>

                    <tr id = "percentage_units" <?php if ($this->_tpl_vars['T_CURRENT_CONDITION']['type'] != 'percentage_units' && $_POST['condition_types'] != 'percentage_units'): ?>style = "display:none"<?php endif; ?>><td class = "labelCell"><?php echo @_UNITSPERCENTAGE; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['percentage_units']['html']; ?>
%</td></tr>
                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['percentage_units']['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['percentage_units']['error']; ?>
</td></tr><?php endif; ?>

                    <tr id = "specific_unit" <?php if ($this->_tpl_vars['T_CURRENT_CONDITION']['type'] != 'specific_unit' && $_POST['condition_types'] != 'specific_unit'): ?>style = "display:none"<?php endif; ?>><td class = "labelCell"><?php echo @_WITHNAME; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['specific_unit']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['specific_unit']['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['specific_unit']['error']; ?>
</td></tr><?php endif; ?>

                    <tr id = "specific_test" <?php if ($this->_tpl_vars['T_CURRENT_CONDITION']['type'] != 'specific_test' && $_POST['condition_types'] != 'specific_test'): ?>style = "display:none"<?php endif; ?>><td class = "labelCell"><?php echo @_WITHNAME; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['specific_test']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['specific_test']['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['specific_test']['error']; ?>
</td></tr><?php endif; ?>

                    <tr id = "time_in_lesson" <?php if ($this->_tpl_vars['T_CURRENT_CONDITION']['type'] != 'time_in_lesson' && $_POST['condition_types'] != 'time_in_lesson'): ?>style = "display:none"<?php endif; ?>><td class = "labelCell"><?php echo @_MINUTES; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['time_in_lesson']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['time_in_lesson']['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['time_in_lesson']['error']; ?>
</td></tr><?php endif; ?>

                    <tr><td class = "labelCell"><?php echo @_RELATIONTOOTHERS; ?>
:&nbsp;</td>
                        <td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['relation']['html']; ?>
</td></tr>
                    <?php if ($this->_tpl_vars['T_COMPLETE_LESSON_FORM']['relation']['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['relation']['error']; ?>
</td></tr><?php endif; ?>

                    <tr><td colspan = "100%">&nbsp;</td></tr>
                    <tr><td></td><td><?php echo $this->_tpl_vars['T_COMPLETE_LESSON_FORM']['submit_complete_lesson_condition']['html']; ?>
</td></tr>
                </table>
            </form>
        <?php $this->_smarty_vars['capture']['t_add_condition_code'] = ob_get_contents(); ob_end_clean(); ?>

        <?php echo smarty_function_eF_template_printBlock(array('title' => @_CONDITIONPROPERTIES,'data' => $this->_smarty_vars['capture']['t_add_condition_code'],'image' => '32x32/rules.png'), $this);?>

    <?php else: ?>
        <?php ob_start(); ?>
            <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
                <div class = "headerTools">
                	<span>
                		<img src = "images/16x16/add.png" title="<?php echo @_ADDCONDITION; ?>
" alt="<?php echo @_ADDCONDITION; ?>
"/>
                		<a href = "professor.php?ctg=rules&tab=conditions&add_condition=1"><?php echo @_ADDCONDITION; ?>
</a>
                	</span>
                	<span>
                		<img src = "images/16x16/autocomplete.png" title="<?php echo @_AUTOCOMPLETE; ?>
" alt="<?php echo @_AUTOCOMPLETE; ?>
"/>
                		<a href = "javascript:void(0)" onclick = "setAutoComplete(this)"><?php echo @_AUTOCOMPLETE; ?>
:&nbsp;<?php if ($this->_tpl_vars['T_CURRENT_LESSON']->options['auto_complete']): ?><?php echo @_YES; ?>
<?php else: ?><?php echo @_NO; ?>
<?php endif; ?></a>
                	</span>
                </div>
            <?php endif; ?>
                <table width = "100%" class = "sortedTable" rowsPerPage = "15">
                    <tr class = "topTitle">
                        <td class = "topTitle"><?php echo @_CONDITIONTYPE; ?>
</td>
                        <td class = "topTitle"><?php echo @_CONDITION; ?>
</td>
                        <td class = "topTitle"><?php echo @_RELATIONTOOTHERS; ?>
</td>
                        <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td>

            <?php $_from = $this->_tpl_vars['T_LESSON_CONDITIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['conditions_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['conditions_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['conditions_list']['iteration']++;
?>
                    <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 defaultRowHeight">
                        <td><?php echo $this->_tpl_vars['T_CONDITION_TYPES'][$this->_tpl_vars['item']['type']]; ?>
</td>
                        <td>
                            <?php if ($this->_tpl_vars['item']['type'] == 'all_units'): ?>
                            <?php elseif ($this->_tpl_vars['item']['type'] == 'percentage_units'): ?>
						        <?php echo $this->_tpl_vars['item']['options']['0']; ?>
%
                            <?php elseif ($this->_tpl_vars['item']['type'] == 'time_in_lesson'): ?>
						        <?php echo $this->_tpl_vars['item']['options']['0']; ?>
'
                            <?php elseif ($this->_tpl_vars['item']['type'] == 'specific_unit'): ?>
						        <?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['item']['options']['0']]; ?>

                            <?php elseif ($this->_tpl_vars['item']['type'] == 'all_tests'): ?>
						        <?php echo $this->_tpl_vars['item']['options']['0']; ?>

                            <?php elseif ($this->_tpl_vars['item']['type'] == 'specific_test'): ?>
        						<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['item']['options']['0']]; ?>

                            <?php endif; ?>
                        </td>
                        <td><?php if ($this->_tpl_vars['item']['relation'] == 'or'): ?><?php echo @_OR; ?>
<?php else: ?><?php echo @_AND; ?>
<?php endif; ?></td>
                        <td class = "centerAlign">
            <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
                            <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=rules&tab=conditions&edit_condition=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_CORRECTION; ?>
" title = "<?php echo @_CORRECTION; ?>
" /></a>
                            <img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteCondition(this, '<?php echo $this->_tpl_vars['item']['id']; ?>
');"/>
            <?php endif; ?>
                        </td>
                    </tr>
            <?php endforeach; else: ?>
                    <tr class = "oddRowColor defaultRowHeight"><td colspan = "5" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
            <?php endif; unset($_from); ?>
                </table>
        <?php $this->_smarty_vars['capture']['t_conditions_code'] = ob_get_contents(); ob_end_clean(); ?>

        <?php ob_start(); ?>
            <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
            	<script>var autocompleteyes = '<?php echo @_AUTOCOMPLETE; ?>
: <?php echo @_YES; ?>
';var autocompleteno = '<?php echo @_AUTOCOMPLETE; ?>
: <?php echo @_NO; ?>
';</script>
                <div class = "headerTools">
                	<span>
                		<img src = "images/16x16/add.png" title = "<?php echo @_ADDRULE; ?>
" alt = "<?php echo @_ADDRULE; ?>
"  />
                		<a href = "professor.php?ctg=rules&add_rule=1" ><?php echo @_ADDRULE; ?>
</a>
                	</span>
                </div>
            <?php endif; ?>
                    <table width = "100%" class = "sortedTable">
                        <tr class = "topTitle defaultRowHeight">
                            <td class = "topTitle"><?php echo @_VALIDFOR; ?>
</td>
                            <td class = "topTitle"><?php echo @_EXCLUDECONSTRAINT; ?>
</td>
                            <td class = "topTitle"><?php echo @_EXCLUSIONUNIT; ?>
</td>
                            <td class = "topTitle noSort centerAlign"><?php echo @_FUNCTIONS; ?>
</td>
                <?php $_from = $this->_tpl_vars['T_RULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rules_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rules_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['rule']):
        $this->_foreach['rules_list']['iteration']++;
?>
                    <?php $this->assign('rule_content_id', $this->_tpl_vars['rule']['rule_content_ID']); ?>
                    <?php $this->assign('content_id', $this->_tpl_vars['rule']['content_ID']); ?>
                    <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 defaultRowHeight <?php if (( ! $this->_tpl_vars['T_TREE_ACTIVE'][$this->_tpl_vars['content_id']] || ! $this->_tpl_vars['T_TREE_ACTIVE'][$this->_tpl_vars['rule_content_id']] ) && "{".($this->_tpl_vars['rule']).".rule_type" != 'serial' && $this->_tpl_vars['rule']['rule_type'] != 'tree'): ?>}deactivatedTableElement<?php endif; ?>">
                    <?php if (( $this->_tpl_vars['rule']['users_LOGIN'] != '*' )): ?>
                        <td>#filter:login-<?php echo $this->_tpl_vars['rule']['users_LOGIN']; ?>
#</td>
                    <?php else: ?>
                        <td><?php echo @_ALLOFTHEM; ?>
</td>
                    <?php endif; ?>

                    <?php if (( $this->_tpl_vars['rule']['rule_type'] == 'always' )): ?>
                            <td><?php echo @_STUDENTALLWAYS; ?>
 </td>
                    <?php elseif (( $this->_tpl_vars['rule']['rule_type'] == 'hasnot_seen' )): ?>
                            <td><?php echo @_IFSTUDENTHASNOTSEEN; ?>
 <?php echo @_THEUNIT; ?>
 "<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['rule_content_id']]; ?>
"</td>
                    <?php elseif (( $this->_tpl_vars['rule']['rule_type'] == 'hasnot_passed' )): ?>
                            <td><?php echo @_IFSTUDENTHASNOTPASSED; ?>
 <?php echo @_THETEST; ?>
 "<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['rule_content_id']]; ?>
" <?php echo @_WITHSCOREATLEAST; ?>
 <?php echo $this->_tpl_vars['rule']['rule_option']*100; ?>
%</td>
                    <?php elseif (( $this->_tpl_vars['rule']['rule_type'] == 'serial' )): ?>
                            <td><?php echo @_SERIALRULE; ?>
</td>
                    <?php elseif (( $this->_tpl_vars['rule']['rule_type'] == 'tree' )): ?>
                            <td><?php echo @_TREERULE; ?>
</td>
                    <?php endif; ?>
                            <td><?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['content_id']]; ?>
</td>
                            <td class = "centerAlign">
                    <?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['content'] == 'change'): ?>
                        <?php if ($this->_tpl_vars['rule']['rule_type'] != 'serial' && $this->_tpl_vars['rule']['rule_type'] != 'tree'): ?>
						        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=rules&edit_rule=<?php echo $this->_tpl_vars['rule']['id']; ?>
"><img src = "images/16x16/edit.png" alt = "<?php echo @_CORRECTION; ?>
" title = "<?php echo @_CORRECTION; ?>
" /></a>
                        <?php endif; ?>
        						<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteRule(this, '<?php echo $this->_tpl_vars['rule']['id']; ?>
')"/>
                    <?php endif; ?>
                            </td></tr>
                <?php endforeach; else: ?>
                        <tr class = "oddRowColor defaultRowHeight"><td colspan = "5" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
                <?php endif; unset($_from); ?>
                    </table>

        <?php $this->_smarty_vars['capture']['t_lesson_rules'] = ob_get_contents(); ob_end_clean(); ?>

		<?php ob_start(); ?>
        <div class = "tabber">
			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'rules','title' => @_CONTENTTRAVERSINGRULES,'data' => $this->_smarty_vars['capture']['t_lesson_rules'],'image' => '32x32/content.png'), $this);?>

			<?php echo smarty_function_eF_template_printBlock(array('tabber' => 'conditions','title' => @_LESSONCONDITIONS,'data' => $this->_smarty_vars['capture']['t_conditions_code'],'image' => '32x32/graduation.png'), $this);?>

		   	<?php $_from = $this->_tpl_vars['T_MODULE_TABS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['module_tabs_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['module_tabs_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tab']):
        $this->_foreach['module_tabs_list']['iteration']++;
?>
		        <?php ob_start(); ?>
		            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['tab']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		        <?php $this->_smarty_vars['capture']['module_tab'] = ob_get_contents(); ob_end_clean(); ?>
                <?php echo smarty_function_eF_template_printBlock(array('tabber' => $this->_tpl_vars['tab']['tab'],'title' => $this->_tpl_vars['tab']['title'],'data' => $this->_smarty_vars['capture']['module_tab'],'image' => $this->_tpl_vars['tab']['image']), $this);?>

			<?php endforeach; endif; unset($_from); ?>

        </div>
        <?php $this->_smarty_vars['capture']['t_rules_code'] = ob_get_contents(); ob_end_clean(); ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_RULES,'data' => $this->_smarty_vars['capture']['t_rules_code'],'image' => '32x32/rules.png','help' => 'Lesson_rules'), $this);?>


    <?php endif; ?>
    </td></tr>
    <?php $this->_smarty_vars['capture']['moduleRules'] = ob_get_contents(); ob_end_clean(); ?>