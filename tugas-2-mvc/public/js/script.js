$(function () {
  $(".addBtnUser").on("click", function () {
    $("#modalTitle").html("Add User");
    $(".submitBtnUser").html("Create User");
    $(".submitBtnUser").attr("onclick", "return confirm('Create User?')");
  });

  $(".addBtnEvent").on("click", function () {
    $("#modalTitle").html("Add Event");
    $(".submitBtnEvent").html("Create Event");
    $(".submitBtnEvent").attr("onclick", "return confirm('Create Event?')");
  });

  $(".editModalBtnEvent").on("click", function () {
    $("#modalTitle").html("Edit Event");
    $(".submitBtnEvent").html("Update Event");
    $(".submitBtnEvent").attr("onclick", "return confirm('Update Event?')");
    $(".modal-body form").attr("action", "http://localhost/php/tugas-2-mvc/public/event/update");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/php/tugas-2-mvc/public/event/edit",
      data: { id: id },
      method: "POST",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#name").val(data.name);
        $("#date").val(data.date);
        $("#detail").val(data.detail);
        $("#image").val(data.image);
      },
    });
  });
});
