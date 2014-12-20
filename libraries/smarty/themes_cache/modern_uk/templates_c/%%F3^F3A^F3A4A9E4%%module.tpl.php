<?php /* Smarty version 2.6.27, created on 2014-10-19 23:00:34
         compiled from /var/www/efront/www/modules/module_security/module.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sizeof', '/var/www/efront/www/modules/module_security/module.tpl', 43, false),array('modifier', 'replace', '/var/www/efront/www/modules/module_security/module.tpl', 44, false),array('modifier', 'base64_encode', '/var/www/efront/www/modules/module_security/module.tpl', 55, false),array('modifier', 'cat', '/var/www/efront/www/modules/module_security/module.tpl', 126, false),array('function', 'eF_template_printBlock', '/var/www/efront/www/modules/module_security/module.tpl', 126, false),)), $this); ?>
<?php ob_start(); ?>

<?php if ($_GET['type'] == 'install'): ?>
	<h1><?php echo @_MODULE_SECURITY_INSTALLATIONFOLDERSTILLEXISTS; ?>
</h1>
	<br/>
	<h3><?php echo @_MODULE_SECURITY_WHATSTHERISK; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_INSTALLATIONRISKEXPLANATION; ?>
</p>
	
	<h3><?php echo @_MODULE_SECURITY_WHATCANIDO; ?>
</h3>
    <?php echo $this->_tpl_vars['T_SECURITY_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_SECURITY_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['hidden']; ?>

    	<?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_ignore']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_delete_install']['html']; ?>

    </form> 	
<?php elseif ($_GET['type'] == 'magic_quotes_gpc'): ?>
	<h1><?php echo @_MODULE_SECURITY_MAGICQUOTESGPCISON; ?>
</h1>
	<br/>
	<h3><?php echo @_MODULE_SECURITY_WHATSTHERISK; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_MAGICQUOTESEXPLANATION; ?>
</p>
	
	<h3><?php echo @_MODULE_SECURITY_WHATCANIDO; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_MAGICQUOTESSOLUTIONEXPLANATION; ?>
</p>	
    <?php echo $this->_tpl_vars['T_SECURITY_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_SECURITY_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['hidden']; ?>

    	<?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_ignore']['html']; ?>

    </form> 	
<?php elseif ($_GET['type'] == 'default_accounts'): ?>
	<h1><?php echo @_MODULE_SECURITY_DEFAULTACCOUNTSSTILLEXIST; ?>
</h1>
	<br/>
	<h3><?php echo @_MODULE_SECURITY_WHATSTHERISK; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_DEFAULTACCOUNTSEXPLANATION; ?>
</p>
	
	<h3><?php echo @_MODULE_SECURITY_WHATCANIDO; ?>
</h3>
    <?php echo $this->_tpl_vars['T_SECURITY_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_SECURITY_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['hidden']; ?>

    	<?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_ignore']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_deactivate']['html']; ?>

    </form> 	
<?php elseif ($_GET['type'] == 'changed_files'): ?>
	<?php $this->assign('t_size', sizeof($this->_tpl_vars['T_CHANGED_FILES'])); ?>
	<h1><?php echo ((is_array($_tmp=@_MODULE_SECURITY_SOMEFILESHAVECHANGEDSINCELASTTIME)) ? $this->_run_mod_handler('replace', true, $_tmp, '%x', $this->_tpl_vars['t_size']) : smarty_modifier_replace($_tmp, '%x', $this->_tpl_vars['t_size'])); ?>
</h1>
	<br/>
	<h3><?php echo @_MODULE_SECURITY_WHATSTHERISK; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_CHANGEDFILESEXPLANATION; ?>
</p>
	<h3><?php echo @_MODULE_SECURITY_WHATCANIDO; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_CHANGEDFILESSOLUTIONEXPLANATIONPART1; ?>
 <a href = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&download_ignore_list=1" style = "font-weight:bold"><?php echo @_MODULE_SECURITY_IGNORELIST; ?>
</a> <?php echo @_MODULE_SECURITY_CHANGEDFILESSOLUTIONEXPLANATIONPART2; ?>
 efront_<?php echo @G_VERSION_NUM; ?>
_build<?php echo @G_BUILD; ?>
<?php if (@G_VERSIONTYPE != 'community'): ?>_<?php echo @G_VERSIONTYPE; ?>
<?php endif; ?>.zip</p>
	<dl>
	<?php $_from = $this->_tpl_vars['T_CHANGED_FILES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['changed_files_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['changed_files_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['changed_files_list']['iteration']++;
?>
		<dt>
			<span class = "handle"><?php echo $this->_tpl_vars['key']; ?>
</span>&nbsp;&nbsp;&nbsp;
			<img src = "images/16x16/success.png" class = "ajaxHandle" alt = "<?php echo @_MODULE_SECURITY_ADDTOIGNORELIST; ?>
" title = "<?php echo @_MODULE_SECURITY_ADDTOIGNORELIST; ?>
" onclick = "ajaxRequest(this, '<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&ignore=<?php echo $this->_tpl_vars['key']; ?>
', {}, function(el, response) {el.up().hide()})" />
			<a href = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&download=<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('base64_encode', true, $_tmp) : base64_encode($_tmp)); ?>
" target = "_new" class = "handle" alt = "<?php echo @_DOWNLOADFILE; ?>
" title = "<?php echo @_DOWNLOADFILE; ?>
"><img src = "images/16x16/import.png" class = "handle"></a>
		</dt>
	<?php endforeach; endif; unset($_from); ?>
	</dl>
    <?php echo $this->_tpl_vars['T_SECURITY_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_SECURITY_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['hidden']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_recheck']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['reset_ignore_list']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['ignore_changed_all']['html']; ?>

    </form> 	
	
<?php elseif ($_GET['type'] == 'new_files'): ?>
	<?php $this->assign('t_size', sizeof($this->_tpl_vars['T_NEW_FILES'])); ?>
	<h1><?php echo ((is_array($_tmp=@_MODULE_SECURITY_NEWFILESFOUND)) ? $this->_run_mod_handler('replace', true, $_tmp, '%x', $this->_tpl_vars['t_size']) : smarty_modifier_replace($_tmp, '%x', $this->_tpl_vars['t_size'])); ?>
</h1>
	<br/>
	<h3><?php echo @_MODULE_SECURITY_WHATSTHERISK; ?>
</h3>
	<?php echo @_MODULE_SECURITY_NEWFILESEXPLANATIONPART1; ?>

	<ul>
	<li><?php echo @_MODULE_SECURITY_NEWFILESEXPLANATIONPART2; ?>
</li>
	<li><?php echo @_MODULE_SECURITY_NEWFILESEXPLANATIONPART3; ?>
</li>
	<li><?php echo @_MODULE_SECURITY_NEWFILESEXPLANATIONPART4; ?>
</li>
	</ul>
	<h3><?php echo @_MODULE_SECURITY_WHATCANIDO; ?>
</h3>
	<p><?php echo @_MODULE_SECURITY_CHANGEDFILESSOLUTIONEXPLANATIONPART1; ?>
 <a href = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&download_ignore_list=1" style = "font-weight:bold"><?php echo @_MODULE_SECURITY_IGNORELIST; ?>
</a><?php echo @_MODULE_SECURITY_NEWFILESSOLUTIONEXPLANATION; ?>
</p>
	
	
	<dl>
	<?php $_from = $this->_tpl_vars['T_NEW_FILES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['changed_files_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['changed_files_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['changed_files_list']['iteration']++;
?>
		<dt>
			<span class = "handle"><?php echo $this->_tpl_vars['key']; ?>
</span>&nbsp;&nbsp;&nbsp;
			<img src = "images/16x16/success.png" class = "ajaxHandle" alt = "<?php echo @_MODULE_SECURITY_ADDTOIGNORELIST; ?>
" title = "<?php echo @_MODULE_SECURITY_ADDTOIGNORELIST; ?>
" onclick = "ajaxRequest(this, '<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&ignore=<?php echo $this->_tpl_vars['key']; ?>
', {}, function(el, response) {el.up().hide()})" />
			<a href = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&download=<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('base64_encode', true, $_tmp) : base64_encode($_tmp)); ?>
" target = "_new" class = "handle" alt = "<?php echo @_DOWNLOADFILE; ?>
" title = "<?php echo @_DOWNLOADFILE; ?>
"><img src = "images/16x16/import.png" class = "handle"></a>
			<img src = "images/16x16/error_delete.png" class = "ajaxHandle" alt = "<?php echo @_DELETE; ?>
" title = "<?php echo @_DELETE; ?>
" onclick = "ajaxRequest(this, '<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $_GET['type']; ?>
&delete=<?php echo $this->_tpl_vars['key']; ?>
', {}, function(el, response) {el.up().hide()})" />
		</dt>
	<?php endforeach; endif; unset($_from); ?>
	</dl>
	
    <?php echo $this->_tpl_vars['T_SECURITY_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_SECURITY_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['hidden']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_recheck']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['reset_ignore_list']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['ignore_new_all']['html']; ?>

    </form> 	
<?php else: ?>
        	<table style = "width:100%;">
        		<tr><td style = "vertical-align:top;">
                	<ul style = "padding-left:0px;margin-left:0px;list-style-type:none;">
						<?php $_from = $this->_tpl_vars['T_LOCAL_ISSUES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['issues_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['issues_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['issues_list']['iteration']++;
?>
							<li><a href = "<?php echo $this->_tpl_vars['T_MODULE_BASEURL']; ?>
&type=<?php echo $this->_tpl_vars['key']; ?>
" style = "color:red"><?php echo @_MODULE_SECURITY_LOCALISSUE; ?>
: <?php echo $this->_tpl_vars['item']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
                	</ul>
                	<ul style = "padding-left:0px;margin-left:0px;list-style-type:none;">
                		Security feeds
						<?php echo $this->_tpl_vars['T_SECURITY_FEEDS']; ?>

                	</ul>
        		</td></tr>
        	</table>
        	
    <?php echo $this->_tpl_vars['T_SECURITY_FORM']['javascript']; ?>

    <form <?php echo $this->_tpl_vars['T_SECURITY_FORM']['attributes']; ?>
>
        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['hidden']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_recheck']['html']; ?>

        <?php echo $this->_tpl_vars['T_SECURITY_FORM']['submit_delete_remote']['html']; ?>

    </form> 	
        	
<?php endif; ?>

<?php $this->_smarty_vars['capture']['t_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_SECURITY_MODULESECURITY,'data' => $this->_smarty_vars['capture']['t_code'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/security_agent.png') : smarty_modifier_cat($_tmp, 'img/security_agent.png')),'absoluteImagePath' => 1,'options' => $this->_tpl_vars['T_TABLE_OPTIONS']), $this);?>
