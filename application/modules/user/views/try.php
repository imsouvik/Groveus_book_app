 <div id="lang"></div>
                <script>
                  var lang;
                  function initMap() {
                   lang = new google.maps.Map(document.getElementById('lang'), {
                      center: {lat:  -34.397, lng: 150.644},
                      zoom: 8
                    });
                  }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAzaA7-dvvVZGmdFraqxaktFn6fHzSdNc&callback=initMap"
                        async defer>
                </script>