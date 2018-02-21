<?php
//Section Parameters
$section_tittle      = "Booking";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 2;

require_once 'header.php';

function class_formBooking()
{
    //Qty
    $array_qnty = array();
    for ($i = 1; $i < 6; ++$i) {
        $array_qnty[] = array('label' => $i, 'value' => $i, 'selected' => null);
    }

    $formFields = array(
        'form_add'   => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
        'Date'       => array('inputType' => 'date', 'required' => true, 'position' => 4, 'name' => 'Date', 'value' => date("Y-m-d")),
        'Adults'     => array('inputType' => 'select', 'required' => false, 'position' => 4, 'name' => 'Adults', 'value' => $array_qnty),
        'Childs'     => array('inputType' => 'select', 'required' => false, 'position' => 4, 'name' => 'Childs', 'value' => $array_qnty),
        'Promo Code' => array('inputType' => 'text', 'required' => false, 'position' => 4, 'name' => 'PromoCode', 'value' => isset($PromoCode)),

    );

    // define buttons for form
    $formButtons = array(
        'Search' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => null, 'action' => null),
    );

    //set params for form
    $formParams = array(
        'name'    => 'Booking',
        'action'  => 'book_packages.php',
        'method'  => 'post',
        'enctype' => null,
    );

    class_formGenerator2($formParams, $formFields, $formButtons);
}

class_formBooking();

require_once 'footer.php';
