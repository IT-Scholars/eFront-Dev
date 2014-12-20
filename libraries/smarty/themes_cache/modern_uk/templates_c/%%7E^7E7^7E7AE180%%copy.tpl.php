<?php /* Smarty version 2.6.27, created on 2014-09-21 23:32:38
         compiled from includes/copy.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', 'includes/copy.tpl', 21, false),array('modifier', 'cat', 'includes/copy.tpl', 21, false),array('modifier', 'eF_template_isOptionVisible', 'includes/copy.tpl', 33, false),)), $this); ?>
<?php ob_start(); ?>
	<tr><td class = "moduleCell">
	    <?php ob_start(); ?>
	        <table style = "width:100%">
            	<tr><td class = "labelCell"><?php echo @_COPYPROPERTIESFROM; ?>
:</td>
                    <td class = "elementCell">
                  	  <input type = "hidden" id = "copy_properties"/>
                        <input type = "text" id = "autocomplete_copy" class = "autoCompleteTextBox"/>
                        <img id = "busy_copy" src = "images/16x16/clock.png" style="display:none;" alt = "<?php echo @_LOADING; ?>
" title = "<?php echo @_LOADING; ?>
"/>
                        <div id = "autocomplete_lessons_copy" class = "autocomplete"></div>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
	            <tr><td></td>
                		<td class = "infoCell"><?php echo @_STARTTYPINGFORRELEVENTMATCHES; ?>
</td></tr>
	        </table>
			<br/>
        <?php if ($_GET['from']): ?>
        	<script>var TransferedNodes = "";</script>
	        <table class = "copyContent">
	            <tr><td style = "width:50%"><?php echo smarty_function_eF_template_printBlock(array('title' => @_DRAGAUNITTOCOPY,'data' => $this->_tpl_vars['T_SOURCE_TREE'],'image' => "32x32/content.png",'alt' => ((is_array($_tmp=((is_array($_tmp='<span class = "emptyCategory">')) ? $this->_run_mod_handler('cat', true, $_tmp, @_NOCONTENTFOUND) : smarty_modifier_cat($_tmp, @_NOCONTENTFOUND)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</span>') : smarty_modifier_cat($_tmp, '</span>'))), $this);?>
</td>
	            	<td style = "width:50%"><?php echo smarty_function_eF_template_printBlock(array('title' => @_DROPAUNITTOCOPY,'data' => $this->_tpl_vars['T_CONTENT_TREE'],'image' => "32x32/content.png",'alt' => ((is_array($_tmp=((is_array($_tmp='<span class = "emptyCategory">')) ? $this->_run_mod_handler('cat', true, $_tmp, @_NOCONTENTFOUND) : smarty_modifier_cat($_tmp, @_NOCONTENTFOUND)))) ? $this->_run_mod_handler('cat', true, $_tmp, '</span>') : smarty_modifier_cat($_tmp, '</span>'))), $this);?>
</td></tr>
	            <tr><td></td>
	            	<td>
	            		<input id = "save_button" class = "flatButton" type = "button" onclick = "this.disabled=true;saveTree(this)" value = "<?php echo @_COPY; ?>
" />
	            		<input id = "save_button" class = "flatButton" type = "button" onclick = "this.disabled=true;saveTree(this, 'link')" value = "<?php echo @_LINK; ?>
" />
	            	</td></tr>
	        </table>	        

	        <fieldset class = "fieldsetSeparator">
            	<legend><?php echo @_COPYOTHERENTITIES; ?>
</legend>
				<table>
                <?php if (((is_array($_tmp='glossary')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
					<tr><td class = "labelCell"><?php echo @_COPYGLOSSARY; ?>
:&nbsp;</td>
						<td class = "elementCell"><input type = "submit" class = "flatButton" value = "<?php echo @_COPY; ?>
" onclick = "copyLessonEntity(this, 'glossary')"></td></tr>
                <?php endif; ?>
<?php if (( @G_VERSIONTYPE != 'community' )): ?>                 <?php if (((is_array($_tmp='surveys')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
					<tr><td class = "labelCell"><?php echo @_COPYSURVEYS; ?>
:&nbsp;</td>
						<td class = "elementCell"><input type = "submit" class = "flatButton" value = "<?php echo @_COPY; ?>
" onclick = "copyLessonEntity(this, 'surveys')"></td></tr>
                <?php endif; ?>
<?php endif; ?> 					
					<tr><td class = "labelCell"><?php echo @_COPYQUESTIONS; ?>
:&nbsp;</td>
						<td class = "elementCell"><input type = "submit" class = "flatButton" value = "<?php echo @_COPY; ?>
" onclick = "copyLessonEntity(this, 'questions')"></td></tr>
				</table>
			</fieldset>
            
		<?php endif; ?>
        <?php $this->_smarty_vars['capture']['t_copy_content_code'] = ob_get_contents(); ob_end_clean(); ?>
        <?php echo smarty_function_eF_template_printBlock(array('title' => @_COPYFROMANOTHERLESSON,'data' => $this->_smarty_vars['capture']['t_copy_content_code'],'image' => '32x32/lesson_copy.png','help' => 'Copy_from_another_lesson'), $this);?>

	</td></tr>
<?php $this->_smarty_vars['capture']['moduleCopyContent'] = ob_get_contents(); ob_end_clean(); ?>
                                