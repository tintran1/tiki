$(document).ready(function () {
    $(".shopping__payment-main-right_Summary_button").click(function () {
        var div = document.getElementById("transaction").textContent;
       var divs = document.getElementById("shippings_id").value;
    console.log(div,divs);
    })
})
paypal.Buttons({
    // Order is created on the server and the order id is returned
    createOrder() {
      return fetch("/api/paypal/order/create", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
            'user_id' : document.getElementById("user_id").value,
            'products_id' : document.getElementById("id_products").value,
            'shippings_id' : document.getElementById("shippings_id").value,
            "value": document.getElementById('transaction').textContent,
            "quantity": document.getElementById("quantity").value
        }),
      })
      .then((response) => response.json())
      .then((order) => order.id);
    },
    // Finalize the transaction on the server after payer approval
    onApprove(data) {
      return fetch("/api/paypal/order/capture", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderId: data.orderID
        })
      })
      .then((response) => response.json())
      .then((orderData) => {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  window.location.href = 'thank_you.html';
      });
    },
    
    onCancel: function (data) {
      return fetch('api/paypal/order/cancle', {
          method: 'post',
          body: JSON.stringify({
              orderID : data.orderID
          })
      }).then(function(res) {
          return res.json();
      }).then(function(orderData) {
          return orderData.id;
      });
  }

  }).render('#paypal-button-container');