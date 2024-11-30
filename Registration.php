<?php
function generateMonths($selectedMonth = '') {
    $months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];
    $options = "";
    foreach ($months as $value) {
        $selected = ($value === $selectedMonth) ? 'selected' : '';
        $options .= "<option value='$value' $selected>$value</option>";
    }
    return $options;
}

function generateDays($selectedDay = '') {
    $options = "";
    for ($i = 1; $i <= 31; $i++) {
        $selected = ($i == $selectedDay) ? 'selected' : '';
        $options .= "<option value='$i' $selected>$i</option>";
    }
    return $options;
}

function generateYears($selectedYear = '') {
    $currentYear = date("Y");
    $options = "";
    for ($i = $currentYear; $i >= 1900; $i--) {
        $selected = ($i == $selectedYear) ? 'selected' : '';
        $options .= "<option value='$i' $selected>$i</option>";
    }
    return $options;
}

function getInputValue($key) {
    return htmlspecialchars($_POST[$key] ?? '');
}


?>


