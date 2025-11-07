<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Permission Helper
 * 
 * This helper provides functions to check user permissions
 * throughout the application.
 */

if (!function_exists('has_permission')) {
    /**
     * Check if current user has permission for a specific menu/submenu
     * 
     * @param string $menu Menu name
     * @param string $submenu Submenu name
     * @param string $action Action type (permission, view, edit, delete)
     * @return bool
     */
    function has_permission($menu, $submenu, $action = 'permission') {
        $CI =& get_instance();
        $user_id = $CI->session->userdata('admin_id');
        
        if (!$user_id) {
            return false;
        }
        
        // Check if user_permission table exists
        if (!$CI->db->table_exists('user_permission')) {
            // If table doesn't exist, return true for now (allow access)
            return true;
        }
        
        $CI->load->model('admin/user_model', 'user_model');
        return $CI->user_model->has_permission_enhanced($user_id, $menu, $submenu, $action);
    }
}

if (!function_exists('can_view')) {
    /**
     * Check if user can view a specific menu/submenu
     * 
     * @param string $menu Menu name
     * @param string $submenu Submenu name
     * @return bool
     */
    function can_view($menu, $submenu) {
        $result = has_permission($menu, $submenu, 'permission');
        
        // Debug logging
        $CI =& get_instance();
        $user_id = $CI->session->userdata('admin_id');
        log_message('debug', "can_view for user $user_id, menu '$menu', submenu '$submenu': " . ($result ? 'ALLOWED' : 'DENIED'));
        
        return $result;
    }
}

if (!function_exists('can_edit')) {
    /**
     * Check if user can edit a specific menu/submenu
     * 
     * @param string $menu Menu name
     * @param string $submenu Submenu name
     * @return bool
     */
    function can_edit($menu, $submenu) {
        return has_permission($menu, $submenu, 'permission');
    }
}

if (!function_exists('can_delete')) {
    /**
     * Check if user can delete a specific menu/submenu
     * 
     * @param string $menu Menu name
     * @param string $submenu Submenu name
     * @return bool
     */
    function can_delete($menu, $submenu) {
        return has_permission($menu, $submenu, 'permission');
    }
}

if (!function_exists('get_user_permissions')) {
    /**
     * Get all permissions for current user
     * 
     * @return array
     */
    function get_user_permissions() {
        $CI =& get_instance();
        $user_id = $CI->session->userdata('admin_id');
        
        if (!$user_id) {
            return array();
        }
        
        $CI->load->model('admin/user_model', 'user_model');
        return $CI->user_model->get_user_permissions($user_id);
    }
}

if (!function_exists('check_menu_access')) {
    /**
     * Check if user has access to a menu item
     * 
     * @param string $menu Menu name
     * @return bool
     */
    function check_menu_access($menu) {
        $CI =& get_instance();
        $user_id = $CI->session->userdata('admin_id');
        
        if (!$user_id) {
            return false;
        }
        
        // Check if user_permission table exists
        if (!$CI->db->table_exists('user_permission')) {
            // If table doesn't exist, return true for now (allow access)
            return true;
        }
        
        // Check if user has permission for ANY submenu under this menu
        $CI->db->where('user_id', $user_id);
        $CI->db->where('menu', $menu);
        $CI->db->where('permission', 1);
        $query = $CI->db->get('user_permission');
        
        if ($query === false) {
            return false; // Return false if query fails
        }
        
        $has_access = $query->num_rows() > 0;
        
        // Debug logging
        log_message('debug', "check_menu_access for user $user_id, menu '$menu': " . ($has_access ? 'ALLOWED' : 'DENIED'));
        
        return $has_access;
    }
}
