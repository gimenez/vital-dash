<div class="row">&#32;</div>
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-outline-success pull-rigth">
            <i class="fa-solid fa-circle-plus"></i>    
            Adicionar
        </button>
    </div>
</div>
<div class="row">&#32;</div>

<table id="faq1" class="display" style="width:80%">
        <thead>
            <tr>
                <th>id</th>
                <th>Título</th>
                <th>Status</th>
                <th>#tags</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($faqs as $faq){?>
                <tr>
                    <td class="text-start"><?= $faq->faq_id?></td>
                    <td class="text-start"><?= $faq->faq_titulo?></td>
                    <td class="text-start">
                        <?php if ($faq->faq_status == '1') {
                            echo '<span class="badge bg-success">Ativo</span>';
                        }else{
                            echo '<span class="badge bg-danger">Desativado</span>';
                        }
                    ?></td>
                    <td class="text-start"><?= $faq->faq_tags?></td>
                    <td class="text-start">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-eye"></i>
                            Visualizar
                        </button>
                    </td>
                </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>Título</th>
                <th>Status</th>
                <th>#tags</th>
                <th>Ações</th>
            </tr>
        </tfoot>
    </table>

    <?php $this->load->view('faq/modal/faq_modal')?>
<script>
    $(document).ready(function () {
        $('#faq1').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>