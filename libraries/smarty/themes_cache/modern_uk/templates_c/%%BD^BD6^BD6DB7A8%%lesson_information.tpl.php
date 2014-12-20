<?php /* Smarty version 2.6.27, created on 2014-09-15 18:47:06
         compiled from includes/lesson_information.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/lesson_information.tpl', 25, false),array('modifier', 'cat', 'includes/lesson_information.tpl', 25, false),array('modifier', 'str_replace', 'includes/lesson_information.tpl', 88, false),)), $this); ?>
<?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['news'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['news'] == 'change'): ?>
	<?php $this->assign('_change_', 1); ?>
<?php endif; ?>


                <?php ob_start(); ?>
                                <tr><td class = "moduleCell">
<?php if ($_GET['edit_info']): ?>
                                <?php ob_start(); ?>
                                    <fieldset class = "fieldsetSeparator">
                                        <legend><?php echo @_LESSONINFORMATION; ?>
</legend>
                                        <?php echo $this->_tpl_vars['T_LESSON_INFO_HTML']; ?>

                                    </fieldset>
                                    <fieldset class = "fieldsetSeparator">
                                        <legend><?php echo @_LESSONMETADATA; ?>
</legend>
                                        <?php echo $this->_tpl_vars['T_LESSON_METADATA_HTML']; ?>

                                    </fieldset>
                                <?php $this->_smarty_vars['capture']['t_lesson_info_code'] = ob_get_contents(); ob_end_clean(); ?>
                                <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_INFORMATIONFORLESSON)) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;') : smarty_modifier_cat($_tmp, '&quot;')),'data' => $this->_smarty_vars['capture']['t_lesson_info_code'],'image' => '32x32/information.png'), $this);?>

<?php else: ?>
	<?php ob_start(); ?>
	    	    <?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
	    <div class = "headerTools">
	    	<span>
	    		<img src = "images/16x16/edit.png" alt = "<?php echo @_EDIT; ?>
" title = "<?php echo @_EDIT; ?>
">
	    		<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['T_BASE_URL']; ?>
&edit_info=1" title = "<?php echo @_EDITINFORMATION; ?>
"><?php echo @_EDITINFORMATION; ?>
</a>
	    	</span>
	    	<?php if (! $this->_tpl_vars['_admin_']): ?>
	    	<span>
	    		<img src = "images/16x16/edit.png" alt = "<?php echo @_EDIT; ?>
" title = "<?php echo @_EDIT; ?>
" >
	    		<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=rules&tab=conditions" title = "<?php echo @_EDITCONDITIONS; ?>
"><?php echo @_EDITCONDITIONS; ?>
</a>
	    	</span>
	    	<?php endif; ?>
	    </div>
	    <?php endif; ?>
	    <table>
	        <tr><td><img style="vertical-align:middle;" src="images/16x16/user.png" alt="<?php echo @_PROFESSORS; ?>
" title="<?php echo @_PROFESSORS; ?>
"/><span style="vertical-align:middle;">&nbsp;<?php echo @_PROFESSORS; ?>
:&nbsp;</span></td>
	            <td>
	        <?php $_from = $this->_tpl_vars['T_LESSON_INFO']['professors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_professors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_professors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['login'] => $this->_tpl_vars['user']):
        $this->_foreach['lesson_professors']['iteration']++;
?>
					#filter:login-<?php echo $this->_tpl_vars['login']; ?>
#<?php if (! ($this->_foreach['lesson_professors']['iteration'] == $this->_foreach['lesson_professors']['total'])): ?>,&nbsp;<?php endif; ?>
	        <?php endforeach; endif; unset($_from); ?>
	            </td></tr>
	        <?php if ($this->_tpl_vars['T_LESSON_INFO']['content']): ?> <tr><td style = "white-space:nowrap"><img style="vertical-align:middle;" src="images/16x16/theory.png" alt="<?php echo @_CONTENT; ?>
" title="<?php echo @_CONTENT; ?>
"/>&nbsp;<?php echo @_CONTENT; ?>
:&nbsp; </td><td><?php echo $this->_tpl_vars['T_LESSON_INFO']['content']; ?>
  <?php echo @_UNITS; ?>
   </td></tr><?php endif; ?>
	        <?php if ($this->_tpl_vars['T_LESSON_INFO']['tests']): ?>   <tr><td style = "white-space:nowrap"><img style="vertical-align:middle;" src="images/16x16/tests.png" alt="<?php echo @_TESTS; ?>
" title="<?php echo @_TESTS; ?>
"/>&nbsp;<?php echo @_TESTS; ?>
:&nbsp;   </td><td><?php echo $this->_tpl_vars['T_LESSON_INFO']['tests']; ?>
    <?php echo @_TESTS; ?>
   </td></tr><?php endif; ?>
	        <?php if ($this->_tpl_vars['T_LESSON_INFO']['projects']): ?><tr><td style = "white-space:nowrap"><img style="vertical-align:middle;" src="images/16x16/projects.png" alt="<?php echo @_PROJECTS; ?>
" title="<?php echo @_PROJECTS; ?>
"/>&nbsp;<?php echo @_PROJECTS; ?>
:&nbsp;</td><td><?php echo $this->_tpl_vars['T_LESSON_INFO']['projects']; ?>
 <?php echo @_PROJECTS; ?>
</td></tr><?php endif; ?>
	    </table>
	    <table>
	        <?php $_from = $this->_tpl_vars['T_LESSON_INFO_CATEGORIES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_info_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_info_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['lesson_info_list']['iteration']++;
?>
	            <?php if ($this->_tpl_vars['T_LESSON_INFO'][$this->_tpl_vars['key']]): ?>
	                <tr><td>&nbsp;</td></tr>
	                <tr><td class = "mediumHeader" style = "text-align: left">
	                		<?php echo $this->_tpl_vars['T_LESSON_INFO_CATEGORIES'][$this->_tpl_vars['key']]; ?>

	                	</td></tr>
	                <tr><td>&nbsp;</td></tr>
	                <tr><td><?php echo $this->_tpl_vars['T_LESSON_INFO'][$this->_tpl_vars['key']]; ?>
</td></tr>
	                <tr><td class = "horizontalSeparator"></td></tr>
	            <?php endif; ?>
	        <?php endforeach; else: ?>
	                <tr><td class = "emptyCategory"><?php echo @_NODESCRIPTIONSET; ?>
</td></tr>
	        <?php endif; unset($_from); ?>
	        <?php if ($this->_tpl_vars['T_CURRENT_LESSON']->options['tracking']): ?>
	                <tr><td>&nbsp;</td></tr>
	                <tr><td class = "mediumHeader" style = "text-align: left">
	                		<?php echo @_LESSONCONDITIONS; ?>

	                	</td></tr>
	                <tr><td>&nbsp;</td></tr>
	            <?php $_from = $this->_tpl_vars['T_CONDITIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['conditions_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['conditions_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['condition']):
        $this->_foreach['conditions_loop']['iteration']++;
?>
	                <tr><td style = "color:<?php if (! $this->_tpl_vars['_student_']): ?><?php elseif ($this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?>green<?php else: ?>red<?php endif; ?>">
	                <?php if ($this->_foreach['conditions_loop']['total'] > 1): ?><?php if ($this->_tpl_vars['condition']['relation'] == 'and'): ?>&nbsp;<?php echo @_AND; ?>
&nbsp;<?php else: ?>&nbsp;<?php echo @_OR; ?>
&nbsp;<?php endif; ?><?php endif; ?>
	                <?php if ($this->_tpl_vars['condition']['type'] == 'all_units'): ?>
	                    <?php echo @_YOUMUSTSEEALLUNITS; ?>

	                <?php elseif ($this->_tpl_vars['condition']['type'] == 'percentage_units'): ?>
	                    <?php echo @_YOUMUSTSEE; ?>
 <?php echo $this->_tpl_vars['condition']['options']['0']; ?>
% <?php echo @_OFLESSONUNITS; ?>

	                <?php elseif ($this->_tpl_vars['condition']['type'] == 'specific_unit'): ?>
	                    <?php echo @_YOUMUSTSEEUNIT; ?>
 &quot;<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['condition']['options']['0']]; ?>
&quot;
	                <?php elseif ($this->_tpl_vars['condition']['type'] == 'all_tests'): ?>
	                    <?php echo @_YOUMUSTCOMPLETEALLTESTS; ?>

	                <?php elseif ($this->_tpl_vars['condition']['type'] == 'specific_test'): ?>
	                    <?php echo @_YOUMUSTCOMPLETETEST; ?>
 &quot;<?php echo $this->_tpl_vars['T_TREE_NAMES'][$this->_tpl_vars['condition']['options']['0']]; ?>
&quot;
	                <?php elseif ($this->_tpl_vars['condition']['type'] == 'time_in_lesson'): ?>
	                    <?php echo ((is_array($_tmp="%x")) ? $this->_run_mod_handler('str_replace', true, $_tmp, $this->_tpl_vars['condition']['options']['0'], @_YOUMUSTSPENDXMINUTESINLESSON) : str_replace($_tmp, $this->_tpl_vars['condition']['options']['0'], @_YOUMUSTSPENDXMINUTESINLESSON)); ?>

	                <?php endif; ?>
	                <?php if ($this->_tpl_vars['_student_']): ?>
	                    <?php if (! $this->_tpl_vars['T_CONDITIONS_STATUS'][$this->_tpl_vars['key']]): ?><img src = "images/16x16/forbidden.png" title = "<?php echo @_CONDITIONNOTMET; ?>
" alt = "<?php echo @_CONDITIONNOTMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php else: ?><img src = "images/16x16/success.png"  title = "<?php echo @_CONDITIONMET; ?>
" alt = "<?php echo @_CONDITIONMET; ?>
" style = "vertical-align:middle;margin-left:25px"><?php endif; ?>
	                <?php endif; ?>
	                    </td></tr>
	            <?php endforeach; else: ?>
	                <tr><td class = "emptyCategory"><?php echo @_NOCONDITIONSSET; ?>
</td></tr>
	            <?php endif; unset($_from); ?>
	                <tr><td class = "horizontalSeparator"></td></tr>
	        <?php endif; ?>
	    </table>
	<?php $this->_smarty_vars['capture']['t_lesson_info_code'] = ob_get_contents(); ob_end_clean(); ?>
	<?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_INFORMATIONFORLESSON)) ? $this->_run_mod_handler('cat', true, $_tmp, ' &quot;') : smarty_modifier_cat($_tmp, ' &quot;')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_CURRENT_LESSON']->lesson['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&quot;') : smarty_modifier_cat($_tmp, '&quot;')),'data' => $this->_smarty_vars['capture']['t_lesson_info_code'],'image' => '32x32/information.png','help' => 'Lesson_information'), $this);?>

<?php endif; ?>
                                </td></tr>
        <?php $this->_smarty_vars['capture']['moduleLessonInformation'] = ob_get_contents(); ob_end_clean(); ?>