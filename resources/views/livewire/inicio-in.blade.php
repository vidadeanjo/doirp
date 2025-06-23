
<main>

        
    <section class="hero text-white "   style="background-image: url('{{ asset('build/assets/imgs/imageSlide1.jpeg ')}}');  background-size: cover; ">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">PRIOD - Centro Técnico de Formação de Excelência</h1>
            <p class="lead mb-4">O conhecimento de excelência ao alcance de todos</p>
            <div class=" d-flex justify-content-center mt-5" style=" ">
               
                    <a href="{{route('cursos')}}" class="btn btn-light btn-lg " style="margin-right: 10px;">Ver Cursos</a>
              
                    <a href="{{route('serviconews-public')}}" class="btn btn-light btn-lg">Ver Serviços</a>
             
            </div>
             
        </div>
  </section>
  
      <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Por que escolher a PRIOD?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div 
                    class="card h-100"
                    data-aos="fade-right"
                    data-aos-offset="60"
                    data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            <i class="bi bi-mortarboard text-primary-priod fs-1 mb-3"></i>
                            <h3 class="card-title">Excelência Educacional</h3>
                            <p class="card-text">Oferecemos cursos de alta qualidade ministrados por profissionais experientes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div 
                    class="card h-100"
                    data-aos="fade-down"
                    data-aos-offset="60"
                    data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            <i class="bi bi-book text-primary-priod fs-1 mb-3"></i>
                            <h3 class="card-title">Currículo Atualizado</h3>
                            <p class="card-text">Nossos cursos são constantemente atualizados para atender às demandas do mercado.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div 
                    class="card h-100"
                    data-aos="fade-left"
                    data-aos-offset="60"
                    data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            <i class="bi bi-people text-primary-priod fs-1 mb-3"></i>
                            <h3 class="card-title">Networking</h3>
                            <p class="card-text">Proporcionamos um ambiente ideal para o aprendizado e networking profissional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div 
                    class="card h-100" 
                    data-aos="fade-right"
                    data-aos-offset="150"
                    data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            <i class="bi bi-award text-primary-priod fs-1 mb-3"></i>
                            <h3 class="card-title">Certificação Reconhecida</h3>
                            <p class="card-text">Formação com direito a certificado reconhecido pelo INEFOP.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div 
                    class="card h-100"
                    data-aos="fade-up"
                    data-aos-offset="150"
                    data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            <i class="bi bi-wrench text-primary-priod fs-1 mb-3"></i>
                            <h3 class="card-title">Foco na Indústria</h3>
                            <p class="card-text">Cursos técnicos focados nas necessidades da Indústria Petrolífera e outros setores.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div 
                    class="card h-100"
                    data-aos="fade-left"
                    data-aos-offset="150"
                    data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            <i class="bi bi-layers text-primary-priod fs-1 mb-3"></i>
                            <h3 class="card-title">Variedade de Cursos</h3>
                            <p class="card-text">Ampla gama de cursos técnicos e profissionais.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Inscrições Abertas</h2>
            <p class="text-center mb-4">
                Estão abertas as inscrições para diversos cursos profissionais. Junte-se a nós e prepare-se para uma jornada de aprendizado e sucesso.
            </p>
            <div class="text-center">
                <a href="{{route('cursos')}}" class="btn btn-primary-priod btn-lg">Ver Cursos Disponíveis</a>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Alguns Cursos</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($cursosDestaque as $curso)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $curso->nome }}</h5>
                            <p class="card-text"><i class="bi bi-clock"></i> Duração: {{ $curso->duracao }}</p>
                            <p class="card-text"><i class="bi bi-class"></i> Próxima Turma: {{ $curso->turma ?? 'Não definido.'}}</p>
                            <p wire:click="detalhesCurso({{ $curso->id }})" class="btn btn-outline-primary-priod">Saiba Mais</p>
                        </div>
                    </div>
                </div> 
                @endforeach
               
            </div>
        </div>
    </section>

    <section class="bg-primary-priod text-white py-5">
        <div class="container text-center">
            <h2 class="mb-4">Dê o Primeiro Passo para o Seu Futuro Brilhante</h2>
            <p class="lead mb-4">Inscreva-se hoje e comece sua jornada de aprendizado e sucesso com a PRIOD.</p>
            <a href="{{route('contacto')}}" class="btn btn-light btn-lg">Contacte-nos!</a>
        </div>
    </section>
</main>

