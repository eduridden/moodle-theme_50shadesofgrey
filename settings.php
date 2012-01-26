<?php
 
/**
 * Settings for the pukunui theme
 */
 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
 
// Top bar setting
$name = 'theme_pukunui/topbar';
$title = get_string('topbar','theme_pukunui');
$description = get_string('topbardesc', 'theme_pukunui');
$setting = new admin_setting_confightmleditor($name, $title, $description, '');
$settings->add($setting);

// Foot note setting
$name = 'theme_pukunui/footnote';
$title = get_string('footnote','theme_pukunui');
$description = get_string('footnotedesc', 'theme_pukunui');
$setting = new admin_setting_confightmleditor($name, $title, $description, '');
$settings->add($setting);
 
// Custom CSS file
$name = 'theme_pukunui/customcss';
$title = get_string('customcss','theme_pukunui');
$description = get_string('customcssdesc', 'theme_pukunui');
$setting = new admin_setting_configtextarea($name, $title, $description, '');
$settings->add($setting);
 
// Add our page to the structure of the admin tree


}
?>