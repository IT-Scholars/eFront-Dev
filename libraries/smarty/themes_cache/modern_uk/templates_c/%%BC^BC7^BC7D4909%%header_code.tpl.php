<?php /* Smarty version 2.6.27, created on 2014-09-15 13:36:37
         compiled from includes/header_code.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'includes/header_code.tpl', 2, false),array('modifier', 'eF_template_isOptionVisible', 'includes/header_code.tpl', 21, false),array('modifier', 'eF_formatTitlePath', 'includes/header_code.tpl', 119, false),)), $this); ?>
	<div id = "logo">
		<a href = "<?php if ($_SESSION['s_login']): ?><?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)); ?>
<?php else: ?>index.php<?php endif; ?>">
			<img class = "handle" src = "<?php echo $this->_tpl_vars['T_LOGO']; ?>
" title = "<?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
" alt = "<?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
" />
		</a>
	</div>
	
	<?php if ($_SESSION['s_login']): ?>
	<div id = "logout_link" >
		<?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface']): ?>
			  				<?php if ($this->_tpl_vars['T_SIMPLE_COMPLETE_MODE']): ?>
	            	<span class="headerText dropdown">
		            	<span class = "label" style = "cursor:pointer" title = "<?php if ($this->_tpl_vars['T_SIMPLE_MODE']): ?><?php echo @_SWITCHTOCOMPLETEMODE; ?>
<?php else: ?><?php echo @_SWITCHTOSIMPLEMODE; ?>
<?php endif; ?>" onclick = "jQuery.fn.efront('switchmode')"><?php if ($this->_tpl_vars['T_SIMPLE_MODE']): ?><?php echo @_SIMPLEMODE; ?>
<?php else: ?><?php echo @_COMPLETEMODE; ?>
<?php endif; ?></span>
	            	</span>
	            <?php endif; ?>
	            <?php if ($_SESSION['s_type'] == 'administrator'): ?>
	            <span class="headerText dropdown">
	                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo @_GOTO; ?>
 <b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                	<li><a href="userpage.php"><?php echo @_HOME; ?>
</a></li>
	                	<?php if (((is_array($_tmp='users')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
	                	<li><a href="userpage.php?ctg=users"><?php echo @_USERS; ?>
</a></li>
	                	<?php endif; ?>
	                	<?php if (((is_array($_tmp='lessons')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
	                	<li><a href="userpage.php?ctg=courses"><?php echo @_COURSES; ?>
</a></li>
	                	<li><a href="userpage.php?ctg=lessons"><?php echo @_LESSONS; ?>
</a></li>
						<?php endif; ?>	    
					<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 						<?php if (((is_array($_tmp='branches')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>            	
	                	<li><a href="userpage.php?ctg=module_hcd&op=branches"><?php echo @_BRANCHES; ?>
</a></li>
	                	<?php endif; ?>
                	<?php endif; ?> 	                	<li class="divider"></li>
						<li class="nav-header"><?php echo @_ADD; ?>
</li>
						<?php if (((is_array($_tmp='users')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>	                	
	                	<li><a href="userpage.php?ctg=personal&user=admin&op=profile&add_user=1"><?php echo @_USER; ?>
</a></li>
	                	<?php endif; ?>
	                	<?php if (((is_array($_tmp='lessons')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
	                	<li><a href="userpage.php?ctg=courses&add_course=1"><?php echo @_COURSE; ?>
</a></li>
	                	<li><a href="userpage.php?ctg=lessons&add_lesson=1"><?php echo @_LESSON; ?>
</a></li>
						<?php endif; ?>	    
					<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 						<?php if (((is_array($_tmp='branches')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>            	
	                	<li><a href="userpage.php?ctg=module_hcd&op=branches&add_branch=1"><?php echo @_BRANCH; ?>
</a></li>
	                	<?php endif; ?>
                	<?php endif; ?> 	                </ul>
	            </span>
	            <?php endif; ?>
	            <span class="headerText dropdown">
	                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">#filter:login-<?php echo $_SESSION['s_login']; ?>
# <b class="caret"></b></a>
	                <ul class="dropdown-menu">
					<?php if ($this->_tpl_vars['T_MAPPED_ACCOUNTS'] && $_GET['ctg'] != 'agreement'): ?>
	                    <li class="nav-header"><?php echo @_SWITCHACCOUNT; ?>
</li>
						<?php if (! $this->_tpl_vars['T_CONFIGURATION']['mapped_accounts'] || $this->_tpl_vars['T_CONFIGURATION']['mapped_accounts'] == 1 && $_SESSION['s_type'] != 'student' || $this->_tpl_vars['T_CONFIGURATION']['mapped_accounts'] == 2 && $_SESSION['s_type'] == 'administrator'): ?>
							<?php $_from = $this->_tpl_vars['T_MAPPED_ACCOUNTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['additional_accounts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['additional_accounts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['additional_accounts']['iteration']++;
?>
						<li><a href="javascript:void(0)" onclick = "changeAccount('<?php echo $this->_tpl_vars['item']['login']; ?>
')">#filter:login-<?php echo $this->_tpl_vars['item']['login']; ?>
#</a></li>
			                <?php endforeach; endif; unset($_from); ?>
			            <?php endif; ?>
	                    <li class="divider"></li>
		            <?php endif; ?>
	            	<?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['dashboard'] != 'hidden'): ?>
	                  	<li><a href="userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=dashboard"><?php echo @_DASHBOARD; ?>
</a></li>
	              	<?php endif; ?>
	                  	<li><a href="userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=profile"><?php echo @_ACCOUNT; ?>
</a></li>
	              	<?php if ($_SESSION['s_type'] != 'administrator'): ?>
	                  	<li><a href="userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=user_courses"><?php echo @_LEARNING; ?>
</a></li>
	              	<?php endif; ?>
	              	<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 						<?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['organization'] != 'hidden'): ?>
						<li><a href = "userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=org_form"><?php echo @_ORGANIZATION; ?>
</a></li>
						<?php endif; ?>
						<li><a href = "userpage.php?ctg=personal&user=<?php echo $this->_tpl_vars['T_CURRENT_USER']->user['login']; ?>
&op=files'"><?php echo @_FILES; ?>
</a></li>
	              	<?php endif; ?> 	                </ul>
	            </span>				
			<?php if ($this->_tpl_vars['T_CURRENT_USER']->coreAccess['personal_messages'] != 'hidden' && ((is_array($_tmp='messages')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
	            <span class="headerText dropdown">
	                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo @_MESSAGES; ?>
 <b class="caret"></b></a> <?php if ($this->_tpl_vars['T_NUM_MESSAGES']): ?><span id = "header_total_messages" class = "badge badge-info" style = "cursor:pointer" onclick = "window.location='<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=messages'"><?php echo $this->_tpl_vars['T_NUM_MESSAGES']; ?>
</span><?php endif; ?>
	                <ul class="dropdown-menu">
	                	<li><a href="userpage.php?ctg=messages"><?php echo @_INCOMING; ?>
</a></li>
	                	<li><a href="userpage.php?ctg=messages&add=1"><?php echo @_CREATE; ?>
</a></li>
	                </ul>
	            </span>
			<?php endif; ?>
			<?php if (((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) != 'index.php' && $this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] != 0 && $_SESSION['s_login']): ?>
				<span class = "headerText">
	            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=<?php if ($_SESSION['s_type'] == 'administrator'): ?>control_panel<?php else: ?>lessons<?php endif; ?>&op=search" method = "post" style = "display:inline-block;">
					<input type = "text" name = "search_text" placeholder = "<?php echo @_SEARCH; ?>
" class = "searchBox"/>
					<input type = "hidden" name = "current_location" id = "current_location" />
				</form>
				</span>
			<?php else: ?>
				<?php echo $this->_smarty_vars['capture']['header_language_code']; ?>

			<?php endif; ?>			  				
			<?php if ($this->_tpl_vars['T_FACEBOOK_USER']): ?>
             <div style="display:none" id="fb-root"></div>
				<!--<button id="fb-logout" onclick="facebook_logout()">Log out</button> -->
				 <span id="fbLogout" onclick="facebook_logout()"><a class="fb_button fb_button_medium"><span class="fb_button_text"><?php echo @_LOGOUT; ?>
</span></a></span>
 				<!-- <span id="fbLogout" onclick="facebook_logout()"><a class = "headerText" href="javascript:void(0)"><?php echo @_LOGOUT; ?>
</a></span> -->
 			<?php else: ?>
 				<a class = "headerText" href = "index.php?logout=true"><?php echo @_LOGOUT; ?>
</a>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] != 0 && $this->_tpl_vars['T_HEADER_CLASS'] == 'header'): ?><?php echo $this->_smarty_vars['capture']['t_path_additional_code']; ?>
<?php endif; ?>
	</div>
	<?php else: ?>
	<div id = "logout_link" >
	<?php echo $this->_smarty_vars['capture']['header_language_code']; ?>

	</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['T_CONFIGURATION']['motto_on_header']): ?>
		<div id = "info">
			<div id = "site_name" class= "headerText"><?php echo $this->_tpl_vars['T_CONFIGURATION']['site_name']; ?>
</div>
			<div id = "site_motto" class= "headerText"><?php echo $this->_tpl_vars['T_CONFIGURATION']['site_motto']; ?>
</div>
		</div>
	<?php endif; ?>
	<div id = "path">
		<div id = "path_title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('eF_formatTitlePath', true, $_tmp) : smarty_modifier_eF_formatTitlePath($_tmp)); ?>
</div>
		<div id = "tab_handles_div">
			<?php if ($this->_tpl_vars['T_THEME_SETTINGS']->options['sidebar_interface'] == 0 || $this->_tpl_vars['T_HEADER_CLASS'] == 'headerHidden'): ?><?php echo $this->_smarty_vars['capture']['t_path_additional_code']; ?>
<?php endif; ?>
		</div>
	</div>