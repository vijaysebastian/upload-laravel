<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload File</title>

</head>

<body>
<div>
    <div>

        <h3>Upload File</h3>

        <form
              method="post"
              action="{{ route('upload') }}"
              enctype="multipart/form-data">
            @csrf

            <div>
                <div>
                    <input class=" @error('file_path') is-invalid @enderror"
                           id="file_path"
                           name="file_path"
                           type="file">
                    <div>
                        <button>Upload File</button>
                    </div>
                    @error('file_path')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror

                    @if (session()->has('success_msg'))
                        <div>
                            {{ session('success_msg') }}
                        </div>
                    @endif

                    @if (session()->has('error_msg'))
                        <div>
                            {{ session('error_msg') }}
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>
