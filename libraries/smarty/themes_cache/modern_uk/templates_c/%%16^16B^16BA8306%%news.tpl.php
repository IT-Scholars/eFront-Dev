<?php /* Smarty version 2.6.27, created on 2014-09-22 19:21:38
         compiled from includes/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printForm', 'includes/news.tpl', 5, false),array('function', 'eF_template_printBlock', 'includes/news.tpl', 11, false),array('function', 'cycle', 'includes/news.tpl', 37, false),)), $this); ?>
<?php ob_start(); ?>
	<tr><td class = "moduleCell">
	<?php if (! $this->_tpl_vars['_student_'] && ( $_GET['add'] || $_GET['edit'] )): ?>
	    <?php ob_start(); ?>
			<?php echo smarty_function_eF_template_printForm(array('form' => $this->_tpl_vars['T_ENTITY_FORM_ARRAY']), $this);?>

		<?php if ($this->_tpl_vars['T_MESSAGE_TYPE'] == 'success'): ?>
	    <script>parent.location = parent.location;</script>
		<?php endif; ?>
		<?php $this->_smarty_vars['capture']['t_add_code'] = ob_get_contents(); ob_end_clean(); ?>

		<?php echo smarty_function_eF_template_printBlock(array('title' => @_ANNOUNCEMENT,'data' => $this->_smarty_vars['capture']['t_add_code'],'image' => '32x32/announcements.png','help' => 'Announcements'), $this);?>

	<?php elseif ($_GET['view']): ?>
		<?php if ($this->_tpl_vars['T_NEWS']['data'] == ""): ?>
			<?php $this->assign('news_data', @_NODATAFOUND); ?>
		<?php else: ?>
			<?php $this->assign('news_data', $this->_tpl_vars['T_NEWS']['data']); ?>
		<?php endif; ?>
		<?php echo smarty_function_eF_template_printBlock(array('title' => $this->_tpl_vars['T_NEWS']['title'],'data' => $this->_tpl_vars['news_data'],'image' => '32x32/announcements.png','help' => 'Announcements'), $this);?>

	<?php else: ?>
	    <?php ob_start(); ?>
	        <?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
	            <div class = "headerTools">
	                <img src = "images/16x16/add.png" title = "<?php echo @_ANNOUNCEMENTADD; ?>
" alt = "<?php echo @_ANNOUNCEMENTADD; ?>
"/>
	                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=news&add=1&popup=1" onclick = "eF_js_showDivPopup(event, '<?php echo @_ANNOUNCEMENTADD; ?>
', 2)" title = "<?php echo @_ANNOUNCEMENTADD; ?>
" target = "POPUP_FRAME"><?php echo @_ANNOUNCEMENTADD; ?>
</a>
	            </div>
	        <?php endif; ?>
		    <table class = "sortedTable" width = "100%">
		        <tr class = "defaultRowHeight">
		            <td class = "topTitle"><?php echo @_TITLE; ?>
</td>
		            <td class = "topTitle"><?php echo @_BODY; ?>
</td>
		            <td class = "topTitle"><?php echo @_DATE; ?>
</td>
		            <td class = "topTitle"><?php echo @_USERCAPITAL; ?>
</td>
		    <?php if (! $this->_tpl_vars['_student_'] && $this->_tpl_vars['_change_']): ?>
		            <td class = "topTitle centerAlign noSort"><?php echo @_FUNCTIONS; ?>
</td></tr>
		    <?php endif; ?>
		    <?php $_from = $this->_tpl_vars['T_NEWS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['news_list']['iteration']++;
?>
		        <tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor,evenRowColor"), $this);?>
">
		            <td><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
		            <td><?php echo $this->_tpl_vars['item']['data']; ?>
</td>
		            <td><span style = "display:none"><?php echo $this->_tpl_vars['item']['timestamp']; ?>
</span>#filter:timestamp_time-<?php echo $this->_tpl_vars['item']['timestamp']; ?>
#</td>
		            <td>#filter:user_login-<?php echo $this->_tpl_vars['item']['users_LOGIN']; ?>
#</td>
		        <?php if ($_SESSION['s_type'] != 'student' && $this->_tpl_vars['_change_']): ?>
		            <td class = "centerAlign">
		            	<?php if ($this->_tpl_vars['T_CURRENT_USER']->user['login'] == $this->_tpl_vars['item']['users_LOGIN'] || $this->_tpl_vars['T_CURRENT_USER']->user['user_type'] == 'administrator'): ?>
			                <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=news&edit=<?php echo $this->_tpl_vars['item']['id']; ?>
&popup=1" target = "POPUP_FRAME" onClick = "eF_js_showDivPopup(event, '<?php echo @_EDITANNOUNCEMENT; ?>
', 2);"><img src = "images/16x16/edit.png" alt = "<?php echo @_EDIT; ?>
" title = "<?php echo @_EDIT; ?>
" border = "0"/></a>&nbsp;
		    	            <img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "if (confirm('<?php echo @_IRREVERSIBLEACTIONAREYOUSURE; ?>
')) deleteEntity(this, '<?php echo $this->_tpl_vars['item']['id']; ?>
');"/>
		                <?php endif; ?>
		            </td>
		        <?php endif; ?>
		            </tr>
		    <?php endforeach; else: ?>
		        <tr class = "defaultRowHeight oddRowColor"><td colspan = "100%" class = "emptyCategory"><?php echo @_NODATAFOUND; ?>
</td></tr>
		    <?php endif; unset($_from); ?>
		    </table>
	    <?php $this->_smarty_vars['capture']['t_news_code'] = ob_get_contents(); ob_end_clean(); ?>

	    <?php echo smarty_function_eF_template_printBlock(array('title' => @_ANNOUNCEMENTS,'data' => $this->_smarty_vars['capture']['t_news_code'],'image' => '32x32/announcements.png','help' => 'Announcements'), $this);?>

	<?php endif; ?>
	</td></tr>
<?php $this->_smarty_vars['capture']['moduleNewsPage'] = ob_get_contents(); ob_end_clean(); ?>