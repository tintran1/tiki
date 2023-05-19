// get city
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
  method: "GET",
  responseType: "application/json",
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if (this.value != "") {
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}

// hide show form-information
$(".shopping-checkout__main-styles").hide()
$(".Gpiogm").click(function () {
  $(".shopping-checkout__main-styles").show()
});
$(".shopping-checkout__main-styles--button_cancel").click(function () {
  $(".shopping-checkout__main-styles").hide()
});


//add-address
$(document).ready(function () {
  $(".shopping-checkout__main-styles--button_update").click(function () {

    var formdata = new FormData()
    var id = $("#id").val();
    var name = $("#name").val();
    var phone = $("#phones").val();
    var city = $('#city').find(":selected").text();
    var district = $('#district').find(":selected").text();
    var ward = $('#ward').find(":selected").text();
    var address = $("#addresss").val();
    formdata.append('id', id);
    formdata.append('name', name);
    formdata.append('phone', phone);
    formdata.append('city', city);
    formdata.append('district', district);
    formdata.append('ward', ward);
    formdata.append('address', address);
    $.ajax({
      type: 'POST',
      url: "/add-information",
      data: formdata,
      cache: false,
      async: false,
      processData: false,
      contentType: false,
      success: function (data) {
        if ($.isEmptyObject(data.errors)) {
          $(".error_msg").html('');
          alert(data.success);
        } else {
          let resp = data.errors;
          for (index in resp) {
            $("#" + index).html(resp[index]);
          }
        }
      }
    });
  });
});
