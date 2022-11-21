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
        <?php //foreach ($faqs as $faq) {?>
            <tr>
                <td class="text-start"><?php echo $faq->faq_id?></td>
                <td class="text-start"><?php echo $faq->faq_titulo?></td>
                <td class="text-start">
                  <?php 
                    if ($faq->faq_status == "1"){
                      echo '<span class="badge bg-success">Ativo</span>';
                    }else{
                      echo '<span class="badge bg-danger">Desativado</span>';
                    }
                  ?>
                </td>
                <td class="text-start"><?php echo $faq->faq_tags?></td>
                <td class="text-start">
                  <span class="badge rounded-pill bg-success"> 
                    <i class="fa-solid fa-eye"></i>
                  </span>
                  <span class="badge rounded-pill bg-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </span>
                  <!-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#liberar_pedido_aprovacao_modal">
                  <i class="fa-solid fa-square-arrow-up-right"></i>
                      Executar
                  </button> -->
                </td>
            </tr>
        <?php// }?>

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

<script>
    $(document).ready(function () {
        $('#faq1').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>

<!-- <div class="form-container">
    <form class="row g-3 ">
        <div class="col-md-6 was-validated">
            <label for="faqTitulo" class="form-label">Título:</label>
            <input type="text" class="form-control is-invalid" required id="faqTitulo">
        </div>

        <div class="col-md-6 was-validated">
            <label for="faqTag" class="form-label">Tags:</label>
            <input type="text" class="form-control" required id="faqTag">
        </div>

        <div class="col-md-12 was-validated">
            <label for="faq" class="form-label">Conteúdo:</label>
            <textarea name="faqConteudo" required id="faq" ></textarea>
            <script>
                    CKEDITOR.replace( 'faqConteudo' );
            </script>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div> -->


<script>
// $(document).ready(function(){
//   $("button").click(function(){
//     $.post("demo_test_post.asp",
//     {
//       name: "Donald Duck",
//       city: "Duckburg"
//     },
//     function(data,status){
//       alert("Data: " + data + "\nStatus: " + status);
//     });
//   });
// });
</script>