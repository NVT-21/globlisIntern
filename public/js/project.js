$(document).ready(function(){
    $('#company_id').change(function(){
        const companyId = $(this).val();
        if(companyId){
            $.ajax({
                url: 'http://localhost:8000/companies/people/' + companyId,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#people').empty(); // Thêm dấu # để chọn đúng phần tử
                    data.forEach(person => { // Sử dụng biến person trong vòng lặp
                        $('#people').append('<option value="' + person.id + '">' + person.full_name + '</option>');
                    });
                },
                error: function(error) {
                    console.error('There was an error making the GET request!', error);
                }
            });
        } else {
            $('#people').empty();
        }
    });
});