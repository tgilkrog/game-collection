<x-layout>
    <form method="POST" action="/login" enctype="multipart/form-data">
        @csrf
        <input type="text" name="loginname" placeholder="naem">
        <input type="password" name="loginpass" placeholder="passowrd">
        <button type="submit">Login</button>
    </form>
</x-layout>