<div class="form-container">
    <form name="formFile" action="<?= base_url('index.php/cpfl/uploadFile')?>" method="post" enctype='multipart/form-data'>
        <div class="mb-3" class="form-group">
            <label for="formFileSm" class="form-label">Enviar arquivo CPFL</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file" name="file">
        </div>
        <div class="mb-3">
            <input class="form-control form-control-sm btn btn-outline-success" value="Enviar" type="submit">
        </div>
    </form>
</div>