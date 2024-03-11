@foreach ($order as $u) 
 
order  {{$u->id}} 	<br>
@foreach ($u->medicinetransitions as $role) 

product {{ $role->id}} 
medicine // {{$role->medicine->name}}
	<br>

@endforeach
<br>

@endforeach