<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRIOD</title>
    <link rel="icon" href="{{ asset('build/assets/imgs/LOGO PRIOD.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css')}}">
   
  

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
       <!-- CSS do AOS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">

    
    @livewireStyles
</head>
<body>

    <!-- Componente de Cabeçalho -->
    <livewire:header />

    <div class="principal-main">
        @yield('content')
    </div>

    <!-- Componente de Rodapé -->
    <livewire:footer />

    @livewireScripts

    @php
        $images = [
            asset('build/assets/imgs/imageSlide2.jpeg '),
            asset('build/assets/imgs/imageSlide3.jpeg '),
            asset('build/assets/imgs/imageSlide1.jpeg '),
            asset('build/assets/imgs/imageSlide4.jpeg '),
            asset('build/assets/imgs/imageSlide5.jpeg '),
            asset('build/assets/imgs/imageSlide6.jpeg '),
            asset('build/assets/imgs/imageSlide7.jpeg ') 
        ]
    @endphp
    <script>
        // Lista de URLs das imagens
        const imagens = @json($images);

        // Referência à seção
        const section = document.querySelector('.hero');
        let currentImageIndex = 0;

        // Função para trocar imagem
        function trocarImagem() {
            section.style.backgroundImage = `url(${imagens[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % imagens.length;
        }

        // Chama a função de troca de imagem a cada 5 segundos
        setInterval(trocarImagem, 5000);
    </script>

  <!-- Script do AOS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Inicializa o AOS
    AOS.init({
      duration: 800, // Define uma duração padrão (em milissegundos)
      once: false // Define se a animação ocorre uma vez (true) ou toda vez que entra na viewport (false)
    });
</script>

    <script>
        const courses = [
            // Primeira tabela
            { name: "Autómatos Programável (PLC Siemens e Portal TIA)", duration: "30h", price: "185.000 kzs" },
            { name: "Sistemas SCADA e HMI", duration: "30h", price: "115.000 kzs" },
            { name: "Mecânica Auto", duration: "40h", price: "120.000 kzs" },
            { name: "Electricidade Auto", duration: "36h", price: "115.000 kzs" },
            { name: "Tecnologia de Controlo e Processos na Indústria Petrolífera", duration: "36h", price: "115.000 kzs" },
            { name: "Inglês Técnico (nível I)", duration: "4 meses/1 mês", price: "13.900 kzs" },
            { name: "Inglês Técnico (nível II)", duration: "4 meses/1 mês", price: "13.900 kzs" },
            { name: "Inglês Técnico (nível III)", duration: "4 meses/1 mês", price: "13.900 kzs" },
            { name: "Electrónica Geral (nível I)", duration: "2 meses", price: "120.000 kzs" },
            { name: "Electrónica Geral (nível II)", duration: "2 meses", price: "125.000 kzs" },
            
            // Segunda tabela
            { name: "Instrumentação e Processos Industriais", duration: "40h", price: "164.000 kzs" },
            { name: "Automação Industrial", duration: "32h", price: "180.000 kzs" },
            { name: "Electricidade baixa tensão (Construção Civil)", duration: "32h", price: "95.000 kzs" },
            { name: "Electricidade Industrial", duration: "32h", price: "100.000 kzs" },
            { name: "Hidráulica e Pneumática Industrial", duration: "30h", price: "90.000 kzs" },
            { name: "Higiene, Saúde e Segurança no Trabalho (nível I)", duration: "24h", price: "85.000 kzs" },
            { name: "Higiene, Saúde e Segurança no Trabalho (nível II)", duration: "24h", price: "115.000 kzs" },
            { name: "Combates contra Incêndios e Técnicas de Primeiros Socorros", duration: "24h", price: "80.000 kzs" },
            { name: "Controlo de Qualidade", duration: "30h", price: "110.000 kzs" },
            { name: "Elaboração de Projecto de Impactes Ambientais", duration: "40h", price: "480.000 kzs" },
            { name: "Elaboração de Projecto de Arquitectura", duration: "40h", price: "485.000 kzs" },
            { name: "Elaboração de Projecto Industrial", duration: "40h", price: "550.000 kzs" },
            { name: "Gestão de Qualidade", duration: "24h", price: "85.000 kzs" },
            { name: "Comandos Eléctricos", duration: "32h", price: "135.000 kzs" },
            { name: "Electromecânica Industrial", duration: "32h", price: "105.000 kzs" },
            { name: "Design Mecânico", duration: "30h", price: "105.000 kzs" },
            { name: "Automação e Controle Residencial", duration: "32h", price: "170.000 kzs" }
        ];

        function createCourseCard(course) {
            return `
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">${course.name}</h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-clock me-2"></i>Duração: ${course.duration}
                                </small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-cash-coin me-2"></i>Preço: ${course.price}
                                </small>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('curso-detalhes')}}" class="btn btn-primary-priod w-100">Sobre o curso</a>
                        </div>
                    </div>
                </div>
            `;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const coursesList = document.getElementById('coursesList');
            courses.forEach(course => {
                coursesList.innerHTML += createCourseCard(course);
            });
        });
    </script>


<script>
    //script do admin'panel
    document.addEventListener('DOMContentLoaded', function() {
        const courseForm = document.getElementById('courseForm');
        const serviceForm = document.getElementById('serviceForm');
        const coursesList = document.getElementById('coursesList');
        const servicesList = document.getElementById('servicesList');

        let courses = [];
        let services = [];

        courseForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(courseForm);
            const newCourse = Object.fromEntries(formData.entries());
            newCourse.content = newCourse.content.split('\n').filter(item => item.trim() !== '');
            courses.push(newCourse);
            updateCoursesList();
            courseForm.reset();
        });

        serviceForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(serviceForm);
            const newService = Object.fromEntries(formData.entries());
            services.push(newService);
            updateServicesList();
            serviceForm.reset();
        });

        function updateCoursesList() {
            coursesList.innerHTML = '';
            courses.forEach((course, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerHTML = `
                    <h3 class="mb-2">${course.name}</h3>
                    <p><strong>Duração:</strong> ${course.duration}</p>
                    <p><strong>Preço:</strong> ${course.price}</p>
                    <p><strong>Modalidade:</strong> ${course.modality}</p>
                    <p><strong>Descrição:</strong> ${course.description}</p>
                    <div>
                        <strong>Conteúdo Programático:</strong>
                        <ul>
                            ${course.content.map(item => `<li>${item}</li>`).join('')}
                        </ul>
                    </div>
                `;
                coursesList.appendChild(li);
            });
        }

        function updateServicesList() {
            servicesList.innerHTML = '';
            services.forEach((service, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerHTML = `
                    <h3 class="mb-2">${service.name}</h3>
                    <p><strong>Categoria:</strong> ${service.category}</p>
                    <p><strong>Descrição:</strong> ${service.description}</p>
                `;
                servicesList.appendChild(li);
            });
        }
    });
</script>

<script>
    const services = [
        {
            icon: 'bi-mortarboard',
            title: "Formação e Capacitação",
            description: "Formação profissional especializada para funcionários na indústria e público em geral.",
            subServices: [
                "Treinamento industrial em diversas áreas",
                "Formação técnica profissional",
                "Cursos especializados",
                "Workshops e seminários"
            ]
        },
        {
            icon: 'bi-wrench',
            title: "Manutenção Industrial",
            description: "Serviços especializados de manutenção em equipamentos industriais e sistemas automatizados.",
            subServices: [
                "Manutenção preventiva e corretiva",
                "Automação e controle industrial",
                "Instalação e configuração de PLCs",
                "Otimização de processos industriais"
            ]
        },
        {
            icon: 'bi-code-slash',
            title: "Desenvolvimento de Software",
            description: "Soluções personalizadas para diversos setores.",
            subServices: [
                "Sistema de Gestão Escolar para colégios e creches",
                "Sistema de Gestão de Centro de Formação",
                "Sistema de Gestão Comercial e Faturação",
                "Sistema de Gestão Hospitalar para clínicas e consultórios"
            ]
        },
        {
            icon: 'bi-globe',
            title: "Desenvolvimento Web",
            description: "Criação de sites e soluções web personalizadas.",
            subServices: [
                "Sites Básicos",
                "Sites Intermédios",
                "Sites Personalizados",
                "Portais Corporativos"
            ]
        },
        {
            icon: 'bi-gear',
            title: "Inovação e Assessoria",
            description: "Suporte técnico e consultoria especializada.",
            subServices: [
                "Inovação tecnológica industrial",
                "Assessoria técnica",
                "Consultoria em automação",
                "Soluções tecnológicas personalizadas"
            ]
        },
        {
            icon: 'bi-hdd-network',
            title: "Infraestrutura e Redes",
            description: "Implementação e manutenção de infraestrutura de TI.",
            subServices: [
                "Instalação e configuração de servidores Windows e Linux",
                "Implementação de redes estruturadas",
                "Redes domésticas e empresariais",
                "Manutenção de infraestrutura"
            ]
        },
        {
            icon: 'bi-building',
            title: "Segurança do Trabalho",
            description: "Consultoria e implementação de medidas de segurança e saúde ocupacional.",
            subServices: [
                "Avaliação de riscos no ambiente de trabalho",
                "Treinamentos em segurança",
                "Implementação de protocolos de segurança",
                "Auditorias de segurança"
            ]
        },
        {
            icon: 'bi-heart-pulse',
            title: "Saúde Ocupacional",
            description: "Serviços de saúde e bem-estar para colaboradores.",
            subServices: [
                "Exames médicos ocupacionais",
                "Programas de qualidade de vida",
                "Ergonomia no ambiente de trabalho",
                "Prevenção de doenças ocupacionais"
            ]
        },
        {
            icon: 'bi-book',
            title: "Cursos Técnicos",
            description: "Cursos especializados em diversas áreas técnicas.",
            subServices: [
                "Automação Industrial",
                "Eletricidade",
                "Mecânica",
                "Instrumentação e Controle"
            ]
        }
    ];

    function createServiceCard(service) {
        return `
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="text-primary-priod mb-3">
                            <i class="bi ${service.icon} fs-1"></i>
                        </div>
                        <h5 class="card-title">${service.title}</h5>
                        <p class="card-text">${service.description}</p>
                        <ul class="list-unstyled mt-3">
                            ${service.subServices.map(subService => `
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-primary-priod me-2"></i>
                                    ${subService}
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                </div>
            </div>
        `;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const servicesContainer = document.getElementById('servicesContainer');
        services.forEach(service => {
            servicesContainer.innerHTML += createServiceCard(service);
        });
    });
</script>

    
    <script src={{ asset('build/assets/js/jquery.min.js')}}></script>
    <script src={{ asset('build/assets/js/jquery-migrate-3.0.1.min.js')}}></script>
    <script src={{ asset('build/assets/js/jquery.stellar.min.js ')}}></script>
    <script src={{ asset('build/assets/js/owl.carousel.min.js')}}></script>
    <script src={{ asset('build/assets/js/jquery.magnific-popup.min.js')}}></script>
    <script src={{ asset('build/assets/js/aos.js')}}></script>
    <script src={{ asset('build/assets/js/scrollax.min.js')}}></script>
    <script src={{ asset('build/assets/js/main.js')}}></script>
    <script src={{ asset('build/assets/js/bootstrap.min.js')}}></script>
    <script src={{ asset('build/assets/js/bootstrap.bundle.js')}}></script>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
