<!-- Modal -->
<div class="modal fade" id="alterar_lops_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <form name="alterar_lops_form" action="<?= base_url('rotinas/alterarDataELopDoTitulo')?>" method="post" enctype='multipart/form-data' >  
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Alterar data e Lop do título:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <span class="input-group-text" id="addon-wrapping">Data</span>
            <input type="text" class="form-control" name="inputData" placeholder="Data de Liquidação" aria-label="dataLiquidacao" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputLop">Lop:</label>
            <select class="form-select" name="inputLop">
              <option value="0" selected>Selecione</option>
              <option value="4986392">- CIELO</option>
              <option value="509613718">- CIELO30</option>
              <option value="533570479"> - CIELO30 - RETENTATIVA</option>
              <option value="32703791">- CIELO POS</option>
              <option value="98154792">- REDE</option>
              <option value="224549910">- REDE - FVH</option>
              <option value="2049760">- GETNET POS</option>
              <option value="325320409">- FVH - GETNET POS</option>
              <option value="535608704">- E-REDE</option>
              <option value="535608791">- E-REDE - FVH</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Informar Docs: </span>
            <textarea class="form-control" name="inputDocs" aria-label="With textarea" rows="4" cols="50"></textarea>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Informar TIDs: </span>
            <textarea class="form-control" name="inputTids" aria-label="With textarea" rows="4" cols="50"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Fechar</button>
          <button type="submit" class="btn btn-success"><i class="fa-solid fa-rotate"></i> Refresh</button>
        </div>
      </div>
    </div>
  </form>
</div>