<?php /* Smarty version 2.6.27, created on 2014-09-22 19:12:56
         compiled from includes/tests/add_question.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'implode', 'includes/tests/add_question.tpl', 61, false),array('modifier', 'cat', 'includes/tests/add_question.tpl', 316, false),array('function', 'eF_template_printBlock', 'includes/tests/add_question.tpl', 276, false),)), $this); ?>
	<script>var correlated_message = '<?php echo @_ALLPROPOSEDSKILLSAREALREADYCORRELATED; ?>
';var removechoice = '<?php echo @_REMOVECHOICE; ?>
'; var insertexplanation = '<?php echo @_INSERTEXPLANATION; ?>
';var noSkillsFoundOrNoSkillsCorrelated = "<?php echo @_NOCORRELATEDSKILLSHAVEBEENFOUND; ?>
";</script>

	<?php ob_start(); ?>
    <?php echo $this->_tpl_vars['T_QUESTION_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_QUESTION_FORM']['attributes']; ?>
>
    	<?php echo $this->_tpl_vars['T_QUESTION_FORM']['hidden']; ?>

        <table class = "formElements" style = "width:100%">
       	<?php if ($this->_tpl_vars['T_QUESTION_FORM']['content_ID']): ?>
            <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['content_ID']['label']; ?>
:&nbsp;</td>
            	<td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['content_ID']['html']; ?>
</td></tr>
			<?php if ($this->_tpl_vars['T_QUESTION_FORM']['content_ID']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['content_ID']['error']; ?>
</td></tr><?php endif; ?>
        <?php endif; ?>
	        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['question_type']['label']; ?>
:&nbsp;</td>
				<td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['question_type']['html']; ?>
</td></tr>
		<?php if ($this->_tpl_vars['T_QUESTION_FORM']['question_type']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['question_type']['error']; ?>
</td></tr><?php endif; ?>
	        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['difficulty']['label']; ?>
:&nbsp;</td>
	        	<td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['difficulty']['html']; ?>
</td></tr>
        <?php if ($this->_tpl_vars['T_QUESTION_FORM']['difficulty']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['difficulty']['error']; ?>
</td></tr><?php endif; ?>
	        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['estimate_min']['label']; ?>
:&nbsp;</td>
	        	<td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['estimate_min']['html']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 : <?php echo $this->_tpl_vars['T_QUESTION_FORM']['estimate_sec']['html']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
</td></tr>
        <?php if ($this->_tpl_vars['T_QUESTION_FORM']['estimate_min']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['estimate_min']['error']; ?>
</td></tr><?php endif; ?>
        <?php if ($this->_tpl_vars['T_QUESTION_FORM']['estimate_sec']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['estimate_sec']['error']; ?>
</td></tr><?php endif; ?>
			<tr><td></td><td id = "toggleeditor_cell1">
				<div class = "headerTools">
					<span>
						<img onclick = "toggleFileManager(Element.extend(this).next());" class = "handle" id = "arrow_down" src = "images/16x16/navigate_down.png" alt = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
" title = "<?php echo @_OPENCLOSEFILEMANAGER; ?>
"/>&nbsp;
						<a href = "javascript:void(0)" onclick = "toggleFileManager(this);"><?php echo @_TOGGLEFILEMANAGER; ?>
</a>
					</span>
					<span>
						<img onclick = "toggledInstanceEditor = 'editor_content_data';javascript:toggleEditor('editor_content_data','mceEditor');" class = "handle"  src = "images/16x16/order.png" title = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" alt = "<?php echo @_TOGGLEHTMLEDITORMODE; ?>
" />&nbsp;
						<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'editor_content_data';javascript:toggleEditor('editor_content_data','mceEditor');"  id = "toggleeditor_link"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a>
					</span>
				</div>
				</td></tr>
			<tr><td></td><td id = "filemanager_cell"></td></tr>
	        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['question_text']['label']; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['question_text']['html']; ?>
</td></tr>
		<?php if ($this->_tpl_vars['T_QUESTION_FORM']['question_text']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['question_text']['error']; ?>
</td></tr><?php endif; ?>
        <?php if ($_GET['question_type'] == 'empty_spaces'): ?>
	        <tr><td></td>
	        	<td class = "infoCell"><?php echo @_EMPTYSPACESEXPLANATION; ?>
</td></tr>
        <?php endif; ?>
	<?php if ($_GET['question_type'] == 'raw_text'): ?>
			<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['input_type']['label']; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['input_type']['html']; ?>
</td></tr>
			<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['force_correct']['label']; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['force_correct']['html']; ?>
</td></tr>
		<?php if ($this->_tpl_vars['T_QUESTION_FORM']['force_correct']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['force_correct']['error']; ?>
</td></tr><?php endif; ?>
			<tr id = "autocorrect" <?php if (! $this->_tpl_vars['T_QUESTION_SETTINGS']['autocorrect']): ?>style = "display:none"<?php endif; ?>>
				<td class = "labelCell"><?php echo @_AUTOCORRECTOPTIONS; ?>
:&nbsp;</td>
				<td class = "elementCell">
					<table id = "autocorrect_options">
					<?php $_from = $this->_tpl_vars['T_QUESTION_SETTINGS']['autocorrect']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['autocorrect_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['autocorrect_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['autocorrect_list']['iteration']++;
?>
						<tr  class = "autocorrect_options">
							<td>
								<select name  = "autocorrect_contains[]">
									<option value = "1" <?php if ($this->_tpl_vars['item']['contains'] == 1): ?>selected<?php endif; ?>><?php echo @_CONTAINS; ?>
</option>
									<option value = "0" <?php if ($this->_tpl_vars['item']['contains'] == 0): ?>selected<?php endif; ?>><?php echo @_NOTCONTAINS; ?>
</option>
								</select>
							</td><td>
								<input value = "<?php echo implode($this->_tpl_vars['item']['words'], '|'); ?>
" type = "text" name = "autocorrect_words[]" value = "<?php echo @_SEPARATEWORDSWITHPIPE; ?>
" onclick = "eF_js_editFreeTextChoice(this)" class = "inputText"/>
							</td><td>
								<select name = "autocorrect_score[]">
									<option value = ""><?php echo @_POINTS; ?>
</option>
									<?php unset($this->_sections['options']);
$this->_sections['options']['loop'] = is_array($_loop='11') ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['options']['name'] = 'options';
$this->_sections['options']['show'] = true;
$this->_sections['options']['max'] = $this->_sections['options']['loop'];
$this->_sections['options']['step'] = 1;
$this->_sections['options']['start'] = $this->_sections['options']['step'] > 0 ? 0 : $this->_sections['options']['loop']-1;
if ($this->_sections['options']['show']) {
    $this->_sections['options']['total'] = $this->_sections['options']['loop'];
    if ($this->_sections['options']['total'] == 0)
        $this->_sections['options']['show'] = false;
} else
    $this->_sections['options']['total'] = 0;
if ($this->_sections['options']['show']):

            for ($this->_sections['options']['index'] = $this->_sections['options']['start'], $this->_sections['options']['iteration'] = 1;
                 $this->_sections['options']['iteration'] <= $this->_sections['options']['total'];
                 $this->_sections['options']['index'] += $this->_sections['options']['step'], $this->_sections['options']['iteration']++):
$this->_sections['options']['rownum'] = $this->_sections['options']['iteration'];
$this->_sections['options']['index_prev'] = $this->_sections['options']['index'] - $this->_sections['options']['step'];
$this->_sections['options']['index_next'] = $this->_sections['options']['index'] + $this->_sections['options']['step'];
$this->_sections['options']['first']      = ($this->_sections['options']['iteration'] == 1);
$this->_sections['options']['last']       = ($this->_sections['options']['iteration'] == $this->_sections['options']['total']);
?>
									<option value = "<?php echo $this->_sections['options']['iteration']-6; ?>
" <?php if ($this->_tpl_vars['item']['score'] == $this->_sections['options']['iteration']-6): ?>selected<?php endif; ?>><?php echo $this->_sections['options']['iteration']-6; ?>
</option>
									<?php endfor; endif; ?>
								</select>
								<img src = "images/16x16/error_delete.png" alt = "<?php echo @_REMOVEOPTION; ?>
" title = "<?php echo @_REMOVEOPTION; ?>
" onclick = "eF_js_removeFreeTextChoice(this)"/>
						</td></tr>
					<?php endforeach; else: ?>
						<tr  class = "autocorrect_options">
							<td>
								<select name  = "autocorrect_contains[]">
									<option value = "1"><?php echo @_CONTAINS; ?>
</option>
									<option value = "0"><?php echo @_NOTCONTAINS; ?>
</option>
								</select>
							</td><td>
								<input type = "text" name = "autocorrect_words[]" value = "<?php echo @_SEPARATEWORDSWITHPIPE; ?>
" onclick = "eF_js_editFreeTextChoice(this)" class = "inputText emptyCategory infoCell"/>
							</td><td>
								<select name = "autocorrect_score[]">
									<option value = ""><?php echo @_POINTS; ?>
</option>
									<?php unset($this->_sections['options']);
$this->_sections['options']['loop'] = is_array($_loop='11') ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['options']['name'] = 'options';
$this->_sections['options']['show'] = true;
$this->_sections['options']['max'] = $this->_sections['options']['loop'];
$this->_sections['options']['step'] = 1;
$this->_sections['options']['start'] = $this->_sections['options']['step'] > 0 ? 0 : $this->_sections['options']['loop']-1;
if ($this->_sections['options']['show']) {
    $this->_sections['options']['total'] = $this->_sections['options']['loop'];
    if ($this->_sections['options']['total'] == 0)
        $this->_sections['options']['show'] = false;
} else
    $this->_sections['options']['total'] = 0;
if ($this->_sections['options']['show']):

            for ($this->_sections['options']['index'] = $this->_sections['options']['start'], $this->_sections['options']['iteration'] = 1;
                 $this->_sections['options']['iteration'] <= $this->_sections['options']['total'];
                 $this->_sections['options']['index'] += $this->_sections['options']['step'], $this->_sections['options']['iteration']++):
$this->_sections['options']['rownum'] = $this->_sections['options']['iteration'];
$this->_sections['options']['index_prev'] = $this->_sections['options']['index'] - $this->_sections['options']['step'];
$this->_sections['options']['index_next'] = $this->_sections['options']['index'] + $this->_sections['options']['step'];
$this->_sections['options']['first']      = ($this->_sections['options']['iteration'] == 1);
$this->_sections['options']['last']       = ($this->_sections['options']['iteration'] == $this->_sections['options']['total']);
?>
									<option value = "<?php echo $this->_sections['options']['iteration']-6; ?>
"><?php echo $this->_sections['options']['iteration']-6; ?>
</option>
									<?php endfor; endif; ?>
								</select>
								<img src = "images/16x16/error_delete.png" alt = "<?php echo @_REMOVEOPTION; ?>
" title = "<?php echo @_REMOVEOPTION; ?>
" onclick = "eF_js_removeFreeTextChoice(this)"/>
						</td></tr>
					<?php endif; unset($_from); ?>
						<tr><td colspan = "3">
							<img class = "ajaxHandle" src = "images/16x16/add.png" alt = "<?php echo @_ADDOPTION; ?>
" title = "<?php echo @_ADDOPTION; ?>
" onclick = "eF_js_addFreeTextChoice()"/>
							<a href = "javascript:void(0)" onclick = "eF_js_addFreeTextChoice()"><?php echo @_ADDOPTION; ?>
</a>
						</td></tr>
						<tr id = "autocorrect_score">
							<td colspan = "2" class = "labelCell">
								<?php echo @_CONSIDERCORRECTWHENSCOREISGREATERTHAN; ?>
:&nbsp;
							</td><td>
								<input type = "text" name = "autocorrect_threshold" size="4" value = "<?php echo $this->_tpl_vars['T_QUESTION_SETTINGS']['threshold']; ?>
"/>
						</td></tr>
					</table>
					<hr/>
				</td></tr>

	        <tr><td class = "labelCell"><?php echo @_EXAMPLEANSWER; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['example_answer']['html']; ?>
</td></tr>
		<?php if ($this->_tpl_vars['T_QUESTION_FORM']['example_answer']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['example_answer']['error']; ?>
</td></tr><?php endif; ?>

	<?php elseif ($_GET['question_type'] == 'true_false'): ?>
	        <tr><td class = "labelCell"><?php echo @_THISQUESTIONIS; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_true_false']['html']; ?>
</td></tr>
    	<?php if ($this->_tpl_vars['T_QUESTION_FORM']['correct_true_false']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_true_false']['error']; ?>
</td></tr><?php endif; ?>

	<?php elseif ($_GET['question_type'] == 'empty_spaces'): ?>
            <tr><td class = "labelCell"></td>
                <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['generate_empty_spaces']['html']; ?>
</td></tr>
            <tr><td colspan = "2" >&nbsp;</td></tr>
            <tr id = "spacesRow"><td></td><td>
		<?php $_from = $this->_tpl_vars['T_QUESTION_FORM']['empty_spaces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['empty_spaces_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['empty_spaces_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['empty_spaces_list']['iteration']++;
?>
        	<?php echo $this->_tpl_vars['T_EXCERPTS'][$this->_tpl_vars['key']]; ?>
 <?php echo $this->_tpl_vars['item']['html']; ?>
 <?php if ($this->_tpl_vars['item']['error']): ?><?php echo $this->_tpl_vars['item']['error']; ?>
<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
            <?php echo $this->_tpl_vars['T_EXCERPTS'][$this->_foreach['empty_spaces_list']['iteration']]; ?>

                </td></tr>
            <tr id = "empty_spaces_last_node"><td colspan = "2" ></td></tr>
            <tr><td></td>
                <td class = "infoCell"><?php echo @_SEPARATEALTERNATIVESEXAMPLE; ?>
. <?php echo @_YOUCANUSEASTERISK; ?>
 <?php echo @_YOUCANUSENUMBERRANGE; ?>
</td></tr>
			<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['select_list']['label']; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['select_list']['html']; ?>
</td></tr>
			<?php if ($this->_tpl_vars['T_QUESTION_FORM']['select_list']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['select_list']['error']; ?>
</td></tr><?php endif; ?>
            <tr><td></td>
                <td class = "infoCell"><?php echo @_CHECKINGTHISWILLDISPLAYLISTBOXFIRSTISCORRECT; ?>
</td></tr>
	<?php elseif ($_GET['question_type'] == 'multiple_one'): ?>
	        <tr><td class = "labelCell questionLabel"><?php echo @_INSERTMULTIPLEQUESTIONS; ?>
:</td>
	            <td><table>
    	<?php $_from = $this->_tpl_vars['T_QUESTION_FORM']['multiple_one']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['multiple_one_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['multiple_one_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['multiple_one_list']['iteration']++;
?>
        			<tr><td><?php echo $this->_tpl_vars['item']['html']; ?>
</td>
        				<td>
			<?php if ($this->_foreach['multiple_one_list']['iteration'] > 2): ?>                                          <a href = "javascript:void(0)" onclick = "eF_js_removeImgNode(this, 'multiple_one')">
                        	<img src = "images/16x16/error_delete.png" alt = "<?php echo @_REMOVECHOICE; ?>
" title = "<?php echo @_REMOVECHOICE; ?>
" />
                        </a>
            <?php endif; ?>
            			</td><td style = "padding-left:30px">
                        		<img class = "handle" onclick = "Element.extend(this).next().toggle()" src = "images/16x16/add.png" alt = "<?php echo @_INSERTEXPLANATION; ?>
" title = "<?php echo @_INSERTEXPLANATION; ?>
" style = "margin-right:5px;vertical-align:middle"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_explanation'][$this->_tpl_vars['key']]['html']; ?>

                        </td></tr>
			<?php if ($this->_tpl_vars['item']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['item']['error']; ?>
</td></tr><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
                    <tr id = "multiple_one_last_node"></tr>
                </table>
	            </td></tr>
	        <tr><td class = "labelCell">
	                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('multiple_one')"><img src = "images/16x16/add.png" alt = "<?php echo @_ADDQUESTION; ?>
" title = "<?php echo @_ADDQUESTION; ?>
" border = "0"/></a>
	            </td><td>
	                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('multiple_one')"><?php echo @_ADDOPTION; ?>
</a>
	            </td></tr>
	        <tr><td colspan = "2">&nbsp;</td></tr>
	        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_multiple_one']['label']; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_multiple_one']['html']; ?>
</td></tr>

	<?php elseif ($_GET['question_type'] == 'multiple_many'): ?>
	        <tr><td class = "labelCell questionLabel"><?php echo @_INSERTMULTIPLEQUESTIONS; ?>
:</td>
	            <td><table>
		<?php $_from = $this->_tpl_vars['T_QUESTION_FORM']['multiple_many']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['multiple_many_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['multiple_many_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['multiple_many_list']['iteration']++;
?>
                    <tr><td style = "width:1%;white-space:nowrap"><?php echo $this->_tpl_vars['item']['html']; ?>
</td>
                        <td style = "width:1%"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_multiple_many'][$this->_tpl_vars['key']]['html']; ?>
</td>
                        <td style = "width:1%">
			<?php if ($this->_foreach['multiple_many_list']['iteration'] > 2): ?>                                         <a href = "javascript:void(0)" onclick = "eF_js_removeImgNode(this, 'multiple_many')">
                                <img src = "images/16x16/error_delete.png" alt = "<?php echo @_REMOVECHOICE; ?>
" title = "<?php echo @_REMOVECHOICE; ?>
" /></a>
            <?php endif; ?>
                        </td><td style = "padding-left:30px">
            					<img onclick = "Element.extend(this).next().toggle()" class = "handle"  src = "images/16x16/add.png" alt = "<?php echo @_INSERTEXPLANATION; ?>
" title = "<?php echo @_INSERTEXPLANATION; ?>
" style = "margin-right:5px;vertical-align:middle"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_explanation'][$this->_tpl_vars['key']]['html']; ?>

                        </td></tr>
			<?php if ($this->_tpl_vars['item']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['item']['error']; ?>
</td></tr><?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
                    <tr id = "multiple_many_last_node"></tr>
                </table>
            </td></tr>
            <tr><td class = "labelCell">
                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('multiple_many')"><img src = "images/16x16/add.png" alt = "<?php echo @_ADDQUESTION; ?>
" title = "<?php echo @_ADDQUESTION; ?>
" border = "0"/></a>
            </td><td>
                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('multiple_many')"><?php echo @_ADDOPTION; ?>
</a>
            </td></tr>
			<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_logic']['label']; ?>
:&nbsp;</td>
	            <td class = "elementCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_logic']['html']; ?>
</td></tr>
			<?php if ($this->_tpl_vars['T_QUESTION_FORM']['answers_logic']['error']): ?><tr><td colspan = "2" class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_logic']['error']; ?>
</td></tr><?php endif; ?>
	<?php elseif ($_GET['question_type'] == 'match'): ?>
	        <tr><td class = "labelCell questionLabel"><?php echo @_INSERTMATCHCOUPLES; ?>
:</td>
	            <td><table>
        <?php unset($this->_sections['match_list']);
$this->_sections['match_list']['name'] = 'match_list';
$this->_sections['match_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_QUESTION_FORM']['match']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['match_list']['show'] = true;
$this->_sections['match_list']['max'] = $this->_sections['match_list']['loop'];
$this->_sections['match_list']['step'] = 1;
$this->_sections['match_list']['start'] = $this->_sections['match_list']['step'] > 0 ? 0 : $this->_sections['match_list']['loop']-1;
if ($this->_sections['match_list']['show']) {
    $this->_sections['match_list']['total'] = $this->_sections['match_list']['loop'];
    if ($this->_sections['match_list']['total'] == 0)
        $this->_sections['match_list']['show'] = false;
} else
    $this->_sections['match_list']['total'] = 0;
if ($this->_sections['match_list']['show']):

            for ($this->_sections['match_list']['index'] = $this->_sections['match_list']['start'], $this->_sections['match_list']['iteration'] = 1;
                 $this->_sections['match_list']['iteration'] <= $this->_sections['match_list']['total'];
                 $this->_sections['match_list']['index'] += $this->_sections['match_list']['step'], $this->_sections['match_list']['iteration']++):
$this->_sections['match_list']['rownum'] = $this->_sections['match_list']['iteration'];
$this->_sections['match_list']['index_prev'] = $this->_sections['match_list']['index'] - $this->_sections['match_list']['step'];
$this->_sections['match_list']['index_next'] = $this->_sections['match_list']['index'] + $this->_sections['match_list']['step'];
$this->_sections['match_list']['first']      = ($this->_sections['match_list']['iteration'] == 1);
$this->_sections['match_list']['last']       = ($this->_sections['match_list']['iteration'] == $this->_sections['match_list']['total']);
?>
                    <tr><td style = "width:1%;white-space:nowrap"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['match'][$this->_sections['match_list']['index']]['html']; ?>
</td>
                        <td style = "width:1%;white-space:nowrap">&nbsp;&raquo;&raquo;&nbsp;</td>
                        <td style = "width:1%;white-space:nowrap"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_match'][$this->_sections['match_list']['index']]['html']; ?>
</td>
                        <td style = "width:1%;white-space:nowrap">
        	<?php if ($this->_sections['match_list']['iteration'] > 2): ?>                                               <a href = "javascript:void(0)" onclick = "eF_js_removeImgNode(this, 'match')">
                                <img src = "images/16x16/error_delete.png" border = "no" alt = "<?php echo @_REMOVECHOICE; ?>
" title = "<?php echo @_REMOVECHOICE; ?>
" /></a>
            <?php endif; ?>
                        </td><td style = "padding-left:30px">
                             	<img onclick = "Element.extend(this).next().toggle()" class = "handle"  src = "images/16x16/add.png" alt = "<?php echo @_INSERTEXPLANATION; ?>
" title = "<?php echo @_INSERTEXPLANATION; ?>
" style = "margin-right:5px;vertical-align:middle"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_explanation'][$this->_sections['match_list']['index']]['html']; ?>

                        </td></tr>
			<?php if ($this->_tpl_vars['T_QUESTION_FORM']['match'][$this->_sections['match_list']['index']]['error'] || $this->_tpl_vars['T_QUESTION_FORM']['correct_match'][$this->_sections['match_list']['index']]['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['match'][$this->_sections['match_list']['index']]['error']; ?>
</td><td><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_match'][$this->_sections['match_list']['index']]['error']; ?>
</td></tr><?php endif; ?>
		<?php endfor; endif; ?>
                    <tr id = "match_last_node"></tr>
                </table>
	            </td></tr>
	            <tr><td class = "labelCell">
	                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('match')"><img src = "images/16x16/add.png" alt = "<?php echo @_ADDQUESTION; ?>
" title = "<?php echo @_ADDQUESTION; ?>
" border = "0"/></a>
	            </td><td>
	                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('match')"><?php echo @_ADDOPTION; ?>
</a>
	            </td></tr>
	<?php elseif ($_GET['question_type'] == 'drag_drop'): ?>
	        <tr><td class = "labelCell questionLabel"><?php echo @_INSERTDRAGDROPCOUPLES; ?>
:</td>
	            <td><table>
    	<?php unset($this->_sections['drag_drop_list']);
$this->_sections['drag_drop_list']['name'] = 'drag_drop_list';
$this->_sections['drag_drop_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_QUESTION_FORM']['drag_drop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['drag_drop_list']['show'] = true;
$this->_sections['drag_drop_list']['max'] = $this->_sections['drag_drop_list']['loop'];
$this->_sections['drag_drop_list']['step'] = 1;
$this->_sections['drag_drop_list']['start'] = $this->_sections['drag_drop_list']['step'] > 0 ? 0 : $this->_sections['drag_drop_list']['loop']-1;
if ($this->_sections['drag_drop_list']['show']) {
    $this->_sections['drag_drop_list']['total'] = $this->_sections['drag_drop_list']['loop'];
    if ($this->_sections['drag_drop_list']['total'] == 0)
        $this->_sections['drag_drop_list']['show'] = false;
} else
    $this->_sections['drag_drop_list']['total'] = 0;
if ($this->_sections['drag_drop_list']['show']):

            for ($this->_sections['drag_drop_list']['index'] = $this->_sections['drag_drop_list']['start'], $this->_sections['drag_drop_list']['iteration'] = 1;
                 $this->_sections['drag_drop_list']['iteration'] <= $this->_sections['drag_drop_list']['total'];
                 $this->_sections['drag_drop_list']['index'] += $this->_sections['drag_drop_list']['step'], $this->_sections['drag_drop_list']['iteration']++):
$this->_sections['drag_drop_list']['rownum'] = $this->_sections['drag_drop_list']['iteration'];
$this->_sections['drag_drop_list']['index_prev'] = $this->_sections['drag_drop_list']['index'] - $this->_sections['drag_drop_list']['step'];
$this->_sections['drag_drop_list']['index_next'] = $this->_sections['drag_drop_list']['index'] + $this->_sections['drag_drop_list']['step'];
$this->_sections['drag_drop_list']['first']      = ($this->_sections['drag_drop_list']['iteration'] == 1);
$this->_sections['drag_drop_list']['last']       = ($this->_sections['drag_drop_list']['iteration'] == $this->_sections['drag_drop_list']['total']);
?>
                    <tr><td style = "width:1%;white-space:nowrap"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['drag_drop'][$this->_sections['drag_drop_list']['index']]['html']; ?>
</td>
                        <td style = "width:1%;white-space:nowrap">&nbsp;&raquo;&raquo;&nbsp;</td>
                        <td style = "width:1%;white-space:nowrap"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_drag_drop'][$this->_sections['drag_drop_list']['index']]['html']; ?>
</td>
                        <td style = "width:1%;white-space:nowrap">
        	<?php if ($this->_sections['drag_drop_list']['iteration'] > 2): ?>                                               <a href = "javascript:void(0)" onclick = "eF_js_removeImgNode(this, 'drag_drop')">
                                <img src = "images/16x16/error_delete.png" border = "no" alt = "<?php echo @_REMOVECHOICE; ?>
" title = "<?php echo @_REMOVECHOICE; ?>
" /></a>
            <?php endif; ?>
                        </td><td style = "padding-left:30px;white-space:nowrap">
                             	<img onclick = "Element.extend(this).next().toggle()" class = "handle" src = "images/16x16/add.png" alt = "<?php echo @_INSERTEXPLANATION; ?>
" title = "<?php echo @_INSERTEXPLANATION; ?>
" style = "margin-right:5px;vertical-align:middle"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['answers_explanation'][$this->_sections['drag_drop_list']['index']]['html']; ?>

                        </td></tr>
			<?php if ($this->_tpl_vars['T_QUESTION_FORM']['drag_drop'][$this->_sections['drag_drop_list']['index']]['error'] || $this->_tpl_vars['T_QUESTION_FORM']['correct_drag_drop'][$this->_sections['drag_drop_list']['index']]['error']): ?><tr><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['drag_drop'][$this->_sections['drag_drop_list']['index']]['error']; ?>
</td><td><?php echo $this->_tpl_vars['T_QUESTION_FORM']['correct_drag_drop'][$this->_sections['drag_drop_list']['index']]['error']; ?>
</td></tr><?php endif; ?>
		<?php endfor; endif; ?>
                    <tr id = "drag_drop_last_node"></tr>
                </table>
	            </td></tr>
	            <tr><td class = "labelCell">
	                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('drag_drop')"><img src = "images/16x16/add.png" alt = "<?php echo @_ADDQUESTION; ?>
" title = "<?php echo @_ADDQUESTION; ?>
" border = "0"/></a>
	            </td><td>
	                <a href = "javascript:void(0)" onclick = "eF_js_addAdditionalChoice('drag_drop')"><?php echo @_ADDOPTION; ?>
</a>
	            </td></tr>
	<?php elseif ($this->_tpl_vars['T_QUESTION_FILE']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['T_QUESTION_FILE'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

	        <tr><td colspan = "2" >&nbsp;</td></tr>
	        <tr><td></td><td class = "elementCell">
	        <div class = "headerTools">
	        	<span>
	        		<img onclick = "eF_js_showHide('explanation');" class = "handle" src = "images/16x16/add.png" alt = "<?php echo @_INSERTEXPLANATION; ?>
" title = "<?php echo @_INSERTEXPLANATION; ?>
">
	        		<a href = "javascript:void(0)" onclick = "eF_js_showHide('explanation');"><?php echo @_INSERTEXPLANATION; ?>
</a>
	        	</span>
			</div>
			</td></tr>
	        <tr id = "explanation" <?php if (! $this->_tpl_vars['T_HAS_EXPLANATION']): ?>style = "display:none"<?php endif; ?>>
	        	<td class = "labelCell"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['explanation']['label']; ?>
:</td>
	            <td class = "elementCell"><img onclick = "toggledInstanceEditor = 'question_explanation_data';javascript:toggleEditor('question_explanation_data','mceEditor');" class = "handle" src = "images/16x16/order.png" title = <?php echo @_TOGGLEHTMLEDITORMODE; ?>
 alt = <?php echo @_TOGGLEHTMLEDITORMODE; ?>
 />&nbsp;<a href = "javascript:void(0)" onclick = "toggledInstanceEditor = 'question_explanation_data';javascript:toggleEditor('question_explanation_data','mceEditor');"><?php echo @_TOGGLEHTMLEDITORMODE; ?>
</a><br/><?php echo $this->_tpl_vars['T_QUESTION_FORM']['explanation']['html']; ?>
</td></tr>
		<?php if ($this->_tpl_vars['T_QUESTION_FORM']['explanation']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_QUESTION_FORM']['explanation']['error']; ?>
</td></tr><?php endif; ?>
	        <tr><td></td>
	        	<td class = "elementCell">
	        		<?php echo $this->_tpl_vars['T_QUESTION_FORM']['submit_question']['html']; ?>

					<?php if ($_GET['add_question']): ?>
	                	&nbsp;<?php echo $this->_tpl_vars['T_QUESTION_FORM']['submit_question_another']['html']; ?>

	                <?php else: ?>
	                	&nbsp;<?php echo $this->_tpl_vars['T_QUESTION_FORM']['submit_new_question']['html']; ?>

	                <?php endif; ?>
	            </td></tr>
	    </table>
    </form>
	<div id = "fmInitial"><div id = "filemanager_div" style = "display:none;"><?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>
</div></div>
	<?php $this->_smarty_vars['capture']['t_questions_info'] = ob_get_contents(); ob_end_clean(); ?>

            <?php if ($this->_tpl_vars['T_SKILLGAP_TEST'] && ! isset ( $_GET['popup'] )): ?>
	    <div class="tabber" >
	        <div class="tabbertab">
	            <h3><?php echo @_QUESTIONINFO; ?>
</h3>
	    <?php endif; ?>

	    <?php if (! isset ( $_GET['popup'] )): ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => @_QUESTIONINFO,'data' => $this->_smarty_vars['capture']['t_questions_info'],'image' => '32x32/question_and_answer.png'), $this);?>

	    <?php endif; ?>

	    <?php if ($this->_tpl_vars['T_SKILLGAP_TEST']): ?>
	        </div>
	        <?php if ($_GET['edit_question']): ?>
	            <?php if (! isset ( $_GET['popup'] )): ?>
	        <div class="tabbertab">
	            <h3><?php echo @_ASSOCIATEDSKILLS; ?>
</h3>
	            <?php endif; ?>
	            <?php ob_start(); ?>
	        <table id="questionSkillTable" width="100%" border = "0" width = "100%"  class = "sortedTable" sortBy = "0">
	            <tr class = "topTitle">
	                <td class = "topTitle"><?php echo @_SKILL; ?>
</td>
	                <td class = "topTitle"><?php echo @_RELEVANCE; ?>
</td>
	                <td class = "topTitle centerAlign"><?php echo @_CHECK; ?>
</td>
	            </tr>

	            <?php $_from = $this->_tpl_vars['T_QUESTION_SKILLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['skills_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['skills_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['skill']):
        $this->_foreach['skills_list']['iteration']++;
?>
	            <tr>
	                <td><?php echo $this->_tpl_vars['skill']['description']; ?>
</td>
	                <td>
	                	<span id = "span_skill_relevance_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" style="display:none"><?php if (! isset ( $this->_tpl_vars['skill']['relevance'] )): ?>2<?php else: ?><?php echo $this->_tpl_vars['skill']['relevance']; ?>
<?php endif; ?></span>
	                    <select name = "skill_relevance_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" id = "skill_relevance_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" onChange = "ajaxPost('<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
', this, 'questionSkillTable');document.getElementById('skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
').checked = true;">
					        <option value = "1" <?php if (( $this->_tpl_vars['skill']['relevance'] == '1' )): ?>selected<?php endif; ?>><?php echo @_LOW; ?>
</option>
					        <option value = "2" <?php if (( ! isset ( $this->_tpl_vars['skill']['relevance'] ) || $this->_tpl_vars['skill']['relevance'] == '2' )): ?>selected<?php endif; ?>><?php echo @_MEDIUM; ?>
</option>
					        <option value = "3" <?php if (( $this->_tpl_vars['skill']['relevance'] == '3' )): ?>selected<?php endif; ?>><?php echo @_HIGH; ?>
</option>
	                    </select>
	                </td>
	                <td class = "centerAlign">
	                	<span id = "span_skill_checked_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
" style="display:none"><?php if (isset ( $this->_tpl_vars['skill']['questions_ID'] )): ?>1<?php else: ?>0<?php endif; ?></span>
	                    <input class = "inputCheckBox" type = "checkbox" id = "skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
"  name = "skill_<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
"  onClick ="ajaxPost('<?php echo $this->_tpl_vars['skill']['skill_ID']; ?>
', this, 'questionSkillTable');" <?php if (isset ( $this->_tpl_vars['skill']['questions_ID'] )): ?>checked<?php endif; ?>>
	                </td>
	            </tr>
	            <?php endforeach; else: ?>
	            <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "6"><?php echo @_NODATAFOUND; ?>
</td></tr>
	            <?php endif; unset($_from); ?>
	        </table>

	        <?php $this->_smarty_vars['capture']['t_skills_to_questions'] = ob_get_contents(); ob_end_clean(); ?>
	        <?php echo smarty_function_eF_template_printBlock(array('title' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@_CORRELATESKILLSTOQUESTION)) ? $this->_run_mod_handler('cat', true, $_tmp, ':&nbsp;<i>') : smarty_modifier_cat($_tmp, ':&nbsp;<i>')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_QUESTION_TEXT']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_QUESTION_TEXT'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</i>') : smarty_modifier_cat($_tmp, '</i>')),'data' => $this->_smarty_vars['capture']['t_skills_to_questions'],'image' => '32x32/generic.png','options' => $this->_tpl_vars['T_SUGGEST_QUESTION_SKILLS']), $this);?>

	            <?php if (! isset ( $_GET['popup'] )): ?>
	            </div>
	            <?php endif; ?>
	        <?php endif; ?>

	        <?php if (! isset ( $_GET['popup'] )): ?>
	        </div>
		</div>
			<?php endif; ?>
		<?php endif; ?>