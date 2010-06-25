<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * if in_dev_mode is true
 *  - Allowes the use of $config['use_mock_ldap'] = true;
 *  - Turns off ssl verification for curl calls to bugzilla
 */
$config['in_dev_mode'] = true;
// if true, will send email to buddy specified in hiring form
$config['send_email'] = true;

$config['bugzilla_url'] = 'BUGZILLA DEV or PROD URL';
$config['ldap_anon_bind'] = '';
$config['ldap_anon_password'] = '';
$config['ldap_host'] = '';
$config['ldap_base_dn'] = '';
/**
 * use_mock_ldap
 * The app in PRODUCTION grabs the ldap username and passwd from the
 * LDAP backed HTTPAuth.
 * If you are testing and not behind this sort of setup, use MockLdap
 * to proxy the 2 LDAP calls and return test data.
 *
 *  - manager_list() Returns the list of manager to populatet the manager
 *    select list in the hiring forms
 *  - manager_attributes() At this point only used in hiring forms to get the
 *    cn and bugzilla email for a given managers email
 *
 * @see Ldap_Mock
 * The app will NOT allow 'use_mock_ldap' to be turned on for IN_PRODUCTION
 */
$config['use_mock_ldap'] = false;
$config['mock_ldap_manager_list'] =
    '{
        "bob1@somewhere.com":{
            "cn":"Bob One", "title":"Number One Bob", "bugzilla_email":"bug-bob1@somewhere.com"
        },
        "bob2@somewhere.com":{
            "cn":"Bob Two", "title":"Number Two Bob", "bugzilla_email":"bug-bob2@somewhere.com"
        }
    }';
/**
 * For the desired from address: "Somebody" <somebody@somewhere.com>
 *   $config['email_from_address'] = 'somebody@somewhere.com'
 *   $config['email_from_label'] = 'Somebody';
 */
$config['buddy_email_from_address'] = 'Someone';
$config['buddy_email_from_label'] = 'someone@somewhere.com';
$config['buddy_email_subject'] = 'Hello';

$config['buddy_email_template'] = <<<XOXO
This is the email Body template with place holders in this form

Dear %email_recipient%,

THis email is to inform you that...
XOXO;

return $config;
