import "./bootstrap.js";

import "./styles/app.css";

console.log("This log comes from assets/app.js - welcome to AssetMapper! 🎉");

const map = L.map("map").setView([48.8566, 2.3522], 13);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "© OpenStreetMap",
}).addTo(map);

const apiKey = "{{ api_key }}";
function addLocationMarker(address) {
  const url = `https://api.geoapify.com/v1/geocode/search?text=${encodeURIComponent(
    address
  )}&apiKey=${apiKey}`;
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      if (data.features && data.features.length > 0) {
        const [lng, lat] = data.features[0].geometry.coordinates;
        L.marker([lat, lng]).addTo(map);
        map.setView([lat, lng], 13);
      } else {
        console.log("No location found for this address");
      }
    })
    .catch((error) => console.error("Error fetching data:", error));
}
