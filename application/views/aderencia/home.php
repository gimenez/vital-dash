<table  id="aderencia1" class="table table-hover">
    <thead>
        <th scope="row">Dia</th>
        <th scope="row">Login</th> 
        <th scope="row">Equipe</th> 
    </thead>
    <tbody>
        <?php foreach ($aderencias as $aderencia) { ?>
            <tr>
                <td  class="table-active text-start"><?php echo $aderencia->dia?></td>
                <td  class="table-active text-start"><?php echo $aderencia->login?></td>
                <td  class="table-active text-start"><?php echo $aderencia->equipe?></td>
            </tr>
        <?php }?>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row">Dia</th>
            <th scope="row">Login</th> 
            <th scope="row">equipe</th> 
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function () {
        $('#aderencia1').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>