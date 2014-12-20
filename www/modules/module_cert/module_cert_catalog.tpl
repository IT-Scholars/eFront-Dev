{capture name = "t_cert_data_code"}
This appears because you are calling getCatalog() and getCatalogSmartyTpl() from inside the cert module

{/capture}
{* {eF_template_printBlock title = $smarty.const._MODULE_CERT_CERTDATACATALOG data = $smarty.capture.t_cert_data_code} *}