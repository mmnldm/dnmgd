$(document).ready(function () {
  getAdmins();

  $("input[name='e_cat_title']").val(cat.cat_title);
  $("input[name='cat_id']").val(cat.cat_id);

  function getAdmins() {
    $.ajax({
      url: "./classes/Admin.php",
      method: "POST",
      data: { GET_ADMIN: 1 },
      success: function (response) {
        console.log(response);
        var resp = $.parseJSON(response);

        if (resp.status == 202) {
          var adminHTML = "";

          $.each(resp.message, function (index, value) {
            adminHTML +=
              "<tr>" +
              "<td>#</td>" +
              "<td>" +
              value.name +
              "</td>" +
              "<td>" +
              value.email +
              "</td>" +
              "<td>" +
              value.is_active +
              "</td>" +
              '<td><a class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>' +
              "</tr>";
          });

          $("#admin_list").html(adminHTML);
        } else if (resp.status == 303) {
          $("#admin_list").html(resp.message);
        }
      },
    });
  }

  $(".submit-edit-admin").on("click", function () {
    $.ajax({
      url: "./classes/Admin.php",
      method: "POST",
      data: new FormData($("#edit-admin-form")[0]),
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        console.log(response);
        var resp = $.parseJSON(response);
        if (resp.status == 202) {
          $("#edit-admin-form").trigger("reset");
          getAdmins();
          alert(resp.message);
        } else if (resp.status == 303) {
          alert(resp.message);
        }
      },
    });
  });

  // $(".add-brand").on("click", function(){

  // 	alert();

  // });
});
