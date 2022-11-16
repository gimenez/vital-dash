<!-- Modal -->
<div class="modal fade" id="alterar_situacao_titulo_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Alterar situação do título:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form name="formFile" action="<?= base_url('titulo/alterSituacao')?>" method="post" enctype='multipart/form-data' class="was-validated">
  

          <div class="input-group mb-3 was-validated">
            <span class="input-group-text" id="addon-wrapping">Número dos Títulos:</span>
              <input type="text" name="inputNumeroTitulo" required class="form-control">
          </div>

          <div class="input-group mb-3 was-validated">
            <span class="input-group-text" id="addon-wrapping">Sequência do Títulos:</span>
              <input type="text" name="inputSequenciaTitulo" required class="form-control">
          </div>

          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Situação:</label>
            <select class="form-select" required name="inputSituacaoTitulo">
              <option selected>Selecione</option>
              <option value="A">- ABERTO</option>
              <option value="C">- CANCELADO</option>
              <option value="E">- ANALISE</option>
              <option value="L">- LIQUIDADO</option>
              <option value="M">- MANUTENÇÃO</option>
              <option value="N">- NEGOCIADO</option>
              <option value="P">- INCOBRÁVEL</option>
              <option value="R">- LIQUIDADO PARCIALMENTE</option>
              <option value="PR">- PREVISTO</option>
              <option value="PM">- PROGRAMADO</option>
            </select>
          </div>
        
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
              <button type="Submit" class="btn btn-success"> -> Executar</button>
            </div>
        </div>
      </form>
  </div>
</div>