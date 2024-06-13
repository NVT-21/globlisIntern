$(document).ready(function() {
    // Function to fetch people based on selected project
    function fetchPeople(projectId) {
        $.ajax({
            url: 'http://localhost:8000/projects/' + projectId + '/getPeople',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#person_id').empty(); 
                $('#person_id').append('<option value="">Select Person</option>'); 
                data.forEach(person => {
                    $('#person_id').append('<option value="' + person.id + '">' + person.full_name + '</option>');
                });
            },
            error: function(error) {
                console.error('There was an error making the GET request!', error);
            }
        });
    }

    // Call fetchPeople function when page loads
    fetchPeople($('#project_id').val());

    // Call fetchPeople function when project_id selection changes
    $('#project_id').change(function() {
        const projectId = $(this).val();
        if (projectId) {
            fetchPeople(projectId);
        } else {
            $('#person_id').empty(); // Clear options if no project is selected
        }
    });
});
