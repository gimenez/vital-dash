<!-- Modal -->
<div class="modal fade" id="verifica_taxas_cartoes_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
        <div class="modal-header">
            <h5 class="modal-title" id="">Taxas dos cartões:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Lop</th>
                        <th scope="col">Tipo Cartão</th>
                        <th scope="col">Data Fim</th>
                        <th scope="col">Taxa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($taxas as $taxa) { ?>
                        <tr>
                            <td><?= $taxa->lop?></td>
                            <td><?= $taxa->tipo_cartao?></td>
                            <td><?= $taxa->data_fim?></td>
                            <th scope="row"><?= $taxa->taxa * 100?> %</th>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
</div>