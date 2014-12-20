{capture name = "t_vLab_data_code"}
This appears because you are calling getCatalog() and getCatalogSmartyTpl() from inside the vLab module

{/capture}
{* {eF_template_printBlock title = $smarty.const._MODULE_VLAB_VLABDATACATALOG data = $smarty.capture.t_vLab_data_code} *}