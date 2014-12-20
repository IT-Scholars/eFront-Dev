<?php /* Smarty version 2.6.27, created on 2014-09-15 16:53:29
         compiled from includes/common/courses_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'eF_template_isOptionVisible', 'includes/common/courses_list.tpl', 52, false),array('modifier', 'sizeof', 'includes/common/courses_list.tpl', 242, false),array('function', 'cycle', 'includes/common/courses_list.tpl', 65, false),)), $this); ?>
<?php ob_start(); ?>
<style>
<?php echo '
table#coursesTable,table#instancesTable {width:100%;}
table#coursesTable td.name,table#instancesTable td.name{width:30%;}
table#coursesTable td.location,table#instancesTable td.location{width:15%;}
table#coursesTable td.directions_name,table#instancesTable td.directions_name{width:15%;}
table#coursesTable td.directions_ID,table#instancesTable td.directions_ID{width:15%;}
table#coursesTable td.user_type, table#instancesTable td.user_type{width:15%;}
table#coursesTable td.num_students,table#instancesTable td.num_students{width:5%;text-align:center;}
table#coursesTable td.num_lessons,table#instancesTable td.num_lessons{width:5%;text-align:center;}
table#coursesTable td.num_skills,table#instancesTable td.num_skills{width:5%;text-align:center;}
table#coursesTable td.price,table#instancesTable td.price{width:10%;text-align:center;}
table#coursesTable td.start_date,table#instancesTable td.start_date{width:10%;text-align:center;}
table#coursesTable td.end_date,table#instancesTable td.end_date{width:10%;text-align:center;}
table#coursesTable td.created,table#instancesTable td.created{width:10%;text-align:center;}
table#coursesTable td.active,table#instancesTable td.active{width:5%;text-align:center;}
table#coursesTable td.active_in_course,table#instancesTable td.active_in_course{width:10%;text-align:center;}
table#coursesTable td.completed,table#instancesTable td.completed{width:5%;text-align:center;}
table#coursesTable td.to_timestamp,table#instancesTable td.to_timestamp{width:10%;text-align:center;}
table#coursesTable td.score,table#instancesTable td.score{width:5%;text-align:center;}
table#coursesTable td.operations,table#instancesTable td.operations{width:5%;text-align:center;white-space:nowrap}
table#coursesTable td.has_course,table#instancesTable td.has_course{width:10%;text-align:center;}
'; ?>

</style>

	    <tr class = "topTitle">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		    <td class = "topTitle name" 		 	 name = "name"><?php echo @_COURSENAME; ?>
</td><?php endif; ?>
		<?php if (@G_VERSIONTYPE == 'enterprise'): ?> <?php if (in_array ( 'location' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> 		<td class = "topTitle location"   		 name = "location"><?php echo @_LOCATION; ?>
</td><?php endif; ?>
		<?php endif; ?> <?php if (in_array ( 'directions_name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?> <td class = "topTitle directions_name"   name = "directions_name"><?php echo @_PARENTDIRECTIONS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'directions_ID' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>   <td class = "topTitle directions_ID"     name = "directions_ID"><?php echo @_PARENTDIRECTIONS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'user_type' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle user_type"   		 name = "user_type"><?php echo @_USERTYPE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'num_students' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>    <td class = "topTitle num_students"    	 name = "num_students"><?php echo @_PARTICIPATION; ?>
</td><?php endif; ?>
<?php if (in_array ( 'num_lessons' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle num_lessons" 	 	 name = "num_lessons"><?php echo @_LESSONS; ?>
</td><?php endif; ?>
		<?php if (@G_VERSIONTYPE == 'enterprise'): ?> <?php if (in_array ( 'num_skills' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle num_skills" 	 	 name ="num_skills"><?php echo @_SKILLS; ?>
</td><?php endif; ?>
		<?php endif; ?> <?php if (in_array ( 'price' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] ) && ((is_array($_tmp='payments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>		    <td class = "topTitle price" 		 	 name = "price"><?php echo @_PRICE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'start_date' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		<td class = "topTitle start_date"  		 name = "start_date"><?php echo @_STARTDATE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'end_date' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		<td class = "topTitle end_date"  		 name = "end_date"><?php echo @_ENDDATE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'created' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		    <td class = "topTitle created" 		 	 name = "created"><?php echo @_CREATED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'active' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		    <td class = "topTitle active" 		 	 name = "active" ><?php echo @_ACTIVE2; ?>
</td><?php endif; ?>
<?php if (in_array ( 'active_in_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?><td class = "topTitle active_in_course"  name = "active_in_course"><?php echo @_ENABLED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		<td class = "topTitle completed"   		 name = "completed"><?php echo @_COMPLETED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'to_timestamp' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	<td class = "topTitle to_timestamp"   	 name = "to_timestamp"><?php echo @_COMPLETEDON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		    <td class = "topTitle score"   			 name = "score"><?php echo @_SCORE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'operations' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle operations noSort"><?php echo @_OPERATIONS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'has_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle has_course" 	 	 name = "has_course"><?php echo @_STATUS; ?>
</td><?php endif; ?>
	    </tr>
		<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_courses_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_courses_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['course']):
        $this->_foreach['users_to_courses_list']['iteration']++;
?>
		<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['course']['active']): ?>deactivatedTableElement<?php endif; ?>">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "name">
	        	<?php if ($this->_tpl_vars['course']['has_instances'] && $this->_tpl_vars['T_SORTED_TABLE'] == 'coursesTable'): ?>
					<img src = "images/16x16/plus.png" class = "ajaxHandle" alt = "<?php echo @_COURSEINSTANCES; ?>
" title = "<?php echo @_COURSEINSTANCES; ?>
" onclick = "toggleSubSection(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'instancesTable')"/>
				<?php elseif ($this->_tpl_vars['course']['num_lessons'] && $this->_tpl_vars['T_SHOW_COURSE_LESSONS']): ?>
					<img src = "images/16x16/plus2.png" class = "ajaxHandle" alt = "<?php echo @_COURSELESSONS; ?>
" title = "<?php echo @_COURSELESSONS; ?>
" onclick = "toggleSubSection(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'courseLessonsTable')"/>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['_change_handles_'] && ! $this->_tpl_vars['T_IS_SUPERVISOR']): ?>
				<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=courses&edit_course=<?php echo $this->_tpl_vars['course']['id']; ?>
" class = "editLink" title = "<?php echo @_EDIT; ?>
"><?php echo $this->_tpl_vars['course']['name']; ?>
</a>
				<?php else: ?>
				<span><?php echo $this->_tpl_vars['course']['name']; ?>
</span>
				<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (@G_VERSIONTYPE == 'enterprise'): ?> 	<?php if (in_array ( 'location' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "location"   name = "location">
			<a href = "javascript:void(0)" class = "info" url = "ask_information.php?courses_ID=<?php echo $this->_tpl_vars['course']['id']; ?>
&type=branches"><?php echo $this->_tpl_vars['course']['location']; ?>
</a>
						
			</td>
	<?php endif; ?>
<?php endif; ?> <?php if (in_array ( 'directions_name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "directions_name">
	        	<?php echo $this->_tpl_vars['course']['directions_name']; ?>

	        </td>
<?php endif; ?>
<?php if (in_array ( 'directions_ID' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "directions_ID">
	        	<?php echo $this->_tpl_vars['T_DIRECTION_PATHS'][$this->_tpl_vars['course']['directions_ID']]; ?>

	        </td>
<?php endif; ?>
<?php if (in_array ( 'user_type' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "user_type">
	    		<?php if ($this->_tpl_vars['_change_handles_']): ?>
	    			<?php if (( ( $this->_tpl_vars['course']['has_course'] && $this->_tpl_vars['course']['has_instances'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>
		    			<?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']]; ?>

		    		<?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable' || ! $this->_tpl_vars['course']['has_instances']): ?>
		    			<span style = "display:none"><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']]; ?>
</span>
			            <select name = "course_type_<?php echo $this->_tpl_vars['course']['id']; ?>
" id = "course_type_<?php echo $this->_tpl_vars['course']['id']; ?>
" onchange = "$('course_<?php echo $this->_tpl_vars['course']['id']; ?>
').checked = true;ajaxUserPost('course', '<?php echo $this->_tpl_vars['course']['id']; ?>
', this, '<?php echo $this->_tpl_vars['T_SORTED_TABLE']; ?>
');">
					        <?php $_from = $this->_tpl_vars['T_ROLES_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
			                <option value = "<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['course']['user_type']): ?><?php if (( $this->_tpl_vars['T_EDITED_USER_TYPE'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['course']['user_type'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
					        <?php endforeach; endif; unset($_from); ?>
			            </select>
			        <?php endif; ?>
			    <?php else: ?>
			        <?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']]; ?>

			    <?php endif; ?>
	        </td>
<?php endif; ?>
<?php if (in_array ( 'num_students' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "num_students">
				<?php if ($this->_tpl_vars['course']['max_users']): ?><?php echo $this->_tpl_vars['course']['num_students']; ?>
/<?php echo $this->_tpl_vars['course']['max_users']; ?>
<?php else: ?><?php echo $this->_tpl_vars['course']['num_students']; ?>
<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'num_lessons' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "num_lessons">
				<?php echo $this->_tpl_vars['course']['num_lessons']; ?>

			</td>
<?php endif; ?>
		<?php if (@G_VERSIONTYPE == 'enterprise'): ?> <?php if (in_array ( 'num_skills' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "num_skills">
				<?php echo $this->_tpl_vars['course']['num_skills']; ?>

			</td>
<?php endif; ?>
		<?php endif; ?> <?php if (in_array ( 'price' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] ) && ((is_array($_tmp='payments')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
			<td class = "price">
				<?php if ($this->_tpl_vars['course']['price'] == 0): ?>-<?php else: ?><?php echo $this->_tpl_vars['course']['price_string']; ?>
<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'start_date' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "start_date">
				#filter:timestamp-<?php echo $this->_tpl_vars['course']['start_date']; ?>
#
			</td>
<?php endif; ?>
<?php if (in_array ( 'end_date' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "end_date">
				#filter:timestamp-<?php echo $this->_tpl_vars['course']['end_date']; ?>
#
			</td>
<?php endif; ?>
<?php if (in_array ( 'created' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "created">
				#filter:timestamp-<?php echo $this->_tpl_vars['course']['created']; ?>
#
			</td>
<?php endif; ?>
<?php if (in_array ( 'active' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "active">
				<?php if ($this->_tpl_vars['course']['active'] == 1): ?>
				<img src = "images/16x16/trafficlight_green.png" alt = "<?php echo @_DEACTIVATE; ?>
" title = "<?php echo @_DEACTIVATE; ?>
" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "activateCourse(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
')"<?php endif; ?>>
				<?php else: ?>
				<img src = "images/16x16/trafficlight_red.png"   alt = "<?php echo @_ACTIVATE; ?>
"   title = "<?php echo @_ACTIVATE; ?>
"   <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "activateCourse(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
')"<?php endif; ?>>
				<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'active_in_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "active_in_course">
				<?php if (! $this->_tpl_vars['course']['active_in_course'] && $this->_tpl_vars['course']['has_course']): ?>
		            <img src = "images/16x16/warning.png" title = "<?php echo @_APPLICATIONPENDING; ?>
" alt = "<?php echo @_APPLICATIONPENDING; ?>
" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'course')"<?php endif; ?>/>
	            <?php elseif ($this->_tpl_vars['course']['has_course']): ?>
		            <img src = "images/16x16/success.png" title = "#filter:timestamp-<?php echo $this->_tpl_vars['course']['active_in_course']; ?>
#" alt = "#filter:timestamp-<?php echo $this->_tpl_vars['course']['active_in_course']; ?>
#" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['course']['id']; ?>
', 'course')"<?php endif; ?>/>
	            <?php endif; ?>
	        </td>
<?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "completed">
			<?php if ($this->_tpl_vars['course']['has_course'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']] == 'student' )): ?>
				<?php if ($this->_tpl_vars['course']['completed']): ?>
					<img src = "images/16x16/success.png" alt = "#filter:timestamp_time-<?php echo $this->_tpl_vars['course']['to_timestamp']; ?>
#" title = "#filter:timestamp_time-<?php echo $this->_tpl_vars['course']['to_timestamp']; ?>
#">
				<?php else: ?>
					<img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
">
				<?php endif; ?>
			<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'to_timestamp' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "to_timestamp"><?php if ($this->_tpl_vars['user']['has_course']): ?>#filter:timestamp_time-<?php echo $this->_tpl_vars['user']['to_timestamp']; ?>
#<?php endif; ?></td>
<?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "score"><?php if ($this->_tpl_vars['course']['has_course'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['course']['user_type']] == 'student' )): ?><?php if ($this->_tpl_vars['course']['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['course']['score']; ?>
#%<?php else: ?>-<?php endif; ?><?php endif; ?></td>
<?php endif; ?>
<?php if (in_array ( 'operations' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "operations"><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'progress' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo ''; ?><?php if (! $this->_tpl_vars['course']['has_instances'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable'): ?><?php echo '<a href = "'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?ctg=statistics&option=user&sel_user='; ?><?php echo $_GET['sel_user']; ?><?php echo '&specific_course_info=1&course='; ?><?php echo $this->_tpl_vars['course']['id']; ?><?php echo '&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, \''; ?><?php echo @_DETAILS; ?><?php echo '\', 2)"><img class = "handle" src = "images/16x16/information.png" title = "'; ?><?php echo @_DETAILS; ?><?php echo '" alt = "'; ?><?php echo @_DETAILS; ?><?php echo '" /></a>&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'statistics' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_CURRENT_USER']->coreAccess['statistics'] ) || $this->_tpl_vars['T_CURRENT_USER']->coreAccess['statistics'] != 'hidden'): ?><?php echo '<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?ctg=statistics&option=course&sel_course='; ?><?php echo $this->_tpl_vars['course']['id']; ?><?php echo '"><img class = "handle" src = "images/16x16/reports.png" title = "'; ?><?php echo @_STATISTICS; ?><?php echo '" alt = "'; ?><?php echo @_STATISTICS; ?><?php echo '" /></a>&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'settings' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo '<a href = "'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?ctg='; ?><?php if ($_SESSION['s_type'] == 'administrator'): ?><?php echo 'courses'; ?><?php else: ?><?php echo 'lessons'; ?><?php endif; ?><?php echo '&course='; ?><?php echo $this->_tpl_vars['course']['id']; ?><?php echo '&op=course_info"><img class = "handle" src = "images/16x16/generic.png" title = "'; ?><?php echo @_COURSEINFORMATION; ?><?php echo '" alt = "'; ?><?php echo @_COURSEINFORMATION; ?><?php echo '" /></a>'; ?><?php endif; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'propagate' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo '<img class = "ajaxHandle" src = "images/16x16/arrow_right.png" title = "'; ?><?php echo @_PROPAGATECOURSE; ?><?php echo '" alt = "'; ?><?php echo @_PROPAGATECOURSE; ?><?php echo '" onclick = "propagateCourse(this, \''; ?><?php echo $this->_tpl_vars['course']['id']; ?><?php echo '\')"/>'; ?><?php endif; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'delete' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo ''; ?><?php if ($this->_tpl_vars['_change_handles_']): ?><?php echo ''; ?><?php if (( @G_VERSIONTYPE != 'community' )): ?><?php echo ' '; ?><?php echo ''; ?><?php if (( @G_VERSIONTYPE != 'standard' )): ?><?php echo ' '; ?><?php echo '<img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "'; ?><?php echo @_ARCHIVEENTITY; ?><?php echo '" alt = "'; ?><?php echo @_ARCHIVEENTITY; ?><?php echo '" onclick = "archiveCourse(this, \''; ?><?php echo $this->_tpl_vars['course']['id']; ?><?php echo '\')"/>'; ?><?php endif; ?><?php echo ' '; ?><?php echo ''; ?><?php endif; ?><?php echo ' '; ?><?php echo ''; ?><?php if (( @G_VERSIONTYPE != 'enterprise' )): ?><?php echo ' '; ?><?php echo ''; ?><?php if (( @G_VERSIONTYPE != 'educational' )): ?><?php echo ' '; ?><?php echo '<img class = "ajaxHandle" src = "images/16x16/error_delete.png" title = "'; ?><?php echo @_DELETE; ?><?php echo '" alt = "'; ?><?php echo @_DELETE; ?><?php echo '" onclick = "if (confirm(\''; ?><?php echo @_AREYOUSUREYOUWANTTODELETECOURSE; ?><?php echo '\')) deleteCourse(this, \''; ?><?php echo $this->_tpl_vars['course']['id']; ?><?php echo '\');"/>'; ?><?php endif; ?><?php echo ' '; ?><?php echo ''; ?><?php endif; ?><?php echo ' '; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</td>
<?php endif; ?>
<?php if (in_array ( 'has_course' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "has_course">
		    	<?php if ($this->_tpl_vars['_change_handles_']): ?>
		    		<?php if (( ( $this->_tpl_vars['course']['has_course'] && $this->_tpl_vars['course']['has_instances'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>
		    		<input class = "inputCheckBox" type="checkbox" name="<?php echo $this->_tpl_vars['course']['id']; ?>
" checked disabled>
		    		<?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable' || ! $this->_tpl_vars['course']['has_instances']): ?>
		            <input class = "inputCheckBox" type="checkbox" id="course_<?php echo $this->_tpl_vars['course']['id']; ?>
" name="<?php echo $this->_tpl_vars['course']['id']; ?>
" <?php if ($this->_tpl_vars['course']['has_course'] == 1): ?>checked<?php endif; ?> onclick ="ajaxPost('<?php echo $this->_tpl_vars['course']['id']; ?>
', this, 'coursesTable');">
		            <?php endif; ?>
		    	<?php elseif ($this->_tpl_vars['course']['has_course'] == 1): ?>
		    		<?php if (( ( $this->_tpl_vars['course']['has_course'] && $this->_tpl_vars['course']['has_instances'] ) ) && $this->_tpl_vars['T_SORTED_TABLE'] != 'instancesTable'): ?>
		    		<img src = "images/16x16/success.png" class = "inactiveImage" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
">
		    		<?php elseif ($this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable' || ! $this->_tpl_vars['course']['has_instances']): ?>
		    		<img src = "images/16x16/success.png" alt = "<?php echo @_COURSEUSER; ?>
" title = "<?php echo @_COURSEUSER; ?>
">
		            <?php endif; ?>
		    	<?php endif; ?>

	        </td>
<?php endif; ?>
	    </tr>
		<?php endforeach; else: ?>
	    <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "<?php echo sizeof($this->_tpl_vars['T_DATASOURCE_COLUMNS']); ?>
"><?php echo @_NODATAFOUND; ?>
</td></tr>
		<?php endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['courses_list'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
<style>
<?php echo '
table#lessonsTable,table#courseLessonsTable {width:100%;}
table#lessonsTable td.name, table#courseLessons td.name{width:50%;}
table#lessonsTable td.directions_ID,table#courseLessons td.directions_ID{width:15%;}
table#lessonsTable td.active_in_lesson,table#courseLessonsTable td.active_in_lesson{width:5%;text-align:center;}
table#lessonsTable td.user_type, table#courseLessonsTable td.user_type{width:25%;}
table#lessonsTable td.time_in_lesson, table#courseLessons td.time_in_lesson{width:25%;}
table#lessonsTable td.overall_progress,table#courseLessons td.overall_progress{width:5%;text-align:center;}
table#lessonsTable td.test_status, table#courseLessons td.test_status{width:5%;text-align:center;}
table#lessonsTable td.project_status,table#courseLessons td.project_status{width:5%;text-align:center;}
table#lessonsTable td.completed,table#courseLessons td.completed{width:5%;text-align:center;}
table#lessonsTable td.score,table#courseLessons td.score{width:5%;text-align:center;}
table#lessonsTable td.operations,table#courseLessons td.operations{width:5%;text-align:center;}
table#lessonsTable td.has_lesson,table#courseLessons td.has_lesson{width:5%;text-align:center;}
'; ?>

</style>
	    <tr class = "topTitle">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	        <td class = "topTitle name" 			name = "name"><?php echo @_LESSON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'directions_ID' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>   <td class = "topTitle directions_ID"     name = "directions_ID"><?php echo @_PARENTDIRECTIONS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'user_type' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle user_type"   		name = "user_type"><?php echo @_USERTYPE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'active_in_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?><td class = "topTitle active_in_lesson" name = "active_in_lesson"><?php echo @_ENABLED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'time_in_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	<td class = "topTitle time_in_lesson"   name = "time_in_lesson"><?php echo @_TIMEINLESSON; ?>
</td><?php endif; ?>
<?php if (in_array ( 'overall_progress' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?><td class = "topTitle overall_progress" name = "overall_progress"><?php echo @_OVERALLPROGRESS; ?>
</td><?php endif; ?>
		<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
<?php if (in_array ( 'test_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		<td class = "topTitle test_status"	    name = "test_status"><?php echo @_TESTSSCORE; ?>
</td><?php endif; ?>
		<?php endif; ?>
		<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
<?php if (in_array ( 'project_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	<td class = "topTitle project_status"   name = "project_status"><?php echo @_PROJECTSSCORE; ?>
</td><?php endif; ?>
		<?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>		<td class = "topTitle completed" 		name = "completed"><?php echo @_COMPLETED; ?>
</td><?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>			<td class = "topTitle score" 			name = "score"><?php echo @_SCORE; ?>
</td><?php endif; ?>
<?php if (in_array ( 'operations' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle operations noSort"><?php echo @_OPERATIONS; ?>
</td><?php endif; ?>
<?php if (in_array ( 'has_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>	    <td class = "topTitle has_lesson" name = "has_lesson"><?php echo @_STATUS; ?>
</td><?php endif; ?>
	    </tr>
		<?php $_from = $this->_tpl_vars['T_DATA_SOURCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users_to_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users_to_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['lesson']):
        $this->_foreach['users_to_lessons_list']['iteration']++;
?>
		<tr class = "defaultRowHeight <?php echo smarty_function_cycle(array('values' => "oddRowColor, evenRowColor"), $this);?>
 <?php if (! $this->_tpl_vars['lesson']['active']): ?>deactivatedTableElement<?php endif; ?>">
<?php if (in_array ( 'name' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "name">
				<?php if ($this->_tpl_vars['_change_handles_'] && ! $this->_tpl_vars['T_IS_SUPERVISOR']): ?>
				<a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?ctg=lessons&edit_lesson=<?php echo $this->_tpl_vars['lesson']['id']; ?>
" class = "editLink" title = "<?php echo @_EDIT; ?>
"><?php echo $this->_tpl_vars['lesson']['name']; ?>
</a>
				<?php else: ?>
				<span><?php echo $this->_tpl_vars['lesson']['name']; ?>
</span>
				<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'directions_ID' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "directions_ID">
	        	<?php echo $this->_tpl_vars['T_DIRECTION_PATHS'][$this->_tpl_vars['lesson']['directions_ID']]; ?>

	        </td>
<?php endif; ?>
<?php if (in_array ( 'user_type' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
         <td class = "user_type">
       <?php if ($this->_tpl_vars['_change_handles_']): ?>
        <span style = "display:none"><?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']]; ?>
</span>
              <select name = "lesson_type_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" id = "lesson_type_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" onchange = "$('lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
').checked = true;ajaxUserPost('lesson', '<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this);">
            <?php $_from = $this->_tpl_vars['T_ROLES_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['roles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['roles_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['role_key'] => $this->_tpl_vars['role_item']):
        $this->_foreach['roles_list']['iteration']++;
?>
                  <option value = "<?php echo $this->_tpl_vars['role_key']; ?>
" <?php if (! $this->_tpl_vars['lesson']['user_type']): ?><?php if (( $this->_tpl_vars['T_EDITED_USER_TYPE'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php else: ?><?php if (( $this->_tpl_vars['lesson']['user_type'] == $this->_tpl_vars['role_key'] )): ?>selected<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['role_item']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
              </select>
       <?php else: ?>
           <?php echo $this->_tpl_vars['T_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']]; ?>

       <?php endif; ?>
         </td>
<?php endif; ?>
<?php if (in_array ( 'active_in_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "active_in_lesson">
				<?php if (! $this->_tpl_vars['lesson']['active_in_lesson'] && $this->_tpl_vars['lesson']['has_lesson']): ?>
		            <img src = "images/16x16/warning.png" title = "<?php echo @_APPLICATIONPENDING; ?>
" alt = "<?php echo @_APPLICATIONPENDING; ?>
" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
', 'lesson')"<?php endif; ?>/>
	            <?php elseif ($this->_tpl_vars['lesson']['has_lesson']): ?>
		            <img src = "images/16x16/success.png" title = "#filter:timestamp-<?php echo $this->_tpl_vars['lesson']['active_in_lesson']; ?>
#" alt = "<?php echo $this->_tpl_vars['lesson']['active_in_lesson']; ?>
" <?php if ($this->_tpl_vars['_change_handles_']): ?>class = "ajaxHandle" onclick = "toggleUserAccess(this, '<?php echo $this->_tpl_vars['lesson']['id']; ?>
', 'lesson')"<?php endif; ?>/>
	            <?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'time_in_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "time_in_lesson"><span style = "display:none"><?php echo $this->_tpl_vars['lesson']['time_in_lesson']['total_seconds']; ?>
&nbsp;</span><?php echo $this->_tpl_vars['lesson']['time_in_lesson']['time_string']; ?>
</td>
<?php endif; ?>
<?php if (in_array ( 'overall_progress' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "progressCell overall_progress">
			<?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
				<span style = "display:none"><?php echo $this->_tpl_vars['lesson']['overall_progress']['completed']+1000; ?>
</span>
				<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']['overall_progress']['percentage']; ?>
#%</span>
				<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']['overall_progress']['percentage']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
			<?php endif; ?>
			</td>
<?php endif; ?>
			<?php if (((is_array($_tmp='tests')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
<?php if (in_array ( 'test_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
				<td class = "progressCell test_status">
				<?php if ($this->_tpl_vars['lesson']['test_status'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
					<span style = "display:none"><?php echo $this->_tpl_vars['lesson']['test_status']['mean_score']+1000; ?>
</span>
					<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']['test_status']['mean_score']; ?>
#% (<?php echo $this->_tpl_vars['lesson']['test_status']['completed']; ?>
/<?php echo $this->_tpl_vars['lesson']['test_status']['total']; ?>
)</span>
					<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']['test_status']['mean_score']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
				<?php else: ?><div class = "centerAlign">-</div><?php endif; ?>
				</td>
<?php endif; ?>
			<?php endif; ?>
			<?php if (((is_array($_tmp='projects')) ? $this->_run_mod_handler('eF_template_isOptionVisible', true, $_tmp) : smarty_modifier_eF_template_isOptionVisible($_tmp))): ?>
<?php if (in_array ( 'project_status' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
				<td class = "progressCell project_status">
				<?php if ($this->_tpl_vars['lesson']['project_status'] && ( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
					<span style = "display:none"><?php echo $this->_tpl_vars['lesson']['project_status']['mean_score']+1000; ?>
</span>
					<span class = "progressNumber">#filter:score-<?php echo $this->_tpl_vars['lesson']['project_status']['mean_score']; ?>
#% (<?php echo $this->_tpl_vars['lesson']['project_status']['completed']; ?>
/<?php echo $this->_tpl_vars['lesson']['project_status']['total']; ?>
)</span>
					<span class = "progressBar" style = "width:<?php echo $this->_tpl_vars['lesson']['project_status']['mean_score']; ?>
px;">&nbsp;</span>&nbsp;&nbsp;
				<?php else: ?><div class = "centerAlign">-</div><?php endif; ?>
				</td>
<?php endif; ?>
			<?php endif; ?>
<?php if (in_array ( 'completed' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "completed">
			<?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
				<?php if ($this->_tpl_vars['lesson']['completed']): ?><img src = "images/16x16/success.png" alt = "<?php echo @_YES; ?>
" title = "<?php echo @_YES; ?>
"/><?php else: ?><img src = "images/16x16/forbidden.png" alt = "<?php echo @_NO; ?>
" title = "<?php echo @_NO; ?>
"/><?php endif; ?>
			<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'score' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "score">
			<?php if (( ! $this->_tpl_vars['T_BASIC_ROLES_ARRAY'] || $this->_tpl_vars['T_BASIC_ROLES_ARRAY'][$this->_tpl_vars['lesson']['user_type']] == 'student' )): ?>
				<?php if ($this->_tpl_vars['lesson']['completed']): ?>#filter:score-<?php echo $this->_tpl_vars['lesson']['score']; ?>
#%<?php else: ?>-<?php endif; ?>
			<?php endif; ?>
			</td>
<?php endif; ?>
<?php if (in_array ( 'operations' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
			<td class = "operations"><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] ) || in_array ( 'progress' , $this->_tpl_vars['T_DATASOURCE_OPERATIONS'] )): ?><?php echo '<a href = "'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?ctg=statistics&option=user&sel_user='; ?><?php echo $_GET['sel_user']; ?><?php echo '&specific_lesson_info=1&lesson='; ?><?php echo $this->_tpl_vars['lesson']['id']; ?><?php echo '&popup=1" target = "POPUP_FRAME" onclick = "eF_js_showDivPopup(event, \''; ?><?php echo @_DETAILS; ?><?php echo '\', 2)"><img class = "handle" src = "images/16x16/information.png" title = "'; ?><?php echo @_DETAILS; ?><?php echo '" alt = "'; ?><?php echo @_DETAILS; ?><?php echo '" /></a>'; ?><?php endif; ?><?php echo ''; ?>
</td>
<?php endif; ?>
<?php if (in_array ( 'has_lesson' , $this->_tpl_vars['T_DATASOURCE_COLUMNS'] )): ?>
	        <td class = "has_lesson">
		    	<?php if ($this->_tpl_vars['_change_handles_']): ?>
		            <input class = "inputCheckBox" type="checkbox" id="lesson_<?php echo $this->_tpl_vars['lesson']['id']; ?>
" name="<?php echo $this->_tpl_vars['lesson']['id']; ?>
" <?php if ($this->_tpl_vars['lesson']['has_lesson'] == 1): ?>checked<?php endif; ?> onclick ="ajaxPost('<?php echo $this->_tpl_vars['lesson']['id']; ?>
', this, 'lessonsTable');">
		    	<?php else: ?>
		    		<img src = "images/16x16/success.png" alt = "<?php echo @_LESSONUSER; ?>
" title = "<?php echo @_LESSONUSER; ?>
">
		    	<?php endif; ?>

	        </td>
<?php endif; ?>
		</tr>
		<?php endforeach; else: ?>
	    <tr class = "defaultRowHeight oddRowColor"><td class = "emptyCategory" colspan = "<?php echo sizeof($this->_tpl_vars['T_DATASOURCE_COLUMNS']); ?>
"><?php echo @_NODATAFOUND; ?>
</td></tr>
		<?php endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['lessons_list'] = ob_get_contents(); ob_end_clean(); ?>
<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'coursesTable'): ?>
<!--ajax:coursesTable-->
	<table size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
"  order = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_ORDER']; ?>
" activeFilter = "1" id = "coursesTable" class = "sortedTable" useAjax = "1" url = "<?php echo $this->_tpl_vars['courses_url']; ?>
">
	<?php echo $this->_smarty_vars['capture']['courses_list']; ?>

	</table>
<!--/ajax:coursesTable-->
<?php endif; ?>
<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'instancesTable'): ?>
<div id = "filemanager_div" style = "display:none;">
<!--ajax:instancesTable-->
	<table size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
"  order = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_ORDER']; ?>
" activeFilter = "1" id = "instancesTable" class = "sortedTable subSection" no_auto = "1" useAjax = "1" url = "<?php echo $this->_tpl_vars['courses_url']; ?>
">
		<?php echo $this->_smarty_vars['capture']['courses_list']; ?>

	</table>
<!--/ajax:instancesTable-->
</div>
<?php endif; ?>
<?php if (! $this->_tpl_vars['T_SORTED_TABLE'] || $this->_tpl_vars['T_SORTED_TABLE'] == 'courseLessonsTable'): ?>
<div id = "filemanager_div" style = "display:none;">
<!--ajax:courseLessonsTable-->
		<table id = "courseLessonsTable" sortBy = "<?php echo $this->_tpl_vars['T_DATASOURCE_SORT_BY']; ?>
" no_auto = "1" size = "<?php echo $this->_tpl_vars['T_TABLE_SIZE']; ?>
" class = "sortedTable subSection" useAjax = "1" url = "<?php echo $this->_tpl_vars['courses_url']; ?>
">
		<?php echo $this->_smarty_vars['capture']['lessons_list']; ?>

		</table>
<!--/ajax:courseLessonsTable-->
</div>
<?php endif; ?>