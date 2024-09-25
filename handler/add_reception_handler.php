<?php
require_once "function.php";
require_once "conection.php";
try {
    $sql = "INSERT INTO `reception` (`doctor_id`, `patient_id`, `reason`, `dateTime`, `status`) VALUES (:doctor_id, :patient_id, :reason, :dateTime, 'added')";
    $query = $pdo->prepare($sql);

    $query->execute([
        'doctor_id' => $_POST['doctor'],
        'patient_id' => $_POST['patient'],
        'reason' => $_POST['reason'],
        'dateTime' => $_POST['date'],
    ]);
    echo json_encode(['status' => 'success', 'message' => 'Запись создана']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

