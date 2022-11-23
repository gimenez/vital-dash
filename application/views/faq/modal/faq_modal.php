<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Visualiza Faq</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 ">
                <div class="col-md-6">
                    <label for="faqTitulo" class="form-label">Título:</label>
                    <input type="text" class="form-control is-invalid" required id="faqTitulo">
                </div>

                <div class="col-md-6">
                    <label for="faqTag" class="form-label">Tags:</label>
                    <input type="text" class="form-control" required id="faqTag">
                </div>

                <div class="col-md-12">
                    <label for="faq" class="form-label">Conteúdo:</label>
                    <textarea name="faqConteudo" required id="faq" ></textarea>
                    <script>
                            CKEDITOR.replace( 'faqConteudo' );
                    </script>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="faq_modal_" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
        <div class="modal-header">
            <h5 class="modal-title" id="">Visualizador</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3 ">
                <div class="col-md-6">
                    <label for="faqTitulo" class="form-label">Título:</label>
                    <input type="text" class="form-control is-invalid" required id="faqTitulo">
                </div>

                <div class="col-md-6">
                    <label for="faqTag" class="form-label">Tags:</label>
                    <input type="text" class="form-control" required id="faqTag">
                </div>

                <div class="col-md-12">
                    <label for="faq" class="form-label">Conteúdo:</label>
                    <textarea name="faqConteudo" required id="faq" ></textarea>
                    <script>
                            CKEDITOR.replace( 'faqConteudo' );
                    </script>
                </div>
            </form> -->
        <!-- </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
</div>  -->