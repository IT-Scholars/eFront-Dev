<?php /* Smarty version 2.6.27, created on 2014-09-15 13:37:56
         compiled from /var/www/efront/www/modules/module_links/module_InnerTable.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printBlock', '/var/www/efront/www/modules/module_links/module_InnerTable.tpl', 15, false),array('modifier', 'cat', '/var/www/efront/www/modules/module_links/module_InnerTable.tpl', 15, false),)), $this); ?>
<?php ob_start(); ?>
    <table>
        <?php unset($this->_sections['links_list']);
$this->_sections['links_list']['name'] = 'links_list';
$this->_sections['links_list']['loop'] = is_array($_loop=$this->_tpl_vars['T_LINKS_INNERTABLE']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['links_list']['max'] = (int)5;
$this->_sections['links_list']['show'] = true;
if ($this->_sections['links_list']['max'] < 0)
    $this->_sections['links_list']['max'] = $this->_sections['links_list']['loop'];
$this->_sections['links_list']['step'] = 1;
$this->_sections['links_list']['start'] = $this->_sections['links_list']['step'] > 0 ? 0 : $this->_sections['links_list']['loop']-1;
if ($this->_sections['links_list']['show']) {
    $this->_sections['links_list']['total'] = min(ceil(($this->_sections['links_list']['step'] > 0 ? $this->_sections['links_list']['loop'] - $this->_sections['links_list']['start'] : $this->_sections['links_list']['start']+1)/abs($this->_sections['links_list']['step'])), $this->_sections['links_list']['max']);
    if ($this->_sections['links_list']['total'] == 0)
        $this->_sections['links_list']['show'] = false;
} else
    $this->_sections['links_list']['total'] = 0;
if ($this->_sections['links_list']['show']):

            for ($this->_sections['links_list']['index'] = $this->_sections['links_list']['start'], $this->_sections['links_list']['iteration'] = 1;
                 $this->_sections['links_list']['iteration'] <= $this->_sections['links_list']['total'];
                 $this->_sections['links_list']['index'] += $this->_sections['links_list']['step'], $this->_sections['links_list']['iteration']++):
$this->_sections['links_list']['rownum'] = $this->_sections['links_list']['iteration'];
$this->_sections['links_list']['index_prev'] = $this->_sections['links_list']['index'] - $this->_sections['links_list']['step'];
$this->_sections['links_list']['index_next'] = $this->_sections['links_list']['index'] + $this->_sections['links_list']['step'];
$this->_sections['links_list']['first']      = ($this->_sections['links_list']['iteration'] == 1);
$this->_sections['links_list']['last']       = ($this->_sections['links_list']['iteration'] == $this->_sections['links_list']['total']);
?>
            <tr><td><?php echo $this->_sections['links_list']['iteration']; ?>
. 
                <a target="_blank" href = "<?php echo $this->_tpl_vars['T_LINKS_INNERTABLE'][$this->_sections['links_list']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['T_LINKS_INNERTABLE'][$this->_sections['links_list']['index']]['display']; ?>
</a>
                </td>
            </tr>
        <?php endfor; else: ?>
            <tr><td class = "emptyCategory"><?php echo @_LINKS_NOLINKFOUND; ?>
</td></tr>
        <?php endif; ?>
    </table>
<?php $this->_smarty_vars['capture']['t_inner_table_code'] = ob_get_contents(); ob_end_clean(); ?>

<?php echo smarty_function_eF_template_printBlock(array('title' => @_LINKS_LINKSPAGE,'data' => $this->_smarty_vars['capture']['t_inner_table_code'],'absoluteImagePath' => 1,'image' => ((is_array($_tmp=$this->_tpl_vars['T_LINKS_BASELINK'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'images/link.png') : smarty_modifier_cat($_tmp, 'images/link.png')),'options' => $this->_tpl_vars['T_LINKS_INNERTABLE_OPTIONS']), $this);?>
