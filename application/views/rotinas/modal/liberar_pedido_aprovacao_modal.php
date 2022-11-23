<!-- Modal -->
<div class="modal fade" id="liberar_pedido_aprovacao_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Liberar pedido para aprovação:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form name="formFile" action="<?= base_url('rotinas/liberaPedidoParaAprovacao')?>" method="post" enctype='multipart/form-data' class="was-validated">
  
            <div class="input-group mb-3 was-validated">
                <span class="input-group-text" id="addon-wrapping">Número do pedido:</span>
                <input type="text" name="inputNumero" required class="form-control">
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="Submit" class="btn btn-success"> -> Executar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>