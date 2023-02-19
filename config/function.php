<?php
// Random Generate Char tergantung pilihan type dan array char
function generateChar($type, $char)
{
    $result = "";
    switch ($type) {

        case 'c':
            $result = $char[rand(0, count($char) - 1)];
            break;
        case 'i':
            $result =  rand(0, 9);
            break;
        default:
            $result =  rand(0, 9);
            break;
    }
    return $result;
}

function generateID($nama)
{
    $char = ['A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r'];
    $id = "";
    $positionID = positionID(rand(5, 9));
    for ($i = 0; $i < count($positionID) - 1; $i++) {
        $id .= generateChar($positionID[$i], $char);
    }
    $id .= "-";
    // Panggil Function positionID untuk menetukan Posisi Char / Integer 
    $positionID = positionID(rand(5, 9));
    $arrayNama = str_split(str_replace(' ', '', $nama));
    for ($i = 0; $i < count($positionID) - 1; $i++) {
        // Generate Char atau Integer secara random dengan posisi yang sudah di tentukan
        // Generate char dari ArrayNama
        $id .= generateChar($positionID[$i], $arrayNama);
    }
    // Tambahkan pemisah di ID
    $id .= "-";
    // Jadikan ID sebuah array tanpa pemisah "-"
    $arrayID = str_split(str_replace('-', '', $id));
    // Panggil Function positionID untuk menetukan Posisi Char / Integer 
    $positionID = positionID(rand(5, 9));
    for ($i = 0; $i < count($positionID) - 1; $i++) {
        // Generate Char atau Integer secara random dengan posisi yang sudah di tentukan
        // Generate char dari ArrayID
        $id .= generateChar($positionID[$i], $arrayID);
    }
    return $id;
}

// Function random posisi ID
function positionID($length)
{
    // C dan I singkatan dari Char dan Integer
    $CI = ['c', 'i'];
    $arrayPosition = [];
    for ($i = 0; $i < $length + 1; $i++) {
        array_push($arrayPosition, $CI[rand(0, 1)]);
    }
    return $arrayPosition;
}
