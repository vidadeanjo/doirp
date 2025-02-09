<div id="">
  
 
     
    <div class="">
       
     

        <!-- Modal de Sucesso -->
        <div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog"  data-bs-backdrop="true" data-bs-keyboard="true"  >
            <div class="modal-dialog modal-dialog-centered " role="document" >
                <div class="modal-content" style="width: 60rem !important;">
                    <div class="modal-body text-center p-lg-4">
                        <!-- Ícone de sucesso (substitua pelo seu próprio ícone) -->
                        <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                            <span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span>
                            <span class="swal2-x-mark-line-right"></span></span>
                        </div>
                       
                       <h4 class="text-danger mt-3">Ocorreu um erro!</h4>
                           <p class="text-sm">{{ session('message') }}</p>
                        
                        <button type="button" class="btn  mt-3 btn-danger" data-bs-dismiss="modal" autofocus>Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>


     <script type="text/javascript">
        window.onload = () => {
            const myModal = new bootstrap.Modal('#statusSuccessModal');
            myModal.show();
           
            
        }

     
    </script>