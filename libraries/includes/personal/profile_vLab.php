<?php
/**
* vLab Profile Support
*
* This page is used for the functionalities of vLab 
* @package vLab Integration
* @version 1.0.0
*/

//This file cannot be called directly, only included.
/*
* @param mixed $param The parameter to check
* @param string $type The parameter type (One of: login | email)
* @return mixed The parameter, if it is of the specified type, or false otherwise
* @version 1.0.0
*/
function vLab_checkExistingUser($parameter, $type, $correct = false)
{
	// echo "\$parameter is $parameter and \$type is $type";
    switch ($type) {
        case 'login':
            return true;
            break;

        case 'email':
            return true;
            break;

       default:
            break;
    }
    return $parameter;

}
