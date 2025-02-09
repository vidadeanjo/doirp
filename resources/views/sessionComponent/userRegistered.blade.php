<div id="">
  
   
     <!---
         x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
     <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
     -->
     
    <div class="">
       
        <!-- Modal de Erro
        <div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center p-lg-4">
                     
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                            <circle class="path circle" fill="none" stroke="#db3646" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                            <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                            <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2" />
                        </svg>
                        <h4 class="text-danger mt-3">Email inválido!</h4>
                        <p class="mt-3">Este email já está registrado, faça login.</p>
                        <button type="button" class="btn btn-sm mt-3 btn-danger" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Modal de Sucesso -->
        <div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog"  data-bs-backdrop="true" data-bs-keyboard="true"  >
            <div class="modal-dialog modal-dialog-centered " role="document" >
                <div class="modal-content" style="width: 60rem !important;">
                    <div class="modal-body text-center p-lg-4">
                        <!-- Ícone de sucesso (substitua pelo seu próprio ícone) -->
                        <div class="swal2-icon swal2-success swal2-animate-success-icon " style="display: flex;">
                            <span class="swal2-success-line-tip"></span>
                            <span class="swal2-success-line-long"></span>
                            <div class="swal2-success-ring"></div> 
                           
                           </div>
                           <!-- <h4 class="text-success mt-3">Pedido realizado com sucesso!</h4>-->
                           <h4 class="text-success mt-3">{{ session('message') }}</h4>
                        
                        <button type="button" class="btn  mt-3 btn-success" data-bs-dismiss="modal" autofocus>Ok</button>
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