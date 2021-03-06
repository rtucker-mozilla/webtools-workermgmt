<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * General helper for the forms involved in hiring.
 *
 * @author     	original: Sam Keen
 * @version		v.0.1
 * @license    http://www.opensource.org/licenses/mit-license.php
 */
class Form_Helper {


    /**
     * Foreach manager in array, builds their display name
     *  depending on what info is available.
     *
     * @param array $managers
     * @return array
     */
    public static function format_manager_list(array $managers, $add_empty_first='Select...') {
        foreach($managers as $manager_email => &$manager_info) {
            $manager_info = !empty($manager_info['title'])
                    ? "{$manager_info['cn']} - {$manager_info['title']}"
                    : $manager_info['cn'];
        }
        if($add_empty_first) {
            $managers = array(''=>$add_empty_first)+$managers;
        }
        return $managers;
    }
	/**
     * Foreach country in array, builds their display name
     *  depending on what info is available.
     *
     * @param array $country_currency_list
	 * @param boolean $add_empty_first
     * @return array
     */
	public static function format_country_list(array $country_currency_list, $add_empty_first='Select...') {
		foreach ($country_currency_list as $sKey=>&$aValue) {
			$aValue = $sKey;
		}
		if($add_empty_first) {
            $country_currency_list = array(''=>$add_empty_first)+$country_currency_list;
        }
		return $country_currency_list;
	}
    /**
     * For non DB backed lookup lists used to populate UI elements like selects
     * and radio groups. THe submitted value is checked against the list array
     * need to in order to disallow values not in that list.
     *
     * @param array $select_lists This is the array af all the select lists for
     *  the controller. They are the lookup list that populated a select list or
     *  radio group in the UI.
     *  ex: $select_lists = array(
     *   'employee_type' => array(
     *       ""  => "Select ...",
     *       "Employee" => "Employee",
     *       "Intern" =>  "Intern"
     *   ),...
     * @return void
     */
    public static function filter_disallowed_values($select_lists) {
        if(is_array($select_lists) && $select_lists) {
            foreach ($select_lists as $post_key => $select_list) {
                $submitted_value = isset($_POST[$post_key]) ? trim($_POST[$post_key]) : null;
                $_POST[$post_key]= key_exists($post_key, $select_lists) && key_exists($submitted_value, $select_lists[$post_key])
                    ? $submitted_value
                    : null;
            }
        }
    }
}
