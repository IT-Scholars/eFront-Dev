<?php /* Smarty version 2.6.27, created on 2014-09-15 13:37:48
         compiled from /var/www/efront/www/modules/module_cert/module_cert_catalog.tpl */ ?>
<?php ob_start(); ?>
This appears because you are calling getCatalog() and getCatalogSmartyTpl() from inside the cert module

<?php $this->_smarty_vars['capture']['t_cert_data_code'] = ob_get_contents(); ob_end_clean(); ?>