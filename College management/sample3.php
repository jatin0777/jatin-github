<?php
require_once 'core/init.php';

$userInsert= DB::getInstance()->updateClg('college',22,array(
   'clg_name'=>'worldGlobal',
    'clg_location'=>'dwarka',
    'clg_contact'=>9087987890
));