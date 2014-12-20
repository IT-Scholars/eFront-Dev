<?php /* Smarty version 2.6.27, created on 2014-09-23 00:11:19
         compiled from includes/statistics/stats_filters.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'includes/statistics/stats_filters.tpl', 20, false),array('modifier', 'in_array', 'includes/statistics/stats_filters.tpl', 24, false),)), $this); ?>
	<?php if ($_GET['from_year']): ?>
		<?php $this->assign('dates_url', "&from_year=".($_GET['from_year'])."&from_month=".($_GET['from_month'])."&from_day=".($_GET['from_day'])."&from_hour=".($_GET['from_hour'])."&from_min=".($_GET['from_min'])); ?>
		<?php $this->assign('dates_url', ($this->_tpl_vars['dates_url'])."&to_year=".($_GET['to_year'])."&to_month=".($_GET['to_month'])."&to_day=".($_GET['to_day'])."&to_hour=".($_GET['to_hour'])."&to_min=".($_GET['to_min'])); ?>
	<?php endif; ?>	
	<td class = "filter"><?php echo @_FILTERS; ?>
:
        <select style = "vertical-align:middle" id = "user_filter"  name = "user_filter">
                <option value = "1"<?php if (! $_GET['user_filter'] || $_GET['user_filter'] == 1): ?>selected<?php endif; ?>><?php echo @_ACTIVEUSERS; ?>
</option>
                <option value = "2"<?php if ($_GET['user_filter'] == 2): ?>selected<?php endif; ?>><?php echo @_INACTIVEUSERS; ?>
</option>
                <option value = "3"<?php if ($_GET['user_filter'] == 3): ?>selected<?php endif; ?>><?php echo @_ALLUSERS; ?>
</option>
        </select>
    </td><td class = "filter">
        <select style = "vertical-align:middle" id = "group_filter" name = "group_filter" >
                <option value = "-1" class = "inactiveElement" <?php if (! $_GET['group_filter']): ?>selected<?php endif; ?>><?php echo @_SELECTGROUP; ?>
</option>
            <?php $_from = $this->_tpl_vars['T_GROUPS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['group_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['group']):
        $this->_foreach['group_options']['iteration']++;
?>
                <option value = "<?php echo $this->_tpl_vars['group']['id']; ?>
" <?php if ($_GET['group_filter'] == $this->_tpl_vars['group']['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['group']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </td>
 <?php if (@G_VERSIONTYPE == 'enterprise'): ?>  <?php $this->assign('branch_array', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $_GET['branch_filter']) : explode($_tmp, $_GET['branch_filter']))); ?> 
 	<td class = "filter">
        <select  multiple = "multiple" SIZE = "5" class = "inputText" style = "vertical-align:middle" id = "group_branch" name = "group_branch" >
            <?php $_from = $this->_tpl_vars['T_BRANCHES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['branch_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['branch_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['branch']):
        $this->_foreach['branch_options']['iteration']++;
?>
                <option value = "<?php echo $this->_tpl_vars['id']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['branch_array']) : in_array($_tmp, $this->_tpl_vars['branch_array']))): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['branch']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
  <?php $this->assign('job_array', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $_GET['job_filter']) : explode($_tmp, $_GET['job_filter']))); ?>        
        <select  multiple = "multiple" SIZE = "5" class = "inputText" style = "vertical-align:middle" id = "group_job" name = "group_job" >
            <?php $_from = $this->_tpl_vars['T_JOB_DES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['job_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['job_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['job']):
        $this->_foreach['job_options']['iteration']++;
?>
                <option value = "<?php echo $this->_tpl_vars['id']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['job_array']) : in_array($_tmp, $this->_tpl_vars['job_array']))): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['job']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        
        <input type = "checkbox" style = "vertical-align:middle" id = "includes_subbranches" name = "includes_subbranches" <?php if ($_GET['subbranches']): ?>checked<?php endif; ?> /><span style = "vertical-align:middle" ><?php echo @_SUBBRANCHES; ?>
</span>
    </td>
     <td>
<?php if (@G_VERSIONTYPE == 'enterprise'): ?>      
 	<input class = "flatButton" type = "button" value="<?php echo @_SUBMIT; ?>
" onclick = "document.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=<?php echo $_GET['option']; ?>
<?php if (( isset ( $_GET['tab'] ) )): ?>&tab=<?php echo $_GET['tab']; ?>
<?php endif; ?>&sel_<?php echo $_GET['option']; ?>
=<?php echo $this->_tpl_vars['T_STATS_ENTITY_ID']; ?>
&branch_filter='+appendSelection('group_branch')+'&group_filter='+$('group_filter').options[$('group_filter').selectedIndex].value+'&job_filter='+appendSelection('group_job')+'&subbranches='+($('includes_subbranches').checked ? 1:0) +'&user_filter='+$('user_filter').options[$('user_filter').selectedIndex].value+'<?php echo $this->_tpl_vars['dates_url']; ?>
';">
<?php else: ?> 	<input class = "flatButton" type = "button" value="<?php echo @_SUBMIT; ?>
" onclick = "document.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=<?php echo $_GET['option']; ?>
<?php if (( isset ( $_GET['tab'] ) )): ?>&tab=<?php echo $_GET['tab']; ?>
<?php endif; ?>&sel_<?php echo $_GET['option']; ?>
=<?php echo $this->_tpl_vars['T_STATS_ENTITY_ID']; ?>
&group_filter='+$('group_filter').options[$('group_filter').selectedIndex].value+'&user_filter='+$('user_filter').options[$('user_filter').selectedIndex].value+'<?php echo $this->_tpl_vars['dates_url']; ?>
';">
<?php endif; ?>  	
 </td>
 <?php else: ?>   
    <td>
 		<input class = "flatButton" type = "button" value="<?php echo @_SUBMIT; ?>
" onclick = "document.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=statistics&option=<?php echo $_GET['option']; ?>
<?php if (( isset ( $_GET['tab'] ) )): ?>&tab=<?php echo $_GET['tab']; ?>
<?php endif; ?>&sel_<?php echo $_GET['option']; ?>
=<?php echo $this->_tpl_vars['T_STATS_ENTITY_ID']; ?>
&group_filter='+$('group_filter').options[$('group_filter').selectedIndex].value+'&user_filter='+$('user_filter').options[$('user_filter').selectedIndex].value+'<?php echo $this->_tpl_vars['dates_url']; ?>
';">
 	</td>
 <?php endif; ?> 