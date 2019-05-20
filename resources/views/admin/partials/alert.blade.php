@if(session('info'))
    <div class="container">
        <div class="alert alert-{{ session('info')[0] }}" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">X</span>
            <strong>¡Exito!</strong> {{ session('info')[1] }}
        </div>
    </div>
@endif