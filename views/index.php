<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Cured Operation</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h2>Patient List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Condition</th>
            <th>Cured</th>
            <th>Action</th>
        </tr>

        <?php
        require_once __DIR__ . '/../controllers/PatientController.php';

        $controller = new PatientController($conn);
        $patients = $controller->getPatients();

        foreach ($patients as $patient) {
            echo "<tr>
                <td>{$patient['id']}</td>
                <td>{$patient['name']}</td>
                <td>{$patient['age']}</td>
                <td>{$patient['condition']}</td>
                <td>" . ($patient['cured'] ? "Yes" : "No") . "</td>
                <td>
                    <form action='../index.php' method='post'>
                        <button type='submit' name='cure' value='{$patient['id']}'>Mark as Cured</button>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
