$(document).ready(function() {

    fetch_data();

    function fetch_data() {
        $.ajax({
            url: "fetch.php",
            success: function(data) {
                $('tbody').html(data);
            }
        })
    }

    $('#add_button').click(function() {
        $('#action').val('insert');
        $('#button_action').val('<?php echo $lang['
            ekle '];?>');
        $('.modal-title').text('<?php echo $lang['
            ekle '];?>');
        $('#apicrudModal').modal('show');
    });

    $('#api_crud_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#first_name').val() == '') {
            alert("Ad giriniz");
        } else if ($('#last_name').val() == '') {
            alert("Soyad Giriniz");
        } else {
            var form_data = $(this).serialize();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                    fetch_data();
                    $('#api_crud_form')[0].reset();
                    $('#apicrudModal').modal('hide');
                    if (data == 'insert') {
                        alert("Data Api ile Eklendi");
                    }
                    if (data == 'update') {
                        alert("Data Api ile G?ncellendi");
                    }
                }
            });
        }
    });

    $(document).on('click', '.edit', function() {

        var id = $(this).attr('id');
        var action = 'fetch_single';
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { id: id, action: action },
            dataType: "json",
            success: function(data) {
                $('#hidden_id').val(id);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#action').val('update');
                $('#button_action').val('Düzenle');
                $('.modal-title').text('Düzenle');
                $('#apicrudModal').modal('show');
            }
        })
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).attr("id");
        var action = 'delete';
        if (confirm("Api Kullanarak silmek istedi?nize emin misiniz ?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { id: id, action: action },
                success: function(data) {
                    fetch_data();
                    alert("Data Silindi");
                }
            });
        }
    });

});