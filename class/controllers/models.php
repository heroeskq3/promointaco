<?php
//class library

//SYSTEM
require_once PATH_MODELS . 'class_conn.php';
require_once PATH_MODELS . 'class_login.php';
require_once PATH_MODELS . 'class_token.php';

require_once PATH_MODELS . 'class_sumavalor.php';

//HEADER
require_once PATH_MODELS . 'class_headersteps.php';

//SCRIPTS
require_once PATH_MODELS . 'class_scripts.php';

//TEMPLATE
require_once PATH_MODELS . 'class_contentarea.php';
require_once PATH_MODELS . 'class_modals.php';

require_once PATH_MODELS . 'class_api.php';
require_once PATH_MODELS . 'class_mysql.php';
require_once PATH_MODELS . 'class_array.php';
require_once PATH_MODELS . 'class_arrayfilter.php';

//CONFIG
require_once PATH_MODELS . 'class_lang.php';
//require_once PATH_MODELS . 'class_config.php'; //en este habiria que tarbajar ahora define basic config VARS

//SITES
require_once PATH_MODELS . 'class_sitesinfo.php';
require_once PATH_MODELS . 'class_siteslist.php';
require_once PATH_MODELS . 'class_sitesadd.php';
require_once PATH_MODELS . 'class_sitesdelete.php';
require_once PATH_MODELS . 'class_sitesupdate.php';

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
require_once PATH_MODELS . 'class_formsurvey.php';
require_once PATH_MODELS . 'class_forminput.php';
require_once PATH_MODELS . 'class_formscripts.php';

//forms buttons
require_once PATH_MODELS . 'class_formbuttons.php';
require_once PATH_MODELS . 'class_formbuttonstype.php';

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
require_once PATH_MODELS . 'class_infosino.php';
require_once PATH_MODELS . 'class_statusIcon.php';

//MENU
require_once PATH_MODELS . 'class_menulist.php';
require_once PATH_MODELS . 'class_menuinfo.php';
require_once PATH_MODELS . 'class_menuadd.php';
require_once PATH_MODELS . 'class_menudelete.php';
require_once PATH_MODELS . 'class_menuupdate.php';
require_once PATH_MODELS . 'class_submenulist.php';

//Survey - zones
require_once PATH_MODELS . 'class_surveyzoneslist.php';
require_once PATH_MODELS . 'class_surveyzonesinfo.php';
require_once PATH_MODELS . 'class_surveyzonesadd.php';
require_once PATH_MODELS . 'class_surveyzonesdelete.php';
require_once PATH_MODELS . 'class_surveyzonesupdate.php';
require_once PATH_MODELS . 'class_surveyzonesname.php';

//Survey - locals
require_once PATH_MODELS . 'class_surveylocalslist.php';
require_once PATH_MODELS . 'class_surveylocalsinfo.php';
require_once PATH_MODELS . 'class_surveylocalsadd.php';
require_once PATH_MODELS . 'class_surveylocalsdelete.php';
require_once PATH_MODELS . 'class_surveylocalsupdate.php';

//Survey - position
require_once PATH_MODELS . 'class_surveypositionlist.php';
require_once PATH_MODELS . 'class_surveypositioninfo.php';
require_once PATH_MODELS . 'class_surveypositionadd.php';
require_once PATH_MODELS . 'class_surveypositiondelete.php';
require_once PATH_MODELS . 'class_surveypositionupdate.php';

//Survey - cares
require_once PATH_MODELS . 'class_surveycareslist.php';
require_once PATH_MODELS . 'class_surveycaresinfo.php';
require_once PATH_MODELS . 'class_surveycaresadd.php';
require_once PATH_MODELS . 'class_surveycaresdelete.php';
require_once PATH_MODELS . 'class_surveycaresupdate.php';


//Survey - Services
require_once PATH_MODELS . 'class_surveyserviceslist.php';
require_once PATH_MODELS . 'class_surveyservicesinfo.php';
require_once PATH_MODELS . 'class_surveyservicesadd.php';
require_once PATH_MODELS . 'class_surveyservicesdelete.php';
require_once PATH_MODELS . 'class_surveyservicesupdate.php';

//Survey
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

//Survey - customers
require_once PATH_MODELS . 'class_surveycustomerslist.php';
require_once PATH_MODELS . 'class_surveycustomersinfo.php';
require_once PATH_MODELS . 'class_surveycustomersadd.php';
require_once PATH_MODELS . 'class_surveycustomersdelete.php';
require_once PATH_MODELS . 'class_surveycustomersupdate.php';
require_once PATH_MODELS . 'class_surveycustomerssessionid.php';

//Survey - front
require_once PATH_MODELS . 'class_survey.php';

//booking
require_once PATH_MODELS . 'class_bookpackagesadd.php';
require_once PATH_MODELS . 'class_bookpackagesupdate.php';
require_once PATH_MODELS . 'class_bookpackagesdelete.php';
require_once PATH_MODELS . 'class_bookpackageslist.php';
require_once PATH_MODELS . 'class_bookpackagesinfo.php';

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

//WELL
require_once PATH_MODELS . 'class_wellgenerator.php';