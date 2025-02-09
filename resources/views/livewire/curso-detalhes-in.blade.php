

<main class="py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('cursos')}}">Cursos</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="courseBreadcrumb">Nome do Curso</li>
            </ol>
        </nav>

        <h1 class="mb-4" id="courseTitle">{{$curso->nome}}</h1>

        <div class="row">
            <div class="col-md-8">
                <!-- Descrição do Curso -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Descrição do Curso</h5>
                        <p class="card-text" id="courseDescription">{{ $curso->descricao ?? 'Não definido.' }}</p>
                    </div>
                </div>
        
                <!-- Conteúdo Programático -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Conteúdo Programático</h5>
                        <li class="list-group-item">{{ $curso ->conteudo ?? 'Não definido.'}}</li>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4">
                <!-- Informações do Curso -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informações do Curso</h5>
                        <ul class="list-unstyled">
                            <li><strong>Duração:</strong> <span id="courseDuration">{{ $curso->duracao }}</span></li>
                            <li><strong>Preço:</strong> <span id="coursePrice"> {{ number_format($curso->preco, 2, ',', '.') }} kz</span></li>
                            <li><strong>Modalidade:</strong> <span id="courseModality">{{ $curso->modalidade }}</span></li>
                            <li><strong>Próxima Turma:</strong> <span id="courseNextClass">{{ $curso->turma ?? 'Data não definida' }}</span></li>
                        </ul>
                    </div>
                </div>
        
                <!-- Contato -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precisa de Mais Informações?</h5>
                        <p>Entre em contato conosco para esclarecer suas dúvidas sobre o curso.</p>
                        <a href="{{ route('contacto') }}" class="btn btn-outline-primary-priod w-100">Fale Conosco</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</main>