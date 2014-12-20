<?php /* Smarty version 2.6.27, created on 2014-09-16 10:22:16
         compiled from includes/calendar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'includes/calendar.tpl', 15, false),array('function', 'eF_template_printForm', 'includes/calendar.tpl', 39, false),array('function', 'eF_template_printBlock', 'includes/calendar.tpl', 46, false),array('function', 'eF_template_printCalendar', 'includes/calendar.tpl', 60, false),)), $this); ?>
<?php ob_start(); ?>
	<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'calendarTable'): ?>
<!--ajax:calendarTable-->
		<table style = "width:100%" class = "sortedTable" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "0" order="desc" id = "calendarTable" useAjax = "1" rowsPerPage = "<?php echo @G_DEFAULT_TABLE_SIZE; ?>
" url = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=calendar&view_calendar=<?php echo $this->_tpl_vars['T_VIEW_CALENDAR']; ?>
&show_interval=<?php echo $this->_tpl_vars['T_SHOW_INTERVAL']; ?>
&">
			<tr class = "topTitle">
				<td name = "timestamp" class = "topTitle"><?php echo @_DATE; ?>
</td>
				<td name = "data" 	   class = "topTitle"><?php echo @_EVENT; ?>
</td>
				<td name = "type" 	   class = "topTitle"><?php echo @_TYPE; ?>
</td>
				<td name = "users_LOGIN" class = "topTitle"><?php echo @_CREATOR; ?>
</td>
			<?php if ($this->_tpl_vars['_change_']): ?>
				<td class = "topTitle centerAlign noSort"><?php echo @_TOOLS; ?>
</td>
			<?php endif; ?>
			</tr>
		<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['calendar_events_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['calendar_events_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['event']):
        $this->_foreach['calendar_events_list']['iteration']++;
?>
			 <tr class = "<?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
 defaultRowHeight">
				<td><span style = "display:none"><?php echo $this->_tpl_vars['event']['timestamp']; ?>
</span>#filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['event']['timestamp']; ?>
#</td>
				<td><?php echo $this->_tpl_vars['event']['data']; ?>
</td>
				<td><?php if ($this->_tpl_vars['event']['type'] == 'private'): ?><?php echo @_PRIVATE; ?>
<?php elseif ($this->_tpl_vars['event']['type'] == 'global'): ?><?php echo @_GLOBAL; ?>
<?php elseif ($this->_tpl_vars['event']['type']): ?><?php echo $this->_tpl_vars['event']['name']; ?>
<?php endif; ?></td>
				<td>#filter:login-<?php echo $this->_tpl_vars['event']['users_LOGIN']; ?>
#</td>
				<td class = "centerAlign nowrap">
			<?php if (( $_SESSION['s_type'] == 'administrator' || $_SESSION['s_login'] == $this->_tpl_vars['event']['users_LOGIN'] ) && $this->_tpl_vars['_change_']): ?>
					<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=calendar&edit=<?php echo $this->_tpl_vars['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_EDITEVENT; ?>
', 2)" target = "POPUP_FRAME"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDITEVENT; ?>
" title = "<?php echo @_EDITEVENT; ?>
" class = "hande"></a>
					<img src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETEEVENT; ?>
" title = "<?php echo @_DELETEEVENT; ?>
" class = "ajaxHandle" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteEntity(this, '<?php echo $this->_tpl_vars['id']; ?>
')">
			<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; else: ?>
			<tr class = "defaultRowHeight oddRowColor"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
		<?php endif; unset($_from); ?>
		</table>
<!--/ajax:calendarTable-->
	<?php endif; ?>
<?php $this->_smarty_vars['capture']['calendar_list'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
	<tr><td class = "moduleCell">
	<?php if ($_GET['add'] || $_GET['edit']): ?>
	    <?php ob_start(); ?>
			<?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_ENTITY_FORM_ARRAY']), $this);?>


			<?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success' && ! $_POST['submit_another']): ?>
			    <script>parent.location = parent.location;</script>
			<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_add_code'] = ob_get_contents(); ob_end_clean(); ?>
		<?php if ($_GET['add']): ?><?php $this->assign('block_title', @_ADDEVENT); ?><?php else: ?><?php $this->assign('block_title', @_EDITEVENT); ?><?php endif; ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['block_title'],'data' => $this->_smarty_vars['capture']['t_add_code'],'image' => '32x32/calendar.png','help' => 'calendar'), $this);?>

		<div id = "autocomplete_calendar" class = "autocomplete"></div>
	<?php else: ?>
		<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['_change_']): ?>
			<div class = "headerTools">
				<span>
					<img src = "images/16x16/add.png" title="<?php echo @_ADDEVENT; ?>
" alt="<?php echo @_ADDEVENT; ?>
"/>
					<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=calendar&view_calendar=<?php echo $this->_tpl_vars['T_VIEW_CALENDAR']; ?>
<?php if ($this->_tpl_vars['T_SHOW_INTERVAL']): ?>&show_interval=<?php echo $this->_tpl_vars['T_SHOW_INTERVAL']; ?>
<?php endif; ?>&add=1&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_ADDEVENT; ?>
', 2)" target = "POPUP_FRAME"><?php echo @_ADDEVENT; ?>
</a>
				</span>
			</div>
			<?php endif; ?>
			<table style = "width:100%">
				<tr>
					<td style = "vertical-align:top"><?php echo smarty_function_eF_template_printCalendar(array('events' => $this->_tpl_vars['T_SORTED_CALENDAR_EVENTS'],'timestamp' => $this->_tpl_vars['T_VIEW_CALENDAR']), $this);?>
</td>
					<td style = "width:100%;vertical-align:top"><?php echo $this->_smarty_vars['capture']['calendar_list']; ?>
</td>
				</tr>
			</table>
		<?php $this->_smarty_vars['capture']['t_calendar_page_code'] = ob_get_contents(); ob_end_clean(); ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_CALENDAR,'data' => $this->_smarty_vars['capture']['t_calendar_page_code'],'image' => '32x32/calendar.png','main_options' => $this->_tpl_vars['T_CALENDAR_OPTIONS'],'help' => 'calendar'), $this);?>

	<?php endif; ?>
	</td></tr>
<?php $this->_smarty_vars['capture']['moduleCalendarPage'] = ob_get_contents(); ob_end_clean(); ?>

