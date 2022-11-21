<table id="rotinas1" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Título</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-start">01</td>
                <td class="text-start">Alterar data e Lop do título</td>
                <td class="text-start"><span class="badge bg-success">Ativo</span></td>
                <td class="text-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#alterar_lops_modal">
                <i class="fa-solid fa-square-arrow-up-right"></i>
                    Executar
                </button>
                </td>
            </tr>

            <tr>
                <td class="text-start">02</td>
                <td class="text-start">Alterar Situação do título</td>
                <td class="text-start"><span class="badge bg-success">Ativo</span></td>
                <td class="text-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#alterar_situacao_titulo_modal">
                <i class="fa-solid fa-square-arrow-up-right"></i>
                    Executar
                </button>
                </td>
            </tr>

            <tr>
                <td class="text-start">03</td>
                <td class="text-start">Liberar pedido para aprovação</td>
                <td class="text-start"><span class="badge bg-success">Ativo</span></td>
                <td class="text-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#liberar_pedido_aprovacao_modal">
                <i class="fa-solid fa-square-arrow-up-right"></i>
                    Executar
                </button>
                </td>
            </tr>

            <tr>
                <td class="text-start">04</td>
                <td class="text-start">Verifica taxas dos cartões</td>
                <td class="text-start"><span class="badge bg-success">Ativo</span></td>
                <td class="text-start">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#verifica_taxas_cartoes_modal">
                <i class="fa-solid fa-square-arrow-up-right"></i>
                    Executar
                </button>
                </td>
            </tr>

        <tfoot>
            <tr>
                <th>id</th>
                <th>Título</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </tfoot>
    </table>

    <?php $this->load->view('rotinas/modal/alterar_lops_modal')?>
    <?php $this->load->view('rotinas/modal/alterar_situacao_titulo_modal')?>
    <?php $this->load->view('rotinas/modal/liberar_pedido_aprovacao_modal')?>
    <?php $this->load->view('rotinas/modal/verifica_taxas_cartoes_modal')?>
    

<script>
    $(document).ready(function () {
        $('#rotinas1').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>