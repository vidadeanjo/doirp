<div>
    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    @endpush

    <main>
        <section class="py-5 bg-light">
            <div class="container">
                <h1 class="text-center mb-4 display-4 fw-bold">Entre em Contato</h1>
                <p class="text-center mb-5 lead">Tem alguma dúvida ou sugestão? Estamos aqui para ajudar!</p>
                
                <div class="row g-4">
                    <!-- Coluna de Informações -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body p-4">
                                <h2 class="card-title mb-4 display-6 text-primary-priod">Informações de Contato</h2>
                                
                                <div class="d-flex align-items-start mb-4">
                                    <div class="contact-icon me-3">
                                        <i class="bi bi-telephone-fill text-primary-priod fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Telefone/WhatsApp</h5>
                                        <p class="mb-0">{{$priod->whatsapp}} | {{$priod->contacto}}</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-start mb-4">
                                    <div class="contact-icon me-3">
                                        <i class="bi bi-envelope-fill text-primary-priod fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Email</h5>
                                        <p class="mb-0">{{$priod->email}}</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-start mb-4">
                                    <div class="contact-icon me-3">
                                        <i class="bi bi-geo-alt-fill text-primary-priod fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Endereço</h5>
                                        <p class="mb-0">Caponte, Lobito, Benguela, Angola</p>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <h5 class="mb-3">Horário de Funcionamento</h5>
                                    <p><i class="bi bi-clock text-primary-priod me-2"></i> Segunda a Sexta: 08:00 - 18:00</p>
                                    <p><i class="bi bi-clock text-primary-priod me-2"></i> Sábado: 09:00 - 13:00</p>
                                </div>
                                
                                <div class="mt-4">
                                    <h5 class="mb-3">Redes Sociais</h5>
                                    <div class="d-flex">
                                        <a href="{{$priod->facebook_link}}" class="btn btn-outline-primary-priod btn-sm me-2 rounded-circle" target="_blank">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                        <a href="{{$priod->instagram_link}}" class="btn btn-outline-primary-priod btn-sm me-2 rounded-circle" target="_blank">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                        <a href="{{$priod->linkedin_link}}" class="btn btn-outline-primary-priod btn-sm me-2 rounded-circle" target="_blank">
                                            <i class="bi bi-linkedin"></i>
                                        </a>
                                        <a href="https://wa.me/{{$priod->whatsapp}}" class="btn btn-outline-primary-priod btn-sm rounded-circle" target="_blank">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Coluna do Formulário -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body p-4">
                                <h2 class="card-title mb-4 display-6 text-primary-priod">Envie-nos uma Mensagem</h2>
                                
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
                                <form action="{{ route('enviar-mensagem') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome" name="nome" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="assunto" class="form-label">Assunto</label>
                                        <input type="text" class="form-control" id="assunto" name="assunto" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="mensagem" class="form-label">Mensagem</label>
                                        <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary-priod btn-lg w-100">
                                        <i class="bi bi-send me-2"></i> Enviar Mensagem
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Mapa Interativo -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary-priod text-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-geo-alt-fill me-2"></i> 
                                        <strong>Nossa Localização - Caponte, Lobito</strong>
                                    </div>
                                    <div>
                                        <div>
                                            <button id="findMeBtn" class="btn btn-light btn-sm">
                                                <i class="bi bi-crosshair me-1"></i> Encontrar-me
                                            </button>
                                            <button id="refreshLocationBtn" class="btn btn-outline-light btn-sm" style="display: none;">
                                                <i class="bi bi-arrow-clockwise me-1"></i> Atualizar
                                            </button>
                                            <button id="getDirectionsBtn" class="btn btn-outline-light btn-sm" style="display: none;">
                                                <i class="bi bi-signpost-2 me-1"></i> Como Chegar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!-- Mapa Leaflet -->
                                <div id="map" style="height: 400px; width: 100%;"></div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div id="locationInfo" class="text-muted">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Clique em "Encontrar-me" para ver sua localização e calcular a distância
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <small class="text-muted">
                                            <a href="https://www.google.com/maps?q=-12.3604,13.5497" 
                                               target="_blank" 
                                               class="text-decoration-none">
                                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                                Abrir no Google Maps
                                            </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
    // Coordenadas do PRIOD
    const priodLocation = [-12.3604, 13.5497];
    let map, userMarker, priodMarker;
    let userLocation = null;

    // Inicializar mapa quando a página carregar
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(initMap, 100);
    });

    function initMap() {
        if (typeof L === 'undefined') {
            setTimeout(initMap, 500);
            return;
        }

        const mapElement = document.getElementById('map');
        if (!mapElement) return;

        try {
            map = L.map('map').setView(priodLocation, 13);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            priodMarker = L.marker(priodLocation)
                .addTo(map)
                .bindPopup(`
                    <div class="text-center">
                        <strong>🏢 PRIOD</strong><br>
                        <small>Centro Técnico Profissional de Excelência</small><br>
                        <small>Caponte, Lobito, Benguela</small>
                    </div>
                `)
                .openPopup();
        } catch (error) {
            console.error('Erro ao inicializar mapa:', error);
        }
    }

    // Event listeners
    document.addEventListener('click', function(e) {
        if (e.target.id === 'findMeBtn' || e.target.closest('#findMeBtn')) {
            findUserLocation();
        }

        if (e.target.id === 'getDirectionsBtn' || e.target.closest('#getDirectionsBtn')) {
            if (userLocation) {
                const url = `https://www.google.com/maps/dir/${userLocation[0]},${userLocation[1]}/${priodLocation[0]},${priodLocation[1]}`;
                window.open(url, '_blank');
            }
        }

        // Adicionar no event listener principal
        if (e.target.id === 'refreshLocationBtn' || e.target.closest('#refreshLocationBtn')) {
            findUserLocation();
        }
    });

    function findUserLocation() {
        const btn = document.getElementById('findMeBtn');
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<i class="bi bi-arrow-clockwise spin me-1"></i> Localizando...';
        btn.disabled = true;
        
        // Limpar localização anterior
        userLocation = null;
        if (userMarker) {
            map.removeLayer(userMarker);
            userMarker = null;
        }
        
        document.getElementById('locationInfo').innerHTML = 
            '<i class="bi bi-arrow-clockwise spin me-1"></i> Obtendo sua localização atual...';
        
        if (navigator.geolocation) {
            // Primeiro, tentar com alta precisão e sem cache
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    console.log('Localização obtida:', position.coords);
                    userLocation = [position.coords.latitude, position.coords.longitude];
                    showUserLocation(userLocation);
                    calculateDistance();
                    btn.innerHTML = '<i class="bi bi-check-circle me-1"></i> Localizado!';
                    document.getElementById('getDirectionsBtn').style.display = 'inline-block';
                    document.getElementById('refreshLocationBtn').style.display = 'inline-block';
                    
                    // Mostrar informações de precisão
                    const accuracy = position.coords.accuracy;
                    console.log(`Precisão: ${accuracy} metros`);
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    }, 2000);
                },
                function(error) {
                    console.error('Erro de geolocalização:', error);
                    
                    // Se falhar, tentar novamente com configurações menos restritivas
                    if (error.code === error.TIMEOUT || error.code === error.POSITION_UNAVAILABLE) {
                        console.log('Tentando novamente com configurações alternativas...');
                        tryAlternativeGeolocation(btn, originalText);
                    } else {
                        handleGeolocationError(error, btn, originalText);
                    }
                },
                {
                    enableHighAccuracy: true,    // Força GPS/alta precisão
                    timeout: 15000,              // Aumenta timeout para 15s
                    maximumAge: 0                // NUNCA usar cache - sempre nova localização
                }
            );
        } else {
            document.getElementById('locationInfo').innerHTML = 
                '<i class="bi bi-x-circle text-danger me-1"></i> Geolocalização não suportada pelo navegador';
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    }

    function tryAlternativeGeolocation(btn, originalText) {
        console.log('Tentativa alternativa de geolocalização...');
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                console.log('Localização alternativa obtida:', position.coords);
                userLocation = [position.coords.latitude, position.coords.longitude];
                showUserLocation(userLocation);
                calculateDistance();
                btn.innerHTML = '<i class="bi bi-check-circle me-1"></i> Localizado!';
                document.getElementById('getDirectionsBtn').style.display = 'inline-block';
                document.getElementById('refreshLocationBtn').style.display = 'inline-block';
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }, 2000);
            },
            function(error) {
                handleGeolocationError(error, btn, originalText);
            },
            {
                enableHighAccuracy: false,   // Permite localização menos precisa
                timeout: 10000,              // Timeout menor
                maximumAge: 0                // Ainda sem cache
            }
        );
    }

    function handleGeolocationError(error, btn, originalText) {
        let errorMsg = 'Erro ao obter localização';
        let suggestion = '';
        
        switch(error.code) {
            case error.PERMISSION_DENIED:
                errorMsg = 'Permissão negada para acessar localização';
                suggestion = 'Clique no ícone de localização na barra do navegador e permita o acesso.';
                break;
            case error.POSITION_UNAVAILABLE:
                errorMsg = 'Localização não disponível';
                suggestion = 'Verifique se o GPS está ativado e tente novamente.';
                break;
            case error.TIMEOUT:
                errorMsg = 'Tempo limite excedido';
                suggestion = 'Tente novamente. Pode demorar alguns segundos para obter sua localização.';
                break;
        }
        
        document.getElementById('locationInfo').innerHTML = `
            <div class="alert alert-warning p-2 mb-0">
                <i class="bi bi-exclamation-triangle me-1"></i> 
                <strong>${errorMsg}</strong><br>
                <small>${suggestion}</small>
                <br>
                <button class="btn btn-sm btn-outline-warning mt-2" onclick="clearLocationAndRetry()">
                    <i class="bi bi-arrow-clockwise me-1"></i> Tentar Novamente
                </button>
            </div>
        `;
        
        btn.innerHTML = originalText;
        btn.disabled = false;
    }

    // Função para limpar cache e tentar novamente
    function clearLocationAndRetry() {
        console.log('Limpando cache de localização e tentando novamente...');
        
        // Limpar qualquer cache local
        if ('geolocation' in navigator) {
            // Forçar nova requisição
            findUserLocation();
        }
    }

    function showUserLocation(coords) {
        if (!map) return;
        
        console.log('Mostrando localização:', coords);
        
        // Remover marcador anterior se existir
        if (userMarker) {
            map.removeLayer(userMarker);
        }
        
        // Adicionar marcador do usuário
        userMarker = L.marker(coords, {
            icon: L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            })
        })
        .addTo(map)
        .bindPopup(`
            <div class="text-center">
                <strong>📍 Sua Localização Atual</strong><br>
                <small>Lat: ${coords[0].toFixed(6)}</small><br>
                <small>Lng: ${coords[1].toFixed(6)}</small><br>
                <small class="text-muted">Atualizado: ${new Date().toLocaleTimeString()}</small>
            </div>
        `)
        .openPopup();
        
        // Ajustar visualização para mostrar ambos os marcadores
        const group = new L.featureGroup([priodMarker, userMarker]);
        map.fitBounds(group.getBounds().pad(0.1));
    }

    function calculateDistance() {
        if (!userLocation) return;
        
        const distance = getDistanceFromLatLonInKm(
            userLocation[0], userLocation[1],
            priodLocation[0], priodLocation[1]
        );
        
        document.getElementById('locationInfo').innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi bi-geo-alt text-success me-2"></i>
                <div>
                    <strong>Distância até o PRIOD: ${distance.toFixed(2)} km</strong><br>
                    <small class="text-muted">Tempo estimado: ${getEstimatedTime(distance)}</small>
                </div>
            </div>
        `;
    }

    function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
        const R = 6371;
        const dLat = deg2rad(lat2 - lat1);
        const dLon = deg2rad(lon2 - lon1);
        const a = 
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return R * c;
    }

    function deg2rad(deg) {
        return deg * (Math.PI/180);
    }

    function getEstimatedTime(distance) {
        const walkingTime = Math.round(distance * 12);
        const drivingTime = Math.round(distance * 2);
        
        if (distance < 1) {
            return `${walkingTime} min a pé`;
        } else if (distance < 5) {
            return `${drivingTime} min de carro / ${walkingTime} min a pé`;
        } else {
            return `${drivingTime} min de carro`;
        }
    }

    // CSS para animação
    const style = document.createElement('style');
    style.textContent = `
        .spin {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
    </script>
    @endpush
</div>
