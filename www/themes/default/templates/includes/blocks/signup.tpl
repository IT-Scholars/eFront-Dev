        {$T_PERSONAL_INFO_FORM.javascript}
        <form {$T_PERSONAL_INFO_FORM.attributes}>
    		{$T_PERSONAL_INFO_FORM.hidden}    		
            <!-- Added by Masoud Sadjadi on Jul 26, 2014 to show important instructions on the signup form -->
            <!-- Kaseya University Team: You may insert any valid html code in this part -->
            <!-- Begin -->
<center><font color="#FF0000" size=3><b>IMPORTANT:</b></font><font size=2> If you have previously participated in training with Kaseya University through IT Scholars,<br> <a href="http://university.kaseya.com/KaseyaUniversity/AccountSync.htm" target=_blank>CLICK HERE</a> to learn how to create and synchronize your accounts between the learning systems.</font></center>
            <!-- End -->
            <!-- End Addition by Masoud Sadjadi -->
    		<div class = "formRow">
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.login.label}</div>
                    <div class = "explanation"  {if $T_LDAP_USER}style = "display:none"{/if}>{$smarty.const._ONLYALLOWEDCHARACTERSLOGIN}</div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.login.html}</div>
            		{if $T_PERSONAL_INFO_FORM.login.error}<div class = "error">{$T_PERSONAL_INFO_FORM.login.error}</div>{/if}
        	    </div>
        	</div>
    		<div class = "formRow" {if $T_LDAP_USER}style = "display:none"{/if}>	    
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.password.label}</div>
                    <div class = "explanation">{$smarty.const._PASSWORDMUSTBE6CHARACTERS|replace:"%x":$T_CONFIGURATION.password_length}</div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.password.html}</div>
            		{if $T_PERSONAL_INFO_FORM.password.error}<div class = "error">{$T_PERSONAL_INFO_FORM.password.error}</div>{/if}
        	    </div>
        	</div>
    		<div class = "formRow" {if $T_LDAP_USER}style = "display:none"{/if}>	    		
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.passrepeat.label}</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.passrepeat.html}</div>
            		{if $T_PERSONAL_INFO_FORM.passrepeat.error}<div class = "error">{$T_PERSONAL_INFO_FORM.passrepeat.error}</div>{/if}
        	    </div>
        	</div>
    		<div class = "formRow">	    	    
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.email.label}</div>
                    <div class = "explanation"  {if $T_LDAP_USER}style = "display:none"{/if}>{$smarty.const._ONLYUSEBUSINESSEMAIL}</div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.email.html}</div>
            		{if $T_PERSONAL_INFO_FORM.email.error}<div class = "error">{$T_PERSONAL_INFO_FORM.email.error}</div>{/if}
        	    </div>
        	</div>
    		<div class = "formRow">	    	    
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.firstName.label}</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.firstName.html}</div>
            		{if $T_PERSONAL_INFO_FORM.firstName.error}<div class = "error">{$T_PERSONAL_INFO_FORM.firstName.error}</div>{/if}
        	    </div>
        	</div>
    		<div class = "formRow">	    	    
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.lastName.label}</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.lastName.html}</div>
            		{if $T_PERSONAL_INFO_FORM.lastName.error}<div class = "error">{$T_PERSONAL_INFO_FORM.lastName.error}</div>{/if}
        	    </div>
        	</div>
        {foreach name = 'profile_fields' key = key item = item from = $T_USER_PROFILE_FIELDS }
    		<div class = "formRow">	    
        		<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.$item.label}</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.$item.html}</div>
            		{if $T_PERSONAL_INFO_FORM.$item.error}<div class = "error">{$T_PERSONAL_INFO_FORM.$item.error}</div>{/if}
        	    </div>
        	</div>
        {/foreach}  
            <!-- Added by Masoud Sadjadi on Jul 26, 2014 to include timezone filed on the signup form -->
    		<div class = "formRow">	    
            	<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.timezone.label}</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.timezone.html}</div>
            		{if $T_PERSONAL_INFO_FORM.timezone.error}<div class = "error">{$T_PERSONAL_INFO_FORM.timezone.error}</div>{/if}
        	    </div>      		
        	</div>
            <!-- End Addition by Masoud Sadjadi -->
    		<div class = "formRow">	    
            	<div class = "formLabel">			
                    <div class = "header">{$T_PERSONAL_INFO_FORM.comments.label}</div>
                    {*<div class = "explanation">{$smarty.const._ENTERANYCOMMENTS}</div>*}
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.comments.html}</div>
            		{if $T_PERSONAL_INFO_FORM.comments.error}<div class = "error">{$T_PERSONAL_INFO_FORM.comments.error}</div>{/if}
        	    </div>      		
        	</div>
    		<div class = "formRow">	    
            	<div class = "formLabel">			
                    <div class = "header">&nbsp;</div>
                    <div class = "explanation"></div>
            	</div>
        		<div class = "formElement">
                	<div class = "field">{$T_PERSONAL_INFO_FORM.submit_register.html}</div>
        	    </div>      		
        	</div>		
        </form>