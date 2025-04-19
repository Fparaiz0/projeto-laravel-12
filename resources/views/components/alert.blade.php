@if (@session('success'))
    <p style="color: #082">
        {{ session('success') }}
    </p>
@endif

@if (@session('error'))
    <p style="color: #f00">
        {{ session('error') }}
    </p>
@endif