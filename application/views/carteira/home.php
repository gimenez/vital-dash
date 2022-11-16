<table  id="carteira1" class="table table-hover" >
    <thead>
    <th scope="row">Nro. Título</th>
        <th scope="row">Sequência</th> 
        <th scope="row">Situação</th> 
        <th scope="row">Valor</th>
        <th scope="row">Saldo</th>
        <th scope="row">Dt. Prev. Pag.</th> 
        <th scope="row">Lop</th> 
        <th scope="row">Observações</th> 
    </thead>
    <tbody>
        <?php foreach ($titulos as $titulo) { ?>
            <tr>
                <td  class="table-active"><?php echo $titulo->numero_titulo.'</br>'?></td>
                <td  class="table-active"><?php echo $titulo->sequencia?></td>
                <td  class="table-active"><?php echo $titulo->situacao.'</br>'?></td>
                <td  class="table-active"><?php echo 'R$'.$titulo->valor.'</br>'?></td>
                <td  class="table-active"><?php echo 'R$'.$titulo->saldo.'</br>'?></td>
                <td  class="table-active"><?php echo date_format(date_create($titulo->data_previsao_pagamento),"d/m/Y")?></td>
                <td  class="table-active"><?php echo $titulo->lop?></td>
                <td  class="table-active"><?php echo $titulo->observacoes?></td>
            </tr>
        <?php }?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#carteira1').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>