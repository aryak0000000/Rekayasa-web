<?php
function curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$send = curl("http://localhost/json/getWisata.php");
$data = json_decode($send, TRUE);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Wisata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            background-color: yellow;
            padding: 10px;
            width: fit-content;
        }

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px 15px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th>KOTA</th>
            <th>LANDMARK</th>
            <th>TARIF</th>
        </tr>
        <?php
        if (is_array($data)) {
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['kota']) . "</td>";
                echo "<td>" . htmlspecialchars($row['landmark']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tarif']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data atau format JSON tidak valid.</td></tr>";
        }
        ?>
    </table>
</body>

</html>