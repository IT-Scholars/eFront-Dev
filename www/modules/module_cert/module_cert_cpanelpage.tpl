{capture name = "t_cert_data_code"}
<!--ajax:certTable-->

					<table style = "width:100%" class = "sortedTable" size = "{$T_TABLE_SIZE}" sortBy = "0" id = "certTable" useAjax = "1" rowsPerPage = "{$smarty.const.G_DEFAULT_TABLE_SIZE}" url = "{$T_MODULE_BASEURL}&">
						<tr class = "topTitle">
							<td class = "topTitle" name = "timestamp">{$smarty.const._DATE}</td>
							<td class = "topTitle" name = "data">{$smarty.const._DATA}</td>
						</tr>
	{foreach name = 'cert_data_list' key = 'key' item = 'item' from = $T_DATA_SOURCE}
						<tr class = "defaultRowHeight {cycle values = "oddRowColor, evenRowColor"}">
							<td>#filter:timestamp-{$item.timestamp}#</td>
							<td>{$item.data}</td>
					</tr>
	{foreachelse}
					<tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "100%">{$smarty.const._NODATAFOUND}</td></tr>
	{/foreach}
				</table>

<!--/ajax:certTable-->

{/capture}
{eF_template_printBlock title = $smarty.const._MODULE_CERT_CERTDATACPANEL data = $smarty.capture.t_cert_data_code}