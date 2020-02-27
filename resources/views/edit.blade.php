<html>
    <head>
        <title>Student Management | Edit</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>

    <body>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        <form method="post" action="/update/<?php echo $form->id; ?>">

            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <table>
                <tr>
                    <td>Coin Name</td>
                    <td><input type='text' name='coinname' value="{{$form->coinname}}"></td>
                </tr>
                <tr>
                    <td>Coin price</td>
                    <td><input type='text' name='coinprice' value="{{$form->coinprice}}"></td>
                </tr>
                <tr>
                    <td colspan = '2'>
                        <input type = 'submit' value = "Update"/>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>