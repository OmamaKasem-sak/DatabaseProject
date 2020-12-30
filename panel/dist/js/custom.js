var URL = $("html").data("url");
var MAINURL = $("html").data("mainurl");

$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    // Summernote
    $('.textarea').summernote()
});

function aktifpasif(id, table) {
    var state = 0;
    if ($("#aktifpasif" + id).is(':checked')) {
        state = 1;
    } else {
        state = 0;
    }

    $.ajax({
        method: "POST",
        url: URL + "ajax.php",
        data: {"table": table, "id": id, "state": state},
        success: function (sonuc) {
            if (sonuc == "TAMAM") {

            } else {
                alert("İşleminiz şuan geçersiniz. Lütfen daha sonra tekrar deneyiniz.");
            }
        }

    });
}

function addStock() {
    // addProductForm
    $.ajax({
        method: "POST",
        url: URL + "ajax.php",
        data: $(".addProductForm").serialize(),
        success: function (sonuc) {
            if (sonuc == "BOS") {

            } else {
                $(".stockManagament").html(sonuc);
            }
        }

    });
}

function deleteOption(optionNo) {
    $(".optionList" + optionNo).remove();
}

var listQueue = 0;

function addVariation(variationNo, variationName) {
    listQueue++;
    swal(variationName + " Seçeneğiniz:", {
        content: "input",
    })
        .then((value) => {
            if (value != null) {
                $(".options_" + variationNo).append('<li class="optionList' + listQueue + '">' + value + '<a class="btn btn-danger btn-xs" style="color: #fff;float:right;" onclick="deleteOption(' + listQueue + ')"><i class="fa fa-trash-alt"></i></a><input type="hidden" name="option' + variationNo + '[]" value="' + value + '"></li>');
            }
        });
}

$(function () {
    $(".deleteArea").click(function (e) {
        e.preventDefault();
        var url = e.currentTarget.getAttribute("href");

        swal({
            title: "Silmek istediğinize emin misiniz?",
            text: "Bu veriyi sildiğinizde bir daha geri alamayacaksınız!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                } else {
                    swal("İşleminiz başarıyla iptal edildi.");
                }

            });
    });


    var variationNo = 0;
    $(".addVariation").click(function () {
        variationNo++;
        swal("Varyasyon İsmi:", {
            content: "input",
        })
            .then((value) => {
                if (value != null) {
                    $(".buttonControl").show();
                    if (variationNo < 5) {
                        $(".variationGroup").append('<div class="col-md-3 variationNo_' + variationNo + '"><h2>' + value + '<a class="btn btn-warning btn-xs variationButtonNo_' + variationNo + '" onclick="addVariation(' + variationNo + ',\'' + value + '\')" style="color:#fff;float:right;"><i class="fa fa-plus"></i> Seçenek Ekle</a><input type="hidden" name="variation' + variationNo + '" value="' + value + '"></h2><ul class="options_' + variationNo + '"></ul></div>');
                    } else {
                        swal("Maksimum 4 adet varyasyon tanımlayabilirsiniz.")
                    }
                }
            });
    });
});