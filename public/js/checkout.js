  paypal.Button.render({ 
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'Adw95INITpEkJh6AXbzbOzCZBJOwVknm-PgrbvqVK7m6ZwqypA5vp46ydV2qJ4vwYU_rARenC7OxwjI2',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },
    // Set up a payment

  payment: function(data, actions) {
  return actions.payment.create({
    transactions: [{
      amount: {
        total: '0.1',
        currency: 'USD',
      },
      description: 'Nạp tiền',
      custom: 'YZ6TEDSHE4K4L',
      //invoice_number: '12345', Insert a unique invoice number
      payment_options: {
        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
      },
      soft_descriptor: 'ECHI5786786',
      item_list: {
        shipping_address: {
          recipient_name: 'Minh Nguyễn',
          line1: '169 Tô Hiến Thành, Phường 13, Quận 10',
          city: 'Hồ Chí Minh',
          country_code: 'VN',
          postal_code: '71000',
          phone: '0569885811',
          state: 'VN'
        }
      }
    }],
    note_to_payer: 'Contact us for any questions on your order.'
  });
},
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');