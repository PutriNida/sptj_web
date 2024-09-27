<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Limitless Innovation 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js'); }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js'); }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/sb-admin-2.min.js'); }}"></script>
    <script src="{{ URL::asset('js/jquery.richtext.min.js'); }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js'); }}"></script>
    <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js'); }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('js/demo/datatables-demo.js'); }}"></script>
</body>

</html>

<script>
$('.content').richText({

  // text formatting
  bold: true,
  italic: true,
  underline: true,

  // text alignment
  leftAlign: true,
  centerAlign: true,
  rightAlign: true,
  justify: true,

  // lists
  ol: true,
  ul: true,

  // title
  heading: true,

  // fonts
  fonts: true,
  fontList: ["Arial",
    "Arial Black",
    "Comic Sans MS",
    "Courier New",
    "Geneva",
    "Georgia",
    "Helvetica",
    "Impact",
    "Lucida Console",
    "Tahoma",
    "Times New Roman",
    "Verdana"
  ],
  fontColor: true,
  backgroundColor: true,
  fontSize: true,

  // uploads
  imageUpload: false,
  fileUpload: false,

  // media
  videoEmbed: false,

  // link
  urls: false,

  // tables
  table: true,

  // code
  removeStyles: true,
  code: true,

  // colors
  colors: [],

  // dropdowns
  fileHTML: '',
  imageHTML: '',

  // translations
  translations: {
    'title': 'Title',
    'white': 'White',
    'black': 'Black',
    'brown': 'Brown',
    'beige': 'Beige',
    'darkBlue': 'Dark Blue',
    'blue': 'Blue',
    'lightBlue': 'Light Blue',
    'darkRed': 'Dark Red',
    'red': 'Red',
    'darkGreen': 'Dark Green',
    'green': 'Green',
    'purple': 'Purple',
    'darkTurquois': 'Dark Turquois',
    'turquois': 'Turquois',
    'darkOrange': 'Dark Orange',
    'orange': 'Orange',
    'yellow': 'Yellow',
    'imageURL': 'Image URL',
    'fileURL': 'File URL',
    'linkText': 'Link text',
    'url': 'URL',
    'size': 'Size',
    'responsive': '<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a>',
    'text': 'Text',
    'openIn': 'Open in',
    'sameTab': 'Same tab',
    'newTab': 'New tab',
    'align': 'Align',
    'left': 'Left',
    'justify': 'Justify',
    'center': 'Center',
    'right': 'Right',
    'rows': 'Rows',
    'columns': 'Columns',
    'add': 'Add',
    'pleaseEnterURL': 'Please enter an URL',
    'videoURLnotSupported': 'Video URL not supported',
    'pleaseSelectImage': 'Please select an image',
    'pleaseSelectFile': 'Please select a file',
    'bold': 'Bold',
    'italic': 'Italic',
    'underline': 'Underline',
    'alignLeft': 'Align left',
    'alignCenter': 'Align centered',
    'alignRight': 'Align right',
    'addOrderedList': 'Ordered list',
    'addUnorderedList': 'Unordered list',
    'addHeading': 'Heading/title',
    'addFont': 'Font',
    'addFontColor': 'Font color',
    'addBackgroundColor': 'Background color',
    'addFontSize': 'Font size',
    'addImage': 'Add image',
    'addVideo': 'Add video',
    'addFile': 'Add file',
    'addURL': 'Add URL',
    'addTable': 'Add table',
    'removeStyles': 'Remove styles',
    'code': 'Show HTML code',
    'undo': 'Undo',
    'redo': 'Redo',
    'save': 'Save',
    'close': 'Close'
  },

  // privacy
  youtubeCookies: false,

  // preview
  preview: false,

  // placeholder
  placeholder: '',

  // dev settings
  useSingleQuotes: false,
  height: 0,
  heightPercentage: 0,
  adaptiveHeight: false,
  id: "",
  class: "",
  useParagraph: false,
  maxlength: 0,
  maxlengthIncludeHTML: false,
  callback: undefined,
  useTabForNext: false,
  save: false,
  saveCallback: undefined,
  saveOnBlur: 0,
  undoRedo: true

});

$("#kd_direktorat").change(function(){
    var kd_direktorat = $("#kd_direktorat").val();
	$.ajax({
		url: "/getDivisi/"+kd_direktorat,
		type: "GET",
		dataType: "json",
		contentType: "application/json;charset=utf-8",
		async: true,
        success:function(data){
            var options = "<option selected='' disabled=''>--Pilih--</option>";
            if(member != null){
              $(data).each(function(k, v){
                  options += "<option value='"+v.kd_divisi+"' >"+v.divisi+"</option>";
                });
            }else{
              	$(data).each(function(k, v){
			options += "<option value='"+v.kd_divisi+"'>"+v.divisi+"</option>";
		});
            }


		$("#kd_divisi").html(options);
        $("#kd_departemen").html("<option selected='' disabled=''>--Pilih--</option>");
        $("#kd_jabatan").html("<option selected='' disabled=''>--Pilih--</option>");
	}
	}).failed(function(){
		// something blew up, show error here
	});
});

$("#kd_divisi").change(function(){
    var kd_divisi = $("#kd_divisi").val();
	$.ajax({
		url: "/getDepartemen/"+kd_divisi,
		type: "GET",
		dataType: "json",
		contentType: "application/json;charset=utf-8",
		async: true,
        success:function(data){
            var options = "<option selected='' disabled=''>--Pilih--</option>";
		$(data).each(function(k, v){
			options += "<option value='"+v.kd_departemen+"'>"+v.departemen+"</option>";
		});

		$("#kd_departemen").html(options);
        $("#kd_jabatan").html("<option selected='' disabled=''>--Pilih--</option>");
	}
	}).failed(function(){
		// something blew up, show error here
	});
});

$("#kd_departemen").change(function(){
    var kd_departemen = $("#kd_departemen").val();
	$.ajax({
		url: "/getJabatan/"+kd_departemen,
		type: "GET",
		dataType: "json",
		contentType: "application/json;charset=utf-8",
		async: true,
        success:function(data){
            var options = "<option selected='' disabled=''>--Pilih--</option>";
		$(data).each(function(k, v){
			options += "<option value='"+v.kd_jabatan+"'>"+v.jabatan+"</option>";
		});

		$("#kd_jabatan").html(options);
	}
	}).failed(function(){
		// something blew up, show error here
	});
});

function toggleDataDiri() {
  if (document.getElementById("datadiri").style.display  === "none") {
    document.getElementById("datadiri").style.display = "block";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-up";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("icondatadiri").className = "fa fa-angle-down";
  }
}

function toggleDataAlamat() {
  if (document.getElementById("dataalamat").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "block";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-up";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
  }
}

function toggleDataKontak() {
  if (document.getElementById("datakontak").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "block";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-up";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
  }
}

function toggleDataKarir() {
  if (document.getElementById("datakarir").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "block";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-up";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
  }
}

function toggleDataPendidikan() {
  if (document.getElementById("datapendidikan").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "block";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-up";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
  }
}

function toggleDataKeluarga() {
  if (document.getElementById("datakeluarga").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "block";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-up";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
  }
}

function toggleKartuIdentitas() {
  if (document.getElementById("kartuidentitas").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "block";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-up";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
  }
}

function toggleDataMedsos() {
  if (document.getElementById("datamedsos").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "block";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-up";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
  }
}

function toggleDataBPJS() {
  if (document.getElementById("databpjs").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "block";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-up";
  } else {
    document.getElementById("databpjs").style.display = "none";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  }
}

var countKontak = 1;
var countPendidikan = 1;
var countKeluarga = 1;
var countMedsos = 1;

dynamic_kontak(countKontak);
dynamic_pendidikan(countPendidikan);
dynamic_keluarga(countKeluarga);
dynamic_medsos(countMedsos);

 function dynamic_kontak(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_tipe_kontak[]">';
  html += '@if(isset($tipekontak))';
  html += '@forelse ($tipekontak as $tipe)';
  html += '<option value="{{ $tipe->kd_tipe_kontak }}">{{ $tipe->tipe_kontak }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-6">';
  html += '<input type="text" class="form-control" id="tujuan" name="tujuan[]" autocomplete="off">';
  html += '</div>';
        if(number > 1)
        {
            html += '<div class="col-sm-3"><button type="button" name="remove" id="" class="btn btn-danger remove">Hapus</button></div>';
            html += '</div>';
            $('#datakontak').append(html);
        }
        else
        {
            html += '<td class="col-sm-3"><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></div>';
            html += '</div>';
            $('#datakontak').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  countKontak++;
  dynamic_kontak(countKontak);
 });

 $(document).on('click', '.remove', function(){
  countKontak--;
  $(this).closest('div.form-group').remove();
 });

 $(document).ready(function() {
    var detailkontak = <?php echo isset($detailkontak) ? json_encode($detailkontak) : '[]'; ?>;

    for (let i = 0; i < detailkontak.length; i++) {
        dynamic_kontak(i + 1); // Gunakan i + 1 jika ingin indeks mulai dari 1
    }
});

 function dynamic_medsos(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_media_sosial[]">';
  html += '@if(isset($mediasosial))';
  html += '@forelse ($mediasosial as $ms)';
  html += '<option value="{{ $ms->kd_media_sosial }}">{{ $ms->media_sosial }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-6">';
  html += '<input type="text" class="form-control" id="username" name="username[]" placeholder="Username" autocomplete="off">';
  html += '</div>';
        if(number > 1)
        {
            html += '<div class="col-sm-3"><button type="button" name="removemedsos" id="" class="btn btn-danger remove">Hapus</button></div>';
            html += '</div>';
            $('#datamedsos').append(html);
        }
        else
        {
            html += '<td class="col-sm-3"><button type="button" name="addmedsos" id="addmedsos" class="btn btn-success">Tambah</button></div>';
            html += '</div>';
            $('#datamedsos').html(html);
        }
 }

 $(document).on('click', '#addmedsos', function(){
  countMedsos++;
  dynamic_medsos(countMedsos);
 });

 $(document).on('click', '.removemedsos', function(){
  countMedsos--;
  $(this).closest('div.form-group').remove();
 });

function dynamic_pendidikan(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_pendidikan[]">';
  html += '@if(isset($pendidikan))';
  html += '@forelse ($pendidikan as $pend)';
  html += '<option value="{{ $pend->kd_pendidikan }}">{{ $pend->pendidikan }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-3">';
  html += '<input type="text" class="form-control" id="institusi" name="nama_institusi[]" placeholder="Nama Institusi" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3">';
  html += '<input type="text" class="form-control" id="jurusan" name="jurusan[]" placeholder="Jurusan" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3"></div>';
  html += '<div class="col-sm-3"></div>';
  html += '<div class="col-sm-3">';
  html += '<input type="number" class="form-control" id="thn_masuk" name="thn_masuk[]" placeholder="Tahun Masuk" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3">';
  html += '<input type="number" class="form-control" id="thn_keluar" name="thn_keluar[]" placeholder="Tahun Keluar" autocomplete="off">';
  html += '</div>';

        if(number > 1)
        {
            html += '<div class="col-sm-3"><button type="button" name="removepend" id="" class="btn btn-danger remove">Hapus</button></div>';
            html += '</div>';
            $('#datapendidikan').append(html);
        }
        else
        {
            html += '<td class="col-sm-3"><button type="button" name="addpend" id="addpend" class="btn btn-success">Tambah</button></div>';
            html += '</div>';
            $('#datapendidikan').html(html);
        }
 }

 $(document).on('click', '#addpend', function(){
  countPendidikan++;
  dynamic_pendidikan(countPendidikan);
 });

 $(document).on('click', '.removepend', function(){
  countPendidikan--;
  $(this).closest('div.form-group').remove();
 });

 function dynamic_keluarga(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_hub_keluarga[]">';
  html += '@if(isset($hubungankeluarga))';
  html += '@forelse ($hubungankeluarga as $hub)';
  html += '<option value="{{ $hub->kd_hub_keluarga }}">{{ $hub->hub_keluarga }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-6">';
  html += '<input type="text" class="form-control" id="nama_lengkap_kel" name="nama_lengkap_kel[]" placeholder="Nama Lengkap" autocomplete="off">';
  html += '</div>';

        if(number > 1)
        {
            html += '<div class="col-sm-3"><button type="button" name="removekel" id="" class="btn btn-danger remove">Hapus</button></div>';
            html += '</div>';
            $('#datakeluarga').append(html);
        }
        else
        {
            html += '<td class="col-sm-3"><button type="button" name="addkel" id="addkel" class="btn btn-success">Tambah</button></div>';
            html += '</div>';
            $('#datakeluarga').html(html);
        }
 }

 $(document).on('click', '#addkel', function(){
  countKeluarga++;
  dynamic_keluarga(countKeluarga);
 });

 $(document).on('click', '.removekel', function(){
  countKeluarga--;
  $(this).closest('div.form-group').remove();
 });

</script>
