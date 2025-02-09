

<div 
class="card cardc  "    x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" 
style="border-left-color:  rgb(247, 94, 94) !important; border-width: 5px; position: absolute; top:2%; right:2%; width:20rem;">
    <a href=" " class="card-body text-decoration-none">
        <div class="row no-gutters">
         <div class="row d-flex">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <i class="bi fs-5 bi-x-circle-fill" style="color: rgb(247, 94, 94) !important;"></i>
              
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8">
                <h6>Erro</h6>
       
            <div class="col-sm-2 col-md-2 col-lg-2">
                <i class='fs-5 bi bi-x '  data-bs-dismiss="alert" ></i>
            </div>
             </div> 
            <div class="col mr-2">
               
                <div class="text-xs  text-sm mb-1">{{ session('erro') }}</div>
                
                    
            </div>
           
        </div>
    </a>
</div>     </div>