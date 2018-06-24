<?php
//SYSTEM
$namespace = 'mysql';
require_once PATH_MODELS.$namespace. '/class_mysql.php';
require_once PATH_MODELS.$namespace. '/class_conn.php';

$namespace = 'login';
require_once PATH_MODELS.$namespace. '/class_login.php';

$namespace = 'token';
require_once PATH_MODELS.$namespace. '/class_token.php';

$namespace = 'functions';
require_once PATH_MODELS.$namespace. '/class_sumavalor.php';
require_once PATH_MODELS.$namespace. '/class_statusInfo.php';
require_once PATH_MODELS.$namespace. '/class_statusfinish.php';
require_once PATH_MODELS.$namespace. '/class_infosino.php';
require_once PATH_MODELS.$namespace. '/class_statusIcon.php';
//require_once PATH_MODELS.$namespace. '/class_statusperiod.php';

//SCRIPTS
$namespace = 'scripts';
require_once PATH_MODELS.$namespace. '/class_scripts.php';

//TEMPLATE
$namespace = 'contents';
require_once PATH_MODELS.$namespace. '/class_contentarea.php';

$namespace = 'modals';
require_once PATH_MODELS.$namespace. '/class_modals.php';

$namespace = 'api';
require_once PATH_MODELS.$namespace. '/class_api.php';

$namespace = 'array';
require_once PATH_MODELS.$namespace. '/class_array.php';
require_once PATH_MODELS.$namespace. '/class_arrayfilter.php';
require_once PATH_MODELS.$namespace. '/class_arraylimit.php';
require_once PATH_MODELS.$namespace. '/class_arrayrandom.php';
require_once PATH_MODELS.$namespace. '/class_arraysort.php';

//CONFIG
$namespace = 'lang';
require_once PATH_MODELS.$namespace. '/class_lang.php';

//SITES
$namespace = 'sites';
require_once PATH_MODELS.$namespace. '/class_sitesinfo.php';
require_once PATH_MODELS.$namespace. '/class_siteslist.php';
require_once PATH_MODELS.$namespace. '/class_sitesadd.php';
require_once PATH_MODELS.$namespace. '/class_sitesdelete.php';
require_once PATH_MODELS.$namespace. '/class_sitesupdate.php';

//USERS
$namespace = 'users';
require_once PATH_MODELS.$namespace. '/class_usersinfo.php';
require_once PATH_MODELS.$namespace. '/class_userslist.php';
require_once PATH_MODELS.$namespace. '/class_usersadd.php';
require_once PATH_MODELS.$namespace. '/class_usersdelete.php';
require_once PATH_MODELS.$namespace. '/class_usersupdate.php';
require_once PATH_MODELS.$namespace. '/class_userspasswordupdate.php';

//USERSTYPE
$namespace = 'userstype';
require_once PATH_MODELS.$namespace. '/class_userstypeinfo.php';
require_once PATH_MODELS.$namespace. '/class_userstypeadd.php';
require_once PATH_MODELS.$namespace. '/class_userstypeupdate.php';
require_once PATH_MODELS.$namespace. '/class_userstypedelete.php';
require_once PATH_MODELS.$namespace. '/class_userstypelist.php';

//USERSDETAILS
$namespace = 'usersdetails';
require_once PATH_MODELS.$namespace. '/class_usersdetailsadd.php';
require_once PATH_MODELS.$namespace. '/class_usersdetailsupdate.php';
require_once PATH_MODELS.$namespace. '/class_usersdetailsdelete.php';
require_once PATH_MODELS.$namespace. '/class_usersdetailsinfo.php';
require_once PATH_MODELS.$namespace. '/class_usersdetailslist.php';

//COUNTRY
$namespace = 'country';
require_once PATH_MODELS.$namespace. '/class_countrylist.php';
require_once PATH_MODELS.$namespace. '/class_statelist.php';

//MENUASSIDE
$namespace = 'asside'; 
require_once PATH_MODELS.$namespace. '/class_assidemenulist.php';
require_once PATH_MODELS.$namespace. '/class_assidesubmenulist.php';
require_once PATH_MODELS.$namespace. '/class_assideprivilegeslist.php';

//DEBUGGER
$namespace = 'debug';
require_once PATH_MODELS.$namespace. '/class_debug.php';
require_once PATH_MODELS.$namespace. '/class_phperror.php';

//UPLOADFILES
$namespace = 'upload';
require_once PATH_MODELS.$namespace. '/class_filesupload.php';

//FORMS
$namespace = 'forms';
require_once PATH_MODELS.$namespace. '/class_formgenerator.php';
require_once PATH_MODELS.$namespace. '/class_formgenerator2.php';
require_once PATH_MODELS.$namespace. '/class_formsurvey.php';
require_once PATH_MODELS.$namespace. '/class_forminput.php';
require_once PATH_MODELS.$namespace. '/class_formscripts.php';
require_once PATH_MODELS.$namespace. '/class_formbuttons.php';
require_once PATH_MODELS.$namespace. '/class_formbuttonstype.php';

//TABLES
$namespace = 'tables';
require_once PATH_MODELS.$namespace. '/class_tablegenerator.php';
require_once PATH_MODELS.$namespace. '/class_tablegenerator3.php';
require_once PATH_MODELS.$namespace. '/class_tablepager.php';
require_once PATH_MODELS.$namespace. '/class_tablemain.php';
require_once PATH_MODELS.$namespace. '/class_tablechilds.php';
require_once PATH_MODELS.$namespace. '/class_tablescripts.php';
require_once PATH_MODELS.$namespace. '/class_datatable.php';
require_once PATH_MODELS.$namespace. '/class_tablemenulist.php';
require_once PATH_MODELS.$namespace. '/class_tablesubmenulist.php';
require_once PATH_MODELS.$namespace. '/class_tableuserslist.php';
require_once PATH_MODELS.$namespace. '/class_tableuserstypelist.php';

//MENU
$namespace = 'menu';
require_once PATH_MODELS.$namespace. '/class_menulist.php';
require_once PATH_MODELS.$namespace. '/class_menuinfo.php';
require_once PATH_MODELS.$namespace. '/class_menuadd.php';
require_once PATH_MODELS.$namespace. '/class_menudelete.php';
require_once PATH_MODELS.$namespace. '/class_menuupdate.php';
require_once PATH_MODELS.$namespace. '/class_submenulist.php';
require_once PATH_MODELS.$namespace. '/class_iconslist.php';

//PRIVILEGES
$namespace = 'privileges';
require_once PATH_MODELS.$namespace. '/class_privilegesinfo.php';
require_once PATH_MODELS.$namespace. '/class_privilegeslist.php';
require_once PATH_MODELS.$namespace. '/class_privilegesadd.php';
require_once PATH_MODELS.$namespace. '/class_privilegesupdate.php';
require_once PATH_MODELS.$namespace. '/class_privilegesdelete.php';

//WELL
$namespace = 'well';
require_once PATH_MODELS.$namespace. '/class_wellgenerator.php';

//reports
$namespace = 'reports';
require_once PATH_MODELS.$namespace. '/class_reportssearchbar.php';
require_once PATH_MODELS.$namespace. '/class_reportsgenerator.php';
require_once PATH_MODELS.$namespace. '/class_reportstable.php';
require_once PATH_MODELS.$namespace. '/class_reportsresume.php';
require_once PATH_MODELS.$namespace. '/class_reportsquery.php';
require_once PATH_MODELS.$namespace. '/class_reportsorder.php';
require_once PATH_MODELS.$namespace. '/class_reportslimit.php';

//surveys
$namespace = 'survey/surveys/';
require_once PATH_MODELS.$namespace. 'class_surveyinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveylist.php';
require_once PATH_MODELS.$namespace. 'class_surveyadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveydelete.php';

//surveyservices
$namespace = 'survey/services/';
require_once PATH_MODELS.$namespace. 'class_surveyservicesinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyserviceslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyservicesadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyservicesupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyservicesdelete.php';

//surveyzones
$namespace = 'survey/zones/';
require_once PATH_MODELS.$namespace. 'class_surveyzonesinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyzoneslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyzonesadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyzonesupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyzonesdelete.php';

//surveylocals
$namespace = 'survey/locals/';
require_once PATH_MODELS.$namespace. 'class_surveylocalsinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveylocalslist.php';
require_once PATH_MODELS.$namespace. 'class_surveylocalsadd.php';
require_once PATH_MODELS.$namespace. 'class_surveylocalsupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveylocalsdelete.php';

//surveycares
$namespace = 'survey/cares/';
require_once PATH_MODELS.$namespace. 'class_surveycaresinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveycareslist.php';
require_once PATH_MODELS.$namespace. 'class_surveycaresadd.php';
require_once PATH_MODELS.$namespace. 'class_surveycaresupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveycaresdelete.php';

//surveypositions
$namespace = 'survey/positions/';
require_once PATH_MODELS.$namespace. 'class_surveypositionsinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveypositionslist.php';
require_once PATH_MODELS.$namespace. 'class_surveypositionsadd.php';
require_once PATH_MODELS.$namespace. 'class_surveypositionsupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveypositionsdelete.php';

//surveypositions
$namespace = 'survey/workareas/';
require_once PATH_MODELS.$namespace. 'class_surveyworkareasinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyworkareaslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyworkareasadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyworkareasupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyworkareasdelete.php';

//surveyprofessions
$namespace = 'survey/professions/';
require_once PATH_MODELS.$namespace. 'class_surveyprofessionsinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyprofessionslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyprofessionsadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyprofessionsupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyprofessionsdelete.php';

//surveyquestions
$namespace = 'survey/questions/';
require_once PATH_MODELS.$namespace. 'class_surveyquestionsinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyquestionslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyquestionsadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyquestionsupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyquestionsdelete.php';

//surveyanswers
$namespace = 'survey/answers/';
require_once PATH_MODELS.$namespace. 'class_surveyanswersinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyanswerslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyanswersadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyanswersupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyanswersdelete.php';

//surveyresults
$namespace = 'survey/results/';
require_once PATH_MODELS.$namespace. 'class_surveyresultsinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveyresultslist.php';
require_once PATH_MODELS.$namespace. 'class_surveyresultsadd.php';
require_once PATH_MODELS.$namespace. 'class_surveyresultsupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveyresultsdelete.php';
require_once PATH_MODELS.$namespace. 'class_surveyresultsanswers.php';

//surveyanswersfinish
$namespace = 'survey/cronjob/';
require_once PATH_MODELS.$namespace. 'class_surveyanswersfinish.php';
require_once PATH_MODELS.$namespace. 'class_surveyanswerscustomers.php';

//surveycustomers
$namespace = 'survey/customers/';
require_once PATH_MODELS.$namespace. 'class_surveycustomersinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveycustomerslist.php';
require_once PATH_MODELS.$namespace. 'class_surveycustomersadd.php';
require_once PATH_MODELS.$namespace. 'class_surveycustomersupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveycustomersdelete.php';
require_once PATH_MODELS.$namespace. 'class_surveycustomerssessionid.php';

//surveybanners
$namespace = 'survey/banners/';
require_once PATH_MODELS.$namespace. 'class_surveybannersinfo.php';
require_once PATH_MODELS.$namespace. 'class_surveybannerslist.php';
require_once PATH_MODELS.$namespace. 'class_surveybannersadd.php';
require_once PATH_MODELS.$namespace. 'class_surveybannersupdate.php';
require_once PATH_MODELS.$namespace. 'class_surveybannersdelete.php';

//site
$namespace = 'survey/site/';
require_once PATH_MODELS.$namespace. 'class_headersteps.php';
require_once PATH_MODELS.$namespace. 'class_survey.php';