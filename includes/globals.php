<?php
ob_start();

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
    $Add = (int)$_POST['Add'];
}
$Update = null;
if (isset($_POST['Update'])) {
    $Update = (int)$_POST['Update'];
}
$Delete = null;
if (isset($_POST['Delete'])) {
    $Delete = (int)$_POST['Delete'];
}

//USERS DETAILS
$UsersId = null;
if (isset($_POST['UsersId'])) {
    $UsersId = (int)$_POST['UsersId'];
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

//USERS
$UsersIndex = null;
if (isset($_POST['UsersIndex'])) {
    $UsersIndex = (int)$_POST['UsersIndex'];
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


//FILES UPLOAD
$File = null;
if (isset($_FILES['File'])) {
    $File = $_FILES['File'];
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


?>