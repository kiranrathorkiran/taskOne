<?php
$conn = mysqli_connect("localhost", "root", "", "taskonedb");
$data = mysqli_query($conn, "SELECT u.name, l.latitude, l.longitude, l.battery FROM user_locations l JOIN users u ON l.user_id = u.id");

$locations = [];
while ($row = mysqli_fetch_assoc($data)) {
    $locations[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Circle Map</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <style>#map { height: 90vh; }</style>
</head>
<body>
  <h2>Circle Members on Map</h2>
  <div id="map"></div>

  <script>
    const map = L.map('map').setView([20, 78], 4); // Center on India

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data © OpenStreetMap contributors'
    }).addTo(map);

    const locations = <?php echo json_encode($locations); ?>;

    locations.forEach(loc => {
      L.marker([loc.latitude, loc.longitude])
        .addTo(map)
        .bindPopup(`<b>${loc.name}</b><br>Battery: ${loc.battery}%`);
    });
  </script>
</body>
</html>
