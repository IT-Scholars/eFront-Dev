<?php /* Smarty version 2.6.27, created on 2014-09-16 15:03:08
         compiled from includes/statistics/system_stats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_html_select_date', 'includes/statistics/system_stats.tpl', 16, false),array('function', 'html_select_time', 'includes/statistics/system_stats.tpl', 16, false),array('function', 'cycle', 'includes/statistics/system_stats.tpl', 41, false),array('function', 'eF_template_printBlock', 'includes/statistics/system_stats.tpl', 182, false),array('modifier', 'eF_decodeIp', 'includes/statistics/system_stats.tpl', 148, false),)), $this); ?>
        <?php ob_start(); ?>
             <div class = "tabber">
                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'system_traffic' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_TRAFFIC; ?>
">
        	<table class = "statisticsTools statisticsSelectList">
				<tr>
                	<td id = "right">
                        <?php echo @_EXPORTSTATS; ?>

                        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $_SERVER['QUERY_STRING']; ?>
&excel=1">
                            <img src = "images/file_types/xls.png" title = "<?php echo @_XLSFORMAT; ?>
" alt = "<?php echo @_XLSFORMAT; ?>
" />
                        </a>
                    </td></tr>
			</table>
                    <form name = "systemperiod">
                    <table class = "statisticsSelectDate">
                        <tr><td class = "labelCell"><?php echo @_FROM; ?>
:&nbsp;</td>
                            <td class = "elementCell"><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'from_','time' => $this->_tpl_vars['T_FROM_TIMESTAMP'],'start_year' => "-5",'end_year' => "+0",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'from_','time' => $this->_tpl_vars['T_FROM_TIMESTAMP'],'display_seconds' => false), $this);?>
</td></tr>
                        <tr><td class = "labelCell"><?php echo @_TO; ?>
:&nbsp;</td>
                            <td class = "elementCell"><?php echo smarty_function_eF_template_html_select_date(array('prefix' => 'to_','time' => $this->_tpl_vars['T_TO_TIMESTAMP'],'start_year' => "-5",'end_year' => "+0",'field_order' => $this->_tpl_vars['T_DATE_FORMATGENERAL']), $this);?>
 <?php echo @_TIME; ?>
: <?php echo smarty_function_html_select_time(array('prefix' => 'to_','time' => $this->_tpl_vars['T_TO_TIMESTAMP'],'display_seconds' => false), $this);?>
</td></tr>
                        <tr><td class = "labelCell"></td>
                            <td class = "elementCell"><a href = "javascript:void(0)" onclick = "showSystemStats('day')"><?php echo @_LAST24HOURS; ?>
</a> - <a href = "javascript:void(0)" onclick = "showSystemStats('week')"><?php echo @_LASTWEEK; ?>
</a> - <a href = "javascript:void(0)" onclick = "showSystemStats('month')"><?php echo @_LASTMONTH; ?>
</a></td></tr>
                        <tr><td></td>
                        	<td class = "elementCell"><input class = "inputCheckbox" type = "checkbox" id = "showLog" <?php if (( isset ( $this->_tpl_vars['T_SYSTEM_LOG'] ) )): ?> "checked" <?php endif; ?>><?php echo @_SHOWANALYTICLOG; ?>
</td></tr>
                        <tr><td></td>
                        	<td class = "elementCell"><input class = "inputCheckbox" type = "checkbox" id = "showUsers" <?php if (( isset ( $_GET['showusers'] ) )): ?> "checked"<?php endif; ?>><?php echo @_SHOWALLUSERS; ?>
</td></tr>
                        <tr><td></td>
                        	<td class = "elementCell"><input class = "inputCheckbox" type = "checkbox" id = "showLessons" <?php if (( isset ( $_GET['showlessons'] ) )): ?> "checked"<?php endif; ?>><?php echo @_SHOWALLLESSONS; ?>
</td></tr>
                        <tr><td></td>
                            <td class = "elementCell"><input type = "button" value = "<?php echo @_SHOW; ?>
" class = "flatButton" onclick = "document.location='administrator.php?ctg=statistics&option=system&tab=system_traffic&from_year='+document.systemperiod.from_Year.value+'&from_month='+document.systemperiod.from_Month.value+'&from_day='+document.systemperiod.from_Day.value+'&from_hour='+document.systemperiod.from_Hour.value+'&from_min='+document.systemperiod.from_Minute.value+'&to_year='+document.systemperiod.to_Year.value+'&to_month='+document.systemperiod.to_Month.value+'&to_day='+document.systemperiod.to_Day.value+'&to_hour='+document.systemperiod.to_Hour.value+'&to_min='+document.systemperiod.to_Minute.value+'&showlog='+document.systemperiod.showLog.checked+'&showusers='+document.systemperiod.showUsers.checked+'&showlessons='+document.systemperiod.showLessons.checked"></td>
                        </tr>
                    </table>
                    </form>
                    <table class = "statisticsTools">
                       <tr><td id = "right">
	                            <a href = "javascript:void(0)" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_system_access');"><?php echo @_ACCESSSTATISTICS; ?>
:</a>
	                            <img class = "ajaxHandle" src = "images/16x16/reports.png" alt = "<?php echo @_ACCESSSTATISTICS; ?>
" title = "<?php echo @_ACCESSSTATISTICS; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_system_access');"/>
	                            <div id = "graph_table" style = "display:none"><div id = "proto_chart" class = "proto_graph"></div></div>
                            </td></tr>
                    </table>
                    <table class = "statisticsGeneralInfo">
                        <tr><td class = "topTitle" colspan = "2"><?php echo @_TOTALSTATISTICS; ?>
</td></tr>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'active_users','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_TOTALLOGINS; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_TOTAL_USER_ACCESSES']; ?>
</td>
                        </tr>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'active_users','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_TOTALACCESSTIME; ?>
:</td>
                            <td class = "elementCell">
                                <?php if ($this->_tpl_vars['T_TOTAL_USER_TIME']): ?>
                                	<?php if ($this->_tpl_vars['T_TOTAL_USER_TIME']['hours']): ?><?php echo $this->_tpl_vars['T_TOTAL_USER_TIME']['hours']; ?>
<?php echo @_HOURSSHORTHAND; ?>
 <?php endif; ?>
                                	<?php if ($this->_tpl_vars['T_TOTAL_USER_TIME']['minutes']): ?><?php echo $this->_tpl_vars['T_TOTAL_USER_TIME']['minutes']; ?>
<?php echo @_MINUTESSHORTHAND; ?>
 <?php endif; ?>
                                	<?php if ($this->_tpl_vars['T_TOTAL_USER_TIME']['seconds']): ?><?php echo $this->_tpl_vars['T_TOTAL_USER_TIME']['seconds']; ?>
<?php echo @_SECONDSSHORTHAND; ?>
<?php endif; ?>
                                <?php else: ?>
                                	<?php echo @_NODATAFOUND; ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'active_users','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_MAXONLINEUSERS; ?>
:</td>
                            <td class = "elementCell"><?php echo $this->_tpl_vars['T_CONFIGURATION']['max_online_users']; ?>
 (#filter:timestamp-<?php echo $this->_tpl_vars['T_CONFIGURATION']['max_online_users_timestamp']; ?>
#)</td>
                        </tr>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'active_users','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td class = "labelCell"><?php echo @_TOTALSIZE; ?>
:</td>
                            <td class = "elementCell"><?php if ($this->_tpl_vars['T_SPACE_USED']): ?><?php echo $this->_tpl_vars['T_SPACE_USED']['0']; ?>
MB (<?php echo $this->_tpl_vars['T_SPACE_USED']['1']; ?>
 <?php echo @_FILES; ?>
)<?php else: ?><input type = "button" class = "flatButton" value = "calculate" onclick = "location=location.toString()+'&calculate_space=1'"><?php endif; ?></td>
                        </tr>
                    </table>
                    <br/>
                    <table class = "statisticsTools">
                    	<tr><td><?php if ($_GET['showusers']): ?><?php echo @_USERSACTIVITY; ?>
<?php else: ?><?php echo @_MOSTACTIVEUSERS; ?>
<?php endif; ?></td>
                            <td id = "right">
									<a href = "javascript:void(0)" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_system_users_access');"><?php echo @_MOSTACTIVEUSERS; ?>
:</a>
									<img class = "ajaxHandle" src = "images/16x16/reports.png" alt = "<?php echo @_MOSTACTIVEUSERS; ?>
" title = "<?php echo @_MOSTACTIVEUSERS; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_system_users_access');"/>
                            </td></tr>
                    </table>
                    <table class = "sortedTable">
                        <tr>
                            <td style = "width:40%;" class = "topTitle"><?php echo @_USER; ?>
</td>
                            <td style = "width:30%;" class = "topTitle centerAlign"><?php echo @_ACCESSNUMBER; ?>
</td>
                            <td style = "width:30%;" class = "topTitle centerAlign"><?php echo @_TOTALACCESSTIME; ?>
</td>
                         </tr>
                        <?php $_from = $this->_tpl_vars['T_ACTIVE_USERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['active_users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['active_users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['login'] => $this->_tpl_vars['info']):
        $this->_foreach['active_users']['iteration']++;
?>
                            <tr class = "<?php echo smarty_function_cycle(array('name' => 'active_users','values' => 'oddRowColor, evenRowColor'), $this);?>
 <?php if (! $this->_tpl_vars['info']['active']): ?>deactivatedTableElement<?php endif; ?>">
                                <td><a class="editLink" href = "<?php echo $this->_tpl_vars['T_BASIC_TYPE']; ?>
.php?ctg=statistics&option=user&sel_user=<?php echo $this->_tpl_vars['login']; ?>
">#filter:login-<?php echo $this->_tpl_vars['login']; ?>
#</a></td>
                                <td class = "centerAlign"><?php echo $this->_tpl_vars['info']['accesses']; ?>
</td>
                                <td class = "centerAlign"><?php echo '<span style = "display:none">'; ?><?php echo $this->_tpl_vars['info']['seconds']; ?><?php echo '&nbsp;</span>'; ?><?php if ($this->_tpl_vars['info']['seconds']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['info']['time']['hours']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['info']['time']['hours']; ?><?php echo ''; ?><?php echo @_HOURSSHORTHAND; ?><?php echo ' '; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['info']['time']['minutes']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['info']['time']['minutes']; ?><?php echo ''; ?><?php echo @_MINUTESSHORTHAND; ?><?php echo ' '; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['info']['time']['seconds']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['info']['time']['seconds']; ?><?php echo ''; ?><?php echo @_SECONDSSHORTHAND; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo @_NOACCESSDATA; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </table>
				<?php if (isset ( $this->_tpl_vars['T_SYSTEM_LOG'] )): ?>
					<br/>
                    <table class = "statisticsTools">
                        <tr><td><?php echo @_ANALYTICLOG; ?>
</td></tr>
                    </table>
                    <table>
                		<tr>
                            <td class = "topTitle"><?php echo @_LOGIN; ?>
</td>
                            <td class = "topTitle"><?php echo @_LESSON; ?>
</td>
                            <td class = "topTitle"><?php echo @_UNIT; ?>
</td>
                            <td class = "topTitle"><?php echo @_ACTION; ?>
</td>
                            <td class = "topTitle"><?php echo @_TIME; ?>
</td>
                            <td class = "topTitle"><?php echo @_IPADDRESS; ?>
</td>
                        </tr>
                    <?php $_from = $this->_tpl_vars['T_SYSTEM_LOG']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_log_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_log_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['info']):
        $this->_foreach['lesson_log_loop']['iteration']++;
?>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'lesson_log_list','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td>#filter:login-<?php echo $this->_tpl_vars['info']['users_LOGIN']; ?>
#</td>
                            <td><?php echo $this->_tpl_vars['info']['lesson_name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['info']['content_name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['T_ACTIONS'][$this->_tpl_vars['info']['action']]; ?>
</td>
                            <td>#filter:timestamp_time-<?php echo $this->_tpl_vars['info']['timestamp']; ?>
#</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['session_ip'])) ? $this->_run_mod_handler('eF_decodeIp', true, $_tmp) : eF_decodeIp($_tmp)); ?>
</td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </table>
				<?php endif; ?>
                </div>

                <div class = "statisticsDiv tabbertab <?php if (( isset ( $_GET['tab'] ) && $_GET['tab'] == 'user_types' )): ?> tabbertabdefault<?php endif; ?>" title = "<?php echo @_USERTYPES; ?>
">
                    <table class = "statisticsTools">
                        <tr><td id = "right">
									<a href = "javascript:void(0)" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_system_user_types');"><?php echo @_USERSKIND; ?>
:</a>
									<img class = "ajaxHandle" src = "images/16x16/reports.png" alt = "<?php echo @_USERSKIND; ?>
" title = "<?php echo @_USERSKIND; ?>
" onclick = "eF_js_showDivPopup(event, '<?php echo @_ACCESSSTATISTICS; ?>
', 2, 'graph_table');showGraph($('proto_chart'), 'graph_system_user_types');"/>
                            </td></tr>
                    </table>
                    <table>
                    	<tr>
                            <td class = "topTitle"><?php echo @_USERTYPE; ?>
</td>
                            <td class = "topTitle centerAlign"><?php echo @_OVERALL; ?>
</tD>
                    	</tr>
                    <?php $_from = $this->_tpl_vars['T_USER_TYPES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user_types'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user_types']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['usertype']):
        $this->_foreach['user_types']['iteration']++;
?>
                        <tr class = "<?php echo smarty_function_cycle(array('name' => 'userkinds_info','values' => 'oddRowColor, evenRowColor'), $this);?>
">
                            <td>
                            	<?php if ($this->_tpl_vars['usertype']['user_type'] == 'administrator'): ?><?php echo @_ADMINISTRATOR; ?>

                            	<?php elseif ($this->_tpl_vars['usertype']['user_type'] == 'professor'): ?><?php echo @_PROFESSOR; ?>

                            	<?php elseif ($this->_tpl_vars['usertype']['user_type'] == 'student'): ?><?php echo @_STUDENT; ?>

                            	<?php endif; ?>
                            </td>
                            <td class = "centerAlign"><?php echo $this->_tpl_vars['usertype']['num']; ?>
</td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </table>
                </div>
            </div>
        <?php $this->_smarty_vars['capture']['display_system_statistics'] = ob_get_contents(); ob_end_clean(); ?>
        <?php echo smarty_function_eF_template_printBlock(array('title' => @_SYSTEMSTATISTICS,'data' => $this->_smarty_vars['capture']['display_system_statistics'],'image' => '32x32/reports.png','help' => 'Reports'), $this);?>
