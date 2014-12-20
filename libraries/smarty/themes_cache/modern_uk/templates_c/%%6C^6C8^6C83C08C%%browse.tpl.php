<?php /* Smarty version 2.6.27, created on 2014-10-27 11:43:24
         compiled from browse.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eF_template_printMessage', 'browse.tpl', 4, false),array('modifier', 'replace', 'browse.tpl', 31, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['T_MESSAGE']): ?>
	<?php echo smarty_function_eF_template_printMessage(array('message' => $this->_tpl_vars['T_MESSAGE'],'type' => $this->_tpl_vars['T_MESSAGE_TYPE']), $this);?>
    
<?php endif; ?>

<table>
<?php if (isset ( $this->_tpl_vars['T_PARENT_DIR'] ) && $this->_tpl_vars['T_PARENT_DIR'] != ''): ?>
    <tr><td><img src = "images/16x16/folder_up.png" alt = "<?php echo @_FOLDERUP; ?>
" title = "<?php echo @_FOLDERUP; ?>
"/></td>
        <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?for_type=<?php echo $_GET['for_type']; ?>
&mode=<?php echo $_GET['mode']; ?>
<?php if ($this->_tpl_vars['T_PARENT_DIR']): ?>&directory=<?php echo $this->_tpl_vars['T_PARENT_DIR']; ?>
<?php endif; ?>" alt = "<?php echo @_UPONELEVEL; ?>
" title = "<?php echo @_UPONELEVEL; ?>
">.. <?php echo @_UPONELEVEL; ?>
</a></td></tr>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['T_FILES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['files_list']['iteration']++;
?>
    <?php if ($this->_tpl_vars['item']['type'] == 'directory'): ?>
        <tr>
            <td><img src = "images/16x16/file_explorer.png" alt = "<?php echo @_FOLDER; ?>
" title = "<?php echo @_FOLDER; ?>
"/></td>
            <td><a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?for_type=<?php echo $_GET['for_type']; ?>
&mode=<?php echo $_GET['mode']; ?>
&directory=<?php echo $this->_tpl_vars['item']['url_path']; ?>
" title = "<?php echo $this->_tpl_vars['item']['name']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
            <td></td>
        </tr>
    <?php else: ?>
        <tr>
            <td><img src = "<?php echo $this->_tpl_vars['item']['image']; ?>
" alt = "<?php echo $this->_tpl_vars['item']['mime_type']; ?>
" title = "<?php echo $this->_tpl_vars['item']['mime_type']; ?>
"/></td>
            <td><a href = "javascript:void(0)" onclick = "setValue('<?php if ($this->_tpl_vars['item']['id'] != -1): ?><?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['url_path']; ?>
<?php endif; ?>', '<?php echo $this->_tpl_vars['item']['physical_name']; ?>
')" title = "<?php echo $this->_tpl_vars['item']['name']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
            <td style = "white-space:nowrap">&nbsp;(<?php echo $this->_tpl_vars['item']['size']; ?>
 <?php echo @_KB; ?>
)</td>
        </tr>
    <?php endif; ?>
<?php endforeach; else: ?>
    <tr><td colspan = "100%" class = "emptyCategory"><?php echo @_NOFILESFOUND; ?>
</td></tr>
<?php endif; unset($_from); ?>
</table>

<?php $this->assign('t_offset_escaped', ((is_array($_tmp=$this->_tpl_vars['T_OFFSET'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "\'") : smarty_modifier_replace($_tmp, "'", "\'"))); ?>
<script>
<?php echo '
function setValue(id, name) {		//with new version of editor top.document changed to parent.document
    if (parent.document.getElementById(\'src\')) {
        parent.document.getElementById(\'src\').value=\''; ?>
<?php echo $this->_tpl_vars['t_offset_escaped']; ?>
<?php echo '\'+name;
    } else if (parent.document.getElementById(\'href\')) {
        parent.document.getElementById(\'href\').value=\''; ?>
<?php echo $this->_tpl_vars['t_offset_escaped']; ?>
<?php echo '\'+name;
    } else if (parent.document.getElementById(\'file\')) {
        parent.document.getElementById(\'file\').value=name;
        parent.document.getElementById(\'codebase\').value=\''; ?>
<?php echo $this->_tpl_vars['t_offset_escaped']; ?>
<?php echo '\';
    } else if (parent.document.getElementById(\'document\')) {
        parent.document.getElementById(\'document\').value=\''; ?>
<?php echo $this->_tpl_vars['t_offset_escaped']; ?>
<?php echo '\'+name;
    }
}
'; ?>

</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/closing.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>