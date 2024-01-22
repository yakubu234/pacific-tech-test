<html>
    <h2> success</h2>
    @if (session('success_message'))
    <p style="color: green;">{{ session('success_message') }}</p>
@endif
</html>