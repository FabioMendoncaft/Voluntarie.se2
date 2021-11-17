
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition(function(position){
                console.log('chegou');

                initMap(position.coords.latitude, position.coords.longitude);

            }, function(error){
                console.log(error);
            }, {enableHighAccuracy: true , maximumAge: 30000, timeout: 30000})

        }else {
            alert('nao foi possivel obter localização!');
        }

        function initMap(latitude, longitude) {
            
            console.log(parseFloat(latitude));
            console.log(parseFloat(longitude));
            console.log('executou a função');

            let mapOptions = {
                center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
                zoom: 15
            }

            let map = new google.maps.Map(document.getElementById('map'), mapOptions);

            $.ajax({
                type: 'POST',
                url: '/getall',
                dataType: 'json',
                success: function (data) {

                    for (let i = 0; i < data.length; i++) {
                            latitude          = data[i].latitude;
                            longitude         = data[i].longitude;
                            titulo            = data[i].titulo;
   
                        let marker = new google.maps.Marker({
                                position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
                                map: map,
                                optimized: false,
                                title: titulo,
                                animation: google.maps.Animation.BOUNCE,
                            });

                        infowindow = new google.maps.InfoWindow({});

                        marker.addListener('click' , (googleMapsEvent) => {
                             populateInfoWindow(marker, infowindow )
                             infowindow.open(map, marker)
                         })   

                        function populateInfoWindow(marker, info){
                            info.setContent('')
                            info.setContent(`<h4>Título: ${data[i].titulo}</h4>
                                            <p>Descrição: ${data[i].descricao}<br>
                                            Organizador: ${data[i].nome} <br>
                                            Contato: ${data[i].telefone} <br>`)} 

                    }
                        
                },
                error: function (data) {
                console.log(data);
                }
            })

        }