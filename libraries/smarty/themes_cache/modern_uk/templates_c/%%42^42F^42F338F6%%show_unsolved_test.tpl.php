<?php /* Smarty version 2.6.27, created on 2014-09-22 12:16:32
         compiled from includes/tests/show_unsolved_test.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sizeof', 'includes/tests/show_unsolved_test.tpl', 77, false),)), $this); ?>
<?php if ($this->_tpl_vars['T_SHOW_CONFIRMATION']): ?>
            <?php $this->assign('t_show_side_menu', true); ?>
            	<?php if ($this->_tpl_vars['T_TEST_STATUS']['status'] == 'incomplete' && $this->_tpl_vars['T_TEST_DATA']->time['pause']): ?>
            		<?php $this->assign('resume_test', '1'); ?>	            	<?php endif; ?>
                <table class = "testHeader">
                    <tr><td id = "testName"><?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
</td></tr>
                    <tr><td id = "testDescription"><?php echo $this->_tpl_vars['T_TEST_DATA']->test['description']; ?>
</td></tr>
                    <tr><td>
                            <table class = "testInfo">
                                <tr>
								<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>
									<td rowspan = "7" id = "testInfoImage"><img src = "images/32x32/tests.png" alt = "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
" title = "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
"/></td>
                                <?php else: ?>
									<td rowspan = "2" id = "testInfoImage"><img src = "images/32x32/feedback.png" alt = "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
" title = "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
"/></td>
								<?php endif; ?>
									<td id = "testInfoLabels"></td>
                                    <td></td></tr>
							<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>
                                <tr><td><?php echo @_TESTDURATION; ?>
:&nbsp;</td>
                                    <td>
                                    <?php if ($this->_tpl_vars['T_TEST_DATA']->options['duration']): ?>
                                        <?php if ($this->_tpl_vars['T_TEST_DATA']->convertedDuration['hours']): ?><?php echo $this->_tpl_vars['T_TEST_DATA']->convertedDuration['hours']; ?>
     <?php echo @_HOURS; ?>
&nbsp;<?php endif; ?>
                                        <?php if ($this->_tpl_vars['T_TEST_DATA']->convertedDuration['minutes']): ?><?php echo $this->_tpl_vars['T_TEST_DATA']->convertedDuration['minutes']; ?>
 <?php echo @_MINUTES; ?>
&nbsp;<?php endif; ?>
                                        <?php if ($this->_tpl_vars['T_TEST_DATA']->convertedDuration['seconds']): ?><?php echo $this->_tpl_vars['T_TEST_DATA']->convertedDuration['seconds']; ?>
 <?php echo @_SECONDS; ?>
<?php endif; ?>
                                    <?php else: ?>
                                        <?php echo @_UNLIMITED; ?>

                                    <?php endif; ?>
                                    </td></tr>
							<?php endif; ?>
                                <tr><td><?php echo @_NUMOFQUESTIONS; ?>
:&nbsp;</td>
                                    <td>
							<?php if ($this->_tpl_vars['T_TEST_DATA']->options['user_configurable'] && ! $this->_tpl_vars['resume_test']): ?>
										<input type = "text" id = "user_configurable" value = "" size = "3"> (<?php echo @_MAXIMUM; ?>
 <?php echo $this->_tpl_vars['T_TEST_QUESTIONS_NUM']; ?>
)
							<?php else: ?>
								<?php echo $this->_tpl_vars['T_TEST_QUESTIONS_NUM']; ?>

							<?php endif; ?>
									</td></tr>
							<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>
									<tr><td><?php echo @_QUESTIONSARESHOWN; ?>
:&nbsp;</td>
										<td><?php if ($this->_tpl_vars['T_TEST_DATA']->options['onebyone']): ?><?php echo @_ONEBYONEQUESTIONS; ?>
<?php else: ?><?php echo @_ALLTOGETHER; ?>
<?php endif; ?></td></tr>
								<?php if ($this->_tpl_vars['T_TEST_STATUS']['status'] == 'incomplete' && $this->_tpl_vars['T_TEST_DATA']->time['pause']): ?>
									<tr><td><?php echo @_YOUPAUSEDTHISTESTON; ?>
:&nbsp;</td>
										<td>#filter:timestamp_time-<?php echo $this->_tpl_vars['T_TEST_DATA']->time['pause']; ?>
#</td></tr>
								<?php else: ?>
									<tr><td><?php echo @_DONETIMESSOFAR; ?>
:&nbsp;</td>
										<td><?php if ($this->_tpl_vars['T_TEST_STATUS']['timesDone']): ?><?php echo $this->_tpl_vars['T_TEST_STATUS']['timesDone']; ?>
<?php else: ?>0<?php endif; ?>&nbsp;<?php echo @_TIMES; ?>
</td></tr>
									<tr><td><?php if ($this->_tpl_vars['T_TEST_STATUS']['timesLeft'] !== false): ?><?php echo @_YOUCANDOTHETEST; ?>
:&nbsp;</td>
										<td><?php if ($this->_tpl_vars['T_TEST_STATUS']['timesLeft'] > 0): ?> <?php echo $this->_tpl_vars['T_TEST_STATUS']['timesLeft']; ?>
<?php elseif ($this->_tpl_vars['T_TEST_STATUS']['timesLeft'] < 0): ?>1<?php else: ?>0<?php endif; ?>&nbsp;<?php echo @_TIMESMORE; ?>
<?php endif; ?></td></tr>
									<tr><td><?php if ($this->_tpl_vars['T_TEST_DATA']->options['test_password']): ?><?php echo @_TESTPASSWORD; ?>
:&nbsp;</td>
										<td><input type = "text" id = "test_password" name = "test_password"/></td><?php else: ?><td>&nbsp;</td><?php endif; ?></tr>
								<?php endif; ?>
							<?php endif; ?>
                            </table>
                        </td>
                    <tr><td id = "testProceed">
                    <?php if ($this->_tpl_vars['resume_test']): ?>
                        <input class = "flatButton" type = "button" name = "submit_sure" value = "<?php echo @_RESUMETEST; ?>
&nbsp;&raquo;" onclick = "window.location=window.location.toString()+'&resume=1'" />
                    <?php else: ?>
						<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>
							<?php $this->assign('buttonValue', @_PROCEEDTOTEST); ?>
						<?php else: ?>
							<?php $this->assign('buttonValue', @_PROCEEDTOFEEDBACK); ?>
						<?php endif; ?>
                        <input class = "flatButton" type = "button" name = "submit_sure" value = "<?php echo $this->_tpl_vars['buttonValue']; ?>
&nbsp;&raquo;" onclick = "window.location=window.location.toString()+'&confirm=1'+($('test_password') ? '&test_password='+encodeURIComponent($('test_password').value) : '')+($('user_configurable') && parseInt($('user_configurable').value) ? '&user_configurable='+$('user_configurable').value : '')" />
                    <?php endif; ?>
                    </td></tr>
                </table>
<?php elseif ($_GET['test_analysis']): ?>
            <?php $this->assign('title', ($this->_tpl_vars['title'])."&nbsp;&raquo;&nbsp;<a class = 'titleLink' href = '".($_SERVER['PHP_SELF'])."?ctg=content&view_unit=".($_GET['view_unit'])."&test_analysis=1'>".(@_TESTANALYSISFORTEST)." &quot;".($this->_tpl_vars['T_TEST_DATA']->test['name'])."&quot;</a>"); ?>

                <div class = "headerTools">
                    <span>
                        <img src = "images/16x16/arrow_left.png" alt = "<?php echo @_VIEWSOLVEDTEST; ?>
" title = "<?php echo @_VIEWSOLVEDTEST; ?>
">
                        <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=content&view_unit=<?php echo $_GET['view_unit']; ?>
"><?php echo @_VIEWSOLVEDTEST; ?>
</a>
                    </span>
                    <?php if (sizeof($this->_tpl_vars['T_TEST_STATUS']['testIds']) > 1): ?>
                    <span>
                        <img src = "images/16x16/go_into.png" alt = "<?php echo @_JUMPTOEXECUTION; ?>
" title = "<?php echo @_JUMPTOEXECUTION; ?>
">
                        &nbsp;<?php echo @_JUMPTOEXECUTION; ?>

                        <select onchange = "location.toString().match(/show_solved_test/) ? location = location.toString().replace(/show_solved_test=\d+/, 'show_solved_test='+this.options[this.selectedIndex].value) : location = location + '&show_solved_test='+this.options[this.selectedIndex].value">
                            <?php if ($_GET['show_solved_test']): ?><?php $this->assign('selected_test', $_GET['show_solved_test']); ?><?php else: ?><?php $this->assign('selected_test', $this->_tpl_vars['T_TEST_STATUS']['lastTest']); ?><?php endif; ?>
                            <?php $_from = $this->_tpl_vars['T_TEST_STATUS']['testIds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['test_analysis_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['test_analysis_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['test_analysis_list']['iteration']++;
?>
                                <option value = "<?php echo $this->_tpl_vars['item']; ?>
" <?php if ($this->_tpl_vars['selected_test'] == $this->_tpl_vars['item']): ?>selected<?php endif; ?>>#<?php echo $this->_foreach['test_analysis_list']['iteration']; ?>
 - #filter:timestamp_time-<?php echo $this->_tpl_vars['T_TEST_STATUS']['timestamps'][$this->_tpl_vars['key']]; ?>
#</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </span>
                    <?php endif; ?>
                </div>
                <table class = "test_analysis">
                    <tr><td><?php echo $this->_tpl_vars['T_CONTENT_ANALYSIS']; ?>
</td></tr>
                    <tr><td>
                    	<div id = "graph_table"><div id = "proto_chart" class = "proto_graph"></div></div>
                    	<script>var show_test_graph = true;</script>
                    </td></tr>
                </table>
<?php else: ?>				
        <?php if ($this->_tpl_vars['T_TEST_STATUS']['status'] == '' || $this->_tpl_vars['T_TEST_STATUS']['status'] == 'incomplete'): ?>
            <?php ob_start(); ?>
            <table class = "formElements" style = "width:100%">
                <tr><td colspan = "2">&nbsp;</td></tr>
                <?php if ($this->_tpl_vars['T_TEST_DATA']->options['onebyone']): ?>
                	<tr><td colspan = "2">&nbsp;</td></tr>
                	<tr><td colspan = "2">&nbsp;</td></tr>
                 	<tr><td colspan = "2">&nbsp;</td></tr>
                  	<tr><td colspan = "2">&nbsp;</td></tr>
                   	<tr><td colspan = "2">&nbsp;</td></tr>
                    <tr><td colspan = "2">&nbsp;</td></tr>
                <?php endif; ?>
                <tr><td colspan = "2" class = "submitCell" style = "text-align:center"><?php echo $this->_tpl_vars['T_TEST_FORM']['submit_test']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['T_TEST_FORM']['pause_test']['html']; ?>
</td></tr>
            </table>
            <?php $this->_smarty_vars['capture']['test_footer'] = ob_get_contents(); ob_end_clean(); ?>
        <?php endif; ?>
        <?php if (! $this->_tpl_vars['T_NO_TEST']): ?>
       
			<?php if (! $this->_tpl_vars['T_TEST_DATA']->options['redirect'] || ( $this->_tpl_vars['T_TEST_STATUS']['status'] != 'completed' && $this->_tpl_vars['T_TEST_STATUS']['status'] != 'failed' && $this->_tpl_vars['T_TEST_STATUS']['status'] != 'passed' )): ?>
			<?php echo $this->_tpl_vars['T_TEST_FORM']['javascript']; ?>

				<form <?php echo $this->_tpl_vars['T_TEST_FORM']['attributes']; ?>
>
					<?php echo $this->_tpl_vars['T_TEST_FORM']['hidden']; ?>

					<?php echo $this->_tpl_vars['T_TEST']; ?>

					<?php echo $this->_smarty_vars['capture']['test_footer']; ?>

				</form>
			<?php else: ?>
				<table class = "doneTestInfo">
                    <tr><td>
						<?php if ($this->_tpl_vars['T_UNIT']['ctg_type'] != 'feedback'): ?>

							<?php if ($this->_tpl_vars['T_TEST_DATA']->options['redirect']): ?>
								<div class = "mediumHeader"><?php echo @_THANKYOUFORCOMPLETING; ?>
 "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
"</div>
							<?php endif; ?>
							<?php echo @_THETESTISDONE; ?>
 <?php echo $this->_tpl_vars['T_TEST_STATUS']['timesDone']; ?>
 <?php echo @_TIMES; ?>

							<?php if ($this->_tpl_vars['T_TEST_DATA']->options['redoable']): ?>
								<?php echo @_ANDCANBEDONE; ?>

								<?php if ($this->_tpl_vars['T_TEST_STATUS']['timesLeft'] > 0): ?> <?php echo $this->_tpl_vars['T_TEST_STATUS']['timesLeft']; ?>
<?php else: ?>0<?php endif; ?>
								<?php echo @_TIMESMORE; ?>

							<?php endif; ?>
									
						<?php else: ?>
							<div class = "mediumHeader"><?php echo @_THANKYOUFORCOMPLETING; ?>
 "<?php echo $this->_tpl_vars['T_TEST_DATA']->test['name']; ?>
"</div>
						<?php endif; ?>
					</td></tr>
					 <tr><td>
						<div class = "headerTools">
							<?php if ($this->_tpl_vars['T_TEST_STATUS']['lastTest'] && ( $this->_tpl_vars['T_TEST_STATUS']['timesLeft'] > 0 || $this->_tpl_vars['T_TEST_STATUS']['timesLeft'] === false )): ?>
								<span id = "redoLink">
										<img src = "images/16x16/undo.png" alt = "<?php echo @_USERREDOTEST; ?>
" title = "<?php echo @_USERREDOTEST; ?>
" border = "0" style = "vertical-align:middle">
										<a href = "javascript:void(0)" id="redoLinkHref" onclick = "redoTest(this)" style = "vertical-align:middle"><?php echo @_USERREDOTEST; ?>
</a></span>


							<?php endif; ?>

							<?php if (@G_VERSIONTYPE != 'community'): ?>									<?php if ($this->_tpl_vars['T_TEST_STATUS']['lastTest'] && ( $this->_tpl_vars['T_TEST_STATUS']['timesLeft'] > 0 || $this->_tpl_vars['T_TEST_STATUS']['timesLeft'] === false ) && $this->_tpl_vars['T_TEST_STATUS']['completedTest']['score'] != 100 && $this->_tpl_vars['T_TEST_DATA']->options['redo_wrong'] == 1): ?>
									<span id = "redoWrongLink">
											<img src = "images/16x16/undo.png" alt = "<?php echo @_USERREDOWRONG; ?>
" title = "<?php echo @_USERREDOWRONG; ?>
" border = "0" style = "vertical-align:middle">
											<a href = "javascript:void(0)" id="redoWrongLinkHref" onclick = "redoWrongTest(this)" style = "vertical-align:middle"><?php echo @_USERREDOWRONG; ?>
</a></span>

								<?php endif; ?>
							<?php endif; ?> 						</div>
					</table>

				<div style = "display:none">
					<?php echo $this->_tpl_vars['T_TEST_FORM']['javascript']; ?>

					<form <?php echo $this->_tpl_vars['T_TEST_FORM']['attributes']; ?>
>
						<?php echo $this->_tpl_vars['T_TEST_FORM']['hidden']; ?>

						<?php echo $this->_tpl_vars['T_TEST']; ?>

						<?php echo $this->_smarty_vars['capture']['test_footer']; ?>

					</form>
				</div>
			<?php endif; ?>
        <?php endif; ?>
<?php endif; ?>