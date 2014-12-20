<?php /* Smarty version 2.6.27, created on 2014-09-15 13:37:22
         compiled from /var/www/efront/www/modules/module_security/module_security_cpanel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', '/var/www/efront/www/modules/module_security/module_security_cpanel.tpl', 17, false),array('modifier', 'cat', '/var/www/efront/www/modules/module_security/module_security_cpanel.tpl', 17, false),)), $this); ?>
<?php if ($this->_tpl_vars['T_SECURITY_FEEDS']): ?>
    <?php ob_start(); ?>
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
						<?php echo $this->_tpl_vars['T_SECURITY_FEEDS']; ?>

                	</ul>
        		</td></tr>
        	</table>
    <?php $this->_smarty_vars['capture']['t_code'] = ob_get_contents(); ob_end_clean(); ?>

    <?php echo smarty_function_eF_template_printBlock(array('title' => @_MODULE_SECURITY_MODULESECURITY,'data' => $this->_smarty_vars['capture']['t_code'],'image' => ((is_array($_tmp=$this->_tpl_vars['T_MODULE_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'img/security_agent.png') : smarty_modifier_cat($_tmp, 'img/security_agent.png')),'absoluteImagePath' => 1,'options' => $this->_tpl_vars['T_MODULE_OPTIONS']), $this);?>

<?php endif; ?>