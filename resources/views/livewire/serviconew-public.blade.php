<div>
    <main>
        <section class="bg-primary-priod text-white py-5">
            <div class="container">
                <h1 class="display-4 fw-bold">Serviços Novos (Teste)</h1>
                <p class="fs-4">Teste sem relacionamentos</p>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Lista de Serviços</h2>
                    <p class="fs-5 text-muted mx-auto" style="max-width: 700px;">
                        Esta é uma página de teste para verificar se o problema está nos relacionamentos.
                    </p>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse($serviconews as $serviconew)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="text-primary-priod mb-3">
                                        <i class="bi bi-gear fs-1"></i>
                                    </div>
                                    <h5 class="card-title">{{ $serviconew->nome }}</h5>
                                    @if($serviconew->categoria)
                                        <p class="text-muted"><strong>Categoria:</strong> {{ $serviconew->categoria }}</p>
                                    @endif
                                    <p class="card-text">{{ $serviconew->descricao }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <h4>Nenhum serviço cadastrado ainda</h4>
                                <p>Acesse a área administrativa para cadastrar serviços de teste.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</div>
