<?php
//DEBUGGER SESSION
$debug = null;
if (isset($_SESSION['debug'])) {
    $debug = $_SESSION['debug'];
}
$phperror = null;
if (isset($_SESSION['phperror'])) {
    $phperror = $_SESSION['phperror'];
}

//PRIVIL
$Add = null;
if (isset($_POST['Add'])) {
    $Add = (int) $_POST['Add'];
}
$Update = null;
if (isset($_POST['Update'])) {
    $Update = (int) $_POST['Update'];
}
$Delete = null;
if (isset($_POST['Delete'])) {
    $Delete = (int) $_POST['Delete'];
}

//USERS DETAILS
$UsersId = null;
if (isset($_POST['UsersId'])) {
    $UsersId = (int) $_POST['UsersId'];
}
$FirstName = null;
if (isset($_POST['FirstName'])) {
    $FirstName = htmlspecialchars($_POST['FirstName']);
}
$LastName = null;
if (isset($_POST['LastName'])) {
    $LastName = htmlspecialchars($_POST['LastName']);
}
$MiddleName = null;
if (isset($_POST['MiddleName'])) {
    $MiddleName = htmlspecialchars($_POST['MiddleName']);
}
$Company = null;
if (isset($_POST['Company'])) {
    $Company = htmlspecialchars($_POST['Company']);
}
$Phone = null;
if (isset($_POST['Phone'])) {
    $Phone = $_POST['Phone'];
}
$Phone2 = null;
if (isset($_POST['Phone2'])) {
    $Phone2 = $_POST['Phone2'];
}
$Mobile = null;
if (isset($_POST['Mobile'])) {
    $Mobile = $_POST['Mobile'];
}
$Email = null;
if (isset($_POST['Email'])) {
    $Email = htmlspecialchars($_POST['Email']);
}
$Country = null;
if (isset($_POST['Country'])) {
    $Country = $_POST['Country'];
}
$State = null;
if (isset($_POST['State'])) {
    $State = $_POST['State'];
}
$City = null;
if (isset($_POST['City'])) {
    $City = $_POST['City'];
}
$Address = null;
if (isset($_POST['Address'])) {
    $Address = $_POST['Address'];
}
$Details = null;
if (isset($_POST['Details'])) {
    $Details = $_POST['Details'];
}
$Responsible = null;
if (isset($_POST['Responsible'])) {
    $Responsible = $_POST['Responsible'];
}
$CustomInfo1 = null;
if (isset($_POST['CustomInfo1'])) {
    $CustomInfo1 = $_POST['CustomInfo1'];
}
$CustomInfo2 = null;
if (isset($_POST['CustomInfo2'])) {
    $CustomInfo2 = $_POST['CustomInfo2'];
}
$CustomInfo3 = null;
if (isset($_POST['CustomInfo3'])) {
    $CustomInfo3 = $_POST['CustomInfo3'];
}
$CustomInfo4 = null;
if (isset($_POST['CustomInfo4'])) {
    $CustomInfo4 = $_POST['CustomInfo4'];
}
$CustomInfo5 = null;
if (isset($_POST['CustomInfo5'])) {
    $CustomInfo5 = $_POST['CustomInfo5'];
}
$Image = null;
if (isset($_POST['Image'])) {
    $Image = htmlspecialchars($_POST['Image']);
}
$Status = null;
if (isset($_POST['Status'])) {
    $Status = htmlspecialchars($_POST['Status']);
}
$FormId = null;
if (isset($_POST['FormId'])) {
    $FormId = htmlspecialchars($_POST['FormId']);
}

//USERS
$UsersIndex = null;
if (isset($_POST['UsersIndex'])) {
    $UsersIndex = (int) $_POST['UsersIndex'];
}
$UserName = null;
if (isset($_POST['UserName'])) {
    $UserName = htmlspecialchars($_POST['UserName']);
}
$Password = null;
if (isset($_POST['Password'])) {
    $Password = htmlspecialchars($_POST['Password']);
}
$OwnerId = null;
if (isset($_POST['OwnerId'])) {
    $OwnerId = ($_POST['OwnerId']);
}
$TypeId = null;
if (isset($_POST['TypeId'])) {
    $TypeId = ($_POST['TypeId']);
}

//USERS TYPE
$Report = null;
if (isset($_POST['Report'])) {
    $Report = ($_POST['Report']);
}
$Customer = null;
if (isset($_POST['Customer'])) {
    $Customer = ($_POST['Customer']);
}
$Agent = null;
if (isset($_POST['Agent'])) {
    $Agent = ($_POST['Agent']);
}
$Supervisor = null;
if (isset($_POST['Supervisor'])) {
    $Supervisor = ($_POST['Supervisor']);
}
$Admin = null;
if (isset($_POST['Admin'])) {
    $Admin = ($_POST['Admin']);
}

//FORM ACTIONS
$form_add = null;
if (isset($_POST['form_add'])) {
    $form_add = $_POST['form_add'];
}
$form_update = null;
if (isset($_POST['form_update'])) {
    $form_update = $_POST['form_update'];
}
$form_qnty = null;
if (isset($_POST['form_qnty'])) {
    $form_qnty = $_POST['form_qnty'];
}

//ADMIN
$Id = null;
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
}
$action = null;
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//ADMIN - MENU ADD
$Name = null;
if (isset($_POST['Name'])) {
    $Name = $_POST['Name'];
}
$Description = null;
if (isset($_POST['Description'])) {
    $Description = $_POST['Description'];
}
$Url = null;
if (isset($_POST['Url'])) {
    $Url = $_POST['Url'];
}
$MenuId = null;
if (isset($_POST['MenuId'])) {
    $MenuId = $_POST['MenuId'];
}
$Icon = null;
if (isset($_POST['Icon'])) {
    $Icon = $_POST['Icon'];
}
$Order = null;
if (isset($_POST['Order'])) {
    $Order = $_POST['Order'];
}
$Status = null;
if (isset($_POST['Status'])) {
    $Status = $_POST['Status'];
}

//survey
$ServicesId = null;
if (isset($_POST['ServicesId'])) {
    $ServicesId = $_POST['ServicesId'];
}
$Rows = 1;
if (isset($_POST['Rows'])) {
    $Rows = $_POST['Rows'];
}
$Question = null;
if (isset($_POST['Question'])) {
    $Question = $_POST['Question'];
}
$Answer = null;
if (isset($_POST['Answer'])) {
    $Answer = $_POST['Answer'];
}
$AnswerId = null;
if (isset($_POST['AnswerId'])) {
    $AnswerId = $_POST['AnswerId'];
}

//answers by rows
$AnswerId_0 = null;
if (isset($_POST['AnswerId_0'])) {
    $AnswerId_0 = $_POST['AnswerId_0'];
}
$AnswerId_1 = null;
if (isset($_POST['AnswerId_1'])) {
    $AnswerId_1 = $_POST['AnswerId_1'];
}
$AnswerId_2 = null;
if (isset($_POST['AnswerId_2'])) {
    $AnswerId_2 = $_POST['AnswerId_2'];
}
$AnswerId_3 = null;
if (isset($_POST['AnswerId_3'])) {
    $AnswerId_3 = $_POST['AnswerId_3'];
}
$AnswerId_4 = null;
if (isset($_POST['AnswerId_4'])) {
    $AnswerId_4 = $_POST['AnswerId_4'];
}
$AnswerId_5 = null;
if (isset($_POST['AnswerId_5'])) {
    $AnswerId_5 = $_POST['AnswerId_5'];
}
$AnswerId_6 = null;
if (isset($_POST['AnswerId_6'])) {
    $AnswerId_6 = $_POST['AnswerId_6'];
}
$AnswerId_7 = null;
if (isset($_POST['AnswerId_7'])) {
    $AnswerId_7 = $_POST['AnswerId_7'];
}
$AnswerId_8 = null;
if (isset($_POST['AnswerId_8'])) {
    $AnswerId_8 = $_POST['AnswerId_8'];
}
$AnswerId_9 = null;
if (isset($_POST['AnswerId_9'])) {
    $AnswerId_9 = $_POST['AnswerId_9'];
}
$AnswerId_10 = null;
if (isset($_POST['AnswerId_10'])) {
    $AnswerId_10 = $_POST['AnswerId_10'];
}



$SurveyId = null;
if (isset($_POST['SurveyId'])) {
    $SurveyId = $_POST['SurveyId'];
}
$QuestionId = null;
if (isset($_POST['QuestionId'])) {
    $QuestionId = $_POST['QuestionId'];
}
$Details = null;
if (isset($_POST['Details'])) {
    $Details = $_POST['Details'];
}
$Points = null;
if (isset($_POST['Points'])) {
    $Points = $_POST['Points'];
}

//Customers
$Identification = null;
if (isset($_POST['Identification'])) {
    $Identification = $_POST['Identification'];
}
$Position = null;
if (isset($_POST['Position'])) {
    $Position = $_POST['Position'];
}
$PositionId = null;
if (isset($_POST['PositionId'])) {
    $PositionId = $_POST['PositionId'];
}
$WorkareaId = null;
if (isset($_POST['WorkareaId'])) {
    $WorkareaId = $_POST['WorkareaId'];
}
$Workarea = null;
if (isset($_POST['Workarea'])) {
    $Workarea = $_POST['Workarea'];
}
$Profession = null;
if (isset($_POST['Profession'])) {
    $Profession = $_POST['Profession'];
}
$ProfessionId = null;
if (isset($_POST['ProfessionId'])) {
    $ProfessionId = $_POST['ProfessionId'];
}
//survey front
$step_1 = 1;
if (isset($_POST['step_1'])) {
    $step_1 = $_POST['step_1'];
}
$step_2 = 1;
if (isset($_POST['step_2'])) {
    $step_2 = $_POST['step_2'];
}
$step_3 = 1;
if (isset($_POST['step_3'])) {
    $step_3 = $_POST['step_3'];
}
$step_4 = 1;
if (isset($_POST['step_4'])) {
    $step_4 = $_POST['step_4'];
}
$step_5 = 1;
if (isset($_POST['step_5'])) {
    $step_5 = $_POST['step_5'];
}
$step_6 = 1;
if (isset($_POST['step_6'])) {
    $step_6 = $_POST['step_6'];
}

$button = null;
if (isset($_POST['button'])) {
    $button = $_POST['button'];
}

//sessions
$Country = $Country;
if (isset($_SESSION['Country'])) {
    $Country = $_SESSION['Country'];
}
$SurveyId = $SurveyId;
if (isset($_SESSION['SurveyId'])) {
    $SurveyId = $_SESSION['SurveyId'];
}
$ServicesId = null;
if (isset($_POST['ServicesId'])) {
    $ServicesId = $_POST['ServicesId'];
}
$ServicesId = $ServicesId;
if (isset($_SESSION['ServicesId'])) {
    $ServicesId = $_SESSION['ServicesId'];
}

//Booking
$PackCode = null;
if (isset($_POST['PackCode'])) {
    $PackCode = $_POST['PackCode'];
}
$VigenciaAl = null;
if (isset($_POST['VigenciaAl'])) {
    $VigenciaAl = $_POST['VigenciaAl'];
}
$VigenciaDel = null;
if (isset($_POST['VigenciaDel'])) {
    $VigenciaDel = $_POST['VigenciaDel'];
}
$SectorId = null;
if (isset($_POST['SectorId'])) {
    $SectorId = $_POST['SectorId'];
}
$IS = null;
if (isset($_POST['IS'])) {
    $IS = $_POST['IS'];
}
$IV = null;
if (isset($_POST['IV'])) {
    $IV = $_POST['IV'];
}
$Price = null;
if (isset($_POST['Price'])) {
    $Price = $_POST['Price'];
}

//SITES
$Favicon = null;
if (isset($_POST['Favicon'])) {
    $Favicon = $_POST['Favicon'];
}
$LogoFooter = null;
if (isset($_POST['LogoFooter'])) {
    $LogoFooter = $_POST['LogoFooter'];
}
$LogoHeader = null;
if (isset($_POST['LogoHeader'])) {
    $LogoHeader = $_POST['LogoHeader'];
}
$BgImage = null;
if (isset($_POST['BgImage'])) {
    $BgImage = $_POST['BgImage'];
}
$BgColor = null;
if (isset($_POST['BgColor'])) {
    $BgColor = $_POST['BgColor'];
}
$MetaKeywords = null;
if (isset($_POST['MetaKeywords'])) {
    $MetaKeywords = $_POST['MetaKeywords'];
}
$MetaDescription = null;
if (isset($_POST['MetaDescription'])) {
    $MetaDescription = $_POST['MetaDescription'];
}
$MetaTittle = null;
if (isset($_POST['MetaTittle'])) {
    $MetaTittle = $_POST['MetaTittle'];
}
$BgColor = null;
if (isset($_POST['BgColor'])) {
    $BgColor = $_POST['BgColor'];
}
$BgImage = null;
if (isset($_POST['BgImage'])) {
    $BgImage = $_POST['BgImage'];
}
$ThemeId = null;
if (isset($_POST['ThemeId'])) {
    $ThemeId = $_POST['ThemeId'];
}
$Language = null;
if (isset($_POST['Language'])) {
    $Language = $_POST['Language'];
}

$CustomersId = null;
if (isset($_POST['CustomersId'])) {
    $CustomersId = $_POST['CustomersId'];
}

$ZonesId = null;
if (isset($_POST['ZonesId'])) {
    $ZonesId = $_POST['ZonesId'];
}
$TermsId = null;
if (isset($_POST['TermsId'])) {
    $TermsId = $_POST['TermsId'];
}
$TermsOk = null;
if (isset($_POST['TermsOk'])) {
    $TermsOk = $_POST['TermsOk'];
}
$InputType = null;
if (isset($_POST['InputType'])) {
    $InputType = $_POST['InputType'];
}
$InputImage = null;
if (isset($_POST['InputImage'])) {
    $InputImage = $_POST['InputImage'];
}
$InputHover = null;
if (isset($_POST['InputHover'])) {
    $InputHover = $_POST['InputHover'];
}

$Care = null;
if (isset($_POST['Care'])) {
    $Care = $_POST['Care'];
}
$Local = null;
if (isset($_POST['Local'])) {
    $Local = $_POST['Local'];
}
$StateId = null;
if (isset($_POST['StateId'])) {
    $StateId = $_POST['StateId'];
}
$Terms = null;
if (isset($_POST['Terms'])) {
    $Terms = $_POST['Terms'];
}
$InputImage = null;
if (isset($_POST['InputImage'])) {
    $InputImage = $_POST['InputImage'];
}
$FullName = null;
if (isset($_POST['FullName'])) {
    $FullName = $_POST['FullName'];
}
$Contact = null;
if (isset($_POST['Contact'])) {
    $Contact = $_POST['Contact'];
}
$Period = null;
if (isset($_POST['Period'])) {
    $Period = $_POST['Period'];
}
$ClassesId = null;
if (isset($_POST['ClassesId'])) {
    $ClassesId = $_POST['ClassesId'];
}
$DateSet = date("Y-m-d");
if (isset($_POST['DateSet'])) {
    $DateSet = $_POST['DateSet'];
}
$TimeSet = date("H:i");
if (isset($_POST['TimeSet'])) {
    $TimeSet = $_POST['TimeSet'];
}
$Level = null;
if (isset($_POST['Level'])) {
    $Level = $_POST['Level'];
}
$CategoryId = null;
if (isset($_POST['CategoryId'])) {
    $CategoryId = $_POST['CategoryId'];
}
$Zone = null;
if (isset($_POST['Zone'])) {
    $Zone = $_POST['Zone'];
}
$ReportType = null;
if (isset($_GET['ReportType'])) {
    $ReportType = $_GET['ReportType'];
}

//survey
$placeholder = null;
if (isset($_GET['placeholder'])) {
    $placeholder = $_GET['placeholder'];
}

//banners
$Target = null;
if (isset($_POST['Target'])) {
    $Target = $_POST['Target'];
}

$Position = null;
if (isset($_POST['Position'])) {
    $Position = $_POST['Position'];
}
