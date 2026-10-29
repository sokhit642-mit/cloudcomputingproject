
document.querySelector("#files").addEventListener("change", (e) => { //CHANGE EVENT FOR UPLOADING PHOTOS
    if (window.File && window.FileReader && window.FileList && window.Blob) { //CHECK IF FILE API IS SUPPORTED
      const files = e.target.files; //FILE LIST OBJECT CONTAINING UPLOADED FILES
      const output = document.querySelector("#result");
      output.innerHTML = "";
      for (let i = 0; i < files.length; i++) { // LOOP THROUGH THE FILE LIST OBJECT
          if (!files[i].type.match("image")) continue; // ONLY PHOTOS (SKIP CURRENT ITERATION IF NOT A PHOTO)
          const picReader = new FileReader(); // RETRIEVE DATA URI 
          picReader.addEventListener("load", function (event) { // LOAD EVENT FOR DISPLAYING PHOTOS
            const picFile = event.target;
            const div = document.createElement("div");
            div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
            output.appendChild(div);
          });
          picReader.readAsDataURL(files[i]); //READ THE IMAGE
      }
    } else {
      alert("Your browser does not support File API");
    }
});

/**
   * change image in category
   */

function laodfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('do_rub')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
/**
   * Image preview
   */
// 
function previewBeforeUpload(id){
    document.querySelector("#"+id).addEventListener("change",function(e){
      if(e.target.files.length == 0){
        return;
      }
      let file = e.target.files[0];
      let url = URL.createObjectURL(file);
      
      document.querySelector("#"+id+"-preview img").src = url;
    });
  }

previewBeforeUpload("image");

// {{-- upload mullti image --}}
 

    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        maxUpload : 20, // maximum number of uploaded images
        maxSize:2, // in size in mb
        filesInpName:'images', // input name sent to backend
        formSelector: '#my-form', // form selector
    });

    // product image previews....
    $(document).ready(function () {
        ImgUpload();
      });
      
      function ImgUpload() {
        let imgWrap = "";
        const imgArray = [];
      
        $('.form-control1').on('change', function (e) {
          imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
          const maxLength = $(this).data('max_length');
      
          const files = e.target.files;
          const filesArr = Array.prototype.slice.call(files);
      
          filesArr.forEach(function (f) {
            if (!f.type.match('image.*')) {
              return;
            }
      
            if (imgArray.length >= maxLength) {
              alert("You can't upload more than " + maxLength + " images.");
              return false;
            } else {
              imgArray.push(f);
      
              const reader = new FileReader();
              reader.onload = function (e) {
                const html = `
                  <div class='upload__img-box'>
                    <div style='background-image: url(${e.target.result})' data-file='${f.name}' class='img-bg'>
                      <div class='upload__img-close' data-file='${f.name}'></div>
                    </div>
                  </div>`;
                imgWrap.append(html);
              }
              reader.readAsDataURL(f);
            }
          });
        });
      
        $('body').on('click', ".upload__img-close", function () {
          const fileName = $(this).data("file");
          const input = document.getElementById('form-control1');
          const dt = new DataTransfer();
      
          for (let i = 0; i < input.files.length; i++) {
            if (input.files[i].name !== fileName) {
              dt.items.add(input.files[i]);
            }
          }
      
          input.files = dt.files;
      
          imgArray.splice(imgArray.findIndex(file => file.name === fileName), 1);
          $(this).closest('.upload__img-box').remove();
        });
      }
//  drop zone
    Dropzone.autoDiscover = false;    
      $(function () {
          // Summernote
          $('.summernote').summernote({
              height: '300px'
          });
         
          const dropzone = $("#image").dropzone({ 
              url:  "create-product.html",
              // maxFiles: 5,
              addRemoveLinks: true,
              acceptedFiles: "image/jpeg,image/png,image/gif",
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }, success: function(file, response){
                  $("#image_id").val(response.id);
              }
          });

    });      

      
  
