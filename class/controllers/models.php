<?php
//class library

//SYSTEM
require_once PATH_MODELS . 'class_conn.php';
require_once PATH_MODELS . 'class_login.php';
require_once PATH_MODELS . 'class_token.php';

require_once PATH_MODELS . 'class_sumavalor.php';

//SCRIPTS
require_once PATH_MODELS . 'class_scripts.php';

//TEMPLATE
require_once PATH_MODELS . 'class_contentarea.php';
require_once PATH_MODELS . 'class_modals.php';

require_once PATH_MODELS . 'class_api.php';
require_once PATH_MODELS . 'class_mysql.php';
require_once PATH_MODELS . 'class_array.php';

//CONFIG
require_once PATH_MODELS . 'class_lang.php';
//require_once PATH_MODELS . 'class_config.php'; //en este habiria que tarbajar ahora define basic config VARS

//USERS
require_once PATH_MODELS . 'class_usersinfo.php';
require_once PATH_MODELS . 'class_userslist.php';
require_once PATH_MODELS . 'class_usersadd.php';
require_once PATH_MODELS . 'class_usersdelete.php';
require_once PATH_MODELS . 'class_usersupdate.php';
require_once PATH_MODELS . 'class_userspasswordupdate.php';

//USERS TYPE
require_once PATH_MODELS . 'class_userstypeinfo.php';
require_once PATH_MODELS . 'class_userstypeadd.php';
require_once PATH_MODELS . 'class_userstypeupdate.php';
require_once PATH_MODELS . 'class_userstypedelete.php';
require_once PATH_MODELS . 'class_userstypelist.php';

//USERS DETAILS
require_once PATH_MODELS . 'class_usersdetailsadd.php';
require_once PATH_MODELS . 'class_usersdetailsupdate.php';
require_once PATH_MODELS . 'class_usersdetailsdelete.php';
require_once PATH_MODELS . 'class_usersdetailsinfo.php';
require_once PATH_MODELS . 'class_usersdetailslist.php';

//COUNTRY
require_once PATH_MODELS . 'class_countrylist.php';

//STATE
require_once PATH_MODELS . 'class_statelist.php';

//MENU ASSIDE
require_once PATH_MODELS . 'class_assidemenulist.php';
require_once PATH_MODELS . 'class_assidesubmenulist.php';
require_once PATH_MODELS . 'class_assideprivilegeslist.php';

//DEBUGGER
require_once PATH_MODELS . 'class_debug.php';
require_once PATH_MODELS . 'class_phperror.php';

//UPLOAD FILES
require_once PATH_MODELS . 'class_filesupload.php';

//FORMS
require_once PATH_MODELS . 'class_formgenerator.php';
require_once PATH_MODELS . 'class_formgenerator2.php';
require_once PATH_MODELS . 'class_forminput.php';
require_once PATH_MODELS . 'class_formbuttons.php';
require_once PATH_MODELS . 'class_formscripts.php';

//TABLES
require_once PATH_MODELS . 'class_tablegenerator.php';
require_once PATH_MODELS . 'class_tablepager.php';
require_once PATH_MODELS . 'class_tablemain.php';
require_once PATH_MODELS . 'class_tablechilds.php';
require_once PATH_MODELS . 'class_tablescripts.php';
require_once PATH_MODELS . 'class_datatable.php';

//TABLES - MENU
require_once PATH_MODELS . 'class_tablemenulist.php';
require_once PATH_MODELS . 'class_tablesubmenulist.php';

//TABLES - USERS
require_once PATH_MODELS . 'class_tableuserslist.php';

//TABLES - USERS TYPE
require_once PATH_MODELS . 'class_tableuserstypelist.php';

//STATUS
require_once PATH_MODELS . 'class_statusInfo.php';
require_once PATH_MODELS . 'class_statusIcon.php';

//MENU
require_once PATH_MODELS . 'class_menulist.php';
require_once PATH_MODELS . 'class_menuinfo.php';
require_once PATH_MODELS . 'class_menuadd.php';
require_once PATH_MODELS . 'class_menudelete.php';
require_once PATH_MODELS . 'class_menuupdate.php';
require_once PATH_MODELS . 'class_submenulist.php';

//survey sys
require_once PATH_MODELS . 'class_surveybuttons.php';

//Survey - Services
require_once PATH_MODELS . 'class_surveylist.php';
require_once PATH_MODELS . 'class_surveyinfo.php';
require_once PATH_MODELS . 'class_surveyadd.php';
require_once PATH_MODELS . 'class_surveydelete.php';
require_once PATH_MODELS . 'class_surveyupdate.php';
require_once PATH_MODELS . 'class_surveyserviceslist.php';

//Survey - Questions
require_once PATH_MODELS . 'class_surveyquestionslist.php';
require_once PATH_MODELS . 'class_surveyquestionsinfo.php';
require_once PATH_MODELS . 'class_surveyquestionsadd.php';
require_once PATH_MODELS . 'class_surveyquestionsdelete.php';
require_once PATH_MODELS . 'class_surveyquestionsupdate.php';

//Survey - Answers
require_once PATH_MODELS . 'class_surveyanswerslist.php';
require_once PATH_MODELS . 'class_surveyanswersinfo.php';
require_once PATH_MODELS . 'class_surveyanswersadd.php';
require_once PATH_MODELS . 'class_surveyanswersdelete.php';
require_once PATH_MODELS . 'class_surveyanswersupdate.php';

//PRIVILEGES
require_once PATH_MODELS . 'class_privilegesinfo.php';
require_once PATH_MODELS . 'class_privilegeslist.php';
require_once PATH_MODELS . 'class_privilegesadd.php';
require_once PATH_MODELS . 'class_privilegesupdate.php';
require_once PATH_MODELS . 'class_privilegesdelete.php';

//CUSTOMERS
require_once PATH_MODELS . 'class_customersinfo.php';
require_once PATH_MODELS . 'class_customerslist.php';
require_once PATH_MODELS . 'class_customersadd.php';
require_once PATH_MODELS . 'class_customersupdate.php';
require_once PATH_MODELS . 'class_customersdelete.php';

//ICONS
require_once PATH_MODELS . 'class_iconslist.php';

//SECTIONS
require_once PATH_MODELS . 'class_sectioninfo.php';

//CUSTOM SECTIONS
/*
//SECTIONS - VISITS
require_once PATH_MODELS . 'class_visitslist.php';
require_once PATH_MODELS . 'class_visitsadd.php';
require_once PATH_MODELS . 'class_visitsdel.php';
require_once PATH_MODELS . 'class_visitsupdate.php';

//SECTIONS - CUSTOMERS
require_once PATH_MODELS . 'class_customerslist.php';
require_once PATH_MODELS . 'class_customersadd.php';
require_once PATH_MODELS . 'class_customersdel.php';
require_once PATH_MODELS . 'class_customersupdate.php';

//SECTIONS - AGENTS
require_once PATH_MODELS . 'class_agentslist.php';
require_once PATH_MODELS . 'class_agentsadd.php';
require_once PATH_MODELS . 'class_agentsdel.php';
require_once PATH_MODELS . 'class_agentsupdate.php';


//SECTIONS - NOTIFY
require_once PATH_MODELS . 'class_notify.php';

//SECTIONS - REPORTS
require_once PATH_MODELS . 'class_resports.php';

//SECTIONS - HOME
require_once PATH_MODELS . 'class_dashboard.php';
*/