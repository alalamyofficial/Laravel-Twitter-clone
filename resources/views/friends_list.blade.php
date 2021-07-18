<h3 class="font-bold text-xl mb-4">Folowing</h3>


<ul style="width:300px">

    @foreach(range(1,10) as $index)

    <li class="mb-4">

        <div class="flex items-center text-sm">

            <a href="">

                <img src="http://lasvegascoder.com/img/tailwindcss-logo.png" alt="" class="rounded-full mr-2" style="width:50px; height:50px">
            </a>  

            <a href="">

                Mud
            </a>    

        </div>

        
    </li>
    @endforeach


</ul>