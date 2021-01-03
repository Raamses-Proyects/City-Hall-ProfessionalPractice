const tilesProvider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";//exportando url de mapa a usar
var latitude, longitude;

//Obteniedo geolocalizacion de usuario

  navigator.geolocation.getCurrentPosition(
    (pos) => {
      const { coords } = pos
      latitude = coords.latitude;
      longitude = coords.longitude;
      console.log("Latiud: "+latitude+"\nLongitud: "+longitude);
      var myMap = L.map("myMap").setView([coords.latitude, coords.longitude], 16);


      //Agregando el mapa
      L.tileLayer(tilesProvider, {
        maxZoom:18,
        minZoom:2,
      }).addTo(myMap)

      var iconMarker = L.icon({
        iconUrl: 'img/marker.png',
        iconSize: [60, 60],
        iconAnchor:[30, 60]
      })
      var marker2 = L.marker([coords.latitude, coords.longitude], {icon:iconMarker}).addTo(myMap);//Icono personalizado


      //Agregando funcionalidad agreagr markador con doble click
      myMap.doubleClickZoom.disable();
      myMap.on('dblclick', e => {
        var latLng = myMap.mouseEventToLatLng(e.originalEvent)
        L.marker([latLng.lat, latLng.lng], {icon:iconMarker}).addTo(myMap);
      })

    },
    (err) => {
      console.log(err);
    },
    {
      //Documentación que firefox recomienda
      enabledHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    }
  );
