<div class="container">
    
                <div class="card-header">Edit Department</div>

                <div class="card-body">
                    <form  action="{{ route('departments.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                       
            
                        <x-atoms.text-input id="code" name="code" :value="$department->code" />
    
                         <x-atoms.text-input id="name" name="name" :value="$department->name" />

                        <button type="submit" class="btn btn-primary">Edit Department</button>
                    </form>
        
</div>