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
                                    <a href="#" class="btn btn-outline-primary-priod btn-sm me-2 rounded-circle">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary-priod btn-sm me-2 rounded-circle">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary-priod btn-sm me-2 rounded-circle">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary-priod btn-sm rounded-circle">
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
            
            <!-- Mapa -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.052975999593!2d13.536682315381315!3d-12.348722791405934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1bb1b6e5f5a4a1a1%3A0x5c5a5c5a5c5a5c5a!2sLobito%2C%20Angola!5e0!3m2!1sen!2sao!4v1620000000000!5m2!1sen!2sao" 
                                        allowfullscreen="" 
                                        loading="lazy"
                                        style="border:0;">
                                </iframe>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-primary-priod text-white">
                            <i class="bi bi-geo-alt-fill me-2"></i> Nossa Localização
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
