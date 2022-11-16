<div class="form-container">
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
</div>

<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("demo_test_post.asp",
    {
      name: "Donald Duck",
      city: "Duckburg"
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>