<div>

    <main>
        <section class="bg-primary-priod text-white py-5">
            <div class="container">
                <h1 class="display-4 fw-bold">Nossos Serviços</h1>
                <p class="fs-4">Soluções profissionais integradas para sua empresa</p>
            </div>
        </section>
    
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Serviços PRIOD</h2>
                    <p class="fs-5 text-muted mx-auto" style="max-width: 700px;">
                        Oferecemos um conjunto completo de soluções tecnológicas e serviços profissionais para atender às necessidades do seu negócio e indústria.
                    </p>
                </div>
    
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="servicesContainer">
                    <!-- Services will be dynamically inserted here -->
                  
                        @foreach ($categorias as $categoria)
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="text-primary-priod mb-3">
                                            <i class="bi bi-folder fs-1"></i> <!-- Ícone padrão ou personalizado -->
                                        </div>
                                        <h5 class="card-title">{{ $categoria->nome }}</h5>
                                        <p class="card-text">{{ $categoria->descricao }}</p>
                                        <ul class="list-unstyled mt-3">
                                            @foreach ($categoria->servicos as $servico)
                                                <li class="mb-2">
                                                    <i class="bi bi-check-circle-fill text-primary-priod me-2"></i>
                                                    {{ $servico->nome }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    
                </div>
            </div> 
        </section>
    
        <section class="py-5 bg-light">
            <div class="container text-center">
                <h2 class="display-5 fw-bold mb-3">Precisa dos Nossos Serviços?</h2>
                <p class="fs-5 text-muted mb-4 mx-auto" style="max-width: 700px;">
                    Entre em contato conosco para discutir como podemos ajudar sua empresa com nossas soluções tecnológicas e serviços profissionais.
                </p>
                <a href="{{route('contacto')}}" class="btn btn-primary-priod btn-lg">Fale Conosco</a>
            </div>
        </section>
    </main>
</div>
