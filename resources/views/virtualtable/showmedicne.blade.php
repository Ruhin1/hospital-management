@extends('layout.main') 
@section('content')
 <style>
 </style>
     </head>
    
    <form class="form" action="{{url('showmedicnepdf')}}" method="POST"> 
        @csrf
        <div class="from-group mb-3">
            <label for="শুরুর তারিখ :">শুরুর তারিখ :</label>
            <input type="datetime-local" name="firstdate" id="firstdate" class="form-control" required>
        </div>
        <div class="from-group mb-3">
            <label for="শেষের তারিখ :">শেষের তারিখ :</label>
            <input type="datetime-local" name="lasttdate" id="lasttdate" class="form-control" required>
        </div>
        <div class="from-group mb-3">
            <label for="medicnename">ঔষধের নাম বাছুন:</label>
            <input type="text" id="searchMedicine" class="form-control mb-2" placeholder="Search medicine...">
            <select class="form-select" aria-label="Default select example" name="medicnename">
                <option selected  value="defolt">Select a medicine</option>
                @foreach ($medicine as $singleMedicine)
                    <option value="{{ $singleMedicine->id }}">{{ $singleMedicine->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="from-group mb-3">
            
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
    
    
    
    <script>
        const startDateInput = document.getElementById('firstdate');
        const endDateInput = document.getElementById('lasttdate');
    
        startDateInput.addEventListener('change', function() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const currentDate = new Date();
    
            if (endDate < startDate) {
                alert('End date cannot be before start date.');
                endDateInput.value = '';
            }
    
            if (endDate > currentDate) {
                alert('End date cannot be greater than current date.');
                endDateInput.value = '';
            }
        });
    
        endDateInput.addEventListener('change', function() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const currentDate = new Date();
    
            if (endDate < startDate) {
                alert('End date cannot be before start date.');
                endDateInput.value = '';
            }
    
            if (endDate > currentDate) {
                alert('End date cannot be greater than current date.');
                endDateInput.value = '';
            }
        });

       
    document.getElementById("searchMedicine").addEventListener("input", function() {
        var input, filter, options, option, i;
        input = document.getElementById('searchMedicine');
        filter = input.value.toLowerCase();
        options = document.querySelectorAll('[name="medicnename"] option');

        for (i = 0; i < options.length; i++) {
            option = options[i];
            if (option.textContent.toLowerCase().indexOf(filter) > -1) {
                option.style.display = "";
            } else {
                option.style.display = "none";
            }
        }
    });

    </script>
    <body>
        </html>
@stop