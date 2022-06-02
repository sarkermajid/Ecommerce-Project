function validateAmount(amount, product_id){
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name=csrf_token]').attr('content')
        }
    });
    
    $.ajax({
        url : '/product_details/validateAmount',
        data : {
            'qty' : amount,
            'pid' : product_id
        },
        async : false,
        type : 'POST'
    }).done(function(data){
        let newData = JSON.parse(data);

        let html = '';
        if(newData.success){
            html+= '<div class="alert alert-danger">' + newData.message + '</div>';
            document.getElementById('error_amount').innerHTML = html;
            document.getElementById('qty').value = 1;
        }else{
            document.getElementById('error_amount').innerHTML = '';
        }
    })
}