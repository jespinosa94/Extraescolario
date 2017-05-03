
      function archivo(evt) {

          var files = evt.target.files; // FileList object

          // Obtenemos la imagen del campo "file".
          for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos im�genes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                  // Insertamos la imagen
                 document.getElementById("img").innerHTML = ['<img class="imagenperfil" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);

            reader.readAsDataURL(f);
          }
      }

      document.getElementById('files').addEventListener('change', archivo, false);
