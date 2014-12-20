<div align="center">
<iframe 
	src={"http://localhost/moodle19/mod/deva/view-sms.php?id=10582&embedded=1&username=test44&password=test44"} 
    align={$frame.align} 
    height=1000
    width=100%
    marginwidth=0
    marginheight=0 >
</iframe>
</div>

<!--
{capture name = "t_network_diagram"}
<img 
	id="fiuNetworkDiagram" 
    src="{$T_MODULE_BASELINK}img/{$NetworkDiagramImage}" 
    usemap="#Image-Map-1" 
    border="0" 
    width="720" 
    height="540" 
    alt="" 
    class="style1" />
{/capture}

{capture name = "t_data_sheet"}
<iframe 
	src={$T_DATA_SHEET} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_connection_info"}
<iframe 
	src={$T_CONNECTION_INFO} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_dc"}
<iframe 
	src={$T_DC} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_ws1"}
<iframe 
	src={$T_WS1} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_ws2"}
<iframe 
	src={$T_WS2} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_reception"}
<iframe 
	src={$T_RECEPTION} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

{capture name = "t_laptop_ceo"}
<iframe 
	src={$T_LAPTOP_CEO} 
    align={$frame.align} 
    height={$frame.height} 
    width={$frame.width} 
    marginwidth={$frame.marginwidth} 
    marginheight={$frame.margineheight} >
</iframe>
{/capture}

<div class = "tabber" align="center">
	{eF_template_printBlock 
    	tabber = "network_diagram" 
        title = $smarty.const._MODULE_VLAB_NETWORKDIAGRAM 
        data = $smarty.capture.t_network_diagram}
	{eF_template_printBlock 
    	tabber = "data_sheet" 
        title = $smarty.const._MODULE_VLAB_DATASHEET 
        data = $smarty.capture.t_data_sheet}
	{eF_template_printBlock 
    	tabber = "connection_info" 
        title = $smarty.const._MODULE_VLAB_CONNECTIONINFO 
        data = $smarty.capture.t_connection_info}
{eF_template_printBlock 
    	tabber = "dc" 
        title = $smarty.const._MODULE_VLAB_DC 
        data = $smarty.capture.t_dc}
	{eF_template_printBlock 
    	tabber = "ws1" 
        title = $smarty.const._MODULE_VLAB_WS1 
        data = $smarty.capture.t_ws1}
	{eF_template_printBlock 
    	tabber = "ws2" 
        title = $smarty.const._MODULE_VLAB_WS2 
        data = $smarty.capture.t_ws2}
	{eF_template_printBlock 
    	tabber = "reception" 
        title = $smarty.const._MODULE_VLAB_RECEPTION 
        data = $smarty.capture.t_reception}
	{eF_template_printBlock 
    	tabber = "laptop_ceo" 
        title = $smarty.const._MODULE_VLAB_LAPTOP_CEO 
        data = $smarty.capture.t_laptop_ceo}
</div>
-->