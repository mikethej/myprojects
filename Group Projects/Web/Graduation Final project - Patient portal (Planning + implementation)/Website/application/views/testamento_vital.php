    <script>
        + function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);
    </script>
</head>
<body>

     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-ms-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Testamento Vital</h4>
                            </div>
                        
     <div class="panel">
        <div class="panel-body">
          <h5>Selecione o ficheiro do seu computador.</h5>
          <form action="<?php echo base_url('index.php/Upload/do_upload');?>" method="POST" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input value="upload" type="file" name="files" id="js-upload-files" multiple>
              </div>
              <button type="submit" class="btn btn-sm btn-primary botaocarregar" id="js-upload-submit">Carregar ficheiro</button>
            </div>
          </form>

          <!-- Drop Zone -->
          <h5>Arraste para aqui o seu ficheiro</h5>
          <div class="upload-drop-zone" id="drop-zone">
          </div>

          <!-- Upload Finished -->
          <div class="js-upload-finished">
            <h3>Ficheiros carregados</h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-success">doc1.pdf</a>
              <a href="#" class="list-group-item list-group-item-success">doc2.pdf</a>
            </div>
          </div>
        </div>
      </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <footer class="footer">
                <p class="copyright pull-right">
                  Grupo007
                </p>
        </footer>

    </div>
</div>


</body>
</html>
