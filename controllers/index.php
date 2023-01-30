<?php


$input = ['column' => '', 'row' => '',];
$errors = ['column' => '', 'row' => '',];

$message = '';
$invalid = '';

//function is_number($number, $number2, int $min = 2, int $max = 10): bool
//{
//    return (($number >= $min && $number <= $max)) && (($number2 >= $min && $number2 <= $max));
//}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $input['column = $_POST['column'];
//    $input['row = $_POST['row'];
//    $valid = is_number((int)$input['column, (int)$input['row, 2, 10);
    $validation_filters['column']['filter'] = FILTER_VALIDATE_INT;
    $validation_filters['row']['filter'] = FILTER_VALIDATE_INT;
    $validation_filters['column']['options']['min_range'] = 2;
    $validation_filters['column']['options']['max_range'] = 10;
    $validation_filters['row']['options']['min_range'] = 2;
    $validation_filters['row']['options']['max_range'] = 10;


    $input = filter_input_array(INPUT_POST, $validation_filters);


    //errors messages

    $errors['column'] = $input['column'] ? '' : 'Only numbers 2 to 10 are allowed';
    $errors['row'] = $input['row'] ? '' : 'Only numbers 2 to 10 are allowed';
    $invalid = implode($errors);

    if ($invalid) {
        $message = 'Please correct the following errors:';
    } else {
        $message = 'Thank you, your data was valid';
        $endRow = $input['row'] - 1;
        $endColumn = $input['column'] - 1;
    }

    //sanitize data

    $input['column'] = filter_var($input['column'], FILTER_SANITIZE_NUMBER_INT);
    $input['row'] = filter_var($input['row'], FILTER_SANITIZE_NUMBER_INT);
//    if (!$valid) {
//        $message = 'Number has to be between 2 and 10';
//    }




}

$beginningPoint = $_POST['beginningPoint'] ?? 0;
//$input['column = $_POST['column'] ?? 0;
//$input['row = $_POST['row'] ?? 0;

$direction = $_POST['direction'] ?? 0;
$matrix = [];
$beginningRow = 0;
$beginningColumn = 0;
$val = 1;
$options = ['top-right', 'top-left', 'bottom-right', 'bottom-left'];

?>

<?php require 'views/index.view.php'; ?>