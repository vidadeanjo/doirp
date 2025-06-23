<footer class="bg-secondary-priod text-white py-4 footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <h5>PRIOD</h5>
                <p >Centro Técnico Profissional de Excelência</p>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <h5>Contato</h5>
                <p><i class="bi bi-telephone"></i> {{$priod->whatsapp}} | {{$priod->contacto}}</p>
                <small style="font-size: 0.75rem;"><i class="bi bi-envelope"></i> {{$priod->email}}</small>
            </div>
            <div class="col-md-3 mb-3 mb-md-0 text-center">
                <h5>Parceiros</h5>
                <div class="text-center">
                    <img src="{{ asset('build/assets/imgs/rammesevolutionlogowhite.png') }}"
                         alt="RAMMES Evolution"
                         class="mb-2"
                         style="height: 30px; width: auto; max-width: 120px;">
                    <div>
                        <small class="text-light" style="font-size: 0.75rem;">Parceiro Tecnológico</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5>Redes Sociais</h5>
                <a href="{{$priod->facebook_link}}" class="text-white me-2" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="{{$priod->instagram_link}}" class="text-white me-2" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="{{$priod->linkedin_link}}" class="text-white me-2" target="_blank"><i class="bi bi-linkedin"></i></a>
                <a href="https://wa.me/{{$priod->whatsapp}}" class="text-white me-2" target="_blank"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
        
        <!-- Linha de separação -->
        <hr class="my-4 border-light">
        
        <!-- Seção de créditos -->
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0">
                    &copy; {{ date('Y') }} PRIOD - Centro Técnico Profissional de Excelência. Todos os direitos reservados.
                </p>
                <p class="mb-0 mt-2">
                    <small class="text-light">
                        Desenvolvido por 
                        <a href="#" class="text-white text-decoration-none fw-bold">RAMMES Evolution</a>
                    </small>
                </p>
            </div>
        </div>
    </div>
</footer>
