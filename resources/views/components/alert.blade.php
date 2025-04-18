@if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
@endif