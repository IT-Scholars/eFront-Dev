<?php /* Smarty version 2.6.27, created on 2014-11-11 14:28:30
         compiled from includes/blocks/expired.tpl */ ?>
<?php echo @_YOURSESSIONHASEXPIREDPLEASE; ?>
 <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?logout=true" target = "_top" style = "color:red"><?php echo @_CLICKHERE; ?>
</a> <?php echo @_TOLOGINAGAIN; ?>
