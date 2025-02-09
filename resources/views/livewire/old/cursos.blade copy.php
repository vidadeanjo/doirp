
<main>
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold">Nossos Cursos</h1>
                <p class="lead text-muted">O Conhecimento De Excelência Ao Alcance De Todos</p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="coursesList">
                <!-- Courses will be dynamically inserted here -->
                @forelse ($cursos as $curso)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$curso->nome}}</h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-clock me-2"></i>Duração: {{$curso->duracao}}
                                </small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-cash-coin me-2"></i>Preço: {{$curso->preco}}
                                </small>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="/detalhes/{{$curso->id}}" class="btn btn-primary-priod w-100">Sobre o curso</a>
                        </div>
                    </div>
                </div>
                @empty
                    <div>
                        <h5>SEM cursos inseridos</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
  
</main>