<footer class="bg-secondary-priod text-white py-4 footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>PRIOD</h5>
                <p>Centro Técnico Profissional de Excelência</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>Contato</h5>
                <p><i class="bi bi-telephone"></i> {{$priod->whatsapp}} | {{$priod->contacto}}</p>

                <p><i class="bi bi-envelope"></i> {{$priod->email}}</p>
            </div>
            <div class="col-md-4">
                <h5>Redes Sociais</h5>
                <a href="{{$priod->facebook_link}}" class="text-white me-2" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="{{$priod->instagram_link}}" class="text-white me-2" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="{{$priod->linkedin_link}}" class="text-white me-2" target="_blank"><i class="bi bi-linkedin"></i></a>
                <a href="https://wa.me/{{$priod->whatsapp}}" class="text-white me-2" target="_blank"><i class="bi bi-whatsapp"></i></a>
                
            </div>
        </div>
    </div>
</footer>