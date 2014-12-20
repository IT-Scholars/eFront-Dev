<?php /* Smarty version 2.6.27, created on 2014-09-15 19:33:28
         compiled from includes/module_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'includes/module_search.tpl', 7, false),array('modifier', 'string_format', 'includes/module_search.tpl', 39, false),array('function', 'eF_template_printBlock', 'includes/module_search.tpl', 295, false),)), $this); ?>

<?php ob_start(); ?>
   <table width="100%">
    <?php unset($this->_sections['results_list']);
$this->_sections['results_list']['name'] = 'results_list';
$this->_sections['results_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_SEARCH_COMMAND']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['results_list']['show'] = true;
$this->_sections['results_list']['max'] = $this->_sections['results_list']['loop'];
$this->_sections['results_list']['step'] = 1;
$this->_sections['results_list']['start'] = $this->_sections['results_list']['step'] > 0 ? 0 : $this->_sections['results_list']['loop']-1;
if ($this->_sections['results_list']['show']) {
    $this->_sections['results_list']['total'] = $this->_sections['results_list']['loop'];
    if ($this->_sections['results_list']['total'] == 0)
        $this->_sections['results_list']['show'] = false;
} else
    $this->_sections['results_list']['total'] = 0;
if ($this->_sections['results_list']['show']):

            for ($this->_sections['results_list']['index'] = $this->_sections['results_list']['start'], $this->_sections['results_list']['iteration'] = 1;
                 $this->_sections['results_list']['iteration'] <= $this->_sections['results_list']['total'];
                 $this->_sections['results_list']['index'] += $this->_sections['results_list']['step'], $this->_sections['results_list']['iteration']++):
$this->_sections['results_list']['rownum'] = $this->_sections['results_list']['iteration'];
$this->_sections['results_list']['index_prev'] = $this->_sections['results_list']['index'] - $this->_sections['results_list']['step'];
$this->_sections['results_list']['index_next'] = $this->_sections['results_list']['index'] + $this->_sections['results_list']['step'];
$this->_sections['results_list']['first']      = ($this->_sections['results_list']['iteration'] == 1);
$this->_sections['results_list']['last']       = ($this->_sections['results_list']['iteration'] == $this->_sections['results_list']['total']);
?>
	<?php if (( isset ( $this->_tpl_vars['T_SEARCH_COMMAND_KEY3'] ) )): ?>
		<tr><td><a href = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['T_SEARCH_COMMAND_LOCATION'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY1']]) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY1']])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&question_type=") : smarty_modifier_cat($_tmp, "&question_type=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY3']]) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY3']])); ?>
<?php if ($this->_tpl_vars['T_SEARCH_COMMAND_CHANGELESSON']): ?>&lessons_ID=<?php echo $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']]['lessons_ID']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY2']]; ?>
</a></td></tr>
	<?php else: ?>
        <tr><td><a href = "<?php echo ((is_array($_tmp=$this->_tpl_vars['T_SEARCH_COMMAND_LOCATION'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY1']]) : smarty_modifier_cat($_tmp, $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY1']])); ?>
<?php if ($this->_tpl_vars['T_SEARCH_COMMAND_CHANGELESSON']): ?>&lessons_ID=<?php echo $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']]['lessons_ID']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['T_SEARCH_COMMAND'][$this->_sections['results_list']['index']][$this->_tpl_vars['T_SEARCH_COMMAND_KEY2']]; ?>
</a></td></tr>
    <?php endif; ?>
	<?php endfor; endif; ?>
    </table>
<?php $this->_smarty_vars['capture']['t_command_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>


<?php ob_start(); ?>
    <?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_CURRENT_LESSON']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outerc'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outerc']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['clesson_id'] => $this->_tpl_vars['clesson_results']):
        $this->_foreach['outerc']['iteration']++;
?>
        <table width = "100%" bgcolor="#f1f1f1">
		<?php if (! empty ( $this->_tpl_vars['T_SEARCH_RESULTS_LESSONS'] )): ?>
			<tr><td class="labelFormCellTitle"><?php echo @_CURRENTLESSON; ?>
&nbsp;"<?php echo $this->_tpl_vars['T_CURRENT_LESSON_NAME']; ?>
"</td></tr>
        <?php endif; ?>
		<?php $_from = $this->_tpl_vars['clesson_results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cinner'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cinner']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cresult']):
        $this->_foreach['cinner']['iteration']++;
?>
            <tr><td>
        <div class="searchResults">
        <div class="resultsTitle">
            <?php if ($this->_tpl_vars['cresult']['table_name'] == 'news'): ?>
				<a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=news&view=<?php echo $this->_tpl_vars['cresult']['id']; ?>
&popup=1" target = "POPUP_FRAME" onClick = "eF_js_showDivPopup(event, '<?php echo @_ANNOUNCEMENT; ?>
', 1);">
                <img src="images/16x16/announcements.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['cresult']['name']; ?>

                </a>
            <?php elseif ($this->_tpl_vars['cresult']['table_name'] == 'lessons'): ?>
                <a href="<?php echo $this->_tpl_vars['cresult']['user_type']; ?>
.php?ctg=control_panel&lessons_ID=<?php echo $this->_tpl_vars['cresult']['lessons_ID']; ?>
">
                <img src="images/16x16/home.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['cresult']['name']; ?>

                </a>
            <?php elseif ($this->_tpl_vars['cresult']['table_name'] == 'questions'): ?>
    	            <a href="<?php echo $this->_tpl_vars['cresult']['user_type']; ?>
.php?ctg=tests&lessons_id=<?php echo $this->_tpl_vars['cresult']['lessons_ID']; ?>
&edit_question=<?php echo $this->_tpl_vars['cresult']['id']; ?>
&question_type=<?php echo $this->_tpl_vars['cresult']['type']; ?>
"><img src="images/16x16/content.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['cresult']['name']; ?>
</a>
            <?php else: ?>
    	            <a href="<?php echo $this->_tpl_vars['cresult']['user_type']; ?>
.php?ctg=content&lessons_ID=<?php echo $this->_tpl_vars['cresult']['lessons_ID']; ?>
&view_unit=<?php echo $this->_tpl_vars['cresult']['id']; ?>
"><img src="images/16x16/content.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['cresult']['name']; ?>
</a>
            <?php endif; ?>
            (<?php echo ((is_array($_tmp=$this->_tpl_vars['cresult']['score'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
%)
            <div class="small">(<?php echo @_LESSON; ?>
:
            <a href="<?php echo $this->_tpl_vars['cresult']['user_type']; ?>
.php?ctg=control_panel&lessons_ID=<?php echo $this->_tpl_vars['cresult']['lessons_ID']; ?>
">
            <?php echo $this->_tpl_vars['T_CURRENT_LESSON_NAME']; ?>
</a>)</div>
        </div>
            <?php if ($this->_tpl_vars['cresult']['position'] == @_TEXT): ?>
            <?php echo $this->_tpl_vars['cresult']['content']; ?>

            <?php endif; ?>
        </div>
        </td></tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
    <?php endforeach; endif; unset($_from); ?>


<?php if (! empty ( $this->_tpl_vars['T_SEARCH_RESULTS_LESSONS'] )): ?>
	<table width = "100%" bgcolor="#f4f4f4">
	<?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lesson_id'] => $this->_tpl_vars['lesson_results']):
        $this->_foreach['outer']['iteration']++;
?>
        <tr><td class="labelFormCellTitle"><?php echo $this->_tpl_vars['lesson_results']['0']['lesson_name']; ?>
</td></tr>
        <?php $_from = $this->_tpl_vars['lesson_results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['inner'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['inner']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['result']):
        $this->_foreach['inner']['iteration']++;
?>
            <tr><td>
        <div class="searchResults">
        <div class="resultsTitle">
            <?php if ($this->_tpl_vars['result']['table_name'] == 'news'): ?>
            <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                <a href="administrator.php?ctg=lessons&amp;edit_lesson=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
" class="editLink"><img src="images/16x16/announcements.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['result']['name']; ?>
</a>
            <?php else: ?>
                <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=news&view=<?php echo $this->_tpl_vars['result']['id']; ?>
&popup=1" target = "POPUP_FRAME" onClick = "eF_js_showDivPopup(event, '<?php echo @_ANNOUNCEMENT; ?>
', 1);"><img src="images/16x16/announcements.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['result']['name']; ?>
</a>
			<?php endif; ?>
            <?php elseif ($this->_tpl_vars['result']['table_name'] == 'lessons'): ?>
            <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                <a href="administrator.php?ctg=lessons&amp;edit_lesson=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
" class="editLink"><img src="images/16x16/home.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['result']['name']; ?>
</a>
            <?php else: ?>
                <a href="<?php echo $this->_tpl_vars['result']['user_type']; ?>
.php?ctg=control_panel&lessons_ID=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
"><img src="images/16x16/home.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['result']['name']; ?>
</a>
            <?php endif; ?>
            <?php else: ?>
                <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                    <a href="administrator.php?ctg=lessons&amp;edit_lesson=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
" class="editLink"><img src="images/16x16/home.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['result']['name']; ?>
</a>
                <?php else: ?>
                    <a href="<?php echo $this->_tpl_vars['result']['user_type']; ?>
.php?ctg=content&lessons_ID=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
&view_unit=<?php echo $this->_tpl_vars['result']['id']; ?>
"><img src="images/16x16/content.png" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['result']['name']; ?>
</a>
                <?php endif; ?>
            <?php endif; ?>
            (<?php echo ((is_array($_tmp=$this->_tpl_vars['result']['score'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
%)
            <?php if ($_SESSION['s_type'] == 'administrator'): ?>
            <a href="administrator.php?ctg=lessons&amp;edit_lesson=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
" class="editLink"><img src="images/16x16/edit.png" title="<?php echo @_EDIT; ?>
" alt="<?php echo @_EDIT; ?>
" border="0"></a>
            <?php endif; ?>
            <div class="small">(<?php echo @_LESSON; ?>
:
            <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                <a href="administrator.php?ctg=lessons&amp;edit_lesson=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
" class="editLink">
            <?php else: ?>
                <a href="<?php echo $this->_tpl_vars['result']['user_type']; ?>
.php?ctg=control_panel&lessons_ID=<?php echo $this->_tpl_vars['result']['lessons_ID']; ?>
">
            <?php endif; ?>
            <?php echo $this->_tpl_vars['T_LESSON_NAMES'][$this->_tpl_vars['lesson_id']]['name']; ?>
</a>)</div>
        </div>
            <?php if ($this->_tpl_vars['result']['position'] == @_TEXT): ?>
            <?php echo $this->_tpl_vars['result']['content']; ?>

            <?php endif; ?>
        </div>
        </td></tr>
        <?php endforeach; endif; unset($_from); ?>


    <?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['t_lessons_results_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
    <table width="100%">
   	<?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_FORUM']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['forum_messages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['forum_messages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['forum_results']):
        $this->_foreach['forum_messages']['iteration']++;
?>
	<tr><td>

	<?php if ($this->_tpl_vars['forum_results']['table_name'] == 'f_messages'): ?>
		<div class="searchResults">
		<div class="resultsTitle">
		<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $this->_tpl_vars['forum_results']['topic_id']; ?>
&view_message=<?php echo $this->_tpl_vars['forum_results']['message_id']; ?>
"><img src="images/16x16/mail.png" alt="<?php echo @_MESSAGE; ?>
" title="<?php echo @_MESSAGE; ?>
" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['forum_results']['message_subject']; ?>
</a>
		<div class="small">(<?php echo @_FORUM; ?>
:
        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&forum=<?php echo $this->_tpl_vars['forum_results']['category_id']; ?>
"><?php echo $this->_tpl_vars['forum_results']['lesson_name']; ?>
</a>)
		</div>
        </div>
            <?php if ($this->_tpl_vars['forum_results']['position'] == @_TEXT): ?>
            <?php echo $this->_tpl_vars['forum_results']['body']; ?>

            <?php endif; ?>
        </div>
	<?php else: ?>
		<div class="searchResults">
		<div class="resultsTitle">
		<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=forum&topic=<?php echo $this->_tpl_vars['forum_results']['category_id']; ?>
"><img src="images/16x16/forums.png" alt="<?php echo @_FORUM; ?>
" title="<?php echo @_FORUM; ?>
" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['forum_results']['lesson_name']; ?>
</a>
		</div>
        </div>
	<?php endif; ?>
	</td></tr>
  <?php endforeach; else: ?>
        <tr><td class = "emptyCategory"><?php echo @_NORESULTSFOUNDINFORUM; ?>
</td></tr>
  <?php endif; unset($_from); ?>
    </table>
<?php $this->_smarty_vars['capture']['t_forum_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>


<?php ob_start(); ?>
    <table width="100%">
    <?php unset($this->_sections['results_list']);
$this->_sections['results_list']['name'] = 'results_list';
$this->_sections['results_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['results_list']['show'] = true;
$this->_sections['results_list']['max'] = $this->_sections['results_list']['loop'];
$this->_sections['results_list']['step'] = 1;
$this->_sections['results_list']['start'] = $this->_sections['results_list']['step'] > 0 ? 0 : $this->_sections['results_list']['loop']-1;
if ($this->_sections['results_list']['show']) {
    $this->_sections['results_list']['total'] = $this->_sections['results_list']['loop'];
    if ($this->_sections['results_list']['total'] == 0)
        $this->_sections['results_list']['show'] = false;
} else
    $this->_sections['results_list']['total'] = 0;
if ($this->_sections['results_list']['show']):

            for ($this->_sections['results_list']['index'] = $this->_sections['results_list']['start'], $this->_sections['results_list']['iteration'] = 1;
                 $this->_sections['results_list']['iteration'] <= $this->_sections['results_list']['total'];
                 $this->_sections['results_list']['index'] += $this->_sections['results_list']['step'], $this->_sections['results_list']['iteration']++):
$this->_sections['results_list']['rownum'] = $this->_sections['results_list']['iteration'];
$this->_sections['results_list']['index_prev'] = $this->_sections['results_list']['index'] - $this->_sections['results_list']['step'];
$this->_sections['results_list']['index_next'] = $this->_sections['results_list']['index'] + $this->_sections['results_list']['step'];
$this->_sections['results_list']['first']      = ($this->_sections['results_list']['iteration'] == 1);
$this->_sections['results_list']['last']       = ($this->_sections['results_list']['iteration'] == $this->_sections['results_list']['total']);
?>
        <tr><td>
    <div class="searchResults">
    <div class="resultsTitle">
    <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&view=<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['message_id']; ?>
"><?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['message_subject']; ?>
</a>
    <div class="small">
    <?php echo @_MESSAGEFOLDER; ?>
: <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&folder=<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['folder_id']; ?>
"><?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['folder_name']; ?>
</a>
    <br>
    (<?php echo @_FROM2; ?>

    <?php if ($_SESSION['s_login'] <> $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['sender']): ?>
    <a title="<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['sender']; ?>
" target="POPUP_FRAME" onclick="eF_js_showDivPopup(event, '<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['sender']; ?>
', 2)" href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1&recipient=<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['sender']; ?>
&popup=1"><?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['sender']; ?>
</a>
    <?php else: ?>
    <?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['sender']; ?>

    <?php endif; ?>
    |
    <?php echo @_TO2; ?>

    <?php if ($_SESSION['s_login'] <> $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['recipient']): ?>
    <a title="<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['recipient']; ?>
" target="POPUP_FRAME" onclick="eF_js_showDivPopup(event, '<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['recipient']; ?>
', 2)" href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1&recipient=<?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['recipient']; ?>
&popup=1"><?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['recipient']; ?>
</a>
    <?php else: ?>
    <?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['recipient']; ?>

    <?php endif; ?>
    )
    </div>
    <?php echo $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'][$this->_sections['results_list']['index']]['body']; ?>

    </div>
    </div>
    </td></tr>
    <?php endfor; else: ?>
        <tr><td class = "emptyCategory"><?php echo @_NORESULTSFOUNDINPERSONALMESSAGES; ?>
</td></tr>
    <?php endif; ?>
    </table>
<?php $this->_smarty_vars['capture']['t_personal_messages_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
    <table width="100%">
            <?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            <tr>
                <td>
                <div class="searchResults">
                <div class="resultsTitle">
                <a class="editLink" href="<?php echo $_SESSION['s_type']; ?>
.php?ctg=personal&user=<?php echo $this->_tpl_vars['item']['login']; ?>
">#filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
#</a>
                <a title="#filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
#" target="POPUP_FRAME" onclick="eF_js_showDivPopup(event, '<?php echo $this->_tpl_vars['item']['login']; ?>
', 2)" href="<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages&add=1&recipient=<?php echo $this->_tpl_vars['item']['login']; ?>
&popup=1"><img border="0" alt="<?php echo @_SENDPERSONALMESSAGE; ?>
" title="<?php echo @_SENDPERSONALMESSAGE; ?>
" src="images/16x16/mail.png"/></a>
                <a class="editLink" href="<?php echo $_SESSION['s_type']; ?>
.php?ctg=personal&user=<?php echo $this->_tpl_vars['item']['login']; ?>
"><img border="0" alt="<?php echo @_EDIT; ?>
" title="<?php echo @_EDIT; ?>
" src="images/16x16/edit.png"/></a>
                </div>
                </div>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </td></tr>
    </table>
<?php $this->_smarty_vars['capture']['t_users_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
    <table width="100%">
            <?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_FILES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            <tr>
				<td>
						<div class="searchResults">
						<div class="resultsTitle">
						<img style = "vertical-align:middle;" src="<?php echo $this->_tpl_vars['item']['icon']; ?>
" /><a href="view_file.php?action=download&file=<?php echo $this->_tpl_vars['item']['id']; ?>
">&nbsp;<?php echo $this->_tpl_vars['item']['name']; ?>
</a>
						<div class="small">
						<?php echo $this->_tpl_vars['item']['date']; ?>
 <?php if ($this->_tpl_vars['item']['login'] != ""): ?>- #filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
# <?php endif; ?>
						</div>
						</div>
						</div>

                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </td></tr>
    </table>
<?php $this->_smarty_vars['capture']['t_files_results_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
	<table width = "100%" bgcolor="#f4f4f4">
	<?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_FILESYSTEM']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
        <tr><td>
        <div class="searchResults">
        	<div class="resultsTitle">
        		<img class = "handle" tyle = "vertical-align:middle;" src="<?php echo $this->_tpl_vars['item']['icon']; ?>
" />
        		<a href="view_file.php?action=download&file=<?php if ($this->_tpl_vars['item']['id'] != -1): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?><?php echo ((is_array($_tmp=@G_ROOTPATH)) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['path']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['path'])); ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
            	(<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['score'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
%)
	            <div class="small">(<?php echo @_PATH; ?>
:<?php echo $this->_tpl_vars['item']['path']; ?>
</a>)</div>
        	</div>            
            <?php echo $this->_tpl_vars['item']['content']; ?>
            
        </div>
        </td></tr>
    <?php endforeach; endif; unset($_from); ?>
	</table>	
<?php $this->_smarty_vars['capture']['t_filesystem_results_code'] = ob_get_contents(); ob_end_clean(); ?>



<?php ob_start(); ?>
    <table width="100%">
            <?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_COURSES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            <tr>
                <td>
                <div class="searchResults">
                <div class="resultsTitle">
                <?php echo $this->_tpl_vars['item']['name']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['score'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
%)
                <?php if ($_SESSION['s_type'] == 'professor'): ?>
                    <a href="<?php echo $_SESSION['s_type']; ?>
.php?ctg=lessons&course=<?php echo $this->_tpl_vars['item']['id']; ?>
&op=course_info"><img class = "handle" alt="<?php echo @_COURSEINFORMATION; ?>
" title="<?php echo @_COURSEINFORMATION; ?>
" src="images/16x16/information.png"/></a>
                    <a href="<?php echo $_SESSION['s_type']; ?>
.php?ctg=lessons&course=<?php echo $this->_tpl_vars['item']['id']; ?>
&op=course_certificates"><img class = "handle" alt="Course certificates" title="Course certificates" src="images/16x16/autocomplete.png"/></a>
                    <a href="<?php echo $_SESSION['s_type']; ?>
.php?ctg=lessons&course=<?php echo $this->_tpl_vars['item']['id']; ?>
&op=course_rules"><img class = "handle" alt="Course Rules" title="Course Rules" src="images/16x16/order.png"/></a>
                <?php endif; ?>
                <?php if ($_SESSION['s_type'] == 'administrator'): ?>
                    <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=courses&course=<?php echo $this->_tpl_vars['item']['id']; ?>
&op=course_info"><img class = "handle" alt="<?php echo @_COURSEINFORMATION; ?>
" title="<?php echo @_COURSEINFORMATION; ?>
" src="images/16x16/information.png"/></a>
                    <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=courses&course=<?php echo $this->_tpl_vars['item']['id']; ?>
&op=course_certificates"><img class = "handle" alt="Course certificates" title="Course certificates" src="images/16x16/autocomplete.png"/></a>
                    <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=courses&course=<?php echo $this->_tpl_vars['item']['id']; ?>
&op=course_rules"><img class = "handle" alt="Course Rules" title="Course Rules" src="images/16x16/order.png"/></a>
                    <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=courses&edit_course=<?php echo $this->_tpl_vars['item']['id']; ?>
" class = "editLink"><img class = "handle" src = "images/16x16/edit.png" title = "<?php echo @_EDIT; ?>
" alt = "<?php echo @_EDIT; ?>
" /></a>
                    <a href = "<?php echo $_SESSION['s_type']; ?>
.php?ctg=courses&delete_course=1" onclick = "return confirm('<?php echo @_AREYOUSUREYOUWANTTODELETECOURSE; ?>
')" class = "deleteLink"><img class = "handle" src = "images/16x16/error_delete.png" title = "<?php echo @_DELETE; ?>
" alt = "<?php echo @_DELETE; ?>
" /></a>
                <?php endif; ?>
                </div>
                </div>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </td></tr>
    </table>
<?php $this->_smarty_vars['capture']['t_courses_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
    <table width="100%">
   	<?php $_from = $this->_tpl_vars['T_SEARCH_RESULTS_GLOSSARY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['glossary_terms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['glossary_terms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['glossary_results']):
        $this->_foreach['glossary_terms']['iteration']++;
?>
	<tr><td>

	<?php if ($this->_tpl_vars['glossary_results']['table_name'] == 'glossary'): ?>
		<div class="searchResults">
		<div class="resultsTitle">
		<?php if ($_SESSION['s_type'] == 'professor'): ?>
			<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=glossary&lessons_ID=<?php echo $this->_tpl_vars['glossary_results']['lessons_ID']; ?>
"><img src="images/16x16/glossary.png" alt="<?php echo @_GLOSSARY; ?>
" title="<?php echo @_GLOSSARY; ?>
" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['glossary_results']['name']; ?>
</a>
		<?php else: ?>
			<img src="images/16x16/glossary.png" alt="<?php echo @_GLOSSARY; ?>
" title="<?php echo @_GLOSSARY; ?>
" border="0" align="top"/>&nbsp;<?php echo $this->_tpl_vars['glossary_results']['name']; ?>

		<?php endif; ?>
		<div class="small">(<?php echo @_GLOSSARY; ?>
:
        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=control_panel&lessons_ID=<?php echo $this->_tpl_vars['glossary_results']['lessons_ID']; ?>
"><?php echo $this->_tpl_vars['glossary_results']['lesson_name']; ?>
</a>)
		</div>
        </div>
				<?php echo $this->_tpl_vars['glossary_results']['content']; ?>


        </div>
	<?php endif; ?>
	</td></tr>
  <?php endforeach; else: ?>
        <tr><td class = "emptyCategory"><?php echo @_NORESULTSFOUNDINGLOSSARY; ?>
</td></tr>
  <?php endif; unset($_from); ?>
    </table>
<?php $this->_smarty_vars['capture']['t_glossary_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>


<?php ob_start(); ?>
<div class = "tabber">
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_COMMAND'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_COMMANDS; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSCOMMANDS,'data' => $this->_smarty_vars['capture']['t_command_search_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_CURRENT_LESSON'] ) > 0 || sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_LESSONS'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_LESSONS; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINLESSONS,'data' => $this->_smarty_vars['capture']['t_lessons_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_FORUM'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_FORUM; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINFORUM,'data' => $this->_smarty_vars['capture']['t_forum_search_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_PERSONAL_MESSAGES'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_PERSONALMESSAGES; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINPERSONALMESSAGES,'data' => $this->_smarty_vars['capture']['t_personal_messages_search_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_COURSES'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_COURSES; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINCOURSES,'data' => $this->_smarty_vars['capture']['t_courses_search_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
	<?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_FILES'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_FILES; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINFILES,'data' => $this->_smarty_vars['capture']['t_files_results_code'],'image' => '32x32/file_explorer.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_USERS'] ) > 0 && $_SESSION['s_type'] == 'administrator'): ?>
        <div class = "tabbertab" title = "<?php echo @_USERS; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINUSERS,'data' => $this->_smarty_vars['capture']['t_users_search_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_GLOSSARY'] ) > 0 && $_SESSION['s_type'] != 'administrator'): ?>
        <div class = "tabbertab" title = "<?php echo @_GLOSSARY; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINGLOSSARY,'data' => $this->_smarty_vars['capture']['t_glossary_search_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    <?php if (sizeof ( $this->_tpl_vars['T_SEARCH_RESULTS_FILESYSTEM'] ) > 0): ?>
        <div class = "tabbertab" title = "<?php echo @_FILESYSTEM; ?>
">
            <?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTSINFILESYSTEM,'data' => $this->_smarty_vars['capture']['t_filesystem_results_code'],'image' => '32x32/search.png'), $this);?>

        </div>
    <?php endif; ?>
    
</div>
<?php $this->_smarty_vars['capture']['t_search_results_code'] = ob_get_contents(); ob_end_clean(); ?>
<?php echo smarty_function_eF_template_printBlock(array('title' => @_SEARCHRESULTS,'data' => $this->_smarty_vars['capture']['t_search_results_code'],'image' => '32x32/search.png'), $this);?>