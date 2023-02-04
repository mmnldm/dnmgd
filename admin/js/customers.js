$(document).ready(function () {
  getCustomers();
  getCustomerOrders();

  function getCustomers() {
    $.ajax({
      url: "./classes/Customers.php",
      method: "POST",
      data: { GET_CUSTOMERS: 1 },
      success: function (response) {
        var resp = $.parseJSON(response);
        if (resp.status == 202) {
          var customersHTML = "";

          $.each(resp.message, function (index, value) {
            customersHTML +=
              "<tr>" +
              "<td>" +
              value.user_id +
              "</td>" +
              "<td>" +
              value.first_name +
              " " +
              value.last_name +
              "</td>" +
              "<td>" +
              value.email +
              "</td>" +
              "<td>" +
              value.mobile +
              "</td>" +
              "<td>" +
              value.address1 +
              "<br>" +
              value.address2 +
              "</td>" +
              "</tr>";
          });

          $("#customer_list").html(customersHTML);
        } else if (resp.status == 303) {
        }
      },
    });
  }

  function getCustomerOrders() {
    $.ajax({
      url: "./classes/Customers.php",
      method: "POST",
      data: { GET_CUSTOMER_ORDERS: 1 },
      success: function (response) {
        console.log(response);
        var resp = $.parseJSON(response);
        if (resp.status == 202) {
          var customerOrderHTML = "";

          $.each(resp.message, function (index, value) {
            customerOrderHTML +=
              "<tr>" +
              "<td>" +
              value.order_id +
              "</td>" +
              "<td>" +
              value.product_title +
              "</td>" +
              "<td>" +
              value.first_name +
              " " +
              value.last_name +
              "</td>" +
              "<td>" +
              value.mobile +
              "</td>" +
              "<td>" +
              value.address1 +
              "</td>" +
              "<td>" +
              value.qty +
              "</td>" +
              "<td>" +
              value.trx_id +
              "</td>" +
              "<td><form action='./classes/Customers.php' method=''POST><input type='hidden' name='order_id' value=" +
              value.order_id +
              "><select class='form-control' name='order_status'><option value='pending' >Pending</option><option>Shipped</option><option>Delivered</option></select><button type='submit' class='btn btn-primary mt-2'>Update Status</button></form>" +
              "</td>" +
              "</tr>";
          });

          $("#customer_order_list").html(customerOrderHTML);
        } else if (resp.status == 303) {
          $("#customer_order_list").html(resp.message);
        }
      },
    });
  }
});
