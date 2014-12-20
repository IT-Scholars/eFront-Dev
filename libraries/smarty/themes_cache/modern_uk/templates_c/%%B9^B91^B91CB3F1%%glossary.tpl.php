<?php /* Smarty version 2.6.27, created on 2014-09-15 19:25:26
         compiled from includes/glossary.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'eF_template_isOptionVisible', 'includes/glossary.tpl', 43, false),array('modifier', 'mb_strtolower', 'includes/glossary.tpl', 90, false),array('modifier', 'htmlentities', 'includes/glossary.tpl', 99, false),array('function', 'eF_template_printBlock', 'includes/glossary.tpl', 55, false),array('function', 'counter', 'includes/glossary.tpl', 83, false),array('function', 'cycle', 'includes/glossary.tpl', 107, false),)), $this); ?>
<script>
var tabberLoadingConst = "<?php echo @_LOADINGDATA; ?>
";
</script>

<?php ob_start(); ?>
	<tr><td class = "moduleCell">
		
		<?php if ($_GET['add'] || $_GET['edit']): ?>
		<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success' && ! $_POST['submit_term_add_another']): ?>
		    <script>
		        re = /\?/;
		        !re.test(parent.location) ? parent.location = parent.location+'?message=<?php echo $this->_tpl_vars['T_MESSAGE']; ?>
&message_type=<?php echo $this->_tpl_vars['T_MESSAGE_TYPE']; ?>
' : parent.location = parent.location+'&message=<?php echo $this->_tpl_vars['T_MESSAGE']; ?>
&message_type=<?php echo $this->_tpl_vars['T_MESSAGE_TYPE']; ?>
';
		    </script>
			<?php endif; ?>
			<?php echo $this->_tpl_vars['T_ENTITY_FORM']['javascript']; ?>

			<form <?php echo $this->_tpl_vars['T_ENTITY_FORM']['attributes']; ?>
>
			    <?php echo $this->_tpl_vars['T_ENTITY_FORM']['hidden']; ?>

			    <table class = "formElements">
			        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['label']; ?>
:&nbsp;</td>
			            <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['html']; ?>
</td></tr>
			        <?php if ($this->_tpl_vars['T_ENTITY_FORM']['name']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['name']['error']; ?>
</td></tr><?php endif; ?>
							
			        <tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['info']['label']; ?>
:&nbsp;</td>
			            <td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['info']['html']; ?>
</td></tr>
			        <?php if ($this->_tpl_vars['T_ENTITY_FORM']['info']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['info']['error']; ?>
</td></tr><?php endif; ?>
			        
			        <?php if (((is_array($_tmp='shared_glossary')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			        	<tr><td class = "labelCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['label']; ?>
:&nbsp;</td>
			            	<td class = "elementCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['html']; ?>
</td></tr>
			        	<?php if ($this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['error']): ?><tr><td></td><td class = "formError"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['lessons_ID']['error']; ?>
</td></tr><?php endif; ?>
			        <?php endif; ?>
			        
			        <tr><td></td>
			        	<td class = "submitCell"><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit']['html']; ?>
 <?php if ($_GET['add']): ?><?php echo $this->_tpl_vars['T_ENTITY_FORM']['submit_term_add_another']['html']; ?>
<?php endif; ?></td></tr>
			    </table>
			</form>
			<div id = "fmInitial"><div id = "filemanager_div" style = "display:none;"><?php echo $this->_tpl_vars['T_FILE_MANAGER']; ?>
</div></div>
		<?php $this->_smarty_vars['capture']['t_glossary_add_code'] = ob_get_contents(); ob_end_clean(); ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_GLOSSARY,'data' => $this->_smarty_vars['capture']['t_glossary_add_code'],'image' => '32x32/glossary.png','help' => 'Glossary'), $this);?>

	<?php else: ?>
		<?php ob_start(); ?>
			<?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
	            <div class = "headerTools">
	                <img src = "images/16x16/add.png" title = "<?php echo @_ADDDEFINITION; ?>
" alt = "<?php echo @_ADDDEFINITION; ?>
"/>
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=glossary&add=1&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_ADDDEFINITION; ?>
', 2)" title = "<?php echo @_ADDDEFINITION; ?>
" target = "POPUP_FRAME"><?php echo @_ADDDEFINITION; ?>
</a>
	            	| <img src = "images/16x16/file_explorer.png" title = "<?php echo @_IMPORTFILE; ?>
" alt = "<?php echo @_IMPORTFILE; ?>
"/>
	                <a href = "javascript:void(0)" onclick = "$('import_block').show()" title = "<?php echo @_IMPORTFILE; ?>
"><?php echo @_IMPORTFILE; ?>
</a>
	            </div>
            	<?php ob_start(); ?>
					<?php echo $this->_tpl_vars['T_IMPORT_FORM']['javascript']; ?>

                        <form <?php echo $this->_tpl_vars['T_IMPORT_FORM']['attributes']; ?>
>
                        <?php echo $this->_tpl_vars['T_IMPORT_FORM']['hidden']; ?>

                        <table class = "formElements">
                            <tr><td class = "labelCell"><?php echo @_CSVFILE; ?>
:</td>
                            	<td class = "elementCell"><?php echo $this->_tpl_vars['T_IMPORT_FORM']['import_file']['html']; ?>
</td></tr>
						<tr><td></td>
							<td class = "infoCell"><?php echo @_FILESIZEMUSTBESMALLERTHAN; ?>
 <b><?php echo $this->_tpl_vars['T_MAX_FILE_SIZE']; ?>
</b> <?php echo @_KB; ?>
<br/><?php echo @_USEQUESTIONMARKASDELIMITER; ?>
</td></tr>
                        <tr><td></td><td class = "submitCell"><?php echo $this->_tpl_vars['T_IMPORT_FORM']['submit_import']['html']; ?>
</td>
                            </tr>
                        </table>
                        </form>
                 <?php $this->_smarty_vars['capture']['t_import_code'] = ob_get_contents(); ob_end_clean(); ?>
                 
                 <div id = "import_block" style="display:none"><?php echo $this->_smarty_vars['capture']['t_import_code']; ?>
</div>       
            <?php endif; ?>

			<?php echo smarty_function_counter(array('start' => 0,'assign' => 'count'), $this);?>


            <?php if (($this->_foreach['glossary_list']['iteration'] <= 1)): ?>
				<div class = "tabber" >
            <?php endif; ?>
            <?php $_from = $this->_tpl_vars['T_GLOSSARY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['glossary_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['glossary_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['glossary_list']['iteration']++;
?>

            	<div class = "tabbertab <?php if (mb_strtolower($_GET['tab']) == mb_strtolower($this->_tpl_vars['key'])): ?>tabbertabdefault<?php endif; ?> useAjax" id = "tabbertab<?php echo $this->_tpl_vars['count']; ?>
" title="<?php echo $this->_tpl_vars['key']; ?>
">
<!--tabberajax:tabbertab<?php echo $this->_tpl_vars['count']; ?>
-->

<?php if ($this->_tpl_vars['count'] == $_GET['tabberajax']): ?>
	<?php ob_start(); ?>
		<table class = "glossary" id = "tabbertab_table<?php echo $this->_tpl_vars['count']; ?>
">
				<?php if ($this->_tpl_vars['key'] == '0-9' || $this->_tpl_vars['key'] == 'Symbols'): ?>
					<?php $_from = $this->_tpl_vars['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['symbols_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['symbols_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['inner_key'] => $this->_tpl_vars['inner_item']):
        $this->_foreach['symbols_list']['iteration']++;
?>
                        <tr class = "defaultRowHeight">
                        	<td colspan = "3" class = "boldFont"><?php echo htmlentities($this->_tpl_vars['inner_key']); ?>
 :</td></tr>
                        <tr class = "defaultRowHeight">
                        	<td class = "topTitle" style="width:15%"><?php echo @_TERM; ?>
</td>
                        	<td class = "topTitle"><?php echo @_EXPLANATION; ?>
</td>
                        <?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
							<td class = "centerAlign topTitle"><?php echo @_OPERATIONS; ?>
</td></tr>
						<?php endif; ?>
						<?php $_from = $this->_tpl_vars['inner_item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['terms_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['terms_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['notused'] => $this->_tpl_vars['term']):
        $this->_foreach['terms_list']['iteration']++;
?>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
">
                            <td class = "boldFont"><?php echo $this->_tpl_vars['term']['name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['term']['info']; ?>
</td>
							<?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
                            <td class = "centerAlign" class = "nowrap">
                              	<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=glossary&edit=<?php echo $this->_tpl_vars['term']['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_EDITDEFINITION; ?>
', 2)" target = "POPUP_FRAME"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDITDEFINITION; ?>
" title = "<?php echo @_EDITDEFINITION; ?>
" /></a>
                              	<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteEntity(this, '<?php echo $this->_tpl_vars['term']['id']; ?>
');"/>
                            </td>
							<?php endif; ?>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
                        <tr class = "defaultRowHeight">
                        	<td class = "topTitle" style="width:15%"><?php echo @_TERM; ?>
</td>
                        	<td class = "topTitle"><?php echo @_EXPLANATION; ?>
</td>
                        <?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
							<td class = "centerAlign topTitle"><?php echo @_OPERATIONS; ?>
</td></tr>
						<?php endif; ?>
						<?php $_from = $this->_tpl_vars['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['terms_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['terms_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['notused'] => $this->_tpl_vars['term']):
        $this->_foreach['terms_list']['iteration']++;
?>
                        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
">
                            <td class = "boldFont"><?php echo $this->_tpl_vars['term']['name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['term']['info']; ?>
</td>
							<?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
                            <td class = "centerAlign" class = "nowrap">
                              	<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=glossary&edit=<?php echo $this->_tpl_vars['term']['id']; ?>
&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_EDITDEFINITION; ?>
', 2)" target = "POPUP_FRAME"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDITDEFINITION; ?>
" title = "<?php echo @_EDITDEFINITION; ?>
" /></a>
                              	<img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteEntity(this, '<?php echo $this->_tpl_vars['term']['id']; ?>
');"/>
                            </td>
							<?php endif; ?>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
					</table>
	<?php $this->_smarty_vars['capture']['t_term_code'] = ob_get_contents(); ob_end_clean(); ?>
	<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['key'],'data' => $this->_smarty_vars['capture']['t_term_code'],'image' => '32x32/glossary.png'), $this);?>


<?php endif; ?>

<!--/tabberajax:tabbertab<?php echo $this->_tpl_vars['count']; ?>
-->
            	</div>
            	<?php echo smarty_function_counter(array(), $this);?>


            <?php endforeach; else: ?>
            <table class = "glossary"><tr class = "oddRowColor defaultRowHeight"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr></table>
            <?php endif; unset($_from); ?>
		<?php $this->_smarty_vars['capture']['t_glossary_code'] = ob_get_contents(); ob_end_clean(); ?>
            	<?php if (($this->_foreach['glossary_list']['iteration'] <= 1)): ?>
	            </div>
            	<?php endif; ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => @_GLOSSARY,'data' => $this->_smarty_vars['capture']['t_glossary_code'],'image' => '32x32/glossary.png','help' => 'Glossary'), $this);?>

				<input type = "hidden" id = "reloadHidden" value = "" />
	<?php endif; ?>

	</td></tr>
<?php $this->_smarty_vars['capture']['moduleGlossary'] = ob_get_contents(); ob_end_clean(); ?>