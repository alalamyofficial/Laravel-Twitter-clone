<div class="border-2 border-blue-500 rounded-lg px-8 py-6 mb-8">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/tweet/store" method="POST" enctype="multipart/form-data">

    @csrf

    <textarea name="body" id="example1" data-emoji-input="unicode" data-emojiable="true" class="w-full" placeholder="What's up doc ?"></textarea>



    <hr class="my-4">

    <footer class="flex justify-between items-center">

        <div class="flex items-center text-sm">

            <img src="{{auth()->user()->avatar}}" alt="your avatar" class="rounded-full mr-2"
            style="width:50px; height:50px"
            >

        </div>

        <button id="btn">
            <i class="far fa-smile-beam fa-2x mr-34" style="color:#6e94ea;"     
                
            ></i>
        </button>

        <!-- upload image button -->
        <label class="btn btn-default btn-file">
            <i id="filePhoto" class="fas fa-upload fa-2x" style="color:#6e94ea"></i> 
            <input type="file" name="image" id="filePhoto" style="display: none;" 
            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
            >
        </label>


        <img id="blah"  width="50" height="50" />


        <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Publish
        </button>



    </footer>

    <div>

        @error('body')

            <p class="text-red-500 text-sm mt-2"> {{ $message }} </p>

        @enderror

    </div>

</form>



</div>
